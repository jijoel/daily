@section('content')

<p class="note">This is a simple study of the D3 library.  @include('partials.github')</p>

<div id="workspace"></div>

@stop

@section('js')

<script type="text/javascript" src="/vendor/js/d3.min.js"></script>
<script type="text/javascript">

svg = d3.select("#workspace").append('svg').attr({
    width: d3.select('.container').width,
    height: window.innerHeight,
});

var data = d3.range(50000);

var color = d3.scale.linear()
    .domain([0, d3.max(data)])
    .range(['green', 'red']);

svg.selectAll('rect')
    .data(data)
    .enter()
    .append('rect')
    .attr({
        x: function(d,i) { return Math.floor(i % 300) * 6; },
        y: function(d,i) { return Math.floor(i / 300) * 6; },
        width: 5,
        height: 5,
        fill: color,
    });

</script>

@stop
