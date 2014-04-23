@section('content')

<p class="note">This is an input form featuring autocomplete.  @include('partials.github')</p>

<p>
    {{ Form::label('autocomplete', 'Autocomplete Text') }}
    {{ Form::input('autocomplete', 'autocomplete', Null, array('placeholder'=>'State Name')) }}
</p>

@stop