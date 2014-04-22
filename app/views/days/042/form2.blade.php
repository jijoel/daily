@include('partials.notifications')

{{ KForm::open(array('url'=>$url))->horizontal() }}
    {{ KForm::text('f1')->label('Field1*') }}
    {{ KForm::text('f2')->label('Field2') }}
{{ KForm::close() }}
