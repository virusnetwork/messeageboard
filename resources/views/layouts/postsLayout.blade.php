<!doctype html>
<link rel="stylesheet" href="{{ asset('css/app.css') }}">

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
@include('layouts.navbar')
<section class="text-gray-500 body-font bg-gray-900">
    <div class="container px-5 py-24 mx-auto">
        <div class="flex flex-wrap w-full mb-20">
            <div class="lg:w-1/2 w-full mb-6 lg:mb-0">
                <h1 class="sm:text-3xl text-2xl font-medium title-font mb-2 text-white">Miles' Messeageboard</h1>
                <div class="h-1 w-20 bg-purple-500 rounded"></div>
            </div>
            <p class="lg:w-1/2 w-full leading-relaxed text-base"><a href="{{ route('posts.create') }}">Create new
                    post</a></p>
        </div>

        @if ($errors->any())
            <div>
                Errors:
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
        @endif
       
        <div>
            @yield('content')
        </div>



</section>

</html>
