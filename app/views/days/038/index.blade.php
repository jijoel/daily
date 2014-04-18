@section('content')

<p class="note">This is a study on how to nest Bootstrap grids.</p>

<p>Horizontal form with help block and label and control widths specified:</p>
<div class="row">
<form class="form-horizontal">
    <fieldset>
        <div class="form-group">
            <label class="control-label col-md-2 col-sm-3" for="field">Field</label>
            <div class="col-md-10 col-sm-9">
                <input type="text" id="field" name="field" class="form-control">
            </div>
            <div class="col-md-10 col-sm-9 col-md-offset-2 col-sm-offset-3">
                <span class="help-block">This is a help block</span>
            </div>
        </div>
    </fieldset>
</form>
</div>

<div class="row">
<p>Horizontal form with sidebar column:</p>
<div class="col-md-2" style="border: 1px solid black">
<p>This is a sidebar column</p>
</div>
<div class="col-md-10">
    <form class="form-horizontal">
        <fieldset>
            <div class="form-group">
                <label class="control-label col-md-2 col-sm-3" for="field">Field</label>
                <div class="col-md-10 col-sm-9">
                    <input type="text" id="field" name="field" class="form-control">
                </div>
                <div class="col-md-10 col-sm-9 col-md-offset-2 col-sm-offset-3">
                    <span class="help-block">This is a help block</span>
                </div>
            </div>
        </fieldset>
    </form>
</div>
</div>

<div class="row">
<p>Horizontal form with nested sidebar column and multiple fields:</p>
<div class="col-md-2" style="border: 1px solid black">
<p>This is a sidebar column</p>
</div>
<div class="col-md-10">
    <div class="col-md-2">
        <p>This is a nested sidebar column</p>
    </div>
    <div class="col-md-10">
        <form class="form-horizontal">
            <fieldset>
                <div class="form-group">
                    <label class="control-label col-md-2 col-sm-3" for="field">Field</label>
                    <div class="col-md-10 col-sm-9">
                        <input type="text" id="field" name="field" class="form-control">
                    </div>
                    <div class="col-md-10 col-sm-9 col-md-offset-2 col-sm-offset-3">
                        <span class="help-block">This is a help block</span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2 col-sm-3" for="field">Field</label>
                    <div class="col-md-10 col-sm-9">
                        <input type="text" id="field" name="field" class="form-control">
                    </div>
                    <div class="col-md-10 col-sm-9 col-md-offset-2 col-sm-offset-3">
                        <span class="help-block">This is a help block</span>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
</div>
</div>

@stop

