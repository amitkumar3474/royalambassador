@extends('admin.layouts.master')
@section('title', 'My Monthly Schedule')
@section('style')
    <style>
        table.clander_sechdule {
            border-collapse: collapse;
            border: 1px solid #E5D07B;
            width: 100%;
            margin-bottom: 20px; 
        }
        .clander_sechdule th {
            border: none;
            text-align: center;
            background-color: #E5D07B;
        }
        .calendar_date{
            background-color: #E5D07B;
            padding-left: 3px;
            font-weight: bold;
        }
        .clander_sechdule td {
            border: 1px solid #C5B469;
            text-align: left;
            width: 210px;
            height: 160px;
        }
        .sch_item {
            background: #F7DFDE;
            border-bottom: 1px dotted #999;
        }
        .sch_work_1 {
            background: #CEEDD7;
        }
        .sch_items {
            min-height: 63%;
        }
        .cur_month_info > span {
            font-size: 40px;
        }
        .wplan_row {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1fr;
            grid-gap: .1em;
            margin-bottom: .8em;
        }
        .wplan_row span {
            background: #9D939345;
        }
        .product-list td {
            border-bottom: none;
        }
        .product-list{
            border: 1px solid #999;
        }

    </style>
@endsection
@section('content')
@php
$requestDate = $_GET['current_date'] ?? date('Y-m-d H:i:s');
$currentDate = date('Y-m-d H:i:s', strtotime($requestDate)); 
@endphp
<div class="row">
    <div class="cal_nav_wrap col-4">
        <div class="cur_month_info"><span>{{ date('F Y',strtotime($currentDate))}}</span></div>
      <a href="{{ route('admin.schedule.user.staff', ['current_date' => date('Y-m-d', strtotime('- 1 months', strtotime($currentDate)))]) }}"><span class="btn_goto_month btn_nav" >
        <svg style="width: 10px" class="svg-inline--fa fa-angle-left" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="angle-left" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg="">
          <path fill="currentColor" d="M41.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.3 256 246.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"></path>
        </svg><!-- <i class="fas fa-angle-left"></i> Font Awesome fontawesome.com --> {{ date('F Y',strtotime('- 1 months', strtotime($currentDate)))}}</span>
      </a>
      <span class="btn_show_cur_month btn_nav" year="{{ date('Y',strtotime($currentDate))}}"  month="{{ date('n',strtotime($currentDate))}}">
        <svg style="width: 10px" class="svg-inline--fa fa-calendar-days" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="calendar-days" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
            <path fill="currentColor" d="M128 0c17.7 0 32 14.3 32 32V64H288V32c0-17.7 14.3-32 32-32s32 14.3 32 32V64h48c26.5 0 48 21.5 48 48v48H0V112C0 85.5 21.5 64 48 64H96V32c0-17.7 14.3-32 32-32zM0 192H448V464c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V192zm64 80v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H80c-8.8 0-16 7.2-16 16zm128 0v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H208c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H336zM64 400v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H80c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H208zm112 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H336c-8.8 0-16 7.2-16 16z"></path>
        </svg><!-- <i class="fas fa-calendar-alt"></i> Font Awesome fontawesome.com --> {{ date('F Y',strtotime($currentDate))}}
      </span>
      <a href="{{ route('admin.schedule.user.staff', ['current_date' => date('Y-m-d', strtotime('+ 1 months', strtotime($currentDate)))]) }}"><span class="btn_goto_month btn_nav" >{{ date('F Y',strtotime('+ 1 months', strtotime($currentDate)))}} <svg style="width: 10px" class="svg-inline--fa fa-angle-right" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="angle-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg="">
        <path fill="currentColor" d="M278.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-160 160c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L210.7 256 73.4 118.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l160 160z"></path>
        </svg><!-- <i class="fas fa-angle-right"></i> Font Awesome fontawesome.com --></span>
      </a>
    </div>
    <div id="schedule_info" class="card col-4">
        <div>
            <h3>Current Schedule</h3>
            <hr>
            <p>
                <label>Total Hours:</label>
                <span class="element">{{ $staffSchedules->where('schedule_type',1)->sum('total_hours') }}</span>
                <span class="mand_sign"></span>
            </p> 
            <br>
            <a href="javascript:void(0)"><button id="staff_schedule_top_edit" class="button font-bold radius-0">Edit Notes</button></a>
            <button type="submit" id="staff_schedule_top_misc" class="small_button button font-bold radius-0" onclick="if(confirm('This will update the schedule based on weekly plan. Continue?')) return preSubmitstaff_schedule_top() ; else return false ; ">Update based on Plan</button>
        </div>
    </div>
    <div class="card col-4">
        <div>
            <h3>Weekly Plan</h3>
            <hr>
            <div class="cur_weekly_plan">
            <p class="wplan_row header"><span>Day of Week</span><span>Is Off</span><span>Start</span>
                <span>End</span></p>
            </div>
            
            <a href="javascript:void(0)"><span class="small_button button font-bold radius-0 update-my-weekly-plan">Update my Weekly Plan</span></a>
        </div>
    </div>
