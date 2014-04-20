@include('partials.notifications')

{{ Form::open(array('url'=>$url, 'class'=>'form-horizontal'))}}
    {{Form::wizard_text('first','f1','Field 1','This is help text') }}
    {{Form::wizard_text('first','f2','Field 2','This is help text') }}
    {{Form::wizard_text('first','f3','Field 3') }}
    {{Form::wizard_text('first','f4') }}
{{ Form::close() }}
