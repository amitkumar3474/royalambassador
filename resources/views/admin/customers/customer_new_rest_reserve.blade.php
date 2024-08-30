@extends('admin.layouts.master')
@section('title', 'Reserve a Table at The Consulate')
@section('style')
    <style>
        .title_bar h1 {
            font-size: 1.6em;
        }
        .title_bar h2 {
            color: #373232;
        }
        .calendar {
        border-collapse: collapse;
        border: 1px solid #E5D07B;
        width: 100%;
        margin-bottom: 20px; 
    }
    .calendar th {
        border: none;
        text-align: center;
        background-color: #E5D07B;
    }
    .calendar_date {
        background: #E5D07B;
        font-weight: bold;
        padding-left: 3px;
        text-align: left;
        width: 100%;
    }
    .calendar td {
        vertical-align: top;
        border: 1px solid #C5B469;
        width: 210px;
        text-align: center;
        height: 160px;
    }
    .open_hour {
        margin: .5em .2em;
        padding-bottom: .6em;
        width: 98%;
        text-align: left;
    }
    .add_sch_item {
        margin: 0 0 6px 0;
        line-height: 120%;
        padding: 2px;
    }

    .weekly_scheduletable {
        display: inline-block;
        width: 55%;
        vertical-align: top;
        margin: 1em;

    }
    .cur_booking {
        text-align: left;
        margin: .5em;
        border: 2px solid #0C8484;
    }
    .cur_booking h3 {
        background: #0C8484;
        padding: .3em;
        color: #FFF;
        margin-bottom: 2px;
    }
    .cur_booking h3 .btn {
        color: #CCC;
        font-size: 16px;
    }
    .svg-inline--fa{
        width: 15px;
    }
    .rest_span {
        font-size: 12px;
        font-family: "Verdana", "Georgia";
        color: #3A3A3A;
    }
    </style>
@endsection
@section('content')
@php
$customerId = $_GET['customer_id'] ?? '';
$requestDate = $_GET['current_date'] ?? date('Y-m-d H:i:s');
$currentDate = date('Y-m-d H:i:s', strtotime($requestDate)); 
@endphp
<div class="card title_bar">
    <h1>Reserve a Table at The Consulate for {{$customer->customer_name}}</h1>
    <br>
    <h3>Please click on the add <svg style="width: 15px" class="svg-inline--fa fa-circle-plus" aria-hidden="true" focusable="false"
            data-prefix="fas" data-icon="circle-plus" role="img" xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 512 512" data-fa-i2svg="">
            <path fill="currentColor"
                d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM232 344V280H168c-13.3 0-24-10.7-24-24s10.7-24 24-24h64V168c0-13.3 10.7-24 24-24s24 10.7 24 24v64h64c13.3 0 24 10.7 24 24s-10.7 24-24 24H280v64c0 13.3-10.7 24-24 24s-24-10.7-24-24z">
            </path>
        </svg><!-- <i class="fas fa-plus-circle"></i> Font Awesome fontawesome.com -->
        symbol to reserve the table.</h3>
    <br>
    <h2>Showing Month of {{ date('F Y',strtotime($currentDate))}} - Go to:
        <select name="rest_calendar_calendar_navigator_jump" id="rest_calendar_calendar_navigator_jump">
            @php
                $currentYear = date('Y',strtotime($currentDate));
                $startYear = $currentYear - 1;
                $endYear = $currentYear + 2;
                $currentMonthShow = date('n',strtotime($currentDate));

                for ($year = $startYear; $year <= $endYear; $year++) {
                    echo '<optgroup label="' . $year . '">';
                    for ($month = 1; $month <= 12; $month++) {
                        $monthString = $month < 10 ? '0' . $month : '' . $month; 
                        $selected = $year == $currentYear && $month == $currentMonthShow ? 'selected="selected"' : ''; 
                        echo '<option value="' . $year . '-' . $monthString . '" ' . $selected . '>' . date('F', mktime(0, 0, 0, $month, 1)) . '</option>';
                    }
                    echo '</optgroup>';
                }
            @endphp
        </select>
    </h2>
