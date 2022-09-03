@extends('layouts.app')

@section('title')
[ {{ $user->username }} ]
@endsection



@section('content')
<section class="flex justify-center">
    <div class="w-full md:w8/12 lg:6/12 flex flex-col items-center md:flex-row md:justify-center">
        <section class="w-8/12 lg:w-3/12 px-5">
            @if ($user->image)
                <img class="rounded-full shadow-lg border-black border-4" src="{{asset('profiles' . '/' . $user->image)}}" alt="">
            @else
                <img class="" src="{{asset('images' . '/user.svg')}}" alt="">
            @endif
        </section>
        <section class="md:w-8/12 lg:w-4/12 px-5 flex flex-col items-center py-7 md:py-7 md:items-start md:justify-center">
            {{-- {{ $user }} --}}
            <div class="flex items-center gap-2 mb-3">
                <p class="text-gray-700 text-2xl">{{ $user->username }}</p>
                @auth
                    @if ($user->id === auth()->user()->id)
                        <a
                            class="text-gray-500 hover:text-gray-700 cursor-pointer"
                            href="{{route('profile.index')}}">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                              </svg>
                        </a>
                    @endif
                @endauth
            </div>
            <p class="text-gray-800 text-sm mb-3 font-bold">
                {{$user->followers->count()}}
                <span class="font-normal" > @choice('seguidor|seguidores', $user->followers->count())</span>
            </p>
            <p class="text-gray-800 text-sm mb-3 font-bold">
                {{$user->following->count()}}
                <span class="font-normal" > Siguiendo</span>
            </p>
            <p class="text-gray-800 text-sm mb-3 font-bold"> {{$user->posts->count()}} <span class="font-normal" > Posts</span> </p>
            @auth
                @if ($user->id !== auth()->user()->id)
                    @if ($user->follow(auth()->user()))
                        <form
                            action="{{route('users.unfollow', $user)}}"
                            method="POST"
                        >
                            @csrf
                            @method('DELETE')
                            <input
                                type="submit"
                                class="bg-red-600 text-white cursor-pointer uppercase rounded-lg px-3 py-1 text-xs font-bold"
                                value="Dejar de seguir">
                        </form>
                    @else
                        <form
                            action="{{route('users.follow', $user)}}"
                            method="POST"
                        >
                            @csrf
                            <input
                                type="submit"
                                class="bg-blue-600 text-white cursor-pointer uppercase rounded-lg px-3 py-1 text-xs font-bold"
                                value="Seguir">
                        </form>
                    @endif


                @endif
            @endauth
        </section>
    </div>
</section>

<section class="mt-10">
    <h2 class="text-4xl text-center font-black my-7">Publicaciones</h2>
    @php
        $isHome=false;
    @endphp
    <x-list-post :posts="$posts" :isHome="false" />
</section>

@endsection
