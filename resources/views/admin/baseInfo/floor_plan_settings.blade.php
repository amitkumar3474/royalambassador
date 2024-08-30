@extends('admin.layouts.master')
@section('title', 'On Hand PO List')
@section('style')
<style>
    #main_wrap  {
        width: 100%; 
        display: inline-flex;
    }
    #main_wrap > span {
        border: 1px solid #999; 
        padding: 1em; width: 48%;
    }
    #main_wrap > span:nth-child(2) {
        margin-left: 1%;
    }
    #new_fplan_room label, #new_fplan_room .element, #new_fplan_room .mand_sign {
        float: none;
    }
    #new_fplan_room label {
        display: inline-block;
         width: 4em; 
         vertical-align: top;
    }
    #ajax_obj label {
        padding-right: 5px;
        min-width: 125px;
        text-align: right;
        display: inline-block;
        vertical-align: top;
    }
    #frm_new_fplan_room p {
        margin: 0 0 6px 0;
        line-height: 120%;
        padding: 2px;
    }
    .ui-widget input, .ui-widget select, .ui-widget textarea, .ui-widget button {
        font-family: Verdana, Arial, sans-serif;
        font-size: 1em;
    }
</style>
@endsection
@section('content')
<div class="title_bar card">
    <h1>Manage Floor Plan Settings</h1>
</div>

<div id="main_wrap">
    <span id="fplan_rooms" class="xmlb_form">
        <form method="post" id="frm_fplan_rooms" action="" accept-charset="utf-8" enctype="multipart/form-data">
            <input type="hidden" name="PAGE_ID" value="floor_plan_settings">
            <input type="hidden" name="fplan_rooms" value="fplan_rooms">
            <input type="hidden" id="fplan_rooms_submit" name="fplan_rooms_submit">
            <h2>Floor Plan Type <button class="button font-bold radius-0 add_floor_plan" type="button">Add New</button>
            </h2>
            <div class="line_break"></div>

            <p align="right">Records: 1 to 7 of 7</p>

            <table class="bound product-list">
                <thead>
                    <tr>
                        <th><a href="#" title="Click to sort by Name">Name</a> </th>
                        <th><a href="#" title="Click to sort by Legend">Legend</a> </th>
                        <th><a href="#" title="Click to sort by Length (ft.)">Length (ft.)</a> </th>
                        <th><a href="#" title="Click to sort by Width (ft.)">Width (ft.)</a> </th>
                        <th><a href="#" title="Click to sort by Toolbar Width">Toolbar Width</a> </th>
                        <th><a href="#" title="Click to sort by Image Scale">Image Scale</a> </th>
                        <th><a href="#" title="Click to sort by Plan Image">Plan Image</a> </th>
                        <th class="actions"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($floorPlanRooms as $_floorPlanRoom)
                        <tr class="actual_body">
                            <td>{{ $_floorPlanRoom->room_name }}</td>
                            <td>{{ $_floorPlanRoom->room_legend	 }}</td>
                            <td>{{ $_floorPlanRoom->room_length }}</td>
                            <td>{{ $_floorPlanRoom->room_width }}</td>
                            <td>{{ $_floorPlanRoom->toolbar_width }}</td>
                            <td>{{ $_floorPlanRoom->image_scale }}</td>
                            <td><img src="/db_event/room_plans/fplan_room_1.jpg" title="Click to view larger size" style="max-width: 10em;" class="fplan_bg" room_name="Conservatory"></td>
                            <td class="actions">
                                <input type="button" value="Delete" id="" class="button fplan_rooms_delete" fdprocessedid="1icw0e" floor_plan_room_id="{{ $_floorPlanRoom->id }}">
                                <input type="button" value="Edit" id="" class="button fplan_rooms_edit" fdprocessedid="1icw0e" floor_plan_room_id="{{ $_floorPlanRoom->id }}">
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </form>
    </span>
    <span id="fplan_elms" class="xmlb_form">
        <form method="post" id="frm_fplan_elms" action="" accept-charset="utf-8" enctype="multipart/form-data">
            <input type="hidden" name="PAGE_ID" value="floor_plan_settings">
            <input type="hidden" name="fplan_elms" value="fplan_elms">
            <input type="hidden" id="fplan_elms_submit" name="fplan_elms_submit">
            <h2>Floor Plan Elements</h2>
            <p>Use up and down arrows to re-arrange on floor plan page.</p>
            <div class="line_break"></div>
            <p align="right">Records: 1 to 9 of 9 | Show: 
                <select name="show_records" id="show_records">
                    <option value="all" selected="">All</option>
                    <option value="9" selected="">9</option>
                    <option value="10">10</option>
                    <option value="30">30</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select></p>

            <table class="bound product-list">
                <thead>
                    <tr>
                        <th><a href="#" title="Click to sort by Order">Order</a></th>
                        <th><a href="#" title="Click to sort by Name">Name</a> </th>
                        <th><a href="#" title="Click to sort by Abbrev.">Abbrev.</a> </th>
                        <th><a href="#" title="Click to sort by Active">Active</a> </th>
                        <th><a href="#" title="Click to sort by Shape">Shape</a> </th>
                        <th><a href="#" title="Click to sort by Capacity Desc">Capacity Desc</a> </th>
                        <th class="actions"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="actual_body">
                        <td>1</td>
                        <td>Round Table 60"</td>
                        <td>60"</td>
                        <td>Yes</td>
                        <td>Circle</td>
                        <td>[10 people max.]</td>
                        <td class="actions">
                            <button class="button" type="button">Edit</button>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div></div>
        </form>
    </span>
