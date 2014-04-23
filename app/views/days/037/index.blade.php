@section('content')

<p class="note">This is a study on creating forms using the <a href="http://anahkiasen.github.io/former/">Former</a> package with the TwitterBootstrap3 framework.
@include('partials.github')</p>

{{ Former::framework('TwitterBootstrap3') }}

<p>Standard form with help block:</p>
{{ Former::open() }}
    {{ Former::text('field1')->help('this is help text') }}
{{ Former::close() }}

<p>Horizontal form with help block:</p>
{{ Former::horizontal_open() }}
    {{ Former::text('field2')->help('this is help text') }}
{{ Former::close() }}

<p>I can't tell if Former has any way to specify label and/or control widths. So far, there doesn't seem to be. I've tried several things, without success:</p>
<pre>
Former::span2_text('foo')
Former::small_text('foo')
Former::small2_text('foo')
Former::text('foo')->small()
Former::text('foo')->width(2)
Former::text('foo')->sm(2)
Former::text('foo')->lg(2)
Former::text('foo')->small(2)
Former::text('foo')->large(2)
Former::text('foo')->addContainerClass('col-sm-2')
Former::text('foo')->addClass('col-sm-2 col-lg-1')
Former::text('foo')->class('form-control col-sm-2 col-lg-1')
Former::text('foo')->fieldWidth('lg', 2)
Former::text('foo')->width('lg', 2)
</pre>

<p>
{{ Former::horizontal_open() }}
    {{ Former::group('Field3', array('field3')) }}
        <div class="col-sm-2">
            {{ Former::text('field3')->help('this is help text')}}
            {{ Former::getErrors() }}
        </div>
    {{ Former::closeGroup() }}
{{ Former::close() }}


<p>Horizontal form with inline fields:</p>
{{ Former::horizontal_open() }}
    {{ Former::group('Field3a', array('field3a')) }}
        {{ Former::label('First')->class('control-label col-sm-1')}}
        <div class="col-sm-2">
            {{ Former::text('field3a')}}
        </div>
        {{ Former::label('Second')->class('control-label col-sm-1')}}
        <div class="col-sm-2">
            {{ Former::text('field3b')}}
        </div>
    {{ Former::closeGroup() }}
    {{ Former::label('this is help text')->addClass('col-lg-offset-2 col-sm-offset-4') }}
{{ Former::close() }}

<p>Horizontal form with addon:</p>
{{ Former::horizontal_open() }}
    {{ Former::text('field4')->append('foo')->help('this is help text') }}
{{ Former::close() }}

<p>Horizontal form with multiple addons:</p>
{{ Former::horizontal_open() }}
    {{ Former::text('field5')->prepend('foo')->prepend('bar')->append('fizz','buzz')->help('this is help text') }}
{{ Former::close() }}

<p>Horizontal form with icon addons:</p>
{{ Former::horizontal_open() }}
    {{ Former::text('field6')->prependIcon('search')->appendIcon('cog')->help('this is help text') }}
{{ Former::close() }}

<p>Horizontal form with button addon:</p>
{{ Former::horizontal_open() }}
    {{ Former::text('field7')->prepend(Former::button('search'))->help('this is help text') }}
{{ Former::close() }}

<p>Horizontal form with styled button addons (eg, using addClass):</p>
{{ Former::horizontal_open() }}
    {{ Former::text('field8')
        ->prepend(Former::button('first'))
        ->prepend(Former::button('default')->addClass('btn-default'))
        ->prepend(Former::button('primary')->addClass('btn-primary'))
        ->prepend(Former::button('info')->addClass('btn-info')->icon('cog'))
        ->prepend(Former::button('danger')->addClass('btn-danger')->icon('cog')->icon('search'))
        ->help('this is help text') }}
{{ Former::close() }}

<p>Horizontal form with renamed button addons (eg, using style_button):</p>
{{ Former::horizontal_open() }}
    {{ Former::text('field9')
        ->prepend(Former::button('first'))
        ->prepend(Former::default_button('default'))
        ->prepend(Former::primary_button('primary'))
        ->prepend(Former::info_button('info')->icon('cog'))
        ->prepend(Former::danger_button('danger')->icon('cog')->icon('search'))
        ->help('this is help text') }}
{{ Former::close() }}

<p>Horizontal form with input group and select addon:</p>
{{ Former::horizontal_open() }}
    {{ Former::text('field10')
        ->prepend(Former::select()->options(['foo','bar']))
        ->help('this is help text') }}
{{ Former::close() }}

<p>Horizontal form with radio buttons and a label:</p>
{{ Former::horizontal_open() }}
    {{ Former::radios('field11')
        ->radios('first', 'second', 'third', 'fourth')
        ->help('this is help text') }}
{{ Former::close() }}

<p>Horizontal form with check boxes and a label:</p>
{{ Former::horizontal_open() }}
    {{ Former::checkboxes('field12')
        ->checkboxes('first', 'second', 'third', 'fourth')
        ->help('this is help text') }}
{{ Former::close() }}

<p>Horizontal form with inline radio buttons and a label:</p>
{{ Former::horizontal_open() }}
    {{ Former::radios('field13')
        ->radios('first', 'second', 'third', 'fourth')
        ->inline()
        ->help('this is help text') }}
{{ Former::close() }}



@stop

