@section('content')

<p class="note">This is an image uploader, using <a href="https://jasny.github.io/bootstrap/javascript/">jasny bootstrap</a> and <a href="http://malsup.com/jquery/form/">jQuery form</a>, and attempting to use Angular. I'm discovering that I really don't know Angular, yet....
@include('partials.github')</p>

<div ng-app ng-controller="Day050Controller">

<div class="row">
    <div ng-repeat="image in images">

        <div class="col-sm-3">
            <div class="thumbnail">
                <img ng-src="days/day044/@{{image.thumbnail}}" alt="@{{image.thumbnail}}">
                <div class="caption">
                    <p class="delete-button" style="float:right">
                        <a ng-click="deleteFile($index)">[x]</a>
                    </p>
                    <p>@{{image.title}}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-3 new-item">
        {{ KForm::open(['url'=>'/day050/api'])->files() }}
            <div class="form-group">
                <div class="fileinput fileinput-new" data-provides="fileinput">
                    <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 100%; height: 150px;">Click to add a new file</div>
                    <div style="display:none">
                        <input type="file" name="thumbnail" id="thumbnail">
                    </div>
                    <div class="input-group">
                        {{ Form::text('title',Null,['placeholder'=>'Title','class'=>'form-control', 'ng-model'=>'title'])}}
                        <div class="input-group-btn">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
                <div class="form-group has-error">
                    <div ng-repeat="error in errors" class="help-block">@{{error}}</div>
                </div>
        
        {{ KForm::close() }}
    </div>

</div><!-- .row -->

</<div><!-- ng-app -->

@stop

@section('js')
{{ HTML::js('jasny-bootstrap')}}
{{ HTML::js('jquery-form')}}

<script type="text/javascript">

$('.fileinput').fileinput();

var Day050Controller = function($scope, $http) 
{
    $scope.errors = [];

    $scope.loadFiles = function() {
        $http.get('day050/api')
            .success(function(data,status,headers,config){
                $scope.images = data;                
            });
    };
    $scope.addFile = function() {
        // haven't been able to figure this out...
    };
    $scope.deleteFile = function(index) {
        $http.delete('day050/api/'+$scope.images[index].id)
            .success(function(){
                $scope.images.splice(index, 1);
            });
    };

    // I've been unable to figure out how to upload a file via angularjs
    $('form').ajaxForm({
        complete: function(xhr) {
            parsed = JSON.parse(xhr.responseText);
            if (parsed.success)
                $scope.showNewObject(parsed);
            else
                $scope.showErrorMessage(parsed);
        }
    });

    $scope.showNewObject = function(obj) {
        $scope.errors = [];
        $scope.images.push(obj.file);
        $scope.$apply();
        $scope.resetForm();
    };

    $scope.showErrorMessage = function(obj) {
        $scope.errors = [];
        if(obj.errors['title']) $scope.errors.push(obj.errors['title'][0]);
        if(obj.errors['thumbnail']) $scope.errors.push(obj.errors['thumbnail'][0]);
        $scope.$apply();
    }

    $scope.resetForm = function()
    {
        $('form').clearForm();
        $('.fileinput').fileinput('clear');
    }

    $scope.loadFiles();
}
    
</script>

@stop

@section('css')
{{ HTML::css('jasny-bootstrap')}}
@stop

