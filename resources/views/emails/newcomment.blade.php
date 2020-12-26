<!doctype html>
 
<html>
<head>
    <title>Hello </title>
</head>
 
<body>
<h1>New Comment!!!</h1>
<h2>Miles' Messeageboard</h2>
<p>Dear {{$user->name}}, someone commented on your post {{$post->title}}.</p>
<p><a href="{{route('posts.show',$post->id)}}">Go check it out</a></p>
</body>
</html>