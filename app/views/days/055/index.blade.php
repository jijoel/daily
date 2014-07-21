@section('content')

<p class="note">This is a very simple blog. <a href="/day053">Logged in users</a> can add, edit, or remove content. 
@include('partials.github')</p>

@foreach($found as $item)
    <article>
        <header>
            <h1>{{ $item->link }}</h1>
            <div class="author">by {{ $item->author_name }}</div>
            <div class="date">on {{ $item->date->short }}</div>
        </header>
        <div class="text">{{$item->teaser}}</div>
    </article>
@endforeach

@if(Auth::check())
<div class="controls">
    <a href="{{route('day055.create')}}" class="btn btn-info">Create a new item</a>
</div>
@endif

@stop


@section('css')
    <style type="text/css">
        article, .controls {
            margin-top: 20px;
        }
        article h1 {
            font-size: 14pt;
            font-weight: bold;
            display: inline;
            margin-right: 10px;
        }
        article .author, article .date {
            display: inline;
        }
    </style>
@stop
