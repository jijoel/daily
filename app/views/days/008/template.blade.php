<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Day {{ $day }} - {{ $dayTitle }}</title>

    @section('css')

        {{ HTML::css('bootstrap2')}}
        {{ HTML::css('home')}}

        <style>
            .container { width: auto;}
            h1 a { color: black;}
            table { max-width: 400px;}
            table form { margin-bottom: 0; }
            table tr td             { width: 20px; }
            table tr td:first-child { width: 100%; }
            form ul { margin-left: 0; list-style: none; }
            .error { color: red; font-style: italic; }
            /*body { padding-top: 20px; }*/
        </style>
    @show

</head>

<body>
    <div class="container">
        <a href="/" class="home">Home</a>

        <h1><a href="/day008/">{{ $dayTitle }}</a></h1>
        
        @if (Session::has('message'))
            <div class="flash alert">
                <p>{{ Session::get('message') }}</p>
            </div>
        @endif

        @yield('content')

    </div><!-- .container -->

@yield('js')
</body>
</html>
