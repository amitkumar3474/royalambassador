@extends('admin.layouts.master')
@section('title', $event->id.' - '.$event->customer->customer_name.' - Event Details')
@section('style')
    <style>
        .menu_master {
            display: inline-block;
            width: 45%;
            vertical-align: top;
            border: 1px solid #999;
            padding: .1em;
        }
        .cur_menu_wrap {
            display: inline-block;
            width: 45%;
            vertical-align: top;
            margin-left: .5em;
        }
        .small_button {
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
        .mnu_search_wrap {
            float: right;
            margin-top: .1em;
        }
        .master_cat_name {
            background: #E7E7E7;
            padding: .1em .3em;
            margin: .1em;
            border: 1px solid #999;
            cursor: pointer;
            font-size: larger;
        }
        .master_cat .master_item {
            padding: .1em .3em;
            margin: .1em;
                margin-left: 0.1em;
            border-bottom: 1px dotted #000;
            margin-left: .9em;
            position: relative;
            cursor: pointer;
        }
        .master_cat .master_item > div {
            display: grid;
            grid-template-columns: 8fr 1fr;
        }
        .master_cat .master_item a {
            text-decoration: none;
        }
        .svg-inline--fa {
            display: var(--fa-display,inline-block);
            height: 1em;
            overflow: visible;
            vertical-align: -.125em;
        }
        .stitle_wrap {
            border: 2px solid #927F38;
            margin-bottom: .4em;
        }
        .stitle_row {
            margin-bottom: .5em;
            font-size: larger;
            display: grid;
            padding: .25em;
            grid-template-columns: 32px 5fr auto;
            background: #c5d7ee;
        }
        .stitle_order {
            min-width: 18px;
            height: 17px;
            background: #927F38;
            border-radius: 12px;
            text-align: center;
            margin-right: 3px;
            display: inline-block;
            color: #FFF;
        }
        .stitle_name {
            display: inline-block;
            min-width: 10em;
            cursor: pointer;
        }
        .btn {
            font-size: 1em;
            margin-left: .2em;
            cursor: pointer;
            background: none;
            color: #F7941E;
            min-width: auto;
        }
        .stitle_menu_items {
            min-height: 2em;
        }
        .cur_menu_wrap .cur_item {
            margin: .3em;
                margin-left: 0.3em;
            margin-left: .9em;
            display: grid;
            grid-template-columns: .5fr .5fr 9fr 1fr 1fr 1.5fr 1fr 2fr;
            border: 1px dotted #565471;
            padding: .2em;
            background: #ecf1f7;
        }
        .toggle_move {
            padding: 3px;
            background: #CCC;
        }
        .toggle_move.off {
            color: #000;
        }
        .line_items_master {
            display: inline-block;
            width: 45%;
            vertical-align: top;
            border: 1px solid #999;
            padding: .1em;
        }
        .line_item_cat_name {
            background: #E7E7E7;
            padding: .1em .3em;
            margin: .1em;
            border: 1px solid #999;
            cursor: pointer;
            font-size: larger;
        }
        .all_line_items_wrap {
            display: inline-block;
            width: 45%;
            vertical-align: top;
            margin-left: .5em;
            border: 2px solid #927F38;
        }
        .cur_line_item {
            margin: .3em;
            display: grid;
            grid-template-columns: .5fr 3fr 10fr 1fr 2fr 2fr 1.5fr;
        }
        .cur_line_item.cur_security_deposit {
            margin: .3em;
            display: grid;
            grid-template-columns: .5fr 10fr 1fr 2fr 2fr 1.5fr;
        }
        .master_cat .master_line_item {
            padding: .1em .3em;
            margin: .1em;
                margin-left: 0.1em;
            border-bottom: 1px dotted #000;
            margin-left: .9em;
            position: relative;
            cursor: pointer;
        }
        .hlighted {
            background: #B3D1ef;
        }
        .btn_cancel_add_item {
            position: absolute;
            top: 1px;
            right: 3px;
        }
        table.product-list tr.total {
            font-weight: bold;
            background: #F2E8C6;
        }
    </style>
@endsection
@section('content')
<div class="title_bar card">
    <span id="event_info_top" class="xmlb_form">
        <h1>{{$event->id}} - {{$event->customer->customer_name.' ('.$event->customer->id.')'}} - {{$event->eventType->type_name}} - {{ \Carbon\Carbon::parse($event->end_date_time??$event->start_date_time)->format('D, M j - Y') }} - <nobr>@foreach ($event->eventFacilities as $_eventFaci)@if (!empty($_eventFaci->facility)){{$_eventFaci->facility->facility_name}} |@endif @endforeach</nobr>
            <span class="event_booked event_status">@if ($event->event_status == 1) {{'Tentative'}}@elseif($event->event_status == 2) {{'Booked'}}@elseif($event->event_status == 4) {{'Archived'}}@elseif($event->event_status == 5) {{'Promised'}} @endif</span></a>
        </h1>
    </span>
</div>
<div class="line_break"></div>
<div id="event_tabs" class="tab_content ui-tabs ui-widget ui-widget-content ui-corner-all">
    <ul class="ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all" role="tablist">
        <li class="ui-state-default ui-corner-top ui-tabs-active ui-state-active" role="tab">
            <a href="#" class="ui-tabs-anchor" role="presentation" tabindex="-1" id="ui-id-1">Event Details</a>
        </li>
        <li class="ui-state-default ui-corner-top" role="tab">
            <a href="#" class="ui-tabs-anchor" role="presentation" tabindex="-2" id="ui-id-2">Rooms</a>
        </li>
        <li class="ui-state-default ui-corner-top" role="tab">
            <a href="#" class="ui-tabs-anchor" role="presentation" tabindex="-3" id="ui-id-3">Menu Items </a>
        </li>
        <li class="ui-state-default ui-corner-top" role="tab">
            <a href="#" class="ui-tabs-anchor" role="presentation" tabindex="-4" id="ui-id-4">Extra Options </a>
        </li>
        <li class="ui-state-default ui-corner-top" role="tab">
            <a href="#" class="ui-tabs-anchor" role="presentation" tabindex="-5" id="ui-id-5">Deposit Schedule </a>
        </li>
        <li class="ui-state-default ui-corner-top" role="tab">
            <a href="#" class="ui-tabs-anchor" role="presentation" tabindex="-6" id="ui-id-6">For Customer </a>
        </li>
        <li class="ui-state-default ui-corner-top" role="tab">
            <a href="#" class="ui-tabs-anchor" role="presentation" tabindex="-7" id="ui-id-7">Item Details </a>
        </li>
        <li class="ui-state-default ui-corner-top" role="tab">
            <a href="#" class="ui-tabs-anchor" role="presentation" tabindex="-8" id="ui-id-8">Docs </a>
        </li>
        <li class="ui-state-default ui-corner-top" role="tab">
            <a href="#" class="ui-tabs-anchor" role="presentation" tabindex="-9" id="ui-id-9">Communications </a>
        </li>
    </ul>
    <div class="ui-tabs-panel ui-widget-content ui-corner-bottom" id="event_tabs-1" aria-labelledby="ui-id-1" role="tabpanel" aria-expanded="true" aria-hidden="false">
        <div class="cus-row ">
            @if ($event->lnk_event_type == '23')
                <div class="col-9 main-order-item">
                    <div class="global-form main-form">
                        <h3>Main</h3>
                        <div class="cus-row">
                            <div class="col-6 main-order-item">
                                <div class="cus-row">
                                    <div class="col-6 mb-10">
                                        <label class="align-right">Customer:</label>
                                    </div>
                                    <div class="col-6 mb-10">
                                        <a href="{{route('admin.customer.show',$event->customer->id)}}">{{$event->contact->full_name}}</a>@
                                    </div>
                                    <div class="col-6 mb-10">
                                        <label class="align-right">Sales Persons:</label>
                                    </div>
                                    <div class="col-6 mb-10">
                                        <span>
                                            @foreach ($event->salesPersons() as $sales_person)
                                                {{$sales_person->name}}|
                                            @endforeach
                                        </span>
                                    </div>
                                    <div class="col-6 mb-10">
                                        <label class="align-right">Initial Contact:</label>
                                    </div>
                                    <div class="col-6 mb-10">
                                        <span>{{\Carbon\Carbon::parse($event->created_at)->format('M j - Y')}}</span>
                                    </div>
                                    <div class="col-6 mb-10">
                                        <label class="align-right">Function Date:</label>
                                    </div>
                                    <div class="col-6 mb-10">
                                        <span>{{ \Carbon\Carbon::parse($event->start_date_time)->format('D, M j - Y') }}</span>
                                    </div>
                                    <div class="col-6 mb-10">
                                        <label class="align-right">Guests:</label>
                                    </div>
                                    <div class="col-6 mb-10">
                                        <span><a href="javascript:void(0)" class="update_guests">{{$event->adults}}</a></span>
                                    </div>
                                    <div class="col-6 mb-10">
                                        <label class="align-right">Price per Guest:</label>
                                    </div>
                                    <div class="col-6 mb-10">
                                        <span>${{number_format($event->price_per_person,2)}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 main-order-item">
                                @if ($event->delivery_type == 1)
                                    <div  style="background: #E7F4C6;padding: 12px; border-radius: 6px">
                                        <span class="d-flex"><label>To be delivered at:</label> {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $event->start_date_time)->format('h:iA') }}<label class="pl-20">delivery</label></span>
                                        <label>Deliver to:</label>{{$event->ship_to_first_name.' '.$event->ship_to_last_name}}<br> <span>,{{province($event->contact->province)}} <br>Phone: {{$event->contact->phone}}</span>
                                    </div>
                                @else
                                    <div class="d-flex" style="background: #E7F4C6;padding: 12px; border-radius: 6px">
                                        <label>Customer will pick up at:</label> {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $event->start_date_time)->format('h:iA') }}<br>
                                    </div>
                                @endif
                            </div>
                            <div class="line_break"></div>
                            @if ($event->ship_to_first_name == null && $event->ship_to_street == null && $event->ship_to_city == null && $event->ship_to_phone == null && $event->delivery_type == 1)
                            <span style="background-color: #DB241E;color:#ffff" class="warning">Delivery information not complete. Please use "Ship to Address".</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-3 main-order-item">
                    <div class="global-form main-form">
                        <div class="catering_col">
                            <h3>Totals and Taxes</h3>
                            <div class="cus-row">
                                <div class="col-8 mt-10 mb-10">
                                    <label>Total Menu Items:</label>
                                </div>
                                <div class="col-4 mt-10 mb-10">
                                    <span class="element">$0.00</span>
                                </div>
                                <div class="col-8 mb-10">
                                    <label>Total Extra Options:</label>
                                </div>
                                <div class="col-4 mb-10">
                                    <span class="element">$0.00</span>
                                </div>
                                <div class="col-8 mb-10">
                                    <label>Sub-total:</label>
                                </div>
                                <div class="col-4 mb-10">
                                    <span class="element">$0.00</span>
                                </div>
                                <div class="col-8 mb-10">
                                    <label>HST:</label>
                                </div>
                                <div class="col-4 mb-10">
                                    <span class="element">$0.00</span>
                                </div>
                                <div class="col-8 mb-10">
                                    <label>Grand Total:</label>
                                </div>
                                <div class="col-4 mb-10">
                                    <span class="element">$0.00</span>
                                </div>
                                <div class="col-8 mb-10">
                                    <label>Deposit:</label>
                                </div>
                                <div class="col-4 mb-10">
                                    <span class="element">$0.00</span>
                                </div>
                                <div class="col-8 mb-10">
                                    <label>Balance:</label>
                                </div>
                                <div class="col-4 mb-10">
                                    <span class="element">$0.00</span>
                                </div>
                            </div>
                          </div>
                    </div>
                </div>
                <div class="line_break"></div>
                <p class="footer_actions mb-10 ml-20" style="text-align: center;">
                    @if ($event->delivery_type == 1)
                    <button id="event_catering_edit_ship_address" class="button font-bold radius-0">Ship to Address</button>
                    @endif
                    <button id="event_details_catering_edit" name="event_details_catering_edit" class="button font-bold radius-0">Labels (0 Needed)</button>
                    <input type="submit" value="Invoice" id="event_details_catering_misc" name="event_details_catering_misc" class="button font-bold radius-0" onclick="return preSubmitevent_details_catering() ;">
                    <input type="submit" value="Kitchen Sheet" id="event_details_catering_create_pdf" name="event_details_catering_create_pdf" class="button font-bold radius-0">
                    <button class="button font-bold radius-0 event_quick_edit">Quick Edit</button>
                    <a href="{{route('admin.event.edit',$event->id)}}" id="event_details_catering_edit"><span class="special_action button font-bold radius-0">Edit Event</span></a>
                    <input type="submit" value="Delete Event" id="event_details_catering_edit" name="event_details_catering_edit" class="button font-bold radius-0" onclick="return confirm('Are you sure you want to delete this Event?') ;">
                    <input type="submit" value="Via Public Site" id="event_details_catering_edit" name="event_details_catering_edit" class="button font-bold radius-0" onclick="return confirm('This will take you to public web site to add/remove the items. Continue?') ;">
                </p>
                <div class="col-12 main-order-item">
                    <fieldset>
                        <legend>Notes</legend>
                        <form id="function_notes_event_form" action="" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="event_id" value="{{$event->id}}">
                            <input type="hidden" name="function_notes" value="function_notes">
                            <label>Function Notes:</label>
                            <div class="notes_wrap">
                                <span id="event_special_notes" style="border-bottom: 2px dotted #3E8DA7;" class="jeditable" je_type="textarea" je_width="420px" je_height="60px" title="Click to edit...">{{$event->special_notes??'Click to edit'}}</span>
                                <span class="event_special_notes d-none">
                                    <textarea name="event_special_notes" cols="45" rows="5" placeholder="Click to edit...">{{$event->special_notes}}</textarea>
                                    <button type="submit" class="button font-bold radius-0 mr-10">Ok</button>
                                    <button type="button" class="cancel-button button font-bold radius-0">Cancel</button>
                                </span>
                            </div><br><br><label>Invoice Notes:</label>
                            <div class="notes_wrap">
                                <span id="event_invoice_notes" style="border-bottom: 2px dotted #3E8DA7;" class="jeditable" je_type="textarea" je_width="420px" je_height="60px" title="Click to edit...">{{$event->invoice_notes??'Click to edit'}}</span>
                                <span class="event_special_notes d-none">
                                    <textarea name="event_invoice_notes" cols="45" rows="5" placeholder="Click to edit...">{{$event->invoice_notes}}</textarea>
                                    <button type="submit" class="button font-bold radius-0 mr-10">Ok</button>
                                    <button type="button" class="cancel-button button font-bold radius-0">Cancel</button>
                                </span>
                            </div><br><br><label>Office Notes:</label>
                            <div class="notes_wrap">
                                <span id="event_office_notes" style="border-bottom: 2px dotted #3E8DA7;" class="jeditable" je_type="textarea" je_width="420px" je_height="60px" title="Click to edit...">{{$event->office_notes??'Click to edit'}}</span>
                                <span class="event_special_notes d-none">
                                    <textarea name="event_office_notes" cols="45" rows="5" placeholder="Click to edit...">{{$event->office_notes}}</textarea>
                                    <button type="submit" class="button font-bold radius-0 mr-10">Ok</button>
                                    <button type="button" class="cancel-button button font-bold radius-0">Cancel</button>
                                </span>
                            </div>
                        </form>
                    </fieldset>
                </div>
                <div class="line_break"></div>
                <div class="footer_actions">
                    <button id="event_details_catering_edit" name="event_details_catering_edit" class="button font-bold radius-0">Email Quotation</button>
                    <button id="event_details_regular_edit" name="event_details_regular_edit" class="button font-bold radius-0">General Email</button>
                </div>
            @else
                <div class="col-9 main-order-item">
                    <div class="global-form main-form">
                        <fieldset id="event_main">
                            <legend>Main</legend>
                            <div class="mains_wrap">
                                <div class="cus-row ">
                                    <div class="col-4 main-order-item">
                                        <fieldset id="event_main">
                                            <div class="cus-row ">
                                                <div class="col-5 mb-10">
                                                    <label class="align-right">Customer:</label>
                                                </div>
                                                <div class="col-7 mb-10 pl-0">
                                                    <a href="{{route('admin.customer.show',$event->customer->id)}}">{{$event->contact->full_name}}</a>@
                                                </div>
                                                <div class="col-5 mb-10">
                                                    <label class="align-right">Sales Persons:</label>
                                                </div>
                                                <div class="col-7 mb-10 pl-0">
                                                    <span> 
                                                        @foreach ($event->salesPersons() as $sales_person)
                                                        {{$sales_person->name}}|
                                                        @endforeach
                                                    </span>
                                                </div>
                                                <div class="col-5 mb-10">
                                                    <label class="align-right">Initial Contact:</label>
                                                </div>
                                                <div class="col-7 mb-10 pl-0">
                                                    <span>{{\Carbon\Carbon::parse($event->created_at)->format('M j - Y')}}</span>
                                                </div>
                                                <div class="col-5 mb-10">
                                                    <label class="align-right">Contract Type:</label>
                                                </div>
                                                <div class="col-7 mb-10 pl-0">
                                                    <span>@if ($event->contract_type == 'CER') {{' Ceremony Only'}}@elseif($event->contract_type == 'RHS') {{' Rehearsal'}}@elseif($event->contract_type == 'INS') {{' Catered by RA'}}@elseif($event->contract_type == 'MRN') {{' Morning Event'}}@elseif($event->contract_type == 'OLD') {{'  Old Event'}} @endif</span>
                                                </div>
                                                @if (isset($event->booking_date))
                                                <div class="col-5 mb-10">
                                                    <label class="align-right">Booked On:</label>
                                                </div>
                                                <div class="col-7 mb-10 pl-0">
                                                    <span></span>
                                                </div>
                                                @endif
                                                <div class="col-5 mb-10">
                                                    <label class="align-right">By:</label>
                                                </div>
                                                <div class="col-7 mb-10 pl-0">
                                                    <span>{{$event->customer->user->name}}</span>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="col-4 main-order-item">
                                        <fieldset id="event_main">
                                            <div class="cus-row ">
                                                <div class="col-6 mb-10">
                                                    <label class="align-right">Meal Type:</label>
                                                </div>
                                                <div class="col-6 mb-10 pl-0">
                                                    <span>@if ($event->dining_type == 1) {{'Sit Down'}}@elseif($event->dining_type == 2) {{'Buffet'}}@elseif($event->dining_type == 4) {{'No Meal'}}@elseif($event->dining_type == 5) {{'Family Style'}} @endif</span>
                                                </div>
                                                <div class="col-6 mb-10">
                                                    <label class="align-right">Function Date:</label>
                                                </div>
                                                <div class="col-6 mb-10 pl-0">
                                                    <span>{{ \Carbon\Carbon::parse($event->start_date_time)->format('D, M j - Y') }}</span>
                                                </div>
                                                <div class="col-4 mb-10">
                                                    <label class="align-right">Time:</label>
                                                </div>
                                                <div class="col-8 mb-10 pl-0">
                                                    <span>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $event->start_date_time)->format('h:iA') }} to {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $event->end_date_time)->format('h:iA') }}</span>
                                                </div>
                                                @if (isset($event->no_of_tables))
                                                <div class="col-4 mb-10">
                                                    <label class="align-right">No of Tables:</label>
                                                </div>
                                                <div class="col-8 mb-10 pl-0">
                                                    <a href="javascript:void(0)"><span>{{$event->no_of_tables}}</span></a>
                                                </div>
                                                @endif
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="col-4 main-order-item">
                                        <fieldset id="event_main">
                                            <h2>Guests</h2>
                                            <div class="cus-row ">
                                                <div class="col-4 mb-10">
                                                    <label class="align-right">Adults:</label>
                                                </div>
                                                <div class="col-3 mb-10 pl-0">
                                                    <span><a href="javascript:void(0)" class="update_guests">{{$event->adults}}</a></span>
                                                </div>
                                                <div class="col-5 mb-10 pl-0">
                                                    <span>(actual: {{$event->adults_actual}})</span>
                                                </div>
                                                <div class="col-4 mb-10">
                                                    <label class="align-right">Children:</label>
                                                </div>
                                                <div class="col-3 mb-10 pl-0">
                                                    <span><a href="javascript:void(0)" class="update_guests">{{$event->kids}}</a></span>
                                                </div>
                                                <div class="col-5 mb-10 pl-0">
                                                    <span>(actual: {{$event->kids_actual}})</span>
                                                </div>
                                                <div class="col-4 mb-10">
                                                    <label class="align-right">Pros:</label>
                                                </div>
                                                <div class="col-3 mb-10 pl-0">
                                                    <span><a href="javascript:void(0)" class="update_guests">{{$event->pros}}</a></span>
                                                </div>
                                                <div class="col-5 mb-10 pl-0">
                                                    <span>(actual: {{$event->pros_actual}})</span>
                                                </div>
                                                <div class="col-4 mb-10">
                                                    <label class="align-right">Babies:</label>
                                                </div>
                                                <div class="col-3 mb-10 pl-0">
                                                    <span><a href="javascript:void(0)" class="update_guests">{{$event->babies}}</a></span>
                                                </div>
                                                <div class="col-5 mb-10 pl-0">
                                                    <span>(actual: {{$event->babies_actual}})</span>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                                <div class="cus-row ">
                                    <div class="col-4 main-order-item">
                                        <fieldset id="event_main">
                                            <h2>Price Per Person</h2>
                                            <div class="cus-row ">
                                                <div class="col-5 mb-10">
                                                    <label class="align-right">Adult:</label>
                                                </div>
                                                <div class="col-7 mb-10 pl-0">
                                                    <span>${{number_format($event->price_per_person_contract,2)??0.00}}</span>
                                                </div>
                                                <div class="col-5 mb-10">
                                                    <label class="align-right">Child:</label>
                                                </div>
                                                <div class="col-7 mb-10 pl-0">
                                                    <span>${{number_format($event->price_per_kid_contract,2)??0.00}}</span>
                                                </div>
                                                <div class="col-5 mb-10">
                                                    <label class="align-right">Pro:</label>
                                                </div>
                                                <div class="col-7 mb-10 pl-0">
                                                    <span>${{number_format($event->price_per_pro_contract,2)??0.00}}</span>
                                                </div>
                                                <div class="col-5 mb-10">
                                                    <label class="align-right">Baby:</label>
                                                </div>
                                                <div class="col-7 mb-10 pl-0">
                                                    <span>${{number_format($event->price_per_baby,2)??0.00}}</span>
                                                </div>
                                                <div class="col-5 mb-10">
                                                    <label class="align-right">Net:</label>
                                                </div>
                                                <div class="col-7 mb-10 pl-0">
                                                    <span>$0.00</span>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="col-4 main-order-item">
                                        <fieldset id="event_main">
                                            <h2>Contract Price</h2>
                                            <div class="cus-row ">
                                                <div class="col-6 mb-10">
                                                    <label class="align-right">Adult:</label>
                                                </div>
                                                <div class="col-6 mb-10 pl-0">
                                                    <span><a href="javascript:void(0)" class="event_quick_edit">${{number_format($event->price_per_person_contract,2)??0.00}}</a></span>
                                                </div>
                                                <div class="col-6 mb-10">
                                                    <label class="align-right">Child:</label>
                                                </div>
                                                <div class="col-6 mb-10 pl-0">
                                                    <span><a href="javascript:void(0)" class="event_quick_edit">${{number_format($event->price_per_kid_contract,2)??0.00}}</a></span>
                                                </div>
                                                <div class="col-6 mb-10">
                                                    <label class="align-right">Pro:</label>
                                                </div>
                                                <div class="col-6 mb-10 pl-0">
                                                    <span><a href="javascript:void(0)" class="event_quick_edit">${{number_format($event->price_per_pro_contract,2)??0.00}}</a></span>
                                                </div>
                                                <div class="col-12 mb-10">
                                                    <button type="button" class="button font-bold radius-0">Set Price</button>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="col-4 main-order-item">
                                        <fieldset id="event_main">
                                            <div class="cus-row ">
                                                <div class="col-12 mb-10">
                                                    <h3>Floor Plans <a href="javascript:void(0)" class="add_floor_plans_btn">+</a></h3>
                                                </div>
                                                <div class="col-12 mb-10 ">
                                                    <div class="cus-row ">
                                                        @if (!empty($event->floorPlans))
                                                            @foreach ($event->floorPlans as $_floorplan)
                                                                <div class="col-6 mb-10">
                                                                    <a href="{{route('admin.event.floor-plans.show',$_floorplan->id)}}">{{$_floorplan->floorPlanRoom->room_name}} </a>
                                                                </div>
                                                                <div class="col-6 mb-10">
                                                                    <button type="button" data-id="{{$_floorplan->id}}" class="button font-bold radius-0 delete_floor_plans_btn">Delete</button>
                                                                </div>
                                                            @endforeach
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-12 mb-10">
                                                    <h3>Itinerary @if (empty($event->itinerary->itineraryTemplate->tmpl_title)) <a href="javascript:void(0)" class="create_itinerary_btn">+</a>@endif</h3>
                                                </div>
                                                @if (!empty($event->itinerary->itineraryTemplate->tmpl_title))
                                                    <div class="col-8 mb-10 ">
                                                        <a href="{{route('admin.event.itinerary.show',$event->itinerary->id)}}">{{$event->itinerary->itineraryTemplate->tmpl_title}}</a>
                                                    </div>
                                                    <div class="col-4 mb-10 pl-0 ">
                                                        <button type="button" data-id="{{$event->itinerary->id}}" class="button font-bold radius-0 delete_itinerary_btn">Delete</button>
                                                    </div>
                                                @endif
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                            <div class="line_break"></div>
                            <p class="footer_actions mb-10" style="text-align: center;">
                                <input type="submit" value="Contract" id="btn_download_contract" name="btn_download_contract" class="button font-bold radius-0" >
                                <input type="submit" value="Invoice" id="btn_download_invoice" name="btn_download_invoice" class="button font-bold radius-0" >
                                <input type="submit" value="Event Sheet" id="event_details_regular_create_pdf" name="event_details_regular_create_pdf" class="button font-bold radius-0">
                                <input type="submit" value="Kitchen Sheet" id="event_details_regular_create_pdf" name="event_details_regular_create_pdf" class="button font-bold radius-0">
                                <a href="{{route('admin.event.edit',$event->id)}}" id="event_details_regular_edit"><span class="special_action button font-bold radius-0">Edit Event</span></a>
                                <button class="button font-bold radius-0 event_quick_edit">Quick Edit</button>
                                <input type="button" data-id="{{$event->id}}" value="Delete Event" id="event_details_regular_delete" class="button font-bold radius-0" onclick="return confirm('Are you sure you want to delete this Event?') ;">
                                <input type="submit" value="Add More Days" id="event_details_regular_edit" name="event_details_regular_edit" class="button font-bold radius-0" onclick="return confirm('Are you sure you want to convert this event to one with multiple days?') ;">
                                <button id="event_details_regular_edit" name="event_details_regular_edit" class="button font-bold radius-0 mt-10">Duplicate From</button>
                            </p>
                        </fieldset>
                    </div>
                </div>
                <div class="col-3 main-order-item">
                    <fieldset id="totals_taxes">
                        <legend>Totals and Taxes</legend>
                        <div class="event_totals" style="display: block;">
                            <p class="mb-10"><label>Total Menu Items:</label> <span class="element">${{number_format($event->total_menu_items,2)}}</span></p>
                            <p class="mb-10"><label>Total Children:</label> <span class="element">${{number_format($event->total_children,2)}}</span></p>
                            <p class="mb-10"><label>Total Babies:</label> <span class="element">${{number_format($event->total_babies,2)}}</span></p>
                            <p class="mb-10"><label>Total Pros:</label> <span class="element">${{number_format($event->total_pros,2)}}</span></p>
                            <p class="mb-10"><label>Total Extra Options:</label> <span class="element">$0.00</span></p>
                            <p class="mb-10"><label>Total Room:</label> <span class="element">${{number_format($event->total_room_rental,2)}}</span></p>
                            <p class="mb-10"><label>Total Gazebo:</label> <span class="element">${{number_format($event->total_gazebo,2)}}</span></p>
                            <p class="mb-10"><label>Security Deposit:</label> <span class="element">${{number_format($event->total_security_deposit,2)}}</span></p>
                            <hr>
                            <p class="mb-10"><label>Sub-total:</label> <span class="element">${{number_format($event->sub_total,2)}}</span></p>
                            <p class="mb-10"><label>Setup %:</label> <span class="element">{{number_format($event->gratuity_percent,2)}}%</span></p>
                            <p class="mb-10"><label>Setup $:</label> <span class="element">${{number_format($event->gratuity_amount,2)}}</span></p>
                            <p class="mb-10"><label>HST:</label> <span class="element">${{number_format($event->tax1_amount,2)}}</span></p>
                            <p class="mb-10"><label>Total:</label> <span class="element">${{number_format($event->balance,2)}}</span></p>
                            <p class="mb-10"><label>Deposit:</label> <span class="element">${{number_format($event->deposit,2)}}</span></p>
                            <p class="mb-10"><label>Balance:</label> <span class="element">${{number_format($event->balance,2)}}</span></p>
                        </div>
                    </fieldset>
                </div>
                <div class="col-12 main-order-item">
                    <fieldset>
                        <legend>Notes</legend>
                        <label>Function Notes:</label>
                        <form id="function_notes_event_form" action="" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="event_id" value="{{$event->id}}">
                            <input type="hidden" name="function_notes" value="function_notes">
                            <div class="notes_wrap">
                                <span id="event_special_notes" style="border-bottom: 2px dotted #3E8DA7;" class="jeditable" je_type="textarea" je_width="420px" je_height="60px" title="Click to edit...">{{$event->special_notes??'Click to edit'}}</span>
                                <span class="event_special_notes d-none">
                                    <textarea name="event_special_notes" cols="45" rows="5" placeholder="Click to edit...">{{$event->special_notes}}</textarea>
                                    <button type="submit" class="button font-bold radius-0 mr-10">Ok</button>
                                    <button type="button" class="cancel-button button font-bold radius-0">Cancel</button>
                                </span>
                            </div><br><br><label>Contract Notes:</label>
                            <div class="notes_wrap">
                                <span id="event_contract_notes" style="border-bottom: 2px dotted #3E8DA7;" class="jeditable" je_type="textarea" je_width="420px" je_height="60px" title="Click to edit...">{{$event->contract_notes??'Click to edit'}}</span>
                                <span class="event_special_notes d-none">
                                    <textarea name="event_contract_notes" cols="45" rows="5" placeholder="Click to edit...">{{$event->contract_notes}}</textarea>
                                    <button type="submit" class="button font-bold radius-0 mr-10">Ok</button>
                                    <button type="button" class="cancel-button button font-bold radius-0">Cancel</button>
                                </span>
                            </div><br><br><label>Invoice Notes:</label>
                            <div class="notes_wrap">
                                <span id="event_invoice_notes" style="border-bottom: 2px dotted #3E8DA7;" class="jeditable" je_type="textarea" je_width="420px" je_height="60px" title="Click to edit...">{{$event->invoice_notes??'Click to edit'}}</span>
                                <span class="event_special_notes d-none">
                                    <textarea name="event_invoice_notes" cols="45" rows="5" placeholder="Click to edit...">{{$event->invoice_notes}}</textarea>
                                    <button type="submit" class="button font-bold radius-0 mr-10">Ok</button>
                                    <button type="button" class="cancel-button button font-bold radius-0">Cancel</button>
                                </span>
                            </div><br><br><label>Office Notes:</label>
                            <div class="notes_wrap">
                                <span id="event_office_notes" style="border-bottom: 2px dotted #3E8DA7;" class="jeditable" je_type="textarea" je_width="420px" je_height="60px" title="Click to edit...">{{$event->office_notes??'Click to edit'}}</span>
                                <span class="event_special_notes d-none">
                                    <textarea name="event_office_notes" cols="45" rows="5" placeholder="Click to edit...">{{$event->office_notes}}</textarea>
                                    <button type="submit" class="button font-bold radius-0 mr-10">Ok</button>
                                    <button type="button" class="cancel-button button font-bold radius-0">Cancel</button>
                                </span>
                            </div>
                        </form>
                    </fieldset>
                </div>
                <div class="line_break"></div>
                <div class="footer_actions">
                    <button id="btn_email_contract_invoice" name="btn_email_contract_invoice" class="button font-bold radius-0">Email Contract/Invoice</button>
                    <button id="event_details_regular_edit" name="event_details_regular_edit" class="button font-bold radius-0">General Email</button>
                </div>
            @endif
        </div>
        <div class="line_break"></div>
        <fieldset class="card" style="width: 50%;">
            <legend>Door Signs (0)
                <button class="button font-bold">+</button>
            </legend>
            <table class="bound">
                <tbody></tbody>
            </table>
        </fieldset>
        <div class="line_break"></div>
    </div>
    <div class="ui-tabs-panel ui-widget-content ui-corner-bottom" id="event_tabs-2" aria-labelledby="ui-id-2" style="display: none" role="tabpanel" aria-expanded="true" aria-hidden="false">
        @include('admin.events.models.room')
    </div>
    <div class="ui-tabs-panel ui-widget-content ui-corner-bottom" id="event_tabs-3" aria-labelledby="ui-id-3" style="display: none" role="tabpanel" aria-expanded="true" aria-hidden="false">
        @include('admin.events.models.menu_item')
    </div>
    <div class="ui-tabs-panel ui-widget-content ui-corner-bottom" id="event_tabs-4" aria-labelledby="ui-id-4" style="display: none" role="tabpanel" aria-expanded="true" aria-hidden="false">
        <div class="line_items_master">
            <span class="small_button btn_add_line_item_to_event">Add Item(s)</span>
            <div>
              <div class="master_cat" cat_id="5">
                <div class="line_item_cat_name">Bar</div>
                <div class="master_line_items_warp" style="display: none">
                  <div class="master_line_item" style="cursor: pointer;" gn_prod_id="2237"><span class="prod_name">HEINEKEN</span></div>
                </div>
              </div>
            </div>
            <span class="small_button btn_add_line_item_to_event">Add Item(s)</span>
        </div>
        <div class="all_line_items_wrap">
            <div class="cur_line_items_wrap" >
                <div class="cur_line_item header">
                    <span></span>
                    <span>Category</span><span>Item</span>
                    <span>Qty</span><span>Price</span><span></span>
                </div>
                <div class="cur_line_item" event_item_id="202340">
                  <span>1</span><span>Bar</span><span>HEINEKEN 
                    <a href="https://www.royalambassador.ca/db_base_info/product_menu_view.php?gn_prod_id=2237" target="_blank">
                      <svg class="svg-inline--fa fa-eye" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="eye"
                        role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg="">
                        <path fill="currentColor"
                          d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z">
                        </path>
                      </svg><!-- <i class="fas fa-eye"></i> Font Awesome fontawesome.com -->
                    </a>
                  </span>
                  <span>1</span><span>15.00</span><span>
                  <span class="btn_delete_line_item btn">
                    <svg class="svg-inline--fa fa-trash-can" aria-hidden="true" focusable="false"
                        data-prefix="far" data-icon="trash-can" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                        data-fa-i2svg="">
                        <path fill="currentColor"
                          d="M170.5 51.6L151.5 80h145l-19-28.4c-1.5-2.2-4-3.6-6.7-3.6H177.1c-2.7 0-5.2 1.3-6.7 3.6zm147-26.6L354.2 80H368h48 8c13.3 0 24 10.7 24 24s-10.7 24-24 24h-8V432c0 44.2-35.8 80-80 80H112c-44.2 0-80-35.8-80-80V128H24c-13.3 0-24-10.7-24-24S10.7 80 24 80h8H80 93.8l36.7-55.1C140.9 9.4 158.4 0 177.1 0h93.7c18.7 0 36.2 9.4 46.6 24.9zM80 128V432c0 17.7 14.3 32 32 32H336c17.7 0 32-14.3 32-32V128H80zm80 64V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16z">
                        </path>
                    </svg><!-- <i class="far fa-trash-alt"></i> Font Awesome fontawesome.com -->
                  </span>
                  <span class="btn_edit_line_item btn">
                    <svg class="svg-inline--fa fa-pen" aria-hidden="true" focusable="false"
                      data-prefix="fas" data-icon="pen" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                      data-fa-i2svg="">
                      <path fill="currentColor"
                        d="M362.7 19.3L314.3 67.7 444.3 197.7l48.4-48.4c25-25 25-65.5 0-90.5L453.3 19.3c-25-25-65.5-25-90.5 0zm-71 71L58.6 323.5c-10.4 10.4-18 23.3-22.2 37.4L1 481.2C-1.5 489.7 .8 498.8 7 505s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L421.7 220.3 291.7 90.3z">
                      </path>
                    </svg><!-- <i class="fas fa-pen"></i> Font Awesome fontawesome.com -->
                  </span>
                </span>
              </div>
            </div>
            <div class="cur_secur_deposits_wrap" style="display: block;"><br>
                <h3>Security Deposits 
                <span class="btn_add_security_deposit btn">
                    <svg class="svg-inline--fa fa-plus" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="plus" role="img"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                        <path fill="currentColor"
                        d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z">
                        </path>
                    </svg><!-- <i class="fas fa-plus"></i> Font Awesome fontawesome.com -->
                </span>
                </h3>
                <div class="cur_security_deposit cur_line_item header">
                <span></span><span>Item</span><span>Qty</span><span>Price</span><span></span>
                </div>
            </div>
        </div>
    </div>
    <div class="ui-tabs-panel ui-widget-content ui-corner-bottom" id="event_tabs-5" aria-labelledby="ui-id-5" style="display: none" role="tabpanel" aria-expanded="true" aria-hidden="false">
        <span id="event_deposit_schedule" class="xmlb_form">
            <h1>Regular Deposits
                <div class="special_action" style="display: inline-block">
                  <button type="button" class="button radius-0 new_deposit">New Deposit</button>
                </div>
            </h1>
            <table class="product-list table ">
                <tbody>
                    <tr>
                        <th>Number</th>
                        <th></th>
                        <th>
                            <a href="#">Due Date</a> 
                        </th>
                        <th>
                            <a href="#">Status</a> 
                        </th>
                        <th>
                            <a href="#">Amount</a> 
                        </th>
                        <th>
                            <a href="#">Paid</a>
                        </th>
                        <th>
                            <a href="#">Balance</a> 
                        </th>
                        <th>Payment Details</th>
                        <th>
                            <a href="#">Notes</a> 
                        </th>
                        <th>Edit</th>
                    </tr>
                    <tr>
                        
                    </tr>
                </tbody>
            </table>
            <div class="special_action">
                <button type="button" class="button radius-0 generate_default">Generate Default</button>
            </div>
        </span>
        <span id="security_event_deposits" class="xmlb_form">
            <br>
            <h1>Security Deposits</h1>
            <table class="product-list table ">
                <tbody>
                    <tr>
                        <th></th>
                        <th>
                            Due Date
                        </th>
                        <th>
                            Status
                        </th>
                        <th>
                            Amount
                        </th>
                        <th>
                            Payment Details
                        </th>
                        <th>
                            Notes
                        </th>
                        <th></th>
                    </tr>
                    <tr>
                        
                    </tr>
                </tbody>
            </table>
        </span>
        <span id="commission_list" class="xmlb_form">
            <h1>No Commission on this Event.</h1>
        </span>
    </div>
    <div class="ui-tabs-panel ui-widget-content ui-corner-bottom" id="event_tabs-6" aria-labelledby="ui-id-6" style="display: none" role="tabpanel" aria-expanded="true" aria-hidden="false">
        <span id="guest_list" class="xmlb_form">
            <div class="card">
                <div>
                    <h2>Guest List (0)</h2>
                    <hr>
                    <table class="product-list table ">
                        <tbody>
                            <tr>
                                <th>
                                    <a href="#">First Name</a> 
                                </th>
                                <th>
                                    <a href="#">Last Name</a> 
                                </th>
                                <th>
                                    <a href="#">Type</a> 
                                </th>
                                <th>Address</th>
                                <th>
                                    <a href="#">Phone</a>
                                </th>
                                <th>
                                    <a href="#">Cell Phone</a> 
                                </th>
                                <th>
                                    <a href="#">Email</a> 
                                </th>
                                <th>
                                    <a href="#">Notes</a> 
                                </th>
                            </tr>
                            <tr>
                                
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </span>
    </div>
    <div class="ui-tabs-panel ui-widget-content ui-corner-bottom" id="event_tabs-7" aria-labelledby="ui-id-7" style="display: none" role="tabpanel" aria-expanded="true" aria-hidden="false">
        <span id="menu_items_details" class="xmlb_form">
            <h1>Menu Items Details </h1>
            <p style="text-aling: right;">Records: 1 to 2 of 2</p>
            <table class="product-list table ">
                <tbody>
                    <tr>
                        <th>
                            <a href="#">Serve Title</a> 
                        </th>
                        <th>
                            <a href="#">Category</a> 
                        </th>
                        <th>Product/Item</th>
                        <th>
                            <a href="#">Age</a>
                        </th>
                        <th>
                            <a href="#">Qty</a> 
                        </th>
                        <th>
                            <a href="#">Unit Price</a> 
                        </th>
                        <th>
                            <a href="#">Total</a> 
                        </th>
                        <th>
                            <a href="#">Total after Discount</a> 
                        </th>
                        <th>
                            <a href="#">HST</a> 
                        </th>
                        <th>
                            <a href="#">Grand Total</a> 
                        </th>
                        <th></th>
                    </tr>
                    <tr>
                        
                    </tr>
                    <tr class="total">
                        <td colspan="3">Grand Total</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>$0.00</td>
                        <td>$0.00</td>
                        <td>$0.00</td>
                        <td colspan="2">$0.00</td>
                    </tr>
                </tbody>
            </table>
        </span>
        <span id="line_items_details" class="xmlb_form">
            <br>
            <h1>Line Items Detail </h1>
            <p style="text-aling: right;">Records: 1 to 1 of 1</p>
            <table class="product-list table ">
                <tbody>
                    <tr>
                        <th>
                            <a href="#">Category</a> 
                        </th>
                        <th>Product/Item</th>
                        <th>
                            <a href="#">Age</a>
                        </th>
                        <th>
                            <a href="#">Qty</a> 
                        </th>
                        <th>
                            <a href="#">Unit Price</a> 
                        </th>
                        <th>
                            <a href="#">Total</a> 
                        </th>
                        <th>
                            <a href="#">HST</a> 
                        </th>
                        <th>
                            <a href="#">Grand Total</a> 
                        </th>
                    </tr>
                    <tr>
                        
                    </tr>
                    <tr class="total">
                        <td colspan="3">Grand Total</td>
                        <td></td>
                        <td></td>
                        <td>$0.00</td>
                        <td>$0.00</td>
                        <td>$0.00</td>
                    </tr>
                </tbody>
            </table>
        </span>
    </div>
