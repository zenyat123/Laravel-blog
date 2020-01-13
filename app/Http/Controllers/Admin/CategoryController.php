<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Category;
use App\Http\Requests\StoreCategoryPost;
use App\Http\Requests\UpdateCategoryPut;

use App\Helpers\UrlCustom;

class CategoryController extends Controller
{

    public function __construct()
    {

        $this->middleware("auth");
        $this->middleware("rol.admin");

    }

    public function index()
    {
        
        $categories = Category::paginate(6);

        return view("admin.category.index", compact("categories"));

    }

    public function create()
    {
        
        return view("admin.category.create");

    }

    public function store(StoreCategoryPost $request)
    {

        if($request->url == "")
        {

            $url_clean = UrlCustom::UrlClean(UrlCustom::convertAccentedCharacters($request->category));

        }
        else
        {

            $url_clean = UrlCustom::UrlClean(UrlCustom::convertAccentedCharacters($request->url));

        }

        $request_data = [

            "category" => $request->category,
            "url" => $url_clean

        ];

        $validator = Validator::make($request_data, StoreCategoryPost::myRules());

        if($validator->fails())
        {

            return redirect("admin/category/create")
                          ->withErrors($validator)
                          ->withInput();

        }
        
        Category::create($request_data);

        return redirect()->route("category.index")->with("response", "¡Categoría registrada correctamente!");

    }

    public function show(Category $category)
    {
        
        return view("admin.category.show", compact("category"));

    }

    public function edit(Category $category)
    {
        
        return view("admin.category.edit", compact("category"));

    }

    public function update(UpdateCategoryPut $request, Category $category)
    {
        
        $category->update($request->validated());

        return redirect()->route("category.index")->with("response", "¡Categoría actualizada correctamente!");

    }

    public function destroy(Category $category)
    {
        
        $category->delete();

        return redirect()->route("category.index")->with("response", "Categoría eliminada");

    }

}