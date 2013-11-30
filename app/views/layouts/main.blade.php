<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Day {{ $day }} - {{ $dayTitle }}</title>

    @section('css')
    <link href="/css/home.css" type="text/css" rel="stylesheet" />
    @show

</head>

<body>
    <div class="container">
        <a href="/" class="home">Home</a>

        <h1>{{ $dayTitle }}</h1>
        
        @yield('content')

    </div><!-- .container -->

@yield('js')
</body>
</html>
