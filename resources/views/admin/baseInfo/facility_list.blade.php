@extends('admin.layouts.master')
@section('title', 'Manage Rooms')
@section('style')
<style>
#facilities {
    display: inline-block;
    width: 50%;
    vertical-align: top;
}

#facilities .facility_row {
    background: #E5D07B;
    padding: 3px;
    margin-top: 2px;
}

#facilities .facility_row h3 {
    display: inline;
}

#facilities .facility_row .special_action {
    float: none;
}

#facilities .facility_row img,
#facilities .facility_row input {
    margin-bottom: -3px;
    margin-left: 3px;
}

#facilities .facility_row span {
    color: #FFF;
    margin: 0 0 5px 6px;
}

#facilities .facility_row label,
#facilities .pricing_row label {
    width: auto;
    float: none;
    margin-left: 12px;
}

#facilities .facility_row label {
    color: #FFF;
}

#facilities .facility_row label:first-child,
#facilities .pricing_row label:first-child {
    margin-left: 0;
}

#facilities .pricing_row {
    margin-left: 24px;
    padding: 6px;
    margin-top: 2px;
}

.facility_main {
    display: inline-block;
    width: 50%;
}

.pricing_main {
    display: inline-block;
    width: 40%;
}

#ajax_obj label {
    font-weight: bold;
    padding-right: 5px;
    min-width: 125px;
    text-align: right;
    display: inline-block;
    vertical-align: top;
}

input[type="submit"],
button,
.special_action {
    color: #fff;
    padding: 3px;
    border: 0;
    margin: 3px;
    min-width: 60px;
    font-weight: bold;
    background: #35414a;
}
</style>
@endsection
@section('content')
<div class="title_bar card">
    <h1>Manage Rooms</h1>
</div>

<span id="facilities" class="xmlb_form">
    <form method="post" id="frm_facilities" action="" accept-charset="utf-8" enctype="multipart/form-data">
        <div class="card">
            <div>
                <h2>Rooms
                    <button type="button" class="button font-bold radius-0 btn_new_facility">Add New</button>
                </h2>
                <hr>

                <p align="right">Records: 1 to {{ $totalFPRecord }} of {{ $totalFPRecord }}</p>
                @foreach($facilities as $_facilitiy)
                    <div class="facility_row">
                        <span class="facility_main">
                            <h3>{{ $_facilitiy->facility_name }} ({{ $_facilitiy->abbreviation }})</h3>
                            <label>Capacity:</label> {{ $_facilitiy->max_capacity?$_facilitiy->max_capacity:0 }}
                            <label>Max Events:</label> {{ $_facilitiy->max_concurrent_events }}
                            
                            @if($_facilitiy->lnk_child_facilities != null)
                                <label>Child Facilities:</label>
                                @foreach ($_facilitiy->childFacilities() as $childFacility)
                                    {{ $childFacility->facility_name }};
                                @endforeach
                            @endif
                        </span>
                        <button type="button" class="button font-bold radius-0 btn_edit_facility" facility_id="{{ $_facilitiy->id }}">Edit</button>
                        <button type="button" class="button font-bold radius-0 btn_delete_facility" facility_id="{{ $_facilitiy->id }}">Delete</button>
                        <span class="special_action">
                            <button type="button" class="button font-bold radius-0 add_new_pricing" facility_id="{{ $_facilitiy->id }}">Add Option</button>
                        </span>
                    </div>
                    @php 
                        $pricings = App\Models\FacilityPricing::where('lnk_facility', $_facilitiy->id)->get();
                    @endphp
                    @foreach($pricings as $_pricing)
                        <div class="pricing_row">
                            <span class="pricing_main">{{ $_pricing->pricing_title }} [${{ number_format($_pricing->price, 2) }}]</span>
                            <button type="button" class="button font-bold radius-0 edit_pricing" facility_id="{{ $_facilitiy->id }}" pricing_id="{{ $_pricing->id }}" pricing_title="{{ $_pricing->pricing_title }}" price="{{ $_pricing->price }}" lnk_tax_group="{{ $_pricing->lnk_tax_group }}">Edit</button>
                            <button type="button" class="button font-bold radius-0 delete_pricing" pricing_id="{{ $_pricing->id }}">Delete</button>
                        </div>
                    @endforeach
                @endforeach
            </div>
        </div>
    </form>
</span>

