@section('content')

<p class="note">This is an image uploader, using <a href="https://jasny.github.io/bootstrap/javascript/">jasny bootstrap</a> 
@include('partials.github')</p>

<div class="row">
@foreach($files as $file)
    <div class="col-sm-3 uploaded-image">
        <div class="thumbnail">
            <img src="days/day044/{{$file->thumbnail}}" alt="{{$file->thumbnail}}">
            <div class="caption">
                <p class="delete-button" style="float:right">
                    <a href="#" data-id="{{$file->id}}">[x]</a>
                </p>
                <p>{{$file->title}}</p>
            </div>
        </div>
    </div>
@endforeach

    <div class="col-sm-3">
        {{ KForm::open()->files() }}
            <div class="form-group">
                <div class="fileinput fileinput-new" data-provides="fileinput">
                    <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 100%; height: 150px;">Click to add a new file</div>
                    <div style="display:none">
                        <input type="file" name="thumbnail" id="thumbnail">
                    </div>
                    <div class="input-group">
                        {{ Form::text('title',Null,['placeholder'=>'Title','class'=>'form-control'])}}
                        <div class="input-group-btn"><button type="submit" class="btn btn-primary">Submit</button></div>
                    </div>
                </div>

                @if($errors->count())
                    <div class="form-group has-error">
                        <span class="help-block">
                            @foreach($errors->all() as $error)
                                <div>{{$error}}</div>
                            @endforeach
                        </span>
                    </div>
                @endif
        
        {{ KForm::close() }}
    </div>
</div>

{{ $files->links() }}

@stop

@section('js')
    {{ HTML::js('jasny-bootstrap')}}

    <script type="text/javascript">
        $(document).ready(function()
        {
            $('.fileinput').fileinput();
            $('.delete-button a').click(function($evt){
                $evt.preventDefault();
                var $this = $(this);
                $.ajax({
                    'type': 'DELETE',
                    'url':    '/day048/' + $this.data('id'),
                }).success(function(){
                    $this.closest('.uploaded-image').remove();
                });
            });
        });

    </script>
@stop

@section('css')
    {{ HTML::css('jasny-bootstrap')}}
@stop

