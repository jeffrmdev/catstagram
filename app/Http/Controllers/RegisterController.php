<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    //
    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        //dd($request);
        //dd($request -> get('username')); Obtener datos del POST
        //Validación de datos
        $this->validate($request, [
            'name' => 'required | min:3 | max:20',
            'lastname' => 'required | min:3 | max:20',
            'username' => 'required | unique:users | min:3 | max:20',
            'email' => 'required | unique:users | min:3 | max:50',
            'password' => 'required | confirmed | min:6 '
        ]);

        dd("Creando usuario");
    }
}