<!doctype html>
<link rel="stylesheet" href="{{ asset('css/app.css') }}">

<html lang="en" class="bg-gray-900 text-gray-500">
@include('layouts.navbar')

<head>
    <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
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

<body >
    <section class="text-gray-500 body-font bg-gray-900">
        <div class="container px-5 py-24 mx-auto">
            <div class="flex flex-wrap w-full mb-20">
                <div class="lg:w-1/2 w-full mb-6 lg:mb-0">
                  
            </div>

    @yield('content')
    </div>

    </div>
</body>

</html>
