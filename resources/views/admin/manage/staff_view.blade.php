@extends('admin.layouts.master')
@section('title', "$staff->first_name  $staff->last_name Manage Staff")
@section('style')
    <style>
        .info_box {
            width: 49%;
            border: 1px solid #999;
            padding: 9px;
            float: left;
            min-height: 240px;
            vertical-align: top;
        }
        #account_info,
        #add_limit {
            margin-left: 12px;
        }
        .special_action {
            display: inline-block;
        } 
        legend {
            padding: 3px 9px;
            background: #E8CE78;
            margin: 6px;
        }
        #staff_schedule_plan_manage .product-list {
            border: 1px solid #999;
        }
        #staff_schedule_plan_manage .product-list td {
            border-bottom: none;
        }
        .alert.alert-error {
            background: #c91414;
            text-align: center;
            width: 470px;
            position: absolute;
            right: 80px;
            top: 107px;
            font-size: 16px;
        }
        #staff_account label,
        #staff_view label {
            width: 160px;
            display: inline-block;
            vertical-align: top;
            text-align: right;
        }
        #staff_account button {
            font-weight: 400;
        }
        .btn_toggle_training {
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
        form#login_user_this {
            display: inline;
        }
        .warning {
            padding: 3px 6px;
            display: inline-block;
            background: #DB241E;
            color: #fff;
            font-weight: bold;
        }
    </style>
@endsection
@section('content')
<div class="card">
    <h1>{{$staff->first_name.' '.$staff->last_name}} </h1>
</div>
@error('email')
    <div class="alert alert-error">
        {{ $message }}
    </div>
@enderror

<fieldset id="staff_info" class="info_box">
    <legend>Main Info</legend>
    <div class="line_break"></div>
    <span id="staff_view" class="xmlb_form">
        <div class="line_break"></div>
        <label>Email:</label>
        <span class="element">{{$staff->email}}</span>
        <div class="line_break"></div>
        <label>Departments:</label>
        <span class="short_help"></span>
        <span class="element">{{ implode(";",$staff->departments())}}</span>
        <div class="line_break"></div>
        <label>Status:</label>
        <span class="element">{{ ($staff->staff_status == 1) ? 'At Work' : (($staff->staff_status == 2) ? 'On Leave' : (($staff->staff_status == 3) ? 'Left' : '')) }}</span>
        <div class="line_break"></div>
        <label>Uses Calendar:</label>
        <span class="element">{{($staff->is_on_calendar == 1) ? 'Yes' : (($staff->is_on_calendar == 0) ? 'No' :'') }}</span>
        <div class="line_break"></div>
        <label>On Commission:</label>
        <span class="element">{{($staff->is_on_commission == 1) ? 'Yes' : (($staff->is_on_commission == 0) ? 'No' :'') }}</span>
        <div class="line_break"></div>
        <p align="right">
            <button id="staff_view_edit" type="button" class="button radius-0">Edit</button>
            <button type="button" id="staff_view_delete" data-staff_id="{{$staff->id}}" class="button radius-0">Delete</button>
            {{-- confirm('Are you sure you want to delete this Staff?')  --}}
            <button type="button" id="staff_view_misc" class="button radius-0" >Add Email Folder</button>
        </p>
    </span>
