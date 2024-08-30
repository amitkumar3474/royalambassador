{{-- New Schedule --}}
<div class="ui-dialog ui-widget1 ui-widget-content ui-corner-all ui-front ui-draggable ui-resizable ajax_obj create-popup-form ui-draggable-new-schedule d-none"
    tabindex="-1" style=" width:555px; top: 260px; left: 394.5px;" role="dialog" aria-describedby="ajax_obj"
    aria-labelledby="ui-id-15">
    <div class="ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix">
        <span id="ui-id-15" class="ui-dialog-title schedule_title">New Schedule</span>
        <button class="ui-button ui-widget1 ui-state-default ui-corner-all ui-button-icon-only ui-dialog-titlebar-close"
            role="button" aria-disabled="false" title="close">
            <span class="ui-button-icon-primary ui-icon ui-icon-closethick closethick-schedule-close"></span>
            <span class="ui-button-text">close</span>
        </button>
    </div>
    <div id="ajax_obj" class="ui-dialog-content ui-widget-content create-form-content" style="width: auto">
        <span id="event_new" class="xmlb_form">
            <h2 class="form_title_change">New Schedule for <span class="selected_currant_date"></span></h2>
            <div class="line_break"></div>
            <form action="#" id="new_staff_schedule_item" method="POST" novalidate="novalidate">
                <input type="hidden" name="edit_sch_id" class="edit_sch_id">
                <input type="hidden" name="sch_item_date" class="sch_item_date" value="">
                @csrf
                <div class="row">
                    <div class="col-4 mb-10">
                        <label class="align-right d-block">Schedule Type:</label>
                    </div>
                    <div class="col-8 mb-10 pl-0">
                        <select id="schedule_type" name="schedule_type">
                            <option value="" selected="selected">----</option>
                            <option value="1">Regular Working</option>
                            <option value="3">Vacation</option>
                            <option value="4">Hourly Vacation</option>
                            <option value="5">Day Off</option>
                        </select>*
                    </div>
                </div>
                <div id="time_wrap">
                    <div class="row">
                        <div class="col-4 mb-10">
                            <label class="align-right d-block">From:</label>
                        </div>
                        <div class="col-8 mb-10 pl-0">
                            <select name="new_staff_schedule_item_sch_start_dt_hour"
                                id="new_staff_schedule_item_sch_start_dt_hour">
                                <option value="00" selected="selected">00</option>
                                <option value="01">01</option>
                                <option value="02">02</option>
                                <option value="03">03</option>
                                <option value="04">04</option>
                                <option value="05">05</option>
                                <option value="06">06</option>
                                <option value="07">07</option>
                                <option value="08">08</option>
                                <option value="09">09</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                                <option value="17">17</option>
                                <option value="18">18</option>
                                <option value="19">19</option>
                                <option value="20">20</option>
                                <option value="21">21</option>
                                <option value="22">22</option>
                                <option value="23">23</option>
                            </select>:
                            <select name="new_staff_schedule_item_sch_start_dt_min"
                                id="new_staff_schedule_item_sch_start_dt_min">
                                <option value="00" selected="selected">00</option>
                                <option value="05">05</option>
                                <option value="10">10</option>
                                <option value="15">15</option>
                                <option value="20">20</option>
                                <option value="25">25</option>
                                <option value="30">30</option>
                                <option value="35">35</option>
                                <option value="40">40</option>
                                <option value="45">45</option>
                                <option value="50">50</option>
                                <option value="55">55</option>
                            </select>*
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4 mb-10">
                            <label class="align-right d-block">To:</label>
                        </div>
                        <div class="col-8 mb-10 pl-0">
                            <input name="new_staff_schedule_item_sch_end_dt_date"
                                id="new_staff_schedule_item_sch_end_dt_date" size="10" maxlength="10" value=""
                                title="The date and time when this schedule finishes like finish working or finish hourly vacation. The date component can be one day after the SCHED_DATE. Say the person works until 1am the next morning but we still consider it for previous day"
                                type="date" class="hasDatepicker">
                            <select name="new_staff_schedule_item_sch_end_dt_hour"
                                id="new_staff_schedule_item_sch_end_dt_hour">
                                <option value="00" selected="selected">00</option>
                                <option value="01">01</option>
                                <option value="02">02</option>
                                <option value="03">03</option>
                                <option value="04">04</option>
                                <option value="05">05</option>
                                <option value="06">06</option>
                                <option value="07">07</option>
                                <option value="08">08</option>
                                <option value="09">09</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                                <option value="17">17</option>
                                <option value="18">18</option>
                                <option value="19">19</option>
                                <option value="20">20</option>
                                <option value="21">21</option>
                                <option value="22">22</option>
                                <option value="23">23</option>
                            </select>:
                            <select name="new_staff_schedule_item_sch_end_dt_min"
                                id="new_staff_schedule_item_sch_end_dt_min">
                                <option value="00" selected="selected">00</option>
                                <option value="05">05</option>
                                <option value="10">10</option>
                                <option value="15">15</option>
                                <option value="20">20</option>
                                <option value="25">25</option>
                                <option value="30">30</option>
                                <option value="35">35</option>
                                <option value="40">40</option>
                                <option value="45">45</option>
                                <option value="50">50</option>
                                <option value="55">55</option>
                            </select>*
                        </div>
                    </div>
                </div>
                <div class="line_break"></div>
                <button type="submit" class="button font-bold radius-0 new_staff_schedule_item_save">Continue</button>
            </form>
        </span>
    </div>
