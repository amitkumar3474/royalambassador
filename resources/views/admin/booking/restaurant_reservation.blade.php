@extends('admin.layouts.master')
@section('title', 'Restaurant Reservation')
@section('style')
<style>
    .special_action {
        display: inline;
    }
    .reserve_row {
        display: grid;
        grid-template-columns: 1.8fr 1fr 3fr 1fr 1.5fr 6fr;
        padding: .6em .8em;
        border-bottom: 1px dashed #999;
    }
    svg{
        width: 15px;
    }
    .day_wrap {
        border: 2px solid #000;
    }
    .rest_hour_wrap {
        border: 1px solid #999;
        margin-bottom: .4em;
    }
    .meal_type_header {
        background: #C5B469;
        padding: .3em;
    }
    .rest_hour_wrap h3 {
        display: inline;
    }
    .meal_type_footer {
        background: #E5D07B;
        padding: .3em;
        font-weight: bold;
        margin-top: .3em;
    }
    .date_footer {
        background: #EFEFEF;
        padding: .3em;
        font-weight: bold;
    }
    .day_wrap legend {
        font-weight: bold;
        color: #000;
        font-size: larger;
    }
    .btn_new_customer{
        position: absolute;
        right: 18px;
        top: 24px;
        background: #F7941E !important;
    }
    .contact_cc {
        display: block;
    }
    .contact_cc span:first-child {
        display: inline-block;
        width: 180px;
        overflow: hidden;
    }
    .one_cc_email {
        cursor: pointer;
        font-weight: bold;
        margin-left: 12px;
        text-decoration: underline;
        color: #E56542;
    }
    .ck-editor__editable{
        width: 100%;
        height: 400px;
    }
    .small_button{
            background: #F7941E;
            font-weight: bold;
            cursor: pointer;
            font-size: 12px;
            text-align: center;
            padding: 3px 6px 3px 6px;
            color: #FFF;
            display: inline-block;
            margin: .2em .4em 0 0;
            border: none
        }
        .round_box_6px {
            border: 1px solid #999;
            background: #FCFCFC;
        }
        .customer_row {
            padding: 3px 0;
            margin-bottom: 2px;
        }
        #customers .cust_name {
            width: 50%;
        }
        #customers span, 
        #customers .add_booking_customer_food, 
        #customers .add_booking_customer {
            float: left;
            margin-left: 3px;
        }
        #customer_list label {
            float: none;
        }
        #customers .h_sep {
            margin: 0;
            height: 0;
        }
        .h_sep {
            height: 6px;
            width: 98%;
            margin: 9px 0 9px 0;
            clear: both;
            border-bottom: 1px dashed #999;
        }
        .contact_row {
            margin: 0 0 3px 9px;
        }
        .contact_row .contact_name {
            width: 25%;
        }
        .contact_row .contact_phone {
            width: 35%;
        }
        /* Pagination styles */
        #pagination-links a,
        .pagination-links a {
            display: inline-block;
            padding: 5px 10px;
            margin-right: 5px;
            background-color: #F7941E;
            color: #333;
            text-decoration: none;
            border-radius: 3px;
        }
        #pagination-links a:hover,
        .pagination-links a:hover {
            background-color: #e0e0e0;
        }
        #pagination-links span,
        .pagination-links span {
            display: inline-block;
            padding: 5px 10px;
            margin-right: 5px;
            background-color: #ccc;
            color: #fff;
            border-radius: 3px;
        }
        .new_gc_body_wrap {
        display: grid;
        grid-template-columns: 1fr 1.1fr;
        grid-gap: 1em;
    }
    .title_bar h2 {
        color: #373232;
    }
    .new_gc_body_wrap p,
    .new_gc_body_wrap_edit p {
        margin: 0 0 6px 0;
        line-height: 120%;
        padding: 2px;
    }
    .azbd_single_choice > span {
        background: #464040;
        border-radius: .3em;
        text-align: center;
        display: inline-block;
        padding: .3em;
        color: #FFF;
        margin: .06em;
        cursor: pointer;
    }
    .gc_payment_wrap {
        border-left: 1px solid #CCC;
        padding-left: 1em;
    }
    .azbd_single_choice span.selected {
        background: #34A853;
    }
    .svg-inline--fa {
        display: var(--fa-display,inline-block);
        height: 1em;
        overflow: visible;
        vertical-align: -.125em;
    }
    .new_gc_body_wrap_edit{
        margin-left: 70px;
    }

    .svg-inline--fa {
        display: var(--fa-display, inline-block);
        height: 1em;
        overflow: visible;
        vertical-align: -.125em;
    }
    .btn {
        font-size: 1em;
        margin-left: .2em;
        cursor: pointer;
        background: none;
        color: #F7941E;
        min-width: auto;
    }
    .new_customer_dups {
        position: absolute;
        top: 8em;
        left: 35em;
        -webkit-box-shadow: 5px 5px 15px 5px #000000;
        padding: 1em;
        box-shadow: 5px 5px 15px 5px #000000;
        background: #FFF;
    }
    .found_dup_row {
        display: grid;
        grid-gap: .2em;
        grid-template-columns: .3fr .8fr 4fr 3fr 2.2fr 2fr 1.8fr;
    }
    .header > span {
        font-weight: bold;
    }
    .small_button, .ui-dialog-content .small_button {
        background: #F7941E;
        font-weight: bold;
        cursor: pointer;
        font-size: 12px;
        text-align: center;
        padding: 3px 6px 3px 6px;
        color: #FFF;
        display: inline-block;
        margin: .2em .4em 0 0;
    }
    .btn_close_cust_dups {
        float: right;
    }
    .actual_body:hover {
        background: #E2D9B5;
    }
    .new_customer_wrap {
        position: relative;
    }
