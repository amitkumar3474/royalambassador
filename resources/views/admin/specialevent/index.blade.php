@extends('admin.layouts.master')
@section('title', 'Special Event')
@section('content')
@section('style')
<style>
    .btn_new_customer {
        position: absolute;
        right: 18px;
        top: 24px;
        background: #F7941E !important;
    }
    .customers-inner {
        padding-bottom: 10px;
    }
    .new_gc_body_wrap p {
        margin: 0 0 6px 0;
        line-height: 120%;
        padding: 2px;
    }
    #new_booking label {
        width: 130px;
        display: inline-block;
        text-align: right;
    }
</style>
@endsection
<div class="main_content">
    <span id="change_event" class="xmlb_form d-flex">
        <div class="special_action m-6">
            <button class="button font-bold new-event-form radius-0 p-2">New Event</button>
        </div>
        <div class="special_action button font-bold radius-0 m-6" id="btn_change_event">Change Event</div>

        <div id="change_event_wrap" class="round_box_3px" style="display: none;">
            <h3>Select Event to Change to</h3>
            <ul>
                @foreach($spevents as $_spevent)
                @php $spevents_date = Carbon\Carbon::parse($_spevent->start_date_time)->format('D, M d- Y');@endphp
                <li class="change_event_row {{ $speventCurrent->id == $_spevent->id ? 'cur_event' : '' }}">
                    <a href="{{ route('admin.special-event.index',['event_id' =>$_spevent->id]) }}">
                        {{ $_spevent->event_title }} ({{$spevents_date }})</a>
                </li>
                @endforeach
            </ul>
        </div>
    </span>
    <div class="line_break"></div>
    <span id="current_event" class="xmlb_form">
        <form method="post" id="frm_current_event" action="" accept-charset="utf-8" enctype="multipart/form-data">

            <input type="hidden" name="PAGE_ID" value="especial_events">
            <input type="hidden" name="current_event" value="current_event">
            <fieldset id="current_event_wrap">
                <legend>Current Event</legend>
                @if($speventCurrent != null)
                @php
                $date = Carbon\Carbon::parse($speventCurrent->start_date_time)->format('M d- Y');
                $start_date_time_str = $speventCurrent->start_date_time;
                $start_date_time_obj = \Carbon\Carbon::parse($start_date_time_str);
                $startHour = $start_date_time_obj->format('H:i');
                $end_date_time_str = $speventCurrent->end_date_time;
                $end_date_time_obj = \Carbon\Carbon::parse($end_date_time_str);
                $endhour = $end_date_time_obj->format('H:i');
                @endphp
                <h1>{{ $speventCurrent->event_title }} ({{ $date }}, from {{ $startHour }} to {{ $endhour }})</h1>
                <div class="line_break"></div>
                <label>Max Capacity: {{ $speventCurrent->max_capacity }}</label> | <label>Adult:</label> $0.00 |
                <label>Child:</label> $0.00 | <label>Senior:</label> $0.00 | <label>Gratuity:</label> {{number_format($speventCurrent->gratuity_percent,2)}}%<div
                    class="line_break"></div>
                <div class="line_break"></div>
                <div class="form_footer1">
                    <button type="button" id="current_event_edit" class="button font-bold radius-0">Edit</button>
                    <button id="current_special_event_delete" data-id="{{ $speventCurrent->id }}"
                        class="button font-bold radius-0" type="button">Delete</button>
                    <input type="submit" value="Event Sheet" id="current_event_create_pdf"
                        name="current_event_create_pdf" class="button font-bold radius-0">
                    <input type="submit" value="Kitchen Sheet" id="current_event_create_pdf"
                        name="current_event_create_pdf" class="button font-bold radius-0">
                    <input type="submit" value="Reservation List" id="current_event_create_pdf"
                        name="current_event_create_pdf" class="button font-bold radius-0">
                    <input type="submit" value="Balances and Payments" id="current_event_create_pdf"
                        name="current_event_create_pdf" class="button font-bold radius-0">
                    <a href="#">
                        <button id="current_event_edit" name="current_event_edit" class="button font-bold radius-0">Send
                            Conf. Email</button>
                    </a>
                </div>
                @endif
            </fieldset>
        </form>
    </span>
    <div id="event_tabs" class="tab_content ui-tabs ui-widget ui-widget-content ui-corner-all">
        <ul class="ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all" role="tablist">
            <li class="ui-state-default ui-corner-top ui-tabs-active ui-state-active" role="tab">
                <a href="#" class="ui-tabs-anchor" role="presentation" tabindex="-1" id="ui-id-1">Event Details</a>
            </li>
            <li class="ui-state-default ui-corner-top" role="tab">
                <a href="#" class="ui-tabs-anchor" role="presentation" tabindex="-2" id="ui-id-2">Rooms</a>
            </li>
            <li class="ui-state-default ui-corner-top" role="tab">
                <a href="#" class="ui-tabs-anchor" role="presentation" tabindex="-3" id="ui-id-3">Menu Items</a>
            </li>
            <li class="ui-state-default ui-corner-top" role="tab">
                <a href="#" class="ui-tabs-anchor" role="presentation" tabindex="-4" id="ui-id-4">Extra Options</a>
            </li>
            <li class="ui-state-default ui-corner-top" role="tab">
                <a href="#" class="ui-tabs-anchor" role="presentation" tabindex="-5" id="ui-id-5">Docs (0)</a>
            </li>
            <li class="ui-state-default ui-corner-top" role="tab">
                <a href="#" class="ui-tabs-anchor" role="presentation" tabindex="-6" id="ui-id-6">Communications
                    (94)</a>
            </li>
            <li class="ui-state-default ui-corner-top" role="tab">
                <a href="#" class="ui-tabs-anchor" role="presentation" tabindex="-7" id="ui-id-7">Floor Plans (0)</a>
            </li>
        </ul>
        <div class="ui-tabs-panel ui-widget-content ui-corner-bottom" id="event_tabs-1" aria-labelledby="ui-id-1"
            role="tabpanel" aria-expanded="true" aria-hidden="false">
            <span id="esp_event_book_list2" class="xmlb_form m-6">
                <div style="float: right;margin-top: 20px;" class="round_box_3px card">
                    <label style="width: auto;">Totals:</label>
                    <span class="grand_total">Adults: 0</span>
                    <span class="grand_total"> - Children: 0</span>
                    <span class="grand_total"> - Seniors: 0</span>
                    <span style="margin-left: 24px;" class="grand_total">Total: 0</span>
                </div>
                <h2>Current Bookings (2)
                    <div class="special_action" style="display: inline;">
                        <button class="button font-bold radius-0 new_booking_module">New Booking</button>
                    </div>
                </h2>
                <table class="product-list table mt-20">
                    <tr>
                        <th>
                            <a href="#">Conf. #</a>
                        </th>
                        <th>
                            <a href="#">Customer</a>
                        </th>
                        <th>
                            <a href="#">Guests</a>
                        </th>
                        <th>
                            <a href="#">Assigned Tables</a>
                        </th>
                        <th>
                            <a href="#">Total Menu Items</a>
                        </th>
                        <th>
                            <a href="#">Extra Options ($)</a>
                        </th>
                        <th>
                            <a href="#">Grat.</a>0%
                        </th>
                        <th>
                            <a href="#">Sub Total</a>
                        </th>
                        <th>
                            <a href="#">Grand Total</a>
                        </th>
                        <th>
                            <a href="#">Total Paid</a>
                        </th>
                        <th>
                            <a href="#">Balance</a>
                        </th>
                        <th>
                            <a href="#">Booked By</a>
                        </th>
                        <th>
                            <a href="#">Notes</a>
                        </th>
                        <th style="width: 90px;"></th>
                    </tr>
                    {{-- <tr>
                        <td><a href="#">2978</a></td>
                        <td>Antonypillai, Daisy</td>
                        <td>Ad: 2</td>
                        <td></td>
                        <td>$345.14</td>
                        <td>$0.00</td>
                        <td>$0.00</td>
                        <td>$345.14</td>
                        <td>$390.01</td>
                        <td>$0.00</td>
                        <td>$390.01</td>
                        <td>Nicolas</td>
                        <td></td>
                        <td class="booking_actions">
                            <a href="#"><img src="{{ asset('backend/assets/img/icon_contract.png') }}" class=""
                                    title="Download pdf Contract"></a>
                            <a href="#"><img src="{{ asset('backend/assets/img/icon_invoice.png') }}" class=""
                                    title="Download pdf Invoice"></a>
                            <a href="#"><img src="{{ asset('backend/assets/img/icon_delete.png') }}" class=""></a>
                            <a href="#"><img src="{{ asset('backend/assets/img/icon_edit.png') }}" class=""></a>
                            <a href="#"><img src="{{ asset('backend/assets/img/icon_info_grey.png') }}" class=""
                                    title="View Details of this Booking"></a>
                            <a href="#"><img src="{{ asset('backend/assets/img/icon_send_email.png') }}"
                                    class=""></a>
                            <a href="#"><img src="{{ asset('backend/assets/img/icon_credit_card.png') }}" class=""
                                    title="Update customer credit card information"></a>
                            <a href="#"><img src="{{ asset('backend/assets/img/icon_payment.png') }}" class=""
                                    title="Process Payment"></a>
                            <a href="#"><img src="{{ asset('backend/assets/img/poynt_payment.png') }}" class=""></a>
                        </td>
                    </tr>
                    <tr>
                        <td><a href="#">2979</a></td>
                        <td>Antonypillai,fer</td>
                        <td>Ad: 3</td>
                        <td></td>
                        <td>$565.14</td>
                        <td>$0.00</td>
                        <td>$0.00</td>
                        <td>$565.14</td>
                        <td>$787.01</td>
                        <td>$0.00</td>
                        <td>$00.01</td>
                        <td>Nicolas</td>
                        <td></td>
                        <td class="booking_actions">
                            <a href="#"><img src="{{ asset('backend/assets/img/icon_contract.png') }}" class=""
                                    title="Download pdf Contract"></a>
                            <a href="#"><img src="{{ asset('backend/assets/img/icon_invoice.png') }}" class=""
                                    title="Download pdf Invoice"></a>
                            <a href="#"><img src="{{ asset('backend/assets/img/icon_delete.png') }}" class=""></a>
                            <a href="#"><img src="{{ asset('backend/assets/img/icon_edit.png') }}" class=""></a>
                            <a href="#"><img src="{{ asset('backend/assets/img/icon_info_grey.png') }}" class=""
                                    title="View Details of this Booking"></a>
                            <a href="#"><img src="{{ asset('backend/assets/img/icon_send_email.png') }}"
                                    class=""></a>
                            <a href="#"><img src="{{ asset('backend/assets/img/icon_credit_card.png') }}" class=""
                                    title="Update customer credit card information"></a>
                            <a href="#"><img src="{{ asset('backend/assets/img/icon_payment.png') }}" class=""
                                    title="Process Payment"></a>
                            <a href="#"><img src="{{ asset('backend/assets/img/poynt_payment.png') }}" class=""></a>
                        </td>
                    </tr> --}}
                </table>
            </span>
        </div>
        <div id="event_tabs-2" aria-labelledby="ui-id-2" class="ui-tabs-panel ui-widget-content ui-corner-bottom"
            style="display: none;" role="tabpanel" aria-expanded="false" aria-hidden="true">
            <span id="event_facility_list" class="xmlb_form">
                <div class="special_action">
                    <button class="button font-bold radius-0 add-facility-form">Add Facility</button>
                </div>
                <h1>Event Rooms/Facilities</h1>
                <table class="product-list table mt-20">
                    <tr>
                        <th class="id_column"></th>
                        <th>
                            <a href="#">Facility</a>
                        </th>
                        <th>
                            <a href="#">Time</a>
                        </th>
                        <th>
                            <a href="#">Pricing</a>
                        </th>
                        <th>
                            <a href="#">Price</a>
                        </th>
                        <th>
                            <a href="#">HST</a>
                        </th>
                        <th>
                            <a href="#">Grand Total</a>
                        </th>
                    </tr>
                    @if (!is_null($speventCurrent) && $speventCurrent->eventFacilities->isNotEmpty())
                    @foreach ($speventCurrent->eventFacilities as $_eventFacility)   
                    <tr>
                        <td><input value="{{$_eventFacility->id}}" type="checkbox" name="facility_id" form_name="event_facility_list" title="Click or Shift/Click to select sinlge or in a group" row_no="1"></td>
                        <td><button type="button" class="button font-bold radius-0 edit_facility_pricing" data-id="{{$_eventFacility->id}}">Edit</button><a href="javascript:void(0)" class="edit_facility_pricing" data-id="{{$_eventFacility->id}}">{{$_eventFacility->facility->facility_name}}</a>
                        </td>
                        <td>{{date("D, M d- Y- h:ia",strtotime($_eventFacility->start_date_time))}} to {{date("h:ia",strtotime($_eventFacility->end_date_time))}}</td>
                        <td>{{$_eventFacility->facilityPricing->pricing_title}} | ${{number_format($_eventFacility->facilityPricing->price,2)}}</td>
                        <td>${{number_format($_eventFacility->facilityPricing->price,2)}}</td>
                        <td>$0.00</td>
                        <td>${{number_format($_eventFacility->grand_total,2)}}</td>
                    </tr>
                    @endforeach
                    @endif
                </table>
                <button type="button"  id="event_facility_list_delete" class="button font-bold radius-0" >Remove</button>
            </span>
        </div>
    </div>
