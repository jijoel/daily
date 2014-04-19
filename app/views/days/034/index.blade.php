@section('content')

<div ng-app ng-controller="MyController">

<p class="note">This is a second study of a bootstrap form. I'm working on the differences between form and form-horizontal. It also includes some basic Angular stuff.  
@include('partials.github')</p>

<div class="row">
  <div class="col-md-6 col-md-offset-3">
    <div class="well well-sm">
      <form class="form-horizontal" action="/day034" method="post">
      <fieldset>
        <legend class="text-center">Manual 1 &mdash; form-horizontal</legend>

        <!-- Name input-->
        @if($errors->has('name'))
        <div class="form-group has-error">
        @else
        <div class="form-group">
        @endif
          <label class="col-md-3 control-label" for="name">Name</label>
          <div class="col-md-9">
            <input id="name" name="name" type="text" placeholder="Your name" class="form-control" ng-model="name">
          </div>
          @if($errors->has('name'))
              <div class="col-md-9 col-md-offset-3">
                <span class="help-block">{{$errors->first('name')}}</span>
              </div>
          @endif
        </div>

        <!-- Email input-->
        @if($errors->has('email'))
        <div class="form-group has-error">
        @else
        <div class="form-group">
        @endif
          <label class="col-md-3 control-label" for="email">Your E-mail</label>
          <div class="col-md-9">
            <input id="email" name="email" type="text" placeholder="Your email" class="form-control" ng-model="email">
          </div>
          @if($errors->has('email'))
              <div class="col-md-9 col-md-offset-3">
                <span class="help-block">{{$errors->first('email')}}</span>
              </div>
          @endif
        </div>

        <!-- Message body -->
        @if($errors->has('message'))
        <div class="form-group has-error">
        @else
        <div class="form-group">
        @endif
          <label class="col-md-3 control-label" for="message">Your message</label>
          <div class="col-md-9">
            <textarea class="form-control" id="message" name="message" placeholder="Please enter your message here..." rows="5" ng-model="message"></textarea>
          </div>
          @if($errors->has('message'))
              <div class="col-md-9 col-md-offset-3">
                <span class="help-block">{{$errors->first('message')}}</span>
              </div>
          @endif
        </div>

        <!-- Form actions -->
        <div class="form-group">
          <div class="col-md-12 text-right">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </div>
      </fieldset>
      </form>
    </div>
  </div>
</div>