</div>
<div id="cal_nav_wrap" style="text-align: center;">
    <a href="{{ route('admin.customer.new-restaurant-reserve', ['customer_id' => $customerId,'current_date' => date('Y-m', strtotime('- 1 months', strtotime($currentDate)))]) }}"><span class="btn_goto_month btn_nav" year="{{ date('Y',strtotime('- 1 months', strtotime($currentDate)))}}" month="{{ date('n',strtotime('- 1 months', strtotime($currentDate)))}}">
        <svg style="width: 10px" class="svg-inline--fa fa-angle-left" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="angle-left" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg="">
        <path fill="currentColor" d="M41.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.3 256 246.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"></path>
        </svg><!-- <i class="fas fa-angle-left"></i> Font Awesome fontawesome.com --> {{ date('F',strtotime('- 1 months', strtotime($currentDate)))}}</span>
    </a>
    <span class="btn_show_cur_month btn_nav">
        <svg style="width: 10px" class="svg-inline--fa fa-calendar-days" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="calendar-days" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
            <path fill="currentColor" d="M128 0c17.7 0 32 14.3 32 32V64H288V32c0-17.7 14.3-32 32-32s32 14.3 32 32V64h48c26.5 0 48 21.5 48 48v48H0V112C0 85.5 21.5 64 48 64H96V32c0-17.7 14.3-32 32-32zM0 192H448V464c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V192zm64 80v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H80c-8.8 0-16 7.2-16 16zm128 0v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H208c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H336zM64 400v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H80c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H208zm112 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H336c-8.8 0-16 7.2-16 16z"></path>
        </svg><!-- <i class="fas fa-calendar-alt"></i> Font Awesome fontawesome.com --> {{ date('F Y',strtotime($currentDate))}}
    </span>
    {{-- {{ date('F Y',strtotime($currentDate))}} --}}
    {{-- {{ route('admin.room.availability.calendar', ['current_date' => date('Y-m-d', strtotime('+ 1 months', strtotime($currentDate)))]) }} --}}
    <a href="{{ route('admin.customer.new-restaurant-reserve', ['customer_id' => $customerId,'current_date' => date('Y-m', strtotime('+ 1 months', strtotime($currentDate)))]) }}"><span class="btn_goto_month btn_nav" year="{{ date('Y',strtotime('+ 1 months', strtotime($currentDate)))}}" month="{{ date('n',strtotime('+ 1 months', strtotime($currentDate)))}}">{{ date('F',strtotime('+ 1 months', strtotime($currentDate)))}} <svg style="width: 10px" class="svg-inline--fa fa-angle-right" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="angle-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg="">
        <path fill="currentColor" d="M278.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-160 160c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L210.7 256 73.4 118.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l160 160z"></path>
        </svg><!-- <i class="fas fa-angle-right"></i> Font Awesome fontawesome.com --></span>
    </a>
