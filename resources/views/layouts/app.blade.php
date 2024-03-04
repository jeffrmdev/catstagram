<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite('resources/css/app.css')
    <title>Devstagram - @yield('titulo')</title>
</head>

<body class="bg-gray-100">
    <header class="p-5 border-b bg-white shadow-inner">
        <div class=" container mx-auto flex justify-between p-5 border-p items-center">
            <h1 class="text-3xl font-bold">
                <a href="/">CatStragram</a>
            </h1>
            @auth
                <nav class="flex gap-2 items-center align-baseline md:grid">
                  <a class="text-sm uppercase font-light" href="{{ route("post.index", [$user = Auth::user()]) }}">Mi Perfil</a>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="text-sm uppercase font-light" href="{{ route('logout') }}">Cerrar sesión</button>
                    </form>
                </nav>
            @endauth
            @guest
                <nav class="flex gap-2 items-center">
                    <a class="text-sm uppercase font-light" href="{{ route('login') }}">Entrar</a>
                    <a class="text-sm uppercase font-light" href="{{ route('register') }}">Crear cuenta</a>
                </nav>
            @endguest
        </div>
    </header>

    <!-- Información de las vistas !-->
    <main class="container mx-auto">
        <h2 class="font-thin text-center text-4xl mt-5 mb-10">
            @yield('titulo')
        </h2>

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