@section('content')

<p class="note">Today, I'm following a tutorial on <a href="http://laracasts.com">Laracasts</a> on a nice way to handle <a href="https://laracasts.com/lessons/form-validation-simplified">form validation</a>. Let's see how it works with an Angular form.
@include('partials.github')</p>


<div class="well col-md-6 col-md-offset-3" ng-app="formApp" ng-controller="formController">
    <form id="angular" ng-submit="processForm()">
        <legend>Angular Form</legend>
        <div class="message" ng-class="message.class" ng-show="message">
            <h4>@{{message.title}}</h4>
            <p>@{{message.text}}</p>
        </div>

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
        $scope.message = {};

        $scope.processForm = function() {
            $http.post('/day046', $scope.formData)
                .success(function(data) {
                    if (data.error) {
                        return $scope.handleErrorMessages(data);
                    }
                    $scope.message={};
                    $scope.errorData = {};
                    $scope.message.title = 'Success';
                    $scope.message.text = data.message;
                    $scope.message.class = 'alert alert-success';
                })
                .error(function(response) {
                    $scope.handleErrorMessages(response);
                });
        };

        $scope.handleErrorMessages = function(response) {
            $scope.message={};
            $scope.errorData = {};
            $scope.message.title = 'Error';
            $scope.message.text = response.error.message;
            $scope.message.class = 'alert alert-danger';
            $.each(response.error.messages, function(index,value){
                $scope.errorData[index] = response.error.messages[index][0]; 
            });
        };


        $scope.renderHtml = function(html_code)
        {
            return $sce.trustAsHtml(html_code);
        };
    }

</script>
@stop