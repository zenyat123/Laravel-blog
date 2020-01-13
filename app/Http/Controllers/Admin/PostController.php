<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\URL;

use App\Post;
use App\Category;
use App\Tag;

use App\Helpers\UrlCustom;

use App\Http\Requests\StorePostPost;
use App\Http\Requests\UpdatePostPut;

class PostController extends Controller
{

    public function __construct()
    {

        $this->middleware("auth");
        $this->middleware("rol.admin");

    }
    
    public function index()
    {

        $posts = Post::with("category")->orderBy("created_at", "desc")->paginate(6);
        
        return view("admin.post.index", compact("posts"));

    }

    public function create()
    {

        $categories = Category::pluck("id", "category");

        $tags = Tag::pluck("id", "tag");
        
        return view("admin.post.create", compact("categories", "tags"));

    }

    public function store(StorePostPost $request)
    {

        if($request->url == "")
        {

            $url_clean = UrlCustom::urlClean(UrlCustom::convertAccentedCharacters($request->title));

        }
        else
        {

            $url_clean = UrlCustom::urlClean(UrlCustom::convertAccentedCharacters($request->url));

        }
        
        if($request->image)
        {

            $image_name = time() . "." . $request->image->extension();

            $request->image->move(public_path("img/posts/"), $image_name);

        }
        else
        {

            $image_name = "";

        }

        $request_data = [

            "title" => $request->title,
            "url" => $url_clean,
            "content" => $request->content,
            "posted" => $request->posted,
            "image" => $image_name,
            "category_id" => $request->category_id

        ];

        $validator = Validator::make($request_data, StorePostPost::myRules());

        if($validator->fails())
        {

            return redirect("admin/post/create")
                          ->withErrors($validator)
                          ->withInput();

        }

        $post = Post::create($request_data);

        $post->tags()->sync($request->tags_id);

        return redirect()->route("post.index")->with("response", "¡Post registrado correctamente!");

    }

    public function show(Post $post)
    {
        
        return view("admin.post.show", compact("post"));

    }

    public function edit(Post $post)
    {

        $categories = Category::pluck("id", "category");

        $tags = Tag::pluck("id", "tag");

        return view("admin.post.edit", compact("post", "categories", "tags"));

    }

    public function update(UpdatePostPut $request, Post $post)
    {

        if($request->image && $post->image)
        {

            $image_name = $post->image;

            $request->image->move(public_path("img/posts/"), $image_name);

        }
        else if($request->image && !$post->image)
        {

            $image_name = time() . "." . $request->image->extension();

            $request->image->move(public_path("img/posts/"), $image_name);

        }
        else
        {

            $image_name = $post->image;
            
        }

        $request_data = [

            "title" => $request->title,
            "url" => $request->url,
            "content" => $request->content,
            "posted" => $request->posted,
            "image" => $image_name,
            "category_id" => $request->category_id

        ];
        
        $post->tags()->sync($request->tags_id);
        
        $post->update($request_data);

        return redirect()->route("post.index")->with("response", "¡Post actualizado correctamente!");

    }

    public function destroy(Post $post)
    {
        
        $post->delete();

        return redirect()->route("post.index")->with("response", "Post eliminado");

    }

    public function images(Request $request)
    {

        $request->validate(["image" => "mimes:jpeg,png|max:10240"]);

        $image_name = time() . "." . $request->image->extension();

        $request->image->move(public_path("img/ckeditor/"), $image_name);

        return response()->json(["url" => URL::to("/") . "/img/ckeditor/" . $image_name]);

    }

}