<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware("auth")->except(['show','index']);
    }

    public function index(User $user)
    {
        
    
        $post = Post::where("user_id", $user->id)->paginate(9);
        return view("dahsboard", [
            "user" => $user,
            "posts"=> $post
        ]);
    }
    public function create()
    {
        return view('posts.create');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'title'=> 'required|max:255',
            'description' => 'required',
            'image' => 'required',
        ],
        [
            'title.required' => 'No te olvides del titulo',
            'description.required' => 'No te olvides de agregar una descripción',
            'image.required' => 'No te olvides de colocar tu imagen', 
        ]);

    /* Otra forma en la que se puede guardar datos 
        $request->user()->posts()->create([
            'title' => $request->title,
            'description' => $request->description,
            'imagen' => $request->image,
            'user_id' => auth()->user()->id,  
        ])        

    */

    /* Otra forma en la que se puede guardar datos
        $post = new Post;
        $post->title = $request->title;
        $post->description = $request->description;
        $post->imagen = $request->imagen;
        $post->user_id = auth()->user()->id;
        $post->save();
    */


    //Guardar el post en la base de datos
        Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'imagen' => $request->image,
            'user_id' => auth()->user()->id,
        ]);

        return redirect() -> route('posts.index', auth()->user()->username);  
    }

    public function show(User $user, Post $post)
    {
        return view ('posts.show', [
            'post' => $post,
            'user' => $user
        ]);
    }


    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);
        $post->delete();


        //Eliminar la imagen de uploads
        $imagen_path = public_path('uploads/' . $post->imagen);
        if(File::exists($imagen_path))
        {
            unlink($imagen_path);
        }
        return redirect()->route('posts.index' , auth()->user()->username);
    }

}
