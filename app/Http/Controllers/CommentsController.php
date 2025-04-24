<?php

namespace App\Http\Controllers;


use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    //
    public function store(Request $request, User $user, Post $post)
    {        #Validar
        $this->validate($request, [
            'comment' => 'required|max:255',
        ]);

        #Almacenar
        Comment::create([
          'user_id' => auth()->user()->id,
          'post_id' => $post->id,
          'comment'=> $request->comment,
        ]);


        #Imprimir mensaje
        return back()->with('message','Comentario publicado');
    }
}
