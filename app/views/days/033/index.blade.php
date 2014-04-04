@section('content')

<p class="note">This is a test of a Bootstrap form. It uses the contact form from <a href="http://bootsnipp.com/snippets/featured/simplest-contact-form">http://bootsnipp.com/snippets/featured/simplest-contact-form</a></p>

<div class="row">
  <div class="col-md-6 col-md-offset-3">
    <div class="well well-sm">
        {{ KForm::horizontal_open() }}
        <fieldset>
            <legend class="text-center">Contact us (FormBuilder)</legend>
            {{ KForm::text('name1')->label('Name')->labelWidth('md',3)->width('md',9)->placeholder('Your name') }}
            {{ KForm::text('email1')->label('Your E-mail')->labelWidth('md',3)->width('md',9)->placeholder('Your email') }}
            {{ KForm::textarea('message1')->label('Your Message')->labelWidth('md',3)->width('md',9)->placeholder('Please enter your message here...')->rows(5) }}
          <div class="form-group">
            <div class="col-md-12 text-right">
              {{ KForm::submit()->primary()->large() }}
            </div>
          </div>
        </fieldset>
        {{KForm::close()}}
    </div>
  </div>
</div>


<div class="row">
  <div class="col-md-6 col-md-offset-3">
    <div class="well well-sm">
      <form class="form-horizontal" action="" method="post">
      <fieldset>
        <legend class="text-center">Contact us (Manual)</legend>

        <!-- Name input-->
        @if($errors->has('name'))
        <div class="form-group has-error">
        @else
        <div class="form-group">
        @endif
          <label class="col-md-3 control-label" for="name">Name</label>
          <div class="col-md-9">
            <input id="name" name="name" type="text" placeholder="Your name" class="form-control">
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
            <input id="email" name="email" type="text" placeholder="Your email" class="form-control">
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
            <textarea class="form-control" id="message" name="message" placeholder="Please enter your message here..." rows="5"></textarea>
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
            <button type="submit" class="btn btn-primary btn-lg">Submit</button>
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
        .well {
            padding: 20px; 
            border-radius: 10px;            
        }
    </style>
@stop
