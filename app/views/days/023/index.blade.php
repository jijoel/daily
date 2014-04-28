<!doctype html>
<html lang="en" ng-app>
<head>
    <meta charset="UTF-8">
    <title>Day {{ $day }} - {{ $dayTitle }}</title>

    {{ HTML::css('bootstrap2')}}
    {{ HTML::css('home')}}

</head>
<body>

    <div class="container">
        <a href="/" class="home">Home</a>

        <h1><a href="{{$dayLink}}">{{ 'Day ' . $day . ': ' . $dayTitle }}</a></h1>

        <p class="note">This is a very basic introduction to an Angular model. @include('partials.github')</p>

        <label>Name:</label>
        <input type="text" ng-model="yourName" placeholder="Enter a name here">

        <hr>
        <h1 ng-show="yourName">Hello @{{yourName}}!</h1>
    </div>

{{ HTML::js('angular')}}

</body>
</html>

