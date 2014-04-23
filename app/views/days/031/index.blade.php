@section('content')

<p class="note">This one isn't very interesting on the front-end--just a nested option group. On the back-end, it splits a flat table into a nested array (given the names of a value field, key field, and group field).  @include('partials.github')</p>

{{Form::select('test', $data)}}

@stop