</div>
{{-- edit schedule notes --}}
<div class="ui-dialog ui-widget1 ui-widget-content ui-corner-all ui-front ui-draggable ui-resizable ajax_obj create-popup-form ui-draggable-edit-schedule-notes d-none"
    tabindex="-1" style=" width:555px; top: 260px; left: 394.5px;" role="dialog" aria-describedby="ajax_obj"
    aria-labelledby="ui-id-15">
    <div class="ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix">
        <span id="ui-id-15" class="ui-dialog-title">Edit Schedule Notes</span>
        <button class="ui-button ui-widget1 ui-state-default ui-corner-all ui-button-icon-only ui-dialog-titlebar-close"
            role="button" aria-disabled="false" title="close">
            <span class="ui-button-icon-primary ui-icon ui-icon-closethick closethick-edit-schedule-close"></span>
            <span class="ui-button-text">close</span>
        </button>
    </div>
    <div id="ajax_obj" class="ui-dialog-content ui-widget-content create-form-content" style="width: auto">
        <span id="event_new" class="xmlb_form">
            <div class="line_break"></div>
            <form action="#" id="new_staff_schedule_item" method="POST" novalidate="novalidate">
                @csrf
                <div class="row">
                    <div class="col-4 mb-10">
                        <label class="align-right d-block">Notes:</label>
                    </div>
                    <div class="col-8 mb-10 pl-0">
                        <textarea id="edit_staff_schedule_schedule_notes" name="edit_staff_schedule_schedule_notes"
                            cols="40" rows="6" title="Any notes about this schedule for this month"
                            maxlength="4000"></textarea>
                    </div>
                </div>
                <div class="line_break"></div>
                <button type="submit" class="button font-bold radius-0 edit_staff_schedule_item_save">Save</button>
            </form>
        </span>
    </div>
