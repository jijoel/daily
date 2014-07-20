@section('content')

<p class="note">This is a test of using a DateRange class. The DateRange will take two dates, and format them in a variety of ways.
@include('partials.github')</p>

    {{ Form::open(['class'=>'form-inline']) }}

    <div class="form-group">
        {{ Form::label('start', 'From:', array('class'=>'form-label'))}}
        {{ Form::text('start', $dates->start_short, array('class'=>'form-control')) }}
    </div>
    <div class="form-group">
        {{ Form::label('end', 'To:', array('class'=>'form-label'))}}
        {{ Form::text('end', $dates->end_short, array('class'=>'form-control')) }}
    </div>

    {{ Form::submit('Go')}}
    {{ Form::close() }}

    <table>
        <thead>
            <tr><th>Command</th><th>Result</th></tr>
        </thead>
        <tbody>
            <tr class="group"><td colspan=2>Range</td></tr>
            <tr><td>$dates->short</td><td>{{$dates->short}}</td></tr>
            <tr><td>$dates->tiny</td><td>{{$dates->tiny}}</td></tr>
            <tr><td>$dates->pad</td><td>{{$dates->pad}}</td></tr>
            <tr><td>$dates->padded</td><td>{{$dates->padded}}</td></tr>
            <tr><td>$dates->sql</td><td>{{$dates->sql}}</td></tr>
            <tr><td>$dates->full</td><td>{{$dates->full}}</td></tr>
            <tr><td>$dates->title</td><td>{{$dates->title}}</td></tr>
            <tr><td>$dates->short_title</td><td>{{$dates->short_title}}</td></tr>
            <tr><td>$dates->long</td><td>{{$dates->long}}</td></tr>
            <tr><td>$dates->month</td><td>{{$dates->month}}</td></tr>
            <tr><td>$dates->time</td><td>{{$dates->time}}</td></tr>
            <tr><td>$dates->url</td><td>{{$dates->url}}</td></tr>
            <tr><td>$dates->days</td><td>{{$dates->days}}</td></tr>

            <tr class="group"><td colspan=2>Start Date</td></tr>
            <tr><td>$dates->start</td><td>{{$dates->start}}</td></tr>
            <tr><td>$dates->start_short</td><td>{{$dates->start_short}}</td></tr>
            <tr><td>$dates->start_tiny</td><td>{{$dates->start_tiny}}</td></tr>
            <tr><td>$dates->start_pad</td><td>{{$dates->start_pad}}</td></tr>
            <tr><td>$dates->start_padded</td><td>{{$dates->start_padded}}</td></tr>
            <tr><td>$dates->start_sql</td><td>{{$dates->start_sql}}</td></tr>
            <tr><td>$dates->start_full</td><td>{{$dates->start_full}}</td></tr>
            <tr><td>$dates->start_title</td><td>{{$dates->start_title}}</td></tr>
            <tr><td>$dates->start_long</td><td>{{$dates->start_long}}</td></tr>
            <tr><td>$dates->start_month</td><td>{{$dates->start_month}}</td></tr>
            <tr><td>$dates->start_time</td><td>{{$dates->start_time}}</td></tr>
            <tr><td>$dates->start_url</td><td>{{$dates->start_url}}</td></tr>

            <tr class='group'><td colspan=2>End Date</td></tr>
            <tr><td>$dates->end</td><td>{{$dates->end}}</td></tr>
            <tr><td>$dates->end_short</td><td>{{$dates->end_short}}</td></tr>
            <tr><td>$dates->end_tiny</td><td>{{$dates->end_tiny}}</td></tr>
            <tr><td>$dates->end_pad</td><td>{{$dates->end_pad}}</td></tr>
            <tr><td>$dates->end_padded</td><td>{{$dates->end_padded}}</td></tr>
            <tr><td>$dates->end_sql</td><td>{{$dates->end_sql}}</td></tr>
            <tr><td>$dates->end_full</td><td>{{$dates->end_full}}</td></tr>
            <tr><td>$dates->end_title</td><td>{{$dates->end_title}}</td></tr>
            <tr><td>$dates->end_long</td><td>{{$dates->end_long}}</td></tr>
            <tr><td>$dates->end_month</td><td>{{$dates->end_month}}</td></tr>
            <tr><td>$dates->end_time</td><td>{{$dates->end_time}}</td></tr>
            <tr><td>$dates->end_url</td><td>{{$dates->end_url}}</td></tr>

        </tbody>
    </table>

@stop

@section('css')
    {{ HTML::css('jquery-ui')}}

    <style type="text/css">
    table {
        margin-top: 40px;
    }
    tr.group {
        margin-top: 20px;
    }
    tr.group td {
        border-bottom: 1px solid black;
        background-color: rgba(120,200,240,1);
    }
    td,th {
        font-size: 11pt;
        padding-top: 10px;
        padding-right: 20px;
    }
    </style>
@stop

@section('js')
    {{ HTML::js('jquery-ui') }}

    <script type="text/javascript">
        
    $(function(){
        setupDatePickers();
    });

    function setupDatePickers() {
        $( "#date" ).datepicker({
            dateFormat: "m/d/yy",
            numberOfMonths: 3,
        });
        $( "#start" ).datepicker({
            dateFormat: "m/d/yy",
            numberOfMonths: 3,
            onClose: function( selectedDate ) {
                $( "#end" ).datepicker( "option", "minDate", selectedDate );
            }
        });
        $( "#end" ).datepicker({
            dateFormat: "m/d/yy",
            numberOfMonths: 3,
            onClose: function( selectedDate ) {
                $( "#start" ).datepicker( "option", "maxDate", selectedDate );
            }
        });
    }

</script>
@stop