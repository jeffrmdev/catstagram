<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('principal');
});

//Registro de usuario
Route::get('/register', [RegisterController::class, 'index']) -> name('register');
Route::post('/register', [RegisterController::class, 'store']);


//Inicio de sesion
Route::get('/login', [LoginController::class,'index']) -> name('login');
Route::post('/login', [LoginController::class,'store']);


//Cerrar sesion
Route::post('/logout', [LogoutController::class, 'store']) -> name('logout');

//Enlace usuario
Route::get('/{user:username}', [PostController::class,'index']) -> name('post.index');

//Creacion de post
Route::get('/post/create', [PostController::class,'create']) -> name('post.create');