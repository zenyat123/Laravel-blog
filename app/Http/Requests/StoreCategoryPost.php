<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryPost extends FormRequest
{
 
    static public function myRules()
    {

        return [
            
            "category" => "required|min:5|max:100",
            "url" => "max:100|unique:categories"

        ];

    }

    public function authorize()
    {

        return true;

    }

    public function rules()
    {

        return $this->myRules();

    }

    public function messages()
    {

        return [

            "category.required" => "El campo categoría es obligatorio",
            "category.min" => "La categoría debe tener al menos 5 caracteres",
            "url.min" => "La url debe tener al menos 5 caracteres",
            "url.unique" => "La url ya está registrada"

        ];

    }

}