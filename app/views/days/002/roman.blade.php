@section('content')

<p class="note">This is an arabic to roman numeral converter. Enter an arabic (decimal) value below, then click Convert to see the Roman equivalent.  @include('partials.github')</p>

    {{ Form::open(array('url'=>URL::route('roman.store'), 'method'=>'POST')) }}

    <p>
        {{ Form::label('decimal', 'Decimal value:') }}
        {{ Form::input('number', 'decimal', $decimal) }}
        {{ Form::submit('Convert')}}
    </p>

    <p class="roman">
        @if(isset($roman))
            {{ 'Roman value: ' . $roman }}
        @endif
    </p>

    {{ Form::close() }}

@stop
