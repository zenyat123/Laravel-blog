<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    
	protected $fillable = ["title", "url", "content", "image", "posted", "category_id"];

	public function category()
	{

		return $this->belongsTo("App\Category");

	}

	public function comments()
	{

		return $this->hasMany("App\PostComment");

	}

	public function tags()
	{

		return $this->belongsToMany("App\Tag");

	}
    
}