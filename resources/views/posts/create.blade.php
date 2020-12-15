@extends('layouts.postsLayout')

@section('title','Create New Posts')

@section('content')
    <form method="POST" action="{{ action('App\Http\Controllers\PostController@store')}}">
        @csrf
        <p>Title: <input type="text" name="title" 
        value="{{old('title')}}"></p>
        <p>Content: <input type="text" name="content" 
            value="{{old('content')}}"></p>
        <p>image: <input type="file" name="image" 
        value="{{old('image')}}"></p>
        <p>user: <input type="number" name="user_id"
            value="{{old('user_id')}}"></p>
        <input type ="submit" value ="Submit">
        <a herf="{{ route('posts.index')}}">Cancel</a>
    </form>
    
@endsection