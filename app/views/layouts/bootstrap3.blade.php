<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Day {{ $day }} - {{ $dayTitle }}</title>

    @section('styles')
        <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
        <link href="/css/home.css" type="text/css" rel="stylesheet" />
        @yield('css')
    @show

</head>

<body>
    <div class="container">
        <a href="/" class="home">Home</a>

        <h1><a href="{{$dayLink}}">{{ 'Day ' . $day . ': ' . $dayTitle }}</a></h1>

        @if (Session::has('message'))
            <div class="flash alert">
                <p>{{ Session::get('message') }}</p>
            </div>
        @endif

        @if(Session::has('errors'))
            <div class="flash alert error">
            <p>There were errors:
            <ul>
            @foreach($errors->all('<li>:message</li>') as $error)
                {{$error}}
            @endforeach
            </ul>
            </div>
        @endif

        @yield('content')

    </div><!-- .container -->

@section('script')
    <script type="text/javascript" url="/js/bootstrap.min.js"></script>
    @yield('js')
@show

</body>
</html>
