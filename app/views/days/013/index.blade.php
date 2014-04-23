@section('content')

<p class="note">This will crop an image with <a href="http://deepliquid.com/content/Jcrop.html">jcrop</a>, then use a Session to return the image on the standard page template. At this point, it does not scale. I'm not sure how to prevent separate user images from colliding (eg, user1 can create an image then user2 can create a different image; if user1 wants to save the image, it will pull up user2's image).  @include('partials.github')</p>

<img id="main" src="/img/day.jpg">

{{ Form::open(array('url'=>URL::route('day013.store'))) }}
    x: <input type="text" name="x" id="x" value="" />
    y: <input type="text" name="y" id="y" value="" />
    w: <input type="text" name="w" id="w" value="" />
    h: <input type="text" name="h" id="h" value="" />
    dw: <input type="text" name="dw" id="dw" value="" />
    dh: <input type="text" name="dh" id="dh" value="" />
    img: <input type="text" name="img" id="img" value="/img/day.jpg" />
    {{ Form::submit('Submit') }}
</form>

<div id="preview-pane">
    <img id="preview" src="/img/day.jpg">
</div>

@stop
