@extends('admin.layouts.master')
@section('title', $customer->customer_name . ' - Customer Details')
@section('style')
    <style>
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
        #customers span, #customers .add_booking_customer {
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
    #pagination-links a, .pagination-links a {
        display: inline-block;
        padding: 5px 10px;
        margin-right: 5px;
        background-color: #F7941E;
        color: #333;
        text-decoration: none;
        border-radius: 3px;
    }
    #pagination-links a:hover, .pagination-links a:hover {
        background-color: #e0e0e0;
    }
    #pagination-links span, .pagination-links span {
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
    #customer_gcs .left_col {
        padding-right: 24px;
        width: 49%;
    }
    #customer_gcs label {
        float: none;
    }
    #customer_gcs .right_col {
        width: 32%;
        min-height: 24px;
    }
    #gc_tabs .h_sep {
        margin: 3px 0;
        height: 6px;
        width: 98%;
        clear: both;
        border-bottom: 1px dashed #999;
    }
    #customer_gift_certs .redeemed {
        background: #FFFF00;
    }
    .btn_qsend_email {
        cursor: pointer;
        text-decoration: underline;
    }
    </style>
@endsection
@section('content')
<div id="main_content">
    <div class="title_bar card">
        <h1>{{$customer->id}}- {{$customer->customer_name}} ({{ customerType($customer->customer_type) }})</h1>
    </div>
