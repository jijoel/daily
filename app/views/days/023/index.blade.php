<!doctype html>
<html lang="en" ng-app>
<head>
    <meta charset="UTF-8">
    <title>Day {{ $day }} - {{ $dayTitle }}</title>

    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-combined.min.css" rel="stylesheet">
    <link href="/css/home.css" type="text/css" rel="stylesheet" />

</head>
<body>

    <div class="container">
        <a href="/" class="home">Home</a>

        <h1><a href="{{$dayLink}}">{{ 'Day ' . $day . ': ' . $dayTitle }}</a></h1>

        <p class="note">This is a very basic introduction to an Angular model. @include('partials.github')</p>

        <label>Name:</label>
        <input type="text" ng-model="yourName" placeholder="Enter a name here">

        <hr>
        <h1>Hello @{{yourName}}!</h1>
    </div>

<script type="text/javascript" src="/js/angular.min.js"></script>

</body>
</html>

