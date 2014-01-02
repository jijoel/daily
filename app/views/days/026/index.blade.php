@section('content')

<p class="note">This is...</p>

{{ Form::open(array('url'=>URL::route('day026.store'))) }}

    <p>
        {{Form::label('field', 'Label:') }}
        {{Form::text('field', Null, array(
            'placeholder'=>'Field Description')) }}
    </p>

    <p>
        {{ Form::submit() }}
    </p>

{{ Form::close() }}

<hr>
<p>{{ $result }}</p>
@stop

