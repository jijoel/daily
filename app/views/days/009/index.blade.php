@section('content')


<p class="note">This is another version of the todo application, based on a repository pattern (which is not something I'd ordinarily put in a simple app). Like yesterday's app, it also incorporates Twitter Bootstrap, pagination, and a RESTful controller.</p>


<h2>All Todos</h2>

<p>{{ link_to_route('day009.create', 'Add new todo') }}</p>

@if ($todos->count())
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Name</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($todos as $todo)
                <tr>
                    <td>{{{ $todo->item }}}</td>
                    <td>{{ link_to_route('day009.edit', 'Edit', array($todo->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('day009.destroy', $todo->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $todos->links() }}
@else
    There are no todos
@endif

@stop

