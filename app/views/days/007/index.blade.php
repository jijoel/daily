{{ $errors = Session::get('errors')}}

@section('content')

<p class="note">A very simple to-do list. Enter a new item below, or click any item to mark it as done (and remove it).
 @include('partials.github')</p>

<ul>
@foreach($items as $item)
    <li><a href="" data-id={{$item->id}}>{{$item->item}}</a></li> 
@endforeach
</ul>

@if(count($errors)>0)
<div class="messages">
    <p>There were errors saving the item:</p>
    <ul class="error">
    @foreach($errors->all('<li>:message</li>') as $error)
        {{$error}}
    @endforeach
    </ul> <!--  .errors -->
</div> <!--  .messages -->
@endif

{{ Form::open(array('url'=>URL::route('day007.store'), 'method'=>'POST')) }}
  <p>
      {{ Form::label('item', 'New Item:') }}
      {{ Form::input('item', 'item') }}
  </p>
  <p>
      {{ Form::submit('Create') }}
  </p>
{{ Form::close() }}

@stop
