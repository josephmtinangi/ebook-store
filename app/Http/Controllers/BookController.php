<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

	public function index()
	{
		$books = Book::latest()->paginate(10);
		return view('books.index', compact('books'));
	}

    public function show(Book $book)
    {
    	return view('books.show', compact('book'));
    }

    public function create()
    {
    	$categories = Category::get();
    	return view('books.create', compact('categories'));
    }

    public function store(Request $request)
    {
    	$book = new Book;
        $book->title = $request->title;
        $book->description = $request->description;
        $book->category_id = $request->category_id;
        $book->user_id = auth()->id();
    	
        $book->slug = str_slug($request->title);

        $latestSlug = Book::whereRaw("slug RLIKE '^{$book->slug}(-[0-9]*)?$'")->latest('id')->pluck('slug');

        if($latestSlug)
        {
            $pieces = explode('-', $latestSlug);

            $number = (int)(end($pieces));

            $book->slug .= '-' . ($number + 1);
        }

        $book->save();

        if ($request->hasFile('image')) {
            if ($request->file('image')->isValid()) {
                $path = $request->image->store('books');
                $book->image_url = $path;
                $book->save();
            }
        }        

    	return redirect()->route('profile', auth()->user()->username);
    }
}
