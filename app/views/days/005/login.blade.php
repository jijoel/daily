{{ $errors = Session::get('errors') }}

@section('content')
    
    <p class="note">This is an OAuth login page. Log in via your Google+ account.</p>

    <p><a href="https://accounts.google.com/o/oauth2/auth?state=%2Fprofile&amp;redirect_uri=http://daily.kumuwai.com:80/day005_login_google&amp;response_type=code&amp;client_id=329408182449.apps.googleusercontent.com&amp;approval_prompt=force&amp;scope=https%3A%2F%2Fwww.googleapis.com%2Fauth%2Fuserinfo.email+https%3A%2F%2Fwww.googleapis.com%2Fauth%2Fuserinfo.profile">Login via Google</a></p>


@stop