</div>
{{-- models popup element --}}
<div class="ui-widget-overlay ui-front d-none"></div>
@include('admin.events.models.popup')
@endsection
@section('scripts')
@if($errors->any())
<script>
    $(document).ready(function() {
        $('.create-popup-form.error').css('display', 'block');
        $('.ui-widget-overlay').css('display', 'block');
    });
</script>
@endif
<script>

    $(document).ready(function() {
        $('.master_cat_name, .line_item_cat_name').click(function () { 
            var items_under = $(this).closest(".master_cat").find(".master_items_warp, .master_line_items_warp");
            $(items_under).toggle();
        });
        $('.master_line_item, .master_item').click(function () { 
            if (!$(this).hasClass("hlighted")) {
                $(this).addClass("hlighted");
                $(this).append('<span class="btn btn_cancel_add_item"><svg class="svg-inline--fa fa-rectangle-xmark" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="rectangle-xmark" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64zM175 175c9.4-9.4 24.6-9.4 33.9 0l47 47 47-47c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-47 47 47 47c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-47-47-47 47c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l47-47-47-47c-9.4-9.4-9.4-24.6 0-33.9z"></path></svg><!-- <i class="fas fa-window-close"></i> Font Awesome fontawesome.com --></span>');
                $(this).css("cursor", "auto");
            }
        });
        $(document).on('click', '.btn_cancel_add_item', function () { 
            var this_row = $(this).closest(".master_line_item, .master_item");
            this_row.find(".btn_cancel_add_item").remove();
            this_row.removeClass("hlighted");
            this_row.css("cursor", "pointer");            
        });
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
            } else if (text == -5) {
                $('#event_tabs-5').show();
            } else if (text == -6) {
                $('#event_tabs-6').show();
            } else if (text == -7) {
                $('#event_tabs-7').show();
            } else if (text == -8) {
                $('#event_tabs-8').show();
            } else if (text == -9) {
                $('#event_tabs-9').show();
            }
        });
        $('.event_quick_edit').click(function () { 
            $('.ui-draggable-event-edit').show();
            $('.ui-widget-overlay').css('display', 'block');
        });
        $('.closethick-event-close').click(function() {
            $('.ui-draggable-event-edit').hide();
            $('.ui-draggable-event-edit').removeClass('error')
            $('.ui-widget-overlay').css('display', 'none');
        });
        $('.update_guests').click(function () { 
            $('.ui-draggable-update-guest').show();
            $('.ui-widget-overlay').css('display', 'block');
        });
        $('.closethick-guest-close').click(function() {
            $('.ui-draggable-update-guest').hide();
            $('.ui-draggable-update-guest').removeClass('error')
            $('.ui-widget-overlay').css('display', 'none');
        });
        $('.edit_facility_pricing').click(function () { 
            $('.ui-draggable-edit-facility').show();
            $('.ui-widget-overlay').css('display', 'block');
        });
        $('.closethick-editfacility-close').click(function() {
            $('.ui-draggable-edit-facility').hide();
            $('.ui-widget-overlay').css('display', 'none');
        });
        $('.new_add_room').click(function () { 
            $('.ui-draggable-add-facility').show();
            $('.ui-widget-overlay').css('display', 'block');
        });
        $('.closethick-addfacility-close').click(function() {
            $('.ui-draggable-add-facility').hide();
            $('.ui-widget-overlay').css('display', 'none');
        });
        $('#event_catering_edit_ship_address').click(function () { 
            $('.ui-draggable-edit-ship-address').show();
            $('.ui-widget-overlay').css('display', 'block');
        });
        $('.closethick-shipaddress-close').click(function() {
            $('.ui-draggable-edit-ship-address').hide();
            $('.ui-widget-overlay').css('display', 'none');
        });
        $('.add_floor_plans_btn').click(function () { 
            $('.ui-draggable-add-floor-plans').show();
            $('.ui-widget-overlay').css('display', 'block');
        });
        $('.closethick-floorplans-close').click(function() {
            $('.ui-draggable-add-floor-plans').hide();
            $('.ui-widget-overlay').css('display', 'none');
        });
        $('.create_itinerary_btn').click(function () { 
            $('.ui-draggable-create-Itinerary').show();
            $('.ui-widget-overlay').css('display', 'block');
        });
        $('.closethick-Itinerary-close').click(function() {
            $('.ui-draggable-create-Itinerary').hide();
            $('.ui-widget-overlay').css('display', 'none');
        });

        $('.jeditable').click(function () { 
            $('.jeditable').show();
            $(this).hide();
            $('.event_special_notes').addClass('d-none');
            $(this).next('.event_special_notes').removeClass('d-none');
        });
        $(document).delegate('.cancel-button', 'click', function () { 
            $(this).closest('.event_special_notes').addClass('d-none');
            $('.jeditable').show();
        });
        $(document).on('click', function(event) {
            if (!$(event.target).closest('.event_special_notes').length && !$(event.target).closest('.jeditable').length) {
                if($('.event_special_notes').is(":visible")) {
                    $('.event_special_notes').addClass('d-none');
                    $('.jeditable').show();
                }
            }
        });

        $('#use_contact_addr_for_ship').click(function () { 
            // e.preventDefault();
            $("#ship_to_first_name").val($(".edit_event_address").find(".cur_fname").text());
            $("#ship_to_last_name").val($(".edit_event_address").find(".cur_lname").text());
            $("#ship_to_street").val($(".edit_event_address").find(".cur_street").text());
            $("#ship_to_city").val($(".edit_event_address").find(".cur_city").text());
            // $("#ship_to_province").val($(".edit_event_address").find(".cur_province").attr("cur_province"));
            $("#ship_to_postal_code").val($(".edit_event_address").find(".cur_postal").text());
            $("#ship_to_phone").val($(".edit_event_address").find(".cur_phone").text());
            
        });

        $('#gratuity_percent').on('change', function () {
            var gratuity = parseFloat($(this).val());
            
            var subTotal = "{{$event->sub_total}}";
            var amout = (subTotal * gratuity)/100;
            // var gratuity_amount = gratuity*5;
            gratuity_amount = amout.toFixed(2);
            var formatted_gratuity_amount = gratuity_amount.toLocaleString('en-US', {style: 'currency',currency: 'USD' });
            $('#gratuity_amount').val(formatted_gratuity_amount);
        });

        $('#gratuity_amount').on('change', function () {
            var amout = parseFloat($(this).val());
            var subTotal = "{{$event->sub_total}}";
            var percent = (amout * 100)/subTotal;
            gratuity_percent = percent.toFixed(2);
            var formatted_gratuity_amount = gratuity_percent.toLocaleString('en-US', {style: 'currency',currency: 'USD' });
            $('#gratuity_percent').val(formatted_gratuity_amount);
        });
        $('#price_contract_adult').on('change', function () {
            var price_contract = parseFloat($(this).val());
            var price = price_contract*0.75;
            price = price.toFixed(2);
            var formatted_price = price.toLocaleString('en-US', {style: 'currency',currency: 'USD' });
            $('#price_contract_child').val(formatted_price);
            $('#price_contract_pros').val(formatted_price);
        });

        $("#quick_edit_event_form").validate({
            rules: {
                'edit_event_status': 'required',
                'event_edit_lnk_event_type': 'required',
                'event_edit_catering_type': 'required',
                'event_edit_price_per_baby': 'required',
                'price_contract_adult': 'required',
                'price_contract_child': 'required',
                'price_contract_pros': 'required',
                'gratuity_percent': 'required',
            }
            , messages: {
                'edit_event_status': 'Please select the event status',
                'event_edit_lnk_event_type': 'Please select the event type',
                'event_edit_catering_type': 'Please select the catering type',
                'event_edit_price_per_baby': 'Please enter Price Per Baby ',
                'price_contract_adult': 'Please enter price contract adult ',
                'price_contract_child': 'Please enter price contract child ',
                'price_contract_pros': 'Please enter price contract pros ',
                'gratuity_percent': 'Please enter Gratuity Percent ',

            }
        });
        $("#guest_update_event_form").validate({
            rules: {
                'event_update_guests_adults': 'required',
                'event_update_guests_kids': 'required',
                'event_update_guests_babies': 'required',
                'event_update_guests_pros': 'required',
                'event_adults_actual': 'required',
                'event_kids_actual': 'required',
                'event_babies_actual': 'required',
                'event_pros_actual': 'required',
            }
            , messages: {
                'event_update_guests_adults': 'Please enter Adults',
                'event_update_guests_kids': 'Please enter Kids',
                'event_update_guests_babies': 'Please enter Babies',
                'event_update_guests_pros': 'Please enter Pros',
                'event_adults_actual': 'Please enter Adults Actual ',
                'event_kids_actual': 'Please enter Kids Actual ',
                'event_babies_actual': 'Please enter Babies Actual ',
                'event_pros_actual': 'Please enter Pros Actual ',

            }
        });
        $('#frm_flooe_plans_store').validate({
            rules: {
                'floor_plan_new_lnk_fplan_room': 'required',
            },
            messages: {
                'floor_plan_new_lnk_fplan_room': 'Please select a floor plans room.',
            }
        })
        $('#frm_itinerary_store').validate({
            rules: {
                'new_itinerary_lnk_itin_tmpl': 'required',
            },
            messages: {
                'new_itinerary_lnk_itin_tmpl': 'Please select a itinerary.',
            }
        })
        $(document).on("change",".price_select",function()
        {
          $(this).closest(".event_room").find(".price").val($(this).find(":selected").attr("price")) ;
        }) ;
    });
    $(document).ready(function() {
        $(".event_facility_validate").each(function() {
            $(this).validate({
                rules: {
                    'room': 'required',
                    'pricing': 'required',
                    'price': 'required',
                    'max_shared': 'required',
                    'date_from': 'required',
                    'date_to': 'required',
                },
                messages: {
                    'room': 'Please select a room.',
                    'pricing': 'Please select a pricing.',
                    'price': 'Please enter the price.',
                    'max_shared': 'Please enter the max shared.',
                    'date_from': 'Please select room date from.',
                    'date_to': 'Please select room date to.',
                }
            });
        });
    });

    $(document).ready(function () {
        var eid;
        $(document).on('click', '#event_details_regular_delete', function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            eid = $(this).attr('data-id');
            var url = "{{ route('admin.event.destroy', ':id') }}";
            url = url.replace(':id', eid);
            $.ajax({
                url: url
                , type: 'DELETE'
                , success: function(response) {
                    if (response.success) {
                        window.location.href = "{{route('admin.event.index')}}"; 
                    } else {
                        alert(response.message);
                    }
                }
            });
        });
        var fid;
        $(document).on('click', '.delete_floor_plans_btn', function() {
            fid = $(this).attr('data-id');
            var url = "{{ route('admin.event.floor-plans.destroy', ':id') }}";
            url = url.replace(':id', fid);
            $.ajax({
                url: url,
                type: 'DELETE',
                data: {
                    _token: "{{ csrf_token() }}"
                }
                , success: function(response) {
                    if (response.success) {
                        alert(response.message);
                        location.reload();
                    } else {
                        alert(response.message);
                    }
                }
            });
        });
        $(document).on('click', '.delete_itinerary_btn', function() {
            var id = $(this).attr('data-id');
            var url = "{{ route('admin.event.itinerary.destroy', ':id') }}";
            url = url.replace(':id', id);
            $.ajax({
                url: url,
                type: 'DELETE',
                data: {
                    _token: "{{ csrf_token() }}"
                }
                , success: function(response) {
                    if (response.success) {
                        alert(response.message);
                        location.reload();
                    } else {
                        alert(response.message);
                    }
                }
            });
        });
    });
    $(document).ready(function() {
        $('#event_facility_list_delete').click(function() {
            var facilityIds = [];
            var event_id = $(this).attr('event_id');
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
                    data: {event_id: event_id, ids: facilityIds,_token:"{{ csrf_token() }}"},
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
        $('#event_facility_add_form').submit(function(e) {
            e.preventDefault();
            if(!$(this).find('input.error').length){
                var formData = $('#event_facility_add_form').serialize();

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
        $('#frm_edit_event_ship_address').submit(function(e) {
            e.preventDefault();
            var formData = $('#frm_edit_event_ship_address').serialize();
            $.ajax({
                url: "{{route('admin.update.shipaddress')}}",
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
                    console.error(error);
                }
            });
        });


    });
    $(document).ready(function () {
        $('.edit_facility_pricing').on('click', function() {
            var eventFacilityId = $(this).data('id');
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
        $('.new_add_room').on('click', function() {
            var eventId = $(this).data('id');
            console.log(eventId);
            var url = "{{ route('admin.get.eventdate', ':id') }}";
            url = url.replace(':id', eventId);
            $.ajax({
                url: url
                , type: 'GET'
                , success: function(data) {
                    var startDateTime = data.eventDate.start_date_time;
                    var endDateTime = data.eventDate.end_date_time;
                    if (endDateTime == null) {
                        var startDate = startDateTime.split(' ')[0];
                        var startTime = startDateTime.split(' ')[1].slice(0, 5); 
                        $('#event_facility_add_form input[name="date_from"]').val(startDate);
                        $('#event_facility_add_form select[name="hour_from"]').val(startTime.split(':')[0]);
                        $('#event_facility_add_form select[name="min_from"]').val(startTime.split(':')[1]);
                        $('#event_facility_add_form input[name="date_to"]').val(startDate);
                        $('#event_facility_add_form select[name="hour_to"]').val(startTime.split(':')[0]);
                        $('#event_facility_add_form select[name="min_to"]').val(startTime.split(':')[1]);
                    } else {
                        var startDate = startDateTime.split(' ')[0];
                        var startTime = startDateTime.split(' ')[1].slice(0, 5); 
                        var endDate = endDateTime.split(' ')[0];
                        var endTime = endDateTime.split(' ')[1].slice(0, 5);
                        $('#event_facility_add_form input[name="date_from"]').val(startDate);
                        $('#event_facility_add_form select[name="hour_from"]').val(startTime.split(':')[0]);
                        $('#event_facility_add_form select[name="min_from"]').val(startTime.split(':')[1]);
                        $('#event_facility_add_form input[name="date_to"]').val(endDate);
                        $('#event_facility_add_form select[name="hour_to"]').val(endTime.split(':')[0]);
                        $('#event_facility_add_form select[name="min_to"]').val(endTime.split(':')[1]);
                    }


                }
                , error: function(error) {
                    console.error('Ajax request failed:', error);
                }
            });
        });
    });

</script>
@endsection
