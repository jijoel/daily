<div class="well">
    <form id="jquery">
        <legend>JQuery Form</legend>
        <div class="message"></div>

        <!-- NAME -->
        <div class="form-group name-control">
            <label class="control-label">Name</label>
            <input type="text" name="name" class="form-control" placeholder="Bruce Wayne">
            <span class="help-block"></span>
        </div>

        <!-- SUPERHERO NAME -->
        <div class="form-group alias-control">
            <label class="control-label">Superhero Alias</label>
            <input type="text" name="alias" class="form-control" placeholder="Caped Crusader">
            <span class="help-block"></span>
        </div>

        <!-- NEMESIS -->
        <div class="form-group nemesis-control">
            <label class="control-label">Nemesis</label>
            <input type="text" name="nemesis" class="form-control" placeholder="Villain" value="{{$nemesis}}">
            <span class="help-block"></span>
        </div>

        <!-- DETAILS -->
        <div class="form-group details-control">
            <label class="control-label">Details</label>
            <textarea name="details" class="form-control"></textarea>
            <span class="help-block"></span>
        </div>

        <!-- SUBMIT BUTTON -->
        <button type="submit" class="btn btn-success btn-sm btn-block">
            <span class="glyphicon glyphicon-flash"></span> Submit!
        </button>
    </form>
</div>


@section('jquery_js')

<script type="text/javascript">
$(function(){

    $('form#jquery').submit(function(event) {
        event.preventDefault();

        // $('#jquery .message').empty();
        $('#jquery .message').empty().removeClass('alert')
            .removeClass('alert-success').removeClass('alert-danger');
        $('#jquery .form-group').removeClass('has-error');
        $('#jquery .help-block').empty();

        var data = $('form#jquery').serialize();

        $.post(
            '/day045',
            $('form#jquery').serialize(),
            function(data) {
                $.each(data, function(index,value){
                    $('form#jquery .'+index+'-control').addClass('has-error');
                    $('form#jquery .'+index+'-control .help-block').html(value);
                });

                if (data.length === 0)
                    $('#jquery .message').addClass('alert alert-success')
                        .append('<h4>Success</h4><p>Your data has been added successfully</p>');
                else
                    $('#jquery .message').addClass('alert alert-danger')
                        .append('<h4>Errors</h4><p>Please see below for errors</p>');
            }
        );
    });
});
</script>
@stop
