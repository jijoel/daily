@section('content')
    <p>Yay! You logged in!</p>

    <p>I received this from Google:</p>

    <dl>
    @foreach($result as $key=>$value) 
        <dt>{{$key}}</dt>
        <dd>{{$value}}</dd>
    @endforeach
    </dl>

    <a href="{{route('day005_logout')}}">Logout</a>
@stop
