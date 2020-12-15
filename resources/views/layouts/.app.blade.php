<!doctype html>

<html lang ="en">
    <head>
        <title>Miles' imageboard - @yield('title')</title>
    </head>

    <body>
        <h1>Miles' imageboard - @yield('title')</h1>
        
        @if ($errors->any())
            <div>
                Errors:
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>  
                    @endforeach
        @endif
        <div>
            @yield('content')
        </div>

    </body>
</html>