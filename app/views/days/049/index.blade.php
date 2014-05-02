@section('content')

<p class="note">This is an image uploader, using <a href="https://jasny.github.io/bootstrap/javascript/">jasny bootstrap</a> and <a href="http://malsup.com/jquery/form/">jQuery form</a>.
@include('partials.github')</p>

<div class="row">
@foreach($files as $file)
    @include('days.049.item')->withFile($file)
@endforeach

    <div class="col-sm-3 new-item">
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
                    <div class="progress" style="display:none">
                        <div class="bar" style="width: 100%;"></div>
                        <div class="percent">100%</div>
                    </div>
                </div>
                <div id="upload-errors"></div>
        
        {{ KForm::close() }}
    </div>
</div>

{{ $files->links() }}

@stop

@section('js')
    {{ HTML::js('jasny-bootstrap')}}
    {{ HTML::js('jquery-form')}}

    <script type="text/javascript">
        $(document).ready(function()
        {
            var bar = $('.bar');
            var percent = $('.percent');
            var progress = $('.progress');

            $('.fileinput').fileinput();
            $('form').ajaxForm({
                beforeSend: function(){
                    var percentVal = '0%';
                    bar.width(percentVal)
                    percent.html(percentVal);
                    $('#upload-errors').html('');
                    progress.show();
                },
                uploadProgress: function(event, position, total, percentComplete) {
                    var percentVal = percentComplete + '%';
                    bar.width(percentVal)
                    percent.html(percentVal);
                },
                success: function() {
                    var percentVal = '100%';
                    bar.width(percentVal)
                    percent.html(percentVal);
                },
                complete: function(xhr) {
                    progress.hide();
                    parsed = JSON.parse(xhr.responseText)
                    if (parsed.success)
                        showNewObject(parsed);
                    else
                        showErrorMessage(parsed);
                }
            });

            var showNewObject = function(obj) {
                $('form').closest('.new-item').before(obj.message);
                resetForm();
            };

            var showErrorMessage = function(obj) {
                $('#upload-errors').html(obj.message);
            }

            var resetForm = function()
            {
                $('form').clearForm();
                $('.fileinput').fileinput('reset');
            }
        });

        function deleteFile(id) {
            $.ajax({
                'type': 'DELETE',
                'url':    '/day049/' + id,
            }).success(function(){
                $('a[data-id='+id+']').closest('.uploaded-image').remove()
            });                
        }

    </script>
@stop

@section('css')
    {{ HTML::css('jasny-bootstrap')}}
@stop

