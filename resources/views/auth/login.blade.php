@extends('layouts.app')

@section('contenido')
    <div class="sm:flex sm:justify-center">
        <div class="sm:w-2/6 shadow-md">
            <img src="{{asset('img/registro.jpg')}}" 
                 alt="foto de perfil de un gato"
                 class="w-full h-full object-cover">
        </div>

        <div class="sm:w-5/12 bg-white p-10 shadow-lg">
            <h1 class="text-3xl mb-5">Iniciar sesion</h1>
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="mb-10">
                    <label for="username" class="block font-light mb-2">Usuario o correo electrónico:</label>
                    <input 
                        type="text" 
                        id="username" 
                        name="username"
                        oninput="copiarTexto(this.value)"
                        placeholder="Tu apodo genial o tu correo"
                        class="@error('username') border-red-600 @enderror placeholder:font-extralight w-full border-b-2 bg-white border-gray-400 focus:outline-none focus:border-gray-950 p-2"
                        value="{{ old('username') }}"
                    />
                    <script>
                         function copiarTexto(valor) {
                            // Obtener el segundo input utilizando el atributo name
                            var input2 = document.querySelector('input[name="email"]');

                            // Establecer el mismo valor en el segundo input
                            input2.value = value;
                         }      
                    </script>
                    <input type="hidden" name="email" autocomplete="off" value="."> 
                    @error('username')
                            <p class="text-red-600">{{ $message }}</p>
                        @enderror
                </div>


                <div class="mt-10">
                    <label for="password" class="block font-light mb-2">Contraseña:</label>
                    <input 
                        type="password" 
                        id="password" 
                        name="password" 
                        placeholder="Tu contraseña aquí"
                        class="@error('password') border-red-600 @enderror placeholder:font-extralight w-full border-b-2 bg-white border-gray-400 focus:outline-none focus:border-gray-950 p-2"
                    />
                    @error('password')
                        <p class="text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="mt-5">
                    @if (session('error'))
                        <div class="mb-5 text-red-700">
                           <p class=""> {{ session('error')}} </p>
                        </div>
                        @endif
                    <div class="pb-5">
                        <div class="flex justify-center">
                            <input 
                                id="remember" 
                                type="checkbox" 
                                name="remember" s
                                class="transition-all">

                            <label for="remember" class="py-4 ms-2 font-thin text-gray-900">Recordar mi usuario</label>
                        </div>
                    </div>
                    <input 
                        type="submit" 
                        value="Iniciar sesión"
                        class="bg-green-800 w-full hover:bg-green-600 text-gray-200 p-3 font-thin transition-colors cursor-pointer"
                    />
                </div>
            </form>
        </div>
    </div>
@endsection