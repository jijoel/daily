@section('content')

<p class="note">This is a study on Bootstrap forms, to show the effects of small, particular changes. </p>

<p>Form with help block, no label or control widths specified:</p>
<form class="form">
    <fieldset>
        <div class="form-group">
            <label class="control-label" for="field">Field</label>
            <div>
                <input type="text" id="field" name="field" class="form-control">
            </div>
            <div>
                <span class="help-block">This is a help block</span>
            </div>
        </div>
    </fieldset>
</form>

<p>Horizontal form with help block, no label or control widths specified:</p>
<form class="form-horizontal">
    <fieldset>
        <div class="form-group">
            <label class="control-label" for="field">Field</label>
            <div>
                <input type="text" id="field" name="field" class="form-control">
            </div>
            <div>
                <span class="help-block">This is a help block</span>
            </div>
        </div>
    </fieldset>
</form>

<p>Horizontal form with help block and label and control widths specified:</p>
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

<p>Horizontal form with help block in same div as input:</p>
<form class="form-horizontal">
    <fieldset>
        <div class="form-group">
            <label class="control-label col-md-2 col-sm-3" for="field">Field</label>
            <div class="col-md-10 col-sm-9">
                <input type="text" id="field" name="field" class="form-control">
                <span class="help-block">This is a help block</span>
            </div>
        </div>
    </fieldset>
</form>

<p>Horizontal form with narrow field and help block in same div as input:</p>
<form class="form-horizontal">
    <fieldset>
        <div class="form-group">
            <label class="control-label col-md-2 col-sm-3" for="field">Field</label>
            <div class="col-md-4 col-sm-4">
                <input type="text" id="field" name="field" class="form-control">
                <span class="help-block">This is a help block with text that extends the entire length of the control</span>
            </div>
        </div>
    </fieldset>
</form>

<p>Horizontal form with input group; help block in same div as input:</p>
<form class="form-horizontal">
    <fieldset>
        <div class="form-group">
            <label class="control-label col-md-2 col-sm-3" for="field">Field</label>
            <div class="col-md-10 col-sm-9">
                <div type="input-group">
                    <input type="text" id="field" name="field" class="form-control">
                </div>
                <span class="help-block">This is a help block</span>
            </div>
        </div>
    </fieldset>
</form>

<p>Horizontal form with input group and addons; help block in same div as input:</p>
<form class="form-horizontal">
    <fieldset>
        <div class="form-group">
            <label class="control-label col-md-2 col-sm-3" for="field">Field</label>
            <div class="col-md-10 col-sm-9">
                <div class="input-group">
                    <span class="input-group-addon">Testing</span>
                    <input type="text" id="field" name="field" class="form-control">
                </div>
                <span class="help-block">This is a help block</span>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-md-2 col-sm-3" for="field">Field</label>
            <div class="col-md-10 col-sm-9">
                <div class="input-group">
                    <span class="input-group-addon">Test</span>
                    <input type="text" id="field" name="field" class="form-control">
                    <span class="input-group-addon">End text</span>
                </div>
                <span class="help-block">This is a help block</span>
            </div>
        </div>
    </fieldset>
</form>

<p>Horizontal form with input group and multiple addons:</p>
<form class="form-horizontal">
    <fieldset>
        <div class="form-group">
            <label class="control-label col-md-2 col-sm-3" for="field">Field</label>
            <div class="col-md-10 col-sm-9">
                <div class="input-group">
                    <span class="input-group-addon">First</span>
                    <span class="input-group-addon">Second</span>
                    <span class="input-group-addon">Third</span>
                    <input type="text" id="field" name="field" class="form-control">
                </div>
                <span class="help-block">This is a help block</span>
            </div>
        </div>
    </fieldset>
</form>

<p>Horizontal form with input group and icon addons:</p>
<form class="form-horizontal">
    <fieldset>
        <div class="form-group">
            <label class="control-label col-md-2 col-sm-3" for="field">Field</label>
            <div class="col-md-10 col-sm-9">
                <div class="input-group">
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-search"></span>
                    </span>
                    <span class="input-group-addon">
                        <i class="fa fa-rocket"></i>
                    </span>
                    <input type="text" id="field" name="field" class="form-control">
                </div>
                <span class="help-block">This is a help block</span>
            </div>
        </div>
    </fieldset>
</form>

<p>Horizontal form with input group and button addons:</p>
<form class="form-horizontal">
    <fieldset>
        <div class="form-group">
            <label class="control-label col-md-2 col-sm-3" for="field">Field</label>
            <div class="col-md-10 col-sm-9">
                <div class="input-group">
                    <input type="text" id="field" name="field" class="form-control">
                    <div class="input-group-btn"><button>First</button></div>
                    <span class="input-group-btn"><button class="btn">Second</button></span>
                    <span class="input-group-btn"><button class="btn btn-default">Default</button></span>
                    <span class="input-group-btn"><button class="btn btn-primary">Primary</button></span>
                    <span class="input-group-btn"><button class="btn btn-info">Info <i class="fa fa-refresh fa-spin fa-fw"></i></button></span>
                </div>
                <span class="help-block">This is a help block</span>
            </div>
        </div>
    </fieldset>
