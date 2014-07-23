@section('content')

<h2>Create a new item</h2>

{{ KForm::horizontal_open(['url'=>route('day056.store')]) }}

{{ KForm::text('title') }}
{{ KForm::text('tags') }}
{{ KForm::textarea('text') }}

{{ KForm::submit('Add')->class('btn btn-primary') }}

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
