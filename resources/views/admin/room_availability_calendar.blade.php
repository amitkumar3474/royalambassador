@extends('admin.layouts.master')
@section('title', 'Room & Availability Calendar')
<style>
  .total_time {
    position: relative;
    height: 1.4em;
    font-size: 1.1em;
    border-left: 1px dotted #999;
    cursor: pointer;
  }
  .show_mouse_time {
    position: absolute;
    border: solid 1px #000;
    background: #51B4D8;
    color: #FFF;
    right: -0em;
    top: -1.5em;
    padding: .1em;
  }
  .event_pop {
    position: absolute;
    padding: .6em;
    background: #bdbe4e;
    width: 320px;
    box-shadow: 3px 2px 5px 0px rgba(134,150,32,1);
  }
  body {
    font-family: Arial, sans-serif;
  }

  table {
    width: 100%;
    border-collapse: collapse;
  }
  .room_abbr{
    font-size: 12px;
  }
  th {
    background-color: #f2f2f2;
  }
  .cal_cell {
    margin: 0;
  }
  td .cal_cell {
      text-align: right;
  }

    .active {
      font-weight: bold;
    }

    .room_row {
      position: relative;
    }
    .time_block {
      position: relative;
      display: inline-block;
      border-radius: 3px;
      margin-right: 5px;
      color: #fff;
      font-size: 12px;
    }

    .event_booked {
        background-color: #6c757d;
    }
    .event_pop {
      position: absolute;
      background-color: #fff;
      border: 1px solid #ccc;
      padding: 10px;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      z-index: 999;
    }
    #cal_nav_wrap {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px;
        background-color: #f2f2f2;
    }

    .btn_nav {
        display: inline-block;
        padding: 5px 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: #fff;
        color: #333;
        text-decoration: none;
        transition: background-color 0.3s, color 0.3s;
    }

    .btn_nav:hover {
        background-color: #007bff;
        color: #fff;
    }

    .btn_nav svg {
        vertical-align: middle;
        margin-right: 5px;
    }
    .cal_cell.active {
        background-color: #EAF4FF;
    }
    .nav-bottom {
        position: relative;
        top: 110px;
        left: 21px;
        z-index: 1000; 
    }
    #calendar {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: white; 
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3); 
        z-index: 1001; 
    }

</style>
@section('content')
<div class="card title_bar">
    <h1>Room Availability Calendar</h1>
    <p><strong>Legend:</strong>
        <span class="event_booked button font-bold radius-0">booked</span>
        <span class="event_tentative button font-bold radius-0">tentative</span>
        <span class="event_promised button font-bold radius-0">promised</span>
        <span class="event_type_special button font-bold radius-0">special event</span>
    </p>
