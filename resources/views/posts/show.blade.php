@extends('layouts.app')

@section('title')
{{$post->title}}
@endsection

@section('content')
<div class="max-w-7xl mx-auto md:flex lg:flex md:justify-center lg:justify-center gap-5 justify-center">
    <div class="md:w-1/2 lg:w-2/5">
        <img src="{{asset('uploads') . '/' . $post->image}}" alt="Imagen del post: {{$post->title}}">
        <div class="py-1 px-0">
            @auth
            <div class="flex items-center gap-3 py-2">
                @if ($post->checkLike( auth()->user() ) )
                    <form action="{{route('posts.likes.destroy', $post)}}" method="POST" >
                        @method('DELETE')
                        @csrf
                        <button>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="red" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                            </svg>
                        </button>
                    </form>
                @else
                    <form action="{{route('posts.likes.store', $post)}}" method="POST" >
                            @csrf
                            <button>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                                </svg>
                            </button>
                    </form>
                @endif
                    <p class="font-bold">{{$post->likes->count()}} <span class="font-normal">likes</span></p>
                </div>
            @endauth
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
            <div>
                @auth
                    @if ($post->user_id === auth()->user()->id)
                        <form action="{{route('posts.destroy', $post)}}" method="POST" >
                            {{-- METHOD SPOOFING [ PATCH, PUT, DELETE ] --}}
                            @method('DELETE')
                            @csrf
                            <input
                                type="submit"
                                value="Eliminar publicación"
                                class="bg-red-500 hover:bg-red-600 p-2 rounded text-white font-bold mt-4 cursor-pointer"
                            />
                        </form>
                    @endif
                @endauth
            </div>
        </div>
    </div>
    {{-- ------------------------------- --}}
    <div class="md:w-1/2 lg:w-2/5">
        <div class="shadow bg-white p-5 border-lg  mb-5">
            @auth
            <p class="text-2xl font-bold text-center mb-4">
                Agrega un nuevo comentario
            </p>

            @if (session('message'))
                <p class=" bg-green-500 p-2 rounded-lg mb-3 text-white text-center uppercase">
                    {{session('message')}}
                </p>
            @endif

            <form action="{{route('comments.store', ['user'=>$user, 'post'=>$post])}}" method="POST">
                @csrf

                <div class="mb-2">
                    <label for="comment" class="mb-1 block uppercase text-gray-500 font-bold">
                        Comentario
                    </label>
                    <textarea
                        name="comment"
                        id="comment"
                        placeholder="eje: Que hermosa fotografia!!"
                        class="border p-2 w-full rounded-lg @error('comment') border-red-600 @enderror"
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
                    class="bg-sky-600 mt-2 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-2 text-white rounded"
                />
            </form>
            @endauth

            <div class="bg-white shadow mb-2 max-h-72 overflow-auto border p-3 mt-6 rounded-lg">
                @if ($post->comments->count())
                    @foreach ($post->comments as $comment)
                        <div class="p-5 border-b border-gray-300">
                            <a href="{{route('posts.index', $comment->user)}}" class="font-semibold text-xl">
                                @if (auth()->user()->username??false)
                                    @if($comment->user->username === auth()->user()->username)
                                        Tu
                                    @else
                                        {{$comment->user->username}}
                                    @endif
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
