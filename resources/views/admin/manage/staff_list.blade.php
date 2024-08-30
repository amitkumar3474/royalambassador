@extends('admin.layouts.master')
@section('title', 'Staff Management')
@section('style')
<style>
    .svg-inline--fa {
        display: var(--fa-display, inline-block);
        height: 1em;
        overflow: visible;
        vertical-align: -.125em;
    }
    .az_tabs {
        background: #F5F5F5;
        margin-left: .5em;
    }
    .az_tabs ul {
        padding: 0;
        margin: 0;
    }
    .az_tabs > ul li.active {
        margin-bottom: -1px;
        border-bottom: 0;
        background: #FFF;
    }
    .az_tabs > ul li {
        font-size: 1.4em;
        width: 10em;
        float: left;
        text-align: center;
        padding: .5em;
        list-style-type: none;
        margin-right: .4em;
        border: 1px solid #999;
        border-bottom: 0;
        margin-bottom: 0;
    }
    .az_tabs ul:after {
        clear: both;
        content: "";
        display: table;
    }
    .cur_az_tab {
        background: #FFF;
        padding: 1.5em;
        margin-top: -1px;
        border: 1px solid #999;
    }
    #staff_select .one_staff {
        float: left; 
        margin-left: 6px; 
        width: 180px;
        vertical-align: top;
        text-align: center;
    }
    .round_box_3px {
        border-radius: 3px;
        -moz-border-radius: 3px;
        -webkit-border-radius: 3px;
        padding: 3px;
        border: 1px solid #999;
        background: #FCFCFC;
    }
    /* Style the pagination container */
    .pagination {
        margin-top: 20px;
        text-align: center;
    }

    /* Style the pagination links */
    .pagination a {
        padding: 3px;
        text-decoration: none;
        border: 1px solid #999;
        border-radius: 3px;
        color:#0782C1;
        margin-left: 3px;
        text-align:center;
    }
    .pagination a:hover {
        color: #9E0F29;
        text-decoration: none;
    }

    .pagination span span {
        background: #222;
        color: #fff;
        padding: 3px;
        text-decoration: none;
        border-radius: 3px;
        margin-left: 3px;
        text-align:center;
        
    }
    .pagination span span[aria-disabled="true"] {
        display: none;        
    }

    /* Style the disabled pagination link */
    .pagination .disabled {
        color: #ccc;
        pointer-events: none;
    }
    .hidden.sm\:flex-1.sm\:flex.sm\:items-center.sm\:justify-between div:first-child {
        display: none;
    }
    .flex.justify-between.flex-1.sm\:hidden a, 
    .flex.justify-between.flex-1.sm\:hidden span, 
    .relative.inline-flex.items-center.px-2.py-2 svg
    {
        display: none;
    }
    .relative.inline-flex.items-center.px-2.py-2.text-sm.font-medium.text-gray-500.bg-white.border.border-gray-300.rounded-l-md.leading-5.hover\:text-gray-400.focus\:z-10.focus\:outline-none.focus\:ring.ring-gray-300.focus\:border-blue-300.active\:bg-gray-100.active\:text-gray-500.transition.ease-in-out.duration-150::after {
        content: "<<";
        margin-left: 5px; /* Adjust as needed for spacing */
    }
    .relative.inline-flex.items-center.px-2.py-2.-ml-px.text-sm.font-medium.text-gray-500.bg-white.border.border-gray-300.rounded-r-md.leading-5.hover\:text-gray-400.focus\:z-10.focus\:outline-none.focus\:ring.ring-gray-300.focus\:border-blue-300.active\:bg-gray-100.active\:text-gray-500.transition.ease-in-out.duration-150::after {
        content: ">>";
        margin-left: 5px; /* Adjust as needed for spacing */
    }
</style>
@endsection
@section('content')
<div class="card title_bar">
    <h1>Staff Management
        <a href="javascript:void(0)" class="management_new_staff">
            <svg class="svg-inline--fa fa-plus" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="plus" role="img" xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 448 512" data-fa-i2svg="">
                <path fill="currentColor"
                    d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z">
                </path>
            </svg><!-- <i class="fas fa-plus"></i> Font Awesome fontawesome.com -->
        </a>
    </h1>
