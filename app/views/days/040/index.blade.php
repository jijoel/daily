@section('content')

<p class="note">This is an attempt at a cleaner Bootstrap form wizard (using Angular). 
@include('partials.github')</p>

<div id="wizard" ng-app="App" ng-controller="WizardController">

    <div class="col-md-2"><!-- nav block -->
        <ul class="nav nav-pills nav-stacked" id="tabs">
            <li ng-repeat="step in steps" class="@{{step.status}}">
                <a href="#@{{step.href}}" class="alert-link" data-toggle="tab" ng-click="setCurrentStep($index)">@{{step.title}}</a>
            </li>
        </ul>
    </div><!-- nav block -->

    <div class="tab-content col-md-10"><!-- content block -->

        {{ Form::wizard_pane('first', View::make('days.040.first')->withUrl($url))}}
        {{ Form::wizard_pane('second', View::make('days.040.second')->withUrl($url))}}
        {{ Form::wizard_pane('third', 'This is the third page')}}
        {{ Form::wizard_pane('last', 'This is the last page')}}

    </div><!-- content block -->

</div><!-- #wizard -->

@stop

@section('css')
    <link rel="stylesheet" type="text/css" href="/css/bootstrap-theme.min.css">
    <style type="text/css">
        .wizard .btn {
            border-radius: 15px;
        }
    </style>
@stop


@section('js')
<script type="text/javascript">
    var wizard_steps =  [
        {href: 'first', title: 'First'},
        {href: 'second', title: 'Second'}, 
        {href: 'third', title: 'Third'}, 
        {href: 'last', title: 'Finish'},
    ];

    $(function(){
        $('#wizard').scope().init(wizard_steps);
    });


    angular.module('App', [])
    .controller('WizardController', function($scope) {

        $scope.steps = [];
        $scope.step = 0;
        $scope.submitText = '';

        $scope.init = function(steps) {
            $scope.steps = steps;
            $scope.$apply();

            for (i = 0; i < $scope.steps.length; i++)
                if (undefined == $scope.steps[i].status)
                    $scope.steps[i].status = '';

            $scope.setCurrentStep(0);
            $scope.setupSubmitText();
        };

        $scope.isFirstStep = function() {
            return $scope.step === 0;
        };

        $scope.isLastStep = function() {
            return $scope.step === ($scope.steps.length - 1);
        };

        $scope.isCurrentStep = function(step) {
            return $scope.step === step;
        };

        $scope.setCurrentStep = function(step) {
            if (! $scope.isCurrentStep(step))
                $scope.processCurrentStep();

            $scope.step = step;

            $scope.getCurrentTab().tab('show');
        };

        $scope.processCurrentStep = function() {
            var step = $scope.getCurrentStep();
            var card = $('#'+step.href);
            var form = card.find('form');
            if (! form.length) 
                return;

            $.post(
                form.attr('action')+'?page='+step.href, 
                form.serialize(), 
                function(data){
                    card.find('.content').html( data );
                    if (card.find('.has-error').length)
                        $scope.setStatus(step, 'alert-danger');
                    else
                        $scope.setStatus(step, 'alert-success');
                }
            );
        };

        $scope.setStatus = function(step, status) {
            step.status = step.status.replace('alert-danger','');
            step.status = step.status.replace('alert-success','');
            step.status += ' ' + status;
            step.status = step.status.replace('  ','');
            $scope.$apply();
        };

        $scope.getCurrentStep = function() {
            return $scope.steps[$scope.step];
        };

        $scope.getCurrentTab = function() {
            return $('#wizard .nav').find('[href=#'+$scope.getCurrentStep().href+']');
        }

        $scope.setupSubmitText = function() {
            $(document)
                .ajaxStart(function(){
                    $scope.submitText = "Loading...";
                })
                .ajaxStop(function(){
                    $scope.submitText = "Submit";
                    $scope.$apply();
                });
        };

        $scope.getNextLabel = function() {
            if (! $scope.isLastStep())
                return 'Next >';

            return $scope.submitText;
        };

        $scope.getNextEnabled = function() {
            if (! $scope.isLastStep())
                return;

            if ($scope.submitText != 'Submit')
                return 'disabled';

            if ($scope.stepWithFormIsUnsuccessful())
                return 'disabled';

            return;
        }

        $scope.stepWithFormIsUnsuccessful = function() {
            for (i = 0; i < $scope.steps.length-1; i++) {
                if ($('#'+$scope.steps[i].href).find('form').length)
                    if ($scope.steps[i].status.indexOf('alert-success') == -1)
                        return true;
            }    
            return false;
        }

        $scope.handlePrevious = function() {
            if (! $scope.isFirstStep()) 
                $scope.setCurrentStep($scope.step - 1);
        };

        $scope.handleNext = function() {
            if(! $scope.isLastStep()) 
                return $scope.setCurrentStep($scope.step + 1);

            alert ('submitted!');
        };
    });
</script>

@stop

