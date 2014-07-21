@section('content')

<h2>Edit an item</h2>

{{ KForm::horizontal_open(['url'=>route('day055.update', $item->id), 'method'=>'put'])}}

{{ KForm::text('title', $item->title) }}
{{ KForm::textarea('text', $item->text) }}

{{ KForm::submit('Update')->class('btn btn-primary') }}
{{ KForm::submit('Delete')->form('delete-form')->class('btn btn-primary') }}

{{ KForm::close() }}


{{ KForm::open(['url'=>route('day055.destroy', $item->id), 'method'=>'delete', 'id'=>'delete-form'])}}
{{ KForm::close() }}

@stop


