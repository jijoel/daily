@section('content')

<p class="note">This is an input form featuring autocomplete.</p>

<p>
    {{ Form::label('autocomplete', 'Autocomplete Text') }}
    {{ Form::input('autocomplete', 'autocomplete', Null, array('placeholder'=>'State Name')) }}
</p>

@stop