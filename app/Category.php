<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    
	protected $fillable = ["category", "url"];

	public function post()
	{

		return $this->hasMany("App\Post");

	}

	public function getRouteKeyName()
	{

		return "url";

	}

}