@section('css')
    {{ HTML::css('home')}}

    <style type="text/css">
    .table-wrapper {
        max-width: 100%;
        overflow-x: auto;
    }
    table {
        border-collapse: collapse;
        white-space: nowrap;
    }
    thead th{
        text-align: left;
        background: rgba(140,140,255,.4);
        border-bottom: 1px solid black;
    }
    td, th {
        padding: 6px 10px;
    }
    tr:nth-child(even) {
        background: rgba(140,140,255,.2);
        /*background: green;*/
    }
    td:nth-child(1) {
        font-weight: bold;
    }


@media only screen { 
    .table-wrapper::-webkit-scrollbar {
        width:  8px;
        height: 6px;
    }
    .table-wrapper::-webkit-scrollbar-button:start:decrement,
    .table-wrapper::-webkit-scrollbar-button:end:increment {
        background-color: rgba(140,140,255,.8);
        display: block;
        height: 10;
    }
    .table-wrapper::-webkit-scrollbar-track-piece {
        background-color: rgba(140,140,255,.2);
        -webkit-border-radius: 6px;
    }
    .table-wrapper::-webkit-scrollbar-thumb:horizontal {
        width: 20px;
        background-color: rgba(140,140,255,.8);
        -webkit-border-radius: 3px;
    }

    </style>
@stop

@section('content')

<p class="note">This app will display return values from methods of Laravel's Str class, so you can see exactly what you'll be getting. @include('partials.github')</p>


{{ Form::open(array('url'=>URL::route('day014.store'), 'method'=>'POST')) }}
  @if(count($errors)>0)
      <div class="messages">
          <ul class="error">
              <p>There were errors:</p>
              @foreach($errors->all('<li>:message</li>') as $error)
                  {{$error}}
              @endforeach
          </ul> <!--  .errors -->
      </div> <!--  .messages -->
  @endif
  <p>
      {{ Form::label('custom', 'Custom Value:') }}
      {{ Form::input('custom', 'custom') }}
      {{ Form::submit('Submit') }}
  </p>
{{ Form::close() }}

<div class="table-wrapper">
{{ $table }}
</div>

@stop