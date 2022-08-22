
@extends('layouts.app')
@section('title')
Crear nueva cuenta
@endsection

@section('content')
    <section class="md:flex md:justify-center md:gap-10 md:items-center">
        <div class="md:w-5/12">
            <img src="{{ asset('images/registrar.jpg') }}" alt="">
        </div>
        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-lg">
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="name" class="mb-2 block uppercase text-gray-500 font-bold">
                        Nombre Completo
                    </label>
                    <input
                        type="text"
                        name="name"
                        id="name"
                        value="{{ old('name') }}"
                        placeholder="eje: Pedrito Gomez"
                        class="border p-3 w-full rounded-lg @error('name') border-red-600 @enderror"
                    />
                    @error('name')
                        <p class="bg-red-600 text-red my-1 text-sm p-1 rounded-lg text-center">
                            {{$message}}
                        </p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="username" class="mb-2 block uppercase text-gray-500 font-bold">
                        Usuario
                    </label>
                    <input
                        type="text"
                        name="username"
                        id="username"
                        value="{{ old('username') }}"
                        placeholder="eje: pedegomez"
                        class="border p-3 w-full rounded-lg @error('username') border-red-600 @enderror"
                    />
                    @error('username')
                        <p class="bg-red-600 text-white my-1 text-sm p-1 rounded-lg text-center">
                            {{$message}}
                        </p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">
                        Email
                    </label>
                    <input
                        type="email"
                        name="email"
                        id="email"
                        value="{{ old('email') }}"
                        placeholder="eje: F4rack@gmail.com"
                        class="border p-3 w-full rounded-lg @error('email') border-red-600 @enderror"
                    />
                    @error('email')
                        <p class="bg-red-600 text-white my-1 text-sm p-1 rounded-lg text-center">
                            {{$message}}
                        </p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="password" class="mb-2 block uppercase text-gray-500 font-bold">
                        Contraseña
                    </label>
                    <input
                        type="password"
                        name="password"
                        id="password"
                        value="{{ old('password') }}"
                        placeholder="eje: F4rack"
                        class="border p-3 w-full rounded-lg @error('password') border-red-600 @enderror"
                    />
                </div>
                @error('password')
                        <p class="bg-red-600 text-white my-1 text-sm p-1 rounded-lg text-center">
                            {{$message}}
                        </p>
                    @enderror
                <div class="mb-4">
                    <label for="password_confirmation" class="mb-2 block uppercase text-gray-500 font-bold">
                        Confirmacion de contraseña
                    </label>
                    <input
                        type="password"
                        name="password_confirmation"
                        id="password_confirmation"
                        value="{{ old('password_confirmation') }}"
                        placeholder="Repite tu constraseña"
                        class="border p-3 w-full rounded-lg @error('password_confirmation') border-red-600 @enderror"
                    />
                    @error('password_confirmation')
                        <p class="bg-red-600 text-white my-1 text-sm p-1 rounded-lg text-center">
                            {{$message}}
                        </p>
                    @enderror
                </div>
                <input
                    type="submit"
                    value="Registrarme"
                    class="bg-sky-600 mt-3 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-2 text-white rounded"
                />
            </form>
        </div>
    </section>
@endsection
