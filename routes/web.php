<?php

use App\Http\Controllers\CommentsController;
use App\Http\Controllers\ImagenController;
use App\Http\Controllers\LikeController;
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



//Enlaces del usuario
Route::get('/{user:username}', [PostController::class, 'index']) -> name('posts.index');
Route::get('/posts/create', [PostController::class, 'create']) -> name('posts.create');
Route::post('/posts', [PostController::class, 'store']) -> name('posts.store');

//Mostar imagen en pantalla
Route::get('/{user:username}/post/{post}', [PostController::class, 'show']) -> name('posts.show');

//Eliminar publicación desde pantalla
Route::delete('/posts/{post}', [PostController::class,'destroy']) -> name('posts.destroy');


#Seccion de comentarios
Route::post('/{user:username}/post/{post}', [CommentsController::class, 'store']) -> name('comments.store');

// Like a publicaciones
Route::post('/posts/{post}/likes', [LikeController::class, 'store']) -> name('post.likes.store');
Route::delete('/posts/{post}/likes', [LikeController::class, 'destroy']) -> name('post.likes.destroy');


Route::post('/imagenes', [ImagenController::class, 'store']) -> name('imagen.store');