</div>
@php
$requestDate = $_GET['current_date'] ?? date('Y-m-d H:i:s');
$currentDate = date('Y-m-d H:i:s', strtotime($requestDate)); 
@endphp
<div id="cal_nav_wrap">
  <a href="{{ route('admin.room.availability.calendar', ['current_date' => date('Y-m-d', strtotime('-1 year', strtotime($currentDate)))]) }}"><span class="btn_goto_year btn_nav" year="{{ date('Y',strtotime('- 1 years', strtotime($currentDate)))}}">
    <svg style="width: 10px" class="svg-inline--fa fa-angles-left" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="angles-left" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
        <path fill="currentColor" d="M41.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.3 256 246.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160zm352-160l-160 160c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L301.3 256 438.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0z"></path>
    </svg><!-- <i class="fas fa-angle-double-left"></i> Font Awesome fontawesome.com --> {{ date('Y',strtotime('- 1 years', strtotime($currentDate)))}}</span>
  </a>
  <a href="{{ route('admin.room.availability.calendar', ['current_date' => date('Y-m-d', strtotime('-1 months', strtotime($currentDate)))]) }}"><span class="btn_goto_month btn_nav" year="{{ date('Y',strtotime('- 1 months', strtotime($currentDate)))}}" month="{{ date('n',strtotime('- 1 months', strtotime($currentDate)))}}">
    <svg style="width: 10px" class="svg-inline--fa fa-angle-left" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="angle-left" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg="">
      <path fill="currentColor" d="M41.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.3 256 246.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"></path>
    </svg><!-- <i class="fas fa-angle-left"></i> Font Awesome fontawesome.com --> {{ date('F',strtotime('- 1 months', strtotime($currentDate)))}}</span>
  </a>
  <span class="btn_show_cur_month btn_nav" year="{{ date('Y',strtotime($currentDate))}}"  month="{{ date('n',strtotime($currentDate))}}">
    <svg style="width: 10px" class="svg-inline--fa fa-calendar-days" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="calendar-days" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
        <path fill="currentColor" d="M128 0c17.7 0 32 14.3 32 32V64H288V32c0-17.7 14.3-32 32-32s32 14.3 32 32V64h48c26.5 0 48 21.5 48 48v48H0V112C0 85.5 21.5 64 48 64H96V32c0-17.7 14.3-32 32-32zM0 192H448V464c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V192zm64 80v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H80c-8.8 0-16 7.2-16 16zm128 0v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H208c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H336zM64 400v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H80c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H208zm112 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H336c-8.8 0-16 7.2-16 16z"></path>
    </svg><!-- <i class="fas fa-calendar-alt"></i> Font Awesome fontawesome.com --> <input type="date" name="currant" id="change_month" value="{{ date('Y-m-d', strtotime($currentDate)) }}">
  </span>
  {{-- {{ date('F Y',strtotime($currentDate))}} --}}
  <a href="{{ route('admin.room.availability.calendar', ['current_date' => date('Y-m-d', strtotime('+ 1 months', strtotime($currentDate)))]) }}"><span class="btn_goto_month btn_nav" year="{{ date('Y',strtotime('+ 1 months', strtotime($currentDate)))}}" month="{{ date('n',strtotime('+ 1 months', strtotime($currentDate)))}}">{{ date('F',strtotime('+ 1 months', strtotime($currentDate)))}} <svg style="width: 10px" class="svg-inline--fa fa-angle-right" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="angle-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg="">
    <path fill="currentColor" d="M278.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-160 160c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L210.7 256 73.4 118.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l160 160z"></path>
    </svg><!-- <i class="fas fa-angle-right"></i> Font Awesome fontawesome.com --></span>
  </a>
  <a href="{{ route('admin.room.availability.calendar', ['current_date' => date('Y-m-d', strtotime('+1 year', strtotime($currentDate)))]) }}"><span class="btn_goto_year btn_nav" year="{{ date('Y',strtotime('+ 1 years', strtotime($currentDate)))}}">{{ date('Y',strtotime('+ 1 years', strtotime($currentDate)))}} 
    <svg style="width: 10px" class="svg-inline--fa fa-angles-right" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="angles-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
        <path fill="currentColor" d="M470.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L402.7 256 265.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160zm-352 160l160-160c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L210.7 256 73.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0z"></path>
    </svg><!-- <i class="fas fa-angle-double-right"></i> Font Awesome fontawesome.com --></span>
  </a>
</div>
<div class="nav-bottom" style=" display: none;">
  <div id="calendar">
  </div>