</div>
{{-- create new event --}}
<div class="ui-widget-overlay ui-front d-none"></div>
@include('admin.specialevent.module.popup')
@endsection
@section('scripts')
@include('admin.specialevent.js.select_customer')
<script>
    $(document).ready(function() {
        // customer form manage
        $('.add').click(function(e) {
            e.preventDefault();
            var item = $(this).attr('data-id');
            console.log(item);
            if (item == 1) {
                $('.alt_email').show();
                $($(this)).hide();
            }else if(item == 2){
                $('.alt_phone').show();
                $($(this)).hide();
            }
        });
        var validator =  $("#customer_form").validate({
            rules: {
                'first_name': 'required',
                'last_name': 'required',
                'relation': 'required',
                'main_email': 'required',
                'cell_phone': 'required',
                'ad_campaign': 'number',
                'postal_code': {
                    maxlength: 10
                }
            },
            messages: {
                'first_name': 'First Name is required',
                'last_name': 'Last Name is required',
                'relation': 'The relation must be a number.',
                'main_email': 'The main email field is required.',
                'cell_phone': 'Cell Phone is required',
                'ad_campaign': 'The ad campaign must be a number.',
                'postal_code': 'Postal Code should not exceed 10 characters.',
            }
        });
        $("#esp_booking_new").validate({
            rules: {
                'new_booking_no_adults': {
                    required: true,
                    number: true
                },
                'new_booking_no_kids': {
                    required: true,
                    number: true
                },
                'new_booking_no_seniors': {
                    required: true,
                    number: true
                },
                'new_booking_total_extra_options': {
                    required: true,
                    number: true
                },
                'new_booking_gratuity_percent': {
                    required: true,
                    number: true
                },
            },
            messages: {
                'new_booking_no_adults': {
                    required: ' Please enter number of adults',
                    number: 'Please enter number of adults.'
                },
                'new_booking_no_kids': {
                    required: ' Please enter number of kids',
                    number: 'Please enter number of kids.'
                },
                'new_booking_no_seniors': {
                    required: ' Please enter number of seniors',
                    number: 'Please enter number of seniors.'
                },
                'new_booking_total_extra_options': {
                    required: ' Please enter number of extra options',
                    number: 'Please enter number of extra options.'
                },
                'new_booking_gratuity_percent': {
                    required: ' Please enter number of gratuity percent',
                    number: 'Please enter number of gratuity percent.'
                },
            }
        });
        $(".customer_type_select button").click(function(e) {
            e.preventDefault();

            $(".customer_type_select button").removeClass("checked");
            $(".customer_type_select button svg").css('display', 'none');

            $(this).addClass("checked");
            $(this).find('svg').show();

            var selectedDataId = $(this).attr('data-id');
            localStorage.setItem('selectedDataId', selectedDataId);

            var value = $(this).attr('data-id');
            if (value == 1) {
                $('.main-form').show();
                $('.corporate-form').hide();
                $('.main-order-item').css('order', '0');
                $('.second_contact').css('order', 'revert');
            } else if (value == 2) {
                $('.corporate-form').show();
                $('.corporate_info').css('order', '1');
                $('.main-order-item').css('order', '2');
                $('.second_contact').css('order', '3');
                validator.settings.rules['customer_name'] = "required";
                validator.settings.messages['customer_name'] = "Please enter the customer name";
                validator.focusInvalid();
            } else {
                $('.corporate-form').show();
                $('.corporate_info').css('order', '1');
                $('.main-order-item').css('order', '2');
            }
        });
        var storedDataId = localStorage.getItem('selectedDataId');
        if (storedDataId) {
            $(".customer_type_select button[data-id='" + storedDataId + "']").addClass("checked");
            $(".customer_type_select button[data-id='" + storedDataId + "'] svg").show();
            $(".customer_type_select button[data-id='" + storedDataId + "']").trigger('click');
        }
        $('.btn_toggle_second_contact').click(function (e) { 
            e.preventDefault();
            if ($(this).text() === 'Add Second Contact') {
                $(this).text('Remove Second Contact');
                $('.second_contact').show();
                validator.settings.rules['second_first_name'] = "required";
                validator.settings.rules['second_last_name'] = "required";
                validator.settings.rules['second_main_email'] = {
                    required: true,
                    email: true
                };
                validator.settings.rules['second_postal_code'] = {
                    maxlength: 10
                };
                validator.settings.rules['second_cell_phone'] = "required";
                validator.settings.rules['second_relation'] = "required";
                validator.focusInvalid();
                
            } else {
                $(this).text('Add Second Contact');
                $('.second_contact').hide();
                delete validator.settings.rules['second_first_name'];
                delete validator.settings.rules['second_last_name'];
                delete validator.settings.rules['second_main_email'];
                delete validator.settings.rules['second_cell_phone'];
                delete validator.settings.rules['second_relation'];
                delete validator.settings.rules['second_postal_code'];
            }
        });
        $(document).delegate('.btn_new_customer','click', function(){
            $('.customer-list').hide();
            $('#pagination-links').hide();
            $('.new_customer_wrap').show();
        });
        $(document).on("change",".price_select",function()
        {
          $(".price").val($(this).find(":selected").attr("price")) ;
        }) ;
        $("#frm_event_facility_new").validate({
            rules: {
                'room': 'required',
                'pricing': 'required',
                'price': 'required',
                'max_shared': 'required',
                'date_from': 'required',
                'date_to': 'required'
            },
            messages: {
                'room': 'Please select a room.',
                'pricing': 'Please select a pricing.',
                'price': 'Please enter the price.',
                'max_shared': 'Please enter the max shared.',
                'date_from': 'Please select room date from.',
                'date_to': 'Please select room date to.'
            }
        });

        $('#frm_event_facility_new').submit(function(e) {
            e.preventDefault();
            if(!$(this).find('input.error').length){
                var formData = $('#frm_event_facility_new').serialize();

                $.ajax({
                    url: "{{route('admin.event-facility.store')}}",
                    type: 'POST',
                    data: formData, 
                    success: function(response) {
                        if (response.success) {
                            location.reload();
                        } else {
                            alert(response.message);
                            location.reload();
                        }
                    },
                    error: function(xhr, status, error) {
                        // Handle errors
                        console.error(error);
                    }
                });
            }
        });
        $('.closethick-editfacility-close').click(function () { 
            $('.ui-draggable-edit-facility').hide();
            $('.ui-widget-overlay').css('display', 'none');
        });
        $('.edit_facility_pricing').on('click', function() {
            var eventFacilityId = $(this).data('id');
            $('.ui-draggable-edit-facility').show();
            $('.ui-widget-overlay').css('display', 'block');
            var url = "{{ route('admin.getediteventfacility', ':id') }}";
            url = url.replace(':id', eventFacilityId);
            $.ajax({
                url: url
                , type: 'GET'
                , success: function(data) {
                    var startDateTime = data.event_facility.start_date_time;
                    var endDateTime = data.event_facility.end_date_time;

                    var startDate = startDateTime.split(' ')[0];
                    var startTime = startDateTime.split(' ')[1].slice(0, 5); 
                    var endDate = endDateTime.split(' ')[0];
                    var endTime = endDateTime.split(' ')[1].slice(0, 5);
                    $('#event_facility_edit_form input[name="eventFacility_id"]').val(data.event_facility.id);
                    $('#event_facility_edit_form select[name="room"]').val(data.event_facility.lnk_facility);
                    $('#event_facility_edit_form select[name="pricing"]').val(data.event_facility.lnk_pricing);
                    $('#event_facility_edit_form input[name="price"]').val(data.event_facility.sub_total);
                    $('#event_facility_edit_form input[name="max_shared"]').val(data.event_facility.max_concurrent_events);
                    $('#event_facility_edit_form input[name="date_from"]').val(startDate);
                    $('#event_facility_edit_form select[name="hour_from"]').val(startTime.split(':')[0]);
                    $('#event_facility_edit_form select[name="min_from"]').val(startTime.split(':')[1]);
                    $('#event_facility_edit_form input[name="date_to"]').val(endDate);
                    $('#event_facility_edit_form select[name="hour_to"]').val(endTime.split(':')[0]);
                    $('#event_facility_edit_form select[name="min_to"]').val(endTime.split(':')[1]);

                }
                , error: function(error) {
                    console.error('Ajax request failed:', error);
                }
            });
        });
        $('#event_facility_list_delete').click(function() {
            var facilityIds = [];
            $('input[name="facility_id"]:checked').each(function() {
                facilityIds.push($(this).val());
            });
            if (facilityIds.length === 0) {
                alert('Please select at least one facility to delete.');
                return;
            }

            if (confirm('Are you sure you want to delete the selected facilities?')) {
                $.ajax({
                    url: '{{ route("admin.facility.delete.multiple") }}',
                    type: 'DELETE',
                    data: {ids: facilityIds,_token:"{{ csrf_token() }}"},
                    success: function(response) {
                        if (response.success) {
                            location.reload(); // Refresh the page
                        } else {
                            alert('Failed to delete selected facilities.');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            }
        });
        $('#event_facility_edit_form').submit(function(e) {
            e.preventDefault();
            if(!$(this).find('input.error').length){
                var formData = $('#event_facility_edit_form').serialize();

                $.ajax({
                    url: "{{route('admin.eventfacility.update')}}",
                    type: 'POST',
                    data: formData, 
                    success: function(response) {
                        if (response.success) {
                            location.reload();
                        } else {
                            alert(response.message);
                            location.reload();
                        }
                    },
                    error: function(xhr, status, error) {
                        // Handle errors
                        console.error(error);
                    }
                });
            }
        });
        // end
        $('.ui-state-default a').click(function(e) {
            e.preventDefault();
            $('.ui-state-default').removeClass('ui-tabs-active ui-state-active');
            $(this).closest('li').addClass('ui-tabs-active ui-state-active')
            $('.ui-tabs-panel').css('display', 'none');
            var text = $(this).attr('tabindex');
            if (text == -1) {
                $('#event_tabs-1').show();
            } else if (text == -2) {
                $('#event_tabs-2').show();
            } else if (text == -3) {
                $('#event_tabs-3').show();
            } else if (text == -4) {
                $('#event_tabs-4').show();
            } else {
                $('.main-order-item').css('order', '1');
                $('.corporate-form').show();
            }
        });
        $('.new-event-form').click(function(e) {
            e.preventDefault();
            $('.ui-draggable-new-event').show();
            $('.ui-widget-overlay').css('display', 'block');
        });
        $('.closethick-new-event').click(function() {
            $('.ui-draggable-new-event').hide();
            $('.ui-widget-overlay').css('display', 'none');
        });
        $('#btn_change_event').click(function() {
            $('#change_event_wrap').toggle('slide');
        });
        $('.ui-datepicker-trigger').click(function() {
            $('#event_new_start_date_time_date').datepicker('show');
        });

        $('.add-facility-form').click(function(e) {
            e.preventDefault();
            $('.ui-draggable-add-facility').show();
            $('.ui-widget-overlay').css('display', 'block');
        });
        $('.closethick-add-facility').click(function() {
            $('.ui-draggable-add-facility').hide();
            $('.ui-widget-overlay').css('display', 'none');
        });

        $('#current_event_edit').click(function(e) {
            e.preventDefault();
            $('.ui-draggable-edit-special-event').show();
            $('.ui-widget-overlay').css('display', 'block');
        });
        $('.closethick-edit-current_event').click(function() {
            $('.ui-draggable-edit-special-event').hide();
            $('.ui-widget-overlay').css('display', 'none');
        });

        $('.new_booking_module').click(function(e) {
            e.preventDefault();
            $('.ui-draggable-select-the-customer-to-book').show();
            $('.ui-widget-overlay').css('display', 'block');
        });
        $('.closethick-select-customer-close').click(function() {
            $('.ui-draggable-select-the-customer-to-book').hide();
            $('.ui-widget-overlay').css('display', 'none');
        });
        $(document).delegate('.add_booking_customer','click', function(){
            var customer_id = $(this).attr("customer_id");
            var cu_contact_id = $(this).attr("contact_id");
            var contact_name = $(this).attr("contact_name");
            $('.customer-list').hide();
            $("#pagination-links").css("display", "none");

            $("#new_booking_lnk_customer").val(customer_id);
            $("#new_booking_lnk_customer_contact").val(cu_contact_id);
            $(".contact-name").text(contact_name); // Add title
            $('.new_booking').show();
        });
        $(document).delegate('#flt_by_id, #flt_by_text, #flt_customer_type','change keyup', function () {
            var id = $('#flt_by_id').val();
            var text = $('#flt_by_text').val();
            var customer_type = $('#flt_customer_type').val();
            // $('#customer_filter').submit();

            var formData = $('#customer_filter').serialize();
            $.ajax({
                url: "{{ route('admin.event.select-customer') }}",
                type: 'GET',
                data: formData,
                success: function(response) {
                    var currentPage = response.current_page;
                    displayCustomers(response.data, currentPage);
                    displayPagination(response);
                    // $('.ui-draggable-select_change_customer').show();
                    // $('.ui-widget-overlay').css('display', 'block'); 
                    $('#flt_by_id').val(id);
                    $('#flt_by_text').val(text);
                    $('#flt_customer_type').val(customer_type); 
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });  
        });
    });



$(document).ready(function() {
    $.validator.addMethod("greaterThanCurrentDate", function(value, element) {
        var currentDate = moment().startOf('day'); // Start of the current day
        var selectedDate = moment(value);
        return selectedDate.isSameOrAfter(currentDate);
    }, "Start date cannot be in the past.");

    $.validator.addMethod("greaterThanStartDate", function(value, element) {
        var startDate = new Date($("#event_new_start_date").val() + " " + $("#start_date_time_hour")
            .val() + ":" + $("#start_date_time_min").val());
        var endDate = new Date($("#event_new_end_date").val() + " " + $("#end_date_time_hour").val() +
            ":" + $("#end_date_time_min").val());
        return endDate > startDate;
    }, "End date can not be in the start date.");

    $("#frm_new_special_event").validate({
        rules: {
            'event_title': {
                minlength: 3,
                required: true
            },
            'price_per_adult': {
                number: true,
                required: true
            },
            'price_per_child': {
                number: true,
                required: true
            },
            'price_per_senior': {
                number: true,
                required: true
            },
            'start_date_time': {
                required: true,
                greaterThanCurrentDate: true
            },
            'end_date_time': {
                required: true,
                greaterThanStartDate: true
            },
            'meal_type': 'required',
        },
        messages: {
            'event_title': {
                minlength: 'Please enter event title. Min 3 characters.',
                required: 'Please enter event title. Min 3 characters.'
            },
            'start_date_time': {
                required: 'Please enter Start Date Time or Start Date Time too short. It should be in YYYY-MM-DD HH:II format.',
                greaterThanCurrentDate: 'Start date cannot be in the past..'
            },
            'end_date_time': {
                required: 'Please enter End Date Time or End Date Time too short. It should be in YYYY-MM-DD HH:II format.',
                greaterThanStartDate: 'End date can not be in the start date.'
            },
            'price_per_adult': {
                number: 'Please enter Number',
                required: 'Please enter price per Adult',
            },
            'price_per_child': {
                number: 'Please enter Number',
                required: 'Please enter price per Child',
            },
            'price_per_senior': {
                number: 'Please enter Number',
                required: 'Please enter price per Senior',
            },
            'meal_type': 'Please select the meal type!.',
        }
    });

    $.validator.addMethod("greaterThanEditStartDate", function(value, element) {
        var startDate = new Date($("#event_edit_start_date").val() + " " + $(
            "#event_edit_start_date_time_hour").val() + ":" + $(
            "#event_edit_start_date_time_min").val());
        var endDate = new Date($("#event_edit_end_date_time_date").val() + " " + $(
                "#event_edit_end_date_time_hour").val() + ":" + $("#event_edit_end_date_time_min")
            .val());
        return endDate > startDate;
    }, "End date can not be in the start date.");


    $("#frm_edit_special_event").validate({
        rules: {
            'event_title': {
                minlength: 3,
                required: true
            },
            'event_title_for_email': 'required',
            'price_per_adult': {
                number: true,
                required: true
            },
            'price_per_child': {
                number: true,
                required: true
            },
            'price_per_senior': {
                number: true,
                required: true
            },
            'price_per_person_bt': {
                number: true,
                required: true
            },
            'price_per_kid_bt': {
                number: true,
                required: true
            },
            'price_per_senior_bt': {
                number: true,
                required: true
            },
            'start_date_time': {
                required: true,
                greaterThanCurrentDate: true
            },
            'end_date_time': {
                required: true,
                greaterThanEditStartDate: true
            },
            'gratuity_percent': 'required',
            'meal_type': 'required',
        },
        messages: {
            'event_title': {
                minlength: 'Please enter event title. Min 3 characters.',
                required: 'Please enter event title. Min 3 characters.'
            },
            'event_title_for_email': 'Please enter Title For Email',
            'start_date_time': {
                required: 'Please enter Start Date Time or Start Date Time too short. It should be in YYYY-MM-DD HH:II format.',
                greaterThanCurrentDate: 'Start date cannot be in the past..'
            },
            'end_date_time': {
                required: 'Please enter End Date Time or End Date Time too short. It should be in YYYY-MM-DD HH:II format.',
                greaterThanStartDate: 'End date can not be in the start date.'
            },
            'price_per_adult': {
                number: 'Please enter Number',
                required: 'Please enter price per Adult',
            },
            'price_per_child': {
                number: 'Please enter Number',
                required: 'Please enter price per Child',
            },
            'price_per_senior': {
                number: 'Please enter Number',
                required: 'Please enter price per Senior',
            },
            'price_per_person_bt': {
                number: 'Please enter Number',
                required: 'Please enter price per Child',
            },
            'price_per_kid_bt': {
                number: 'Please enter Number',
                required: 'Please enter price per Child',
            },
            'price_per_senior_bt': {
                number: 'Please enter Number',
                required: 'Please enter price per Child',
            },
            'gratuity_percent': 'Please select the Service %!.',
            'meal_type': 'Please select the meal type!.',
        }
    });
});

$(document).on('click', '#current_special_event_delete', function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    id = $(this).attr('data-id');

    if (confirm("Are you sure you want to delete this inventory count?") == true) {
        var url = "{{ route('admin.special-event.destroy', ':id') }}";
        url = url.replace(':id', id);
        $.ajax({
            url: url,
            type: 'DELETE',
            success: function(response) {
                if (response.success) {
                    alert(response.message);
                    window.location.href = "{{ route('admin.special-event.index') }}";
                } else {
                    alert(response.message);
                }
            }
        });

    }
});
</script>
@endsection