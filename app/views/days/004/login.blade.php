{{ $errors = Session::get('errors') }}

@section('content')
    
    <p class="note">This is a simple login page. To see it work, you can use user: <b>foo</b>; password: <b>test</b>. See how it fails by using other credentials.</p>

    @if(count($errors)>0)
    <div class="messages">
        <p>There were errors:</p>
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

    {{ Form::open(array('url'=>URL::route('day004_login'), 'method'=>'POST')) }}

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
    </p>

    {{ Form::close() }}

@stop