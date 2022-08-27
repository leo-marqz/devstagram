@extends('layouts.app')

@section('title')
{{$post->title}}
@endsection

@section('content')
<div class="container mx-auto flex gap-5 justify-center">
    <div class="md:w-1/3">
        <img src="{{asset('uploads') . '/' . $post->image}}" alt="Imagen del post: {{$post->title}}">
        <div class="py-2 px-0">
            <p class="">0 likes</p>
        </div>
        <div class="">
            <p class="font-bold">{{$post->user->username}}</p>
            {{-- diffForHumans formatea la fecha eje: 'hace 1 dia' --}}
            <p class="text-sm text-gray-500">{{$post->created_at->diffForHumans()}}</p>
            <p class="mt-1">
                {{$post->description}}
            </p>
        </div>
    </div>
    {{-- ------------------------------- --}}
    <div class="md:w-1/3">
        <div class="shadow bg-white p-5 mb-5">
            <p class="text-xl font-bold text-center mb-4">
                Agrega un nuevo comentario
            </p>
            <form action="#">
                @csrf

                <div class="mb-4">
                    <label for="comment" class="mb-2 block uppercase text-gray-500 font-bold">
                        Comentario
                    </label>
                    <textarea
                        name="comment"
                        id="comment"
                        placeholder="eje: Que hermosa fotografia!!"
                        class="border p-3 w-full rounded-lg @error('comment') border-red-600 @enderror"
                    ></textarea>
                    @error('comment')
                        <p class="bg-red-600 text-white my-1 text-sm p-1 rounded-lg text-center">
                            {{$message}}
                        </p>
                    @enderror
                </div>

                <input
                    type="submit"
                    value="Comentar"
                    class="bg-sky-600 mt-3 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-2 text-white rounded"
                />
            </form>
        </div>
    </div>

</div>
@endsection
