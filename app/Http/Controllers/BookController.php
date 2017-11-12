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
    	$book = Book::create([
    		'title' => $request->title,
    		'slug' => str_slug($request->title),
    		'description' => $request->description,
    		'category_id' => $request->category_id,
    		'user_id' => auth()->id(),
    	]);

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
