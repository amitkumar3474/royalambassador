@extends('admin.layouts.master')
@section('title', 'My Profile')
@section('content')
<div class="title_bar card">
    <h1> My Profile </h1>
</div>
<div class="cus-row ">
    <div class="col-6 main-order-item">
        <div class="global-form main-form">
            <h3>Profile Info</h3>
            <div class="row">
                <div class="col-4 mb-10">
                    <label>Name:</label>
                </div>
                <div class="col-8 mb-10 pl-0">
                    <span class="element">{{auth()->user()->name??''}}</span>
                    <span class="mand_sign"></span>
                </div>
                <div class="col-4 mb-10">
                    <label>First Name:</label>
                </div>
                <div class="col-8 mb-10 pl-0">
                    <span class="element">{{auth()->user()->first_name??''}}</span>
                    <span class="mand_sign"></span>
                </div>
                <div class="col-4 mb-10">
                    <label>Last Name:</label>
                </div>
                <div class="col-8 mb-10 pl-0">
                    <span class="element">{{auth()->user()->last_name??''}}</span>
                    <span class="mand_sign"></span>
                </div>
                <div class="col-4 mb-10">
                    <label>Email Address:</label>
                </div>
                <div class="col-8 mb-10 pl-0">
                    <span class="element">{{auth()->user()->email??''}}</span>
                    <span class="mand_sign"></span>
                </div>
                <div class="col-8 mb-10 pl-0">
                    <button id="user_view_edit" class="button font-bold radius-0">Edit</button>
                    <button id="user_view_change_password" class="button font-bold radius-0">Change Password</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="line_break"></div>
<div class="cus-row ">
    <div class="col-6 main-order-item">
        <span id="connected_emails" class="xmlb_form">
            <div class="card">
                <h2>Connected Emails
                    <button class="button font-bold connected_emails">+</button>
                </h2>
                <div class="line_break"></div>
                <h3>Setup email acount to send and receive email from email server</h3>
                <hr>
                <p align="right">Records: 0 to 0 of 0 | Show: 
                    <select name="show_records" id="show_records" >
                        <option value="all">All</option>
                        <option value="1" selected="">1</option>
                        <option value="10">10</option>
                        <option value="30">30</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                </p>
                <table class="product-list table mt-20">
                    <tbody>
                        <tr>
                            <th>
                                <a href="#">Server Addr.</a> 
                            </th>
                            <th>
                                <a href="#">Protocol</a> 
                            </th>
                            <th>
                                <a href="#">Port</a> 
                            </th>
                            <th>
                                <a href="#">Security</a>
                            </th>
                            <th>
                                <a href="#">User Name</a> 
                            </th>
                            <th>Default Outgoing</th>
                            <th></th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </span>
    </div>
    <div class="col-6">
        <div class="global-form corporate-form">
            <h2>System Info </h2>
            <hr>
            <div class="row">
                <div class="col-4 mb-10">
                    <label class="align-right d-block">User:</label>
                </div>
                <div class="col-8 mb-10 pl-0">
                    <span class="element">{{auth()->user()->name??''}}</span>
                    <span class="mand_sign"></span>
                </div>
                <div class="col-4 mb-10">
                    <label class="align-right d-block">Login:</label>
                </div>
                <div class="col-8 mb-10 pl-0">
                    <span class="element">---</span>
                    <span class="mand_sign"></span>
                </div>
                <div class="col-4 mb-10">
                    <label class="align-right d-block">User Since:</label>
                </div>
                @php
                    $carbonDate = \Carbon\Carbon::parse(auth()->user()->created_at??'');
                    $formattedDate = $carbonDate->format('D M j, Y');
                @endphp
                <div class="col-8 mb-10 pl-0">
                    <span class="element">{{ $formattedDate }}</span>
                    <span class="mand_sign"></span>
                </div>
                <div class="col-4 mb-10">
                    <label class="align-right d-block">Login Id:</label>
                </div>
                <div class="col-8 mb-10 pl-0">
                    <span class="element">{{auth()->user()->id??''}}:  {{auth()->user()->email??''}}</span>
                    <span class="mand_sign"></span>
                </div>
                <div class="col-4 mb-10">
                    <label class="align-right d-block">Role:</label>
                </div>
                <div class="col-8 mb-10 pl-0">
                    <span class="element">----</span>
                    <span class="mand_sign"></span>
                </div>
                <div class="col-4 mb-10">
                    <label class="align-right d-block">Training Mode:</label>
                </div>
                <div class="col-8 mb-10 pl-0">
                    <span class="element">Off</span>
                    <span class="mand_sign"></span>
                </div>
                <div class="col-4 mb-10">
                    <label class="align-right d-block">Full Info:</label>
                </div>
                <div class="col-8 mb-10 pl-0">
                    <span class="element"><a href="https://www.royalambassador.ca/sys_user/db_user_profile_view.php?show_sys_info=yes">Show</a></span>
                    <span class="mand_sign"></span>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="ui-widget-overlay ui-front d-none" style="display: none;"></div>
{{-- edit user --}}
<div class="ui-dialog ui-widget1 ui-widget-content ui-corner-all ui-front ui-draggable ui-resizable ajax_obj create-popup-form ui-draggable-edit-user d-none" tabindex="-1" style="top: 166px;" role="dialog" aria-describedby="ajax_obj" aria-labelledby="ui-id-15">
    <div class="ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix">
        <span id="ui-id-15" class="ui-dialog-title">Edit Profile</span>
        <button class="ui-button ui-widget1 ui-state-default ui-corner-all ui-button-icon-only ui-dialog-titlebar-close" role="button" aria-disabled="false" title="close">
            <span class="ui-button-icon-primary ui-icon ui-icon-closethick closethick-user-edit"></span>
            <span class="ui-button-text">close</span>
        </button>
    </div>
    <div id="ajax_obj" class="ui-dialog-content ui-widget-content create-form-content">
        <span id="event_new" class="xmlb_form">
            <form action="">
                <h2>Edit my Profile</h2>
                @csrf
                <div class="row">
                    <div class="col-4 mb-10">
                        <label class="align-right d-block">First Name:</label>
                    </div>
                    <div class="col-8 mb-10 pl-0">
                        <input name="first_name" size="34" type="text" title="First Name">
                        <span class="mand_sign">*</span>
                    </div>
                    <div class="col-4 mb-10">
                        <label class="align-right d-block">Last Name:</label>
                    </div>
                    <div class="col-8 mb-10 pl-0">
                        <input name="last_name" size="34" type="text" title="Last Name">
                        <span class="mand_sign">*</span>
                    </div>
                    <div class="col-4 mb-10">
                        <label class="align-right d-block">Email Address:</label>
                    </div>
                    <div class="col-8 mb-10 pl-0">
                        <input size="34" class="general_email" name="email" type="text" title="Email Id">
                    </div>
                    <div class="col-4 mb-10">
                        <label class="align-right d-block">Email Signature:</label>
                    </div>
                    <div class="col-8 mb-10 pl-0">
                        <textarea name="email_signature" id="" cols="40" rows="10"></textarea>
                    </div>
                </div>
                <button type="submit" class="button font-bold radius-0">Save</button>
            </form>
        </span>
    </div>
