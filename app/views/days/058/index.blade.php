@section('content')

<p class="note">This is an example of how to handle select boxes with <a href="https://github.com/ehynds/jquery-ui-multiselect-widget">JQuery MultiSelect</a>. I really like this widget, but it looks like it's been abandoned. You can set the default selections (for server-based data) via the url. For instance, '/day058?types=B,LP' to select JUST a bungalow and lodge private bath. Valid types are: B, C, CO, F, P, LS, OC, OL, S, SA, SC, SG, SM, SO, TC, TH, TL, X, XS.
@include('partials.github')</p>

<form class="form-horizontal" role="form">
<div class="form-group">
    <label for="type1" class="control-label col-md-2">Plain HTML:</label>
    <div class="col-md-10">
    <select id="type1" title="Basic example" multiple="multiple" name="example-basic" size="10">

        <optgroup label="Guest">
            <option value='B' selected="selected">Bungalow</option>
            <option value='LP' selected="selected">Lodge Private Bath</option>
            <option value='LS' selected="selected">Lodge Share Bath</option>
            <option value='OC' selected="selected">Ocean Cottage</option>
            <option value='OL' selected="selected">Ocean Loft</option>
            <option value='TC' selected="selected">Tropical Cottage</option>
            <option value='TH' selected="selected">Tree House</option>
            <option value='TL' selected="selected">Tropical Loft</option>
            <option value='CO'>Overflow</option>
            <option value='XS'>Offsite</option>
        </optgroup>
        <optgroup label="Staff">
            <option value='C'>Campsite</option>
            <option value='S'>Staff</option>
            <option value='SA'>Staff A-Frame</option>
            <option value='SC'>Staff Campsite</option>
            <option value='SG'>Staff Guest</option>
            <option value='SM'>Staff/Manager Housing</option>
            <option value='SO'>Staff Other</option>
        </optgroup>
        <optgroup label="Misc">
            <option value='X'>Closed</option>
            <option value='F'>Facilities</option>
        </optgroup>

    </select>
    </div>
</div>

<div class="form-group">
    <label for="type2" class="control-label col-md-2">HTML Multiselect:</label>
    <div class="col-md-10">
    <select id="type2" title="Basic example" multiple="multiple" name="example-basic" size="10">

        <optgroup label="Guest">
            <option value='B' selected="selected">Bungalow</option>
            <option value='LP' selected="selected">Lodge Private Bath</option>
            <option value='LS' selected="selected">Lodge Share Bath</option>
            <option value='OC' selected="selected">Ocean Cottage</option>
            <option value='OL' selected="selected">Ocean Loft</option>
            <option value='TC' selected="selected">Tropical Cottage</option>
            <option value='TH' selected="selected">Tree House</option>
            <option value='TL' selected="selected">Tropical Loft</option>
            <option value='CO'>Overflow</option>
            <option value='XS'>Offsite</option>
        </optgroup>
        <optgroup label="Staff">
            <option value='C'>Campsite</option>
            <option value='S'>Staff</option>
            <option value='SA'>Staff A-Frame</option>
            <option value='SC'>Staff Campsite</option>
            <option value='SG'>Staff Guest</option>
            <option value='SM'>Staff/Manager Housing</option>
            <option value='SO'>Staff Other</option>
        </optgroup>
        <optgroup label="Misc">
            <option value='X'>Closed</option>
            <option value='F'>Facilities</option>
        </optgroup>

    </select>
    </div>
</div>

<div class="form-group">
    <label for="type3" class="control-label col-md-2">Array (Multiselect):</label>
    <div class="col-md-10">
    {{Form::select('type3', 
        array(
            'Guest' => [
                'B'   => 'Bungalow',
                'LP'  => 'Lodge Private Bath',
                'LS'  => 'Lodge Share Bath',
                'OC'  => 'Ocean Cottage',
                'OL'  => 'Ocean Loft',
                'TC'  => 'Tropical Cottage',
                'TH'  => 'Tree House',
                'TL'  => 'Tropical Loft',
                'CO'  => 'Overflow',
                'XS'  => 'Offsite',
            ],
            'Staff' => [
                'C'   => 'Campsite',
                'S'   => 'Staff',
                'SA'  => 'Staff A-Frame',
                'SC'  => 'Staff Campsite',
                'SG'  => 'Staff Guest',
                'SM'  => 'Staff/Manager Housing',
                'SO'  => 'Staff Other'
            ],
            'Misc' => [
                'X' => 'Closed',
                'F' => 'Facilities'
            ],
        ),
        ['B','LP','LS','OC','OL','TC','TL','TH'],
        ['multiple', 'size'=>10, 'id'=>'type3']
    )}}
    </div>
</div>

<div class="form-group">
    <label for="type4" class="control-label col-md-2">From Server (Multiselect):</label>
    <div class="col-md-10">
    {{Form::select('type4', $types, $selected, ['multiple', 'size'=>10,'id'=>'type4'])}}
    </div>
</div>

<div class="form-group">
    <label for="type5" class="control-label col-md-2">From Server (Plain):</label>
    <div class="col-md-10">
    {{Form::select('type5', $types, $selected, ['multiple', 'size'=>10,'id'=>'type4'])}}
    </div>
</div>

</form>

@stop

@section('css')
    {{ HTML::css('jquery-ui')}}
    {{ HTML::css('jquery-multiselect')}}
@stop

@section('js')
    {{ HTML::js('jquery-ui')}}
    {{ HTML::js('jquery-multiselect')}}

    <script type="text/javascript">    
        $(function(){
            $("#type2").multiselect({});
            $("#type3").multiselect({});
            $("#type4").multiselect({});
        });
    </script>
@stop