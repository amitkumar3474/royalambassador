{{-- add booking customer --}}
<div class="ui-dialog ui-widget1 ui-widget-content ui-corner-all ui-front ui-draggable ui-resizable ajax_obj create-popup-form ui-draggable-select_change_customer d-none" tabindex="-1" style="top: 290px; width:1100px; top: 288px; left: 103px;" role="dialog" aria-describedby="ajax_obj" aria-labelledby="ui-id-15">
    <div class="ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix">
        <span id="ui-id-15" class="ui-dialog-title">Restaurant Reservation</span>
        <button class="ui-button ui-widget1 ui-state-default ui-corner-all ui-button-icon-only ui-dialog-titlebar-close" role="button" aria-disabled="false" title="close">
            <span class="ui-button-icon-primary ui-icon ui-icon-closethick closethick-select-customer-close"></span>
            <span class="ui-button-text">close</span>
        </button>
    </div>
    <span class="add-booking-customer-list">
        <div id="ajax_obj" class="ui-dialog-content ui-widget-content create-form-content customer-list" style="width: auto">
    
        </div>
        <div class="pagination-links pagination">
    
        </div>
    </span>
    <span id="new_booking" class="xmlb_form" style="display: none;">
        <form method="post" id="frm_new_booking" action="#">
            @csrf
            <input type="hidden" name="rest_hour_id" id="add_rest_hour_id" value="">
            <input type="hidden" name="selecte_currant_date" id="selecte_currant_date" value="">
            <input type="hidden" name="booking_reserve_type" id="booking_reserve_type" value="">
            <input type="hidden" name="new_booking_lnk_customer" id="new_booking_lnk_customer" value="">
            <input type="hidden" name="new_booking_lnk_customer_contact" id="new_booking_lnk_customer_contact" value="">
            <div class="cus-row" style="margin: 0px">
                <div class="col-6 ">
                    <div class="height-100">
                        <h1 id="booking_title">New Booking for <span class="customer_full_name"></span></h1>
                        <div class="cus-row">
                            <div class="col-4 mb-10">
                                <label class="align-right">Date & Time:</label>
                            </div>
                            <div class="col-8 mb-10 pl-0">
                                <select name="new_booking_dt_hour" class="new_booking_dt_hour">
                                    
                                </select> :
                                <select name="new_booking_dt_min" id="new_booking_dt_min">
                                    <option value="00" selected="selected">00</option>
                                    <option value="15">15</option>
                                    <option value="30">30</option>
                                    <option value="45">45</option>
                                </select>                          
                            </div>
                            <div class="col-4 mb-10">
                                <label class="align-right">No of Guests:</label>
                            </div>
                            <div class="col-8 mb-10 pl-0">
                                <input id="new_booking_guests" name="new_booking_guests" type="text" maxlength="3" size="2" title="No of guests to reserve">
                                <span class="mand_sign">*</span>
                            </div>
                            <div class="col-4 mb-10">
                                <label class="align-right">Table No:</label>
                            </div>
                            <div class="col-8 mb-10 pl-0">
                                <input id="new_booking_table_no" name="new_booking_table_no" type="text" maxlength="2" size="2" title="Table no to be reserved">
                            </div>
                            <div class="col-4 mb-10">
                                <label class="align-right">Notes:</label>
                            </div>
                            <div class="col-8 mb-10 pl-0">
                                <textarea id="new_booking_notes" name="new_booking_notes" cols="40" rows="6" title="Special notes if any" maxlength="1000"></textarea>
                            </div>
                            <button class="btn_save_reserve small_button button font-bold radius-0">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </span>