</div>

<div class="ui-widget-overlay ui-front d-none"></div>
<!-- New Floor Plan Type Module -->
<div class="ui-dialog ui-widget1 ui-widget-content ui-corner-all ui-front ui-draggable ui-resizable ajax_obj create-popup-form ui-draggable-add-new-floor-plan-type d-none "
    tabindex="-1" style="width: 600px; top:134.5px; left: 328px;" role="dialog" aria-describedby="ajax_obj"
    aria-labelledby="ui-id-15">
    <div class="ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix">
        <span id="ui-id-15" class="ui-dialog-title">New Facility</span>
        <button class="ui-button ui-widget1 ui-state-default ui-corner-all ui-button-icon-only ui-dialog-titlebar-close add-new-floor-plan-type-close"
            role="button" aria-disabled="false" title="close">
            <span class="ui-button-icon-primary ui-icon ui-icon-closethick"></span>
            <span class="ui-button-text">close</span>
        </button>
    </div>
    <div id="ajax_obj" class="ui-dialog-content ui-widget-content create-form-content" style="width: auto">
        <span id="new_fplan_room" class="xmlb_form">
            <form method="post" id="frm_new_fplan_room" action="{{ route('admin.base-info.floor-plan-settings.store') }}" accept-charset="utf-8" enctype="multipart/form-data">
                @csrf
                <input type="hidden" id="floor_plan_room_id" name="floor_plan_room_id">
                <br>
                <h2>New Floor Plan Type</h2>
                <br>
                <p>
                    <label>Name:</label>
                    <span class="element">
                        <input id="new_fplan_room_room_name" name="room_name" type="text" maxlength="50" size="34" title="Name of this room or combination of rooms" fdprocessedid="7d9h0h">
                    </span>
                    <span class="mand_sign">*</span>
                </p>
                <p>
                    <label>Legend:</label>
                    <span class="element">
                        <textarea id="new_fplan_room_room_legend" name="room_legend" cols="40" rows="6" title="Legend or description for this room if any" maxlength="4000"></textarea>
                    </span>
                    <span class="mand_sign"></span>
                </p>
                <p>
                    <label>Length (ft.):</label>
                    <span class="element">
                        <input id="new_fplan_room_room_length" name="room_length" type="text" maxlength="3" size="2" title="The lenght of this room in feet" fdprocessedid="apej8">
                    </span>
                    <span class="mand_sign">*</span>
                </p>
                <p>
                    <label>Width (ft.):</label>
                    <span class="element">
                        <input id="new_fplan_room_room_width" name="room_width" type="text" maxlength="3" size="2" title="The width of this room in feet" fdprocessedid="tweix9">
                    </span>
                    <span class="mand_sign">*</span></p>
                    <p>
                        <label>Toolbar Width:</label>
                        <span class="element">
                            <input id="new_fplan_room_toolbar_width" name="toolbar_width" type="text" maxlength="3" size="2" title="The width of the toolbar for floor plans related to this room. Using this var, we can adjust the toolbar much easier" fdprocessedid="ipc2tt">
                        </span>
                        <span class="mand_sign">*</span>
                </p>
                <p>
                    <label>Image Scale:</label>
                    <span class="element">
                        <input id="new_fplan_room_image_scale" name="image_scale" type="text" maxlength="5" size="8" title="The scaling to be used for images related to these floor plans. We need to have different scaling for vertical vs horizantal rooms" fdprocessedid="3o6ccw">
                    </span>
                    <span class="mand_sign">*</span>
                </p>
                <label>Plan Image:</label>
                <span class="element">
                    <input id="new_fplan_room_bg_img_file_name" name="bg_img_file_name" type="file" title="Background image for the floor plan. This is manually uploaded by user" size="50">
                </span>
                <span class="mand_sign"></span>
                <div class="line_break"></div>
                <div class="form_footer">
                    <input type="submit" value="Save" id="new_fplan_room_save" name="new_fplan_room_save" class="button">
                </div>
            </form>
        </span>
    </div>
