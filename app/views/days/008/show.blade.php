@section('content')

<h1>Show Todo</h1>

<p>{{ link_to_route('day008.index', 'Return to all todos') }}</p>

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Name</th>
        </tr>
    </thead>

    <tbody>
        <tr>
            <td>{{{ $todo->item }}}</td>
            <td>{{ link_to_route('day008.edit', 'Edit', array($todo->id), array('class' => 'btn btn-info')) }}</td>
            <td>
                {{ Form::open(array('method' => 'DELETE', 'route' => array('day008.destroy', $todo->id))) }}
                    {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                {{ Form::close() }}
            </td>
        </tr>
    </tbody>
</table>

@stop
