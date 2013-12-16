@section('content')

<style type="text/css">
    td {
        padding: 0px 10px;
    }
    td input {
        width: 4em;
    }
</style>

<p class="note">This is a take on the classic <a href="http://codingdojo.org/cgi-bin/wiki.pl?KataBowling">Bowling Game kata</a>, with some minor variations. It should handle partials and intermediate frames.</p>

@if($error)
    <p class="error">{{ $error }}</p>
@else
    <p>Score: {{ $score }}</p>
@endif

{{ Form::open(array('url'=>URL::route('day016.store'), 'method'=>'POST')) }}
<table>
    <tr>
        <th>Frame</th><th>Ball 1</th><th>Ball 2</th>
    </tr>
@for($i=0; $i<10; $i++)
    <tr>
        <td>{{ $i+1 }}</td>
        <td>{{ Form::input('number', 'ball[]', $balls[($i*2)], array('min'=>0, 'max'=>'10')) }}</td>
        <td>{{ Form::input('number', 'ball[]', $balls[($i*2)+1], array('min'=>0, 'max'=>'10')) }}</td>
    </tr>
@endfor
<tr>
    <td>{{ 'Bonus' }}</td>
    <td>{{ Form::input('number', 'ball[]', $balls[20]) }}</td>
    <td>{{ Form::input('number', 'ball[]', $balls[21]) }}</td>
</tr>
</table>
{{ Form::submit('Calculate') }}
{{ Form::close() }}

@stop
