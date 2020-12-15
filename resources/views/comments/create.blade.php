@extends('layouts.postsLayout')

@section('title','Create New Comment')

@section('content')
    <form method="POST" action="{{ action('App\Http\Controllers\CommentController@store')}}">
        @csrf
        <p>Content: <input type="text" name="comment_content" 
            value="{{old('comment_content')}}"></p>
        <p>image: <input type="file" name="image" 
        value="{{old('image')}}"></p>
        <p>author_id: <input type="number" name="author_id"
            value="{{old('author_id')}}"></p>
        <p>post_id: <input type="number" name="post_id"
             value="{{old('post_id')}}"></p> 
        <input type ="submit" value ="Submit">
        <a herf="{{ route('posts.index')}}">Cancel</a>
    </form>
    
@endsection