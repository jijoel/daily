@section('content')

<h1>Edit Todo</h1>
{{ Form::model($todo, array('method' => 'PATCH', 'route' => array('day008.update', $todo->id))) }}
    <ul>
        <li>
            {{ Form::label('item', 'Name:') }}
            {{ Form::text('item') }}
        </li>

        <li>
            {{ Form::submit('Update', array('class' => 'btn btn-info')) }}
            {{ link_to_route('day008.show', 'Cancel', $todo->id, array('class' => 'btn')) }}
        </li>
    </ul>
{{ Form::close() }}

@if ($errors->any())
    <ul>
        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
    </ul>
@endif

@stop

