@section('js')

{{ HTML::js('jquery')}}

<script type="text/javascript">
$(document).ready(function()
{
    $('li a').click(function($evt){
        $evt.preventDefault();
        var $this = $(this);
        $.ajax({
            'type': 'DELETE',
            'url':    '/day007/' + $this.data('id'),
        }).success(function(){
            $this.parent().remove();
        });
    });
});

</script>

@stop