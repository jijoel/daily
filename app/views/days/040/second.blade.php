@include('partials.notifications')

{{ Form::open(array('url'=>$url, 'class'=>'form-horizontal'))}}
    {{Form::wizard_text('second','f1','Field 1','This is help text') }}
{{ Form::close() }}
