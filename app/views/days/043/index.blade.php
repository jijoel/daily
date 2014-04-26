@section('content')

<p class="note">This is a study on using <a href="http://ivaynberg.github.io/select2/">select2</a> for select boxes.
@include('partials.github')</p>

<div class="bordered">
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
</div>

<div class="clearfix"></div>
<p></p>

<?php $options = array('One','Two','Three','Four','Five','Six','Seven','Eight','Nine','Ten'); ?>

<div class="bordered">
<p>FormBuilder with simple selection:</p>
{{ KForm::open()->horizontal()->wizard('page1') }}
    {{ KForm::select('field1')->options($options)->width('sm',4) }}
{{ KForm::close() }}
</div>

<div class="bordered">
<p>FormBuilder with multiple selections:</p>
{{ KForm::open()->horizontal()->wizard('page2') }}
    {{ KForm::select('field1')->options($options)->multiple()->width('sm',4) }}
{{ KForm::close() }}
</div>

<div class="bordered">
<p>FormBuilder with multiple selections (max 3), placeholder:</p>
{{ KForm::open()->horizontal()->wizard('page3') }}
    {{ KForm::select('field1')->options($options)->placeholder('Please select an option...')
        ->multiple()->width('sm',4) }}
{{ KForm::close() }}
</div>

<div class="bordered">
<p>FormBuilder with default tags:</p>
{{ KForm::open()->horizontal()->wizard('page4') }}
    {{ KForm::hidden('field1')->width('sm',4) }}
{{ KForm::close() }}
</div>

<div class="bordered">
<p>FormBuilder with support for custom items</p>
{{ KForm::open()->horizontal()->wizard('page5') }}
    {{ KForm::text('field1')->width('sm',4) }}
    {{ KForm::submit()->primary() }}
{{ KForm::close() }}
</div>

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

            var options = [
                @foreach($options as $key=>$value)
                    { id: "{{$key}}", text: "{{$value}}" },
                @endforeach
            ];
            insertOptionIfNotFound("{{Input::old('page5.field1')}}", options);
            $('[name*="page5[field1]"]').select2({
                data: options,
                createSearchChoice: function(term) {
                    return { id: term, text: term };
                },
            });
        });

        insertOptionIfNotFound = function(item, array) {
            found = $.grep(array, function(e) { 
                return e.id === item; 
            });
            if (found[0] == null)
                array.push( { id: item, text: item } );
        };

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
