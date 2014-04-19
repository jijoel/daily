<div class="wizard form-group">
    <div class="pull-right">
        <a class="btn btn-primary btn-sm" ng-click="handlePrevious()" ng-show="!isFirstStep()">&lt; Previous</a>
        <a class="btn btn-primary btn-sm" ng-click="handleNext()">@{{getNextLabel()}}</a>
    </div>
</div>

