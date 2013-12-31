<!doctype html>
<html lang="en" ng-app>
<head>
    <meta charset="UTF-8">
    <title>Day {{ $day }} - {{ $dayTitle }}</title>

    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-combined.min.css" rel="stylesheet">
    <link href="/css/home.css" type="text/css" rel="stylesheet" />

    <style type="text/css">
    input[type=checkbox] {
        float: left;
        margin-right: 0.4em;
    }

    </style>
</head>
<body>

    <div class="container">
        <a href="/" class="home">Home</a>

        <h1><a href="{{$dayLink}}">{{ 'Day ' . $day . ': ' . $dayTitle }}</a></h1>

        <label>
            Set Name
            <input type="checkbox" ng-model="setName">
        </label>

        <div class="check-element animate-hide" ng-show="setName">
            <label>Name:</label>
            <input type="text" ng-model="yourName" placeholder="Enter a name here">
        </div>

        <hr ng-show="yourName">
        <h1 ng-show="yourName">Hello, @{{yourName}}!</h1>
        <hr ng-show="yourName">

        <label>
            See People
            <input type="checkbox" ng-model="seePeople">
        </label>


        <div ng-controller="PeopleController" ng-show="seePeople">
            <input type="search" ng-model="search" placeholder="Filter">
            <ul>
                <li ng-repeat="person in people | filter:search">@{{person.name}}</li>
            </ul>
        </div>

    </div>

<script type="text/javascript" src="/js/angular.min.js"></script>
<script type="text/javascript">
    var PeopleController = function($scope) {
        $scope.people = [
            {name: 'Joel' },
            {name: 'Foo' },
            {name: 'Bar' },
            {name: 'Fizz' },
            {name: 'Buzz' },
        ];
    };
</script>

</body>
</html>

