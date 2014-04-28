<!doctype html>
<html lang="en" ng-app="todos">
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

{{ HTML::js('angular')}}
{{ HTML::js('angular-resource')}}

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

