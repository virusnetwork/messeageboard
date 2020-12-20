@extends('layouts.postsLayout')

@section('title', 'User made Posts')

@section('content')
    @if (session('message'))
        <p><b>{{ session('message') }}</b></p>
    @endif 
    <div class="flex flex-wrap -m-4">
        @foreach ($posts as $post)
            <div onclick="location.href='/posts/{{$post->id}}';" style="cursor: pointer;" class="xl:w-1/4 md:w-1/2 p-4">
                <div class=" bg-gray-800 p-6 rounded-lg">
                    <img class="h-40 rounded w-full object-cover object-center mb-6" src="https://dummyimage.com/721x401"
                        alt="content">
                    <h3 class="tracking-widest text-purple-500 text-xs font-medium title-font">by {{ $post->user_id }}</h3>
                    <h2 class="text-lg text-white font-medium title-font mb-4"> {{ $post->title }}</h2>
                    <p class="leading-relaxed text-base">
                        {{ \Illuminate\Support\Str::limit($post->content, 100, $end = '...') }}
                    </p>
                </div>
            </div>
        @endforeach

    @endsection
