<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostPut extends FormRequest
{
 
    public function authorize()
    {

        return true;
        
    }

    public function rules()
    {

        return [

            "title" => "required|min:5|max:100",
            "content" => "required|min:10|max:2000",
            "image" => "mimes:jpeg,png|max:10240",
            "posted" => "required",
            "category_id" => "required"

        ];

    }

    public function messages()
    {

        return [

            "title.required" => "El campo título es obligatorio",
            "title.min" => "El título debe tener al menos 5 caracteres",
            "content.required" => "El contenido es obligatorio",
            "content.min" => "El contenido debe ser minimo de 10 caracteres"

        ];

    }

}