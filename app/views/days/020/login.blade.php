@section('subcontent')
    {{ Form::open(array('url'=>URL::to('day020/login'), 'method'=>'POST')) }}

    <p>
        {{ Form::label('username', 'Username:') }}
        {{ Form::text('username') }}
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