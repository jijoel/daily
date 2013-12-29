@section('content')

<p class="note">Enter a number below to find the prime factors of that number</p>

{{ Form::open(array('url'=>URL::route('day022.store'))) }}
<p>
    {{ Form::label('number', 'Number') }}
    {{ Form::input('number', 'number') }}
</p>
{{ Form::submit() }}
{{ Form::close() }}

<p>Calculated Factors:</p>
<h1>
    @foreach($factors as $factor)
        {{ $factor }}&nbsp; &nbsp;
    @endforeach
</h1>

@stop

