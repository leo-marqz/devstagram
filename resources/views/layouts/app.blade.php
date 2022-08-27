<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>DevStagram - @yield('title')</title>
        {{-- espacio reservador para estilos css --}}
        @stack('styles')
        @stack('scripts')
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

    </head>
    <body class="bg-gray-100">

        <header class="p-5 border-b bg-white shadow">
            <div class="max-w-7xl mx-auto flex justify-between">
                <a href="{{ route('main') }}" class="text-3xl font-black hover:text-rose-500">
                    <h1>DevStagram</h1>
                </a>

                @auth
                    {{-- if authenticated --}}
                    <nav class="flex gap-2 items-center">
                        <a
                        class="flex items-center gap-2 bg-white border hover:border-gray-600 p-2 text-gray-500 rounded text-sm uppercase font-bold cursor-pointer hover:text-gray-700"
                        href="{{ route('posts.create') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        Crear
                        </a>
                        <a href="{{ route('posts.index', auth()->user()->username) }}" class="font-bold  text-gray-500 text hover:text-gray-700">
                            Hi:
                            <span class="font-normal">
                                 {{ auth()->user()->username }}
                            </span>
                        </a>
                        <form action="{{ route('logout') }}" class="" method="POST">
                            @csrf
                            <button
                                title="Logout"
                                type="submit"
                                class="text-gray-500 border p-2 rounded text-sm uppercase font-bold cursor-pointer  hover:text-red-500 hover:border-red-500 ">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                  </svg>
                            </button>
                        </form>
                    </nav>
                @endauth
                @guest
                    <nav class="flex gap-2 items-center">
                        <a href="{{ route('login') }}" class="font-bold capitalize text-gray-600 text hover:text-amber-600">
                            login
                        </a>
                        <a href="{{ route('register') }}" class="font-bold capitalize text-gray-600 text hover:text-sky-600">
                            sign up
                        </a>
                    </nav>
                @endguest
            </div>
        </header>

        <main class="max-w-7xl mx-auto mt-10">
            <h2 class="font-black text-center text-3xl mb-10">
                @yield('title')
            </h2>
            @yield('content')
        </main>

        <footer class="mt-10 text-center p-5 text-gray-500 font-bold capitalize">
            Copyright © {{ now()->year }}  DevStagram
        </footer>

        {{-- <script src="{{ asset('js/index.js') }}"></script> --}}
    </body>
</html>
