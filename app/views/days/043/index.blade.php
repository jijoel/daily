@section('content')

<p class="note">This is a study on using <a href="http://ivaynberg.github.io/select2/">select2</a> for select boxes.
@include('partials.github')</p>

<p>Manual</p>
<div class="form-group">
    <div class="col-sm-4">
        <select id="test1" class="form-control">
            <option value="one">One</option>
            <option value="two">Two</option>
            <option value="three">Three</option>
            <option value="four">Four</option>
        </select>
    </div>
</div>

<div class="clearfix"></div>
<p></p>

<?php $options = array('One','Two','Three','Four','Five','Six','Seven','Eight','Nine','Ten'); ?>

<p>FormBuilder with simple selection:</p>
{{ KForm::open()->horizontal()->wizard('page1') }}
    {{ KForm::select('field1')->options($options)->width('sm',4) }}
{{ KForm::close() }}

<p>FormBuilder with multiple selections:</p>
{{ KForm::open()->horizontal()->wizard('page2') }}
    {{ KForm::select('field1')->options($options)->multiple()->width('sm',4) }}
{{ KForm::close() }}

<p>FormBuilder with multiple selections (max 3), placeholder:</p>
{{ KForm::open()->horizontal()->wizard('page3') }}
    {{ KForm::select('field1')->options($options)->placeholder('Please select an option...')
        ->multiple()->width('sm',4) }}
{{ KForm::close() }}

<p>FormBuilder with default tags:</p>
{{ KForm::open()->horizontal()->wizard('page4') }}
    {{ KForm::hidden('field1')->width('sm',4) }}
{{ KForm::close() }}

@stop


@section('js')
    <script type="text/javascript" src="/js/select2.min.js"></script>    
    <script type="text/javascript">
        $(function(){
            $('#test1').select2();
            $('[name*="page1[field1]"]').select2();
            $('[name*="page2[field1]"]').select2();
            $('[name*="page3[field1]"]').select2({
                maximumSelectionSize: 3,
            });
            $('[name*="page4[field1]"]').select2({
                tags: ['Three','Five'],
            });
        });
    </script>
@stop

@section('css')
    <link rel="stylesheet" type="text/css" href="/css/select2.css">
    <link rel="stylesheet" type="text/css" href="/css/select2-bootstrap.css">
    <style type="text/css">
        .test {
            background-color: green;
        }
    </style>
@stop
