
@extends('layouts.app')
@section('title')
Editar Perfil: {{auth()->user()->username}}
@endsection

@section('content')
<div class="max-w-7xl mx-auto md:flex md:justify-center">
    <div class="md:w-1/2 bg-white shadow p-6">
        <form action="{{route('profile.store')}}" enctype="multipart/form-data" method="POST" class="mt-10">
            @csrf

            <div class="mb-4">
                <label for="username" class="mb-2 block uppercase text-gray-500 font-bold">
                    Nombre de usuario
                </label>
                <input
                    type="text"
                    name="username"
                    id="username"
                    value="{{ auth()->user()->username }}"
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
                <label for="image" class="mb-2 block uppercase text-gray-500 font-bold">
                    Imagen Perfil
                </label>
                <input
                    type="file"
                    name="image"
                    id="image"
                    accept=".jpg, .jpeg, .png"
                    class="border p-3 w-full rounded-lg "
                />
                @error('image')
                    <p class="bg-red-600 text-white my-1 text-sm p-1 rounded-lg text-center">
                        {{$message}}
                    </p>
                @enderror
            </div>

            <input
                type="submit"
                value="Guardar Cambios"
                class="bg-sky-600 mt-3 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-2 text-white rounded"
            />
        </form>
    </div>

</div>
@endsection