</div>
<div class="az_tabs">
    <ul>
        <li class="{{ isset($staffs) ? 'active' : '' }}">
            {!! isset($staffs) ? 'All Staff' : '<a href="'.route('admin.staff-list.index',['staff_status' => 1]).'">All Staff</a>' !!}
        </li>
        <li class="{{ isset($staffSchedules) ? 'active' : '' }}">
            {!! isset($staffSchedules) ? 'Staff Schedule' : '<a href="'.route('admin.staff-management.staff-schedule').'">Staff Schedule</a>' !!}
        </li>        
    </ul>
    <div class="cur_az_tab">
        @if (isset($staffs))    
            <span id="staff_list" class="xmlb_form">
                <form method="get" id="frm_staff_list" action="{{route('admin.staff-list.index')}}" accept-charset="utf-8" enctype="multipart/form-data">
                    <fieldset class="form_filters">
                        <legend>Search</legend>
                        <strong>First Name:</strong> 
                        <input name="staff_first_name" id="staff_first_name" value="{{request('staff_first_name')}}" type="text" value="" maxlength="40" size="16" >
                        <strong>Last Name:</strong> 
                        <input name="staff_last_name" id="staff_last_name" value="{{request('staff_last_name')}}" type="text" value="" maxlength="40" size="27" >
                        <strong>Uses Calendar:</strong>
                        <select name="staff_is_on_calendar" id="staff_is_on_calendar" >
                            <option value="">----</option>
                            <option value="1" {{(request('staff_is_on_calendar')=== 1)? 'selected':''}}>Yes</option>
                            <option value="0" {{(request('staff_is_on_calendar')=== 0)? 'selected':''}}>No</option>
                        </select>
                
                        <strong>Departments:</strong>
                        <select name="staff_departments" id="staff_departments" >
                            <option value="" selected="yes">----</option>
                            @foreach ($departments as $department)
                                <option value="{{$department->id}}" {{(request('staff_departments')== $department->id)? 'selected':''}}>{{$department->dept_name}}</option>
                            @endforeach
                        </select>
                        <strong>Status:</strong>
                        <select name="staff_status" id="staff_status" >
                            <option value="">----</option>
                            <option value="1" {{(request('staff_status')== 1)? 'selected':''}}>At Work</option>
                            <option value="2" {{(request('staff_status')== 2)? 'selected':''}}>On Leave</option>
                            <option value="3" {{(request('staff_status')== 3)? 'selected':''}}>Left</option>
                        </select>
                        <button type="submit" id="staff_list_apply_filter" class="button radius-0" >Search</button>
                        <button type="button" id="staff_list_clear_filter" class="button radius-0">Show All</button>
                    </fieldset>
                    <p align="right">
                        <span id="records-display"></span> of <span id="total_records"> {{$allRecords}} </span> | Show:
                        <select name="perPage" id="perPageSelect">
                            <option value="10" {{ request('perPage') == 10?'selected':''}}>10</option>
                            <option value="20" {{ request('perPage') == 20?'selected':''}} @if(request('perPage') == null){{'selected'}}@endif>20</option>
                            <option value="30" {{ request('perPage') == 30?'selected':''}}>30</option>
                            <option value="50" {{ request('perPage') == 50?'selected':''}}>50</option>
                            <option value="100" {{ request('perPage') == 100?'selected':''}}>100</option>
                        </select>
                    </p>
                </form>
                <table class="product-list table mt-20">
                    <tbody>
                        <tr>
                            <th class="id_column"></th>
                            <th>
                                <a href="#" title="Click to sort by First Name">First Name</a>
                            </th>
                            <th>
                                <a href="#"  title="Click to sort by Last Name">Last Name</a>
                            </th>
                            <th>
                                <a href="#" itle="Click to sort by Email">Email</a>
                            </th>
                            <th>
                                <a href="#" title="Click to sort by Departments">Departments</a>
                            </th>
                            <th>
                                <a href="#" title="Click to sort by Status">Status</a>
                            </th>
                            <th>
                                <a href="#" title="Click to sort by Uses Calendar">Uses Calendar</a>
                            </th>
                            <th>
                                <a href="#" title="Click to sort by On Commission">On Commission</a>
                            </th>
                            <th>User Groups</th>
                            <th>
                                <a href="#" title="Click to sort by Status">Status</a>
                            </th>
                            <th>Limits</th>
                        </tr>
                        @foreach ($staffs as $staff)
                            <tr class="actual_body">
                                <td class="id_column">
                                    <input value="{{$staff->id}}" type="checkbox" name="staff_ids[]" form_name="staff_list" title="Click or Shift/Click to select sinlge or in a group" >
                                </td>
                                <td>
                                    <nobr>{{$staff->first_name}}</nobr>
                                </td>
                                <td>{{$staff->last_name}}</td>
                                <td>
                                    <a href="{{route('admin.staff-list.show',$staff->id)}}">{{$staff->email}}</a>
                                </td>
                                <td>
                                    {{ implode(";",$staff->departments())}}
                                </td>
                                <td>{{ ($staff->staff_status == 1) ? 'At Work' : (($staff->staff_status == 2) ? 'On Leave' : (($staff->staff_status == 3) ? 'Left' : '')) }}</td>
                                <td>{{($staff->is_on_calendar == 1) ? 'Yes' : (($staff->is_on_calendar == 0) ? 'No' :'') }}</td>
                                <td>{{($staff->is_on_commission == 1) ? 'Yes' : (($staff->is_on_commission == 0) ? 'No' :'') }}</td>
                                <td>N/A</td>
                                <td>N/A</td>
                                <td>0</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div style="margin-top:16px;"></div>
                <p align="right">
                    <button type="button" id="staff_list_delete" class="button radius-0" >Delete</button>
                </p>
                <div class="line_break"></div>
                <div id="pagination-links" class="pagination">
                    {{ $staffs->links() }}
                </div>
            </span>
        @endif
        @if (isset($staffSchedules))
            <div class="line_break"></div>
            <p>Please pick a staff to view/manage his/her schedule.</p>
            <span id="staff_select" class="xmlb_form">
                <fieldset class="form_filters">
                    <legend>All Staff ({{$staffSchedules->count()}})</legend>
                    @foreach ($staffSchedules as $staffSchedule)
                        <div class="one_staff round_box_3px ">
                            <a href="/db_manage/mgr_staff_schedule.php?staff_id=37">{{$staffSchedule->first_name.' '.$staffSchedule->last_name}}</a>
                        </div>
                    @endforeach
                </fieldset>
            </span>
        @endif
    </div>
