@section('content')

<p class="note">This is a test of Bootstrap's grid sizing.</p>

      <form class="form-horizontal" action="" method="post">

      <fieldset>

        <div class="form-group">
          <label class="col-lg-2 control-label" for="name">col-lg-2</label>
          <div class="col-lg-10">
            <input id="name" name="name" type="text" placeholder="class=col-lg-10" class="form-control">
          </div>
        </div>

        <div class="form-group">
          <label class="col-md-2 control-label" for="name">col-md-2</label>
          <div class="col-md-10">
            <input id="name" name="name" type="text" placeholder="class=col-md-10" class="form-control">
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-2 control-label" for="name">col-sm-2</label>
          <div class="col-sm-10">
            <input id="name" name="name" type="text" placeholder="class=col-sm-10" class="form-control">
          </div>
        </div>

        <div class="form-group">
          <label class="col-xs-2 control-label" for="name">col-xs-2</label>
          <div class="col-xs-10">
            <input id="name" name="name" type="text" placeholder="class=col-xs-10" class="form-control">
          </div>
        </div>

      </fieldset>

      <fieldset>

        <div class="form-group">
          <label class="col-lg-3 control-label" for="name">col-lg-3</label>
          <div class="col-lg-9">
            <input id="name" name="name" type="text" placeholder="class=col-lg-9" class="form-control">
          </div>
        </div>

        <div class="form-group">
          <label class="col-md-3 control-label" for="name">col-md-3</label>
          <div class="col-md-9">
            <input id="name" name="name" type="text" placeholder="class=col-md-9" class="form-control">
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-3 control-label" for="name">col-sm-3</label>
          <div class="col-sm-9">
            <input id="name" name="name" type="text" placeholder="class=col-sm-9" class="form-control">
          </div>
        </div>

        <div class="form-group">
          <label class="col-xs-3 control-label" for="name">col-xs-3</label>
          <div class="col-xs-9">
            <input id="name" name="name" type="text" placeholder="class=col-xs-9" class="form-control">
          </div>
        </div>

      </fieldset>

      <fieldset>

        <div class="form-group">
          <label class="col-lg-1 col-md-2 col-sm-3 control-label" for="name">lg1 md2 sm3</label>
          <div class="col-lg-11 col-md-10 col-sm-9">
            <input id="name" name="name" type="text" placeholder="class=col-lg-11 col-md-10 col-sm-9" class="form-control">
          </div>
        </div>

        <div class="form-group">
          <label class="col-md-2 col-sm-3 control-label" for="name">md2 sm3</label>
          <div class="col-md-10 col-sm-9">
            <input id="name" name="name" type="text" placeholder="class=col-md-10 col-sm-9" class="form-control">
          </div>
        </div>

        <div class="form-group">
          <label class="col-md-2 col-sm-3 col-xs-6 control-label" for="name">md2 sm3 xs6</label>
          <div class="col-md-10 col-sm-9 col-xs-6">
            <input id="name" name="name" type="text" placeholder="class=col-md-10 col-sm-9 col-xs-6" class="form-control">
          </div>
        </div>

        <div class="form-group">
          <label class="col-xs-4 col-sm-3 control-label" for="name">xs4 sm3</label>
          <div class="col-xs-8 col-sm-9">
            <input id="name" name="name" type="text" placeholder="class=col-xs-8 col-sm-9" class="form-control">
          </div>
        </div>

      </fieldset>

      </form>


@stop

@section('css')
    <style type="text/css">
        fieldset {
            border: 1px solid #aaa;
            border-radius: 10px;
            padding: 10px 10px 0px 10px;
            margin-bottom: 20px;
        }
    </style>
@stop