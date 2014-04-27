@section('js')

<script type="text/javascript" src="/vendor/js/jquery.min.js"></script>
<script type="text/javascript" src="/vendor/js/jquery.Jcrop.min.js"></script>

<script type="text/javascript">
$(document).ready(function()
{
    $('#main').Jcrop({
        onChange: showPreview,
        onSelect: showPreview,
        onRelease: hidePreview,
        aspectRatio: 1,
    });

    function showPreview(coords)
    {
        var oWidth = $('#main').width();
        var oHeight = $('#main').height();

        $('#x').val(coords.x);
        $('#y').val(coords.y);
        $('#w').val(coords.w);
        $('#h').val(coords.h);
        $('#dw').val(oWidth);
        $('#dh').val(oHeight);

        var rx = 150 / coords.w;
        var ry = 150 / coords.h;
        $('#preview').css({
            width: Math.round(rx * oWidth) + 'px',
            height: Math.round(ry * oHeight) + 'px',
            marginLeft: '-' + Math.round(rx * coords.x) + 'px',
            marginTop: '-' + Math.round(ry * coords.y) + 'px',
        }).show();
    }

    function hidePreview()
    {
        $('#preview').stop().fadeOut('fast');
    }

});

</script>

@stop