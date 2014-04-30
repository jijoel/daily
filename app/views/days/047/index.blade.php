@section('content')

<p class="note">This is a study on bootstrap tabs, using <a href="https://github.com/angular-ui/bootstrap">angular-ui bootstrap.</a>
@include('partials.github')</p>

<div ng-app="foo">
<script id="template/alert/alert.html" type="text/ng-template">
  <div class='alert' ng-class='type && "alert-" + type'>
      <button ng-show='closeable' type='button' class='close' ng-click='close()'>Close</button>
      <div ng-transclude></div>
  </div>
</script>

<script id="template/tabs/tabset.html" type="text/ng-template">
    <div class="tabbable clearfix">
        <ul class="nav @{{type && 'nav-' + type}}" ng-class="{'nav-stacked': vertical, 'nav-justified': justified, 'col-md-2': vertical}" ng-transclude>
        </ul>
        <div class="tab-content" ng-class="{'col-md-10': vertical}">
            <div class="tab-pane" 
                ng-repeat="tab in tabs" 
                ng-class="{active: tab.active}" 
                tab-content-transclude="tab">
            </div>
        </div>
    </div>
</script>


<div ng-controller="TabsDemoCtrl">
  <p>Select a tab by setting active binding to true:</p>
  <p>
    <button class="btn btn-default btn-sm" ng-click="tabs[0].active = true">Select second tab</button>
    <button class="btn btn-default btn-sm" ng-click="tabs[1].active = true">Select third tab</button>
  </p>
  <p>
    <button class="btn btn-default btn-sm" ng-click="tabs[1].disabled = !tabs[1].disabled">Enable / Disable third tab</button>
  </p>
  <hr />

  <tabset>
    <tab heading="Static title">Static content</tab>
    <tab ng-repeat="tab in tabs" heading="@{{tab.title}}" active="tab.active" disabled="tab.disabled">
      @{{tab.content}}
    </tab>
    <tab select="alertMe()">
      <tab-heading>
        <i class="glyphicon glyphicon-bell"></i> Alert!
      </tab-heading>
      I've got an HTML heading, and a select callback. Pretty cool!
    </tab>
  </tabset>

  <hr />

  <tabset vertical="true" type="navType">
    <tab heading="Vertical 1">Vertical content 1</tab>
    <tab heading="Vertical 2">Vertical content 2</tab>
  </tabset>

  <hr />

  <tabset justified="true">
    <tab heading="Justified">Justified content</tab>
    <tab heading="SJ">Short Labeled Justified content</tab>
    <tab heading="Long Justified">Long Labeled Justified content</tab>
  </tabset>
</div>

<div ng-controller="AlertDemoCtrl">
  <alert ng-repeat="alert in alerts" type="alert.type" close="closeAlert($index)">
    @{{alert.msg}}
  </alert>
  <button class='btn' ng-click="addAlert()">Add Alert</button>
</div>
</div>

@stop




@section('js')
    
{{ HTML::js('angular-bootstrap') }}


<script type="text/javascript">

function AlertDemoCtrl($scope) {
  $scope.alerts = [
    { type: 'error', msg: 'Oh snap! Change a few things up and try submitting again.' }, 
    { type: 'success', msg: 'Well done! You successfully read this important alert message.' }
  ];

  $scope.addAlert = function() {
    $scope.alerts.push({msg: "Another alert!"});
  };

  $scope.closeAlert = function(index) {
    $scope.alerts.splice(index, 1);
  };

}

var TabsDemoCtrl = function ($scope) {
  $scope.tabs = [
    { title:"Dynamic Title 1", content:"Dynamic content 1" },
    { title:"Dynamic Title 2", content:"Dynamic content 2", disabled: true }
  ];

  $scope.alertMe = function() {
    setTimeout(function() {
      alert("You've selected the alert tab!");
    });
  };

  $scope.navType = 'pills';
};

angular.module("foo", ["ui.bootstrap"]);

</script>

@stop

