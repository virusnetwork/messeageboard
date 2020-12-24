@extends('layouts.postsLayout')

@section('title', 'post-details')

@section('content')
    <!--TailwindCSS template taken from https://mertjf.github.io/tailblocks/ -->

    <!-- Post Section -->

    <section class="text-gray-500 body-font ">
        <div id="root">
            <div class="container mx-auto flex px-5 py-24 md:flex-row flex-col items-center">
                <div
                    class="lg:flex-grow md:w-1/2 lg:pr-24 md:pr-16 flex flex-col md:items-start md:text-left mb-16 md:mb-0 items-center text-center">
                    <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-white">{{ $post->title }}
                    </h1>
                    <h3>By {{ App\Models\User::find($post->user_id)->username }}</h3>
                    <p class="mb-8 leading-relaxed">{{ $post->content }}</p>
                </div>
                <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6">
                    @if (Storage::disk('public')->exists($post->image_name))
                        <img class="object-cover object-center rounded" alt="hero"
                            src={{ Storage::disk('public')->url($post->image_name) }}>
                    @else
                        <img class="object-cover object-center rounded" alt="hero"
                            src={{ Storage::disk('public')->url('noImage.jpg') }}>
                    @endif
                </div>
            </div>

            <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-white">Comments</h1>
            <div>
                <ol>
                    <li v-for="value in com">
                        <div class="border border-gray-800 p-6 rounded-lg">
                            <h2 class="text-lg text-white font-medium title-font mb-2"> @{{ value . comment_content }}</h2>
                            <p class="leading-relaxed text-base">by @{{ value . author_username}}</p>
                        </div>
            </div>
            </li>
            </ol>

            <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-white">New Comment</h1>
            <div id="root" class="flex flex-wrap -m-2">
                <div class="p-2 w-full">
                    <div class="relative">
                        <label for="comment" class="leading-7 text-sm text-gray-400">Message</label>
                        <textarea v-model="message" id="comment" name="comment"
                            class="w-full bg-gray-800 rounded border border-gray-700 focus:border-purple-500 h-32 text-base outline-none text-gray-100 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"></textarea>
                    </div>
                </div>
            </div>
            <div class="p-2 w-full">
                <button v-on:click="newComment"
                    class="flex mx-auto text-white bg-purple-500 border-0 py-2 px-8 focus:outline-none hover:bg-purple-600 rounded text-lg">Submit</button>
            </div>
        </div>

        <div class="container mx-auto flex flex-wrap py-6">
        </div>
    </section>

    <script>
        var app4 = new Vue({
            el: '#root',
            data: {
                com: [],
                help: "hope this works",
                message: '',
            },
            methods: {
                newComment: function() {
                    axios.post("{{ route('api.comments.store') }}", {
                            comment_content: this.message,
                            post_id: "{{ $post->id }}",
                            author_id: "{{ Auth::id() }}",
                        })
                        .then(response => {
                            response.data.author_username= "{{App\Models\User::find(Auth::id())->username }}"
                            this.com.push(response.data);
                            this.message = ''
                        })
                        .catch(response => {
                            console.log(response);
                        })
                }
            },
            mounted() {
                axios.get("{{ route('api.comment.parent', $post->id) }}")
                    .then(response => {
                        console.log("{{ route('api.comment.parent', $post->id) }}")
                        this.com = response.data.data;
                    })
                    .catch(response => {
                        console.log(response);
                    })
            }
        });

    </script>

@endsection