</div>
<div class="line_break"></div>
<div class="line_break"></div>
<div class="line_break"></div>
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
  <table class="clander_sechdule">
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
                    @if (count($staffSchedules) > 0) 
                        @foreach ($staffSchedules as $_staffSchedule)
                            @if (date('d', strtotime($_staffSchedule->schedule_date)) == $day)
                                @if ($_staffSchedule->schedule_type != 3 && $_staffSchedule->schedule_type != 5)
                                    <div class="sch_item sch_work_{{$_staffSchedule->schedule_type}}" title="{{$_staffSchedule->user->name}} works from {{date('h:i a',strtotime($_staffSchedule->sch_start_dt)) }} to {{date('h:i a',strtotime($_staffSchedule->sch_end_dt)) }} for {{number_format($_staffSchedule->total_hours,3)}} on {{date('l',strtotime($_staffSchedule->sch_end_dt))}}">{{date('h:i a',strtotime($_staffSchedule->sch_start_dt)) }} to {{date('h:i a',strtotime($_staffSchedule->sch_end_dt)) }} ({{$_staffSchedule->total_hours." hours"}})
                                        <button type="button" class="button font-bold radius-0 btn_sch_item_edit" data-sch-id="{{$_staffSchedule->id}}" data-full-date="{{ date('Y-m-d', strtotime("$year-$month-$day")) }}" data-sech-type="{{$_staffSchedule->schedule_type}}">Edit</button> 
                                        <button type="button" class="btn_sch_item_delete button font-bold radius-5" data-sch-id="{{$_staffSchedule->id}}">x</button>
                                    </div>
                                @endif
                                @if ($_staffSchedule->schedule_type == 3 || $_staffSchedule->schedule_type == 5)
                                    <div class="sch_item sch_full_vacation">** {{($_staffSchedule->schedule_type == 3)?'On Vacation':'OFF'}} ** 
                                        <button type="button" class="button font-bold radius-0 btn_sch_item_edit" data-sch-id="{{$_staffSchedule->id}}" data-full-date="{{ date('Y-m-d', strtotime("$year-$month-$day")) }}" data-sech-type="{{$_staffSchedule->schedule_type}}">Edit</button> 
                                        <button type="button" class="btn_sch_item_delete button font-bold radius-5" data-sch-id="{{$_staffSchedule->id}}">x</button>
                                    </div>
                                @endif
                            @endif
                        @endforeach
                    @endif
                  </div><br> 
                  <span class="special_action" comment="The + to add schedule">
                    <button type="button" data-full-date="{{ date('Y-m-d', strtotime("$year-$month-$day")) }}" class="add_sch_item button font-bold radius-0">Add +</button> 
                  </span>
              </td>
          @endfor

          @for ($i = 0; ($i + $first_day_index + $days_in_month) % 7 != 0; $i++)
              <td></td>
          @endfor
      </tr>
  </table>
