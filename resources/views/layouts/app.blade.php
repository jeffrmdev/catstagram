<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @stack('style')
    @vite('resources/js/dropzone.js')
    @vite('resources/js/responsive-nav.js')
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <title>Catstagram - @yield('titulo')</title>
</head>

<body class="bg-gray-100">
    <header class="p-3 md:p-5 border-b bg-white shadow-inner">
        <div class="flex md:grid md:grid-cols-3 justify-between p-1">
            <div class="@auth hidden @endauth text-3xl @guest col-span-1 @endguest font-bold md:flex md:m-auto col-start-1">
                <a href="/" class="flex flex-row-reverse"><span class="@auth hidden lg:block @endauth">Catstragram</span>
                <img class="w-10 h-10 md:h-full" src="{{ asset('img/icons/icon_cat_catstagram.svg')}}" alt="Icono de Catstagram"></a>
            </div>
            @auth
                <div class="box-content md:flex m-auto grid grid-cols-6 md:gap-4 w-full md:w-auto">
                    <a href="/" class="group/menu m-auto flex relative flex-col p-2 uppercase align-middle items-center transition hover:bg-slate-200 rounded-3xl">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="w-6 h-6"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M575.8 255.5c0 18-15 32.1-32 32.1h-32l.7 160.2c0 2.7-.2 5.4-.5 8.1V472c0 22.1-17.9 40-40 40H456c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1H416 392c-22.1 0-40-17.9-40-40V448 384c0-17.7-14.3-32-32-32H256c-17.7 0-32 14.3-32 32v64 24c0 22.1-17.9 40-40 40H160 128.1c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2H104c-22.1 0-40-17.9-40-40V360c0-.9 0-1.9 .1-2.8V287.6H32c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z"/></svg>
                          <span class="text-xs absolute top-10 hidden opacity-0 md:block md:group-hover/menu:opacity-100 transition-opacity">Inicio</span> 
                    </a>
                    <a href="{{ route('posts.create') }}" class="group/menu m-auto flex relative flex-col p-2 uppercase align-middle items-center transition hover:bg-slate-200 rounded-3xl" title="Crear">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-6 h-6"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#000000" d="M0 96C0 60.7 28.7 32 64 32H448c35.3 0 64 28.7 64 64V416c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V96zM323.8 202.5c-4.5-6.6-11.9-10.5-19.8-10.5s-15.4 3.9-19.8 10.5l-87 127.6L170.7 297c-4.6-5.7-11.5-9-18.7-9s-14.2 3.3-18.7 9l-64 80c-5.8 7.2-6.9 17.1-2.9 25.4s12.4 13.6 21.6 13.6h96 32H424c8.9 0 17.1-4.9 21.2-12.8s3.6-17.4-1.4-24.7l-120-176zM112 192a48 48 0 1 0 0-96 48 48 0 1 0 0 96z"/></svg>
                          <span class="text-xs absolute top-10 hidden opacity-0 md:block md:group-hover/menu:opacity-100 transition-opacity" title="Crear">Crear</span> 
                    </a>
                    <a class="group/menu m-auto flex relative flex-col p-2 uppercase align-middle items-center transition hover:bg-slate-200 rounded-3xl" title="Perfil" href="{{ route("posts.index", [$user = Auth::user()]) }}">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="w-6 h-6"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M304 128a80 80 0 1 0 -160 0 80 80 0 1 0 160 0zM96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM49.3 464H398.7c-8.9-63.3-63.3-112-129-112H178.3c-65.7 0-120.1 48.7-129 112zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3z"/></svg>
                        <span class="text-xs absolute top-10 hidden opacity-0 md:block md:group-hover/menu:opacity-100 transition-opacity" title="Perfil">Perfil</span> 
                    </a>
                    <a class="group/menu m-auto flex relative flex-col p-2 uppercase align-middle items-center transition hover:bg-slate-200 rounded-3xl" href="">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-6 h-6"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#000000" d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z"/></svg>
                        <span class="text-xs absolute top-10 hidden opacity-0 md:block md:group-hover/menu:opacity-100 transition-opacity">Buscar</span> 
                    </a>
                    <a class="group/menu m-auto flex relative flex-col p-2 uppercase align-middle items-center transition hover:bg-slate-200 rounded-3xl" alt="Notificaciones" href="">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="w-6 h-6"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M224 0c-17.7 0-32 14.3-32 32V51.2C119 66 64 130.6 64 208v25.4c0 45.4-15.5 89.5-43.8 124.9L5.3 377c-5.8 7.2-6.9 17.1-2.9 25.4S14.8 416 24 416H424c9.2 0 17.6-5.3 21.6-13.6s2.9-18.2-2.9-25.4l-14.9-18.6C399.5 322.9 384 278.8 384 233.4V208c0-77.4-55-142-128-156.8V32c0-17.7-14.3-32-32-32zm0 96c61.9 0 112 50.1 112 112v25.4c0 47.9 13.9 94.6 39.7 134.6H72.3C98.1 328 112 281.3 112 233.4V208c0-61.9 50.1-112 112-112zm64 352H224 160c0 17 6.7 33.3 18.7 45.3s28.3 18.7 45.3 18.7s33.3-6.7 45.3-18.7s18.7-28.3 18.7-45.3z"/></svg>
                        <span class="text-xs absolute top-10 hidden opacity-0 md:block md:group-hover/menu:opacity-100 transition-opacity">Notificaciones</span> 
                    </a>
                    <form action="{{ route('logout') }}" method="POST" class="m-auto flex flex-col p-2 uppercase align-middle items-center transition hover:bg-slate-200 md:hidden">
                        @csrf
                        <button type="submit" class="uppercase rounded-3xl" href="{{ route('logout') }}"> 
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-6 h-6"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M495.9 166.6c3.2 8.7 .5 18.4-6.4 24.6l-43.3 39.4c1.1 8.3 1.7 16.8 1.7 25.4s-.6 17.1-1.7 25.4l43.3 39.4c6.9 6.2 9.6 15.9 6.4 24.6c-4.4 11.9-9.7 23.3-15.8 34.3l-4.7 8.1c-6.6 11-14 21.4-22.1 31.2c-5.9 7.2-15.7 9.6-24.5 6.8l-55.7-17.7c-13.4 10.3-28.2 18.9-44 25.4l-12.5 57.1c-2 9.1-9 16.3-18.2 17.8c-13.8 2.3-28 3.5-42.5 3.5s-28.7-1.2-42.5-3.5c-9.2-1.5-16.2-8.7-18.2-17.8l-12.5-57.1c-15.8-6.5-30.6-15.1-44-25.4L83.1 425.9c-8.8 2.8-18.6 .3-24.5-6.8c-8.1-9.8-15.5-20.2-22.1-31.2l-4.7-8.1c-6.1-11-11.4-22.4-15.8-34.3c-3.2-8.7-.5-18.4 6.4-24.6l43.3-39.4C64.6 273.1 64 264.6 64 256s.6-17.1 1.7-25.4L22.4 191.2c-6.9-6.2-9.6-15.9-6.4-24.6c4.4-11.9 9.7-23.3 15.8-34.3l4.7-8.1c6.6-11 14-21.4 22.1-31.2c5.9-7.2 15.7-9.6 24.5-6.8l55.7 17.7c13.4-10.3 28.2-18.9 44-25.4l12.5-57.1c2-9.1 9-16.3 18.2-17.8C227.3 1.2 241.5 0 256 0s28.7 1.2 42.5 3.5c9.2 1.5 16.2 8.7 18.2 17.8l12.5 57.1c15.8 6.5 30.6 15.1 44 25.4l55.7-17.7c8.8-2.8 18.6-.3 24.5 6.8c8.1 9.8 15.5 20.2 22.1 31.2l4.7 8.1c6.1 11 11.4 22.4 15.8 34.3zM256 336a80 80 0 1 0 0-160 80 80 0 1 0 0 160z"/></svg>
                            <span class="text-xs hidden md:block">Cerrar sesión</span> 
                        </button>
                        
                    </form>
                </div>

                <nav class="hidden md:block m-auto justify-self-center box-content">
                    
                    <form action="{{ route('logout') }}" method="POST" class="flex align-middle p-0 m-0 text-sm uppercase font-light cursor-pointer">
                        @csrf
                        <button type="submit" class="p-2 uppercase relative group/menu hover:bg-slate-200 rounded-3xl transition-all" href="{{ route('logout') }}"> 
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-6 h-6"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M495.9 166.6c3.2 8.7 .5 18.4-6.4 24.6l-43.3 39.4c1.1 8.3 1.7 16.8 1.7 25.4s-.6 17.1-1.7 25.4l43.3 39.4c6.9 6.2 9.6 15.9 6.4 24.6c-4.4 11.9-9.7 23.3-15.8 34.3l-4.7 8.1c-6.6 11-14 21.4-22.1 31.2c-5.9 7.2-15.7 9.6-24.5 6.8l-55.7-17.7c-13.4 10.3-28.2 18.9-44 25.4l-12.5 57.1c-2 9.1-9 16.3-18.2 17.8c-13.8 2.3-28 3.5-42.5 3.5s-28.7-1.2-42.5-3.5c-9.2-1.5-16.2-8.7-18.2-17.8l-12.5-57.1c-15.8-6.5-30.6-15.1-44-25.4L83.1 425.9c-8.8 2.8-18.6 .3-24.5-6.8c-8.1-9.8-15.5-20.2-22.1-31.2l-4.7-8.1c-6.1-11-11.4-22.4-15.8-34.3c-3.2-8.7-.5-18.4 6.4-24.6l43.3-39.4C64.6 273.1 64 264.6 64 256s.6-17.1 1.7-25.4L22.4 191.2c-6.9-6.2-9.6-15.9-6.4-24.6c4.4-11.9 9.7-23.3 15.8-34.3l4.7-8.1c6.6-11 14-21.4 22.1-31.2c5.9-7.2 15.7-9.6 24.5-6.8l55.7 17.7c13.4-10.3 28.2-18.9 44-25.4l12.5-57.1c2-9.1 9-16.3 18.2-17.8C227.3 1.2 241.5 0 256 0s28.7 1.2 42.5 3.5c9.2 1.5 16.2 8.7 18.2 17.8l12.5 57.1c15.8 6.5 30.6 15.1 44 25.4l55.7-17.7c8.8-2.8 18.6-.3 24.5 6.8c8.1 9.8 15.5 20.2 22.1 31.2l4.7 8.1c6.1 11 11.4 22.4 15.8 34.3zM256 336a80 80 0 1 0 0-160 80 80 0 1 0 0 160z"/></svg>
                            <span class="text-xs absolute top-3 left-0 hidden md:block opacity-0 group-hover/menu:opacity-100 group-hover/menu:left-11 transition-all">Ajustes</span> 
                        </button>
                        
                    </form>
                </nav>
                

                
            @endauth
            @guest
            <div class="md:m-auto relative content-center col-start-3">
                <a class="hidden" id="nav-bar">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#000000" d="M0 96C0 78.3 14.3 64 32 64H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H416c17.7 0 32 14.3 32 32z"/></svg>
                </a>
                <nav class="items-center flex gap-1 transition-all" id="nav-buttons">
                    <a class="border-black border rounded-full p-2 px-3 text-center transition-colors hover:bg-teal-950 hover:text-gray-50 hover:border-transparent uppercase font-light login-buttons" href="{{ route('login') }}">Entrar</a>
                    <a class="border-black border rounded-full p-2 px-3 responsive block w-full my-1 transition-colors hover:bg-teal-950 hover:text-gray-50 hover:border-transparent uppercase font-light login-buttons" href="{{ route('register') }}">Crear cuenta</a> 
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