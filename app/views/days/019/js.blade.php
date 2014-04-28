@section('js')

{{ HTML::js('jquery')}}
{{ HTML::js('jquery-ui')}}
{{ HTML::js('timepicker')}}

<script type="text/javascript">

    $('#calendar').datetimepicker({
        dateFormat: "m/d/yy",
        timeFormat: "hh:mm tt",
        hourGrid: 6,
        minuteGrid: 15,
        stepMinute: 5,
        minDate: '12/20/2013',
        addSliderAccess: true,
        sliderAccessArgs: { touchonly: false },
    });

    $('#inline_calendar').datepicker({
        inline: true,
        minDate: '12/20/2013',
        maxDate: '1/30/2014',
    });


</script>

@stop
