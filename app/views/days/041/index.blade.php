@section('content')

<p class="note">This is a visual test of the FormBuilder package. This shows how to do things, but also what is not working correctly yet.
@include('partials.github')</p>

<?php
    $shortHelp = "This is a help block";
    $longHelp = "This is a help block with text that extends the entire length of the control and just a little bit further to demonstrate wrapping (multiple lines are an interesting topic; let's see how they're done).";
?>

<p>Plain form with field and help:</p>
{{ KForm::open() }}
    {{ KForm::text('field')->help($longHelp)}}
{{ KForm::close() }}

<p>Horizontal form with field and help:</p>
{{ KForm::horizontal_open() }}
    {{ KForm::text('field')->help($longHelp)}}
{{ KForm::close() }}

<p>Horizontal form with field, alternate label, and help:</p>
{{ KForm::horizontal_open() }}
    {{ KForm::text('field')->label('Alternate Label')->help($longHelp)}}
{{ KForm::close() }}

<p>Horizontal form with field, wide alternate label (implicit width), and help:</p>
{{ KForm::horizontal_open() }}
    {{ KForm::text('field')->label('Alternate Label')->labelWidth('sm',4)->help($longHelp)}}
{{ KForm::close() }}

<p>Horizontal form with field, wide alternate label, explicit width, and help:</p>
{{ KForm::open()->horizontal() }}
    {{ KForm::text('field')->label('Alternate Label')->labelWidth('sm',4)->width('sm', 8)->help($longHelp)}}
{{ KForm::close() }}

<p>Horizontal form with narrow field and help:</p>
{{ KForm::open()->horizontal() }}
    {{ KForm::text('field')->help($longHelp)->width('sm',4)}}
{{ KForm::close() }}

<p>Horizontal form with multiple narrow fields:</p>
{{ KForm::open()->horizontal() }}
    {{ KForm::group('Fields') }}
        {{ KForm::text('field1')->help($longHelp)->width('sm',4)}}
        {{ KForm::text('field2')->help($longHelp)->width('sm',3)}}
        {{ KForm::text('field2')->help($longHelp)->width('sm',3)}}
    {{ KForm::closeGroup() }}
{{ KForm::close() }}

<p>Horizontal form with multiple narrow fields and labels:</p>
{{ KForm::open()->horizontal() }}
    {{ KForm::group('Fields') }}
        {{ KForm::text('field1')->label('Field1')->help($longHelp)->width('sm',4)}}
        {{ KForm::text('field2')->label('Field2')->help($longHelp)->width('sm',3)}}
        {{ KForm::text('field2')->label('Field3')->help($longHelp)->width('sm',3)}}
    {{ KForm::closeGroup() }}
{{ KForm::close() }}

<p>Horizontal form with narrow select field and help:</p>
{{ KForm::open()->horizontal() }}
    {{ KForm::select('field')->options(array('foo','bar'))->help($longHelp)->width('sm',4)}}
{{ KForm::close() }}

<p>Horizontal form with multiple select fields:</p>
{{ KForm::open()->horizontal() }}
    {{ KForm::group('Fields') }}
        {{ KForm::select('field1')->options(array('foo','bar'))->help($longHelp)->width('sm',4)->label('Field1')}}
        {{ KForm::select('field2')->options(array('foo','bar'))->help($longHelp)->width('sm',4)->label('Field2')}}
    {{ KForm::closeGroup() }}
{{ KForm::close() }}

<p>Horizontal form with textarea field and help:</p>
{{ KForm::open()->horizontal() }}
    {{ KForm::textarea('field')->help($longHelp) }}
{{ KForm::close() }}

<p>Horizontal form with full-width textarea field:</p>
{{ KForm::open()->horizontal() }}
    {{ KForm::textarea('field')->help($longHelp)->fullWidth() }}
{{ KForm::close() }}


<p>Horizontal form with radio buttons</p>
<p>Horizontal form with inline radio buttons</p>
<p>Horizontal form with checkboxes</p>
<p>Horizontal form with input group</p>

<p>Form with buttons (button types):</p>
{{ KForm::open()->horizontal() }}
    {{ KForm::button('First') }}
    {{ KForm::button('Default')->default() }}
    {{ KForm::button('Primary')->primary() }}
    {{ KForm::button('Success')->success() }}
    {{ KForm::button('Info')->info() }}
    {{ KForm::button('Warning')->warning() }}
    {{ KForm::button('Danger')->danger() }}
    {{ KForm::button('Link')->link() }}   
{{ KForm::close() }}

<p>Form with buttons (button sizes):</p>
{{ KForm::open()->horizontal() }}
    {{ KForm::button('Tiny')->default()->xs() }}
    {{ KForm::button('Small')->default()->small() }}
    {{ KForm::button('Large')->default()->large() }}
    {{ KForm::button('Disabled')->default()->large()->disabled() }}
{{ KForm::close() }}
    
<p>Form with buttons (button operations):</p>
{{ KForm::open(array('url'=>'#'))->horizontal() }}
    {{ KForm::submit('Submit')->primary() }}
    {{ KForm::reset('Reset')->primary() }}
{{ KForm::close() }}


@stop


