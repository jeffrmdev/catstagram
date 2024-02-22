@extends('layouts.app')

@section('titulo')
    Registrarse en CatStagram
@endsection

@section('contenido')
    <div class="md:flex md:justify-center md:gap-6 md:items-center">
        <div class="md:w-2/5 shadow-md">
            <img src="{{asset('img/perfil.jpg')}}" 
                 alt="foto de perfil de un gato"
                 class="w-full h-full object-cover object-center">
        </div>

        <div class="md:w-1/2 bg-white p-10 shadow-lg">
            <form>
                <div class="mb-4 flex">
                    <div class="w-1/2 mr-2">
                        <label for="nombre" class="block font-light mb-2">Nombre:</label>
                        <input 
                            type="text" 
                            id="nombre" 
                            name="nombre" 
                            placeholder="Tu nombre aquí"
                            class="placeholder:italic w-full border-b-2 bg-white border-gray-400 focus:outline-none focus:border-gray-950 p-2"
                        />
                    </div>
                    <div class="w-1/2 ml-2">
                        <label for="apellido" class="block font-light mb-2">Apellido:</label>
                        <input 
                            type="text" 
                            id="apellido" 
                            name="apellido"
                            placeholder="También tu apellido"
                            class="placeholder:italic w-full border-b-2 bg-white border-gray-400 focus:outline-none focus:border-gray-950 p-2"
                        />
                    </div>
                </div>
                <div class="">
                    <label for="apellido" class="block font-light mb-2">Nombre de usuario:</label>
                    <input 
                        type="text" 
                        id="apellido" 
                        name="apellido"
                        placeholder="Puede ser un apodo genial"
                        class="placeholder:italic w-full border-b-2 bg-white border-gray-400 focus:outline-none focus:border-gray-950 p-2"
                    />
                </div>
                <div class=" mt-4">
                    <label for="email" class="block font-light mb-2">Correo:</label>
                    <input 
                        type="text" 
                        id="email" 
                        name="email"
                        placeholder="Tu correo electrónico"
                        class="placeholder:italic w-full border-b-2 bg-white border-gray-400 focus:outline-none focus:border-gray-950 p-2"
                    />
                </div>
                <div class="mb-4 flex mt-4">
                    <div class="w-1/2 mr-2">
                        <label for="password" class="block font-light mb-2">Contraseña:</label>
                        <input 
                            type="text" 
                            id="password" 
                            name="password" 
                            placeholder="Tu contraseña aquí"
                            class="placeholder:italic w-full border-b-2 bg-white border-gray-400 focus:outline-none focus:border-gray-950 p-2"
                        />
                    </div>
                    <div class="w-1/2 ml-2">
                        <label for="password_confirmation" class="block font-light mb-2">Confirma tu contraseña:</label>
                        <input 
                            type="text" 
                            id="password_confirmation" 
                            name="password_confirmation"
                            placeholder="Valida tu contraseña"
                            class="placeholder:italic w-full border-b-2 bg-white border-gray-400 focus:outline-none focus:border-gray-950 p-2"
                        />
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