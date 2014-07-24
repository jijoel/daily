@section('content')

<p class="note">This is an attempt to crop an image in a bootstrap column. Similar to <a href="/days/day013">day 13</a>, it crop an image with <a href="http://deepliquid.com/content/Jcrop.html">jcrop</a>, and return the thumbnail to the viewer.
@include('partials.github')</p>

<div class="col-md-9">
    <h2>Original Image</h2>
    <img id="main" src="{{$image}}">
</div>

<div class="col-md-3">
    <h2>New Thumbnail</h2>
    <div id="preview-pane">
        <img id="preview" src="{{$image}}">
    </div>

    {{ Form::open(array('url'=>URL::route('day057.store'))) }}
        <input type="hidden" name="coords" id="coords" value="" />
        {{ Form::submit('Submit', ['class'=>'btn btn-primary']) }}
    </form>

    @if($thumb)
        <h2>Current Thumbnail</h2>
        <img id="current" src="{{$thumb}}">
    @endif

</div>

@stop

@section('css')

    {{ HTML::css('home')}}
    {{ HTML::css('jquery-jcrop')}}

    <style type="text/css">
        img { 
            border: 1px solid black;
        }
        #preview-pane {
            margin-top:20px;
            width: {{$size}}px;
            height: {{$size}}px;
            overflow: hidden;
        }
        #main {
            max-width: 100%;
        }
        #preview {
            display: inline;
        }
    </style>


@stop



@section('js')

{{ HTML::js('jquery-jcrop')}}

<script type="text/javascript">
$(document).ready(function()
{
    $('#main').Jcrop({
        onChange: showPreview,
        onSelect: showPreview,
        onRelease: hidePreview,
        aspectRatio: 1,
        setSelect: {{$select}},
    });

    function showPreview(coords)
    {
        var oWidth = $('#main').width();
        var oHeight = $('#main').height();
        var rx = {{$size}} / coords.w;
        var ry = {{$size}} / coords.h;
        $('#preview').css({
            width: Math.round(rx * oWidth) + 'px',
            height: Math.round(ry * oHeight) + 'px',
            marginLeft: '-' + Math.round(rx * coords.x) + 'px',
            marginTop: '-' + Math.round(ry * coords.y) + 'px',
        }).show();

        coords.dw = oWidth;
        coords.dh = oHeight;
        $('#coords').val(JSON.stringify(coords));
    }

    function hidePreview()
    {
        $('#preview').stop().fadeOut('fast');
    }

});

</script>

@stop