</div>
<div class="line_break"></div>
<div id="event_tabs" class="tab_content ui-tabs ui-widget ui-widget-content ui-corner-all">
    <ul class="ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all" role="tablist">
        <li class="ui-state-default ui-corner-top ui-tabs-active ui-state-active" role="tab">
            <a href="#" class="ui-tabs-anchor" role="presentation" tabindex="-1" id="ui-id-1">Details</a>
        </li>
        <li class="ui-state-default ui-corner-top" role="tab">
            <a href="#" class="ui-tabs-anchor" role="presentation" tabindex="-2" id="ui-id-2">Events @if ($customer->events->isNotEmpty()) ({{$customer->events->count()}}) @endif</a>
        </li>
        <li class="ui-state-default ui-corner-top" role="tab">
            <a href="#" class="ui-tabs-anchor" role="presentation" tabindex="-3" id="ui-id-3">Appointments (0)</a>
        </li>
        <li class="ui-state-default ui-corner-top" role="tab">
            <a href="#" class="ui-tabs-anchor" role="presentation" tabindex="-4" id="ui-id-4">Special Events Bookings (0)</a>
        </li>
        <li class="ui-state-default ui-corner-top" role="tab">
            <a href="#" class="ui-tabs-anchor" role="presentation" tabindex="-5" id="ui-id-5">Rest. Resrvs. ({{$customer->restReserve->count()??0}}) Gift Certs ({{$customer->giftCertificates->count()??0}})</a>
        </li>
        <li class="ui-state-default ui-corner-top" role="tab">
            <a href="#" class="ui-tabs-anchor" role="presentation" tabindex="-6" id="ui-id-6">Communcations (6)</a>
        </li>
    </ul>
    <div class="ui-tabs-panel ui-widget-content ui-corner-bottom" id="event_tabs-1" aria-labelledby="ui-id-1" role="tabpanel" aria-expanded="true" aria-hidden="false">
        <div class="cus-row ">
            <div class="col-6 main-order-item">
                <div class="global-form main-form" style="background: #efeee8;">
                    <form method="post" id="frm_customer_view" action="" accept-charset="utf-8">
                        <h2>{{$customer->customer_name}} ({{ customerType($customer->customer_type) }})</h2>
                        <div class="page-left" style="float: right;margin-top: -25px;">
                            <nav class="left-nav">
                                <ul class="main-menu">
                                    <li class="menu-sub">
                                        <a href="#"><img class="icon_context_menu-btn" src="{{ asset('backend/assets/img/icon_context_menu.png') }}" alt=""></a>
                                        <ul>
                                            <li>
                                                <a href="javascript:void(0)" class="btn_delete_customer" data-id="{{$customer->id??''}}"> Delete Customer</a>
                                            </li>
                                            <li>
                                                <a href="#" id="btn_edit_customer"> Edit Customer</a>
                                            </li>
                                            <li>
                                                <a href="#"> Consolidate Into</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <hr>
                        <div class="line_break"></div>
                        <fieldset id="cust_sales_info" style="background: #efeee8;border-bottom: 0;border-right: 0;border-left: 0;border-radius: 0;">
                            <legend>Sales &amp; Tracking (Click ...)</legend>
                            <div class="row">
                                <div class="col-4 mb-10">
                                    <label class="align-right d-block">Ad. Campaign:</label>
                                </div>
                                <div class="col-8 mb-10 pl-0">
                                    <span class="element">{{adCampaign($customer->lnk_marketing_campaign)}}</span>
                                    <span class="mand_sign"></span>
                                </div>
                                <div class="col-4 mb-10">
                                    <label class="align-right d-block">Account Owner:</label>
                                </div>
                                <div class="col-8 mb-10 pl-0">
                                    <span class="element">{{getUser($customer->lnk_org_account_owner)??''}}</span>
                                    <span class="mand_sign"></span>
                                </div>
                                <div class="col-5 mb-10">
                                    <label class="align-right d-block">Allow Commission:</label>
                                </div>
                                <div class="col-7 mb-10 pl-0">
                                    <span class="element">{{$customer->allow_commission == 1 ? 'Yes' : 'No'}}</span>
                                    <span class="mand_sign"></span>
                                </div>
                                <div class="col-4 mb-10">
                                    <label class="align-right d-block">Added On:</label>
                                </div>
                                @php
                                $created_at = \Carbon\Carbon::parse($customer->created_at??'');
                                $addedOn = $created_at->format('D, M j- Y');
                                @endphp
                                <div class="col-8 mb-10 pl-0">
                                    <span class="element">{{$addedOn}}</span>
                                    <span class="mand_sign"></span>
                                </div>
                                <div class="col-1 mb-10">
                                    <label>by</label>
                                </div>
                                <div class="col-8 mb-10 pl-0">
                                    <span class="element">{{getUser($customer->lnk_org_account_owner)??''}}</span>
                                    <span class="mand_sign"></span>
                                </div>
                                <div class="col-4 mb-10">
                                    <label class="align-right d-block">Last Updated On</label>
                                </div>
                                <div class="col-8 mb-10 pl-0">
                                    <span class="element">{{$customer->updated_at??''}}</span>
                                    <span class="mand_sign"></span>
                                </div>
                                <div class="col-1 mb-10">
                                    <label>by</label>
                                </div>
                                <div class="col-8 mb-10 pl-0">
                                    <span class="element">{{getUser($customer->lnk_org_account_owner)??''}}</span>
                                    <span class="mand_sign"></span>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
            <div class="col-6">
                <div class="global-form corporate-form" style="background: #efeee8;">
                    <h2>Stored Methods of Pay ({{$customer->storedPayMethod()->count()??0}}) <a href="#" class="methods_of_pay" style="color: #99001E;text-decoration: none;">+</a></h2>
                    <hr>
                    @if (!empty($customer->storedPayMethod->acct_holder_name))
                    <div class="row card">
                        <div class="col-4 ">
                            <label><svg style="width: 20px;" class="svg-inline--fa fa-cc-visa" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="cc-visa" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg="">
                                    <path fill="currentColor" d="M470.1 231.3s7.6 37.2 9.3 45H446c3.3-8.9 16-43.5 16-43.5-.2.3 3.3-9.1 5.3-14.9l2.8 13.4zM576 80v352c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V80c0-26.5 21.5-48 48-48h480c26.5 0 48 21.5 48 48zM152.5 331.2L215.7 176h-42.5l-39.3 106-4.3-21.5-14-71.4c-2.3-9.9-9.4-12.7-18.2-13.1H32.7l-.7 3.1c15.8 4 29.9 9.8 42.2 17.1l35.8 135h42.5zm94.4.2L272.1 176h-40.2l-25.1 155.4h40.1zm139.9-50.8c.2-17.7-10.6-31.2-33.7-42.3-14.1-7.1-22.7-11.9-22.7-19.2.2-6.6 7.3-13.4 23.1-13.4 13.1-.3 22.7 2.8 29.9 5.9l3.6 1.7 5.5-33.6c-7.9-3.1-20.5-6.6-36-6.6-39.7 0-67.6 21.2-67.8 51.4-.3 22.3 20 34.7 35.2 42.2 15.5 7.6 20.8 12.6 20.8 19.3-.2 10.4-12.6 15.2-24.1 15.2-16 0-24.6-2.5-37.7-8.3l-5.3-2.5-5.6 34.9c9.4 4.3 26.8 8.1 44.8 8.3 42.2.1 69.7-20.8 70-53zM528 331.4L495.6 176h-31.1c-9.6 0-16.9 2.8-21 12.9l-59.7 142.5H426s6.9-19.2 8.4-23.3H486c1.2 5.5 4.8 23.3 4.8 23.3H528z"></path>
                                </svg> Visa:
                            </label>
                        </div>
                        <div class="col-8 pl-0">
                            <span class="element">{{$customer->storedPayMethod->cc_number}}</span>
                            <span class="mand_sign"></span>
                        </div>
                        <div class="col-4">
                            <label>Expires:</label>
                        </div>
                        <div class="col-8  pl-0">
                            <span class="element">{{$customer->storedPayMethod->cc_expiry}}</span>
                            <span class="mand_sign"></span>
                        </div>
                        <div class="col-4">
                            <label>Security Code:</label>
                        </div>
                        <div class="col-8  pl-0">
                            <span class="element">{{$customer->storedPayMethod->cc_security}}</span>
                            <span class="mand_sign"></span>
                        </div>
                        <div class="col-4">
                            <label>Name on Card:</label>
                        </div>
                        <div class="col-8  pl-0">
                            <span class="element">{{$customer->storedPayMethod->acct_holder_name}}</span>
                            <span class="mand_sign"></span>
                        </div>
                        <div class="col-8  pl-0">
                            <button type="button" data-id="{{$customer->storedPayMethod->id}}" class="button btn_delete_paymethod">Delete</button>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="cus-row ">
            <div class="col-6 main-order-item">
                <form method="post" id="frm_customer_branches" action="" accept-charset="utf-8">
                    <div class="global-form corporate-form" style="background: #efeee8;">
                        <h2>Branches (0)</h2>
                        <div class="page-left" style="float: right;margin-top: -25px;">
                            <nav class="left-nav">
                                <ul class="main-menu">
                                    <li class="menu-sub">
                                        <a href="#"><img class="icon_context_menu-btn" src="{{ asset('backend/assets/img/icon_context_menu.png') }}" alt=""></a>
                                        <ul>
                                            <li>
                                                <a href="#" class="btn_add_branch"> Add Branch</a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn_add_department"> New Department</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <hr>
                        <table class="product-list table mt-20">
                            <tr>
                                <th>
                                    <a href="#" class="product-list bin_num" style="font-size: 12px;">Branch Name</a>
                                    <img src="{{ asset('backend/assets/img/sorted_up.png') }}">
                                </th>
                                <th>
                                    <a href="#" class="product-list bin_num" style="font-size: 12px;">No Of Emps</a>
                                </th>
                                <th>
                                    <a href="#" class="product-list bin_num" style="font-size: 12px;">City</a>
                                </th>
                                <th>
                                </th>
                            </tr>
                            @if ($customerBranchs && $customerBranchs->count() > 0)
                            @foreach ($customerBranchs as $_customerBra)
                            <tr>
                                <td>{{$_customerBra->branch_name}}</td>
                                <td>{{$_customerBra->no_of_emps}}</td>
                                <td>{{$_customerBra->city}}</td>
                                <td>
                                    <button type="button" data-id="{{$_customerBra->id}}" class="button btn_branch_delete">Delete</button>
                                    <button type="button" data-id="{{$_customerBra->id}}" class="button btn_branch_edit">Edit</button>
                                </td>
                            </tr>
                            @endforeach
                            @endif
                        </table>
                    </div>
                </form>
            </div>
        </div>
        <div class="cus-row ">
            @if ($customer->Contacts->isNotEmpty())
            @foreach ($customer->Contacts as $_Contact)
            <div class="col-6 main-order-item">
                @php
                $relationType = '';
                if ($_Contact->relation != '----') {
                if ($_Contact->relation == 1) {
                $relationType = 'Single Person';
                } elseif ($_Contact->relation == 2) {
                $relationType = 'Bride';
                } elseif ($_Contact->relation == 3) {
                $relationType = 'Groom';
                } elseif ($_Contact->relation == 4) {
                $relationType = 'Wife';
                } elseif ($_Contact->relation == 5) {
                $relationType = 'Husband';
                } elseif ($_Contact->relation == 6) {
                $relationType = 'Child';
                } else {
                $relationType = 'Others';
                }
                }
                @endphp
                <form method="post" id="frm_customer_contacts" action="" accept-charset="utf-8">
                    <div class="global-form main-form">
                        <h2>{{$_Contact->last_name}}, {{$_Contact->first_name}} ({{$relationType}})</h2>
                        <div class="page-left" style="float: right;margin-top: -25px;">
                            <nav class="left-nav">
                                <ul class="main-menu">
                                    <li class="menu-sub">
                                        <a href="#"><img class="icon_context_menu-btn" src="{{ asset('backend/assets/img/icon_context_menu.png') }}" alt=""></a>
                                        <ul>
                                            <li>
                                                <a href="javascript:void(0)" class="btn_delete_contact" data-id="{{$_Contact->id}}">Delete Contact</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)" class="btn_edit_contact" data-id="{{$_Contact->id}}">Edit Contact</a>
                                            </li>
                                            <li>
                                                <a href="#"> Send Email</a>
                                            </li>
                                            <li>
                                                <a href="#"> Consolidate Into</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)" class="btn_create_login_form" data-id="{{$_Contact->id}}"> Create Login</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-4 mb-10">
                                <label class="align-right d-block">Main Email:</label>
                            </div>
                            <div class="col-8 mb-10 pl-0">
                                <span class="element">{{$_Contact->main_email}}</span>
                                <span class="mand_sign"></span>
                            </div>
                            <div class="col-4 mb-10">
                                <label class="align-right d-block">Cell Phone:</label>
                            </div>
                            <div class="col-8 mb-10 pl-0">
                                <span class="element">{{$_Contact->cell_phone}}</span>
                                <span class="mand_sign"></span>
                            </div>
                            <div class="col-4 mb-10">
                                <label class="align-right d-block">Level:</label>
                            </div>
                            <div class="col-8 mb-10 pl-0">
                                <span class="element">**Unknown**</span>
                                <span class="mand_sign"></span>
                            </div>
                            <div class="col-4 mb-10">
                                <label class="align-right d-block">Address:</label>
                            </div>
                            <div class="col-8 mb-10 pl-0">
                                <span class="element">{{$_Contact->street_addr??''}}</span>
                                <span class="mand_sign"></span>
                            </div>
                            <div class="col-4 mb-10">
                                <label class="align-right d-block">City:</label>
                            </div>
                            <div class="col-8 mb-10 pl-0">
                                <span class="element">{{$_Contact->city??''}}</span>
                                <span class="mand_sign"></span>
                            </div>
                            <div class="col-4 mb-10">
                                <label class="align-right d-block">Province:</label>
                            </div>
                            <div class="col-8 mb-10 pl-0">
                                <span class="element">{{province($_Contact->province)??''}}</span>
                                <span class="mand_sign"></span>
                            </div>
                            <div class="col-4 mb-10">
                                <label class="align-right d-block">Postal Code:</label>
                            </div>
                            <div class="col-8 mb-10 pl-0">
                                <span class="element">{{$_Contact->postal_code??''}}</span>
                                <span class="mand_sign"></span>
                            </div>
                            <div class="col-4 mb-10">
                                <label class="align-right d-block">Allow Email:</label>
                            </div>
                            <div class="col-8 mb-10 pl-0">
                                <span class="element">{{$_Contact->allow_email == 1 ? 'Yes' : 'No'}}</span>
                                <span class="mand_sign"></span>
                            </div>
                        </div>
                        <fieldset id="cust_sales_info" style="background: #efeee8;border-bottom: 0;border-right: 0;border-left: 0;border-radius: 0;">
                            <legend>Login Info.</legend>
                        </fieldset>
                    </div>
                </form>
            </div>
            @endforeach
            @endif
            {{-- <div class="col-6">
                    <form method="post" id="frm_customer_contacts" action="" accept-charset="utf-8">
                        <div class="global-form corporate-form height-100">
                            <h2>Power, Geralyn (Groom)</h2>
                            <div class="page-left" style="float: right;margin-top: -25px;">
                                <nav class="left-nav">
                                    <ul class="main-menu">
                                        <li class="menu-sub">
                                            <a href="#"><img class="icon_context_menu-btn" src="{{ asset('backend/assets/img/icon_context_menu.png') }}" alt=""></a>
            <ul>
                <li>
                    <a href="#" class="btn_delete_contact" cu_contact_id="8237">Delete Contact</a>
                </li>
                <li>
                    <a href="#" class="edit_contact">Edit Contact</a>
                </li>
                <li>
                    <a href="#"> Send Email</a>
                </li>
                <li>
                    <a href="#"> Consolidate Into</a>
                </li>
                <li>
                    <a href="#"> Create Login</a>
                </li>
            </ul>
            </li>
            </ul>
            </nav>
        </div>
        <hr>
        <div class="row">
            <div class="col-4 mb-10">
                <label class="align-right d-block">Main Email:</label>
            </div>
            <div class="col-8 mb-10 pl-0">
                <span class="element"></span>
                <span class="mand_sign"></span>
            </div>
            <div class="col-4 mb-10">
                <label class="align-right d-block">Level:</label>
            </div>
            <div class="col-8 mb-10 pl-0">
                <span class="element">**Unknown**</span>
                <span class="mand_sign"></span>
            </div>
            <div class="col-4 mb-10">
                <label class="align-right d-block">Allow Email:</label>
            </div>
            <div class="col-8 mb-10 pl-0">
                <span class="element">Yes</span>
                <span class="mand_sign"></span>
            </div>
        </div>
        <fieldset id="cust_sales_info" style="background: #efeee8;border-bottom: 0;border-right: 0;border-left: 0;border-radius: 0;">
            <legend>Login Info.</legend>
        </fieldset>
    </div>
    </form>
</div> --}}
<div class="col-6">
    <div class="card contact_wrap add_new_contact form_filters">
        <div style="text-align: center;">
            <a href="#" id="contact_new" style="text-decoration: none;font-size: 2rem;color: #E56542;">+<br>New Contact</a>
        </div>
    </div>
