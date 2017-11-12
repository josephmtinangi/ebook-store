<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Jobs\SendDownloadLinkEmail;

class DownloadLinkController extends Controller
{
    public function store(Request $request, Book $book)
    {
    	$downloadLink = $book->downloadLinks()->create([
    		'name' => $request->name,
    		'email' => $request->email,
    		'token' => uniqid(true),
    	]);

    	dispatch(new SendDownloadLinkEmail($downloadLink));

    	return back();
    }
}