<div class="row">
  <div class="col-md-6 col-md-offset-3">
    <div class="well well-sm">
      <form class="form" action="/day034" method="post">
      <fieldset>
        <legend class="text-center">Manual 2 &mdash; form</legend>

        <!-- Name input-->
        @if($errors->has('name'))
        <div class="form-group has-error">
        @else
        <div class="form-group">
        @endif
          <label class="control-label" for="name">Name</label>
          <div>
            <input id="name" name="name" type="text" placeholder="Your name" class="form-control" ng-model="name">
          </div>
          @if($errors->has('name'))
              <div>
                <span class="help-block">{{$errors->first('name')}}</span>
              </div>
          @endif
        </div>

        <!-- Email input-->
        @if($errors->has('email'))
        <div class="form-group has-error">
        @else
        <div class="form-group">
        @endif
          <label class="control-label" for="email">Your E-mail</label>
          <div>
            <input id="email" name="email" type="text" placeholder="Your email" class="form-control" ng-model="email">
          </div>
          @if($errors->has('email'))
              <div>
                <span class="help-block">{{$errors->first('email')}}</span>
              </div>
          @endif
        </div>

        <!-- Message body -->
        @if($errors->has('message'))
        <div class="form-group has-error">
        @else
        <div class="form-group">
        @endif
          <label class="control-label" for="message">Your message</label>
          <div>
            <textarea class="form-control" id="message" name="message" placeholder="Please enter your message here..." rows="5" ng-model="message"></textarea>
          </div>
          @if($errors->has('message'))
              <div>
                <span class="help-block">{{$errors->first('message')}}</span>
              </div>
          @endif
        </div>

        <!-- Form actions -->
        <div class="form-group">
          <div class="text-right">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </div>
      </fieldset>
      </form>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-6 col-md-offset-3">
    <div class="well well-sm">
      <form class="form" action="/day034" method="post">
      <fieldset>
        <legend class="text-center">Manual 3 (wrong?) &mdash; form with widths</legend>

        <!-- Name input-->
        <div class="row">
        @if($errors->has('name'))
        <div class="form-group has-error">
        @else
        <div class="form-group">
        @endif
          <label class="col-md-3 control-label" for="name">Name</label>
          <div class="col-md-9">
            <input id="name" name="name" type="text" placeholder="Your name" class="form-control" ng-model="name">
          </div>
          @if($errors->has('name'))
              <div class="col-md-9 col-md-offset-3">
                <span class="help-block">{{$errors->first('name')}}</span>
              </div>
          @endif
        </div>
        </div>

        <!-- Email input-->
        <div class="row">
        @if($errors->has('email'))
        <div class="form-group has-error">
        @else
        <div class="form-group">
        @endif
          <label class="col-md-3 control-label" for="email">Your E-mail</label>
          <div class="col-md-9">
            <input id="email" name="email" type="text" placeholder="Your email" class="form-control" ng-model="email">
          </div>
          @if($errors->has('email'))
              <div class="col-md-9 col-md-offset-3">
                <span class="help-block">{{$errors->first('email')}}</span>
              </div>
          @endif
        </div>
        </div>

        <!-- Message body -->
        <div class="row">
        @if($errors->has('message'))
        <div class="form-group has-error">
        @else
        <div class="form-group">
        @endif
          <label class="col-md-3 control-label" for="message">Your message</label>
          <div class="col-md-9">
            <textarea class="form-control" id="message" name="message" placeholder="Please enter your message here..." rows="5" ng-model="message"></textarea>
          </div>
          @if($errors->has('message'))
              <div class="col-md-9 col-md-offset-3">
                <span class="help-block">{{$errors->first('message')}}</span>
              </div>
          @endif
        </div>
        </div>

        <!-- Form actions -->
        <div class="row">
        <div class="form-group">
          <div class="col-md-12 text-right">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </div>
        </div>
      </fieldset>
      </form>
    </div>
  </div>
</div>


<div class="row">
  <div class="col-md-10 col-md-offset-1">
    <div class="well well-sm">
      <form class="form-inline" action="/day034" method="post">
      <fieldset>
        <legend class="text-center">Manual 4 &mdash; form-inline</legend>

        <!-- Name input-->
        @if($errors->has('name'))
        <div class="form-group has-error">
        @else
        <div class="form-group">
        @endif
          <label class="control-label" for="name">Name</label>
          <div>
            <input id="name" name="name" type="text" placeholder="Your name" class="form-control" ng-model="name">
          </div>
          @if($errors->has('name'))
              <div>
                <span class="help-block">{{$errors->first('name')}}</span>
              </div>
          @endif
        </div>

        <!-- Email input-->
        @if($errors->has('email'))
        <div class="form-group has-error">
        @else
        <div class="form-group">
        @endif
          <label class="control-label" for="email">Your E-mail</label>
          <div>
            <input id="email" name="email" type="text" placeholder="Your email" class="form-control" ng-model="email">
          </div>
          @if($errors->has('email'))
              <div>
                <span class="help-block">{{$errors->first('email')}}</span>
              </div>
          @endif
        </div>

        <!-- Message body -->
        @if($errors->has('message'))
        <div class="form-group has-error">
        @else
        <div class="form-group">
        @endif
          <label class="control-label" for="message">Your message</label>
          <div>
            <textarea class="form-control" id="message" name="message" placeholder="Please enter your message here..." rows="5" ng-model="message"></textarea>
          </div>
          @if($errors->has('message'))
              <div>
                <span class="help-block">{{$errors->first('message')}}</span>
              </div>
          @endif
        </div>

        <!-- Form actions -->
        <div class="form-group">
          <div class="text-right" style="vertical-align: middle;">
            <button type="submit" class="btn btn-primary" >Submit</button>
          </div>
        </div>
      </fieldset>
      </form>
    </div>
  </div>
</div>

@stop

@section('css')
<style type="text/css">
.form-inline .form-group {
    vertical-align: top;
}
</style>
@stop

@section('js')
<script type="text/javascript">
    var MyController = function($scope) {
        $scope.name = "{{Input::old('name')}}"
        $scope.email = "{{Input::old('email')}}"
        $scope.message = "{{Input::old('message')}}"
    };
</script>
@stop