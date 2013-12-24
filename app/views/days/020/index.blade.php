@section('content')

<p class="note">This is an attempt to log in with different users (but using the same routes). {{ $authInfo }}</p>

@if(Session::has('errors'))
<div class="messages">
    <p>There were errors:</p>
    <ul class="error">
    @foreach(Session::get('errors') as $error)
        <li>{{$error}}</li>
    @endforeach
    </ul> <!--  .errors -->
</div> <!--  .messages -->
@endif

@if(isset($message))
<div class="messages">
    {{$message}}
</div>
@endif

@yield('subcontent')

@stop