</div>
</div>
</div>
<div id="event_tabs-2" aria-labelledby="ui-id-2" class="ui-tabs-panel ui-widget-content ui-corner-bottom" style="display: none;" role="tabpanel" aria-expanded="false" aria-hidden="true">
    <span id="customer_events" class="xmlb_form">
        @if ($customer->events->isNotEmpty())
        <form method="post" id="frm_customer_events" action="">
            <div class="card title_bar">
                <h2>Customer Events</h2>
                <a href="{{route('admin.event.create',['customer_id' =>$customer->id])}}">
                    <span class="special_action button font-bold radius-0">New Event</span>
                </a>
            </div>
            <fieldset class="form_filters">
                <legend>Search</legend>
                <div class="filter_controls"><label>Event Type:</label>
                    <select name="customer_events_LNK_EVENT_TYPE" id="customer_events_LNK_EVENT_TYPE" multiple="multiple" style="display: none;">
                        <option value="4">Anniversary</option>
                        <option value="28">Baby Shower</option>
                        <option value="39">Bachelor Party</option>
                        <option value="1">Baptism</option>
                        <option value="14">Birthday Party</option>
                        <option value="15">Bridal Shower</option>
                        <option value="26">Catering</option>
                        <option value="18">Christmas Party</option>
                        <option value="5">Club Function</option>
                        <option value="6">Communion</option>
                        <option value="19">Confirmation</option>
                        <option value="12">Convention</option>
                        <option value="36">Corporate</option>
                        <option value="38">Customer Appreciation</option>
                        <option value="8">Dinner</option>
                        <option value="16">Engagement</option>
                        <option value="20">Fashion Show</option>
                        <option value="7">Fundraiser</option>
                        <option value="34">Funeral</option>
                        <option value="37">Gala</option>
                        <option value="23">Golf Tournament</option>
                        <option value="35">Graduation</option>
                        <option value="30">Graduation Ceremony</option>
                        <option value="32">Jack &amp; Jill</option>
                        <option value="11">Luncheon</option>
                        <option value="10">Meeting</option>
                        <option value="13">Memorial</option>
                        <option value="29">Photos/Grounds</option>
                        <option value="40">Proposal</option>
                        <option value="25">Rehearsal</option>
                        <option value="17">Rehearsal Dinner</option>
                        <option value="31">Retirement Party</option>
                        <option value="9">School Prom</option>
                        <option value="24">Semi Formal</option>
                        <option value="33">Special Event</option>
                        <option value="21">Trade Show</option>
                        <option value="27">Wedding Cer./Reception</option>
                        <option value="2">Wedding Ceremony</option>
                        <option value="3">Wedding Reception</option>
                    </select>
                    <button type="button" class="ui-multiselect ui-widget ui-state-default ui-corner-all" aria-haspopup="true" style="width: 246px;">
                        <span class="ui-icon ui-icon-triangle-2-n-s"></span><span>Select options</span>
                    </button>
                   <label>Status:</label>
                    <select name="customer_events_EVENT_STATUS" id="customer_events_EVENT_STATUS" onchange="javascript:customer_events_applyFilters();">
                        <option value="-- All --" selected="selected">-- All --</option>
                        <option value="1">Tentative</option>
                        <option value="5">Promised</option>
                        <option value="2">Booked</option>
                        <option value="3">Cancelled</option>
                        <option value="4">Archived</option>
                    </select>
                </div>
                <div class="filter_buttons">
                    <input type="submit" value="Search" class="button font-bold radius-0" name="customer_events_apply_filter" onclick="javascript:customer_events_applyFilters(); return false;">
                    <input type="submit" value="Show All" class="button font-bold radius-0" name="customer_events_clear_filter" onclick="javascript:clearFormFilters('customer_events') ; return false;">
                </div>
            </fieldset>
            <div class="top-record mt-20">
                <p align="right">
                    Records: 1 to 1 of 1 | Show: 
                    <select class="max-100">
                        <option value="all">All</option>
                        <option value="1" selected="">1</option>
                        <option value="10">10</option>
                        <option value="30">30</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                </p>
            </div>
            <table class="product-list table mt-20">
                <tbody>
                    <tr>
                        <th>
                            <a href="#">Event Id</a> 
                        </th>
                        <th>
                            <a href="#">Contact</a> 
                        </th>
                        <th>
                            <a href="#">Sales Persons</a> 
                        </th>
                        <th>
                            <a href="#">Event Type</a>
                        </th>
                        <th>
                            <a href="#">Start Date Time</a> 
                        </th>
                        <th>Facilities</th>
                        <th>
                            <a href="#">Adults</a> 
                        </th>
                        <th>
                            <a href="#">Status</a> 
                        </th>
                        <th>
                            <a href="#">Total</a> 
                        </th>
                        <th>
                            <a href="#">Deposit</a> 
                        </th>
                        <th>
                            <a href="#">Balance</a> 
                        </th>
                    </tr>
                    @foreach ($customer->events as $_event)
                    <tr class="supplier-row">
                        <td>
                            <span class="checkbox_container"><input type="checkbox" name="event_ids[]" value="{{ $_event->id }}"></span><a href="{{route('admin.event.show',$_event->id)}}" >{{$_event->id}}</a>
                        </td>
                        <td>{{$_event->contact->full_name}}</td>
                        <td></td>
                        <td><span class="event_type_catering">{{$_event->eventType->type_name}}</span></td>
                        <td><a href="{{route('admin.event.show',$_event->id)}}">{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $_event->start_date_time)->format('D, M j - Y h:iA') }}</a></td>
                        <td>
                            @foreach ($_event->eventFacilities as $_eventFaci)
                                @if (!empty($_eventFaci->facility))
                                    {{$_eventFaci->facility->facility_name}} |
                                @endif
                            @endforeach
                        </td>
                        <td>{{$_event->adults}}</td>
                        <td>@if ($_event->event_status == 1) {{'Tentative'}}@elseif($_event->event_status == 2) {{'Booked'}}@elseif($_event->event_status == 4) {{'Archived'}}@elseif($_event->event_status == 5) {{'Promised'}} @endif</td>
                        <td>{{$_event->sub_total}}</td>
                        <td>{{$_event->deposit}}</td>
                        <td>{{$_event->balance}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="line_break"></div>
            <div class="filter_buttons">
                <button type="button"   class="select_all">Select All</button>
                <button type="button" class="de_select">Deselect</button>
            </div>
            <div class="line_break"></div>
            <div class="filter_buttons">
                <input type="button" value="Delete" id="customer_events_delete" name="customer_events_delete" class="button" >
            </div>
        </form>
        @else
        <form method="post" id="frm_customer_events" action="">
            <h2>No Event for this Customer</h2>
            <a href="{{route('admin.event.create',['customer_id' =>$customer->id])}}">
                <span class="special_action button font-bold radius-0">New Event</span>
            </a>
        </form>
        @endif
    </span>
</div>
<div id="event_tabs-3" aria-labelledby="ui-id-3" class="ui-tabs-panel ui-widget-content ui-corner-bottom" style="display: none;" role="tabpanel" aria-expanded="false" aria-hidden="true">
    <span id="customer_appointments" class="xmlb_form">
        <form method="post" id="frm_customer_appointments" action="" accept-charset="utf-8" enctype="multipart/form-data">

            <div class="card title_bar">
                <h2>Customer Appointments (0)</h2>
            </div>
            <p>
                <input type="submit" value="New Appointment" id="customer_appointments_edit" name="customer_appointments_edit" class="button">
            </p>
            <div class="line_break"></div>

            <table id="tasks_table">
                <tbody>

                </tbody>
            </table>

        </form>
    </span>
</div>
<div id="event_tabs-4" aria-labelledby="ui-id-4" class="ui-tabs-panel ui-widget-content ui-corner-bottom" style="display: none;" role="tabpanel" aria-expanded="false" aria-hidden="true">
    <span id="customer_appointments" class="xmlb_form">
        <form method="post" id="frm_customer_appointments" action="">
            <div class="card title_bar">
                <h2 style="color: #373232">Not Booked for any Special Events</h2>
            </div>
        </form>
    </span>
</div>
<div id="event_tabs-5" aria-labelledby="ui-id-5" class="ui-tabs-panel ui-widget-content ui-corner-bottom" style="display: none;" role="tabpanel" aria-expanded="false" aria-hidden="true">
    <span id="restaurant_bookings" class="xmlb_form">
        <div class="card title_bar">
            <h2>Restaurant Reservations ({{$customer->restReserve->count()??0}})
                <a href="{{ route('admin.customer.new-restaurant-reserve',['customer_id' => $customer->id]) }}">
                    <button id="restaurant_bookings_edit" name="restaurant_bookings_edit" class="button">New Reservation</button>
                </a>
            </h2>
        </div>
        <div class="line_break"></div>
        @if ($customer->restReserve != null)
        <div class="card">
            @foreach ($customer->restReserve as $_restReserve)
                <div>
                    <h3>{{$_restReserve->reserve_type == 1?'Lunch':'Dinner'}}  on  {{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $_restReserve->reserve_date_time)->format('l F j, Y h:ia') }}</h3>
                    <h3>
                        <hr><p><label>Guests:</label> {{$_restReserve->no_of_guests}}</p>
                    </h3>
                </div>
             @endforeach
        </div>
        @endif
        <div class="line_break"></div>
        <div class="card title_bar">
            <span id="customer_gift_certs" class="xmlb_form">
                <div class="card title_bar">
                    <h2>Purchased Gift Certificates ({{$customer->giftCertificates->count()??0}})</h2>
                    <a href="javascript:void(0)">
                        <span class="redeem_customer_gift_certificate special_action button font-bold radius-0" data-id="{{$customer->id}}">Redeem Gift Certificate</span>
                    </a>
                    <a href="javascript:void(0)">
                        <span class="sell_gift_certificate button font-bold radius-0">New Gift Certificate</span>
                    </a>
                </div>
                <table class="product-list table mt-20">
                    <tbody>
                        <tr>
                            <th>
                                <a href="#">GC #</a>
                            </th>
                            <th>
                                <a href="#">Value $</a>
                            </th>
                            <th>
                                <a href="#">Purchased On</a>
                            </th>
                            <th>
                                <a href="#">Date Redeemed</a>
                            </th>
                            <th>
                                <a href="#">Notes</a>
                            </th>
                            <th></th>
                        </tr>
                        @if ($customer->giftCertificates != null)
                        @foreach ($customer->giftCertificates as $giftCertificate)
                            <tr class="{{($giftCertificate->date_redeemed != null)? 'redeemed':''}}">
                                <td>{{ $giftCertificate->serial_no }}</td>
                                <td>${{ $giftCertificate->face_value }}</td>
                                <td>{{date('M d- Y', strtotime($giftCertificate->purchase_date))}}</td>
                                <td>{{ $giftCertificate->date_redeemed ? date('M d, Y', strtotime($giftCertificate->date_redeemed)) : '' }}</td>
                                <td>Added on {{date('l M d, Y', strtotime($giftCertificate->purchase_date)) }} By {{$giftCertificate->user->name}}</td>
                                <td>
                                    @if (!$giftCertificate->date_redeemed)
                                        <button type="button" data-id="{{$giftCertificate->id}}" class="button font-bold radius-0 gift_certificate_list_delete">Delete</button>
                                        <button type="button" data-id="{{$giftCertificate->id}}" class="button font-bold radius-0 gift_certificate_edit">Edit</button>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </span>
        </div>
    </span>
