@extends('layouts.app')

@section('title')
Perfil: {{ $user->username }}
@endsection

@section('content')
<section class="flex justify-center">
    <div class="w-full md:w8/12 lg:6/12 flex flex-col items-center md:flex-row md:justify-center">
        <section class="w-8/12 lg:w-3/12 px-5">
            <img src="{{ asset('images/user.svg') }}" alt="">
        </section>
        <section class="md:w-8/12 lg:w-4/12 px-5 flex flex-col items-center py-10 md:py-10 md:items-start md:justify-center">
            {{-- {{ $user }} --}}
            <p class="text-2xl text-gray-800 font-bold mb-4"> {{ $user->username }} </p>
            <p class="text-gray-800 text-sm mb-3 font-bold"> 0 <span class="font-normal" > Seguidores</span> </p>
            <p class="text-gray-800 text-sm mb-3 font-bold"> 0 <span class="font-normal" > Siguiendo</span> </p>
            <p class="text-gray-800 text-sm mb-3 font-bold"> {{$user->posts->count()}} <span class="font-normal" > Posts</span> </p>
        </section>
    </div>
</section>

<section class="container mx-auto mt-10">
    <h2 class="text-4xl text-center font-black my-10">Publicaciones</h2>
    @if ($posts->count())
    <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 md:justify-content-center lg:justify-content-center xl:justify-content-center">
            @foreach ($posts as $post)
                <div class="">
                    <a href="{{route('posts.show', ['user'=>$user->username ,'post'=>$post])}}"><img src="{{ asset('uploads') . "/" . $post->image }}" alt="imagen de post {{ $post->title }}"></a>
                </div>
            @endforeach
        </div>
        <div class="py-10"> {{ $posts->links('pagination::tailwind') }} </div>
    @else
        <p class="text-gray-500 uppercase text-center font-bold p-4 rounded-lg bg-gray-200">No hay posts ...</p>
    @endif
</section>

@endsection
