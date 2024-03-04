<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    //
    public function store()
    {
        Auth::logout();
        return redirect("login");
    }
}
