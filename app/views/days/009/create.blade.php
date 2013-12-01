@section('content')

<h2>Create Todo</h2>

{{ Form::open(array('route' => 'day009.store')) }}
    <ul>
        <li>
            {{ Form::label('item', 'Name:') }}
            {{ Form::text('item') }}
        </li>

        <li>
            {{ Form::submit('Submit', array('class' => 'btn btn-info')) }}
        </li>
    </ul>
{{ Form::close() }}

@if ($errors->any())
    <ul>
        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
    </ul>
@endif

@stop


