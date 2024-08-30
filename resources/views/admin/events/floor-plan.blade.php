@extends('admin.layouts.master')
@section('title', 'All Floor Plans')
@section('content')
<div class="card title_bar">
    <h1>All Events</h1>
</div>
<div class="line_break"></div>
<div id="event_tabs" class="tab_content ui-tabs ui-widget ui-widget-content ui-corner-all">
    <ul class="ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all" role="tablist">
        <li class="ui-state-default ui-corner-top" role="tab">
            <a href="{{route('admin.event.index')}}" class="ui-tabs-anchor" role="presentation" tabindex="-1" id="ui-id-1">Current</a>
        </li>
        <li class="ui-state-default ui-corner-top " role="tab">
            <a href="{{route('admin.event.tentative-event')}}" class="ui-tabs-anchor" role="presentation" tabindex="-2" id="ui-id-2">Tentative</a>
        </li>
        <li class="ui-state-default ui-corner-top " role="tab">
            <a href="{{route('admin.event.archive-event')}}" class="ui-tabs-anchor" role="presentation" tabindex="-3" id="ui-id-3">Archive</a>
        </li>
        <li class="ui-state-default ui-corner-top ui-tabs-active ui-state-active" role="tab">
            <a href="{{route('admin.event.floor-plans')}}" class="ui-tabs-anchor" role="presentation" tabindex="-4" id="ui-id-4">Floor Plans</a>
        </li>
    </ul>
    <div class="ui-tabs-panel ui-widget-content ui-corner-bottom" id="event_tabs-3" aria-labelledby="ui-id-3" role="tabpanel" aria-expanded="true" aria-hidden="false">
        <div>
            <form action="{{route('admin.event.floor-plans')}}" id="searchForm" method="get">
                <fieldset class="form_filters">
                    <legend>Search by</legend>
                    <div class="filter_controls">
                        <label class="ml-5">Event Id:</label>
                        <input name="floor_plans_id" id="floor_plans_UID" value="{{request('floor_plans_id')}}" type="text" value="" maxlength="12" size="4" title="Primary Key">
                        <label class="ml-5">From:</label>
                        <input name="floor_plans_start_date" value="{{request('floor_plans_start_date')}}" id="floor_plans_ed_more" size="12" maxlength="10" title="Event start date and time"  type="date" class="hasDatepicker">
                        <label class="ml-5">Customer Name:</label>
                        <input name="floor_plans_customer_name" value="{{request('floor_plans_customer_name')}}" id="floor_plans_CUSTOMER_NAME" type="text" value="" maxlength="90" size="25" title="Name of this customer. If this is a corporate customer, then this is the business name. If personal it is the concat of first name and last name or say The Smiths Family.">
                        <label class="ml-5">Room:</label>
                        <select name="floor_plans_lnk_fplan_room" id="floor_plans_LNK_FPLAN_ROOM">
                            <option value="" {{ request('floor_plans_lnk_fplan_room') == '' ? 'selected' : '' }} selected="yes">-- All --</option>
                            <option value="1" {{ request('floor_plans_lnk_fplan_room') == '1' ? 'selected' : '' }}>Conservatory</option>
                            <option value="2" {{ request('floor_plans_lnk_fplan_room') == '2' ? 'selected' : '' }}>Consulate</option>
                            <option value="7" {{ request('floor_plans_lnk_fplan_room') == '7' ? 'selected' : '' }}>Embassy</option>
                            <option value="8" {{ request('floor_plans_lnk_fplan_room') == '8' ? 'selected' : '' }}>Embassy East</option>
                            <option value="9" {{ request('floor_plans_lnk_fplan_room') == '9' ? 'selected' : '' }}>Embassy West</option>
                            <option value="10" {{ request('floor_plans_lnk_fplan_room') == '10' ? 'selected' : '' }}>Greenhouse</option>
                            <option value="6" {{ request('floor_plans_lnk_fplan_room') == '6' ? 'selected' : '' }}>Library</option>
                        </select>
                        <label class="ml-5">Event Status:</label>
                        <select name="floor_plans_event_status" id="floor_plans_EVENT_STATUS">
                            <option value="" {{ request('floor_plans_event_status') == '' ? 'selected' : '' }} selected="selected">-- All --</option>
                            <option value="1" {{ request('floor_plans_event_status') == '1' ? 'selected' : '' }}>Tentative</option>
                            <option value="5" {{ request('floor_plans_event_status') == '5' ? 'selected' : '' }}>Promised</option>
                            <option value="2" {{ request('floor_plans_event_status') == '2' ? 'selected' : '' }}>Booked</option>
                            <option value="3" {{ request('floor_plans_event_status') == '3' ? 'selected' : '' }}>Cancelled</option>
                            <option value="4" {{ request('floor_plans_event_status') == '4' ? 'selected' : '' }}>Archived</option>
                        </select>
                        <label class="ml-5">Status:</label>
                        <select name="floor_plans_fplan_status" id="floor_plans_FPLAN_STATUS">
                            <option value="" {{ request('floor_plans_fplan_status') == '' ? 'selected' : '' }} selected="selected">-- All --</option>
                            <option value="1" {{ request('floor_plans_fplan_status') == '1' ? 'selected' : '' }}>Preparation</option>
                            <option value="2" {{ request('floor_plans_fplan_status') == '2' ? 'selected' : '' }}>Sent to Customer</option>
                            <option value="3" {{ request('floor_plans_fplan_status') == '3' ? 'selected' : '' }}>Completed by Customer</option>
                            <option value="4" {{ request('floor_plans_fplan_status') == '4' ? 'selected' : '' }}>Claimed back from Customer</option>
                            <option value="5" {{ request('floor_plans_fplan_status') == '5' ? 'selected' : '' }}>Locked by System</option>
                        </select>
                    </div>
                    <div class="filter_buttons" style="float: right">
                        <button type="submit" class="button font-bold radius-0" >Search</button>
                        <button type="button" class="button font-bold radius-0 event_list_clear_filter">Show All</button>
                    </div>
                </fieldset>
            </form>
        </div>
        <div class="line_break"></div>
        <p align="right">Records: 1 to {{count($floorplans)}} of {{count($floorplans)}}|Show: 
            <select name="show_records" id="show_records" >
                <option value="all">All</option>
                <option value="10">10</option>
                <option value="30" selected="">{{count($floorplans)}}</option>
                <option value="50">50</option>
                <option value="100">100</option>
            </select>
        </p>
        <div class="cus-row ">
            <div class="col-12 main-order-item">
                <div class="global-form main-form">
                    <table class="product-list table ">
                        <tr>
                                <th>
                                <a href="#">Title</a> 
                            </th>
                            <th>
                                <a href="#">Status</a> 
                            </th>
                            <th>
                                <a href="#">Event</a> 
                            </th>
                            <th>
                                <a href="#">Event Date</a>
                            </th>
                            <th>
                                <a href="#">Customer Name</a> 
                            </th>
                            <th>
                                <a href="#">Room</a> 
                            </th>
                        </tr>
                        @if ($floorplans->isNotEmpty())
                            @foreach ($floorplans as $_floorplan)
                            <tr class="supplier-row">
                                <td><a href="{{route('admin.event.floor-plans.show',$_floorplan->id)}}">{{$_floorplan->floorPlanRoom->room_name}}</a></td>
                                <td>{{($_floorplan->fplan_status == 2)? 'Sent to Customer':''}}</td>
                                <td><a href="{{route('admin.event.show',$_floorplan->event->id)}}" >{{$_floorplan->event->id}}</a>({{$_floorplan->event->eventType->type_name}})</td>
                                <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $_floorplan->event->start_date_time)->format('M j- Y') }}</td>
                                <td><a href="{{route('admin.customer.show',$_floorplan->event->customer->id)}}">{{$_floorplan->event->customer->customer_name}}</a></td>
                                <td>{{$_floorplan->floorPlanRoom->room_name}}</td>
                            </tr>
                            @endforeach
                        @else
                        <tr class="supplier-row">
                        </tr>
                        @endif
                    </table>
                </div>
            </div>
            <div class="line_break"></div>
            <div class="pagination">
                <ul>
                    <li class="current-page">
                        <span>1</span>
                    </li>
                    <li>
                        <span>2</span>
                    </li>
                    <li>
                        <span>3</span>
                    </li>
                    <li>
                        <span>4</span>
                    </li>
                    <li>
                        <span>5</span>
                    </li>
                    <li>
                        <span>6</span>
                    </li>
                    <li>
                        <span>7</span>
                    </li>
                    <li>
                        <span>8</span>
                    </li>
                    <li>
                        <span>9</span>
                    </li>
                    <li>
                        <span>10</span>
                    </li>
                    <li>
                        <span>11</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    
</div>
@endsection
@section('scripts')
<script>
    $(document).ready(function() {
        $('.ui-state-default a').click(function() {
            // e.preventDefault();
            $('.ui-state-default').removeClass('ui-tabs-active ui-state-active');
            $(this).closest('li').addClass('ui-tabs-active ui-state-active')
            $('.ui-tabs-panel').css('display', 'none');
            var text = $(this).attr('tabindex');
            console.log(text);
            if (text == -1) {
                $('#event_tabs-1').show();
            } else if (text == -2) {
                $('#event_tabs-2').show();
            } else if (text == -3) {
                $('#event_tabs-3').show();
            } else if (text == -4) {
                $('#event_tabs-4').show();
            }
        });
        $('.event_list_clear_filter').on('click', function() {
            window.location.href = "{{ route('admin.event.floor-plans') }}";
        });
        // $('#searchForm input, #searchForm select').on('change', function() {
        //     $('#searchForm').submit();
        // });

    });

</script>
@endsection
