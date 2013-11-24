@section('content')

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
