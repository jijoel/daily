@section('content')

<h2>Create a new item</h2>

{{ KForm::horizontal_open(['url'=>route('day055.store')]) }}

{{ KForm::text('title') }}
{{ KForm::textarea('text') }}

{{ KForm::submit('Add')->class('btn btn-primary') }}

{{ KForm::close() }}

@stop

@section('js')
    {{HTML::js('jquery-autosize')}}
    <script type="text/javascript">
        $('textarea').autosize();
    </script>
@stop
