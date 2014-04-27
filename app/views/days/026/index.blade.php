<!doctype html>
<html lang="en" ng-app="todos">
<head>
    <meta charset="UTF-8">
    <title>Day {{ $day }} - {{ $dayTitle }}</title>

    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-combined.min.css" rel="stylesheet">
    <link href="/css/home.css" type="text/css" rel="stylesheet" />

    <style type="text/css">
    </style>
</head>
<body>

    <div class="container">
        <a href="/" class="home">Home</a>

        <h1><a href="{{$dayLink}}">{{ 'Day ' . $day . ': ' . $dayTitle }}</a></h1>

        <p class="note">This is an example of using an Angular resource to tie in to a Laravel back-end. 
        @include('partials.github')</p>

        <div ng-controller="TodosController">
            <input type="search" ng-model="search" placeholder="Filter">
            <ul>
                <li ng-repeat="todo in todos | filter:search" >
                    @{{todo.item}}
                    <button ng-click="delTodo(todo)">x</button>
                </li>
            </ul>
            <p>There are @{{(todos|filter:search).length}} todos currently shown
            <br>There are @{{todos.length}} todos in the full list</p>
            <div>
                <label>New Todo:</label><input ng-model="newItem" placeholder="Add a new todo item">
                <button ng-click="addTodo()">Add</button>
            </div>
        </div>

    </div>

<script type="text/javascript" src="/vendor/js/angular.min.js"></script>
<script type="text/javascript" src="/vendor/js/angular-resource.min.js"></script>
<script type="text/javascript">
    angular.module('todos', ['ngResource'])
        .controller('TodosController', function($scope, $resource) {
            var Todo = $resource('/day026/api/:id', {id:'@id'});
            $scope.todos = Todo.query();

            $scope.addTodo = function() {
                var newTodo = new Todo({todo: $scope.newItem});
                newTodo.$save(function(response, header){
                    $scope.todos.push(response);
                });
            }

            $scope.delTodo = function(todo) {
                todo.$delete(function(result, header){
                    var index = $scope.todos.indexOf(todo);
                    if (index > -1)
                        $scope.todos.splice(index, 1);
                });
            }
        });
</script>

</body>
</html>

