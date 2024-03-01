<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class RegisterController extends Controller
{
    //
    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {

        $request->request->add(['username' => Str::slug($request->username)]);
        //Validación de datos
        $this->validate($request, [
            'name' => 'required|min:3|max:20',
            'lastname' => 'required|min:3|max:20',
            'username' => 'required|unique:users|min:3|max:20',
            'email' => 'required|unique:users|min:3|max:50',
            'password' => 'required|confirmed|min:6 '
        ]);

        

        User::create([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password_confirmation)
        ]);

        Auth::attempt($request->only('email','password'));
        return redirect()->route('post.index');

    }

}