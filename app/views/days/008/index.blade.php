@section('content')


<p class="note">This is a somewhat more sophisticated (though not as easy-to-use) version of a todo application. It incorporates Twitter Bootstrap, pagination, and a RESTful controller. It's based loosely on a scaffold from Jeffrey Way's <a href="https://github.com/JeffreyWay/Laravel-4-Generators">Laravel-4-Generators</a> project, but testing is done differently. I'm splitting up the controller unit tests from the controller functional tests. This helps me find where the break happens, if something breaks. It should be a nice launching pad to more interesting projects.  @include('partials.github')</p>


<h2>All Todos</h2>

<p>{{ link_to_route('day008.create', 'Add new todo') }}</p>

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
                    <td>{{ link_to_route('day008.edit', 'Edit', array($todo->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('day008.destroy', $todo->id))) }}
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