</div>
{{-- Update Staff Schedule --}}
<div class="ui-dialog ui-widget1 ui-widget-content ui-corner-all ui-front ui-draggable ui-resizable ajax_obj create-popup-form ui-draggable-update-staff-schedule d-none"
    tabindex="-1" style=" width:776px; top: 211px; left: 247.5px;" role="dialog" aria-describedby="ajax_obj"
    aria-labelledby="ui-id-15">
    <div class="ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix">
        <span id="ui-id-15" class="ui-dialog-title">Update Staff Schedule</span>
        <button class="ui-button ui-widget1 ui-state-default ui-corner-all ui-button-icon-only ui-dialog-titlebar-close"
            role="button" aria-disabled="false" title="close">
            <span class="ui-button-icon-primary ui-icon ui-icon-closethick closethick-update-staff-close"></span>
            <span class="ui-button-text">close</span>
        </button>
    </div>
    <div id="ajax_obj" class="ui-dialog-content ui-widget-content create-form-content" style="width: auto">
        <span id="event_new" class="xmlb_form">
            <h3>Update Anil india Schedule</h3>
            <p>Note: This will affect only the future schedule of this member of staff.</p>
            <div class="line_break"></div>
            <form action="#" id="new_staff_schedule_item" method="POST" novalidate="novalidate">
                @csrf
                <table class="product-list table mt-20">
                    <tbody>
                        <tr>
                            <th>Day of Week</th>
                            <th>Is Off</th>
                            <th>Start Time</th>
                            <th>End Time</th>
                            <th>Repeat</th>
                        </tr>
                        <tr class="supplier-row">
                            <td>Monday</td>
                            <td><input type="checkbox" name="is_off_1" id="is_off_1"></td>
                            <td><input type="text" class="time" name="start_1" id="start_1"></td>
                            <td><input type="text" class="time" name="end_1" id="end_1"></td>
                            <td><input type="text" class="repeats" name="repeat_1" id="repeat_1" value="1"></td>
                        </tr>
                        <tr class="supplier-row">
                            <td>Tuesday</td>
                            <td><input type="checkbox" name="is_off_2" id="is_off_2"></td>
                            <td><input type="text" class="time" name="start_2" id="start_2"></td>
                            <td><input type="text" class="time" name="end_2" id="end_2"></td>
                            <td><input type="text" class="repeats" name="repeat_2" id="repeat_2" value="1"></td>
                        </tr>
                        <tr class="supplier-row">
                            <td>Wednesday</td>
                            <td><input type="checkbox" name="is_off_3" id="is_off_3"></td>
                            <td><input type="text" class="time" name="start_3" id="start_3"></td>
                            <td><input type="text" class="time" name="end_3" id="end_3"></td>
                            <td><input type="text" class="repeats" name="repeat_3" id="repeat_3" value="1"></td>
                        </tr>
                        <tr class="supplier-row">
                            <td>Thursday</td>
                            <td><input type="checkbox" name="is_off_4" id="is_off_4"></td>
                            <td><input type="text" class="time" name="start_4" id="start_4"></td>
                            <td><input type="text" class="time" name="end_4" id="end_4"></td>
                            <td><input type="text" class="repeats" name="repeat_4" id="repeat_4" value="1"></td>
                        </tr>
                        <tr class="supplier-row">
                            <td>Friday</td>
                            <td><input type="checkbox" name="is_off_5" id="is_off_5"></td>
                            <td><input type="text" class="time" name="start_5" id="start_5"></td>
                            <td><input type="text" class="time" name="end_5" id="end_5"></td>
                            <td><input type="text" class="repeats" name="repeat_5" id="repeat_5" value="1"></td>
                        </tr>
                        <tr class="supplier-row">
                            <td>Saturday</td>
                            <td><input type="checkbox" name="is_off_6" id="is_off_6"></td>
                            <td><input type="text" class="time" name="start_6" id="start_6"></td>
                            <td><input type="text" class="time" name="end_6" id="end_6"></td>
                            <td><input type="text" class="repeats" name="repeat_6" id="repeat_6" value="1"></td>
                        </tr>
                        <tr class="supplier-row">
                            <td>Sunday</td>
                            <td><input type="checkbox" name="is_off_7" id="is_off_7"></td>
                            <td><input type="text" class="time" name="start_7" id="start_7"></td>
                            <td><input type="text" class="time" name="end_7" id="end_7"></td>
                            <td><input type="text" class="repeats" name="repeat_7" id="repeat_7" value="1"></td>
                        </tr>
                    </tbody>
                </table>
                <p>Note: Time should be in HH:II and 24 hour format like 9:45 or 18:00.</p>
                <div class="line_break"></div>
                <button type="submit" class="button font-bold radius-0 edit_staff_schedule_item_save">Update
                    Schedule</button>
            </form>
        </span>
    </div>
</div>

