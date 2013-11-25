@section('content')

    <p class="note">This version of the roman numeral exercise looks and acts the same on the front end, but is very different on the back end. It uses a Laravel controller, a layout, and other interesting things like that. Check it out on <a href="https://github.com/jijoel/daily">github</a>.</p>

    @if(count($errors)>0)
    <div class="messages">
        <p>There were errors converting the number:</p>
        <ul class="error">
        @foreach($errors->all('<li>:message</li>') as $error)
            {{$error}}
        @endforeach
        </ul> <!--  .errors -->
    </div> <!--  .messages -->
    @endif

    {{ Form::open(array('url'=>URL::route('roman2.store'), 'method'=>'POST')) }}

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