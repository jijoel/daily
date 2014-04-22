@section('content')

<p class="note">This is a DRY form wizard using the Bootstrap FormBuilder package. 
@include('partials.github')</p>

<div id="wizard" ng-app="Wizard" ng-controller="WizardController">

    <div class="col-md-2"><!-- nav block -->
        <ul class="nav nav-pills nav-stacked" id="tabs">
            <li ng-repeat="step in steps" class="@{{step.status}}">
                <a href="#@{{step.href}}" class="alert-link" data-toggle="tab" ng-click="setCurrentStep($index)">@{{step.title}}</a>
            </li>
        </ul>
    </div><!-- nav block -->

    <div class="tab-content col-md-10"><!-- content block -->

        @foreach($pages as $key=>$page)
            <div class="tab-pane" id="{{$key}}">
                <div class="content">
                    @include('days.042.'.$page['view'])->withUrl($url)
                </div>
                @include('partials.angular-wizard-pager')
            </div>
        @endforeach

    </div><!-- content block -->

</div><!-- #wizard -->

@stop

@section('js')
    <script type="text/javascript" src="/js/daily-wizard.js"></script>

    <script type="text/javascript">
        $(function() {

            var wizard_steps =  [
                @foreach($pages as $key=>$value)
                    {href: '{{$key}}', title: '{{$value['title']}}'},
                @endforeach
            ];

            $(function(){
                $('#wizard').scope().init(wizard_steps, function(){
                    alert('submitted!!!');
                });
            });

        });
    </script>

@stop
