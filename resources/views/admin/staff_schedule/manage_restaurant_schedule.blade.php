@extends('admin.layouts.master')
@section('title', 'Manage Restaurant Schedule')
@section('style')   
<style>
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
        border-bottom: 1px solid #999;
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

</style>
@endsection
@section('content')
<div class="card title_bar">
    <h1>Manage Restaurant</h1>
</div>
<div class="line_break"></div>
<div id="event_tabs" class="tab_content ui-tabs ui-widget ui-widget-content ui-corner-all">
    <ul class="ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all" role="tablist">
        <li class="ui-state-default ui-corner-top ui-tabs-active ui-state-active" role="tab">
            <a href="#" class="ui-tabs-anchor" role="presentation" tabindex="-1" id="ui-id-1">Schedule</a>
        </li>
        <li class="ui-state-default ui-corner-top" role="tab">
            <a href="#" class="ui-tabs-anchor" onclick="window.location.href='{{ route('admin.restaurant.daily.sale') }}'" role="presentation" tabindex="-2" id="ui-id-2">Daily Sales </a>
        </li>
    </ul>
    <div id="event_tabs-1" aria-labelledby="ui-id-1" class="ui-tabs-panel ui-widget-content ui-corner-bottom"  role="tabpanel" aria-expanded="false" aria-hidden="true">
        <span id="customer_tasks" class="xmlb_form">
            @php
                $requestDate = $_GET['current_date'] ?? date('Y-m-d H:i:s');
                $currentDate = date('Y-m-d H:i:s', strtotime($requestDate)); 
            @endphp
            <div id="cal_nav_wrap">
                <div class="cur_month_info"><h2>The Consulate Hours of Operation ({{ date('F Y',strtotime($currentDate))}})</h2></div>
                <a href="{{ route('admin.schedule.restaurant', ['current_date' => date('Y-m-d', strtotime('- 1 months', strtotime($currentDate)))]) }}"><span class="btn_goto_month btn_nav" year="{{ date('Y',strtotime('- 1 months', strtotime($currentDate)))}}" month="{{ date('n',strtotime('- 1 months', strtotime($currentDate)))}}">
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
                <a href="{{ route('admin.schedule.restaurant', ['current_date' => date('Y-m-d', strtotime('+ 1 months', strtotime($currentDate)))]) }}"><span class="btn_goto_month btn_nav" year="{{ date('Y',strtotime('+ 1 months', strtotime($currentDate)))}}" month="{{ date('n',strtotime('+ 1 months', strtotime($currentDate)))}}">{{ date('F',strtotime('+ 1 months', strtotime($currentDate)))}} <svg style="width: 10px" class="svg-inline--fa fa-angle-right" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="angle-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg="">
                    <path fill="currentColor" d="M278.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-160 160c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L210.7 256 73.4 118.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l160 160z"></path>
                    </svg><!-- <i class="fas fa-angle-right"></i> Font Awesome fontawesome.com --></span>
                </a>
                &nbsp; <button class="btn_recreate_schedule small_button button font-bold radius-0">Recreate from Schedule</button>
            </div>
            <br>
            <div id="cal_wrap">
                @php
                    $selectMonth =  date('Y-m-d',strtotime($currentDate));
                    
                    // Get current month and year
                    $month = date('n',strtotime($currentDate))??date('n');
                    $year = date('Y',strtotime($currentDate))??date('Y');
                    $currantDay = date('d',strtotime($currentDate))??date('d');
                    $currentMonth = date('Y-m-d');

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
                                <div class="sch_items">
                                    @if (count($hourOperations) > 0) 
                                        @foreach ($hourOperations as $_hourOperation)
                                            @if (date('d', strtotime($_hourOperation->start_dt)) == $day)
                                                <div class="sch_item sch_work">
                                                    @if($_hourOperation->open_for == 1)
                                                        {{ 'LUNCH' }}
                                                    @elseif($_hourOperation->open_for == 2)
                                                        {{'DINNER'}}
                                                    @elseif($_hourOperation->open_for == 3)
                                                        {{'Special Events Only'}}
                                                    @elseif($_hourOperation->open_for == 4)
                                                        {{'CLOSED'}}
                                                    @endif
                                                    {{date('h:i a',strtotime($_hourOperation->start_dt)) }} to {{date('h:i a',strtotime($_hourOperation->end_dt)) }}
                                                    @if ((($currantDay <= $day && $currentMonth <= $selectMonth) || $currentMonth < $selectMonth))
                                                        <button type="button" class="button font-bold radius-0 edit_hour_of_operation" data-hour-id="{{$_hourOperation->id}}" data-full-date="{{ date('Y-m-d', strtotime('$year-$month-$day')) }}">Edit</button> 
                                                        <button type="button" class="btn_sch_item_delete button font-bold radius-5 btn_delete_hour_of_operation" data-hour-id="{{$_hourOperation->id}}">x</button>
                                                    @endif
                                                </div>
                                                <hr>
                                            @endif
                                        @endforeach
                                    @endif
                                </div>
                                <br>
                                @if ((($currantDay <= $day && $currentMonth <= $selectMonth) || $currentMonth < $selectMonth))
                                    <span class="special_action add_sch_item" comment="The + to add schedule">
                                        <button type="button" class="button font-bold radius-6 add_hour_of_operation">+</button> 
                                    </span>
                                @endif
                            </td>
                        @endfor

                        @for ($i = 0; ($i + $first_day_index + $days_in_month) % 7 != 0; $i++)
                            <td></td>
                        @endfor
                    </tr>
                </table>
            </div>
        </span>
        
        <span id="rest_weekly_schedule_internal" class="xmlb_form weekly_scheduletable">
            <h2>Master Weekly Schedule
                <button type="button" class="add_new_schedule_for_restaurant button font-bold radius-6">+</button>            
            <span class="btn_apply_to_future small_button">Apply Schedule May 2024 and After</span>
            </h2>

            <table class="product-list table mt-20">
                <tbody>
                    <tr>
                        <th><a href="#">Day Of Week</a></th>
                        <th><a href="#">From Time</a> </th>
                        <th><a href="#">To Time</a> </th>
                        <th><a href="#">Open For</a></th>
                        <th><a href="#" >Max Reservations</a> </th>
                        <th><a href="#">Max Adults</a> </th>
                        <th></th>
                    </tr>
                    @foreach($weeklySchedules as $_weeklySchedule)
                        <tr class="actual_body">
                            <td>
                                @if($_weeklySchedule->day_of_week == 1)
                                    {{ 'Monday' }}
                                @elseif($_weeklySchedule->day_of_week == 2)
                                    {{ 'Tuesday' }}
                                @elseif($_weeklySchedule->day_of_week == 3)
                                    {{ 'Wednesday' }}
                                @elseif($_weeklySchedule->day_of_week == 4)
                                    {{ 'Thursday' }}
                                @elseif($_weeklySchedule->day_of_week == 5)
                                    {{ 'Friday' }}
                                @elseif($_weeklySchedule->day_of_week == 6)
                                    {{ 'Saturday' }}
                                @elseif($_weeklySchedule->day_of_week == 7)
                                    {{ 'Sunday' }}
                                @endif
                            </td>
                            <td>{{date('g:i a', strtotime($_weeklySchedule->from_time))}}</td>
                            <td>{{date('g:i a', strtotime($_weeklySchedule->to_time))}}</td>
                            <td>
                            @if($_weeklySchedule->open_for == 1)
                                    {{ 'LUNCH' }}
                                @elseif($_weeklySchedule->open_for == 2)
                                    {{ 'DINNER' }}
                                @elseif($_weeklySchedule->open_for == 3)
                                    {{ 'Special Events Only' }}
                                @elseif($_weeklySchedule->open_for == 4)
                                    {{ 'CLOSED' }}
                                @endif
                            </td>
                            <td>{{ $_weeklySchedule->max_reservations }}</td>
                            <td>{{ $_weeklySchedule->max_adults }}</td>
                            <td class="actions">
                                <button type="button" class="button font-bold radius-0 edit_weekly_schedule" data-weekly-schedule-id="{{ $_weeklySchedule->id }}">Edit</button>
                                <button type="button" class="button font-bold radius-0 delete_weekly_schedule" data-weekly-schedule-id="{{ $_weeklySchedule->id }}">delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>  
        </span>

        <span id="rest_weekly_schedule_internal" class="xmlb_form weekly_scheduletable">
            <h2>Weekly Schedule for Consulate Web Site
                <button type="button" class="add_new_schedule_for_web_site button font-bold radius-6" sch_venue='R' form_hading="New Schedule for Public Site (Restaurant)">+</button>
            </h2>

            <table class="product-list table mt-20">
                <tbody>
                    <tr>
                        <th><a href="#">Day</a></th>
                        <th><a href="#">Open For</a></th>
                        <th><a href="#" >Timing</a> </th>
                        <th></th>
                    </tr>
                    @foreach($weeklySchedulesWebSite as $_weeklySchedule)
                        <tr class="actual_body">
                            <td>
                                @if($_weeklySchedule->day_of_week == 1)
                                    {{ 'Monday' }}
                                @elseif($_weeklySchedule->day_of_week == 2)
                                    {{ 'Tuesday' }}
                                @elseif($_weeklySchedule->day_of_week == 3)
                                    {{ 'Wednesday' }}
                                @elseif($_weeklySchedule->day_of_week == 4)
                                    {{ 'Thursday' }}
                                @elseif($_weeklySchedule->day_of_week == 5)
                                    {{ 'Friday' }}
                                @elseif($_weeklySchedule->day_of_week == 6)
                                    {{ 'Saturday' }}
                                @elseif($_weeklySchedule->day_of_week == 7)
                                    {{ 'Sunday' }}
                                @endif
                            </td>
                            <td>
                            @if($_weeklySchedule->open_for == 1)
                                    {{ 'LUNCH' }}
                                @elseif($_weeklySchedule->open_for == 2)
                                    {{ 'DINNER' }}
                                @elseif($_weeklySchedule->open_for == 3)
                                    {{ 'Special Events Only' }}
                                @elseif($_weeklySchedule->open_for == 4)
                                    {{ 'CLOSED' }}
                                @endif
                            </td>
                            <td>
                                {{date('g:i a', strtotime($_weeklySchedule->from_time))}} to {{date('g:i a', strtotime($_weeklySchedule->to_time))}}
                            </td>
                            <td class="actions">
                                <button type="button" class="button font-bold radius-0 edit_weekly_schedule" data-weekly-schedule-id="{{ $_weeklySchedule->id }}">Edit</button>
                                <button type="button" id="button2" class="button font-bold radius-0 delete_weekly_schedule" data-weekly-schedule-id="{{ $_weeklySchedule->id }}">delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>  
        </span>

        <span id="rest_weekly_schedule_internal" class="xmlb_form weekly_scheduletable">
            <h2>Weekly Schedule for Banquet Side
                <button type="button" class="add_new_schedule_for_banquet_side button font-bold radius-6" sch_venue='B' form_hading="New Schedule for Public Site (Banquet)">+</button>
            </h2>

            <table class="product-list table mt-20">
                <tbody>
                    <tr>
                        <th><a href="#">Day</a></th>
                        <th><a href="#">Open For</a></th>
                        <th><a href="#" >Timing</a> </th>
                        <th></th>
                    </tr>
                    @foreach($weeklySchedulesBanquetSide as $_weeklySchedule)
                        <tr class="actual_body">
                            <td>
                                @if($_weeklySchedule->day_of_week == 1)
                                    {{ 'Monday' }}
                                @elseif($_weeklySchedule->day_of_week == 2)
                                    {{ 'Tuesday' }}
                                @elseif($_weeklySchedule->day_of_week == 3)
                                    {{ 'Wednesday' }}
                                @elseif($_weeklySchedule->day_of_week == 4)
                                    {{ 'Thursday' }}
                                @elseif($_weeklySchedule->day_of_week == 5)
                                    {{ 'Friday' }}
                                @elseif($_weeklySchedule->day_of_week == 6)
                                    {{ 'Saturday' }}
                                @elseif($_weeklySchedule->day_of_week == 7)
                                    {{ 'Sunday' }}
                                @endif
                            </td>
                            <td>
                            @if($_weeklySchedule->open_for == 1)
                                    {{ 'LUNCH' }}
                                @elseif($_weeklySchedule->open_for == 2)
                                    {{ 'DINNER' }}
                                @elseif($_weeklySchedule->open_for == 3)
                                    {{ 'Special Events Only' }}
                                @elseif($_weeklySchedule->open_for == 4)
                                    {{ 'CLOSED' }}
                                @endif
                            </td>
                            <td>
                                {{date('g:i a', strtotime($_weeklySchedule->from_time))}} to {{date('g:i a', strtotime($_weeklySchedule->to_time))}}
                            </td>
                            <td class="actions">
                                <button type="button" class="button font-bold radius-0 edit_weekly_schedule" data-weekly-schedule-id="{{ $_weeklySchedule->id }}">Edit</button>
                                <button type="button" id="button2" class="button font-bold radius-0 delete_weekly_schedule" data-weekly-schedule-id="{{ $_weeklySchedule->id }}">delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>  
        </span>
    </div>
