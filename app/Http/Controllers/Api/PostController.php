<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Post;
use App\Category;

class PostController extends ApiResponseController
{

    public function index()
    {
        
        $posts = Post::join("categories", "posts.category_id", "=", "categories.id")
                       ->select("posts.*", "categories.category")
                       ->where("posts.posted", "=", "si")
                       ->orderBy("posts.created_at", "desc")
                       ->paginate(6);

        return $this->successResponse($posts);

    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Post $post)
    {

        $post->category;
       
        return $this->successResponse($post);

    }

    public function edit(Post $post)
    {
        //
    }

    public function update(Request $request, Post $post)
    {
        //
    }

    public function destroy(Post $post)
    {
        //
    }

    public function category(Category $category)
    {

        return $this->successResponse(["posts" => $category->post()->orderBy("created_at", "desc")->paginate(6), "category" => $category]);

    }

}