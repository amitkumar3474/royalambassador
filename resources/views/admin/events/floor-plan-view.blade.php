@extends('admin.layouts.master')
@section('title', 'Event ' . $floorPlan->event->id . ' - ' . $floorPlan->floorPlanRoom->room_name . ' - Floor Plan')
@section('content')
<span id="fplan_top" class="xmlb_form">
    <div class="title_bar card">
        <div class="row">
            <div class="col-6" style="border-right: 1px solid #999;">
                <div>
                    <h1>{{$floorPlan->floorPlanRoom->room_name}}</h1>
                    <h2> (
                        Event: <a href="{{route('admin.event.show',$floorPlan->event->id)}}">{{$floorPlan->event->id}}</a>
                        , Customer: <a href="{{route('admin.customer.show',$floorPlan->event->customer->id)}}" target="_blank">{{$floorPlan->event->customer->customer_name}}</a>
                        )</h2>
                    <br>
                    <p><label>Status:</label> {{($floorPlan->fplan_status == 2)? 'Sent to Customer':''}} ** Login Account not Created ** <a href="#">Click to Create</a></p>
                    <div class="line_break"></div>
                    <p><strong>Last Updated:</strong> {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $floorPlan->event->created_at)->format('D, M j Y \a\t g:ia') }} by System User (Programmer)</p>
                    <div class="line_break"></div>
                    <table class="product-list table">
                        <tbody>
                            <tr>
                                <th colspan="5">
                                    <h2>Guests Comparison</h2>
                                </th>
                            </tr>
                            <tr>
                                <th></th>
                                <th>Adults</th>
                                <th>Children</th>
                                <th>Babies</th>
                                <th>Vendors</th>
                            </tr>
                            <tr>
                                <td><strong>Event</strong></td>
                                <td>{{$floorPlan->event->adults}}</td>
                                <td>{{$floorPlan->event->kids}}</td>
                                <td>{{$floorPlan->event->babies}}</td>
                                <td>0</td>
                            </tr>
                            <tr>
                                <td><strong>Floor Plan</strong></td>
                                <td class="warning">0</td>
                                <td class="">0</td>
                                <td class="">0</td>
                                <td class="">0</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-6">
                <div>

                    <p class="save_buttons_wrap">
                        <span class="button font-bold radius-0 btn_save_fplan">Save Changes</span>
                        <span class="button font-bold radius-0 btn_finalize_adjust_qtys">Finalize &amp; Adjust Event Qtys</span>
                        <span class="fplan_lock open q_tip" title="Not Locked, Saving Allowed"> <svg style="width: 20px;" class="svg-inline--fa fa-lock-open" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="lock-open" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg="">
                                <path fill="currentColor" d="M352 144c0-44.2 35.8-80 80-80s80 35.8 80 80v48c0 17.7 14.3 32 32 32s32-14.3 32-32V144C576 64.5 511.5 0 432 0S288 64.5 288 144v48H64c-35.3 0-64 28.7-64 64V448c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V256c0-35.3-28.7-64-64-64H352V144z"></path>
                            </svg><!-- <i class="fas fa-lock-open"></i> Font Awesome fontawesome.com --></span></p>
                    <div class="line_break"></div>
                    <p>
                        PDF Download:
                        <span class="btn_print_layout button font-bold radius-0">Layout</span> -:-
                        <span class="btn_print_tables button font-bold radius-0">Tables</span>
                        <a href="#" onclick="loadAjaxObject('obj=page&amp;page_id=cu_floor_plan_help') ; return false;"> Get Help</a>
                    </p>

                    <strong>Submission History</strong>
                    <span class="q_tip"><svg style="width: 20px;" class="svg-inline--fa fa-circle-info" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="circle-info" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                            <path fill="currentColor" d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z"></path>
                        </svg><!-- <i class="fas fa-info-circle"></i> Font Awesome fontawesome.com --></span>

                    <div class="line_break"></div>

                </div>
            </div>
        </div>
    </div>
</span>

@endsection
