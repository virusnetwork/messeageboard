@extends('layouts.postsLayout')

@section('title', 'Create New Posts')

@section('content')

    <div class="lg:w-1/3 md:w-1/2 flex flex-col md:ml-auto w-full md:py-8 mt-8 md:mt-0">
        <form method="POST" enctype="multipart/form-data"
            action="{{ action('App\Http\Controllers\PostController@store') }}">
            @csrf
            <h2 class="text-white text-lg mb-1 font-medium title-font">New Post</h2>
            <p class="leading-relaxed mb-5 text-gray-600">Create a new post on anything for the world to see</p>
            <div class="relative mb-4">
                <label for="title" class="leading-7 text-sm text-gray-400">Title:</label>
                <input type="text" id="title" name="title" value="{{ old('title') }}"
                    class="w-full bg-gray-800 rounded border border-gray-700 focus:border-purple-500 text-base outline-none text-gray-100 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            </div>
            <div class="relative mb-4">
                <label for="content" class="leading-7 text-sm text-gray-400">Content:</label>
                <textarea id="content" name="content"
                    class="w-full bg-gray-800 rounded border border-gray-700 focus:border-purple-500 h-32 text-base outline-none text-gray-100 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"></textarea>
            </div>
            <label for="image">Select image:</label>
            <input type="file" id="image" name="image" accept="image/*">
            <button
                class="text-white bg-purple-500 border-0 py-2 px-6 focus:outline-none hover:bg-purple-600 rounded text-lg">Submit</button>
            <p class="text-xs text-gray-500 mt-3">Please follow and respect code of conduct</p>
        </form>
    </div>
@endsection
