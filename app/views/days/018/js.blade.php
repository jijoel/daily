@section('js')

{{ HTML::js('jquery')}}
{{ HTML::js('jquery-ui')}}
{{ HTML::js('underscore')}}

<script type="text/javascript">

    var cache = {};
    $( "#autocomplete" ).autocomplete({
        minLength: 1,
        source: function( request, response ) {
            var term = request.term;
            if ( term in cache ) {
                response( _.pluck(cache[term], 'state_name') );
                return;
            }
 
            $.getJSON( "/day018/states", request, function( data, status, xhr ) {
                cache[term] = data;
                response( _.pluck(cache[term], 'state_name') );
            });
        }
    });

</script>

@stop