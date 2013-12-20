@section('js')

<script type="text/javascript" src="/js/jquery.js"></script>
<script type="text/javascript" src="/js/jquery.ui.core.min.js"></script>
<script type="text/javascript" src="/js/jquery.ui.widget.min.js"></script>
<script type="text/javascript" src="/js/jquery.ui.position.min.js"></script>
<script type="text/javascript" src="/js/jquery.ui.menu.min.js"></script>
<script type="text/javascript" src="/js/jquery.ui.autocomplete.min.js"></script>
<script type="text/javascript" src="/js/underscore-min.js"></script>

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