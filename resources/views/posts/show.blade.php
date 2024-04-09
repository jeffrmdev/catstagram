@extends('layouts.app')

@section('titulo')

{{ $post->title }}

@endsection

@section('contenido')

<div class="container mx-auto flex">
    <div class="w-1/4 flex items-center flex-col justify-stretch">
        <div class="flex flex-row items-start">
            <p class="font-bold mx-2 my-1"> {{ $post->user->username }}</p>
            <span class="font-extralight mx-2 my-1"> - </span>
            <p class="font-thin mx-2 my-1">
                {{ $post->created_at->diffForHumans() }}
            </p>
        </div>
        <img class="p-2" src="{{ asset('uploads') . '/' . $post->imagen}}" alt="Imagen del post {{ $post->title }}">
        <div>

            @auth
            @if ($post->user_id === auth()->user()->id)
                
            <form method="POST" action=" {{ route('posts.destroy', $post )}} ">
                @method('DELETE')
                @csrf
                <input 
                    type="submit" 
                    value="Eliminar publicacion"
                    class="p-4 bg-red-800 text-white cursor-pointer"
                />
            </form>
            @endif               
            @endauth

        </div>

        <div class="flex flex-row justify-stretch text-left m-auto font-extralight">
            <p class="m-5">0 likes</p>
            <p class="m-5">0 comentarios</p>
        </div>
        <div>
            <p>
                {{ $post->description }}
            </p>
        </div>
    </div>
    @auth
    <div class="w-1/4">
        <p>Comentarios</p>
        <div>
            <form method="POST" action=" {{ route('comments.store', ['post' => $post, 'user' => $user]) }}">
                @csrf
                <div class="mx-7 mt-7 text-left">
                    <label for="comment" class="block font-light mb-2">Agregar un comentario</label>
                    @if (session('message'))
                        <div>
                            {{ session ('message') }}
                        </div>
                    @endif
                    <textarea 
                        name="comment" 
                        id="comment"
                        placeholder="Di lo que piensas"
                     {{--    oninput="Desaparecer('descError','comment');" --}}
                        class="@error('comment') border-red-600 @enderror 
                        placeholder:font-extralight w-full border-b-2 
                        bg-white border-gray-400 focus:outline-none focus:border-gray-950
                        p-2"
                    ></textarea>
                    @error('comment')
                        <p id="descError" class="text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div class="my-5">
                    <input 
                        type="submit" 
                        value="Commentar"
                        class="bg-slate-600 text-white p-4 cursor-pointer"
                    >
                </div>
            </form>
        </div>
    </div>
    @endauth
    <div class="w-1/2">
        <p>Lista de comentarios</p>
        @if ($post->comments->count())
            @foreach ($post->comments as $comment)
                <div class="m-5 p-2">
                    <a href="{{ route('posts.index', $comment->user) }}">
                        {{ $comment->user->username}}
                    </a>
                    <p>{{ $comment->comment }}</p>
                    <p class="font-extralight">{{ $comment->created_at->diffForHumans()}}</p>
                </div>
            @endforeach
        @endif
    </div>
</div>


@endsection


