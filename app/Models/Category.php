<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	public function books()
	{
		return $this->hasMany(Book::class);
	}

	public function booksCount()
	{
		return $this->books()->count();
	}

    public function getRouteKeyName()
    {
    	return 'slug';
    }
}