</div>
<div class="ui-widget-overlay ui-front d-none"></div>
{{-- popup module --}}
<div class="ui-dialog ui-widget1 ui-widget-content ui-corner-all ui-front ui-draggable ui-resizable ajax_obj ui-draggable-add-staff d-none" tabindex="-1" style="position: absolute; height: auto; width: 600px; top: 110.5px; left: 344px;" role="dialog" aria-describedby="ajax_obj" aria-labelledby="ui-id-15">
    <div class="ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix">
        <span id="ui-id-15" class="ui-dialog-title">New Staff</span>
        <button class="ui-button ui-widget1 ui-state-default ui-corner-all ui-button-icon-only ui-dialog-titlebar-close" role="button" aria-disabled="false" title="close">
            <span class="ui-button-icon-primary ui-icon ui-icon-closethick closethick-btn"></span>
            <span class="ui-button-text">close</span>
        </button>
    </div>
    <div id="ajax_obj" class="ui-dialog-content ui-widget-content create-form-content" style="width: auto">
        <span id="event_new" class="xmlb_form">
            <form method="post" id="frm_staff_new" action="" accept-charset="utf-8" enctype="multipart/form-data">
                @csrf
                <h3>New Staff</h3>
                <div class="line_break"></div>
                <p>
                    <label>First Name:</label>
                    <span class="element">
                        <input id="first_name" name="first_name" type="text" maxlength="40" size="27">
                    </span>
                    <span class="mand_sign">*</span>
                </p>
                <br>
                <p>
                    <label>Last Name:</label>
                    <span class="element">
                        <input id="last_name" name="last_name" type="text" maxlength="40" size="27">
                    </span>
                    <span class="mand_sign">*</span>
                </p>
                <br>
                <p>
                    <label>Email:</label>
                    <span class="element">
                        <input id="email" name="email" type="email" maxlength="50" size="34">
                    </span>
                    <span class="mand_sign">*</span>
                </p>
                <br>
                <p>
                    <label>Departments:</label>
                    <span class="element">
                        <select id="departments" name="departments[]" size="10" multiple="multiple">
                            @foreach ($departments as $department)
                                <option value="{{$department->id}}">{{$department->dept_name}}</option>
                            @endforeach
                        </select>
                    </span>
                    <span class="mand_sign">*</span>
                </p>
                <br>
                <p>
                    <label>Status:</label>
                    <span class="element">
                        <select id="staff_status" name="staff_status">
                            <option value="1">At Work</option>
                            <option value="2">On Leave</option>
                            <option value="3">Left</option>
                        </select>
                    </span>
                    <span class="mand_sign">*</span>
                </p>
                <br>
                <p>
                    <label>Uses Calendar:</label>
                    <span class="element">
                        <select id="is_on_calendar" name="is_on_calendar">
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </span>
                    <span class="mand_sign">*</span>
                </p>
                <br>
                <p>
                    <label>On Commission:</label>
                    <span class="element">
                        <select id="is_on_commission" name="is_on_commission">
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </span>
                    <span class="mand_sign">*</span>
                </p>
                <br>
                <button type="submit" id="staff_new_save" class="button radius-0">Save</button>
            </form>
        </span>
    </div>