</div>
<div id="event_tabs-6" aria-labelledby="ui-id-6" class="ui-tabs-panel ui-widget-content ui-corner-bottom" style="display: none;" role="tabpanel" aria-expanded="false" aria-hidden="true">
    <span id="customer_tasks" class="xmlb_form">
        <form method="post" id="frm_customer_tasks" action="">
            <div class="card title_bar">
                <h2>Related Tasks/Follow-ups (0)</h2>
                <a href="#">
                    <span class="special_action button font-bold radius-0">Add New</span>
                </a>
            </div>
            <table class="product-list table mt-20">
                <tbody>
                    <tr>
                        <th>
                            <a href="#">Added By</a>
                        </th>
                        <th>
                            <a href="#">Contact</a>
                        </th>
                        <th>
                            <a href="#">Time</a>
                        </th>
                        <th>
                            <a href="#">Description</a>
                        </th>
                        <th>
                            <a href="#">Next Step</a>
                        </th>
                        <th>
                            <a href="#">Next Step Date/Time</a>
                        </th>
                        <th></th>
                    </tr>
                </tbody>
            </table>
        </form>
    </span>
    <div class="line_break"></div>
    <span id="customer_tasks" class="xmlb_form">
        <form method="post" id="frm_customer_tasks" action="">
            <div class="card title_bar">
                <h2>Email Communications (1)</h2>
            </div>
            <table class="product-list table mt-20">
                <tbody>
                    <tr>
                        <th>
                            <a href="#">To</a>
                        </th>
                        <th>
                            <a href="#">Email Subject</a>
                        </th>
                        <th>
                            <a href="#">Sent From</a>
                        </th>
                        <th>
                            <a href="#">Status</a>
                        </th>
                        <th>
                            <a href="#">Date/Time</a>
                        </th>
                        <th>
                            <a href="#">Related Event</a>
                        </th>
                        <th></th>
                    </tr>
                    <tr>
                        <td>minghanliu@hotmail.com</td>
                        <td>Royal Ambassador General Inquiry</td>
                        <td>Customer Details Page</td>
                        <td>Sent</td>
                        <td>December 31, 2023 05:17pm</td>
                        <td></td>
                        <td class="actions"><a href="#">Email</a></td>
                    </tr>
                </tbody>
            </table>
        </form>
    </span>
