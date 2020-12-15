@extends('layout.app')

@section('title', 'User made Posts')

@section('content')
    @if(session('message'))
        <p><b>{{session('message')}}</b></p>
    @endif

    <p>Posts</p>
    <ul>
        @foreach ($posts as $post)
            <li><a href="/posts/{{$post->id}}">{{$post->title}}</a></li>
        @endforeach
    </ul>
    <a href="{{ route('posts.create')}}">Create new post</a>
@endsection