<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
    public function index()
    {
        return view("auth.login");
    }

    public function store(Request $request, User $user)
    {
        #dd($request->all());
        
        $this->validate($request, [
            'username'=> 'required',
            'password' => 'required'
        ],
        [
            'username.required' => 'No te olvides de tu usuario o tu email',
            'password.required' => 'No te olvides de la contraseña'
        ]
        );

        $request->request->add(['email'=>$request->username]);

        #dd($request->all());
        if(Auth::attempt($request->only('username','password'), $request->remember)) 
        {
            return redirect()->route("posts.index", ["user" => Auth::user()]);
        }
        else
        if(Auth::attempt($request->only('email','password'), $request->remember)){
            return redirect()->route("posts.index", ["user" => Auth::user()]);
        }

        return back()->with('error','Usuario o contraseña incorrectos');
        
    }
}
