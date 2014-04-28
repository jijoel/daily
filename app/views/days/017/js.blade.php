@section('js')

{{ HTML::js('jquery')}}
{{ HTML::js('jquery-autosize')}}

<script type="text/javascript">
    $('#autolong').autosize();      // For just one textarea component; 
                                    // usually: $('textarea').autosize();

</script>

@stop