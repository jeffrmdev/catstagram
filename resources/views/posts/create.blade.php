@extends('layouts.app')

@section('contenido')

<div class="m-auto sm:w-9/12">
    <div class="sm:flex justify-center bg-white shadow-lg">
        <div class="flex flex-col justify-center align-middle items-center sm:w-2/3">
            <form action="{{ route('imagen.store') }}" 
            id="dropzone" 
            class="dropzone box-content flex flex-col justify-center align-middle items-center border-2 border-dashed border-black w-full h-full"
            enctype="multipart/form-data"
            method="POST">
            @csrf
              {{--  <img src="{{ asset('img/cat-keyboard.gif')}}" alt="" class="img object-cover w-screen h-full">
                <input type="file" value="Agregar Foto" class="w-full bg-slate-900 p-2 text-white text-sm hover:bg-slate-700 transition-colors"> --}}
            </form>
        </div>
        <div class="w-full">
            <form method="POST" action="{{ route('posts.store') }}" novalidate>
                @csrf
                <div class="sm:flex sm:flex-col h-full">
                    <div class="mx-7 mt-7 text-left">
                        <h2 class="text-3xl mb-10 text-left">Crea una nueva publicacion</h2>
                        <label for="title" class="block font-light mb-2">Titulo de tu imagen</label>
                        <input 
                            type="text" 
                            name="title" 
                            id="title"
                            value="{{ old('title') }}"
                            oninput="Desaparecer('titleError','title');"
                            class="@error('title') border-red-600 @enderror placeholder:font-extralight w-full border-b-2 bg-white border-gray-400 focus:outline-none focus:border-gray-950 p-2"
                        />
                        @error('title')
                            <p id="titleError" class="text-red-600">{{ $message }}</p>
                        @enderror
                        

                    </div>
                    <div class="mx-7 mt-7 text-left">
                        <label for="description" class="block font-light mb-2">Escribe algo</label>
                        <textarea 
                            name="description" 
                            id="description"
                            value="{{ old('description') }}"
                            oninput="Desaparecer('descError','description');"
                            class="@error('description') border-red-600 @enderror 
                            placeholder:font-extralight w-full border-b-2 
                            bg-white border-gray-400 focus:outline-none focus:border-gray-950
                            p-2"
                        ></textarea>
                        @error('description')
                            <p id="descError" class="text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <div>
                            <input 
                                type="hidden" 
                                id="image" 
                                name="image"
                                value="{{ old('image') }}"
                            />
                            @error('image')
                                <p class="text-red-600">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="flex justify-center items-end h-32">
                            <button type="submit" class="bg-green-900 p-2 w-32 m-5 text-white transition-colors hover:bg-green-700">Publicar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    function Desaparecer(id,item){ 
        try {
            let error = document.getElementById(id);
            let border = document.getElementById(item);
            border.classList.remove('border-red-600');
            error.style.display = 'none';

        } catch (error) {}
        
    }
</script>

@endsection