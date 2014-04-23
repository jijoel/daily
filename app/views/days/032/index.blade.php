@section('content')

<p class="note">This is a test to see if we can send email via a queued interface.
 @include('partials.github')</p>

{{ Form::open() }}

    <ul>
        <li>
            {{ Form::label('subject', 'Subject')}}
            {{ Form::text('subject')}}
        </li>
        <li>
            {{ Form::label('body', 'Body')}}
            {{ Form::textarea('body')}}
        </li>

        <li>
            {{ Form::submit() }}
        </li>
    </ul>

{{ Form::close() }}

@stop