</div>
<br>
<div id="cal_wrap">
    @php
        $selectMonth =  date('m',strtotime($currentDate));
        
        // Get current month and year
        $month = date('n',strtotime($currentDate))??date('n');
        $year = date('Y',strtotime($currentDate))??date('Y');
        $currentMonth = date('m');
        $Date = date('Y-m-d');
        $currantDay = date('d',strtotime($Date));
        // Get the number of days in the current month
        $days_in_month = cal_days_in_month(CAL_GREGORIAN, $month, $year);

        // Get the first day of the month
        $first_day_of_month = mktime(0, 0, 0, $month, 1, $year);

        // Get the name of the first day of the month (e.g., "Monday", "Tuesday", etc.)
        $first_day_name = date('l', $first_day_of_month);

        // Create an array of day names
        $day_names = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];

        // Determine the index of the first day of the month in the $day_names array
        $first_day_index = array_search($first_day_name, $day_names);    
    @endphp
    <table class="calendar">
        <tr>
            <th>SUN.</th>
            <th>MON.</th>
            <th>TUE.</th>
            <th>WED.</th>
            <th>THU.</th>
            <th>FRI.</th>
            <th>SAT.</th>
        </tr>
        <tr>
            @for ($i = 0; $i < $first_day_index; $i++)
                <td></td>
            @endfor

            @for ($day = 1; $day <= $days_in_month; $day++)
                @if (($day + $first_day_index - 1) % 7 == 0)
                    </tr><tr>
                @endif
                <td>
                    <div class="calendar_date" >{{ $day }}</div>
                    <div class="open_hour">
                        @foreach ($restHours as $restHour)
                            @if (date('d', strtotime($restHour->start_dt)) == $day)
                            <div class="cur_booking">
                                <h3>
                                    @if($restHour->open_for == 1)
                                        {{ 'LUNCH' }}
                                    @elseif($restHour->open_for == 2)
                                        {{'DINNER'}}
                                    @elseif($restHour->open_for == 3)
                                        {{'Special Events Only'}}
                                    @elseif($restHour->open_for == 4)
                                        {{'CLOSED'}}
                                    @endif
                                    {{date('h:i a',strtotime($restHour->start_dt)) }} to {{date('h:i a',strtotime($restHour->end_dt)) }}
                                    @if ((($currantDay <= $day && $currentMonth <= $selectMonth) || $currentMonth < $selectMonth))
                                    <a href="javascript:void(0)" class="rest_reserve_new" rest_hour_id="{{$restHour->id}}" rest_open_for="{{$restHour->open_for}}" 
                                        selecte_currant_date="{{ $year }}-{{ $selectMonth }}-{{ str_pad($day, 2, '0', STR_PAD_LEFT) }}"
                                        start_time="{{date('H:i',strtotime($restHour->start_dt)) }}" end_time="{{date('H:i',strtotime($restHour->end_dt)) }}">
                                        <span class="btn">
                                            <svg class="svg-inline--fa fa-circle-plus" aria-hidden="true" focusable="false"
                                                data-prefix="fas" data-icon="circle-plus" role="img" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 512 512" data-fa-i2svg="">
                                                <path fill="currentColor"
                                                    d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM232 344V280H168c-13.3 0-24-10.7-24-24s10.7-24 24-24h64V168c0-13.3 10.7-24 24-24s24 10.7 24 24v64h64c13.3 0 24 10.7 24 24s-10.7 24-24 24H280v64c0 13.3-10.7 24-24 24s-24-10.7-24-24z">
                                                </path>
                                            </svg><!-- <i class="fas fa-plus-circle"></i> Font Awesome fontawesome.com -->
                                        </span>
                                    </a>
                                    @endif
                                </h3>
                                @if ($restHour->restaurantReserve->count() > 0)
                                    @foreach ($restHour->restaurantReserve as $restaurantReserve)
                                    <p>
                                        <strong><a href="{{ route('admin.customer.show',$restaurantReserve->lnk_customer) }}">{{ $restaurantReserve->customerContact->full_name }}</a></strong> 
                                        ({{date('h:i a',strtotime($restaurantReserve->reserve_date_time))}})<br>Guests: {{ $restaurantReserve->no_of_guests }}
                                        @if (isset($restaurantReserve->reserve_notes))
                                        <span class="q_tip" title="{{ $restaurantReserve->reserve_notes }}">
                                        <svg class="svg-inline--fa fa-circle-info" aria-hidden="true" focusable="false" data-prefix="fas"
                                            data-icon="circle-info" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                            data-fa-i2svg="">
                                            <path fill="currentColor"
                                                d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z">
                                            </path>
                                        </svg><!-- <i class="fas fa-info-circle"></i> Font Awesome fontawesome.com --></span>
                                        @endif
                                        <span class="q_tip btn" title="Menu tasting for event 22862">
                                            <svg class="svg-inline--fa fa-face-grin-tongue" aria-hidden="true" focusable="false" data-prefix="far" data-icon="face-grin-tongue" role="img"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                            <path fill="currentColor"
                                                d="M464 256c0-114.9-93.1-208-208-208S48 141.1 48 256c0 81.7 47.1 152.4 115.7 186.4c-2.4-8.4-3.7-17.3-3.7-26.4V363.6c-8.9-8-16.7-17.1-23.1-27.1c-10.4-16.1 6.8-32.5 25.5-28.1c28.9 6.8 60.5 10.5 93.6 10.5s64.7-3.7 93.6-10.5c18.7-4.4 35.9 12 25.5 28.1c-6.4 9.9-14.2 19-23 27V416c0 9.2-1.3 18-3.7 26.4C416.9 408.4 464 337.7 464 256zM0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256zm176.4-80a32 32 0 1 1 0 64 32 32 0 1 1 0-64zm128 32a32 32 0 1 1 64 0 32 32 0 1 1 -64 0zM320 416V378.6c0-14.7-11.9-26.6-26.6-26.6h-2c-11.3 0-21.1 7.9-23.6 18.9c-2.8 12.6-20.8 12.6-23.6 0c-2.5-11.1-12.3-18.9-23.6-18.9h-2c-14.7 0-26.6 11.9-26.6 26.6V416c0 35.3 28.7 64 64 64s64-28.7 64-64z">
                                            </path>
                                        </svg><!-- <i class="far fa-grin-tongue"></i> Font Awesome fontawesome.com -->
                                        </span>
                                    </p>
                                    @endforeach
                                @endif
                                <h3>Total Guests: {{ $restHour->restaurantReserve->sum('no_of_guests')??0 }}</h3>
                            </div>
                            @endif
                        @endforeach
                    </div>
                </td>
            @endfor

            @for ($i = 0; ($i + $first_day_index + $days_in_month) % 7 != 0; $i++)
                <td></td>
            @endfor
        </tr>
    </table>
