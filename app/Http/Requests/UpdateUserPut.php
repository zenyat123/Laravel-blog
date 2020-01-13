<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserPut extends FormRequest
{
     
    public function authorize()
    {

        return true;

    }

    public function rules()
    {

        return [
            
            "name" => "required|string",
            "surname" => "required|string",
            "email" => "required|email|unique:users,email," . $this->route("user")->id

        ];
        
    }

    public function messages()
    {

        return [

            "name.required" => "Los nombres son requeridos",
            "surname.required" => "Los apellidos son requeridos",
            "email.required" => "El correo electrónico es requerido",
            "password.required" => "Debe ingresar una contraseña"

        ];

    }

}