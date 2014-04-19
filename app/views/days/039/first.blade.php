@include('partials.notifications')

{{ Form::open(array('url'=>$url, 'class'=>'form-horizontal'))}}

    <!-- f1 input -->
    @if($errors->has('f1'))
        <div class="form-group has-error">
    @else
        <div class="form-group">
    @endif
            {{ Form::label('first[f1]', 'Field1', ['class'=>'col-md-2 control-label'])}}
            <div class="col-md-10">
                {{ Form::text('first[f1]', Null, ['class'=>'form-control'])}}
                @if($errors->has('f1'))
                    <span class="help-block">{{$errors->first('f1')}}</span>
                @else
                    <span class="help-block">This is help text</span>
                @endif
            </div>
        </div>

    <!-- f2 input -->
    @if($errors->has('f2'))
        <div class="form-group has-error">
    @else
        <div class="form-group">
    @endif
            {{ Form::label('first[f2]', 'Field2', ['class'=>'col-md-2 control-label'])}}
            <div class="col-md-10">
                {{ Form::text('first[f2]', Null, ['class'=>'form-control'])}}
                @if($errors->has('f2'))
                    <span class="help-block">{{$errors->first('f2')}}</span>
                @else
                    <span class="help-block">This is help text</span>
                @endif
            </div>
        </div>

    <!-- f3 input -->
    @if($errors->has('f3'))
        <div class="form-group has-error">
    @else
        <div class="form-group">
    @endif
            {{ Form::label('first[f3]', 'Field3', ['class'=>'col-md-2 control-label'])}}
            <div class="col-md-10">
                {{ Form::text('first[f3]', Null, ['class'=>'form-control'])}}
                @if($errors->has('f3'))
                    <span class="help-block">{{$errors->first('f3')}}</span>
                @endif
            </div>
        </div>

    <!-- f4 input -->
    @if($errors->has('f4'))
        <div class="form-group has-error">
    @else
        <div class="form-group">
    @endif
            {{ Form::label('first[f4]', 'Field4', ['class'=>'col-md-2 control-label'])}}
            <div class="col-md-10">
                {{ Form::text('first[f4]', Null, ['class'=>'form-control'])}}
                @if($errors->has('f4'))
                    <span class="help-block">{{$errors->first('f4')}}</span>
                @endif
            </div>
        </div>

    <!-- f5 input -->
    @if($errors->has('f5'))
        <div class="form-group has-error">
    @else
        <div class="form-group">
    @endif
            {{ Form::label('first[f5]', 'Field5', ['class'=>'col-md-2 control-label'])}}
            <div class="col-md-10">
                {{ Form::text('first[f5]', Null, ['class'=>'form-control'])}}
                @if($errors->has('f5'))
                    <span class="help-block">{{$errors->first('f5')}}</span>
                @endif
            </div>
        </div>

{{ Form::close() }}
