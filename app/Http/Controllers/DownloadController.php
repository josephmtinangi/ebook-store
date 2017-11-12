<?php

namespace App\Http\Controllers;

use App\Models\DownloadLink;
use Illuminate\Http\Request;

class DownloadController extends Controller
{
    public function handle($token)
    {
    	$downloadLink = DownloadLink::whereToken($token)->first();

    	if (!$downloadLink)
    	{
    		return 'This link has expired';
    	}

    	$downloadLink->token = null;
    	$downloadLink->save();

    	return $downloadLink->book;
    }
}
