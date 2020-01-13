<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Post;

class Category extends Model
{
    
	protected $fillable = ["category", "url"];

	public function post()
	{

		return $this->hasMany("App\Post");

	}

}