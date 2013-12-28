@section('content')

<p class="note">This is a color chart. It will show all of the 3-character colors for the characters you specify (eg, for input of 'AC', it will generate AAA, AAC, ACA, ACC, CAA, CAC, CCA, CCC. Please select the colors you'd like to cycle through.</p>

{{ Form::open(array('url'=>URL::route('day021.store'))) }}
<p>
    {{ Form::label('colors', 'Colors') }}
    {{ Form::text('colors') }}
</p>
{{ Form::submit() }}
{{ Form::close() }}

<style type="text/css">
    td { padding: 5px;}
</style>

<table>
    @foreach($chart as $row)
    <tr>
        @foreach($row as $col)
        <td style="background-color: {{$col}}">{{$col}}</td>
        @endforeach
    </tr>
    @endforeach
</table>

@stop

