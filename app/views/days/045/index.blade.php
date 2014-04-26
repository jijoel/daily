@section('content')

    <p class="note">This is a study of submitting AJAX forms with jQuery vs with Angular, based on <a href="http://scotch.io/tutorials/javascript/submitting-ajax-forms-the-angularjs-way">this tutorial</a>.
    @include('partials.github')</p>

    @include('days.045.jquery')
    @include('days.045.angular')

@stop


@section('js')
    @yield('jquery_js')
    @yield('angular_js')
@stop