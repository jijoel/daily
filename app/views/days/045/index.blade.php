@section('content')

    <p class="note">This is a study of submitting AJAX forms with jQuery vs with Angular, based on <a href="http://scotch.io/tutorials/javascript/submitting-ajax-forms-the-angularjs-way">this tutorial</a>.
    @include('partials.github')</p>

    <div class="row">
        <div class="col-md-6">
            @include('days.045.jquery')
        </div>
        <div class="col-md-6">
            @include('days.045.angular')
        </div>
    </div>

@stop


@section('js')
    {{ HTML::js('jquery-autosize')}}
    <script type="text/javascript">
        $('textarea').autosize();
    </script>

    @yield('jquery_js')
    @yield('angular_js')

@stop
