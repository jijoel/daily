@section('content')

<p class="note">Today, I'm following a tutorial on <a href="http://laracasts.com">Laracasts</a> on a nice way to handle <a href="https://laracasts.com/lessons/form-validation-simplified">form validation</a>. Let's see how it works with an Angular form.
@include('partials.github')</p>


<div class="well col-md-6 col-md-offset-3" ng-app="formApp" ng-controller="formController">
    <form id="angular" ng-submit="processForm()">
        <legend>Angular Form</legend>
        <div class="message" ng-class="messageClass" ng-show="message" ng-bind-html="renderHtml(message)"></div>

        <!-- NAME -->
        <div class="form-group name-control" ng-class="{ 'has-error' : errorData.name }">
            <label class="control-label">Name</label>
            <input type="text" name="name" class="form-control" placeholder="Bruce Wayne" ng-model="formData.name">
            <span class="help-block" ng-show="errorData.name">@{{errorData.name}}</span>
        </div>

        <!-- SUPERHERO NAME -->
        <div class="form-group alias-control" ng-class="{ 'has-error' : errorData.alias }">
            <label class="control-label">Superhero Alias</label>
            <input type="text" name="alias" class="form-control" placeholder="Caped Crusader" ng-model="formData.alias">
            <span class="help-block" ng-show="errorData.alias">@{{errorData.alias}}</span>
        </div>

        <!-- SUBMIT BUTTON -->
        <button type="submit" class="btn btn-success btn-sm btn-block">
            <span class="glyphicon glyphicon-flash"></span> Submit!
        </button>
    </form>
    
</div>

@stop


@section('js')
<script type="text/javascript">
    var formApp = angular.module('formApp', []);

    // create angular controller and pass in $scope and $http
    function formController($scope, $http, $sce) {
        $scope.formData = {};

        $scope.processForm = function() {
            $http.post('/day046', $scope.formData)
                .success(function(data) {
                    $scope.errorData = {};
                    $.each(data, function(index,value){
                        $scope.errorData[index] = data[index][0];
                    });

                    if (data.length !== 0) {
                        $scope.message = '<h4>Errors</h4><p>Please see below for errors</p>';
                        $scope.messageClass = 'alert alert-danger';
                    } else {
                        $scope.message = '<h4>Success</h4><p>Your data has been added successfully</p>';
                        $scope.messageClass = 'alert alert-success';
                    }
                });
        };

        $scope.renderHtml = function(html_code)
        {
            return $sce.trustAsHtml(html_code);
        };
    }

</script>
@stop