@section('content')

<p class="note">This is a study on creating a wizard for a Bootstrap form, with a Laravel back-end. It uses the <a href="http://vadimg.com/twitter-bootstrap-wizard-example/">Twitter Bootstrap Wizard Plugin</a>.<p>

{{ Former::framework('TwitterBootstrap3') }}

<div id="wizard">

    <div class="col-md-2"><!-- nav block -->
        <ul class="nav nav-pills nav-stacked" id="tabs">
            <li class="active"><a href="#first" data-toggle="tab">First</a></li>
            <li><a href="#second" data-toggle="tab">Second</a></li>
            <li><a href="#third" data-toggle="tab">Third</a></li>
            <li class="alert-danger"><a class="alert-link" href="#fourth" data-toggle="tab">Fourth</a></li>
            <li><a href="#last" data-toggle="tab">Last</a></li>
        </ul>
    </div><!-- /nav block -->

    <div class="tab-content col-md-10"><!-- content block -->
        <div class="tab-pane active" id="first">
            {{ Former::horizontal_open(Url::full())}}
                {{ Former::text('f1')->label('Field1')->help('this is help text') }}
                {{ Former::text('f2')->label('Field2')->help('this is more help text') }}
                {{ Former::text('f3')->label('Field3') }}
                {{ Former::text('f4')->label('Field4') }}
                {{ Former::text('f5')->label('Field5') }}
            {{ Former::close() }}

            @include('partials.wizard-pager')
        </div>

        <div class="tab-pane" id="second">
            {{ Former::horizontal_open(Url::full()) }}
                {{ Former::text('f1')->label('Foo')->help('this is help text') }}
            {{ Former::close() }}
            @include('partials.wizard-pager')
        </div>

        <div class="tab-pane" id="third">
            <p>This is the third page</p>
            @include('partials.wizard-pager')
        </div>

        <div class="tab-pane" id="fourth">
            <p>This is the fourth page</p>
            @include('partials.wizard-pager')
        </div>

        <div class="tab-pane" id="last">
            <p>This is the last page</p>
            @include('partials.wizard-pager')
        </div>


    </div><!-- /content block -->
</div>

@stop

@section('js')
<script type="text/javascript">
    $.getScript('/js/jquery.bootstrap.wizard.min.js', function(){
        $('#wizard').bootstrapWizard({
            'tabClass': 'nav nav-stacked',
            'onTabShow': function(tab, navigation, index) {
                var $total = navigation.find('li').length;
                var $current = index+1;
                
                // If it's the last tab then hide the last button and show the finish instead
                if($current >= $total) {
                    $('#wizard').find('.pager .next').hide();
                    $('#wizard').find('.pager .finish').show();
                    $('#wizard').find('.pager .finish').removeClass('disabled');
                } else {
                    $('#wizard').find('.pager .next').show();
                    $('#wizard').find('.pager .finish').hide();
                }
            },
            'onTabChange': function(tab, navigation, fromIndex) {
                var cardName = tab.find('a').attr('href');
                var card = $(cardName);
                form = card.find('form');
                if (form.length) {
                    cardName = cardName.substring(1);
                    $.post(form.attr('action')+'?page='+cardName, form.serialize(), function(data){
                        card.html( data );
                    });
                }

                // a = tab;
                // b = navigation;
                // c = fromIndex;
                // // console.log(navigation.find('li'))
                // // $.post()
                // console.log(tab);
                // console.log(b);
                // console.log(c);
            },
        });
        
        $('#wizard .finish').click(function() {
            alert('Finished!, Starting over!');
            $('#wizard').find("a[href*='tab1']").trigger('click');
        });
    });
</script>
@stop



    // // $('.btn.next').click(function(e){
    // //     page = getParentTabContentPane(e);
    // //     $.post('/apply?page='+page.attr('id'), page.find('form').serialize(), function(data){
    // //         page.html( data );
    // //     });
    // //     // e.preventDefault();
    // //     showPane(page.next());
    // // });
    // // $('.btn.back').click(function(e){
    // //     // e.preventDefault();
    // //     showPane(getParentTabContentPane(e).prev());
    // // });
