@extends('layouts.app')

@section('titulo')
Crea una nueva publicacion
@endsection


@section('contenido')
<div class="m-auto sm:w-9/12">
    <div class="sm:flex justify-center bg-white">
        <div class="flex flex-col justify-center align-middle items-center sm:w-2/3">
            <form action="/target" id="dropzone" class="dropzone border-2 border-dashed border-black w-full h-full">
              {{--  <img src="{{ asset('img/cat-keyboard.gif')}}" alt="" class="img object-cover w-screen h-full">
                <input type="file" value="Agregar Foto" class="w-full bg-slate-900 p-2 text-white text-sm hover:bg-slate-700 transition-colors"> --}}
            </form>
        </div>
        <div class="w-full">
            <form action="">
            <div class="sm:flex sm:flex-col h-full">
                <div class="mx-7 mt-7 text-left">
                    <label for="title" class="block font-light mb-2">Titulo de tu imagen</label>
                    <input 
                        type="text" 
                        name="title" 
                        id="title"
                        class="@error('password') border-red-600 @enderror placeholder:font-extralight w-full border-b-2 bg-white border-gray-400 focus:outline-none focus:border-gray-950 p-2"
                    />
                </div>
                <div class="mx-7 mt-7 text-left">
                    <label for="description" class="block font-light mb-2">Escribe algo</label>
                    <textarea 
                        name="description" 
                        id="description"
                        class="@error('password') border-red-600 @enderror 
                        placeholder:font-extralight w-full border-b-2 
                        bg-white border-gray-400 focus:outline-none focus:border-gray-950
                        p-2"
                    ></textarea>
                </div>
                <div>
                    <div class="flex justify-center items-end h-32">
                        <button class="bg-green-900 p-2 w-32 m-5 text-white transition-colors hover:bg-green-700">Publicar</button>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>

@endsection