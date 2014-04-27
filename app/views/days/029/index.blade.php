@section('content')

<p class="note">This is a test of rendering svg via angular.  @include('partials.github')</p>

<div ng-controller="GridController">

<svg style="background-color: #ccc" height="@{{rowLabels.length * rowHeight + rowHeight}}">
    <g ng-repeat="label in rowLabels">
        <text class="rowLabel" x="10" y="@{{row($index)}}">@{{label.name}}</text>
        <path d="M @{{rowLabelWidth}} @{{row($index) + 0.5}} L @{{stageWidth}} @{{row($index)+0.5}}" stroke="black"></path>
    </g>
</svg>

<div ng-view></div>

<script type="text/ng-template" id="/tpl.html">
    <div ng-repeat="label in rowLabels">Foo: @{{label.name}} (@{{$index}}: @{{row($index)}})</div>
</script>


</div>

@stop


@section('js')
<script type="text/javascript" src="/vendor/js/angular-route.min.js"></script>
<script type="text/javascript">

var GridApp = angular.module('GridApp', ['ngRoute'])    
    .controller('GridController', function($scope){
        $scope.rowLabelWidth = 0;
        $scope.stageWidth = 0;
        $scope.rowHeight = 20;
        $scope.rowLabels = [
            {id: 1, name: 'Testing', desc: 'Something'},
            {id: 2, name: 'Another Test', desc: 'Something else'},
            {id: 3, name: 'Third', desc: 'Something else'},
            {id: 4, name: 'Fourth', desc: 'Something else'},
        ];
        $scope.row = function(i) { return (i * $scope.rowHeight) + $scope.rowHeight; };

        $scope.rowLabelWidth = 0;
        $scope.stageWidth = 600;
    });

GridApp.config(['$routeProvider',
  function($routeProvider) {
    $routeProvider.
      when('/', {
        templateUrl: '/tpl.html',
        controller: 'GridController'
      }).
      otherwise({
        redirectTo: '/'
      });
  }]);


</script>
@stop
