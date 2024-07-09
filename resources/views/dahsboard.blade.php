@extends('layouts.app')

@section('titulo')
@endsection


@section('contenido')

    <div class="md:grid md:grid-rows-1 md:grid-cols-4">
        <div class="col-span-1 flex justify-center items-center text-center m-auto">
            <div class="w-fit max-h-full gap-2 justify-between">
                <div class="items-center col-span-2 md:col-span-1 w-32 mt-5">
                    <img class="img rounded-full aspect-square object-cover" src="{{ asset('img/usercat.jpg')}}" alt="Imagen Usuario"/>
                </div>
                <div class="w-full px-5 text-left">
                    <p class="p-2 ps-0 font-medium text-3xl text-center md:text-left m-auto text-gray-800">{{ $user -> username }}</p>
                    <div class="">
                        <div class="whitespace-nowrap">
                            <span class="font-light">0</span>
                            <span class="text-gray-800 text-sm mb-3 font-medium">
                                Seguidores
                            </span>
                        </div>
                        <div class="whitespace-nowrap">
                            <span class="font-light">0</span>
                            <span class="text-gray-800 text-sm mb-3 font-medium">
                                Siguiendo
                            </span>
                        </div>
                        <div class="whitespace-nowrap">
                        @if($posts->count())
                            <span class="font-light">{{$posts->count()}}</span>
                            @if($posts->count() <= 1)
                            <span class="text-gray-800 text-sm mb-3 font-medium">
                                Post
                            </span>
                            @endif
                            <span class="text-gray-800 text-sm mb-3 font-medium">
                                Posts
                            </span>
                        @else
                            <span class="font-light">0</span>
                            <span class="text-gray-800 text-sm mb-3 font-medium">
                                Posts
                            </span>
                        @endif
                        
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <section class="ms-10 p-5 col-span-3 m-auto justify-center">

            @if($posts->count())

            <h1 class="pt-5 text-gray-600 font-semibold text-left text-xl border-b-2">Publicaciones</h1>

            <div class="grid grid-cols-3 grid-flow-dense gap-1 mt-5">     
                @foreach ($posts as $post)
                <div class="hover:opacity-50 transition-opacity">
                    <a href=" {{ route('posts.show', ['post' => $post, 'user' => $user]) }} ">
                        <img src="{{ asset('uploads') . '/' . $post->imagen }}" alt="Imagen del post {{ $post->imagen }}">
                    </a>
                </div>
                @endforeach
            </div>

            <div class="my-5">
                {{ $posts->links('pagination::tailwind')}}
            </div>

            @else
            <div class="flex m-auto w-full  h-96 justify-center items-center">
                <p class="">No hay publicaciones</p>
            </div>
            @endif
        </section>
        
    </div>
@endsection