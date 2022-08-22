<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>DevStagram - @yield('title')</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

    </head>
    <body class="bg-gray-100">

        <header class="p-5 border-b bg-white shadow">
            <div class="container mx-auto flex justify-between">
                <a href="{{ route('main') }}" class="text-3xl font-black hover:text-rose-500">
                    <h1>DevStagram</h1>
                </a>

                @auth
                    {{-- if authenticated --}}
                    <nav class="flex gap-2 items-center">
                        <a href="{{ route('login') }}" class="font-bold  text-gray-600 text hover:text-amber-600">
                            Hola:
                            <span class="font-normal">
                                 {{ auth()->user()->username }}
                            </span>
                        </a>
                        <form action="{{ route('logout') }}" class="" method="POST">
                            @csrf
                            <button type="submit" class="font-bold rounded-lg text-gray-500 hover:text-red-600 ">
                                Logout
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

        <main class="container mx-auto mt-10">
            <h2 class="font-black text-center text-3xl mb-10">
                @yield('title')
            </h2>
            @yield('content')
        </main>

        <footer class="mt-10 text-center p-5 text-gray-500 font-bold capitalize">
            Copyright © {{ now()->year }}  DevStagram
        </footer>

        <script src="{{ asset('js/index.js') }}"></script>
    </body>
</html>
