@section('content')

<h2>List all tags</h2>
@foreach($found as $tag)
<ul>
    <li>
        <h2><span class="label label-info">
            {{Form::open(['url'=>'/day056/tags/'.$tag->id,'method'=>'delete'])}}
                {{Form::submit('x',['class'=>'btn btn-link btn-sm'])}}
            {{Form::close()}}
            {{ $tag->title }}
        </span></h2>
        <ul>
            @foreach($tag->articles as $article)
                <li>{{$article->link}}</li>
            @endforeach
        </ul>
    </li>
</ul>
@endforeach

@stop

@section('css')
    <style type="text/css">
        .btn {
            padding: 0px;
        }
        form {
            display: inline;
            padding-right: 10px;
        }
        ul {
            list-style-type: none;
            padding-left: 0px;
        }
    </style>
@stop