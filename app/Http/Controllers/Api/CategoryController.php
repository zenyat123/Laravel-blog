<?php

namespace App\Http\Controllers\Api;

use App\Category;

class CategoryController extends ApiResponseController
{
    
	public function index()
	{

		$categories = Category::get();

		return $this->successResponse($categories);

	}

}