</div>
</div>
{{-- edit customer model --}}
<div class="ui-widget-overlay ui-front d-none"></div>

<div class="ui-dialog ui-widget1 ui-widget-content ui-corner-all ui-front ui-draggable ui-resizable ajax_obj ui-draggable-qucik-tasks d-none" tabindex="-1" style="position: absolute; height: auto; width: 480px; top: 110.5px; left: 388px;" role="dialog" aria-describedby="ajax_obj" aria-labelledby="ui-id-15">
    <div class="ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix">
        <span id="ui-id-15" class="ui-dialog-title">Qucik Tasks</span>
        <button class="ui-button ui-widget1 ui-state-default ui-corner-all ui-button-icon-only ui-dialog-titlebar-close" role="button" aria-disabled="false" title="close">
            <span class="ui-button-icon-primary ui-icon ui-icon-closethick closethick-qucik-tasks"></span>
            <span class="ui-button-text">close</span>
        </button>
    </div>
    <div class="quick_tasks_wrap ui-dialog-content ui-widget-content" id="ui-id-7" style="display: block; width: auto; min-height: 103px; max-height: none; height: auto;">
        <h2>Quick Tasks</h2>
        <ul>
            <li><a href="{{ route('admin.dashboard',['cus_id' =>$customer->id  ]) }}">Schedule Appointment</a></li>
            <li><a href="{{ route('admin.event.create',['customer_id' =>$customer->id  ]) }}">Add Event</a></li>
            <li class="btn_qsend_email">Send Email</li>
        </ul>
    </div>
