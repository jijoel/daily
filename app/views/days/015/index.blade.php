@section('content')

<p class="note">This is the result of a simple "print diamond" kata, as seen at <a href="http://cyber-dojo.com">cyber-dojo.com</a>. Given a letter, it will show a diamond starting with 'A', with the supplied letter at the widest point.</p>

{{ Form::open(array('url'=>URL::route('day015.store'), 'method'=>'POST')) }}
  <p>
      {{ Form::label('letter', 'Letter:') }}
      {{ Form::selectRange('letter', 'A', 'Z') }}
      {{ Form::submit('Submit') }}
  </p>
{{ Form::close() }}

{{ $diamond }}

@stop