<div class="ui-widget-overlay ui-front d-none"></div>
<!-- add new Facility module  -->
<div class="ui-dialog ui-widget1 ui-widget-content ui-corner-all ui-front ui-draggable ui-resizable ajax_obj create-popup-form ui-draggable-add-new-facility d-none "
    tabindex="-1" style="width: 500px; top:178px; left: 378px;" role="dialog" aria-describedby="ajax_obj"
    aria-labelledby="ui-id-15">
    <div class="ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix">
        <span id="ui-id-15" class="ui-dialog-title">New Facility</span>
        <button class="ui-button ui-widget1 ui-state-default ui-corner-all ui-button-icon-only ui-dialog-titlebar-close"
            role="button" aria-disabled="false" title="close">
            <span class="ui-button-icon-primary ui-icon ui-icon-closethick add-new-facility-close"></span>
            <span class="ui-button-text">close</span>
        </button>
    </div>
    <div id="ajax_obj" class="ui-dialog-content ui-widget-content create-form-content" style="width: auto">
        <span id="facility_new" class="xmlb_form">
            <form method="post" id="frm_facility_new" action="{{ route('admin.base-info.facility-list.store') }}"
                accept-charset="utf-8" enctype="multipart/form-data">
                @csrf
                <div class="line_break"></div>
                <label>Room:</label>
                <span class="short_help"></span>
                <span class="element">
                    <input id="facility_new_facility_name" name="facility_name" type="text" maxlength="120" size="40" title="Name of this facility or room" fdprocessedid="xrdf6a">
                </span>
                <span class="mand_sign">*</span>
                <div class="line_break"></div>
                <label>Abbreviation:</label>
                <span class="short_help"></span>
                <span class="element">
                    <input id="facility_new_abbreviation" name="abbreviation" type="text" maxlength="10" size="40" title="Abbreviated name of this facility or room" fdprocessedid="cd16">
                </span>
                <span class="mand_sign">*</span>
                <div class="line_break"></div>
                <label>Capacity:</label>
                <span class="short_help"></span>
                <span class="element">
                    <input id="facility_new_max_capacity" name="max_capacity" type="text" maxlength="7" size="5" title="Maximum number of people this room can fit">
                </span>
                <span class="mand_sign"></span>
                <div class="line_break"></div>
                <label>Max Concurrent Events:</label>
                <span class="short_help"></span>
                <span class="element">
                    <input id="facility_new_max_concurrent_events" name="max_concurrent_events" type="text" maxlength="3" size="4" title="Maximum number of concurrent events that can take place in this facility">
                </span>
                <span class="mand_sign">*</span>
                <div class="line_break"></div>
                <div class="form_footer">
                    <input type="submit" value="Save" id="facility_new_save" name="facility_new_save" class="button radius-0">
                </div>
            </form>
        </span>
    </div>
</div>

<!-- Edit Facility module  -->
<div class="ui-dialog ui-widget1 ui-widget-content ui-corner-all ui-front ui-draggable ui-resizable ajax_obj create-popup-form ui-draggable-edit-facility d-none "
    tabindex="-1" style="width: 500px; transform: translate(-50%, -50%); position: fixed; top: 50%; left: 50%;" role="dialog" aria-describedby="ajax_obj"
    aria-labelledby="ui-id-15">
    <div class="ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix">
        <span id="ui-id-15" class="ui-dialog-title">Edit Facility</span>
        <button class="ui-button ui-widget1 ui-state-default ui-corner-all ui-button-icon-only ui-dialog-titlebar-close" role="button" aria-disabled="false" title="close">
            <span class="ui-button-icon-primary ui-icon ui-icon-closethick edit-facility-close"></span>
            <span class="ui-button-text">close</span>
        </button>
    </div>
    <div id="ajax_obj" class="ui-dialog-content ui-widget-content create-form-content" style="width: auto">
        <span id="facility_edit" class="xmlb_form">
            <form method="post" id="frm_facility_edit" action="#" accept-charset="utf-8" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="facility_id">
                <label>Room:</label>
                <span class="short_help"></span>
                <span class="element">
                    <input id="facility_edit_facility_name" name="facility_name" type="text" maxlength="120" size="40" title="Name of this facility or room" fdprocessedid="3i5cn">
                </span>
                <span class="mand_sign">*</span>
                <div class="line_break"></div>
                <label>Abbreviation:</label>
                <span class="short_help"></span>
                <span class="element">
                    <input id="facility_edit_abbreviation" name="abbreviation" type="text" maxlength="10" size="40" title="Abbreviated name of this facility or room">
                </span>
                <span class="mand_sign">*</span>
                <div class="line_break"></div>
                <label>Child Facilities:</label>
                <span class="element">
                    <select id="facility_edit_lnk_child_facilities" name="lnk_child_facilities[]" size="10" multiple="multiple" fdprocessedid="evlbvp">
                        @foreach($facilities as $_facilitiy)
                            <option value="{{ $_facilitiy->id }}">{{ $_facilitiy->facility_name }}</option>
                        @endforeach
                    </select>
                </span>
                <span class="mand_sign"></span>
                <div class="line_break"></div>
                <label>Capacity:</label>
                <span class="short_help"></span>
                <span class="element">
                    <input id="facility_edit_max_capacity" name="max_capacity" type="text" maxlength="7" size="5" title="Maximum number of people this room can fit" fdprocessedid="a3231">
                </span>
                <span class="mand_sign"></span>
                <div class="line_break"></div>
                <label>Max Concurrent Events:</label>
                <span class="short_help"></span>
                <span class="element">
                    <input id="facility_edit_max_concurrent_events" name="max_concurrent_events" type="text" maxlength="3" size="4" title="Maximum number of concurrent events that can take place in this facility"fdprocessedid="cegiwf">
                </span>
                <span class="mand_sign">*</span>
                <div class="line_break"></div>
                <div class="form_footer">
                    <input type="submit" value="Save" id="facility_edit_save" class="button">
                </div>
            </form>
        </span>
    </div>
