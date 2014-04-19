@include('partials.notifications')

{{ Form::open(array('url'=>$url, 'class'=>'form-horizontal'))}}

    <!-- f1 input -->
    @if($errors->has('f1'))
        <div class="form-group has-error">
    @else
        <div class="form-group">
    @endif
            {{ Form::label('second[f1]', 'Foo', ['class'=>'col-md-2 control-label'])}}
            <div class="col-md-10">
                {{ Form::text('second[f1]', Null, ['class'=>'form-control'])}}
                @if($errors->has('f1'))
                    <span class="help-block">{{$errors->first('f1')}}</span>
                @else
                    <span class="help-block">This is help text</span>
                @endif
            </div>
        </div>

{{ Form::close() }}