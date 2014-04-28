<script type="text/javascript">
angular.module('Wizard', [])
.controller('WizardController', function($scope) {

    $scope.steps = [];
    $scope.step = 0;
    $scope.submitText = 'Submit';
    $scope.submissionResult = function(){};

    $scope.init = function(steps, submissionResult) {
        $scope.submissionResult = submissionResult;
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

        $scope.submissionResult();
    };
});
</script>