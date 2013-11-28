{{ $errors = Session::get('errors') }}

@section('content')
    
    <p class="note">This is an OAuth login page. Log in via your Google+ account.</p>

    <p><a href="https://accounts.google.com/o/oauth2/auth?state=/profile&amp;redirect_uri=http://localhost:80/daily.dev/day005_login_google&amp;response_type=code&amp;client_id=329408182449.apps.googleusercontent.com&amp;approval_prompt=force&amp;scope=https://www.googleapis.com/auth/userinfo.email+https://www.googleapis.com/auth/userinfo.profile">Login via Google</a></p>


@stop