</div>
<div class="ui-widget-overlay ui-front d-none"></div>
@include('admin.staff_schedule.models.popup')
@endsection
@section('scripts')
  <script>
    $(document).ready(function() {
        $('.add_hour_of_operation').click(function(e) {
            e.preventDefault();
            $('.hour_title').html("Add Hour of Operation");
            $('.ui-draggable-add-hour-of-operation').show();
            $('.ui-widget-overlay').css('display', 'block');
        });
        $('.closethick-add-hour-of-operation-close').click(function() {
            $("#frm_add_rest_hour").validate().resetForm();
            $("#frm_add_rest_hour")[0].reset();
            $('#frm_add_rest_hour input[name="hour_id"]').val('');
            $('.ui-draggable-add-hour-of-operation').hide();
            $('.ui-widget-overlay').css('display', 'none');
        });

        // New Schedule for Restaurant module show
        $('.add_new_schedule_for_restaurant').click(function(e) {
            e.preventDefault();
            $('.new_schedule_for_restaurant input[name="sch_usage"]').val('I');
            $('#title_schedule').html('New Schedule');
            $('#button_2').hide();
            $('#button_1').show();
            $('.hide_show_condition').show();
            $('.ui-draggable-add-new-schedule-for-restaurant').show();
            $('.ui-widget-overlay').css('display', 'block');
        });
        // New Schedule for Restaurant module close
        $('.closethick-add-new-schedule-for-restaurant-close').click(function() {
            $(".new_schedule_for_restaurant").validate().resetForm();
            $(".new_schedule_for_restaurant")[0].reset();
            $('.new_schedule_for_restaurant input[name="weekly_schedule_id"]').val('');
            $('.new_schedule_for_restaurant input[name="sch_usage"]').val('');
            $('.new_schedule_for_restaurant input[name="sch_venue"]').val('');
            $('.ui-draggable-add-new-schedule-for-restaurant').hide();
            $('.ui-widget-overlay').css('display', 'none');
        });

        $('.add_new_schedule_for_web_site, .add_new_schedule_for_banquet_side').click(function(e) {
            e.preventDefault();
            var sch_venue = $(this).attr('sch_venue');
            var form_hading = $(this).attr('form_hading')
            $('#title_schedule').html(form_hading);
            $('.new_schedule_for_restaurant input[name="sch_usage"]').val('P');
            $('.new_schedule_for_restaurant input[name="sch_venue"]').val(sch_venue);
            $('.hide_show_condition').hide();
            $('#button_1').hide();
            $('#button_2').show();
            $('.ui-draggable-add-new-schedule-for-restaurant').show();
            $('.ui-widget-overlay').css('display', 'block');
        });

        // New Schedule for Restaurant validate
        $('.new_schedule_for_restaurant').validate({
            rules: {
                'day_of_week': 'required',
                'open_for': 'required',
                'max_reservations': {
                    required: true,
                    number: true 
                },
                'max_adults': {
                    required: true,
                    number: true,
                },
            },
            messages: {
                'day_of_week':'Please enter Day Of Week.',
                'open_for':'Please enter Open For.',
                'max_reservations': {
                    required: 'Please enter Max Reservations.',
                    number: 'Please enter Max Reservations Number.'
                },
                'max_adults': {
                    required: 'Please enter Max Reservations.',
                    number: 'Please enter Max Reservations Number.'
                },
            },   
            submitHandler: function(form) {
            form.submit();
            }
        });

        $('#button_1, #button_2').on('click', function() {
            // Check which button was clicked
            var buttonId = $(this).attr('id');
            console.log(buttonId);

            // Perform validation for fields relevant to button1 or remove validation for button_2
            if (buttonId === 'button_1') {
                // Perform validation for fields relevant to button1
                if ($('.new_schedule_for_restaurant').valid()) {
                    $('.new_schedule_for_restaurant').submit();
                }
            } else if (buttonId === 'button_2') {
                // Remove validation rules for max_reservations and max_adults fields
                $('.new_schedule_for_restaurant').validate().settings.rules['max_reservations'] = {};
                $('.new_schedule_for_restaurant').validate().settings.rules['max_adults'] = {};
                
                // Submit the form
                $('.new_schedule_for_restaurant').submit();
            }
        });

        // Edit Schedule for Restaurant
        $('.edit_weekly_schedule').on('click', function() {
            $('.hour_title').html("Edit Hour of Operation");
            let weekly_schedule_id = $(this).data('weekly-schedule-id');
            var url = "{{ route('admin.restaurant.weekly.schedule.edit', ':id') }}";
            url = url.replace(':id', weekly_schedule_id);
            $.ajax({
                url: url,
                type: 'GET',
                success: function(data) {
                    var from_time_hour = moment(data.weeklySchedule.from_time, 'HH:mm::ss').format('HH');
                    var from_time_min = moment(data.weeklySchedule.from_time, 'HH:mm::ss').format('mm');
                    var to_time_hour = moment(data.weeklySchedule.to_time, 'HH:mm::ss').format('HH');
                    var to_time_min = moment(data.weeklySchedule.to_time, 'HH:mm::ss').format('mm');
                    console.log(from_time_hour);
                    $('.new_schedule_for_restaurant select[name="day_of_week"]').val(data.weeklySchedule.day_of_week);
                    $('.new_schedule_for_restaurant select[name="from_time_hour"]').val(from_time_hour);
                    $('.new_schedule_for_restaurant select[name="from_time_min"]').val(from_time_min);
                    $('.new_schedule_for_restaurant select[name="to_time_hour"]').val(to_time_hour);
                    $('.new_schedule_for_restaurant select[name="to_time_min"]').val(to_time_min);
                    $('.new_schedule_for_restaurant select[name="open_for"]').val(data.weeklySchedule.open_for);
                    $('.new_schedule_for_restaurant input[name="max_reservations"]').val(data.weeklySchedule.max_reservations);
                    $('.new_schedule_for_restaurant input[name="max_adults"]').val(data.weeklySchedule.max_adults);
                    $('.new_schedule_for_restaurant input[name="sch_usage"]').val(data.weeklySchedule.sch_usage);
                    $('.new_schedule_for_restaurant input[name="sch_venue"]').val(data.weeklySchedule.sch_venue);
                    $('.new_schedule_for_restaurant input[name="weekly_schedule_id"]').val(data.weeklySchedule.id);
                    if(data.weeklySchedule.sch_usage == 'I'){
                        $('#title_schedule').html('Edit Schedule');
                        $('#button_2').hide();
                        $('#button_1').show();
                        $('.hide_show_condition').show();
                    }else{
                        var hadding = (data.weeklySchedule.sch_venue == 'R')?'Edit Schedule for Public Site (Restaurant)':'New Schedule for Public Site (Banquet)';
                        $('#title_schedule').html(hadding);
                        $('.hide_show_condition').hide();
                        $('#button_1').hide();
                        $('#button_2').show();
                    }
                    $('.ui-draggable-add-new-schedule-for-restaurant').show();
                    $('.ui-widget-overlay').css('display', 'block');
                },
                error: function(error) {
                    console.error('Ajax request failed:', error);
                }
            });
        });

         // Delete Schedule for Restaurant
        $(document).on('click', '.delete_weekly_schedule', function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            let id = $(this).data('weekly-schedule-id');

            if (confirm("Do you really want to delete this record?") == true) {
                var url = "{{ route('admin.restaurant.weekly.schedule.destroy', ':id') }}";
                url = url.replace(':id', id);
                $.ajax({
                    url: url
                    , type: 'DELETE'
                    , success: function(response) {
                        if (response.success) {
                            alert(response.message);
                            window.location.reload();
                        } else {
                            alert(response.message);
                        }
                    }
                });

            }
        });

        // Add Hour of Operation validation method for comparing start and end date hours
        $.validator.addMethod("greaterThanCurrentDate", function(value, element) {
            var currentDate = moment().startOf('day'); // Start of the current day
            var selectedDate = moment(value);
            return selectedDate.isSameOrAfter(currentDate);
        }, "Start date cannot be in the past.");
        $.validator.addMethod("greaterThan", function(value, element, params) {
            var startDate = new Date($("#start_dt").val() + " " + $("#start_dt_hour").val() + ":" + $("#start_dt_min").val());
            var endDate = new Date($("#end_dt").val() + " " + $("#end_dt_hour").val() + ":" + $("#end_dt_min").val());
            return endDate > startDate;
        }, "End date and time must be greater than start date and time.");
        // Validate form
        $('#frm_add_rest_hour').validate({
            rules: {
                'start_dt': {
                    required: true,
                    greaterThanCurrentDate: true
                },
                'start_dt_hour': 'required',
                'end_dt': 'required',
                'end_dt_hour': {
                    required: true,
                    greaterThan: true // Apply custom validation rule
                },
                'open_for':'required',
            },
            messages: {
                'start_dt': {
                    required: 'Please select a start Date.',
                    greaterThanCurrentDate: 'Start date cannot be in the past.'
                },
                'start_dt_hour': 'Please select a start date hour.',
                'end_dt': 'Please select an end date.',
                'end_dt_hour': {
                    required: 'Please select an end date hour.',
                    greaterThan: 'End date hour must be greater than start date hour.'
                },
                'open_for':'Please select a Open for.',
            }
        });

        $('.edit_hour_of_operation').on('click', function() {
            $('.hour_title').html("Edit Hour of Operation");
            let hour_id = $(this).data('hour-id');
            var url = "{{ route('admin.restaurant-hour.edit', ':id') }}";
            url = url.replace(':id', hour_id);
            $.ajax({
                url: url,
                type: 'GET',
                success: function(data) {
                    var startDate = moment(data.scheduleshour.start_dt).format('YYYY-MM-DD');
                    var endDate = moment(data.scheduleshour.end_dt).format('YYYY-MM-DD');
                    var start_dt_hour = moment(data.scheduleshour.start_dt).format('HH');
                    var start_dt_min = moment(data.scheduleshour.start_dt).format('mm');
                    var end_dt_hour = moment(data.scheduleshour.end_dt).format('HH');
                    var end_dt_min = moment(data.scheduleshour.end_dt).format('mm');
                    $('#frm_add_rest_hour input[name="hour_id"]').val(data.scheduleshour.id);
                    $('#frm_add_rest_hour input[name="start_dt"]').val(startDate);
                    $('#frm_add_rest_hour input[name="end_dt"]').val(endDate);
                    $('#frm_add_rest_hour select[name="start_dt_hour"]').val(start_dt_hour);
                    $('#frm_add_rest_hour select[name="start_dt_min"]').val(start_dt_min);
                    $('#frm_add_rest_hour select[name="end_dt_hour"]').val(end_dt_hour);
                    $('#frm_add_rest_hour select[name="end_dt_min"]').val(end_dt_min);
                    $('#frm_add_rest_hour select[name="open_for"]').val(data.scheduleshour.open_for);
                    $('#frm_add_rest_hour textarea[name="special_notes"]').val(data.scheduleshour.special_notes);
                    
                    $('.ui-draggable-add-hour-of-operation').show();
                    $('.ui-widget-overlay').css('display', 'block');
                },
                error: function(error) {
                    console.error('Ajax request failed:', error);
                }
            });
        });

        $(document).on('click', '.btn_delete_hour_of_operation', function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            id = hour_id = $(this).data('hour-id');

            if (confirm("Do you really want to delete this record?") == true) {
                var url = "{{ route('admin.restaurant-hour.destroy', ':id') }}";
                url = url.replace(':id', id);
                $.ajax({
                    url: url
                    , type: 'DELETE'
                    , success: function(response) {
                        if (response.success) {
                            alert(response.message);
                            window.location.reload();
                        } else {
                            alert(response.message);
                        }
                    }
                });

            }
        });
    });


    $(document).ready(function() {
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
            } else {
                $('.main-order-item').css('order', '1');
                $('.corporate-form').show();
            }
        });
    });

  </script>
@endsection