</div>
<div class="ui-widget-overlay ui-front d-none"></div>
{{-- popup contents --}}
<div class="ui-dialog ui-widget1 ui-widget-content ui-corner-all ui-front ui-draggable ui-resizable ajax_obj create-popup-form ui-draggable-new-restaurant d-none" tabindex="-1" style="top: 435px" role="dialog" aria-describedby="ajax_obj" aria-labelledby="ui-id-15">
    <div class="ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix">
        <span id="ui-id-15" class="ui-dialog-title">New Restaurant Reservation</span>
        <button class="ui-button ui-widget1 ui-state-default ui-corner-all ui-button-icon-only ui-dialog-titlebar-close" role="button" aria-disabled="false" title="close">
            <span class="ui-button-icon-primary ui-icon ui-icon-closethick closethick-restaurant"></span>
            <span class="ui-button-text">close</span>
        </button>
    </div>
    <div id="ajax_obj" class="ui-dialog-content ui-widget-content create-form-content">
        <span id="new_booking" class="xmlb_form">
            <form action="#" id="frm_new_booking" method="POST">
                @csrf
                <input type="hidden" id="rest_hour_id" name="rest_hour_id" value="">
                <input type="hidden" name="selecte_currant_date" id="selecte_currant_date" value="">
                <input type="hidden" name="new_booking_lnk_customer" value="{{$customerId??''}}">
                <h2>
                    <span class="rest_span">Book Customer:</span> {{$customer->customer_name??''}}<br><br>
                    <span class="rest_span">For:</span> <span class="food_type"></span> <span class="rest_span">on</span> <span class="select_date_show"></span>
                </h2>
                <br>
                <div class="row">
                    <div class="col-4 mb-10">
                        <label class="align-right d-block">Type:</label>
                    </div>
                    <input type="hidden" class="new_booking_reserve_type" name="booking_reserve_type" value="">
                    <div class="col-8 mb-10 pl-0">
                        <select class="new_booking_reserve_type" name="booking_reserve_type" disabled="">
                            <option value="1" selected="selected">LUNCH</option>
                            <option value="2">DINNER</option>
                            <option value="3">Special Events Only</option>
                            <option value="4">CLOSED</option>
                        </select>
                    </div>
                    <div class="col-4 mb-10">
                        <label class="align-right d-block">Reserve For:</label>
                    </div>
                    <div class="col-8 mb-10 pl-0">
                        <select id="new_booking_lnk_customer_contact" name="new_booking_lnk_customer_contact">
                            <option value="" selected="selected">----</option>
                            @foreach ($customer->contacts as $contact)     
                                <option value="{{$contact->id}}">{{$contact->full_name}}</option>
                            @endforeach
                        </select>
                        <span class="mand_sign">*</span>
                    </div>
                    <div class="col-4 mb-10">
                        <label class="align-right d-block">Date & Time:</label>
                    </div>
                    <div class="col-8 mb-10 pl-0">
                        <select name="new_booking_dt_hour" id="new_booking_dt_hour">
                        
                        </select>:
                        <select name="new_booking_dt_min" id="new_booking_dt_min">
                            <option value="00" selected="selected">00</option>
                            <option value="15">15</option>
                            <option value="30">30</option>
                            <option value="45">45</option>
                        </select>
                        <span class="mand_sign">*</span>
                    </div>
                    <div class="col-4 mb-10">
                        <label class="align-right d-block">No of Guests:</label>
                    </div>
                    <div class="col-8 mb-10 pl-0">
                        <input id="new_booking_no_of_guests" name="new_booking_guests" type="text" maxlength="3" size="2" title="No of guests to reserve">
                        <span class="mand_sign">*</span>
                    </div>
                    <div class="col-4 mb-10">
                        <label class="align-right d-block">Notes:</label>
                    </div>
                    <div class="col-8 mb-10 pl-0">
                        <textarea id="new_booking_reserve_notes" name="new_booking_notes" cols="40" rows="6" title="Special notes if any" maxlength="1000"></textarea>
                    </div>
                </div>
                <div class="line_break"></div>
                <button type="submit" class="button font-bold radius-0 add_reservation">Add Reservation</button>
            </form>
        </span>
    </div>
