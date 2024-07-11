@extends('layouts.app')
@section('titulo')

{{ $post->title }}

@endsection


@section('contenido')

<div class="w-11/12 lg:w-9/12 my-5 grid grid-cols-2 bg-white shadow-xl rounded-3xl p-5">
    <div class="">
        <div class="flex justify-between">
            <div class="text-left content-center">
                <p class="font-bold"> {{ $post->user->username }}</p>
                <p class="font-thin text-xs">
                    {{ $post->created_at->diffForHumans() }}
                </p>
            </div>
            <div class="content-center">
                @auth
                    @if ($post->user_id === auth()->user()->id)
                    @include('components.option-modal')
                    
                @endif               
                    @endauth
            </div>

        </div>
        
        <img class="p-2" src="{{ asset('uploads') . '/' . $post->imagen}}" alt="Imagen del post {{ $post->title }}">
        <div class="flex flex-row justify-between text-left m-auto font-extralight">
            <p class="">0 likes </p>
            <p class="">0 comentarios</p>
        </div>
        <div>
            <p>
                {{ $post->description }}
            </p>
        </div>
    </div>
    @auth
    <div class="">
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
            <div class="">
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
    </div>
    @endauth
    
</div>


@endsection

