<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function imageUrl()
	{
		if(! $this->image_url)
		{
			return asset('storage/books/default.png');
		}

		return asset('storage/books/' . $this->image_url);
	}

    public function getRouteKeyName()
    {
    	return 'slug';
    }
}