</div>
@include('admin.customers.models.popup')
@include('admin.gift.models.popup')
@endsection
@section('scripts')
@include('admin.gift.js.create_gift')
@include('admin.customers.js.giftList')
    
    <script>
        $(document).ready(function() {
            var btnValue1 = sessionStorage.getItem("btn");
            var btnValue2 = "{{ session('btn1') }}";
            if (btnValue1 === 'This is it!' || btnValue2 === 'btn1') {
                $('.ui-widget-overlay').show();
                $('.ui-draggable-qucik-tasks').removeClass('d-none');
                sessionStorage.removeItem("btn");
                "{{ session(['btn1' => '']) }}"
            }
        });

        $(document).ready(function() {
            $(document).delegate('.customer_gcs_misc', 'click', function() {
                if (confirm('Are you sure customer is redeeming Serial No: ' + $(this).data('serial-no') + '?')) {
                    $('.customer_gcs_submit').val($(this).data('gift-id'));
                } else {
                    return false;
                }
            });
            $('.redeem_customer_gift_certificate').click(function(e) {
                e.preventDefault();
                $('.ui_redeem_customer_gift').show();
                $('.ui-widget-overlay').css('display', 'block');
            });
            $('.closethick-close').click(function () { 
                $('.ui-draggable-sell-new-gift-certificate').hide();
                $('.ui-draggable-sell-edit-gift-certificate').hide();
                $('.ui_redeem_customer_gift').hide();
                $('.ui-widget-overlay').css('display', 'none');            
            });
            $('#event_tabs .ui-state-default a').click(function(e) {
                e.preventDefault();
                $('#event_tabs .ui-state-default').removeClass('ui-tabs-active ui-state-active');
                $(this).closest('li').addClass('ui-tabs-active ui-state-active')
                $('#event_tabs .ui-tabs-panel').css('display', 'none');
                var text = $(this).attr('tabindex');
                if (text == -1) {
                    $('#event_tabs-1').show();
                } else if (text == -2) {
                    $('#event_tabs-2').show();
                } else if (text == -3) {
                    $('#event_tabs-3').show();
                } else if (text == -4) {
                    $('#event_tabs-4').show();
                } else if (text == -5) {
                    $('#event_tabs-5').show();
                } else if (text == -6) {
                    $('#event_tabs-6').show();
                } else {
                    $('.main-order-item').css('order', '1');
                    $('.corporate-form').show();
                }
            });
            $('#gc_tabs .ui-state-default a').click(function(e) {
                e.preventDefault();
                $('#gc_tabs .ui-state-gc-tabs').removeClass('ui-tabs-active ui-state-active');
                $(this).closest('li').addClass('ui-tabs-active ui-state-active')
                $('#gc_tabs .ui-tabs-panel-gc-tabs').css('display', 'none');
                var text = $(this).attr('tabindex');
                if (text == -1) {
                    $('#gc_tabs-1').show();
                } else if (text == -2) {
                    $('#gc_tabs-2').show();
                }
            });

            $('.select_all').click(function() {
                $('.checkbox_container input[type="checkbox"]').prop('checked', true);
            });

            // Deselect button functionality
            $('.de_select').click(function() {
                $('.checkbox_container input[type="checkbox"]').prop('checked', false);
            });

            $('#btn_edit_customer').click(function(e) {
                e.preventDefault();
                $('.ui-draggable-customer-edit').show();
                $('.ui-widget-overlay').css('display', 'block');
            });
            $('.closethick-customer-close').click(function() {
                $('.ui-draggable-customer-edit').hide();
                $('.ui-widget-overlay').css('display', 'none');
            });
            $('.btn_branch_edit').click(function(e) {
                e.preventDefault();
                $('.ui-draggable-edit-branch').show();
                $('.ui-widget-overlay').css('display', 'block');
            });
            $('.closethick-edit-branch').click(function() {
                $('.ui-draggable-edit-branch').hide();
                $('.ui-widget-overlay').css('display', 'none');
            });

            $('.btn_create_login_form').click(function(e) {
                e.preventDefault();
                $('.ui-draggable-create-login').show();
                $('.ui-widget-overlay').css('display', 'block');
            });
            $('.closethick-login').click(function() {
                $('.ui-draggable-create-login').hide();
                $('.ui-widget-overlay').css('display', 'none');
            });

            $('#contact_new').click(function(e) {
                e.preventDefault();
                $('.ui-draggable-contact').show();
                $('.ui-widget-overlay').css('display', 'block');
            });
            $('.closethick-contact').click(function() {
                $('.ui-draggable-contact').hide();
                $('.ui-widget-overlay').css('display', 'none');
            });

            $('.btn_edit_contact').click(function(e) {
                e.preventDefault();
                $('.ui-draggable-contact-edit').show();
                $('.ui-widget-overlay').css('display', 'block');
            });
            $('.closethick-contact-edit').click(function() {
                $('.ui-draggable-contact-edit').hide();
                $('.ui-widget-overlay').css('display', 'none');
            });

            $('.methods_of_pay').click(function(e) {
                e.preventDefault();
                $('.ui-draggable-methods-pay').show();
                $('.ui-widget-overlay').css('display', 'block');
            });
            $('.closethick-methods-pay').click(function() {
                $('.ui-draggable-methods-pay').hide();
                $('.ui-widget-overlay').css('display', 'none');
            });

            $('.btn_add_branch').click(function(e) {
                e.preventDefault();
                $('.ui-draggable-add-branch').show();
                $('.ui-widget-overlay').css('display', 'block');
            });
            $('.closethick-add-branch').click(function() {
                $('.ui-draggable-add-branch').hide();
                $('.ui-widget-overlay').css('display', 'none');
            });

            $('.btn_add_department').click(function(e) {
                e.preventDefault();
                $('.ui-draggable-new-department').show();
                $('.ui-widget-overlay').css('display', 'block');
            });
            $('.closethick-new-department').click(function() {
                $('.ui-draggable-new-department').hide();
                $('.ui-widget-overlay').css('display', 'none');
            });

            $('.closethick-qucik-tasks').click(function() {
                $('.ui-draggable-qucik-tasks').hide();
                $('.ui-widget-overlay').css('display', 'none');
            });
        });

        $(document).ready(function() {
            $("#edit_customer_form").validate({
                rules: {
                    'customer_type': {
                        required: true
                        , number: true
                    }
                    , 'ad_campaign': {
                        required: true
                        , number: true
                    }
                , }
                , messages: {
                    'customer_type': 'Customer Type Filde is required'
                    , 'ad_campaign': 'Ad Campaign Filde is required'
                , }
            , });
            $("#edit_customer_contact_form").validate({
                rules: {
                    'first_name': 'required'
                    , 'last_name': 'required'
                    , 'relation': 'required'
                    , 'main_email': {
                        email: true
                        , required: true
                    }
                    , 'cell_phone': 'required'
                    , 'postal_code': {
                        maxlength: 10
                    }
                }
                , messages: {
                    'first_name': 'First Name is required'
                    , 'last_name': 'Last Name is required'
                    , 'relation': 'The relation must be a number.'
                    , 'main_email': {
                        required: "The main email field is required."
                        , email: "enter a valid email"
                    }
                    , 'cell_phone': 'Cell Phone is required'
                    , 'postal_code': 'Postal Code should not exceed 10 characters.'
                , }
            });
            $("#customer_contact_store").validate({
                rules: {
                    'first_name': 'required'
                    , 'last_name': 'required'
                    , 'relation': 'required'
                    , 'main_email': {
                        email: true
                        , required: true
                    }
                    , 'cell_phone': 'required'
                    , 'postal_code': {
                        maxlength: 10
                    }
                }
                , messages: {
                    'first_name': 'First Name is required'
                    , 'last_name': 'Last Name is required'
                    , 'relation': 'The relation must be a number.'
                    , 'main_email': {
                        required: "The main email field is required."
                        , email: "enter a valid email"
                    }
                    , 'cell_phone': 'Cell Phone is required'
                    , 'postal_code': 'Postal Code should not exceed 10 characters.'
                , }
            });
            $("#create_branch").validate({
                rules: {
                    'branch_name': 'required'
                , }
                , messages: {
                    'branch_name': 'Branch Name is required'
                , }
            });
            $("#edit_branch").validate({
                rules: {
                    'branch_name': 'required'
                , }
                , messages: {
                    'branch_name': 'Branch Name is required'
                , }
            });
            $("#create_department").validate({
                rules: {
                    'dept_name': 'required'
                    , 'branch_id': 'number'
                }
                , messages: {
                    'dept_name': 'Department Name is required'
                    , 'branch_id': 'The branch id must be a number.'
                , }
            });
            $("#payment_method_store").validate({
                rules: {
                    'card_method_type': 'required'
                    , 'card_number': {
                        required: true
                        , minlength: 16
                    }
                    , 'card_expiry_month': 'required'
                    , 'card_expiry_year': 'required'
                    , 'card_cvd': {
                        required: true
                        , minlength: 3
                        , maxlength: 3
                    , }
                , }
                , messages: {
                    'card_method_type': 'method type is required'
                    , 'card_number': {
                        required: "card number is required"
                        , minlength: "minlength 16 digits required"
                    }
                    , 'card_expiry_month': 'card expiry month is required'
                    , 'card_expiry_year': 'card expiry year is required'
                    , 'card_cvd': {
                        required: "card cvd is required"
                        , minlength: "card cvd minlength 3 digits required"
                        , maxlength: "card cvd maxlength 3 digits required"
                    , }
                , }
            });
            $("#login_store").validate({
                rules: {
                    'first_name': 'required'
                    , 'last_name': 'required'
                    , 'email': 'required'
                    , 'password': {
                        required: true
                        , minlength: 5
                    }
                , }
                , messages: {
                    'first_name': 'First Name is required'
                    , 'last_name': 'Last Name is required'
                    , 'email': 'Email is required'
                    , 'password': {
                        required: "Password is required"
                        , minlength: "Password minlength 5 digits required"
                    }
                , }
            });

            var id;
            $(document).on('click', '.btn_delete_customer', function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                id = $(this).attr('data-id');

                if (confirm("Are you sure you want to remove this Customer?") == true) {
                    var url = "{{ route('admin.customer.destroy', ':id') }}";
                    url = url.replace(':id', id);
                    $.ajax({
                        url: url
                        , type: 'DELETE'
                        , success: function(response) {
                            if (response.success) {
                                alert(response.message);
                                window.location.href = "{{ route('admin.customer.index') }}";
                            } else {
                                alert(response.message);
                            }
                        }
                    });

                }
            });
            var cid;
            $(document).on('click', '.btn_delete_contact', function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                cid = $(this).attr('data-id');

                if (confirm("Are you sure you want to remove this Contact?") == true) {
                    var url = "{{ route('admin.customer.contact.destroy', ':cid') }}";
                    url = url.replace(':cid', cid);
                    $.ajax({
                        url: url
                        , type: 'DELETE'
                        , success: function(response) {
                            if (response.success) {
                                // alert(response.message);
                                window.location.reload();
                            } else {
                                alert(response.message);
                            }
                        }
                    });

                }
            });
            var bid;
            $(document).on('click', '.btn_branch_delete', function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                bid = $(this).attr('data-id');

                if (confirm("Are you sure you want to remove this Branch?") == true) {
                    var url = "{{ route('admin.customer.branch.destroy', ':bid') }}";
                    url = url.replace(':bid', bid);
                    $.ajax({
                        url: url
                        , type: 'DELETE'
                        , success: function(response) {
                            if (response.success) {
                                window.location.reload();
                            } else {
                                alert(response.message);
                            }
                        }
                    });

                }
            });
            var pid;
            $(document).on('click', '.btn_delete_paymethod', function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                pid = $(this).attr('data-id');

                if (confirm("Are you sure you want to remove this Payment Method?") == true) {
                    var url = "{{ route('admin.payment.method.destroy', ':pid') }}";
                    url = url.replace(':pid', pid);
                    $.ajax({
                        url: url
                        , type: 'DELETE'
                        , success: function(response) {
                            if (response.success) {
                                window.location.reload();
                            } else {
                                alert(response.message);
                            }
                        }
                    });

                }
            });


            $('.btn_branch_edit').on('click', function() {
                var branchId = $(this).data('id');
                var url = "{{ route('admin.get.edit.branch', ':id') }}";
                url = url.replace(':id', branchId);
                $.ajax({
                    url: url
                    , type: 'GET'
                    , success: function(data) {
                        $('#edit_branch input[name="branch_id"]').val(data.branch.id);
                        $('#edit_branch input[name="branch_name"]').val(data.branch.branch_name);
                        $('#edit_branch select[name="no_of_emps"]').val(data.branch.no_of_emps);
                        $('#edit_branch input[name="street_addr"]').val(data.branch.street_addr);
                        $('#edit_branch input[name="city"]').val(data.branch.city);
                        $('#edit_branch input[name="postal_code"]').val(data.branch.postal_code);
                        $('#edit_branch input[name="province"]').val(data.branch.province);
                        $('#edit_branch input[name="country"]').val(data.branch.country);
                        $('#edit_branch input[name="phone"]').val(data.branch.phone);
                        $('#edit_branch input[name="fax"]').val(data.branch.fax);
                        $('#edit_branch input[name="web_url"]').val(data.branch.web_url);
                        $('#edit_branch textarea[name="branch_notes"]').val(data.branch.branch_notes);

                    }
                    , error: function(error) {
                        console.error('Ajax request failed:', error);
                    }
                });
            });
            $('.btn_edit_contact').on('click', function() {
                var contactId = $(this).data('id');
                var url = "{{ route('admin.customer.contact.edit', ':id') }}";
                url = url.replace(':id', contactId);
                $.ajax({
                    url: url
                    , type: 'GET'
                    , success: function(data) {
                        $('#edit_customer_contact_form input[name="contact_id"]').val(data.contact.id);
                        $('#edit_customer_contact_form select[name="relation"]').val(data.contact.relation);
                        $('#edit_customer_contact_form select[name="mr_mrs"]').val(data.contact.mr_mrs);
                        $('#edit_customer_contact_form input[name="first_name"]').val(data.contact.first_name);
                        $('#edit_customer_contact_form input[name="last_name"]').val(data.contact.last_name);
                        $('#edit_customer_contact_form input[name="main_email"]').val(data.contact.main_email);
                        $('#edit_customer_contact_form input[name="alt_email"]').val(data.contact.alt_email);
                        $('#edit_customer_contact_form input[name="phone"]').val(data.contact.phone);
                        $('#edit_customer_contact_form input[name="fax"]').val(data.contact.fax);
                        $('#edit_customer_contact_form input[name="cell_phone"]').val(data.contact.cell_phone);
                        $('#edit_customer_contact_form textarea[name="notes"]').val(data.contact.contact_notes);
                        $('#edit_customer_contact_form select[name="allow_email"]').val(data.contact.allow_email);
                        $('#edit_customer_contact_form input[name="street_addr"]').val(data.contact.street_addr);
                        $('#edit_customer_contact_form input[name="city"]').val(data.contact.city);
                        $('#edit_customer_contact_form input[name="postal_code"]').val(data.contact.postal_code);
                        $('#edit_customer_contact_form select[name="province"]').val(data.contact.province);
                        $('#edit_customer_contact_form select[name="country"]').val(data.contact.country);

                    }
                    , error: function(error) {
                        console.error('Ajax request failed:', error);
                    }
                });
            });
            $('.btn_create_login_form').on('click', function() {
                var contactId = $(this).data('id');
                var url = "{{ route('admin.customer.contact.edit', ':id') }}";
                url = url.replace(':id', contactId);
                $.ajax({
                    url: url
                    , type: 'GET'
                    , success: function(data) {
                        $('#login_store input[name="first_name"]').val(data.contact.first_name);
                        $('#login_store input[name="last_name"]').val(data.contact.last_name);
                        $('#login_store input[name="email"]').val(data.contact.main_email);

                    }
                    , error: function(error) {
                        console.error('Ajax request failed:', error);
                    }
                });
            });
        });

        $(document).ready(function () {
            $('.transact_type_selected').on('click', function(event) {
                $('.transact_type_selected').removeClass('selected').find('svg').remove();
                $(this).addClass('selected').prepend('<svg class="svg-inline--fa fa-check" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"></path></svg>');
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
        });
        $(document).ready(function() {
            $('.purchase_option').on('click', function () {
                var selectedValue = $(this).attr('data-value');
                $('#selected_purchase_type').val(selectedValue);
                $(this).addClass('selected').siblings().removeClass('selected');
            });
            $('#gift_certificate_list_clear_filter').click(function () { 
                window.location.href = "{{ route('admin.GiftCertificate.index') }}"           
            });
            $(document).on('click', '.gift_certificate_list_delete', function() {
                var id = $(this).attr('data-id');

                if (confirm("Do you really want to delete this record?") == true) {
                    var url = "{{ route('admin.GiftCertificate.destroy', ':id') }}";
                    url = url.replace(':id', id);
                    $.ajax({
                        url: url,
                        type: 'DELETE',
                        data: {_token:  "{{csrf_token()}}"},
                        success: function(response) {
                            if (response.success) {
                                alert(response.message);
                                // window.location.href = "{{ route('admin.customer.index') }}";
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
            $('#new_gift_cert_post').submit(function(event) {
                event.preventDefault();

                // if (!confirm("Create the gift certificate and process payment?"))
                //     return;

                var purchase_type = $("#selected_purchase_type").val();
                if (purchase_type == '' && !$(".purchase_option").hasClass("selected")) {
                    alert("Please select the purchase type!");
                    return false;
                }

                if (purchase_type == '2') {
                    var part_of_ad_campaign = $(".part_of_ad_campaign").find("span.selected").attr("value");
                    if (!$(".part_of_ad_campaign").find("span").hasClass("selected")) {
                        alert("Please select if this is part of ad-campaign or not!");
                        return false;
                    }

                    if (part_of_ad_campaign == 'yes') {
                        var mcampaign_id = $("#gc_mcampaign").val();
                        $('.mcampaign_wrap').show();
                        if (mcampaign_id == "") {
                            alert("Please select the ad. campaign!");
                            return false;
                        }
                    }
                }
                var face_value = $(".gift_cert_face_value").val();
                if (face_value == "") {
                    alert("Please enter the gift certificate value!");
                    return false;
                }

                var purchase_date = $.trim($("#new_gift_cert_purchase_date").val());
                if (purchase_date == "") {
                    alert("Please enter the purchase date!");
                    return false;
                }
                this.submit();
            });
            $("#frm_edit_gift_certificate").validate({
                rules: {
                    'edit_gift_certificate_face_value': {
                        required: true,
                        number: true
                    },
                },
                messages: {
                    'edit_gift_certificate_face_value': {
                        number: 'Please enter Face Value integer number',
                        required: 'Please enter Face Value or Face Value too short. It has to be #min_len# characters.',
                    }
                }
            });
        });

    </script>
@endsection
