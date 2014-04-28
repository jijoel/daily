@section('content')

<p class="note">This is a study on creating a wizard for a Bootstrap form, with a Laravel back-end. It uses the <a href="http://vadimg.com/twitter-bootstrap-wizard-example/">Twitter Bootstrap Wizard Plugin</a>. @include('partials.github')</p>

<div id="wizard">

    <div class="col-md-2"><!-- nav block -->
        <ul class="nav nav-pills nav-stacked" id="tabs">
            <li><a href="#first" data-toggle="tab">First</a></li>
            <li><a href="#second" data-toggle="tab">Second</a></li>
            <li><a href="#third" data-toggle="tab">Third</a></li>
            <li><a href="#fourth" data-toggle="tab">Fourth</a></li>
            <li><a href="#last" data-toggle="tab">Last</a></li>
        </ul>
    </div><!-- /nav block -->

    <div class="tab-content col-md-10"><!-- content block -->
        <div class="tab-pane" id="first">
            <div class="content">
                @include('days.039.first')
            </div>
            @include('days.039.wizard-pager')
        </div>

        <div class="tab-pane" id="second">
            <div class="content">
                @include('days.039.second')
            </div>
            @include('days.039.wizard-pager')
        </div>

        <div class="tab-pane" id="third">
            <p>This is the third page</p>
            @include('days.039.wizard-pager')
        </div>

        <div class="tab-pane" id="fourth">
            <p>This is the fourth page</p>
            @include('days.039.wizard-pager')
        </div>

        <div class="tab-pane" id="last">
            <p>This is the last page</p>
            @include('days.039.wizard-pager')
        </div>


    </div><!-- /content block -->
</div>

@stop

@section('js')
<script type="text/javascript">
    // $.getScript('/vendor/js/jquery.bootstrap.wizard.min.js', function(){
    $.getScript("{{ Config::get('assets.js.bootstrap-wizard') }}", function(){
        $('#wizard').bootstrapWizard({
            'tabClass': 'nav nav-stacked',
            'onTabShow': function(tab, navigation, index) {
                var $total = navigation.find('li').length;
                var $current = index+1;
                
                // If it's the last tab then hide the last button and show the finish instead
                if($current >= $total) {
                    $('#wizard').find('.pager .next').hide();
                    $('#wizard').find('.pager .finish').show();
                    var errors = navigation.find('.alert-danger');
                    if (errors.length) {
                        $('#wizard').find('.pager .finish').addClass('disabled');                        
                        $('#wizard').find('.pager .finish').removeClass('enabled');                        
                    } else {
                        $('#wizard').find('.pager .finish').removeClass('disabled');
                        $('#wizard').find('.pager .finish').addClass('enabled');
                    }
                } else {
                    $('#wizard').find('.pager .next').show();
                    $('#wizard').find('.pager .finish').hide();
                }
            },
            'onTabChange': function(tab, navigation, fromIndex) {
                var cardName = tab.find('a').attr('href');
                var card = $(cardName);
                var form = card.find('form');
                if (form.length) {
                    cardName = cardName.substring(1);
                    $.post(form.attr('action')+'?page='+cardName, form.serialize(), function(data){
                        card.find('.content').html( data );
                        var errs = card.find('.has-error');
                        if (errs.length) {
                            tab.addClass('alert-danger');
                            tab.removeClass('alert-success');
                            tab.find('a').addClass('alert-link');
                        } else {
                            tab.removeClass('alert-danger');
                            tab.addClass('alert-success');
                        }
                    });
                }
            },
        });
        
        $('#wizard .finish').click(function() {
            if ($('#wizard').find('.pager .finish').hasClass('enabled')) {
                alert('Finished!');
            }
        });
    });
</script>
@stop

