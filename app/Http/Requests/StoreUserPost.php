<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserPost extends FormRequest
{

    static public function myRules()
    {

        return [
            
            "name" => "required|string",
            "surname" => "required|string",
            "email" => "required|string|email|unique:users",
            "password" => "required|string|min:8"

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

            "name.required" => "Los nombres son requeridos",
            "surname.required" => "Los apellidos son requeridos",
            "email.required" => "El correo electrónico es requerido",
            "password.required" => "Debe ingresar una contraseña"

        ];

    }

}