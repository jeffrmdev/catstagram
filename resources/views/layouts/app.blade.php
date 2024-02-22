<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite('resources/css/app.css')
    <title>Devstagram - @yield('titulo')</title>
</head>

<body class="bg-gray-100">
    <header class="p-5 border-b bg-white shadow">
        <div class=" container mx-auto flex justify-between p-5 border-p items-center">
            <h1 class="text-3xl font-bold">
                <a href="/">CatStragram</a>
            </h1>

            <nav class="flex gap-2 items-center">
                <a class="text-sm uppercase font-light" href="#">Login</a>
                <a class="text-sm uppercase font-light" href="/crear-cuenta">Crear cuenta</a>
            </nav>
        </div>
    </header>

    <!-- Información de las vistas !-->
    <main class="container mx-auto">
        <h2 class="font-thin text-pretty text-2xl mt-10 mb-10">
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