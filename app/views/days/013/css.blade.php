@section('css')

    {{ HTML::css('home')}}
    {{ HTML::css('jquery-jcrop')}}

    <style type="text/css">
        input {
            width: 4em;
        }
        img { 
            border: 1px solid black;
        }
        #preview-pane {
            margin-top:20px;
            width: 150px;
            height: 150px;
            overflow: hidden;
        }
        #main {
            max-width: 100%;
        }
        #preview {
            display: inline;
        }
    </style>

@stop