</div>
{{-- Edit Reservation  --}}
<div class="ui-dialog ui-widget1 ui-widget-content ui-corner-all ui-front ui-draggable ui-resizable ajax_obj create-popup-form ui-draggable-edit-reservation d-none" tabindex="-1" style="top: 290px; width:543px; top: 288px; left: 323px;" role="dialog" aria-describedby="ajax_obj" aria-labelledby="ui-id-15">
    <div class="ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix">
        <span id="ui-id-15" class="ui-dialog-title">Edit Reservation</span>
        <button class="ui-button ui-widget1 ui-state-default ui-corner-all ui-button-icon-only ui-dialog-titlebar-close" role="button" aria-disabled="false" title="close">
            <span class="ui-button-icon-primary ui-icon ui-icon-closethick closethick-reservation-close"></span>
            <span class="ui-button-text">close</span>
        </button>
    </div>
    <span id="rest_reserve_edit" class="xmlb_form">
        <form method="post" id="frm_rest_reserve_edit" action="#">
            @csrf
            <input type="hidden" name="reserve_edit_id" value="">
            <input type="hidden" name="rest_hour_id" id="add_rest_hour_id" value="">
            <input type="hidden" name="new_booking_lnk_customer" id="new_booking_lnk_customer" value="">
            <input type="hidden" name="new_booking_lnk_customer_contact" id="new_booking_lnk_customer_contact" value="">
            <div class="cus-row" style="margin: 0px">
                <div class="col-12 ">
                    <div class="height-100">
                        <div class="cus-row">
                            <div class="col-4 mb-10">
                                <label class="align-right d-block">Customer:</label>
                            </div>
                            <div class="col-8 mb-10 pl-0">
                                <span class="customer_full_name"></span>                    
                            </div>
                            <div class="col-4 mb-10">
                                <label class="align-right d-block">Type:</label>
                            </div>
                            <div class="col-8 mb-10 pl-0">
                                <select id="rest_reserve_edit_reserve_type" name="booking_reserve_type">
                                    <option value="1">LUNCH</option>
                                    <option value="2">DINNER</option>
                                </select>                        
                            </div>
                            <div class="col-4 mb-10">
                                <label class="align-right d-block">Date & Time:</label>
                            </div>
                            <div class="col-8 mb-10 pl-0">
                                <input name="selecte_currant_date" id="rest_reserve_edit_reserve_date_time_date" size="10" maxlength="10" value="" title="Reservation date and time" type="date" class="hasDatepicker">
                                <select name="new_booking_dt_hour" class="new_booking_dt_hour">
                                    
                                </select> :
                                <select name="new_booking_dt_min" id="new_booking_dt_min">
                                    <option value="00" selected="selected">00</option>
                                    <option value="15">15</option>
                                    <option value="30">30</option>
                                    <option value="45">45</option>
                                </select>                          
                            </div>
                            <div class="col-4 mb-10">
                                <label class="align-right d-block">No of Guests:</label>
                            </div>
                            <div class="col-8 mb-10 pl-0">
                                <input id="new_booking_guests" name="new_booking_guests" type="text" maxlength="3" size="2" title="No of guests to reserve">
                                <span class="mand_sign">*</span>
                            </div>
                            <div class="col-4 mb-10">
                                <label class="align-right d-block">Table No:</label>
                            </div>
                            <div class="col-8 mb-10 pl-0">
                                <input id="new_booking_table_no" name="new_booking_table_no" type="text" maxlength="2" size="2" title="Table no to be reserved">
                            </div>
                            <div class="col-4 mb-10">
                                <label class="align-right d-block">Notes:</label>
                            </div>
                            <div class="col-8 mb-10 pl-0">
                                <textarea id="new_booking_notes" name="new_booking_notes" cols="40" rows="6" title="Special notes if any" maxlength="1000"></textarea>
                            </div>
                            <button class="btn_save_reserve small_button button font-bold radius-0">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </span>
</div>
<div class="ui-dialog ui-widget ui-widget-content ui-corner-all ui-front ui-draggable ui-resizable-cancel-a-reservation ajax_obj d-none" style="position: absolute; height: auto; width: 860px; top: 470px; left: 227.5px;" tabindex="-1" role="dialog" aria-describedby="obj_customer_email" aria-labelledby="ui-id-3">
    <div class="ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix">
        <span id="ui-id-3" class="ui-dialog-title">Cancel a Reservation</span>
        <button class="ui-button ui-widget ui-state-default ui-corner-all ui-button-icon-only ui-dialog-titlebar-close" role="button" aria-disabled="false" title="close">
            <span class="ui-button-icon-primary ui-icon ui-icon-closethick closethick-reservation-close"></span>
            <span class="ui-button-text">close</span>
        </button>
    </div>
    <div id="obj_customer_email" class="ui-dialog-content ui-widget-content" style="width: auto; min-height: 101px; max-height: none; height: auto;">
        <span id="send_email" class="xmlb_form">
            <form method="post" id="frm_send_email" action="" accept-charset="utf-8" enctype="multipart/form-data">
                <input type="hidden" name="PAGE_ID" value="rest_reserve_cancel">
                <input type="hidden" name="PAGE_PARAMS" value="reserve_id=10783&amp;contact_id=52112">
                <input type="hidden" name="send_email" value="send_email">
                <label>Send to Email:</label><br>
                <input id="email_addr" name="email_addr" type="text" maxlength="60" size="80" value="torontobing@hotmail.com">
                <span id="show_cc"><a href="#">CC</a></span>
                <div id="cc_wrap" class="d-none">
                    <div class="line_break"></div>
                    <label>CC To:</label><br>
                    <input id="cc_email_addr" name="cc_email_addr" type="text" maxlength="60" size="80">
                    <br>
                    <span class="contact_cc"><span>1) Meiqi (Seven) Zhao:</span> 
                    <span class="one_cc_email">sevenmeiqi@gmail.com</span>
                    <span class="one_cc_email">torontobing@hotmail.com</span></span>
                    <span class="contact_cc"><span>2) Huanbing (Steve) Zhang:</span>
                    <span class="one_cc_email">torontobing@hotmail.com</span></span>
                </div>
                <div class="line_break"></div>
                <label>Subject:</label><br>
                <input id="email_subject" name="email_subject" type="text" maxlength="60" size="80" value="Your Reservation at the Consulate Restaurant is now cancelled">
                <div class="line_break"></div>
                <label>Email Body:</label><br>
                <textarea id="email_body" name="email_body" maxlength="4000"></textarea>
                <div class="line_break"></div>
                <div class="form_footer">
                    <input type="submit" value="Cancel and Send Email" id="btn_cancel_and_send" name="btn_cancel_and_send" class="button font-bold radius-0"> 
                    <input type="submit" value="Cancel Only (No Email is Sent)" id="btn_cancel_only" name="btn_cancel_only" class="button font-bold radius-0">
                </div>
            </form>
        </span>
    </div>
</div>
