<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{

	protected $fillable = [
		'title',
		'slug',
		'description',
		'image_url',
		'category_id',
		'user_id',
	];

	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function category()
	{
		return $this->belongsTo(Category::class);
	}

	public function imageUrl()
	{
		if(! $this->image_url)
		{
			return asset('storage/books/default.jpg');
		}

		return asset('storage/' . $this->image_url);
	}

	public function downloadLinks()
	{
		return $this->hasMany(DownloadLink::class);
	}

	public function downloads()
	{
		return $this->downloadLinks()->whereToken(null)->count();
	}

    public function getRouteKeyName()
    {
    	return 'slug';
    }
}