</form>

<p>Horizontal form with input group and select addon:</p>
<form class="form-horizontal">
    <fieldset>
        <div class="form-group">
            <label class="control-label col-md-2 col-sm-3" for="field">Field</label>
            <div class="col-md-10 col-sm-9">
                <div class="input-group">
                    <span class="input-group-btn">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">Select Action <span class="caret"></span></button>
                        <ul class="dropdown-menu">
                            <li><a href="#">Action</a></li>
                            <li class="disabled"><a href="#disabled">Disabled action</a></li>
                            <li class="divider"></li>
                            <li><a href="#">Separated link</a></li>
                        </ul>
                    </span><!-- /btn-group -->
                    <input type="text" id="field" name="field" class="form-control">
                    <span class="input-group-addon">another addon</span>
                </div>
                <span class="help-block">This is a help block</span>
            </div>
        </div>
    </fieldset>
</form>

<p>Horizontal form with inline fields; help block in same div as input:</p>
<form class="form-horizontal">
    <fieldset>
        <div class="form-group">
            <label class="control-label col-md-2 col-sm-3" for="field">Field</label>
            <div class="col-md-10 col-sm-9">
                <div class="form-group">
                    <label for="field1" class="control-label col-md-1">Subfield1</label>
                    <div class="col-md-2">
                        <input type="text" class="form-control" id="field1" name="field1" placeholder="field1">
                    </div>

                    <label for="field2" class="control-label col-md-1">Subfield2</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <span class="input-group-addon">Addon</span>
                            <input type="text" class="form-control" id="field2" name="field2" placeholder="field2">
                        </div>
                    </div>
                    <span class="help-block">This is an inline help block</span>
                </div>
                <span class="help-block">This is a help block on next line</span>
            </div>
        </div>
    </fieldset>
</form>


<p>Horizontal form with radio buttons and a label:</p>
<form class="form-horizontal">
    <fieldset>
        <div class="form-group">
            <label class="control-label col-md-2 col-sm-3" for="field">Field</label>
            <div class="col-md-10 col-sm-9">
                <div class="radio">
                    <label for="rfield3">
                        <input type="radio" name="rfield2" id="rfield3" value=1>
                        Field1
                    </label>
                </div>
                <div class="radio">
                    <label for="rfield4">
                        <input type="radio" name="rfield2" id="rfield4" value=2>
                        Field2
                    </label>
                </div>
                <span class="help-block">This is a help block</span>
            </div>
        </div>
    </fieldset>
</form>

<p>Horizontal form with check boxes and a label:</p>
<form class="form-horizontal">
    <fieldset>
        <div class="form-group">
            <label class="control-label col-md-2 col-sm-3" for="field">Field</label>
            <div class="col-md-10 col-sm-9">
                <div class="checkbox">
                    <label for="rfield5">
                        <input type="checkbox" name="rfield5" id="rfield5" value=1>
                        Field1
                    </label>
                </div>
                <div class="checkbox">
                    <label for="rfield6">
                        <input type="checkbox" name="rfield6" id="rfield6" value=2>
                        Field2
                    </label>
                </div>
                <span class="help-block">This is a help block</span>
            </div>
        </div>
    </fieldset>
</form>

<p>Horizontal form with inline radio buttons and a label:</p>
<form class="form-horizontal">
    <fieldset>
        <div class="form-group">
            <label class="control-label col-md-2 col-sm-3" for="field">Field</label>
            <div class="col-md-10 col-sm-9">
                <div class="radio radio-inline">
                    <label for="rfield7">
                        <input type="radio" name="rfield7" id="rfield7" value=1>
                        Field1
                    </label>
                </div>
                <div class="radio radio-inline">
                    <label for="rfield8">
                        <input type="radio" name="rfield7" id="rfield8" value=2>
                        Field2
                    </label>
                </div>
                <span class="help-block">This is a help block</span>
            </div>
        </div>
    </fieldset>
</form>


<p>Vertical form with radio buttons and a label:</p>
<form class="form">
    <fieldset>
        <div class="form-group">
            <label class="control-label" for="field">Field</label>
            <div>
                <div class="radio">
                    <label for="rfield10">
                        <input type="radio" name="rfield10" id="rfield10" value=1>
                        Field1
                    </label>
                </div>
                <div class="radio">
                    <label for="rfield11">
                        <input type="radio" name="rfield10" id="rfield11" value=2>
                        Field2
                    </label>
                </div>
                <span class="help-block">This is a help block</span>
            </div>
        </div>
    </fieldset>
</form>



<h4>Basic structure for forms:</h4>
<pre>
form
    fieldset
        form-group
            label (control-label; includes label width)
            div (field_wrapper; eg, size for field) (optional, for horizontal forms)
                input-group (prepend/append with input-group-addon) (optional)
                    form-control (eg, field/input)
                    input-grp-btn
                    input-grp-addon
                radio / checkbox
                    label
                        input; label_text
                form-group (these can be nested)
                help-block
</pre>

@stop


@section('css')
    <link rel="stylesheet" href="/css/font-awesome.min.css">
@stop
