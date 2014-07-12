@section('content')

<p class="note">This is a view of pre-defined <a href="http://github.com/briannesbitt/Carbon">Carbon</a> formats.
@include('partials.github')</p>

    <div class="parameters">
        {{ Form::open(array('route'=>'day052.store', 'class'=>'form-horizontal')) }}

        <div class="form-group">
            {{ Form::label('date', 'Custom:', array('class'=>'control-label col-md-1')) }}
            <div class="col-md-4">
                <div class="input-group">
                    {{ Form::text('date', $date, array('class'=>'form-control')) }}
                    <span class="input-group-btn">
                        <button class="btn btn-primary" type="submit">Show</button>
                    </span>
                </div>
            </div>
        </div>

        {{ Form::close()}}
    </div>

    <table>
        <thead>
            <tr>
                <th>Method</th>
                <th>Result</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $item)
                <tr>
                    <td>{{$item->method}}</td><td>{{$item->result}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

@stop

@section('css')
    <style type="text/css">
        .parameters {
            margin-top: 20px;
            margin-bottom: 20px;
        }
        td {
            padding-right: 20px;
            padding-top: 4px;
        }
    </style>
@stop

