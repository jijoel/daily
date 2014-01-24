<!doctype html>
<html lang="en" ng-app="{{$ngApp}}">
<head>
    <meta charset="UTF-8">
    <title>Day {{ $day }} - {{ $dayTitle }}</title>

    @section('css')
        <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-combined.min.css" rel="stylesheet">
        <link href="/css/home.css" type="text/css" rel="stylesheet" />
        @yield('styles')
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


<script type="text/javascript" src="/js/angular.min.js"></script>
@yield('js')
</body>
</html>