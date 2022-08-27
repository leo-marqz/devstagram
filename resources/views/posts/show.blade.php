@extends('layouts.app')

@section('title')
{{$post->title}}
@endsection

@section('content')
<div class="container mx-auto md:flex md:justify-center gap-5 justify-center">
    <div class="md:w-5/12">
        <img src="{{asset('uploads') . '/' . $post->image}}" alt="Imagen del post: {{$post->title}}">
        <div class="py-1 px-0">
            <p class=""> <span>💖</span> 1 likes</p>
        </div>
        <div class="">
            <p class="font-bold">
                {{$post->user->username}}
                <span class="font-normal text-gray-600 text-sm ml-2">
                    {{$post->created_at->diffForHumans()}}
                </span>
            </p>
            {{-- diffForHumans formatea la fecha eje: 'hace 1 dia' --}}
            <p class="mt-1">
                {{$post->description}}
            </p>
        </div>
    </div>
    {{-- ------------------------------- --}}
    <div class="md:w-5/12">
        <div class="shadow bg-white p-5 border-lg  mb-5">
            @auth
            <p class="text-2xl font-bold text-center mb-4">
                Agrega un nuevo comentario
            </p>

            <p class="@if(session('message')) bg-green-500 @endif p-2 rounded-lg mb-6 text-white text-center uppercase">
                  @if (session('message'))
                {{session('message')}}
                @endif
              </p>

            <form action="{{route('comments.store', ['user'=>$user, 'post'=>$post])}}" method="POST">
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
            @endauth

            <div class="bg-white shadow mb-5 max-h-72 overflow-scroll border p-3 mt-6 rounded-lg">
                @if ($post->comments->count())
                    @foreach ($post->comments as $comment)
                        <div class="p-5 border-b border-gray-300">
                            <a href="{{route('posts.index', $comment->user)}}" class="font-semibold text-xl">
                                @php
                                    $userAuth = auth()->user()->username;
                                    $userComment = $comment->user->username;
                                    $result = ($userAuth == $userComment) ?? null;
                                @endphp
                                @if ($result)
                                    Tu
                                @else
                                    {{$comment->user->username}}  
                                @endif
                                <span class="font-normal text-gray-600 text-sm ml-2">{{$comment->created_at->diffForHumans()}}</span>
                            </a>
                            <p class="pl-5 text-gray-700">{{$comment->comment}}</p> 
                        </div>
                    @endforeach
                @else
                <p class="p-10 text-center">No hay Comentarios!!</p>
                @endif
            </div>

        </div>
    </div>

</div>
@endsection