</div>
{{-- models --}}
<div class="ui-widget-overlay ui-front d-none"></div>
@include('admin.staff_schedule.models.popup')
@endsection
@section('scripts')
  <script>
    $(document).ready(function () {

        $('#schedule_type').change(function () { 
            // e.preventDefault();
            let schedule_type = $(this).val();
            if ((schedule_type == 3 || schedule_type == 5)) {
                $("#time_wrap").hide(400);
            } else {
                $("#time_wrap").show(400);
            }
            
        });

        $('.add_sch_item').click(function() {
            // e.preventDefault();
            let scheduleDate = moment($(this).data('full-date')).format('dddd MMMM D, YYYY');
            $('.selected_currant_date').html(scheduleDate);
            $('#new_staff_schedule_item_sch_end_dt_date').val($(this).data('full-date'));
            $('.sch_item_date').val($(this).data('full-date'));
            $('.ui-draggable-new-schedule').show();
            $('.ui-widget-overlay').css('display', 'block');
        });

        $('.closethick-schedule-close').click(function() {
            $('.ui-draggable-new-schedule').hide();
            $('.ui-widget-overlay').css('display', 'none');
        });

        $('#staff_schedule_top_edit').click(function() {
            $('.ui-draggable-edit-schedule-notes').show();
            $('.ui-widget-overlay').css('display', 'block');
        });

        $('.closethick-edit-schedule-close').click(function() {
            $('.ui-draggable-edit-schedule-notes').hide();
            $('.ui-widget-overlay').css('display', 'none');
        });

        $('.update-my-weekly-plan').click(function() {
            $('.ui-draggable-update-staff-schedule').show();
            $('.ui-widget-overlay').css('display', 'block');
        });

        $('.closethick-update-staff-close').click(function() {
            $('.ui-draggable-update-staff-schedule').hide();
            $('.ui-widget-overlay').css('display', 'none');
        });

       // Add custom validation method for comparing start and end date hours
        $.validator.addMethod("greaterThan", function(value, element, params) {
            var startDate = new Date($(".sch_item_date").val() + " " + $("#new_staff_schedule_item_sch_start_dt_hour").val() + ":" + $("#new_staff_schedule_item_sch_start_dt_min").val());
            var endDate = new Date($("#new_staff_schedule_item_sch_end_dt_date").val() + " " + $("#new_staff_schedule_item_sch_end_dt_hour").val() + ":" + $("#new_staff_schedule_item_sch_end_dt_min").val());
            return endDate > startDate;
        }, "End date and time must be greater than start date and time.");
        // Validate form
        $('#new_staff_schedule_item').validate({
            rules: {
                'schedule_type': 'required',
                'new_staff_schedule_item_sch_start_dt_hour': 'required',
                'new_staff_schedule_item_sch_end_dt_date': 'required',
                'new_staff_schedule_item_sch_end_dt_hour': {
                    required: true,
                    greaterThan: true // Apply custom validation rule
                }
            },
            messages: {
                'schedule_type': 'Please select a schedule type.',
                'new_staff_schedule_item_sch_start_dt_hour': 'Please select a start date hour.',
                'new_staff_schedule_item_sch_end_dt_date': 'Please select an end date.',
                'new_staff_schedule_item_sch_end_dt_hour': {
                    required: 'Please select an end date hour.',
                    greaterThan: 'End date hour must be greater than start date hour.'
                }
            }
        });


        $('#new_staff_schedule_item').submit(function(e) {
            e.preventDefault();
            if(!$(this).find('input.error, select.error').length){
                var formData = $('#new_staff_schedule_item').serialize();
                console.log(formData);
                $.ajax({
                    url: "{{route('admin.schedule.store')}}",
                    type: 'POST',
                    data: formData, 
                    success: function(response) {
                        if (response.success) {
                            window.location.reload(true);
                        } else {
                            alert(response.message);
                            location.reload();
                        }
                    },
                    error: function(xhr, status, error) {
                        // Clear previous error messages
                        $('.text-danger').remove();
                        $('.error').removeClass('error');

                        if (xhr.responseJSON && xhr.responseJSON.errors) {
                            var errors = xhr.responseJSON.errors;
                            $.each(errors, function(key, value) {
                                $('#' + key + '_error').remove();
                                var cleanedKey = key.replace('.0', ''); // Remove '.0' from the key
                                $('#' + cleanedKey).after('<span id="' + cleanedKey + '_error" class="text-danger">' + value[0] + '</span>');
                                $('#' + cleanedKey).addClass('error');
                            });
                        }
                    }
                });
            }
        });

        $(document).on('click', '.btn_sch_item_delete', function() {
            let sch_id = $(this).data('sch-id');
            console.log(sch_id);
            if (confirm("Are you sure you want to remove this schedule?") == true) {
                var url = "{{ route('admin.schedule.destroy', ':id') }}";
                url = url.replace(':id', sch_id);
                $.ajax({
                    url: url,
                    type: 'DELETE',
                    data: {_token:  "{{csrf_token()}}"},
                    success: function(response) {
                        if (response.success) {
                            window.location.reload();
                        } else {
                            alert(response.message);
                        }
                    }
                });

            }
        });

        $('.btn_sch_item_edit').on('click', function() {
            let schedulas_id = $(this).data('sch-id');
            let schedule_type = $(this).data('sech-type');
            let scheduleDate = moment($(this).data('full-date')).format('MMMM D, YYYY');
            $('.schedule_title').html("Edit Schedule");
            $('.form_title_change').html("Change your Schedule for  "+ scheduleDate);
            $('.ui-draggable-new-schedule').show();
            if ((schedule_type == 3 || schedule_type == 5)) {
                $("#time_wrap").hide();
            } else {
                $("#time_wrap").show();
            }
            $('.ui-widget-overlay').css('display', 'block');
            var url = "{{ route('admin.schedule.edit', ':id') }}";
            url = url.replace(':id', schedulas_id);
            $.ajax({
                url: url,
                type: 'GET',
                success: function(data) {
                    var endDate = data.schedulesItem.sch_end_dt?moment(data.schedulesItem.sch_end_dt).format('YYYY-MM-DD') : moment(data.schedulesItem.schedule_date).format('YYYY-MM-DD');
                    var start_dt_hour = data.schedulesItem.sch_start_dt?moment(data.schedulesItem.sch_start_dt).format('HH'):'00';
                    var start_dt_min = data.schedulesItem.sch_start_dt?moment(data.schedulesItem.sch_start_dt).format('mm'):'00';
                    var end_dt_hour = data.schedulesItem.sch_end_dt?moment(data.schedulesItem.sch_end_dt).format('HH'):'00';
                    var end_dt_min = data.schedulesItem.sch_end_dt?moment(data.schedulesItem.sch_end_dt).format('mm'):'00';
                    $('#new_staff_schedule_item input[name="edit_sch_id"]').val(data.schedulesItem.id);
                    $('#new_staff_schedule_item input[name="sch_item_date"]').val(data.schedulesItem.schedule_date);
                    $('#new_staff_schedule_item select[name="schedule_type"]').val(data.schedulesItem.schedule_type);
                    $('#new_staff_schedule_item input[name="new_staff_schedule_item_sch_end_dt_date"]').val(endDate);
                    $('#new_staff_schedule_item select[name="new_staff_schedule_item_sch_start_dt_hour"]').val(start_dt_hour);
                    $('#new_staff_schedule_item select[name="new_staff_schedule_item_sch_start_dt_min"]').val(start_dt_min);
                    $('#new_staff_schedule_item select[name="new_staff_schedule_item_sch_end_dt_hour"]').val(end_dt_hour);
                    $('#new_staff_schedule_item select[name="new_staff_schedule_item_sch_end_dt_min"]').val(end_dt_min);

                },
                error: function(error) {
                    console.error('Ajax request failed:', error);
                }
            });
        });
    });
  </script>
@endsection