<!-- Add Hour of Operation -->
<div class="ui-dialog ui-widget1 ui-widget-content ui-corner-all ui-front ui-draggable ui-resizable ajax_obj create-popup-form ui-draggable-add-hour-of-operation d-none"
    tabindex="-1" style=" width:555px; top: 260px; left: 394.5px;" role="dialog" aria-describedby="ajax_obj"
    aria-labelledby="ui-id-15">
    <div class="ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix">
        <span id="ui-id-15" class="ui-dialog-title hour_title"></span>
        <button class="ui-button ui-widget1 ui-state-default ui-corner-all ui-button-icon-only ui-dialog-titlebar-close"
            role="button" aria-disabled="false" title="close">
            <span class="ui-button-icon-primary ui-icon ui-icon-closethick closethick-add-hour-of-operation-close"></span>
            <span class="ui-button-text">close</span>
        </button>
    </div>
    <div id="ajax_obj" class="ui-dialog-content ui-widget-content create-form-content" style="width: auto">
        <span id="edit_rest_hour" class="xmlb_form">
            <form method="post" id="frm_add_rest_hour" action="{{ route('admin.restaurant-hour.store') }}" accept-charset="utf-8" enctype="multipart/form-data">
                @csrf
                <br>
                <h2 class="hour_title"></h2>
                <br>
                <input type="hidden" name="hour_id">
                <p><label>From:</label><span class="element"><input name="start_dt"
                            id="start_dt" size="10" maxlength="10" value=""
                            title="Restaurant will be open from this time" type="date" class="hasDatepicker"
                            fdprocessedid="04n05o">
                        <select name="start_dt_hour" id="start_dt_hour"
                            fdprocessedid="cxvidg">
                            <option value="00" selected="selected">00</option>
                            <option value="01">01</option>
                            <option value="02">02</option>
                            <option value="03">03</option>
                            <option value="04">04</option>
                            <option value="05">05</option>
                            <option value="06">06</option>
                            <option value="07">07</option>
                            <option value="08">08</option>
                            <option value="09">09</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                            <option value="16">16</option>
                            <option value="17">17</option>
                            <option value="18">18</option>
                            <option value="19">19</option>
                            <option value="20">20</option>
                            <option value="21">21</option>
                            <option value="22">22</option>
                            <option value="23">23</option>
                        </select> :
                        <select name="start_dt_min" id="start_dt_min"
                            fdprocessedid="cp8fjk">
                            <option value="00" selected="selected">00</option>
                            <option value="05">05</option>
                            <option value="10">10</option>
                            <option value="15">15</option>
                            <option value="20">20</option>
                            <option value="25">25</option>
                            <option value="30">30</option>
                            <option value="35">35</option>
                            <option value="40">40</option>
                            <option value="45">45</option>
                            <option value="50">50</option>
                            <option value="55">55</option>
                        </select>
                    </span><span class="mand_sign">*</span></p>
                <p><label>To:</label><span class="element"><input name="end_dt"
                            id="end_dt" size="10" maxlength="10" value=""
                            title="Restaurant closes on this date and time" type="date" class="hasDatepicker"
                            fdprocessedid="sw4uyk">
                        <select name="end_dt_hour" id="end_dt_hour" fdprocessedid="pndhv">
                            <option value="00" selected="selected">00</option>
                            <option value="01">01</option>
                            <option value="02">02</option>
                            <option value="03">03</option>
                            <option value="04">04</option>
                            <option value="05">05</option>
                            <option value="06">06</option>
                            <option value="07">07</option>
                            <option value="08">08</option>
                            <option value="09">09</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                            <option value="16">16</option>
                            <option value="17">17</option>
                            <option value="18">18</option>
                            <option value="19">19</option>
                            <option value="20">20</option>
                            <option value="21">21</option>
                            <option value="22">22</option>
                            <option value="23">23</option>
                        </select> :
                        <select name="end_dt_min" id="end_dt_min" fdprocessedid="m5z5g">
                            <option value="00" selected="selected">00</option>
                            <option value="05">05</option>
                            <option value="10">10</option>
                            <option value="15">15</option>
                            <option value="20">20</option>
                            <option value="25">25</option>
                            <option value="30">30</option>
                            <option value="35">35</option>
                            <option value="40">40</option>
                            <option value="45">45</option>
                            <option value="50">50</option>
                            <option value="55">55</option>
                        </select>
                    </span><span class="mand_sign">*</span></p>
                <p><label>Open For:</label><span class="element"><select id="edit_rest_hour_open_for"
                            name="open_for" fdprocessedid="8rerig">
                            <option value="1" selected="selected">LUNCH</option>
                            <option value="2">DINNER</option>
                            <option value="3">Special Events Only</option>
                            <option value="4">CLOSED</option>
                        </select></span><span class="mand_sign">*</span></p>
                <p><label>Special Notes:</label><span class="element"><textarea id="edit_rest_hour_special_notes"
                            name="special_notes" cols="40" rows="6"
                            title="Special notes if any for this hours of operation" maxlength="4000"></textarea>
                    </span><span class="mand_sign"></span></p>
                <div class="line_break"></div>
                <div class="">
                    <button class="button">Save</button>
                </div>
            </form>
        </span>
    </div>
