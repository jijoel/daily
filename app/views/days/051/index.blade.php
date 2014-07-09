@section('content')

<p class="note">This is a little bit of performance testing, to find out how fast (or slow) various alternatives are to complete a given task. It also does some interesting things like displaying code directly from the calling function (using a technique found <a href="https://stackoverflow.com/questions/7026690/reconstruct-get-code-of-php-function">here</a>), and displaying code with <a href="http://highlightjs.org/">highlightjs</a>. 
@include('partials.github')</p>

@foreach($data as $item)
    <h2>{{ $item->title }}</h2>
    <div class="results">
        {{ $item->result }}
    </div>
    <div class="code">
        <pre><code class="php">
        {{ $item->code }}
        </code></pre>
    </div>
@endforeach

@stop


@section('css')
    {{ HTML::css('highlightjs') }}
    <style type="text/css">
        td {
            padding: 5px;
            padding-right: 20px;
        }
        .results {
            font-size: 12pt;
        }
    </style>
@stop

@section('js')
    {{HTML::js('highlightjs')}}
    
    <script>
        hljs.initHighlightingOnLoad();
    </script>
@stop