</fieldset>
<fieldset id="account_info" class="info_box">
    <legend>Login Account</legend>
    <div class="line_break"></div>
    @if (isset($staff->user))
        <div class="line_break"></div>
        <span id="staff_account" class="xmlb_form">
            <label>First Name:</label>
            <span class="short_help"></span>
            <span class="element">{{$staff->user->first_name}}</span>
            <span class="mand_sign"></span>
            <div class="line_break"></div>
            <label>Last Name:</label>
            <span class="short_help"></span>
            <span class="element">{{$staff->user->last_name}}</span>
            <span class="mand_sign"></span>
            <div class="line_break"></div>
            <label>Email Address:</label>
            <span class="short_help"></span>
            <span class="element">{{$staff->user->email}}</span>
            <span class="mand_sign"></span>
            <div class="line_break"></div>
            <label>Status:</label>
            <span class="element">{{($staff->user->account_status == 1)?'Active':'Disabled'}}</span>
            <span class="mand_sign"></span>
            <div class="line_break"></div>
            <p>
                <label>Training Mode:</label>
                <span class="element trainig_mode live">{{($staff->user->is_in_training_mode == 1)?'Live':'Training Mode'}}</span> 
                @if ($staff->user->is_in_training_mode == 1)
                    <span class="btn_toggle_training small_button" data-training_mode="0" data-user_id="{{$staff->user->id}}">Put in Training</span>
                @else
                    <span class="btn_toggle_training small_button" data-training_mode="1" data-user_id="{{$staff->user->id}}">Back to Live</span>
                @endif
            </p>
            <div class="line_break"></div>
            <label>User Groups:</label>
            @php
                $userGroups = json_decode($staff->user->user_groups);
            @endphp
            <span class="element">{{ implode(',',$userGroups) }}</span>
            <span class="mand_sign"></span>
            <div class="line_break"></div>
            <label>Access Rights:</label>
            @php
                $accessRights = json_decode($staff->user->db_access_rights);
                if ($accessRights === null) {
                    $accessRights = [];
                }
            @endphp
            <span class="element">
                @if (count($accessRights) == 4)
                    {{'All'}}
                @else
                    {{$staff->user->db_access_rights??'n/a'}}
                @endif
            </span>
            <span class="mand_sign"></span>
            <div class="line_break"></div>
            <label>Reg Date:</label>
            <span class="short_help"></span>
            <span class="element">{{ date('D, M d- Y', strtotime($staff->user->reg_date)) }}</span>
            <span class="mand_sign"></span>
            <div class="line_break"></div>
            @if ($staff->user->last_login != null)
                <label>Last Login:</label>
                <span class="short_help"></span>
                <span class="element">{{ date('M d, Y h:i', strtotime($staff->user->last_login)) }}</span>
                <span class="mand_sign"></span>
            @endif
            <div class="line_break"></div>
            <div class="line_break"></div>
            <button type="button" id="staff_account_edit" class="button radius-0">Email Account Info</button>
            <button  type="button" class="button radius-0 change_account_password">Change Password</button>
            <button  type="button" class="button radius-0 staff_account_edit">Update Account</button>
            @if ($staff->user->account_status == 1)
                <button type="button" data-account_status="0" data-user_id="{{$staff->user->id}}" class="button radius-0 account_status_update" >Deactivate</button>
            @else
                <button type="button" data-account_status="1" data-user_id="{{$staff->user->id}}" class="button radius-0 account_status_update" >Activate</button>
            @endif
            <form action="{{ route('admin.authenticate') }}" id="login_user_this" method="post">
                @csrf
                <input type="hidden" name="user_id" value="{{$staff->user->id}}">
                <button type="button" id="login_user_this_btn" class="button radius-0" >Login as this User</button>
            </form>
        </span>
    @else    
        <span id="staff_account" class="xmlb_form">
            <h2>Login account has not been created for this staff</h2>
            <button id="staff_account_create" class="button radius-0">Create Account</button>
        </span>
    @endif
