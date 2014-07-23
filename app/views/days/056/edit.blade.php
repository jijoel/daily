@section('content')

<h2>Edit an item</h2>

{{ KForm::horizontal_open(['url'=>route('day056.update', $item->id), 'method'=>'put'])}}

{{ KForm::text('title', $item->title) }}
{{ KForm::text('tags', join(",",$item->tags->lists('title')) ) }}
{{ KForm::textarea('text', $item->text) }}

{{ KForm::submit('Update')->class('btn btn-primary') }}
{{ KForm::submit('Delete')->form('delete-form')->class('btn btn-primary') }}

{{ KForm::close() }}


{{ KForm::open(['url'=>route('day056.destroy', $item->id), 'method'=>'delete', 'id'=>'delete-form'])}}
{{ KForm::close() }}

@stop

@section('js')
    {{HTML::js('jquery-autosize')}}
    {{HTML::js('select2')}}
    {{HTML::js('underscore')}}

    <script type="text/javascript">
        $('textarea').autosize();
        tags = _.pluck({{$tags}},'title');
        $("#tags").select2({tags: tags });
    </script>
@stop

@section('css')
    {{HTML::css('select2')}}
    {{HTML::css('select2-bootstrap')}}
@stop
