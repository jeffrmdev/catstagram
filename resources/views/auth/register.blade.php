@extends('layouts.app')

@section('titulo','Registro de usuario')


@section('contenido')
    <div class="w-3/5 bg-white flex justify-center my-5 rounded-3xl">
        <div class="w-2/5">
            <img src="{{asset('img/registro.jpg')}}" 
                 alt="foto de perfil de un gato"
                 class="h-full aspect-square rounded-l-3xl object-cover">
        </div>

        <div class="w-8/12 p-10">
            <h1 class="text-3xl mb-5 text-left">Registrate en <strong>Catstagram</strong></h1>
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="mt-10 flex">
                    <div class="w-1/2 mr-2">
                        <label for="name" class="text-left block font-light mb-2">Nombre:</label>
                        <input 
                            type="text" 
                            id="name" 
                            name="name" 
                            placeholder="Ej: Milaneso"
                            class="@error('name') border-red-600 @enderror placeholder:font-extralight w-full border rounded-full bg-white border-gray-400 focus:outline-none focus:border-gray-950 p-3"
                            value="{{ old('name') }}"
                       />
                        @error('name')
                            <p class="text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="w-1/2 ml-2">
                        <label for="lastname" class="text-left block font-light mb-2">Apellido:</label>
                        <input 
                            type="text" 
                            id="lastname" 
                            name="lastname"
                            placeholder="Ej: Delgado"
                            class="@error('lastname') border-red-600 @enderror placeholder:font-extralight w-full border rounded-full bg-white border-gray-400 focus:outline-none focus:border-gray-950 p-3"
                            value="{{ old('lastname') }}"
                        />
                        @error('lastname')
                            <p class="text-red-600">{{ $message }}</p>
                        @enderror 
                    </div>
                </div>
                <div class="mt-4">
                    <label for="username" class="text-left block font-light mb-2">Nombre de usuario:</label>
                    <input 
                        type="text" 
                        id="username" 
                        name="username"
                        placeholder="Puede ser un apodo genial"
                        class="@error('username') border-red-600 @enderror placeholder:font-extralight w-full border rounded-full bg-white border-gray-400 focus:outline-none focus:border-gray-950 p-3"
                        value="{{ old('username') }}"
                    />
                    @error('username')
                            <p class="text-red-600">{{ $message }}</p>
                        @enderror
                </div>
                <div class="mt-4">
                    <label for="email" class="text-left block font-light mb-2">Correo:</label>
                    <input 
                        type="text" 
                        id="email" 
                        name="email"
                        placeholder="Ej: milaneso@correo.com"
                        class="@error('email') border-red-600 @enderror placeholder:font-extralight w-full border rounded-full bg-white border-gray-400 focus:outline-none focus:border-gray-950 p-3"
                        value="{{ old('email') }}"
                    />
                    @error('email')
                            <p class="text-red-600">{{ $message }}</p>
                        @enderror
                </div>
                <div class="mb-4 flex mt-4">
                    <div class="w-1/2 mr-2">
                        <label for="password" class="text-left block font-light mb-2">Contraseña:</label>
                        <input 
                            type="password" 
                            id="password" 
                            name="password" 
                            placeholder="Tu contraseña aquí"
                            class="@error('password') border-red-600 @enderror placeholder:font-extralight w-full border rounded-full bg-white border-gray-400 focus:outline-none focus:border-gray-950 p-3"
                        />
                        @error('password')
                            <p class="text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="w-1/2 ml-2">
                        <label for="password_confirmation" class="text-left block font-light mb-2">Confirma tu contraseña:</label>
                        <input 
                            type="password" 
                            id="password_confirmation" 
                            name="password_confirmation"
                            placeholder="Valida tu contraseña"
                            class="@error('password') border-red-600 @enderror placeholder:font-extralight w-full border rounded-full bg-white border-gray-400 focus:outline-none focus:border-gray-950 p-3"
                        />
                        @error('password')
                            <p class="text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="mt-8">
                    <input 
                        type="submit" 
                        value="Crear cuenta"
                        class="rounded-full p-2 px-5 mx-1 bg-teal-950 text-gray-50 uppercase font-light transition-colors cursor-pointer hover:bg-teal-700 hover:border-transparent"
                    />
                </div>
            </form>
        </div>
    </div>
@endsection