@section('content')

<p class="note">This is a study on how to upload and process a file to a server.
@include('partials.github')</p>

<div class="row">
@foreach($files as $file)
    <div class="col-sm-3 uploaded-image">
        <div class="thumbnail">
            <img src="day044_files/{{$file->thumbnail}}" alt="{{$file->thumbnail}}">
            <div class="caption">
                <p class="delete-button" style="float:right">
                    <a href="#" data-id="{{$file->id}}">[x]</a>
                </p>
                <p>{{$file->title}}</p>
            </div>
        </div>
    </div>
@endforeach
</div>

{{ $files->links() }}

<div class="bordered">
    <legend>Add a new file</legend>
    {{ KForm::open()->horizontal()->files() }}
        {{ KForm::text('title') }}

        @if($errors->has('thumbnail'))
        <div class="form-group has-error">
        @else
        <div class="form-group">
        @endif
            {{ Form::label('thumbnail', 'Thumbnail', ['class'=>'control-label col-sm-2'])}}
            <div class="col-sm-10">
                {{ Form::file('thumbnail')}}
                @if($errors->has('thumbnail'))
                    <div class="help-block">{{ $errors->first('thumbnail') }}</div>
                @endif
            </div>
        </div>

        {{ KForm::submit()->primary() }}
    {{ KForm::close() }}
</div>

@stop


@section('js')
<script type="text/javascript">
$(document).ready(function()
{
    $('.delete-button a').click(function($evt){
        $evt.preventDefault();
        var $this = $(this);
        $.ajax({
            'type': 'DELETE',
            'url':    '/day044/' + $this.data('id'),
        }).success(function(){
            $this.closest('.uploaded-image').remove();
        });
    });
});

</script>
@stop
