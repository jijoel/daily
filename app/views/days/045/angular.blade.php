<div class="well" ng-app="formApp" ng-controller="formController">
    <form id="angular" ng-submit="processForm()">
        <legend>Angular Form</legend>
        <div class="message" ng-class="message.class">
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

        <!-- NEMESIS -->
        <div class="form-group nemesis-control" ng-class="{ 'has-error' : errorData.nemesis }">
            <label class="control-label">Nemesis</label>
            <input type="text" name="nemesis" class="form-control" placeholder="Villain" ng-model="formData.nemesis">
            <span class="help-block" ng-show="errorData.nemesis">@{{errorData.nemesis}}</span>
        </div>

        <!-- DETAILS -->
        <div class="form-group details-control" ng-class="{ 'has-error' : errorData.details }">
            <label class="control-label">Details</label>
            <textarea name="details" class="form-control" ng-model="formData.details"></textarea>
            <span class="help-block" ng-show="errorData.alias">@{{errorData.details}}</span>
        </div>

        <!-- SUBMIT BUTTON -->
        <button type="submit" class="btn btn-success btn-sm btn-block">
            <span class="glyphicon glyphicon-flash"></span> Submit!
        </button>
    </form>
    
</div>


@section('angular_js')
<script type="text/javascript">
    var formApp = angular.module('formApp', []);

    // create angular controller and pass in $scope and $http
    function formController($scope, $http) {
        $scope.formData = {
            nemesis: "{{$nemesis}}",
        };
        $scope.message = {};

        $scope.processForm = function() {
            $http.post('/day045', $scope.formData)
                .success(function(data) {
                    $scope.errorData = {};
                    $.each(data, function(index,value){
                        $scope.errorData[index] = data[index][0];
                    });

                    if (data.length !== 0) {
                        $scope.message.title='Errors';
                        $scope.message.text='Please see below for errors';
                        $scope.message.class = 'alert alert-danger';
                    } else {
                        $scope.message.title='Success';
                        $scope.message.text='Your data has been added successfully';
                        $scope.message.class='alert alert-success';
                    }
                });
        };

    }

</script>
@stop