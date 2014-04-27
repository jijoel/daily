<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Day {{ $day }} - {{ $dayTitle }}</title>

    @section('styles')
        <link rel="stylesheet" type="text/css" href="/vendor/css/bootstrap.min.css">
        <link href="/css/home.css" type="text/css" rel="stylesheet" />
        @yield('css')
    @show

</head>

<body>
    <div class="container">
        <a href="/" class="home">Home</a>

        <h1><a href="{{$dayLink}}">{{ 'Day ' . $day . ': ' . $dayTitle }}</a></h1>

        @include('partials.notifications')

        @yield('content')

    </div><!-- .container -->

@section('script')
    <script type="text/javascript" src="/vendor/js/jquery.min.js"></script>
    <script type="text/javascript" src="/vendor/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/vendor/js/angular.min.js"></script>
    @yield('js')
@show

</body>
</html>
