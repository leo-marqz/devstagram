
@extends('layouts.app')
@section('title')
Bienvenidos a Home
@endsection

@section('content')

<x-list-post :posts="$posts" />

{{-- componente de laravel --}}
{{-- <x-list-post /> si no pasas Slots --}}
{{-- <x-list-post>
    <x-slot:title >
        <header>Mostrando mis post desde slot title</header>
    </x-slot:title>
    <h1>mis post</h1>
</x-list-post> --}}
@endsection
