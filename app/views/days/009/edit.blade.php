@section('content')

<h2>Edit Todo</h2>
{{ Form::model($todo, array('method' => 'PATCH', 'route' => array('day009.update', $todo->id))) }}
    <ul>
        <li>
            {{ Form::label('item', 'Name:') }}
            {{ Form::text('item') }}
        </li>

        <li>
            {{ Form::submit('Update', array('class' => 'btn btn-info')) }}
            {{ link_to_route('day009.show', 'Cancel', $todo->id, array('class' => 'btn')) }}
        </li>
    </ul>
{{ Form::close() }}

@if ($errors->any())
    <ul>
        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
    </ul>
@endif

@stop

