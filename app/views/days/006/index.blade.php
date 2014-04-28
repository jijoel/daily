@section('content')

<div class="note">
<p>Today's exercise has some interesting work on the back-end, but you won't actually see anything special on the front-end. @include('partials.github')</p>

<p>I have changed the way that I am storing the front-page menu. Instead of importing days.blade.php (with all of the html codes manually entered), I am  entering menu items as an array in the app/config/days.php. A view composer makes sure that the home page gets that array, so it can build the menu items. Ultimately, it will make the menu a lot more flexible, because I'll be able to change all of the styling for menu items in one place.</p>

<p>Individual day pages (based on the layouts.main template) no longer have to declare $day or $dayTitle variables. These are now automatically provided via the DayComposer class.</p>

<p>If you are interested in today's changes, please see the <a href="https://github.com/jijoel/daily">project on github.</a></p>
</div>

@stop
