@section('content')

<p class="note">This is a version of the string wrap kata.</p>

{{ Form::open(array('url'=>URL::route('day025.store'))) }}

    <p>
        {{Form::label('length', 'Length:') }}
        {{Form::input('number', 'length', Null, array('max'=>120,
            'placeholder'=>'(max 120)')) }}
    </p>

    <p>
        {{Form::label('text', 'Text:')}}
        {{Form::textarea('text', Null, array('rows'=>3,
            'placeholder'=>'Please enter your text'))}}
    </p>

    <p>
        {{ Form::submit() }}
    </p>

{{ Form::close() }}

<hr>
<p>{{ $string_wrap }}</p>
@stop

