<div class="form-group has-error">
    <span class="help-block">
        @foreach($errors->all() as $error)
            <div>{{$error}}</div>
        @endforeach
    </span>
</div>
