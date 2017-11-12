<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DownloadLink extends Model
{
    protected $fillable = [
    	'name',
    	'email',
    	'token',
    ];

    public function book()
    {
    	return $this->belongsTo(Book::class);
    }
}
