@section('js')

<script type="text/javascript" src="/js/jquery.js"></script>    
<script type="text/javascript" src="/js/jquery.ui.core.min.js"></script>    
<script type="text/javascript" src="/js/jquery.ui.widget.min.js"></script>    
<script type="text/javascript" src="/js/jquery.ui.button.min.js"></script>    
<script type="text/javascript" src="/js/jquery.ui.mouse.min.js"></script>    

<script type="text/javascript" src="/js/jquery.ui.slider.min.js"></script>    
<script type="text/javascript" src="/js/jquery.ui.datepicker.min.js"></script>    

<script type="text/javascript" src="/vendor/jquery-timepicker-addon/jquery-ui-timepicker-addon.js"></script>    
<script type="text/javascript" src="vendor/jquery-timepicker-addon/jquery-ui-sliderAccess.js"></script>    

<script type="text/javascript">

    $('#calendar').datetimepicker({
        dateFormat: "m/d/yy",
        timeFormat: "hh:mm tt",
        hourGrid: 6,
        minuteGrid: 15,
        stepMinute: 5,
        minDate: '12/20/2013',
        // addSliderAccess: true,
        // sliderAccessArgs: { touchonly: false },
    });

    $('#inline_calendar').datepicker({
        inline: true,
        minDate: '12/20/2013',
        maxDate: '1/30/2014',
    });


</script>

@stop
