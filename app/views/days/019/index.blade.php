@section('content')

<p class="note">This is a demonstration of date/time fields. It uses the <a href="http://trentrichardson.com/examples/timepicker/">jquery-ui-timepicker addon</a> for jQuery UI. I like it, but so far, I have some issues with it:</p> 

<ul>
<li>First, if the browser window is too small, the popup comes up underneath the "Calendar" field.</li>
<li>Second, I haven't been able to figure out how to change the hour slider from a 24-hour clock to a 12-hour clock.</li>
<li>Third, if I use a SliderAccess object (for people on touch devices, etc.), it collapses the slider completely.</li>
</ul>

<p>
    {{ Form::label('calendar', 'Calendar') }}
    <div class="input-append">
       {{ Form::text('calendar', '12/21/2013 4:00 pm', array('placeholder'=>'Please enter start time')) }}
        <span class="add-on"><i class="icon-calendar"></i></span> 
    </div>
</p>

<p>
    {{ Form::label('inline_calendar', 'Inline Calendar') }}
    <div id="inline_calendar"></div>
</p>

@stop

