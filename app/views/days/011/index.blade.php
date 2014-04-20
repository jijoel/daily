@section('content')

<p class="note">This is a very simple test using <a href="http://deepliquid.com/content/Jcrop.html">jcrop</a>. @include('partials.github')</p>

<img id="main" src="/img/day.jpg">

<form action="crop.php" method="post">
  x: <input type="text" name="x" id="x" value="" />
  y: <input type="text" name="y" id="y" value="" />
  w: <input type="text" name="w" id="w" value="" />
  h: <input type="text" name="h" id="h" value="" />
  dw: <input type="text" name="dw" id="dw" value="" />
  dh: <input type="text" name="dh" id="dh" value="" />
</form>

<div id="preview-pane">
    <img id="preview" src="/img/day.jpg">
</div>

@stop