</div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function () {
            
            $('#rest_calendar_calendar_navigator_jump').change(function () { 
                // e.preventDefault();
                console.log($(this).val());
                var selectDate = $(this).val();
                var url = "{{ route('admin.customer.new-restaurant-reserve') }}";
                url += '?customer_id=<?= $customerId ?>';
                url += '&current_date=' + selectDate;
                window.location.href = url;
            });

            $('.closethick-restaurant').click(function () { 
                $('.ui-draggable-new-restaurant').hide();
                $('.ui-widget-overlay').css('display', 'none');            
            });

            $('.rest_reserve_new').click(function () { 
                var rest_hour_id = $(this).attr('rest_hour_id');
                var rest_open_for = $(this).attr('rest_open_for');
                var selecte_currant_date = $(this).attr('selecte_currant_date');
                var parsedDate = moment(selecte_currant_date);
                var formattedDate = parsedDate.format('dddd MMMM DD, YYYY');
                $('.select_date_show').text(formattedDate);
                $('#selecte_currant_date').val(selecte_currant_date);
                $('#rest_hour_id').val(rest_hour_id);
                $('.new_booking_reserve_type').val(rest_open_for);
                if (rest_open_for == 1) {
                    $('.food_type').text('LUNCH');
                } else if(rest_open_for == 2) {
                    $('.food_type').text('DINNER');
                } else if(rest_open_for == 3) {
                    $('.food_type').text('Special Events Only');
                } else if(rest_open_for == 4) {
                    $('.food_type').text('CLOSED');
                }
                var start_time = $(this).attr('start_time');
                var end_time = $(this).attr('end_time');
                var start_hours = parseInt(start_time.split(':')[0]);
                var end_hours = parseInt(end_time.split(':')[0]);

                // Populate hour options
                for (var i = start_hours; i <= end_hours; i++) {
                    var hour = i % 12 || 12; 
                    var ampm = i < 12 ? 'AM' : 'PM'; 
                    var optionText = hour + ' ' + ampm;
                    $('#new_booking_dt_hour').append($('<option value="'+i+'">'+optionText+'</option>'));
                }
                
                $('.ui-draggable-new-restaurant').show();
                $('.ui-widget-overlay').css('display', 'block');
                
            });
            $("#frm_new_booking").validate({
                rules: {
                    'new_booking_lnk_customer_contact': 'required',
                    'new_booking_dt_hour': 'required',
                    'new_booking_guests': 'required',
                },
                messages: {
                    'new_booking_lnk_customer_contact': 'Please select Contact',
                    'new_booking_dt_hour': 'Please select Time',
                    'new_booking_guests': 'Please enter No Of Guests or No Of Guests too short. It has to be 1 characters.',
                }
            });
            $('#frm_new_booking').submit(function (event) { 
                if ($(this).valid()) {
                    event.preventDefault();
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
        });
    </script>
@endsection