</fieldset>
<fieldset id="" class="info_box">
    <legend>Schedule</legend>
    <div class="line_break"></div>
    <span id="staff_sched_plans" class="xmlb_form">
        <h1>Weekly Schedule
            <div class="special_action">
                <button type="button" id="update_staff_schedule" class="button radius-0">Update</button>
            </div>
        </h1>
        <div class="line_break"></div>
        <p align="right">Records: 1 to {{$staff->staffSchedulePlans->count()}} of {{$staff->staffSchedulePlans->count()}}</p>

        <table class="product-list table mt-20">
            <tbody>
                <tr>
                    <th><a href="#"  title="Click to sort by Day Of Week">Day Of Week</a></th>
                    <th><a href="#" title="Click to sort by Start Time">Start Time</a></th>
                    <th><a href="#" title="Click to sort by End Time">End Time</a></th>
                    <th><a href="#" title="Click to sort by Repeat">Repeat</a></th>
                    <th class="actions"></th>
                </tr>
                @php
                    $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
                @endphp
                @foreach ($staff->staffSchedulePlans as $key => $staffSchedulePlan)
                    <tr>
                        <td>{{ $days[$key] }}{!!($staffSchedulePlan->is_off == 1)?'<span class="warning" style="float: right;">** OFF **</span>':''!!}</td>
                        <td>{{ $staffSchedulePlan->start_time ? date('h:ia',strtotime($staffSchedulePlan->start_time)):'' }}</td>
                        <td>{{ $staffSchedulePlan->end_time ? date('h:ia',strtotime($staffSchedulePlan->end_time)):'' }}</td>
                        <td>{{ ($staffSchedulePlan->is_off == 1)?'':($staffSchedulePlan->repeat_each_week ? 'Every Week':'') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </span>
</fieldset>
<fieldset id="add_limit" class="info_box">
    <legend>Limits</legend>
    <div class="line_break"></div>
    <span id="user_limits" class="xmlb_form">
        <h1>No Limits on this User
            <div class="special_action">
                <button type="nutton" id="user_limit_add" class="button radius-0">Add Limit</button>
            </div>
        </h1>
        <div class="line_break"></div>
        <h2>This means he/she can connect from any computer at any time.</h2>
    </span>
</fieldset>
<div class="ui-widget-overlay ui-front d-none"></div>
{{-- popup module --}}
<div class="ui-dialog ui-widget1 ui-widget-content ui-corner-all ui-front ui-draggable ui-resizable ajax_obj ui-draggable-edit-staff d-none" tabindex="-1" style="position: absolute; height: auto; width: 600px; top: 110.5px; left: 344px;" role="dialog" aria-describedby="ajax_obj" aria-labelledby="ui-id-15">
    <div class="ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix">
        <span id="ui-id-15" class="ui-dialog-title">Staff Edit</span>
        <button class="ui-button ui-widget1 ui-state-default ui-corner-all ui-button-icon-only ui-dialog-titlebar-close" role="button" aria-disabled="false" title="close">
            <span class="ui-button-icon-primary ui-icon ui-icon-closethick closethick-btn"></span>
            <span class="ui-button-text">close</span>
        </button>
    </div>
    <div id="ajax_obj" class="ui-dialog-content ui-widget-content create-form-content" style="width: auto">
        <span id="event_new" class="xmlb_form">
            <form method="post" id="frm_staff_edit" action="{{ route('admin.staff-list.update',$staff->id) }}" accept-charset="utf-8" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="line_break"></div>
                <p>
                    <label>First Name:</label>
                    <span class="element">
                        <input id="first_name" name="first_name" value="{{ $staff->first_name }}" type="text" maxlength="40" size="27">
                    </span>
                    <span class="mand_sign">*</span>
                </p>
                <br>
                <p>
                    <label>Last Name:</label>
                    <span class="element">
                        <input id="last_name" name="last_name" value="{{ $staff->last_name }}" type="text" maxlength="40" size="27">
                    </span>
                    <span class="mand_sign">*</span>
                </p>
                <br>
                <p>
                    <label>Email:</label>
                    <span class="element">
                        <input id="email" name="email" type="email" value="{{ $staff->email }}" maxlength="50" size="34">
                    </span>
                    <span class="mand_sign">*</span>
                </p>
                <br>
                <p>
                    <label>Departments:</label>
                    <span class="element">
                        <select id="departments" name="departments[]" size="10" multiple="multiple">
                            @foreach ($departments as $department)
                                <option value="{{$department->id}}" {{in_array( $department->id,$staff->departments )? 'selected':''}}>{{$department->dept_name}}</option>
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
                            <option value="1" {{ $staff->staff_status ==1? 'selected':'' }}>At Work</option>
                            <option value="2" {{ $staff->staff_status ==2? 'selected':'' }}>On Leave</option>
                            <option value="3" {{ $staff->staff_status ==3? 'selected':'' }}>Left</option>
                        </select>
                    </span>
                    <span class="mand_sign">*</span>
                </p>
                <br>
                <p>
                    <label>Uses Calendar:</label>
                    <span class="element">
                        <select id="is_on_calendar" name="is_on_calendar">
                            <option value="1" {{ $staff->is_on_calendar == 1? 'selected':'' }}>Yes</option>
                            <option value="0" {{ $staff->is_on_calendar == 0? 'selected':'' }}>No</option>
                        </select>
                    </span>
                    <span class="mand_sign">*</span>
                </p>
                <br>
                <p>
                    <label>On Commission:</label>
                    <span class="element">
                        <select id="is_on_commission" name="is_on_commission">
                            <option value="1" {{ $staff->is_on_commission == 1? 'selected':'' }}>Yes</option>
                            <option value="0" {{ $staff->is_on_commission == 0? 'selected':'' }}>No</option>
                        </select>
                    </span>
                    <span class="mand_sign">*</span>
                </p>
                <br>
                <button type="submit" id="staff_edit_save" class="button radius-0">Save</button>
            </form>
        </span>
    </div>
</div>
{{-- create staff account --}}
<div class="ui-dialog ui-widget1 ui-widget-content ui-corner-all ui-front ui-draggable ui-resizable ajax_obj ui-draggable-create-staff-account d-none" tabindex="-1" style="position: absolute; height: auto; width: 600px; top: 110.5px; left: 344px;" role="dialog" aria-describedby="ajax_obj" aria-labelledby="ui-id-15">
    <div class="ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix">
        <span id="ui-id-15" class="ui-dialog-title">Create Staff Account</span>
        <button class="ui-button ui-widget1 ui-state-default ui-corner-all ui-button-icon-only ui-dialog-titlebar-close" role="button" aria-disabled="false" title="close">
            <span class="ui-button-icon-primary ui-icon ui-icon-closethick closethick-btn"></span>
            <span class="ui-button-text">close</span>
        </button>
    </div>
    <div id="ajax_obj" class="ui-dialog-content ui-widget-content create-form-content" style="width: auto">
        <span id="event_new" class="xmlb_form">
            <form method="post" id="frm_create_account" action="{{route('admin.login.post')}}" accept-charset="utf-8" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="staff_id" value="{{$staff->id}}">
                <div class="line_break"></div>
                <p>
                    <label>First Name:</label>
                    <span class="element">
                        <input id="account_first_name" name="first_name" value="{{ $staff->first_name }}" type="text" maxlength="40" size="27">
                    </span>
                    <span class="mand_sign">*</span>
                </p>
                <br>
                <p>
                    <label>Last Name:</label>
                    <span class="element">
                        <input id="account_last_name" name="last_name" value="{{ $staff->last_name }}" type="text" maxlength="40" size="27">
                    </span>
                    <span class="mand_sign">*</span>
                </p>
                <br>
                <p>
                    <label>Email:</label>
                    <span class="element">
                        <input id="account_email" name="email" type="email" value="{{ $staff->email }}" maxlength="50" size="34">
                    </span>
                    <span class="mand_sign">*</span>
                </p>
                <br>
                <p>
                    <label>Password:</label>
                    <span class="element">
                        <input name="password" id="password" type="text" value="" maxlength="32" size="15" title="Your Password">
                    </span>
                    <span class="mand_sign">*</span>
                </p>
                <br>
                <p>
                    <label>User Groups:</label>
                    <span class="element">
                        <select id="user_groups" name="user_groups[]" size="6" multiple="multiple">
                            <option value="corp">Corporate</option>
                            <option value="corpsales">Corporate Sales</option>
                            <option value="acct">Accounting</option>
                            <option value="sales">Sales</option>
                            <option value="eventmgr">Event Manager</option>
                            <option value="kitchen">Kitchen</option>
                            <option value="restn">Restaurant</option>
                        </select>
                    </span>
                    <span class="mand_sign">*</span>
                </p>
                <br>
                <button type="submit" id="account_staff_edit_save" class="button radius-0">Save</button>
            </form>
        </span>
    </div>
</div>
{{-- weekly schedule --}}
<div class="ui-dialog ui-widget1 ui-widget-content ui-corner-all ui-front ui-draggable ui-resizable ajax_obj create-popup-form ui-draggable-update-staff-schedule d-none" tabindex="-1" style="width: 776px; top: 211px; left: 247.5px;" role="dialog" aria-describedby="ajax_obj" aria-labelledby="ui-id-15">
    <div class="ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix">
        <span id="ui-id-15" class="ui-dialog-title">Update Staff Schedule</span>
        <button class="ui-button ui-widget1 ui-state-default ui-corner-all ui-button-icon-only ui-dialog-titlebar-close" role="button" aria-disabled="false" title="close">
            <span class="ui-button-icon-primary ui-icon ui-icon-closethick closethick-btn"></span>
            <span class="ui-button-text">close</span>
        </button>
    </div>
    <div id="ajax_obj" class="ui-dialog-content ui-widget-content create-form-content" style="width: auto">
        <span id="event_new" class="xmlb_form">
            <h3>Update {{$staff->first_name.' '. $staff->last_name}} Schedule</h3>
            <p>Note: This will affect only the future schedule of this member of staff.</p>
            <div class="line_break"></div>
            <form action="{{route('admin.manage.weekly-staff-schedule-store')}}" id="staff_schedule_plan_manage" method="POST" novalidate="novalidate">
                @csrf
                <input type="hidden" name="staff_id" value="{{$staff->id}}">
                <table class="product-list table mt-20">
                    <tbody>
                        <tr>
                            <th>Day of Week</th>
                            <th>Is Off</th>
                            <th>Start Time</th>
                            <th>End Time</th>
                            <th>Repeat</th>
                        </tr>
                        @php
                            $daysOfWeek = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
                        @endphp
                        @foreach ($daysOfWeek as $dayIndex => $day)
                        @php
                            $isOff = $staff->staffSchedulePlans[$dayIndex]['is_off'] ?? 0;
                            $start = $staff->staffSchedulePlans[$dayIndex]['start_time'] ?? '';
                            $end = $staff->staffSchedulePlans[$dayIndex]['end_time'] ?? '';
                            $repeat = $staff->staffSchedulePlans[$dayIndex]['repeat_each_week'] ?? 1;
                            $dayIndex +=1; 
                        @endphp
                            <tr class="supplier-row">
                                <td>{{ $day }}</td>
                                <td><input type="checkbox" name="is_off_{{ $dayIndex }}" id="is_off_{{ $dayIndex }}" {{ $isOff ? 'checked' : '' }}></td>
                                <td><input type="time" class="time" name="start_{{ $dayIndex }}" id="start_{{ $dayIndex }}" value="{{ $start ? date('H:i',strtotime($start)):'' }}"></td>
                                <td><input type="time" class="time" name="end_{{ $dayIndex }}" id="end_{{ $dayIndex }}" value="{{ $end ? date('H:i',strtotime($end)):'' }}"></td>
                                <td><input type="text" class="repeats" name="repeat_{{ $dayIndex }}" id="repeat_{{ $dayIndex }}" value="{{ $repeat }}"></td>
                            </tr>
                        @endforeach
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
{{-- add limit --}}
<div class="ui-dialog ui-widget ui-widget-content ui-corner-all ui-front ui-draggable ui-resizable ajax_obj create-popup-form ui-draggable-add-limit d-none" style="position: absolute; height: auto; width: 480px; top: 364.5px; left: 417.5px;" tabindex="-1" role="dialog" aria-describedby="ajax_obj" aria-labelledby="ui-id-27">
    <div class="ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix">
        <span id="ui-id-27" class="ui-dialog-title">Limit this User</span>
        <button class="ui-button ui-widget ui-state-default ui-corner-all ui-button-icon-only ui-dialog-titlebar-close" role="button" aria-disabled="false" title="close">
            <span class="ui-button-icon-primary ui-icon ui-icon-closethick closethick-btn"></span>
            <span class="ui-button-text">close</span>
        </button>
    </div>
    <div id="ajax_obj" class="ui-dialog-content ui-widget-content" style="width: auto; min-height: 101px; max-height: none; height: auto;">
        <span id="user_limit_new" class="xmlb_form">
            <form method="post" id="frm_user_limit_new" action="" accept-charset="utf-8" enctype="multipart/form-data">
                <label>Type:</label>
                <span class="element">
                    <select id="user_limit_type" name="user_limit_type">
                        <option value="" selected="selected">----</option>
                        <option value="1">Limit by IP (This Office Only)</option>
                        <option value="2">Set Cookie (This Computer Only)</option>
                    </select>
                </span>
                <span class="mand_sign">*</span>
                <div class="line_break"></div>
                <label>Name:</label>
                <span class="element">
                    <input id="user_limit_name" name="user_limit_name" type="text" maxlength="80" size="40" title="A name or title given to this limit to remember what it was">
                </span>
                <span class="mand_sign">*</span>
                <div class="line_break"></div>
                <div class="form_footer">
                    <button type="submit" id="user_limit_new_misc" class="button" >Generate Limit</button>
                </div>
            </form>
        </span>
    </div>
</div>
{{-- change password --}}
@if ($staff->user)   
    <div class="ui-dialog ui-widget1 ui-widget-content ui-corner-all ui-front ui-draggable ui-resizable ajax_obj ui-draggable-set-password d-none" tabindex="-1" style="position: absolute; height: auto; width: 600px; top: 156.5px; left: 344px;" role="dialog" aria-describedby="ajax_obj" aria-labelledby="ui-id-15">
        <div class="ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix">
            <span id="ui-id-15" class="ui-dialog-title">Set Satff's Password</span>
            <button class="ui-button ui-widget1 ui-state-default ui-corner-all ui-button-icon-only ui-dialog-titlebar-close" role="button" aria-disabled="false" title="close">
                <span class="ui-button-icon-primary ui-icon ui-icon-closethick closethick-btn"></span>
                <span class="ui-button-text">close</span>
            </button>
        </div>
        <div id="ajax_obj" class="ui-dialog-content ui-widget-content create-form-content" style="width: auto">
            <span id="event_new" class="xmlb_form">
                <form method="post" id="frm_change_pwd" action="{{route('admin.login.update',$staff->user->id)}}" accept-charset="utf-8" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="staff_id" value="{{$staff->id}}">
                    <input type="hidden" name="set_password" value="pwd_change">
                    <h3>Please enter the new password twice</h3>
                    <div class="line_break"></div>
                    <p>
                        <label>New Password:</label>
                        <span class="element">
                            <input name="change_pwd" id="change_pwd" type="password" value="" maxlength="32" size="15" title="Your Password">
                        </span>
                        <span class="mand_sign">*</span>
                    </p>
                    <br>
                    <p>
                        <label>Re-type Password:</label>
                        <span class="element">
                            <input name="change_re_pwd" id="change_re_pwd" type="password" value="" maxlength="32" size="15" title="Password">
                        </span>
                        <span class="mand_sign">*</span>
                    </p>
                    <br>
                    <button type="submit" id="pwd_change_save" class="button radius-0">Save</button>
                </form>
            </span>
        </div>
    </div>
@endif
{{-- update user --}}
@if ($staff->user)   
    <div class="ui-dialog ui-widget1 ui-widget-content ui-corner-all ui-front ui-draggable ui-resizable ajax_obj ui-draggable-update-user-act d-none" tabindex="-1" style="position: absolute; height: auto; width: 600px; top: 156.5px; left: 344px;" role="dialog" aria-describedby="ajax_obj" aria-labelledby="ui-id-15">
        <div class="ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix">
            <span id="ui-id-15" class="ui-dialog-title">Update User Account Info.</span>
            <button class="ui-button ui-widget1 ui-state-default ui-corner-all ui-button-icon-only ui-dialog-titlebar-close" role="button" aria-disabled="false" title="close">
                <span class="ui-button-icon-primary ui-icon ui-icon-closethick closethick-btn"></span>
                <span class="ui-button-text">close</span>
            </button>
        </div>
        <div id="ajax_obj" class="ui-dialog-content ui-widget-content create-form-content" style="width: auto">
            <span id="event_new" class="xmlb_form">
                <form method="post" id="frm_user_edit" action="{{route('admin.login.update',$staff->user->id)}}" accept-charset="utf-8" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="staff_id" value="{{$staff->id}}">
                    <input type="hidden" name="update_user_account" value="update_user">
                    <p>
                        <label>First Name:</label>
                        <span class="element">
                            <input id="user_edit_first_name" name="first_name" value="{{ $staff->first_name }}" type="text" maxlength="40" size="27">
                        </span>
                        <span class="mand_sign">*</span>
                    </p><br>
                    <p>
                        <label>Last Name:</label>
                        <span class="element">
                            <input id="user_edit_last_name" name="last_name" value="{{ $staff->last_name }}" type="text" maxlength="40" size="27">
                        </span>
                        <span class="mand_sign">*</span>
                    </p><br>
                    <p>
                        <label>Email:</label>
                        <span class="element">
                            <input id="user_edit_email" name="email" type="email" value="{{ $staff->email }}" maxlength="50" size="34">
                        </span>
                        <span class="mand_sign">*</span>
                    </p><br>
                    <p>
                        @php
                            $userGroups = json_decode($staff->user->user_groups)
                        @endphp
                        <label>User Groups:</label>
                        <span class="element">
                            <select id="user_edit_groups" name="user_groups[]" size="6" multiple="multiple">
                                <option value="corp" {{in_array('corp',$userGroups)? 'selected':''}}>Corporate</option>
                                <option value="corpsales" {{in_array('corpsales',$userGroups)? 'selected':''}}>Corporate Sales</option>
                                <option value="acct" {{in_array('acct',$userGroups)? 'selected':''}}>Accounting</option>
                                <option value="sales" {{in_array('sales',$userGroups)? 'selected':''}}>Sales</option>
                                <option value="eventmgr" {{in_array('eventmgr',$userGroups)? 'selected':''}}>Event Manager</option>
                                <option value="kitchen" {{in_array('kitchen',$userGroups)? 'selected':''}}>Kitchen</option>
                                <option value="restn" {{in_array('restn',$userGroups)? 'selected':''}}>Restaurant</option>
                            </select>
                        </span>
                        <span class="mand_sign">*</span>
                    </p><br>
                    <p>
                        @php
                            $accessRights = json_decode($staff->user->db_access_rights);
                            if ($accessRights === null) { $accessRights = []; }
                        @endphp
                        <label>Access Rights:</label>
                        <span class="element">
                            <select id="user_edit_db_access_rights" name="user_edit_db_access_rights[]" size="4" multiple="multiple">
                                <option value="1" {{in_array('1',$accessRights)? 'selected':''}}>Read</option>
                                <option value="2" {{in_array('2',$accessRights)? 'selected':''}}>Add</option>
                                <option value="3" {{in_array('3',$accessRights)? 'selected':''}}>Edit</option>
                                <option value="4" {{in_array('4',$accessRights)? 'selected':''}}>Delete</option>
                            </select>
                        </span>
                        <span class="mand_sign">*</span>
                    </p><br>
                    <button type="submit" id="user_update" class="button radius-0">Save</button>
                </form>
            </span>
        </div>
    </div>
@endif
@endsection
@section('scripts')
    <script>
        $(document).ready(function () {
            setTimeout(function() {
                $('.alert.alert-error').hide();
            }, 3000);
            $('#staff_view_edit').click(function() {
                $('.ui-draggable-edit-staff').removeClass('d-none');
                $('.ui-widget-overlay').removeClass('d-none');
            });
            $('#staff_account_create').click(function() {
                $('.ui-draggable-create-staff-account').removeClass('d-none');
                $('.ui-widget-overlay').removeClass('d-none');
            });
            $('.change_account_password').click(function() {
                $('.ui-draggable-set-password').removeClass('d-none');
                $('.ui-widget-overlay').removeClass('d-none');
            });
            $('#update_staff_schedule').click(function() {
                $('.ui-draggable-update-staff-schedule').removeClass('d-none');
                $('.ui-widget-overlay').removeClass('d-none');
            });
            $('#user_limit_add').click(function() {
                $('.ui-draggable-add-limit').removeClass('d-none');
                $('.ui-widget-overlay').removeClass('d-none');
            });
            $('.staff_account_edit').click(function() {
                $('.ui-draggable-update-user-act').removeClass('d-none');
                $('.ui-widget-overlay').removeClass('d-none');
            });
            $('.closethick-btn').click(function() {
                $('.ui-draggable-edit-staff, .ui-draggable-create-staff-account').addClass('d-none');
                $('.ui-draggable-update-staff-schedule, .ui-draggable-add-limit').addClass('d-none');
                $('.ui-draggable-set-password, .ui-draggable-update-user-act').addClass('d-none');
                $('.ui-widget-overlay').addClass('d-none');
                $('#frm_staff_new, #frm_staff_edit, #frm_change_pwd').validate().resetForm();
            });
            $('#frm_staff_edit').validate({
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
            $('#frm_user_edit').validate({
                rules:{
                    'first_name': 'required',
                    'last_name': 'required',
                    'email':{
                        required: true,
                        email: true
                    },
                    'user_groups[]': 'required',
                    'user_edit_db_access_rights[]': 'required',
                },
                messages:{
                    'first_name': 'Please enter First Name or First Name too short.',
                    'last_name': 'Please enter Last Name or Last Name too short.',
                    'email': 'Please enter Email or Email too short.',
                    'user_groups[]': 'Please select User Group or User Group  too short.',
                    'user_edit_db_access_rights[]': 'Please select Access Rights or Access Rights  too short.',
                }
            })
            $('#frm_create_account').validate({
                rules:{
                    'first_name': 'required',
                    'last_name': 'required',
                    'email':{
                        required: true,
                        email: true
                    },
                    'password': {
                        required: true,
                        minlength: 6
                    },
                    'user_groups[]': 'required',
                },
                messages:{
                    'first_name': 'Please enter First Name or First Name too short.',
                    'last_name': 'Please enter Last Name or Last Name too short.',
                    'email': 'Please enter Email or Email too short.',
                    'password': {
                        required: 'Please enter a new password.',
                        minlength: 'New password must be at least {6} characters long.'
                    },
                    'user_groups[]': 'Please select User Groups or User Groups too short.',
                }
            })
            $('#frm_change_pwd').validate({
                rules: {
                    'change_pwd': {
                        required: true,
                        minlength: 6
                    },
                    'change_re_pwd': {
                        required: true,
                        equalTo: '#change_pwd'
                    }
                },
                messages: {
                    'change_pwd': {
                        required: 'Please enter a new password.',
                        minlength: 'New password must be at least {6} characters long.'
                    },
                    'change_re_pwd': {
                        required: 'Please re-type the password.',
                        equalTo: 'Passwords do not match.'
                    }
                }
            });

            $('#staff_view_delete').click(function() {
                if (confirm('Do you really want to delete the selected item(s)?')) {
                    var staffId = $(this).data('staff_id');
                    var url = "{{route('admin.staff-list.destroy',':id')}}";
                    url = url.replace(':id',staffId);
                    $.ajax({
                        url: url,
                        type: 'DELETE',
                        data: {_token: "{{csrf_token()}}" },
                        success: function(response) {
                            if (response.success) {
                                alert(response.message);
                                window.location.href = "{{ route('admin.staff-list.index',['staff_status' => 1]) }}"
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error('Error deleting data:', error);
                        }
                    });
                }
            });
            // change training mode
            $('.btn_toggle_training').click(function (e) { 
                e.preventDefault();
                var training_mode = $(this).data('training_mode');
                var user_id = $(this).data('user_id');
                if (training_mode == 1) {
                    if (!confirm("This will put this user back to live mode. Continue?")) return;
                } else {
                    if (!confirm("Put this user in training mode?")) return;
                }
                var url = "{{route('admin.login.update',':id')}}";
                url = url.replace(':id',user_id)
                $.ajax({
                    type: "POST",
                    url: url,
                    data: {training_mode:training_mode, _token: "{{csrf_token()}}", trai_mode:"change_mode"},
                    success: function (response) {
                        window.location.reload();
                    }
                });
                
            });
            // change account status
            $('.account_status_update').click(function (e) { 
                e.preventDefault();
                var account_status = $(this).data('account_status');
                var user_id = $(this).data('user_id');
                if (account_status == 1) {
                    if (!confirm("Are you sure you want to activate this staff?")) return;
                } else {
                    if (!confirm("Are you sure you want to deactivate this staff?")) return;
                }
                var url = "{{route('admin.login.update',':id')}}";
                url = url.replace(':id',user_id)
                $.ajax({
                    type: "POST",
                    url: url,
                    data: {account_status:account_status, _token: "{{csrf_token()}}", acc_status:"change_status"},
                    success: function (response) {
                        window.location.reload();
                    }
                });
                
            });
            // login as this member
            $('#login_user_this_btn').click(function () { 
                if(confirm('This will log you out and login as this member of staff. Continue?')) return  $('#login_user_this').submit(); 
                else return false ;
            });
            // staff_schedule_plan_manage validate
            $('#staff_schedule_plan_manage').on('submit', function(event) {
                let isValid = true;
                const timeInputs = $('.time');

                timeInputs.each(function() {
                    const timeValue = $(this).val();
                    if (timeValue !== '') {
                        const timeParts = timeValue.split(':');
                        const hours = parseInt(timeParts[0]);
                        const minutes = parseInt(timeParts[1]);
                        if (hours < 0 || hours > 24 || minutes < 0 || minutes >= 60) {
                            isValid = false;
                            alert('Invalid time input. Hours must be between 00 and 24, and minutes between 00 and 59.');
                            return false; // Exit the loop
                        }
                    }
                });

                if (!isValid) {
                    event.preventDefault();
                }
            });
        });
    </script>
@endsection