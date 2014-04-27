@section('js')

<script type="text/javascript" src="/vendor/js/jquery.min.js"></script>
<script type="text/javascript" src="/vendor/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="/vendor/js/underscore.min.js"></script>

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