</div>
{{-- change password --}}
<div class="ui-dialog ui-widget1 ui-widget-content ui-corner-all ui-front ui-draggable ui-resizable ajax_obj create-popup-form ui-draggable-change-pass-user d-none" tabindex="-1" style="top: 166px;" role="dialog" aria-describedby="ajax_obj" aria-labelledby="ui-id-15">
    <div class="ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix">
        <span id="ui-id-15" class="ui-dialog-title">Change your Password</span>
        <button class="ui-button ui-widget1 ui-state-default ui-corner-all ui-button-icon-only ui-dialog-titlebar-close" role="button" aria-disabled="false" title="close">
            <span class="ui-button-icon-primary ui-icon ui-icon-closethick closethick-user-change-pass"></span>
            <span class="ui-button-text">close</span>
        </button>
    </div>
    <div id="ajax_obj" class="ui-dialog-content ui-widget-content create-form-content">
        <span id="event_new" class="xmlb_form">
            <form action="">
                @csrf
                <div class="row">
                    <div class="col-4 mb-10">
                        <label class="align-right d-block">Current Password:</label>
                    </div>
                    <div class="col-8 mb-10 pl-0">
                        <input name="change_pwd_cur_pwd" size="34" type="password" title="You current password">
                    </div>
                    <div class="col-4 mb-10">
                        <label class="align-right d-block">New Password:</label>
                    </div>
                    <div class="col-8 mb-10 pl-0">
                        <input name="change_pwd_pwd" size="34" type="password" title="You New password">
                    </div>
                    <div class="col-4 mb-10">
                        <label class="align-right d-block">Re-type Password:</label>
                    </div>
                    <div class="col-8 mb-10 pl-0">
                        <input name="change_pwd_re_pwd" size="34" type="password" title="Password">
                    </div>
                </div>
                <button type="submit" class="button font-bold radius-0">Save</button>
            </form>
        </span>
    </div>
</div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function () {
            $('#user_view_edit').click(function (e) { 
                e.preventDefault();
                $('.ui-draggable-edit-user').show();
                $('.ui-widget-overlay').css('display', 'block');
            });
            $('.closethick-user-edit').click(function (e) { 
                e.preventDefault();
                $('.ui-draggable-edit-user').hide();
                $('.ui-widget-overlay').css('display', 'none');
            });

            $('#user_view_change_password').click(function (e) { 
                e.preventDefault();
                $('.ui-draggable-change-pass-user').show();
                $('.ui-widget-overlay').css('display', 'block');
            });
            $('.closethick-user-change-pass').click(function (e) { 
                e.preventDefault();
                $('.ui-draggable-change-pass-user').hide();
                $('.ui-widget-overlay').css('display', 'none');
            });

        });
    </script>
@endsection
