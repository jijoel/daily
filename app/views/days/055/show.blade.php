@section('content')

    <article>
        <header>
            <h2>{{ $item->title }}</h2>
            <div class="author">by {{ $item->author_name }}</div>
            <div class="date">on {{ $item->date->short }}</div>
        </header>
        <hr>
        <div class="text">{{$item->text}}</div>
    </article>

@stop

@section('css')
    <style type="text/css">
        article h2, article .author, article .date {
            display: inline;
        }
    </style>
@stop
