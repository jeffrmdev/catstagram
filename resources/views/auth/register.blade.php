@extends('layouts.app')

@section('titulo')
    Registrarse en CatStagram
@endsection

@section('contenido')
    <div class="md:flex md:justify-center md:gap-6 md:items-center">
        <div class="md:w-2/5 shadow-md">
            <img src="{{asset('img/registro.jpg')}}" 
                 alt="foto de perfil de un gato"
                 class="w-full h-full object-cover object-center">
        </div>

        <div class="md:w-1/2 bg-white p-10 shadow-lg">
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="mb-4 flex">
                    <div class="w-1/2 mr-2">
                        <label for="name" class="block font-light mb-2">Nombre:</label>
                        <input 
                            type="text" 
                            id="name" 
                            name="name" 
                            placeholder="Tu nombre aquí"
                            class="@error('name') border-red-600 @enderror placeholder:italic w-full border-b-2 bg-white border-gray-400 focus:outline-none focus:border-gray-950 p-2"
                            value="{{ old('name') }}"
                       />
                        @error('name')
                            <p class="text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="w-1/2 ml-2">
                        <label for="lastname" class="block font-light mb-2">Apellido:</label>
                        <input 
                            type="text" 
                            id="lastname" 
                            name="lastname"
                            placeholder="También tu apellido"
                            class="@error('lastname') border-red-600 @enderror placeholder:italic w-full border-b-2 bg-white border-gray-400 focus:outline-none focus:border-gray-950 p-2"
                            value="{{ old('lastname') }}"
                        />
                        @error('lastname')
                            <p class="text-red-600">{{ $message }}</p>
                        @enderror 
                    </div>
                </div>
                <div class="">
                    <label for="username" class="block font-light mb-2">Nombre de usuario:</label>
                    <input 
                        type="text" 
                        id="username" 
                        name="username"
                        placeholder="Puede ser un apodo genial"
                        class="@error('username') border-red-600 @enderror placeholder:italic w-full border-b-2 bg-white border-gray-400 focus:outline-none focus:border-gray-950 p-2"
                        value="{{ old('username') }}"
                    />
                    @error('username')
                            <p class="text-red-600">{{ $message }}</p>
                        @enderror
                </div>
                <div class=" mt-4">
                    <label for="email" class="block font-light mb-2">Correo:</label>
                    <input 
                        type="text" 
                        id="email" 
                        name="email"
                        placeholder="Tu correo electrónico"
                        class="@error('email') border-red-600 @enderror placeholder:italic w-full border-b-2 bg-white border-gray-400 focus:outline-none focus:border-gray-950 p-2"
                        value="{{ old('email') }}"
                    />
                    @error('email')
                            <p class="text-red-600">{{ $message }}</p>
                        @enderror
                </div>
                <div class="mb-4 flex mt-4">
                    <div class="w-1/2 mr-2">
                        <label for="password" class="block font-light mb-2">Contraseña:</label>
                        <input 
                            type="password" 
                            id="password" 
                            name="password" 
                            placeholder="Tu contraseña aquí"
                            class="@error('password') border-red-600 @enderror placeholder:italic w-full border-b-2 bg-white border-gray-400 focus:outline-none focus:border-gray-950 p-2"
                        />
                        @error('password')
                            <p class="text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="w-1/2 ml-2">
                        <label for="password_confirmation" class="block font-light mb-2">Confirma tu contraseña:</label>
                        <input 
                            type="password" 
                            id="password_confirmation" 
                            name="password_confirmation"
                            placeholder="Valida tu contraseña"
                            class="@error('password') border-red-600 @enderror placeholder:italic w-full border-b-2 bg-white border-gray-400 focus:outline-none focus:border-gray-950 p-2"
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
                        class="bg-green-800 w-full hover:bg-green-600 text-gray-200 p-3 font-thin transition-colors cursor-pointer"
                    />
                </div>
            </form>
        </div>
    </div>
@endsection