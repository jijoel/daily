@section('content')

    <article>
        <header>
            <h2>{{ $item->title }}</h2>
            <div class="author">by {{ $item->author_name }}</div>
            <div class="date">on {{ $item->date->short }}</div>
            @foreach($item->tags as $tag)
                <span class="small label label-info">{{$tag->title}}</span>
            @endforeach
        </header>
        <hr>
        <div class="text">{{Markdown::string($item->text)}}</div>
    </article>

@stop

@section('css')
    <style type="text/css">
        article h2, article .author, article .date {
            display: inline;
        }
    </style>
@stop
