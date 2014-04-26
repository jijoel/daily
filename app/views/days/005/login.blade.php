{{ $errors = Session::get('errors') }}

@section('content')
    
    <p class="note">This is an OAuth login page. Log in via your Google+ account.
    @include('partials.github')</p>

    <p><a href="day005_login_google">Login via Google</a></p>


@stop