</style>
@endsection
@section('content')
<div class="card title_bar">
    <h1>The Consulate Booking System</h1>
    <div class="special_action">
        <button type="button" class="button font-bold radius-0 sell_gift_certificate">Sell Gift Certificate</button>
    </div>
</div>
<fieldset class="form_filters">
    <legend>Search</legend>
    <label>From:</label>
    <input type="date" value="{{ date('Y-m-d') }}" class="date flt_from_date hasDatepicker" id="dp1712737080161">
    <label>To:</label>
    <input type="date" value="{{ date('Y-m-d', strtotime('+5 days')) }}"  class="date flt_to_date hasDatepicker" id="dp1712737080162">
</fieldset>
<div class="reserves_wrap">
</div>
<!-- include models-->
<div class="ui-widget-overlay ui-front d-none"></div>
@include('admin.booking.models.popup')
@include('admin.gift.models.popup')
@endsection
@section('scripts')
@include('admin.gift.js.create_gift')
    <script>
        ClassicEditor
            .create( document.querySelector( '#email_body' ), {
                ckfinder: {
                    uploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images&responseType=json'
                }
            } )
            .then( email_body => {
                console.log( 'CKEditor initialized', email_body );
            } )
            .catch( error => {
                console.error( 'CKEditor initialization error:', error );
            } );
        $(document).ready(function () {
            function fetchData() {
                var fromDateValue = $('.flt_from_date').val();
                var toDateValue = $('.flt_to_date').val();
                $.ajax({
                    type: "GET",
                    url: "{{ route('admin.booking.restaurant.reservation-get') }}",
                    data: {
                        currentDate: fromDateValue,
                        fiveDaysLater: toDateValue
                    },
                    success: function (response) {
                        $('.reserves_wrap').html(response.data);
                    }
                });
            }
            fetchData();

            $('.flt_from_date, .flt_to_date').change(fetchData);

            $('.btn_add_reserve').click(function () { 

            });
        });
        function displayBookingCustomers(customers, currentPage) {
            var i = currentPage*10-9;
            var html = `
            <span id="event_new" class="xmlb_form">
                <div class="page-content">
                    
                    <div class="customers_wrap">
                        <form action="#" id="customer_food_filter" method="get">
                            <div class="filters_wrap">
                                <fieldset class="form_filters d-flex">
                                    <legend>Search</legend>
                                    <div class="id">
                                        <strong class="mr-5">Id:</strong>
                                        <input class="flt_by_id filter_elm_customer_id" id="flt_by_id" name="custome_id"
                                            value="{{old('custome_id')}}">
                                    </div>
                                    <div class="text">
                                        <strong class="mr-5 ml-5">Text:</strong>
                                        <input class="" id="flt_by_text" name="flt_by_text"
                                            value="{{old('flt_by_text')}}"
                                            title="Search by name, phone, cell phone or email">
                                    </div>
                                    <div class="type">
                                        <strong class="mr-5 ml-5">Customer Type:</strong>
                                        <select class="" id="flt_customer_type" name="customer_type">
                                            <option value="" {{ old('customer_type') == '' ? 'selected' : '' }}>--All--
                                            </option>
                                            <option value="1" {{ old('customer_type') == '1' ? 'selected' : '' }}>
                                                Personal</option>
                                            <option value="2" {{ old('customer_type') == '2' ? 'selected' : '' }}>
                                                Corporate</option>
                                            <option value="3" {{ old('customer_type') == '3' ? 'selected' : '' }}>Event
                                                Planner</option>
                                        </select>
                                    </div>
                                </fieldset>
                            </div>
                        </form>
                        <button type="button" class="btn_new_customer button font-bold radius-0" onClick="window.location.href='{{ route('admin.customer.create') }}'">New Customer</button>

                    </div>
                    <div class="customer-rows-outer">`;
                    customers.forEach(function(customer, index) {
                        var customerId = customer.id;
                        var customerRoute = "{{ route('admin.customer.show', ':customerId') }}".replace(':customerId', customerId);
                    html +=`<div class="customers-inner">
                            <div class="customers">
                                <div class="sr-no">
                                    <strong>${i++}) </strong>
                                </div>
                                <div class="customer-id">
                                    <strong>Id:</strong>
                                    <a href="${customerRoute}"  
                                        class="id-value">${customer.id}</a>
                                </div>
                                <div class="customer-name">
                                    <a href="${customerRoute}">${customer.customer_name}`;
                                    if (customer.customer_type == 2) {
                                        html += '(Corporate)';
                                    } else if (customer.customer_type == 3) {
                                        html += '(Event Planner)';
                                    }
                                    html += `</a>
                                </div>
                                <div class="booking-status">
                                    <strong>Booked:</strong>`;
                                    if (customer.events.length > 0) {
                                        var count = customer.events.filter(event => event.event_status === 1).length;
                                    } else {
                                        count = 0;
                                    }

                                    if (count != 0) {
                                        html += `<span class="value counted">${count}</span>`;
                                    } else {
                                        html += `<span class="value">${count}</span>`;
                                    }
                                    html += ` </div>
                                    <div class="tentative booking-status">
                                        <strong>Tentative:</strong>`;
                                        if (customer.events.length > 0) {
                                            var count = customer.events.filter(event => event.event_status === 1).length;
                                        } else {
                                            count = 0;
                                        }

                                        if (count != 0) {
                                            html += `<span class="value counted">${count}</span>`;
                                        } else {
                                            html += `<span class="value">${count}</span>`;
                                        }
                                        html += ` </div>`;
                                        var formattedDate = moment(customer.created_at).format('ddd, MMM D YYYY')
                                        html += `<div class="last-status">
                                    <span><strong>Added:</strong> ${formattedDate} <strong>By:</strong>
                                    ${customer.user.name} </span>
                                </div>
                            </div>`;
                            if (customer.contacts.length > 0) {
                            $.each(customer.contacts, function(index, contact) {
                                html += `
                                <div class="customers-contact">
                                    <button type="button" class="button font-bold radius-0 add_booking_customer_food" customer_name="${customer.customer_name}" contact_name="${contact.last_name} ${contact.first_name}" 
                                    customer_id="${customer.id}" contact_id="${contact.id}">Add Booking</button>
                                    <div class="name">${contact.last_name}, ${contact.first_name}</div>
                                    <div class="number">
                                        <strong>Phone:</strong>
                                        <span>${contact.cell_phone}</span>
                                    </div>
                                    <div class="email">
                                        <strong>Email:</strong>
                                        <span>${contact.main_email}</span>
                                    </div>
                                </div>`;
                            });
                            }
                            html +=` </div>`;
                    });
                    html +=` </div>
                </div>
            </span>
            `;
            $('.customer-list').html(html);
        }
        function displayBookingPagination(response) {
            var paginationLinks = $('.pagination-links');
            paginationLinks.empty();
            var currentPage = response.current_page;
            var lastPage = response.last_page;
            var prevPageUrl = response.prev_page_url;
            var nextPageUrl = response.next_page_url;
            var curantUrl = response.path;
            if (prevPageUrl !== null) {
                paginationLinks.append('<a href="#" onclick="fetchBookingPage(\'' + prevPageUrl + '\')">Previous</a>');
            }

            for (var i = 1; i <= lastPage; i++) {
                if (i === currentPage) {
                    paginationLinks.append('<span>' + i + '</span>');
                } else {
                    paginationLinks.append('<a href="#" onclick="fetchBookingPage(\'' + curantUrl + '?page='+i+'\')">' + i + '</a>');
                }
            }
            if (nextPageUrl !== null) {
                paginationLinks.append('<a href="#" onclick="fetchBookingPage(\'' + nextPageUrl + '\')">Next</a>');
            }
        }
        window.fetchBookingPage = function(url) {
            $.ajax({
                url: url,
                type: 'GET',
                success: function(response) {
                    var currentPage = response.current_page;
                    displayBookingCustomers(response.data, currentPage);
                    displayBookingPagination(response);
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        };

        $(document).ready(function () {
            $(document).on('click','.btn_add_reserve',function() {
                let restaurant_hour_id = $(this).attr('restaurant_hour_id');
                let selectDate = $(this).closest('.day_wrap').attr('day');
                let reserveType = $(this).closest('.meal_type_header').attr('reserve_type');
                $('#selecte_currant_date').val(selectDate);
                $('#booking_reserve_type').val(reserveType);
                $('#add_rest_hour_id').val(restaurant_hour_id);
                var start_time = $(this).attr('start_time');
                var end_time = $(this).attr('end_time');
                var start_hours = parseInt(start_time.split(':')[0]);
                var end_hours = parseInt(end_time.split(':')[0]);

                // Populate hour options
                for (var i = start_hours; i <= end_hours; i++) {
                    var hour = i % 12 || 12; 
                    var ampm = i < 12 ? 'AM' : 'PM'; 
                    var optionText = hour + ' ' + ampm;
                    $('.new_booking_dt_hour').append($('<option value="'+i+'">'+optionText+'</option>'));
                }
                $.ajax({
                    url: "{{ route('admin.event.select-customer') }}",
                    type: 'GET',
                    success: function(response) {
                        var currentPage = response.current_page;
                        displayBookingCustomers(response.data, currentPage);
                        displayBookingPagination(response);
                        $('.ui-draggable-select_change_customer').show();
                        $('.ui-widget-overlay').css('display', 'block');
                        
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });            
            });
            $(document).delegate('#customer_food_filter', 'change keyup', function () {
                var customer_id = $('#flt_by_id').val();
                var customer_name = $('#flt_by_text').val();
                var customer_type = $('#flt_customer_type').val();
                var formData = $('#customer_food_filter').serialize(); // Changed form ID here

                $.ajax({
                    url: "{{ route('admin.event.select-customer') }}",
                    type: 'GET',
                    data: formData,
                    success: function(response) {
                        var currentPage = response.current_page;
                        displayBookingCustomers(response.data, currentPage);
                        displayBookingPagination(response);
                        $('#flt_by_id').val(customer_id);
                        $('#flt_by_text').val(customer_name);
                        $('#flt_customer_type').val(customer_type); 
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });  
            });
            $('.closethick-select-customer-close').click(function() {
                $('.ui-draggable-select_change_customer').hide();
                $('.ui-widget-overlay').css('display', 'none');
            });
        }); 
        $(document).ready(function () {
            $(document).on('click','.add_booking_customer_food', function () {
                let customerId = $(this).attr('customer_id');
                let contactId = $(this).attr('contact_id');
                let contact_name = $(this).attr('contact_name');
                let customer_name = $(this).attr('customer_name');
                $('#new_booking_lnk_customer').val(customerId);
                $('.customer_full_name').html(customer_name+" / "+contact_name);
                $('#new_booking_lnk_customer_contact').val(contactId);
                $('.add-booking-customer-list').hide(200);
                $('#new_booking').show();
            });
            $('.new_gc_purchase_type span').on('click', function () {
                $(this).siblings('span').removeClass('selected').find('svg').remove();
                if ($(this).attr('value') == 1) {
                    $('.new_payment_main_wrap').show();
                    $('.part_of_ad_campaign').hide();
                    $('#serial_no').val('P5415');
                } else {
                    $('.new_payment_main_wrap').hide();
                    $('.part_of_ad_campaign').show();
                    $('#serial_no').val('C5415');
                }
                $(this).addClass('selected').prepend('<svg class="svg-inline--fa fa-check" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"></path></svg>');
            });
            $('.azbd_single_choice span').on('click', function () {
                if ($(this).attr('value') == 'yes') {
                    $('.mcampaign_wrap').show();
                } else {
                    $('.mcampaign_wrap').hide();
                }
                $(this).siblings('span').removeClass('selected');
                $(this).parent().find('svg').remove();
                $(this).addClass('selected');
                $(this).addClass('selected').prepend('<svg class="svg-inline--fa fa-check" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"></path></svg>');
            });
            $(document).delegate('.add_booking_customer','click', function(){
                var customer_id = $(this).attr("customer_id");
                var cu_contact_id = $(this).attr("cu_contact_id");
                var customer_name = $(this).attr("customer_name");

                $(".customer_row, .contact_row, #customers .h_sep").css("display", "none");
                $(".customer_row[customer_id=\"" + customer_id + "\"]").css("display", "block");
                $(".contact_row[customer_id=\"" + customer_id + "\"]").css("display", "block");
                $("#pagination-links").css("display", "none");

                $("#new_gc_lnk_buyer").val(customer_id);
                $("#new_gc_lnk_buyer_contact").val(cu_contact_id);
                $("#new_gc_title").text("Sell Gift Certificate to " + customer_name); // Add title
                $(".new_gift_cert_form").css("display", "block");
                $('.new_gift_cert_form').show();
            });
            $('#frm_new_booking').validate({
                rules: {
                    'new_booking_guests': {
                        required: true,
                        number: true
                    },
                    'new_booking_table_no':{
                        number: true,
                    },
                    'new_booking_dt_hour': {
                        required: true,
                    },
                    'new_booking_table_no': {
                        number: true,
                    },
                },
                messages: {
                    'new_booking_guests': {
                        required: " Please enter number of guests .",
                        number: "  Please enter number of guests  .",
                    },
                    'new_booking_table_no': {
                        number: "  Please enter number of table no  .",
                    },
                    'new_booking_dt_hour': {
                        required: "Please select Booking time .",
                    },
                    'new_booking_table_no': {
                        number: "  Please enter number of table no  .",
                    },
                }
            });
            $('#frm_rest_reserve_edit').validate({
                rules: {
                    'new_booking_guests': {
                        required: true,
                        number: true
                    },
                    'new_booking_table_no':{
                        number: true,
                    },
                    'new_booking_dt_hour': {
                        required: true,
                    }
                },
                messages: {
                    'new_booking_guests': {
                        required: " Please enter number of guests .",
                        number: "  Please enter number of guests  .",
                    },
                    'new_booking_table_no': {
                        number: "  Please enter number of table no  .",
                    },
                    'new_booking_dt_hour': {
                        required: "Please select Booking time .",
                    }
                }
            });

            $('.closethick-reservation-close').click(function() {
                $('.ui-draggable-edit-reservation').hide();
                $('.ui-resizable-cancel-a-reservation').hide();
                $('.ui-widget-overlay').css('display', 'none');
            });
            $('.closethick-close').click(function () { 
                $('.ui-draggable-sell-new-gift-certificate').hide();
                // $('.ui-draggable-sell-edit-gift-certificate').hide();
                $('.ui-widget-overlay').css('display', 'none');            
            });
            $(document).on('click','.btn_edit_rest_reserve', function () {
                let reserve_id = $(this).attr('edit_reserve_id');
                var start_time = $(this).attr('start_time');
                var end_time = $(this).attr('end_time');
                var start_hours = parseInt(start_time.split(':')[0]);
                var end_hours = parseInt(end_time.split(':')[0]);

                // Populate hour options
                for (var i = start_hours; i <= end_hours; i++) {
                    var hour = i % 12 || 12; 
                    var ampm = i < 12 ? 'AM' : 'PM'; 
                    var optionText = hour + ' ' + ampm;
                    $('.new_booking_dt_hour').append($('<option value="'+i+'">'+optionText+'</option>'));
                }
                $('.ui-draggable-edit-reservation').show();
                $('.ui-widget-overlay').css('display', 'block');
                var url = "{{ route('admin.booking.reserve.edit', ':id') }}";
                url = url.replace(':id', reserve_id);
                $.ajax({
                    url: url,
                    type: 'GET',
                    success: function(data) {
                        let name = data.restReserve.customer.customer_name;
                        $('.customer_full_name').html(name);
                        var reserve_date = moment(data.restReserve.reserve_date_time).format('YYYY-MM-DD');
                        var start_dt_hour = moment(data.restReserve.reserve_date_time).format('H');
                        var start_dt_min = moment(data.restReserve.reserve_date_time).format('mm');
                        $('#frm_rest_reserve_edit input[name="reserve_edit_id"]').val(data.restReserve.id);
                        $('#frm_rest_reserve_edit input[name="rest_hour_id"]').val(data.restReserve.lnk_rest_hour);
                        $('#frm_rest_reserve_edit input[name="new_booking_lnk_customer"]').val(data.restReserve.lnk_customer);
                        $('#frm_rest_reserve_edit input[name="new_booking_lnk_customer_contact"]').val(data.restReserve.lnk_customer_contact);
                        $('#frm_rest_reserve_edit select[name="booking_reserve_type"]').val(data.restReserve.reserve_type);
                        $('#frm_rest_reserve_edit input[name="selecte_currant_date"]').val(reserve_date);
                        $('#frm_rest_reserve_edit select[name="new_booking_dt_hour"]').val(start_dt_hour);
                        $('#frm_rest_reserve_edit select[name="new_booking_dt_min"]').val(start_dt_min);
                        $('#frm_rest_reserve_edit input[name="new_booking_guests"]').val(data.restReserve.no_of_guests);
                        $('#frm_rest_reserve_edit input[name="new_booking_table_no"]').val(data.restReserve.table_no);
                        $('#frm_rest_reserve_edit textarea[name="new_booking_notes"]').val(data.restReserve.reserve_notes);

                    },
                    error: function(error) {
                        console.error('Ajax request failed:', error);
                    }
                });
            });

            $('#frm_new_booking').submit(function (event) { 
                event.preventDefault();
                if ($(this).valid()) {
                    var formData = $('#frm_new_booking').serialize();
                    $.ajax({
                        url: "{{ route('admin.booking.reserve.store') }}",
                        method: 'POST',
                        data: formData,
                        success: function(response) {
                            if (response.success) {
                                location.reload();
                            } else {
                                alert(response.error);
                                location.reload();
                            }
                        },
                        error: function(xhr, status, error) {
                            console.log(error);
                        }
                    });     
                }           
            });
            $('#frm_rest_reserve_edit').submit(function (event) { 
                event.preventDefault();
                if ($(this).valid()) {
                    var formData = $('#frm_rest_reserve_edit').serialize();
                    $.ajax({
                        url: "{{ route('admin.booking.reserve.store') }}",
                        method: 'POST',
                        data: formData,
                        success: function(response) {
                            if (response.success) {
                                location.reload();
                            } else {
                                alert(response.error);
                                location.reload();
                            }
                        },
                        error: function(xhr, status, error) {
                            console.log(error);
                        }
                    });         
                }       
            });
            

            $(document).on('click', '.btn_cancel_rest_reserve', function() {
                var id = $(this).attr('reseve_delete_id');
                $('.ui-resizable-cancel-a-reservation').show();
                $('.ui-widget-overlay').css('display', 'block');
                // if (confirm("Are you sure you want to remove this Supplier?") == true) {
                //     var url = "{{ route('admin.supplier.destroy', ':id') }}";
                //     url = url.replace(':id', id);
                //     $.ajax({
                //         url: url,
                //         type: 'DELETE',
                //         data: {_token:"{{csrf_token()}}"},
                //         success: function(response) {
                //             if (response.success) {
                //                 alert(response.message);
                //                 window.location.href = "{{ route('admin.supplier.index') }}";
                //             } else {
                //                 alert(response.message);
                //             }
                //         }
                //     });

                // }
            });
            $("#show_cc").click(function () {
              $("#cc_wrap").toggle();

              return false;
            });
            $(".one_cc_email").click(function () {
              var cur_cc = $.trim($("#cc_email_addr").val());
              var new_cc = $.trim($(this).text());
              if (cur_cc.indexOf(new_cc) != -1)
                return;

              if (cur_cc != "") cur_cc += ", ";
                cur_cc += new_cc;
              $("#cc_email_addr").val(cur_cc);
            });

            $(document).on('input', '#customer_form', function() {
                var first_name = $('.first_name').val();
                var last_name = $('.last_name').val();
                var email = $('.main_email').val();
                var phone_cell = $('.phone cell').val();
                if((first_name && last_name) || email || phone_cell){
                    $.ajax({
                        url: "{{ route('admin.create-customer-search') }}",
                        type: 'GET',
                        data: { first_name: first_name, last_name: last_name, email: email, phone_cell: phone_cell}, 
                        success: function(customerData) {
                            $('.new_customer_dups').empty(html);
                            if(customerData.length > 0){
                                var html = '';
                                html += '<span class="btn_close_cust_dups btn">' +
                                        '<svg class="svg-inline--fa fa-circle-xmark" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="circle-xmark" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">'+
                                        '<path fill="currentColor" d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM175 175c9.4-9.4 24.6-9.4 33.9 0l47 47 47-47c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-47 47 47 47c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-47-47-47 47c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l47-47-47-47c-9.4-9.4-9.4-24.6 0-33.9z"></path>'+
                                        '</svg><!-- <i class="fa-solid fa-circle-xmark"></i> Font Awesome fontawesome.com -->'+
                                        '</span>'+
                                        '<h2>Please Consider the Following Existing Customers</h2>'+
                                        '<br>'+
                                        '<p class="found_dup_row header"><span></span> <span>Id</span><span>Name</span><span>Email</span><span>Phone</span><span>Cell</span><span></span></p>'
                                $.each(customerData, function(index, value) {
                                    // Generating HTML dynamically
                                    html += '<p class="found_dup_row actual_body" customer_id="' + value.lnk_customer + '" contact_id="'+value.id+'" customer_name="'+ value.customer_name +'">';
                                    html += '<span><strong>' + (index + 1) + ') </strong></span>';
                                    html += '<span>' + value.lnk_customer+ '</span>';
                                    html += '<span>' + value.last_name +','+ value.first_name + '</span>';
                                    html += '<span>' + value.main_email + '</span>';
                                    html += '<span>' + (value.phone ? value.phone : '') + '</span>';
                                    html += '<span>' + value.cell_phone + '</span>';
                                    html += '<span><span class="small_button btn_this_is_it">This is it!</span></span>';
                                    html += '</p>';
                                });
                                $('.new_customer_dups').append(html);
                                $('.new_customer_dups').removeClass('d-none')
                            }
                        },
                        error: function(error) {
                            console.error('Ajax request failed:', error);
                        }
                    });
                }
            });

            $(document).on('click', '.btn_this_is_it', function() {
                var customer_id = $(this).closest('.actual_body').attr('customer_id');
                var contact_id = $(this).closest('.actual_body').attr('contact_id');
                var customer_name = $(this).closest('.actual_body').attr('customer_name');
                $('#new_gc_title').html('New Booking for / '+customer_name)
                $('#new_gc_lnk_buyer').val(customer_id);
                $('#new_gc_lnk_buyer_contact').val(contact_id);
                $('.new_customer_wrap').addClass('d-none')
                $('.new_gift_cert_form ').removeClass('d-none');
            });

            $(document).on('click', '.btn_close_cust_dups', function() {
                $('.new_customer_dups').addClass('d-none')
            });

            var btnValue = "{{ session('btn1') }}";
            if (btnValue === 'btn1') {
                var customer_name = "{{ session('customer_name') }}";
                var customer_id = "{{ session('customer_id') }}";
                var contact_id = "{{ session('contact_id') }}";
                $('#new_gc_title').html('New Booking for / '+customer_name)
                $('#new_gc_lnk_buyer').val(customer_id);
                $('#new_gc_lnk_buyer_contact').val(contact_id);
                $('.new_customer_wrap').addClass('d-none')
                $('.new_gift_cert_form ').removeClass('d-none');
                $('.ui-widget-overlay').removeClass('d-none');
                $('.ui-draggable-sell-new-gift-certificate').removeClass('d-none');
                "{{ session(['btn1' => '']) }}"
            }
        });
    </script>
@endsection
