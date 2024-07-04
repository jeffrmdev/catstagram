@extends('layouts.app')
@section('titulo','Iniciar Sesion')
@section('contenido')
        <div class="w-10/12 md:w-3/5 bg-white shadow-lg rounded-3xl justify-center md:flex content-center my-5 ">
            <div class="w-full md:w-2/5">
                <img src="{{asset('img/registro.jpg')}}" 
                     alt="foto de perfil de un gato"
                     class="h-full object-cover rounded-t-3xl md:rounded-t-none md:rounded-l-3xl md:aspect-square"
                     >
            </div>
            <div class="w-full h-5/6 md:w-8/12 p-10">
                <h1 class="text-3xl mb-5 text-left">Iniciar Sesion</h1>
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="mb-10 text-left">
                        <label for="username" class="block font-light mb-2">Usuario o correo electrónico:</label>
                        <input 
                            type="text" 
                            id="username" 
                            name="username"
                            oninput="copiarTexto(this.value); borrarError();"
                            placeholder="Tu apodo genial o tu correo"
                            class="@error('username') border-red-600 @enderror placeholder:font-extralight w-full p-3 border rounded-full bg-white border-gray-400 focus:outline-none focus:border-gray-950"
                            value="{{ old('username') }}"
                        />
                        <script>
                            function copiarTexto(valor) {
                                // Obtener el segundo input utilizando el atributo name
                                var input2 = document.querySelector('input[name="email"]');

                                // Establecer el mismo valor en el segundo input
                                input2.value = valor;
                            }  
                            
                            function borrarError(){
                                document.getElementById("username").classList.remove('border-red-600');
                                if(document.querySelector(".message-error-username")){
                                    document.querySelector(".message-error-username").classList.add('hidden');
                                }
                            }

                        </script>
                        <input type="hidden" name="email" autocomplete="off" value="."> 
                        @error('username')
                                <p class="text-red-600 message-error-username">{{ $message }}</p>
                            @enderror
                    </div>


                    <div class="mt-10 text-left">
                        <label for="password" class="block font-light mb-2">Contraseña:</label>
                        <input 
                            type="password" 
                            id="password" 
                            name="password" 
                            placeholder="Tu contraseña aquí"
                            class="@error('password') border-red-600 @enderror placeholder:font-extralight w-full p-3 border rounded-full bg-white border-gray-400 focus:outline-none focus:border-gray-950"
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
                                    <div class="flex items-center justify-center w-full mb-12">
                                        <label for="remember" class="flex items-center cursor-pointer">
                                          <!-- toggle -->
                                          <div class="relative">
                                            <!-- input -->
                                            <input type="checkbox" id="remember" class="sr-only ">
                                            <!-- line -->
                                            <div class="block back w-14 h-8 rounded-full"></div>
                                            <!-- dot -->
                                            <div class="dot absolute left-1 top-1 bg-white w-6 h-6 rounded-full transition"></div>
                                          </div>
                                          <!-- label -->
                                          <div class="py-4 ms-2 font-thin text-gray-900 text-sm md:text-base">
                                            Recordar mi usuario
                                          </div>
                                        </label>
                                      </div>
                                
                            </div>
                        </div>
                        <input 
                            type="submit" 
                            value="Iniciar sesión"
                            class="rounded-full p-2 px-5 mx-1 bg-teal-950 text-gray-50 uppercase font-light transition-colors cursor-pointer hover:bg-teal-700 hover:border-transparent"
                        />
                    </div>
                </form>
            </div>
        </div>
@endsection