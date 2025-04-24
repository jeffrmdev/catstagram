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
            @auth
                @if($post->checkLike(auth()->user()))
                    <div class="flex flex-row justify-between text-left m-auto font-extralight">
                        <form method="POST" action="{{ route('post.likes.destroy', $post)}}">
                            @csrf
                            @method('DELETE')
                            <button class="border-1 border p-4 bg-red-600">
                                <p class=""><span>{{ $post->likes->count() }}</span> like</p>
                            </button>
                        </form>
                        <p class="">0 comentarios</p>
                    </div>
                @else
                    <div class="flex flex-row justify-between text-left m-auto font-extralight">
                        <form method="POST" action="{{ route('post.likes.store', $post)}}">
                            @csrf
                            <button class="border-1 border p-4">
                                <p class=""><span>{{ $post->likes->count() }}</span>like</p>
                            </button>
                        </form>
                        <p class="">0 comentarios</p>
                    </div>
                @endif   
            @endauth

            <!-- Número de Likes -->
            <div>
                <p>
                    {{ $post->description }}
                </p>
            </div>
        </div>
        @auth
            <div class="mx-5">
                <p class="text-left text-2xl my-2">Comentarios</p>
                <div class="flex flex-col">
                    <form method="POST" action=" {{ route('comments.store', ['post' => $post, 'user' => $user]) }}"
                        class="order-last">
                        @csrf
                        <div class="mx-7 mt-7 text-left">
                            <div></div>
                            <label for="comment" class="block font-light mb-2">Agregar un comentario</label>
                            @if (session('message'))
                                <div>
                                    {{ session('message') }}
                                </div>
                            @endif
                            <textarea name="comment" id="comment" placeholder="Di lo que piensas" {{--
                                oninput="Desaparecer('descError','comment');" --}} class="@error('comment') border-red-600 @enderror 
                                placeholder:font-extralight w-full border-b-2 
                                bg-white border-gray-400 focus:outline-none focus:border-gray-950
                                p-2"></textarea>
                            @error('comment')
                                <p id="descError" class="text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="my-5">
                            <input type="submit" value="Commentar" class="bg-slate-600 text-white p-4 cursor-pointer">
                        </div>
                    </form>
        @endauth
                <div class="order-first max-h-80 h-64 overflow-y-auto">
                    @if ($post->comments->count())
                        @foreach ($post->comments->sortByDesc('created_at') as $comment)
                            <div class="flex me-5">
                                <div class="m-5 p-2 text-left shadow-sm bg-slate-100 rounded-lg w-full">
                                    <div>
                                        <div class="flex align-middle">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                                class="mx-2 h-5 w-5"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                                <path
                                                    d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512l388.6 0c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304l-91.4 0z" />
                                            </svg>
                                            <a class="font-bold" href="{{ route('posts.index', $comment->user) }}">
                                                {{ $comment->user->username}}
                                            </a>
                                        </div>
                                        <p>{{ $comment->comment }}</p>
                                        <p class="font-extralight">{{ $comment->created_at->diffForHumans()}}</p>
                                    </div>
                                    <div class="m-auto flex justify-between">
                                        <p>Me gusta</p>
                                        <p>Responder</p>
                                    </div>
                                </div>
                                <div class="m-auto">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                        class="h-4 w-4"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                        <path
                                            d="M225.8 468.2l-2.5-2.3L48.1 303.2C17.4 274.7 0 234.7 0 192.8l0-3.3c0-70.4 50-130.8 119.2-144C158.6 37.9 198.9 47 231 69.6c9 6.4 17.4 13.8 25 22.3c4.2-4.8 8.7-9.2 13.5-13.3c3.7-3.2 7.5-6.2 11.5-9c0 0 0 0 0 0C313.1 47 353.4 37.9 392.8 45.4C462 58.6 512 119.1 512 189.5l0 3.3c0 41.9-17.4 81.9-48.1 110.4L288.7 465.9l-2.5 2.3c-8.2 7.6-19 11.9-30.2 11.9s-22-4.2-30.2-11.9zM239.1 145c-.4-.3-.7-.7-1-1.1l-17.8-20-.1-.1s0 0 0 0c-23.1-25.9-58-37.7-92-31.2C81.6 101.5 48 142.1 48 189.5l0 3.3c0 28.5 11.9 55.8 32.8 75.2L256 430.7 431.2 268c20.9-19.4 32.8-46.7 32.8-75.2l0-3.3c0-47.3-33.6-88-80.1-96.9c-34-6.5-69 5.4-92 31.2c0 0 0 0-.1 .1s0 0-.1 .1l-17.8 20c-.3 .4-.7 .7-1 1.1c-4.5 4.5-10.6 7-16.9 7s-12.4-2.5-16.9-7z" />
                                    </svg>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>


    </div>


@endsection