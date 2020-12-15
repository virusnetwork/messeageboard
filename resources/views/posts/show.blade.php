@extends('layout.app')

@section('title','post-details')
   
@section('content')

    <ul>
        <li>timestamp: {{$post->timestamps}} </li>
        <li>post title: {{$post->title}} </li>
        <li>image: {{$post->image}} </li>
        <li>post content: {{$post->content}} </li>
        <li>author: {{$post->user->name}} </li>
    </ul>

    <ul>
    @foreach ($comments as $comment)
        <li>author: {{$comment->author_id}} </li>
        <li>image: {{$comment->image}} </li>
        <li>comment: {{$comment->comment_content}}</li>
    @endforeach
    </ul>

    <a href="{{ route('comments.create')}}">Create new Comment</a>
@endsection