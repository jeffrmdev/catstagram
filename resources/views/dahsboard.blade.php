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
            <div class="col-span-2 md:col-span-1 w-full px-5 items-center flex flex-col text-center">
                <p class="p-2 font-medium text-3xl text-gray-800">{{ $user -> username }}</p>
                <div class="flex mt-2 justify-center flex-wrap">
                    <div class="m-2">
                        <p class="font-light">0</p>
                        <p class="text-gray-800 text-sm mb-3 font-medium">
                            Seguidores
                        </p>
                    </div>
                    <div class="m-2">
                        <p class="font-light">0</p>
                        <p class="text-gray-800 text-sm mb-3 font-medium">
                            Siguiendo
                        </p>
                    </div>
                    <div class="m-2">
                        <p class="font-light">0</p>
                        <p class="text-gray-800 text-sm mb-3 font-medium">
                            Posts
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

@endsection