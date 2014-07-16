@section('content')

<p class="note">This is a test of protected data. Basically, I want some users to have access to some things, others to have access to other things. Ultimately, this will be tied to a role-based access control system, but for right now, we'll just try it with usernames. I'm not really crazy about putting logic in the view, but I guess that since it's logic on what, exactly, the view will show, it's probably OK.
@include('partials.github')</p>

<p class="note">To test this, you can log in with users "foo", "bar", or "fizz". The password is "test" for all test users.</p>

    @if(count($errors)>0)
    <div class="messages">
        <ul class="error">
        @foreach($errors->all('<li>:message</li>') as $error)
            {{$error}}
        @endforeach
        </ul> <!--  .errors -->
    </div> <!--  .messages -->
    @endif

    @if(isset($message))
    <div class="messages">
        {{$message}}
    </div>
    @endif

    {{ Form::open() }}

    <p>
        {{ Form::label('username', 'Username:') }}
        {{ Form::text('username', $username) }}
    </p>
    <p>
        {{ Form::label('password', 'Password:') }}
        {{ Form::password('password') }}
    </p>
    <p>
        {{ Form::submit('Login')}}

        @if(Auth::check())
            {{ Form::submit('Logout', ['onclick'=>"$('#logout').val('logout')"])}}
        @endif
    </p>

    {{ Form::hidden('logout',Null,['id'=>'logout'])}}
    {{ Form::close() }}

    @if($username=='foo')
        <p>This paragraph should only be visible to user Foo</p>
    @endif

    @if($username=='bar')
        <p>This paragraph should only be visible to user Bar</p>
    @endif

    @if(Auth::check())
        <p>This paragraph should be visible to any logged-in user</p>
    @endif

    <p>This paragraph should be visible to anyone (including guests)</p>

@stop

