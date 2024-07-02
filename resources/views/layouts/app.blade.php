<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    @stack('style')
    <title>Catstagram - @yield('titulo')</title>
</head>

<body class="bg-gray-100">
    <header class="p-5 border-b bg-white shadow-inner">
        <div class="flex justify-between">
            <h1 class="text-3xl m-auto font-bold flex ">
                <a href="/" class="flex flex-row-reverse content-center"><span>Catstragram</span>
                <img class="h-full" src="{{ asset('img/icons/icon_cat_catstagram.svg')}}" alt="Icono de Catstagram"></a>
            </h1>
            @auth

                <div class="box-content">         
                    <a href="{{ route('posts.create') }}" class="m-auto flex flex-col p-2 align-middle items-center transition hover:bg-slate-200">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                          </svg> 
                       Crear
                    </a>
                </div>

                <nav class="flex align-middle">
                    <a class="p-2 text-sm uppercase align-middle font-light" href="{{ route("posts.index", [$user = Auth::user()]) }}">Mi Perfil</a>
                    <form action="{{ route('logout') }}" method="POST" class="flex align-middle p-0 m-0 text-sm uppercase font-light">
                        @csrf
                        <button type="submit" class="p-2 uppercase" href="{{ route('logout') }}"/> Cerrar sesión </a>
                    </form>
                </nav>
                

                
            @endauth
            @guest
            <div class="m-auto">
                <nav class="flex flex-row items-center">
                    <a class="border-black border rounded-full p-2 px-3 mx-1 transition-colors hover:bg-teal-950 hover:text-gray-50 hover:border-transparent uppercase font-light" href="{{ route('login') }}">Entrar</a>
                    <a class="border-black border rounded-full p-2 px-3 mx-1 transition-colors hover:bg-teal-950 hover:text-gray-50 hover:border-transparent uppercase font-light" href="{{ route('register') }}">Crear cuenta</a>
                </nav>
            </div>
            @endguest
        </div>
    </header>

    <!-- Información de las vistas !-->
    <main class="container w-full m-auto flex text-center content-center justify-center">

        @yield('contenido')

    </main>


    <footer class="container mx-auto">
        <div class="m-10 text-center text-gray-500 font-extralight">
            CatStagram - Todos los derechos reservados
            {{now() -> year}}
        </div>
    </footer>
</body>
</html>