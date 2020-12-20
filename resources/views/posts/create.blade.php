@extends('layouts.postsLayout')

@section('title', 'Create New Posts')

@section('content')

    <div class="lg:w-1/3 md:w-1/2 flex flex-col md:ml-auto w-full md:py-8 mt-8 md:mt-0">
        <form method="POST" action="{{ action('App\Http\Controllers\PostController@store') }}">
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
            <div class="mb-2"> <span>Attachments</span>
                <div
                    class="relative h-40 rounded-lg border-dashed border-2 border-gray-200 bg-white flex justify-center items-center hover:cursor-pointer">
                    <div class="absolute">
                        <div class="flex flex-col items-center "> <i class="fa fa-cloud-upload fa-3x text-gray-200"></i>
                            <span class="block text-gray-400 font-normal">Attach you files here</span> <span
                                class="block text-gray-400 font-normal">or</span> <span
                                class="block text-blue-400 font-normal">Browse files</span>
                        </div>
                    </div> <input type="file" name="image" value="{{ old('image') }}" class="h-full w-full opacity-0">
                </div>
                <div class="flex justify-between items-center text-gray-400"> <span>Accepted file type: .JPEG, .PNG</span>
                    <span class="flex items-center "><i class="fa fa-lock mr-1"></i></span>
                </div>
            </div>
            <button
                class="text-white bg-purple-500 border-0 py-2 px-6 focus:outline-none hover:bg-purple-600 rounded text-lg">Submit</button>
            <p class="text-xs text-gray-500 mt-3">Please follow and respect code of conduct</p>
            <p>user: <input type="number" name="user_id" value="{{ old('user_id') }}"></p>
            <input type="submit" value="Submit">
            <a herf="{{ route('posts.index') }}">Cancel</a>
        </form>
    </div>
@endsection
