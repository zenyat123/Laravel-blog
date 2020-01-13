<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryPut extends FormRequest
{
 
    public function authorize()
    {

        return true;

    }

    public function rules()
    {

        return [
            
            "category" => "required|min:5|max:100",
            "url" => "required|max:100|unique:categories,url," . $this->route("category")->id

        ];

    }

    public function messages()
    {

        return [

            "category.required" => "El campo categoría es obligatorio",
            "category.min" => "La categoría debe tener al menos 5 caracteres",
            "url.required" => "El campo de url es obligatorio",
            "url.min" => "La url debe tener al menos 5 caracteres",
            "url.unique" => "La url ya está registrada"

        ];

    }

}