</div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function () {
            $('.management_new_staff').click(function() {
                $('.ui-draggable-add-staff').removeClass('d-none');
                $('.ui-widget-overlay').removeClass('d-none');
            });
            $('.closethick-btn').click(function() {
                $('.ui-draggable-add-staff').addClass('d-none');
                $('.ui-widget-overlay').addClass('d-none');
                $('#frm_staff_new')[0].reset();
                $('#frm_staff_new').validate().resetForm();

            });
            $('#staff_list_clear_filter').click(function () { 
                window.location.href = "{{route('admin.staff-list.index')}}";                
            });
            $('#staff_list_delete').click(function() {
                if (confirm('Do you really want to delete the selected item(s)?')) {
                    var staffIds = [];
                    $('input[type="checkbox"][name="staff_ids[]"]:checked').each(function() {
                        staffIds.push($(this).val());
                    });
                    var url = "{{route('admin.staff-list.destroy',':id')}}";
                    url = url.replace(':id',staffIds.join(','));
                    if (staffIds.length > 0) {
                        $.ajax({
                            url: url,
                            type: 'DELETE',
                            data: {_token: "{{csrf_token()}}" },
                            success: function(response) {
                                if (response.success) {
                                    alert(response.message);
                                    window.location.reload();
                                }
                            },
                            error: function(xhr, status, error) {
                                console.error('Error deleting data:', error);
                            }
                        });
                    } else {
                        alert('Please select the items by clicking on the check box next to them.');
                    }
                }
            });
            $('#frm_staff_new').validate({
                rules:{
                    'first_name': 'required',
                    'last_name': 'required',
                    'email':{
                        required: true,
                        email: true
                    },
                    'departments[]': 'required',
                    'staff_status': 'required',
                    'is_on_calendar': 'required',
                    'is_on_commission': 'required',
                },
                messages:{
                    'first_name': 'Please enter First Name or First Name too short.',
                    'last_name': 'Please enter Last Name or Last Name too short.',
                    'email': 'Please enter Email or Email too short.',
                    'departments[]': 'Please select Departments or Departments too short.',
                    'staff_status': 'Please select Staff Status.',
                    'is_on_calendar': 'Please select is on calender.',
                    'is_on_commission': 'Please select is on commission.',
                }
            })
            $('#frm_staff_new').submit(function (e) { 
                e.preventDefault();
                if ($(this).valid()) {
                    var formData = $('#frm_staff_new').serialize();
                    $.ajax({
                        type: "POST",
                        url: "{{ route('admin.staff-list.store') }}",
                        data: formData,
                        success: function (response) {
                            if (response.success) {
                                alert(response.message);
                                window.location.reload();
                            } else {
                                alert(response.message);
                                window.location.reload();
                            }
                        },
                        error: function(xhr, status, error) {
                            // Handle errors
                            console.error(error);
                        }
                    });
                }
            });
            $('#perPageSelect').on('change', function() {
                const perPage = $(this).val();
                const url = new URL(window.location.href);
                url.searchParams.set('perPage', perPage);
                window.location.href = url.toString();
                $('#frm_staff_list').submit();
            });

            $('#pagination-links a').on('click', function(event) {
                event.preventDefault();
                const page = $(this).attr('href').split('page=')[1];
                const url = new URL(window.location.href);
                url.searchParams.set('page', page);
                window.location.href = url.toString();
            });

            var totalRecords = parseInt($('#total_records').text());
            var perPageSelect = parseInt($('#perPageSelect').val());
            updateRecordsDisplay(totalRecords, perPageSelect);
        });
        function updateRecordsDisplay(totalRecords, perPageSelect) {
            const currentPage = parseInt(getParameterByName('page')) || 1;
            const perPage = parseInt(getParameterByName('perPage')) || perPageSelect;
            const startRecord = (currentPage - 1) * perPage + 1;
            const endRecord = Math.min(startRecord + perPage - 1, totalRecords);
            const displayText = `Records: ${startRecord} to ${endRecord}`;
            $('#records-display').text(displayText);
        }

        // Function to get URL parameters
        function getParameterByName(name, url = window.location.href) {
            name = name.replace(/[\[\]]/g, '\\$&');
            const regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
                results = regex.exec(url);
            if (!results) return null;
            if (!results[2]) return '';
            return decodeURIComponent(results[2].replace(/\+/g, ' '));
        }
    </script>
@endsection