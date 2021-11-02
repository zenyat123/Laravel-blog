<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostPost extends FormRequest
{

    static public function myRules()
    {

        return [

            "title" => "required|min:5|max:100",
            "url" => "max:100|unique:posts",
            "content" => "required|min:10|max:2000",
            "image" => "mimes:jpeg,png|max:10240",
            "posted" => "required",
            "category_id" => "required"

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

            "title.required" => "El campo título es obligatorio",
            "title.min" => "El título debe tener al menos 5 caracteres",
            "url.unique" => "La url ya se está registrada",
            "content.required" => "El contenido es obligatorio",
            "content.min" => "El contenido debe ser minimo de 10 caracteres"

        ];

    }

}