@section('content')


<p class="note">This is a very simple blog. <a href="/day053">Logged in users</a> can add, edit, or remove content. 
@include('partials.github')</p>

<div class="pull-right">
@if(Auth::check())
    {{ Form::open(['url'=>'/day056/logout'])}}
    {{ Form::submit('Logout '. Auth::user()->username)}}
    {{ Form::close() }}
@else
    <div class="login">
        {{Form::open(['url'=>'/day056/login','class'=>'form'])}}
            {{Form::text('username', Null, ['class'=>'form-control input-sm','placeholder'=>'user'])}}
            {{Form::text('password', Null, ['class'=>'form-control input-sm','placeholder'=>'pass'])}}
            {{Form::submit('login')}}
        {{Form::close()}}
    </div>
@endif
</div>

@foreach($found as $item)
    <article>
        <header>
            <h1>{{ $item->link }}</h1>
            <div class="author">by {{ $item->author_name }}</div>
            <div class="date">on {{ $item->date->short }}</div>
            @foreach($item->tags as $tag)
                <span class="small label label-info">{{$tag->title}}</span>
            @endforeach
        </header>
        <div class="text">{{$item->teaser}}</div>
    </article>
@endforeach

@if(Auth::check())
<div class="controls">
    <a href="{{route('day056.create')}}" class="btn btn-info">Create a new item</a>
    <a href="{{route('day056.tags.index')}}" class="btn btn-info">Show articles by tag</a>
</div>
@endif

@stop


@section('css')
    <style type="text/css">
        .login {
            padding: 6px;
            border: 1px solid black;
        }
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