</div>
<div id="cal_wrap">
  @php
    // Get current month and year
    $month = date('n',strtotime($currentDate))??date('n');
    $year = date('Y',strtotime($currentDate))??date('Y');
    // dd($year);

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
  <table border="1">
      <tr>
          <th>Sunday</th>
          <th>Monday</th>
          <th>Tuesday</th>
          <th>Wednesday</th>
          <th>Thursday</th>
          <th>Friday</th>
          <th>Saturday</th>
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
                  <p class="cal_cell active" day="{{$day}}" month="{{$month}}" year="{{$year}}" >{{ $day }}</p>
                  @foreach ($rooms as $room)
                      <div class="rooms">
                          @php
                          $datetime = $year.'-'.$month.'-'.$day;
                          $datetime = date('Y-m-d H:i:s', strtotime($datetime));
                          $events = get_facility_data($datetime, $room->id, $floorPlan);
                          // print_r($events);
                          @endphp
                          <div class="room_row actual_body" room_id="{{ $room->id }}">
                              <div class="room_abbr">{{ $room->abbreviation }}
                                <div class="multi_events q_tip" data-hasqtip="0" oldtitle="{{count($events)}} events the same day" title="" aria-describedby="qtip-0">{{(count($events) > 1)?count($events):''}}</div>
                              </div>
                              <div class="total_time" onclick="handleEventClick('{{ $room->id }}', '{{ $year }}', '{{ $month }}', '{{ $day }}')">
                                @if (count($events) > 0)
                                  @foreach ($events as $event)  
                                    <span event_id="{{$event->lnk_event}}" event_room_id="{{$event->lnk_facility}}" class="time_block event_booked" ><span>
                                    {{date('h', strtotime($event->event->start_date_time))}} - {{date('h', strtotime($event->event->end_date_time))}}
                                    </span></span> 
                                    <div class="card event_pop" event_ids="{{22428}}" style="top: 20px; left: 10px;display: none;z-index: 99999999;">
                                      <p><strong>{{$event->event->customer->customer_name}}</strong></p>
                                      <p>{{$event->event->eventType->type_name}} ({{$event->event->adults}} Adults)</p>
                                      <p>Event Id: <a href="javascript:void(0)" onclick="gotoEventDetail(event,'{{route('admin.event.show', $event->lnk_event) }}')">{{$event->lnk_event}}</a></p>

                                      <hr>
                                      @foreach ($event->event->eventFacilities as $_eventFaci)
                                          @if (!empty($_eventFaci->facility))
                                          <p class="room_info"><span>{{$_eventFaci->facility->facility_name}}</span><span>{{date('h:i a',strtotime($event->start_date_time)) }}</span><span> - {{date('h:i a',strtotime($event->end_date_time)) }}</span></p>
                                          @endif
                                      @endforeach
                                    </div>
                                  @endforeach
                                @endif
                              </div>
                          </div>
                      </div>
                  @endforeach
              </td>
          @endfor

          @for ($i = 0; ($i + $first_day_index + $days_in_month) % 7 != 0; $i++)
              <td></td>
          @endfor
      </tr>
  </table>
</div>

@endsection
@section('scripts')
  <script>
    $(document).ready(function() {
        $('.total_time').mouseover(function() {
            var currentDate = new Date();
            var hours = currentDate.getHours().toString().padStart(2, '0');
            var minutes = currentDate.getMinutes().toString().padStart(2, '0');
            var currentTime = hours + ':' + minutes ;

            // Create a span element with the current time
            var $span = $('<span>').addClass('show_mouse_time').html('<span time="' + currentTime + '">' + currentTime + '</span>');

            // Append the span to the total_time element
            $(this).append($span);
        });

        $('.total_time').mouseout(function() {
            // Remove the appended span element when mouse leaves the total_time element
            $(this).find('.show_mouse_time').remove();
        });

        $('.time_block.event_booked').hover(
            function() {
                $(this).next('.card.event_pop').css('display', 'block');
            }
        );
        
  });
  // $(document).ready(function() {
  //   $('.btn_show_cur_month').click(function() {
  //     var year = $(this).attr('year');
  //     var month = $(this).attr('month');
  //     console.log(year);

  //     $("#calendar").datepicker({
  //       dateFormat: "dd-mm-yy",
  //       changeMonth: true,
  //       changeYear: true,
  //       constrainInput: false,
  //       defaultDate: new Date(year, month - 1, 1) ,// Setting default date to the specified year and month
  //       numberOfMonths: 1 // Display only one month
  //     }).datepicker("show"); // Show the datepicker
  //     $('.nav-bottom').toggle();
  //   });
  // });
  $(document).ready(function () {
    $('#change_month').on('change', function () {
      var changeDate = $(this).val();
      var url = "{{ route('admin.room.availability.calendar') }}" + "?current_date=" + changeDate;
      window.location.href = url;
    });
  });
  $(document).on('click', function(event) {
    if (!$(event.target).closest('.time_block.event_booked').length &&
        !$(event.target).closest('.card.event_pop').length) {
        $('.card.event_pop').css('display', 'none');
    }
  });
  function gotoEventDetail(event, url){
    event.stopPropagation();
    window.location.href = url;
  }
  function handleEventClick(room_id, year, month, day) {
    var currentDate = new Date();
    var hours = currentDate.getHours().toString().padStart(2, '0');
    var minutes = currentDate.getMinutes().toString().padStart(2, '0');
    var currentTime = hours + ':' + minutes;

    var event_dt = year + '-' + month + '-' + day + ' ' + currentTime;

    if (confirm("Create the event?")) {
        // Redirect to create event page with parameters
        var url = "{{ route('admin.event.create') }}" + "?room_id=" + room_id + "&event_dt=" + event_dt;
        window.location.href = url;
    }
  }
  </script>
@endsection
