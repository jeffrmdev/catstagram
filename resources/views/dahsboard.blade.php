@extends('layouts.app')

@section('titulo')
    @if(Auth::check() && Auth::user()->id == $user->id)
    Tu
    @endif
    Perfil
@endsection


@section('contenido')

    <div class="flex justify-center items-center text-center">
        <div class="w-fit max-h-full grid grid-cols-2 gap-2 justify-between">
            <div class="flex flex-col items-center col-span-2 md:col-span-1">
                <img class="img h-52 -m-2" src="{{ asset('img/usercat.svg')}}" alt="Imagen Usuario"/>
                <button onclick="alert('hola mundo')" class="h-fit w-fit p-2 bg-slate-500 text-white transition-colors hover:bg-slate-700">Cambiar imagen</button>
            </div>
            <div class="col-span-2 md:col-span-1 w-full px-5 flex flex-col text-center md:text-left">
                <p class="p-2 ps-0 font-medium text-3xl text-gray-800">{{ $user -> username }}</p>
                <div class="grid md:grid-cols-3 gap-2">
                    <div class="">
                        <span class="font-light">0</span>
                        <span class="text-gray-800 text-sm mb-3 font-medium">
                            Seguidores
                        </span>
                    </div>
                    <div class="">
                        <span class="font-light">0</span>
                        <span class="text-gray-800 text-sm mb-3 font-medium">
                            Siguiendo
                        </span>
                    </div>
                    <div class="">
                        <span class="font-light">0</span>
                        <span class="text-gray-800 text-sm mb-3 font-medium">
                            Posts
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

@endsection