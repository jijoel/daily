<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daily Practice</title>

    <link href="/css/home.css" type="text/css" rel="stylesheet" />
</head>

<body>
    <div class="container">

        <h1>Aloha!</h1>

        <p>I'm Joel, and I'm very inspired by <a href="http://jenniferdewalt.com/">Jennifer Dewalt's</a> 180 web sites in 180 days project. I love that concept, and would love to do something similar. This will be a playground for me to spend a little time when I can to experiment with web tools and techniques (both client and server side). I'd generally like to keep these as simple projects--maybe spend an hour or two on each. It's a warm-up and test-bed more than anything, so they'll generally be pretty simple things. In some cases, I'll also revisit them when I come up with a better way to do something. The project source is available on <a href="https://github.com/jijoel/daily">github</a>.</p>

        <hr>

        <dl>
        @foreach($days as $day)
            <a href="{{$day[1]}}"><dt>Day {{$day[0]}}</dt><dd>{{$day[2]}}</dd></a>
        @endforeach
        </dl>
        
    </div><!-- .container -->
</body>
</html>
