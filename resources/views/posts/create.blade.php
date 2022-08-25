@extends('layouts.app')

@section('title')
Crear una nueva publicación
@endsection

{{-- insercion de estilos unicos para esta vista --}}
@push('styles')
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush



@section('content')

<section class="md:flex md:justify-center md:gap-10 gap-10 md:items-center">
    <div class="md:w-5/12 ">
        <form action="{{ route('images.store') }}" enctype="multipart/form-data" method="POST" id="dropzone" class="text-gray-400 dropzone bg-white border-dashed border-2 w-full h-96 rounded flex flex-col justify-center items-center">
            @csrf
        </form>
    </div>
    <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-lg md:mt-0 mt-10 ">
        <form action="{{ route('posts.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="title" class="mb-2 block uppercase text-gray-500 font-bold">
                    Titulo
                </label>
                <input
                    type="text"
                    name="title"
                    id="title"
                    value="{{ old('title') }}"
                    placeholder="eje: De vacaciones..."
                    class="border p-3 w-full rounded-lg @error('title') border-red-600 @enderror"
                />
                @error('title')
                    <p class="bg-red-600 text-white my-1 text-sm p-1 rounded-lg text-center">
                        {{$message}}
                    </p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="description" class="mb-2 block uppercase text-gray-500 font-bold">
                    Descripción
                </label>
                <textarea
                    name="description"
                    id="description"
                    placeholder="eje: De vacaciones... conoci el zoologico"
                    class="border p-3 w-full rounded-lg @error('description') border-red-600 @enderror"
                >{{ old('description') }}</textarea>
                @error('description')
                    <p class="bg-red-600 text-white my-1 text-sm p-1 rounded-lg text-center">
                        {{$message}}
                    </p>
                @enderror
            </div>

            <div class="mb-4">
                <input
                    type="hidden"
                    name="image"
                    value="{{old('image')}}"
                />
                @error('image')
                    <p class="bg-red-600 text-white my-1 text-sm p-1 rounded-lg text-center">
                        {{$message}}
                    </p>
                @enderror
            </div>

            <input
                    type="submit"
                    value="Publicar"
                    class="bg-sky-600 mt-3 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-2 text-white rounded"
                />
        </form>
    </div>
</section>



@endsection