</div>

<!-- add new Pricing -->
<div class="ui-dialog ui-widget1 ui-widget-content ui-corner-all ui-front ui-draggable ui-resizable ajax_obj create-popup-form ui-draggable-add-new-pricing d-none "
    tabindex="-1" style="width: 500px; transform: translate(-50%, -50%); position: fixed; top: 50%; left: 50%;" role="dialog" aria-describedby="ajax_obj"
    aria-labelledby="ui-id-15">
    <div class="ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix">
        <span id="ui-id-15" class="ui-dialog-title pricing_tital"></span>
        <button class="ui-button ui-widget1 ui-state-default ui-corner-all ui-button-icon-only ui-dialog-titlebar-close add-new-pricing-close"
            role="button" aria-disabled="false" title="close">
            <span class="ui-button-icon-primary ui-icon ui-icon-closethick"></span>
            <span class="ui-button-text">close</span>
        </button>
    </div>
    <div id="ajax_obj" class="ui-dialog-content ui-widget-content create-form-content" style="width: auto">
        <span id="facility_pricing_new" class="xmlb_form">
            <form method="post" id="frm_facility_pricing_new" action="{{ route('admin.base-info.facility-pricing.store') }}" accept-charset="utf-8" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="facility_id" value="">
                <input type="hidden" name="pricing_id" value="">
                <p>
                    <label>Pricing Title:</label>
                    <span class="element">
                        <input id="facility_pricing_new_pricing_title" name="pricing_title" type="text" maxlength="180" size="50" title="Title or description of this pricing" fdprocessedid="bkeabm">
                    </span>
                    <span class="mand_sign">*</span>
                </p>
                <div class="line_break"></div>
                <p>
                    <label>Price:</label>
                    <span class="element">
                        <input id="facility_pricing_new_price" name="price" type="number" step="0.01" maxlength="10" title="Price for this item which will be the default price" fdprocessedid="v8r1tp">
                    </span>
                    <span class="mand_sign">*</span>
                </p>
                <div class="line_break"></div>
                <p>
                    <label>Tax Group:</label>
                    <span class="element">
                        <select id="facility_pricing_new_lnk_tax_group" name="lnk_tax_group" fdprocessedid="3t50sh">
                            <option value="2">GST Only</option>
                            <option value="3">GST/Liquor</option>
                            <option value="1">GST/PST</option>
                            <option value="4">HST</option>
                            <option value="5">NO Tax</option>
                        </select>
                    </span>
                    <span class="mand_sign">*</span>
                </p>
                <div class="line_break"></div>
                <div class="form_footer">
                    <input type="submit" value="Save" id="facility_pricing_new_save" name="facility_pricing_new_save" class="button">
                </div>
            </form>
        </span>
    </div>
