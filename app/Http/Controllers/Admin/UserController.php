<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\User;
use App\Http\Requests\StoreUserPost;
use App\Http\Requests\UpdateUserPut;

class UserController extends Controller
{

    public function __construct()
    {

        $this->middleware("auth");
        $this->middleware("rol.admin");

    }
   
    public function index()
    {
        
        $users = User::with("rol")->get();

        return view("admin.user.index", compact("users"));

    }

    public function create()
    {
      
        return view("admin.user.create");

    }

    public function store(StoreUserPost $request)
    {
        
        User::create(

            [

                "name" => $request["name"],
                "surname" => $request["surname"],
                "email" => $request["email"],
                "password" => Hash::make($request["password"]),
                "rol_id" => 1 //  Rol de aministrador

            ]

        );

        return redirect()->route("user.index")->with("response", "¡Usuario registrado correctamente!");
        
    }

    public function show(User $user)
    {
        
        return view("admin.user.show", compact("user"));

    }

    public function edit(User $user)
    {
        
        return view("admin.user.edit", compact("user"));

    }

    public function update(UpdateUserPut $request, User $user)
    {
        
        $user->update(

            [

                "name" => $request["name"],
                "surname" => $request["surname"],
                "email" => $request["email"]

            ]

        );

        return redirect()->route("user.index")->with("response", "¡Usuario actualizado correctamente!");

    }

    public function destroy(User $user)
    {
      
        $user->delete();

        return redirect()->route("user.index")->with("response", "Usuario eliminado");

    }

}