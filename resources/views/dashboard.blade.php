@extends('layouts.app')

@section('title')
Perfil: {{ $user->username }}
@endsection

@section('content')
<section class="flex justify-center">
    <div class="w-full md:w8/12 lg:6/12 flex flex-col items-center md:flex-row md:justify-center">
        <section class="w-8/12 lg:w-4/12 px-5">
            <img src="{{ asset('images/user.svg') }}" alt="">
        </section>
        <section class="md:w-8/12 lg:w-4/12 px-5 flex flex-col items-center py-10 md:py-10 md:items-start md:justify-center">
            {{-- {{ $user }} --}}
            <p class="text-2xl text-gray-800 font-bold mb-4"> {{ $user->username }} </p>
            <p class="text-gray-800 text-sm mb-3 font-bold"> 0 <span class="font-normal" > Seguidores</span> </p>
            <p class="text-gray-800 text-sm mb-3 font-bold"> 0 <span class="font-normal" > Siguiendo</span> </p>
            <p class="text-gray-800 text-sm mb-3 font-bold"> 0 <span class="font-normal" > Posts</span> </p>
        </section>
    </div>
</section>
@endsection
