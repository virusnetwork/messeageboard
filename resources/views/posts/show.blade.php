@extends('layouts.postsLayout')

@section('title', 'post-details')

@section('content')

    <!-- Post Section -->

    <section class="text-gray-500 body-font ">
        <div class="container mx-auto flex px-5 py-24 md:flex-row flex-col items-center">
            <div
                class="lg:flex-grow md:w-1/2 lg:pr-24 md:pr-16 flex flex-col md:items-start md:text-left mb-16 md:mb-0 items-center text-center">
                <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-white">{{ $post->title }}
                </h1>
                <h3>By {{ App\Models\User::find($post->user_id)->name }}</h3>
                <p class="mb-8 leading-relaxed">{{ $post->content }}</p>
                <div class="flex justify-center">
                    <button
                        class="inline-flex text-white bg-purple-500 border-0 py-2 px-6 focus:outline-none hover:bg-purple-600 rounded text-lg">Button</button>
                    <button
                        class="ml-4 inline-flex text-gray-400 bg-gray-800 border-0 py-2 px-6 focus:outline-none hover:bg-gray-700 hover:text-white rounded text-lg">Button</button>
                </div>
            </div>
            <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6">
                <img class="object-cover object-center rounded" alt="hero" src="https://dummyimage.com/720x600">
            </div>
        </div>
        <h1>Comments</h1>
        <div id="app-4">
            <ol>
                <li v-for="comments in com">
                    @{{ com }}
                </li>
            </ol>
        </div>
        <div class="container mx-auto flex flex-wrap py-6">


            <a href="{{ route('comments.create') }}">Create new Comment</a>
    </section>

    <script>
        var app4 = new Vue({
            el: '#app-4',
            data: {
                com: []
            },
            mounted() {
                axios.get("{{ route('api.comments.all') }}")
                    .then(response => {
                        this.com = response.data;
                    })
                    .catch(response => {
                        console.log(response);
                    })
            },
        });
    
    </script>

@endsection