</div>
@endsection
@section('scripts')
<script>
    $(document).ready(function () {
        $('.add_floor_plan').click(function () { 
            $('.ui-draggable-add-new-floor-plan-type').removeClass('d-none');
            $('.ui-widget-overlay').removeClass('d-none');
        });
        $('.add-new-floor-plan-type-close').click(function () { 
            $('#frm_new_fplan_room input[name="floor_plan_room_id"]').val('');
            $('#frm_new_fplan_room input[name="room_name"]').val('');
            $('#frm_new_fplan_room textarea[name="room_legend"]').val('');
            $('#frm_new_fplan_room input[name="room_length"]').val('');
            $('#frm_new_fplan_room input[name="room_width"]').val('');
            $('#frm_new_fplan_room input[name="toolbar_width"]').val('');
            $('#frm_new_fplan_room input[name="image_scale"]').val('');
            $('#frm_new_fplan_room').validate().resetForm();

            $('.ui-draggable-add-new-floor-plan-type').addClass('d-none');
            $('.ui-widget-overlay').addClass('d-none');
        });

        $.validator.addMethod("doublePrecision", function(value, element) {
            // Regular expression to match the format of a double precision number (4,2)
            return this.optional(element) || /^\d{1,2}(\.\d{1,2})?$/.test(value);
        }, "Please enter a valid number with up to two decimal places.");
        
        $('#frm_new_fplan_room').validate({
            rules: {
                'room_name': 'required',
                'room_length': {
                    required:true,
                    number:true
                },
                'room_width':{
                    required:true,
                    number:true
                },
                'toolbar_width':{
                    required:true,
                    number:true
                },
                'image_scale':{
                    required:true,
                    number:true,
                    doublePrecision: true
                }
            },
            messages:{
                'room_name': 'Please enter Room Name or Room Name too short. It has to be 1 characters.',
                'room_length': {
                    required:'Please enter Room Length or Room Length too short. It has to be 1 characters.',
                    number: 'Please enter Number.',
                },
                'room_width': {
                    required:'Please enter Room Width or Room Width too short. It has to be 1 characters.',
                    number: 'Please enter Number.',
                },
                'toolbar_width':{
                    required:'Please enter Toolbar Width or Toolbar Width too short. It has to be 1 characters.',
                    number: 'Please enter Number.',
                },
                'image_scale':{
                    required:'Please enter Image Scale or Image Scale too short. It has to be 1 characters.',
                    number: 'Please enter Number.',
                    doublePrecision: 'Please enter a valid number with up to two decimal places.'
                }
            }
        });

        $('.fplan_rooms_delete').click(function(){
            if(confirm("Do you really want to delete this record?")){
                var floor_plan_room_id = $(this).attr('floor_plan_room_id');
                var url = "{{ route('admin.base-info.floor-plan-settings.destroy', ':id') }}";
                url = url.replace(':id', floor_plan_room_id);
                $.ajax({
                    type: "DELETE",
                    url: url,
                    data: {_token: "{{ csrf_token() }}"},
                    success: function (response) {
                        alert(response.success)
                        window.location.reload();
                    }
                });
            }
        });
        
        $('.fplan_rooms_edit').click(function(){
            var floor_plan_room_id = $(this).attr('floor_plan_room_id');
            var url = "{{ route('admin.base-info.floor-plan-settings.edit', ':id') }}"
            url = url.replace(':id', floor_plan_room_id);
            $.ajax({
                type: "GET",
                url: url,
                data: "data",
                success: function (response) {             
                    $('#frm_new_fplan_room input[name="floor_plan_room_id"]').val(response.floorplanroom.id);
                    $('#frm_new_fplan_room input[name="room_name"]').val(response.floorplanroom.room_name);
                    $('#frm_new_fplan_room textarea[name="room_legend"]').val(response.floorplanroom.room_legend);
                    $('#frm_new_fplan_room input[name="room_length"]').val(response.floorplanroom.room_length);
                    $('#frm_new_fplan_room input[name="room_width"]').val(response.floorplanroom.room_width);
                    $('#frm_new_fplan_room input[name="toolbar_width"]').val(response.floorplanroom.toolbar_width);
                    $('#frm_new_fplan_room input[name="image_scale"]').val(response.floorplanroom.image_scale);

                    $('.ui-draggable-add-new-floor-plan-type').removeClass('d-none');
                    $('.ui-widget-overlay').removeClass('d-none');
                }
            });
        });
    });
</script>
@endsection