</div>
@endsection
@section('scripts')
<script>
$(document).ready(function() {
    $('.btn_new_facility').click(function() {
        $('.ui-widget-overlay').removeClass('d-none');
        $('.ui-draggable-add-new-facility').removeClass('d-none');
    });

    $('.add-new-facility-close').click(function() {
        $('#frm_facility_new').validate().resetForm();
        $('.ui-widget-overlay').addClass('d-none');
        $('.ui-draggable-add-new-facility').addClass('d-none');
    });

    $('.btn_edit_facility').click(function(){
        var facility_id = $(this).attr('facility_id');
        var url = "{{ route('admin.base-info.facility-list.edit', ':id') }}"
        url = url.replace(':id', facility_id);
        $.ajax({
            type: "GET",
            url: url,
            data: "data",
            success: function (response) {
                var updateUrl = "{{ route('admin.base-info.facility-list.update', ':id') }}";
                updateUrl = updateUrl.replace(':id', response.facility.id);
                
                console.log(response.facility.lnk_child_facilities);
                // var lnk_child_facilities = JSON.parse(response.facility.lnk_child_facilities);
                $('#frm_facility_edit').attr('action', updateUrl);
                $('#frm_facility_edit input[name="facility_id"]').val(response.facility.id);
                $('#frm_facility_edit input[name="facility_name"]').val(response.facility.facility_name);
                $('#frm_facility_edit input[name="abbreviation"]').val(response.facility.abbreviation);
                $('#frm_facility_edit select[name="lnk_child_facilities[]"]').val(response.facility.lnk_child_facilities);
                $('#frm_facility_edit input[name="max_capacity"]').val(response.facility.max_capacity);
                $('#frm_facility_edit input[name="max_concurrent_events"]').val(response.facility.max_concurrent_events);

                $('.ui-widget-overlay').removeClass('d-none');
                $('.ui-draggable-edit-facility').removeClass('d-none');
            }
        });
    });

    $('.edit-facility-close').click(function() {
        $('#frm_facility_edit').validate().resetForm();
        $('.ui-widget-overlay').addClass('d-none');
        $('.ui-draggable-edit-facility').addClass('d-none');
    });

    $('#frm_facility_new').validate({
        rules: {
            'facility_name': 'required',
            'abbreviation': 'required',
            'max_concurrent_events': 'required'
        },
        messages: {
            'facility_name': 'Please enter Facility Name or Facility Name too short. It has to be 1 characters.',
            'abbreviation': 'Please enter abbreviation.',
            'max_concurrent_events': 'Please enter Max Concurrent Events or Max Concurrent Events too short. It has to be 1 characters.'
        }
    });

    $('#frm_facility_edit').validate({
        rules: {
            'facility_name': 'required',
            'abbreviation': 'required',
            'max_concurrent_events': 'required'
        },
        messages: {
            'facility_name': 'Please enter Facility Name or Facility Name too short. It has to be 1 characters.',
            'abbreviation': 'Please enter abbreviation.',
            'max_concurrent_events': 'Please enter Max Concurrent Events or Max Concurrent Events too short. It has to be 1 characters.'
        }
    });

    $('.add_new_pricing, .edit_pricing').click(function(){
        var facility_id = $(this).attr('facility_id');
        var pricing_id = $(this).attr('pricing_id');
        if(!pricing_id){
            $('.pricing_tital').text('New Pricing')
        }else{
            $('.pricing_tital').text('Edit Pricing');
            $('#frm_facility_pricing_new input[name="pricing_id"]').val(pricing_id);
            $('#frm_facility_pricing_new input[name="pricing_title"]').val($(this).attr('pricing_title'));
            $('#frm_facility_pricing_new input[name="price"]').val($(this).attr('price'));
            $('#frm_facility_pricing_new input[name="lnk_tax_group"]').val($(this).attr('lnk_tax_group'));
        }
        $('#frm_facility_pricing_new input[name="facility_id"]').val(facility_id);
        $('.ui-widget-overlay').removeClass('d-none');
        $('.ui-draggable-add-new-pricing').removeClass('d-none');
    });

    $('.add-new-pricing-close').click(function(){
        $('#frm_facility_pricing_new').validate().resetForm();
        $('#frm_facility_pricing_new input[name="pricing_id"]').val('');
        $('#frm_facility_pricing_new input[name="pricing_title"]').val('');
        $('#frm_facility_pricing_new input[name="price"]').val('');
        $('#frm_facility_pricing_new input[name="lnk_tax_group"]').val('');
        $('#frm_facility_pricing_new input[name="facility_id"]').val('');
        $('.ui-widget-overlay').addClass('d-none');
        $('.ui-draggable-add-new-pricing').addClass('d-none');
    });

    $('#frm_facility_pricing_new').validate({
        rules: {
            'pricing_title': 'required',
            'price': 'required',
            'lnk_tax_group': 'required'
        },
        messages: {
            'pricing_title': 'Please enter Pricing Title or Pricing Title too short. It has to be 1 characters.',
            'price': 'Please enter Price or Price too short. It has to be #min_len# characters.',
            'lnk_tax_group': 'Please enter Tax Group'
        }
    });

    $('.btn_delete_facility').click(function(){
        if(confirm('Do you really want to delete this record?')){
            var facility_id = $(this).attr('facility_id');
            var url = "{{ route('admin.base-info.facility-list.destroy', ':id') }}";
            url = url.replace(':id', facility_id);
            $.ajax({
                type:"DELETE",
                url: url,
                data: {_token: "{{ csrf_token() }}"},
                success: function(response) {
                    alert(response.success)
                    window.location.reload();
                }
            })
        }
    });

    $('.delete_pricing').click(function(){
        if(confirm('Do you really want to delete this record?')){
            var pricing_id = $(this).attr('pricing_id');
            $.ajax({
                type: "GET",
                url: "{{ route('admin.base-info.facility-pricing.destroy') }}",
                data: {pricing_id: pricing_id, _token: "{{ csrf_token() }}"},
                success: function (response) {
                    alert(response.success)
                    window.location.reload();
                }
            });
        }
    })
});
</script>
@endsection