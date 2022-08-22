@extends('layouts.app')

@section('title')
Tu cuenta
@endsection

@section('content')
<section class="flex justify-center">
    <div class="w-full md:w/12 lg:6/12 md:flex">
        <section class="md:w-8/12 lg:w-6/12 px-5">
            <img src="{{ asset('images/user.svg') }}" alt="">
        </section>
        <section class="md:w-8/12 lg:w-6/12 px-5">
            <p class="text-2xl text-gray-700"> {{ auth()->user()->username }} </p>
        </section>
    </div>
</section>
@endsection