</div>

<!-- New Schedule for Restaurant -->
<div class="ui-dialog ui-widget1 ui-widget-content ui-corner-all ui-front ui-draggable ui-resizable ajax_obj create-popup-form ui-draggable-add-new-schedule-for-restaurant d-none"
    tabindex="-1" style=" width:555px; transform: translate(-50%, -50%); position: fixed; top: 50%; left: 50%;" role="dialog" aria-describedby="ajax_obj"
    aria-labelledby="ui-id-15">
    <div class="ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix">
        <span id="ui-id-15" class="ui-dialog-title hour_title">New Schedule for Restaurant</span>
        <button class="ui-button ui-widget1 ui-state-default ui-corner-all ui-button-icon-only ui-dialog-titlebar-close"
            role="button" aria-disabled="false" title="close">
            <span class="ui-button-icon-primary ui-icon ui-icon-closethick closethick-add-new-schedule-for-restaurant-close"></span>
            <span class="ui-button-text">close</span>
        </button>
    </div>
    <div id="ajax_obj" class="ui-dialog-content ui-widget-content create-form-content" style="width: auto;overflow: hidden;">
        <span id="new_rest_schedule_internal" class="xmlb_form">
            <form action="{{ route('admin.restaurant.weekly.schedule.store') }}" method="post" id="customer_form" novalidate="novalidate" class="new_schedule_for_restaurant">
                @csrf
                <input type="hidden" id="sch_usage" name="sch_usage" value="">
                <input type="hidden" id="sch_venue" name="sch_venue" value="">
                <input type="hidden" name="weekly_schedule_id">
                <div class="cus-row">
                    <div class="col-12">
                        <h2 id="title_schedule"></h2>
                        <div class="cus-row">
                            <div class="col-4 mb-10">
                                <label class="align-right">Day Of Week:</label>
                            </div>
                            <div class="col-8 mb-10 pl-0">
                                <select class="mr_mrs" name="day_of_week" id="day_of_week">
                                <option value="" selected="selected">----</option>
                                <option value="1">Monday</option>
                                <option value="2">Tuesday</option>
                                <option value="3">Wednesday</option>
                                <option value="4">Thursday</option>
                                <option value="5">Friday</option>
                                <option value="6">Saturday</option>
                                <option value="7">Sunday</option>
                                </select><span class="mand_sign">*</span>                           
                            </div>
                            <div class="col-4 mb-10">
                                <label class="align-right">From Time:</label>
                            </div>
                            <div class="col-8 mb-10 pl-0">
                                <select class="contact_relation" name="from_time_hour">
                                    <option value="00" selected="selected">12 AM</option>
                                    <option value="01">1 AM</option>
                                    <option value="02">2 AM</option>
                                    <option value="03">3 AM</option>
                                    <option value="04">4 AM</option>
                                    <option value="05">5 AM</option>
                                    <option value="06">6 AM</option>
                                    <option value="07">7 AM</option>
                                    <option value="08">8 AM</option>
                                    <option value="09">9 AM</option>
                                    <option value="10">10 AM</option>
                                    <option value="11">11 AM</option>
                                    <option value="12">12 PM</option>
                                    <option value="13">1 PM</option>
                                    <option value="14">2 PM</option>
                                    <option value="15">3 PM</option>
                                    <option value="16">4 PM</option>
                                    <option value="17">5 PM</option>
                                    <option value="18">6 PM</option>
                                    <option value="19">7 PM</option>
                                    <option value="20">8 PM</option>
                                    <option value="21">9 PM</option>
                                    <option value="22">10 PM</option>
                                    <option value="23">11 PM</option>
                                </select>:
                                <select name="from_time_min" id="new_rest_schedule_internal_from_time_min" fdprocessedid="sd2yy">
                                    <option value="00" selected="selected">00</option>
                                    <option value="05">05</option>
                                    <option value="10">10</option>
                                    <option value="15">15</option>
                                    <option value="20">20</option>
                                    <option value="25">25</option>
                                    <option value="30">30</option>
                                    <option value="35">35</option>
                                    <option value="40">40</option>
                                    <option value="45">45</option>
                                    <option value="50">50</option>
                                    <option value="55">55</option>
                                </select>
                                <br>
                            </div>
                            <div class="col-4 mb-10">
                                <label class="align-right">To Time:</label>
                            </div>
                            <div class="col-8 mb-10 pl-0">
                                <select class="contact_relation" name="to_time_hour">
                                    <option value="00" selected="selected">12 AM</option>
                                    <option value="01">1 AM</option>
                                    <option value="02">2 AM</option>
                                    <option value="03">3 AM</option>
                                    <option value="04">4 AM</option>
                                    <option value="05">5 AM</option>
                                    <option value="06">6 AM</option>
                                    <option value="07">7 AM</option>
                                    <option value="08">8 AM</option>
                                    <option value="09">9 AM</option>
                                    <option value="10">10 AM</option>
                                    <option value="11">11 AM</option>
                                    <option value="12">12 PM</option>
                                    <option value="13">1 PM</option>
                                    <option value="14">2 PM</option>
                                    <option value="15">3 PM</option>
                                    <option value="16">4 PM</option>
                                    <option value="17">5 PM</option>
                                    <option value="18">6 PM</option>
                                    <option value="19">7 PM</option>
                                    <option value="20">8 PM</option>
                                    <option value="21">9 PM</option>
                                    <option value="22">10 PM</option>
                                    <option value="23">11 PM</option>
                                </select>:
                                <select name="to_time_min" id="new_rest_schedule_internal_from_time_min" fdprocessedid="sd2yy">
                                    <option value="00" selected="selected">00</option>
                                    <option value="05">05</option>
                                    <option value="10">10</option>
                                    <option value="15">15</option>
                                    <option value="20">20</option>
                                    <option value="25">25</option>
                                    <option value="30">30</option>
                                    <option value="35">35</option>
                                    <option value="40">40</option>
                                    <option value="45">45</option>
                                    <option value="50">50</option>
                                    <option value="55">55</option>
                                </select>
                                <br>
                            </div>

                            <div class="col-4 mb-10">
                                <label class="align-right">Open For:</label>
                            </div>
                            <div class="col-8 mb-10 pl-0">
                                <select name="open_for" id="">
                                <option value="" selected="selected">----</option>
                                <option value="1">LUNCH</option>
                                <option value="2">DINNER</option>
                                <option value="3">Special Events Only</option>
                                <option value="4">CLOSED</option>
                                </select>*<br>
                            </div>
                            <div class="hide_show_condition">
                                <div class="alt_email row">
                                    <div class="col-4 mb-10">
                                        <label class="align-right">Max Reservations:</label>
                                    </div>
                                    <div class="col-8 mb-10 pl-0">
                                        <input size="34" class="main_email" type="number" name="max_reservations" id="max_reservations">*
                                        <br>
                                    </div>
                                </div>

                                <div class="alt_email row">
                                    <div class="col-4 mb-10">
                                        <label class="align-right">Max Adults:</label>
                                    </div>
                                    <div class="col-8 mb-10 pl-0">
                                        <input size="34" class="alt_email" type="number" name="max_adults" id="max_adults">*
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class=" mt-20">
                    <button type="submit" class="button submit-form font-bold radius-0" id="button_1" type="submit">Save</button>
                    <button type="submit" class="button submit-form font-bold radius-0" id="button_2" type="submit">Save</button>
                </div>
            </form>
        </span>
    </div>
</div>

