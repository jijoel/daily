<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Day {{ $day }} - {{ $dayTitle }}</title>

    @section('styles')
        {{ HTML::css('bootstrap3')}}
        {{ HTML::css('home')}}
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
    {{ HTML::js('jquery')}}
    {{ HTML::js('bootstrap3')}}
    {{ HTML::js('angular')}}
    @yield('js')
@show

</body>
</html>
