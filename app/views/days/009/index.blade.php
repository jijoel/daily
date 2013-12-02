@section('content')


<p class="note">This is another version of the todo application, based on Domain Driven Design (DDD), including a repository pattern (which is not something I'd ordinarily put into a simple app). Like yesterday's app, it also incorporates Twitter Bootstrap, pagination, and a RESTful controller. It also incorporates a domain object which stands apart from the Laravel framework. This domain object is called TodoBusinessRules, and it enforces some arbitrary business rules. These rules are:</p>

<ul>
    <li>Do not show todos starting with the letter 'B' or ending with the letter 's'</li>
    <li>Only keep new todos starting with phrase 'Simon Says' (and remove 'Simon Says' from text before storing)</li>
    <li>Do not keep todos that include the word "psych!" (it's a trick)</li>
    <li>Do not delete todos that include the characters "!!!" (they're important)</li>
</ul>

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

