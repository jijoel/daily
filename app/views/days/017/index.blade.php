@section('content')

<p class="note">This is a study of several different field types, created with the Laravel form class. @include('partials.github')</p>

    {{ Form::open() }}
    <p>
        {{ Form::label('text', 'Standard Text') }}
        {{ Form::text('text', $data['default-text']) }}
    </p>

    <p>
        {{ Form::label('text', 'Standard Text With Placeholder') }}
        {{ Form::text('text', Null, array('placeholder'=>'placeholder')) }}
    </p>

    <p>
        {{ Form::label('long', 'Long Memo') }}
        {{ Form::textarea('long', $data['default-text'], array('style'=>'width: 400px; height: 40px')) }}
    </p>

    <p>
        {{-- This automatically grows due to the jquery.autosize script --}}
        {{ Form::label('autolong', 'Auto-Growing Memo') }} 
        {{ Form::textarea('autolong', $data['autogrow-text'], array('style'=>'width: 150px; height: 20px')) }}
    </p>

    <p>
        {{ Form::label('pw', 'Password') }} 
        {{ Form::password('pw', array('placeholder'=>'Password')) }}
    </p>

    <p>
        {{ Form::label('pw2', 'Password with icon') }} 
        <div class="input-prepend">
            <span class="add-on"><i class="icon-lock"></i></span>
            {{ Form::password('pw2', array('placeholder'=>'Password')) }}
        </div>
    </p>

    <p>
        {{ Form::label('email', 'Email Address') }} 
        {{ Form::email('email', Null) }}
    </p>

    <p>
        {{ Form::label('email2', 'Email With Icon') }}
        <div class="input-prepend">
            <span class="add-on"><i class="icon-envelope"></i></span> 
           {{ Form::email('email2', Null, array('placeholder'=>'email')) }}
        </div>
    </p>

    <p>
        {{ Form::label('file', 'File Uploader') }} 
        {{ Form::file('file') }}
    </p>

    <p>
        <label class="checkbox">
            {{ Form::checkbox('check1', 'value') }} Checkbox
        </label>
    </p>

    <p>
        <label class="checkbox">
            {{ Form::checkbox('check2', 'value') }} Checkbox2
        </label>
    </p>

    <p>
        <label class="radio">
        {{ Form::radio('radio1', 'value') }}  Radio Button 1
        </label>
    </p>
    <p>
        <label class="radio">
        {{ Form::radio('radio1', 'value', True) }}  Radio Button 2
        </label>
    </p>        

    <p>
        {{ Form::label('date', 'Date') }}
        {{ Form::input('date', 'date', '7/5/2013') }}
    </p>

    <p>
        {{ Form::label('num', 'Number') }}
        {{ Form::input('number', 'num', 10) }}
    </p>

    <p>
        {{ Form::label('phone', 'Phone Number') }}
        {{ Form::input('telephone', 'phone') }}
    </p>

    <p>
        {{ Form::label('url', 'URL') }}
        {{ Form::input('url', 'url', $data['url']) }}
    </p>

    <p>
        {{ Form::label('search', 'Search') }}
        {{ Form::input('search', 'search') }}
    </p>


    {{ Form::close() }}
@stop
