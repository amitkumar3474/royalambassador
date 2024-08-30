@extends('admin.layouts.master')
@section('title', 'Events Archive')
@section('content')
@section('style')
<style>
    .event_status {
        padding: 4px;
        border: 1px solid #999;
        border-radius: 6px;
        display: inline-block;
        width: 70px;
        text-align: center;
    }
    .event_archived {
        background: #EE1E74;
        color: #FFF;
    }
    .event_cancelled {
        background: #DB7D7D;
    }
</style>
@endsection
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
        <li class="ui-state-default ui-corner-top ui-tabs-active ui-state-active" role="tab">
            <a href="{{route('admin.event.archive-event')}}" class="ui-tabs-anchor" role="presentation" tabindex="-3" id="ui-id-3">Archive</a>
        </li>
        <li class="ui-state-default ui-corner-top" role="tab">
            <a href="{{route('admin.event.floor-plans')}}" class="ui-tabs-anchor" role="presentation" tabindex="-4" id="ui-id-4">Floor Plans</a>
        </li>
    </ul>
    <div class="ui-tabs-panel ui-widget-content ui-corner-bottom" id="event_tabs-3" aria-labelledby="ui-id-3" role="tabpanel" aria-expanded="true" aria-hidden="false">
        <div>
            <form action="{{route('admin.event.archive-event')}}" id="searchForm" method="get">
                <fieldset class="form_filters">
                    <legend>Search</legend>
                    <div class="filter_controls">
                        <label class="ml-5">Event Id:</label>
                        <input name="events_archive_id" id="events_archive_UID" value="{{request('events_archive_id')}}" type="text" value="" maxlength="12" size="4" title="Primary Key">
                        <label class="ml-5">Customer:</label>
                        <input name="events_archive_customer_name" value="{{request('events_archive_customer_name')}}" id="events_archive_CUSTOMER_NAME" type="text" value="" maxlength="90" size="25" title="Name of this customer. If this is a corporate customer, then this is the business name. If personal it is the concat of first name and last name or say The Smiths Family.">
                        <label class="ml-5">Sales Persons:</label>
                        <select name="events_archive_sales_person" id="event_list_LNK_SALES_PERSON">
                            <option value="" {{ request('events_archive_sales_person') == '' ? 'selected' : '' }}>--All--</option>
                            <option value="71" {{ request('events_archive_sales_person') == '71' ? 'selected' : '' }}>Aliyana Bland</option>
                            <option value="77" {{ request('events_archive_sales_person') == '77' ? 'selected' : '' }}>Ania Howlett</option>
                            <option value="78" {{ request('events_archive_sales_person') == '78' ? 'selected' : '' }}>Anil india</option>
                            <option value="29" {{ request('events_archive_sales_person') == '29' ? 'selected' : '' }}>Diana Bonilla</option>
                            <option value="2" {{ request('events_archive_sales_person') == '2' ? 'selected' : '' }}>John Giancola</option>
                            <option value="47" {{ request('events_archive_sales_person') == '47' ? 'selected' : '' }}>Nicolas Giancola</option>
                            <option value="76" {{ request('events_archive_sales_person') == '76' ? 'selected' : '' }}>Patrick Narvaez</option>
                            <option value="4" {{ request('events_archive_sales_person') == '4' ? 'selected' : '' }}>Stella Stalteri</option>
                            <option value="72" {{ request('events_archive_sales_person') == '72' ? 'selected' : '' }}>Vishi Sandhu</option>
                            <option value="1" {{ request('events_archive_sales_person') == '1' ? 'selected' : '' }}>Web Sales</option>
                        </select>
                        <label class="ml-5">Event Type:</label>
                        <select name="events_archive_event_type[]" id="event_list_LNK_EVENT_TYPE" multiple="multiple" >
                            <option value="1" {{ in_array('1', request('events_archive_event_type', [])) ? 'selected' : '' }}>Baptism</option>
                            <option value="2" {{ in_array('2', request('events_archive_event_type', [])) ? 'selected' : '' }}>Wedding Ceremony</option>
                            <option value="3" {{ in_array('3', request('events_archive_event_type', [])) ? 'selected' : '' }}>Wedding Reception</option>
                            <option value="4" {{ in_array('4', request('events_archive_event_type', [])) ? 'selected' : '' }}>Anniversary</option>
                            <option value="5" {{ in_array('5', request('events_archive_event_type', [])) ? 'selected' : '' }}>Club Function</option>
                            <option value="6" {{ in_array('6', request('events_archive_event_type', [])) ? 'selected' : '' }}>Communion</option>
                            <option value="7" {{ in_array('7', request('events_archive_event_type', [])) ? 'selected' : '' }}>Fundraiser</option>
                            <option value="8" {{ in_array('8', request('events_archive_event_type', [])) ? 'selected' : '' }}>Dinner</option>
                            <option value="9" {{ in_array('9', request('events_archive_event_type', [])) ? 'selected' : '' }}>School Prom</option>
                            <option value="10" {{ in_array('10', request('events_archive_event_type', [])) ? 'selected' : '' }}>Meeting</option>
                            <option value="11" {{ in_array('11', request('events_archive_event_type', [])) ? 'selected' : '' }}>Luncheon</option>
                            <option value="12" {{ in_array('12', request('events_archive_event_type', [])) ? 'selected' : '' }}>Convention</option>
                            <option value="13" {{ in_array('13', request('events_archive_event_type', [])) ? 'selected' : '' }}>Memorial</option>
                            <option value="14" {{ in_array('14', request('events_archive_event_type', [])) ? 'selected' : '' }}>Birthday Party</option>
                            <option value="15" {{ in_array('15', request('events_archive_event_type', [])) ? 'selected' : '' }}>Bridal Shower</option>
                            <option value="16"{{ in_array('16', request('events_archive_event_type', [])) ? 'selected' : '' }}>Engagement</option>
                            <option value="17"{{ in_array('17', request('events_archive_event_type', [])) ? 'selected' : '' }}>Rehearsal Dinner</option>
                            <option value="18"{{ in_array('18', request('events_archive_event_type', [])) ? 'selected' : '' }}>Christmas Party</option>
                            <option value="19"{{ in_array('19', request('events_archive_event_type', [])) ? 'selected' : '' }}>Fashion Show</option>
                            <option value="20"{{ in_array('20', request('events_archive_event_type', [])) ? 'selected' : '' }}>Trade Show</option>
                            <option value="21"{{ in_array('21', request('events_archive_event_type', [])) ? 'selected' : '' }}>Semi Formal</option>
                            <option value="22"{{ in_array('22', request('events_archive_event_type', [])) ? 'selected' : '' }}>Rehearsal</option>
                            <option value="23"{{ in_array('23', request('events_archive_event_type', [])) ? 'selected' : '' }}>Catering</option>
                            <option value="24"{{ in_array('24', request('events_archive_event_type', [])) ? 'selected' : '' }}>Wedding Cer./Reception</option>
                            <option value="25"{{ in_array('25', request('events_archive_event_type', [])) ? 'selected' : '' }}>Baby Shower</option>
                            <option value="26"{{ in_array('26', request('events_archive_event_type', [])) ? 'selected' : '' }}>Graduation Ceremony</option>
                            <option value="27"{{ in_array('27', request('events_archive_event_type', [])) ? 'selected' : '' }}>Retirement Party</option>
                            <option value="28"{{ in_array('28', request('events_archive_event_type', [])) ? 'selected' : '' }}>Jack &amp; Jill</option>
                            <option value="29" {{ in_array('29', request('events_archive_event_type', [])) ? 'selected' : '' }}>Special Event</option>
                            <option value="30" {{ in_array('30', request('events_archive_event_type', [])) ? 'selected' : '' }}>Funeral</option>
                            <option value="31" {{ in_array('31', request('events_archive_event_type', [])) ? 'selected' : '' }}>Graduation</option>
                            <option value="32" {{ in_array('32', request('events_archive_event_type', [])) ? 'selected' : '' }}>Corporate</option>
                            <option value="33" {{ in_array('33', request('events_archive_event_type', [])) ? 'selected' : '' }}>Gala</option>
                            <option value="34" {{ in_array('34', request('events_archive_event_type', [])) ? 'selected' : '' }}>Customer Appreciation</option>
                            <option value="35" {{ in_array('35', request('events_archive_event_type', [])) ? 'selected' : '' }}>Bachelor Party</option>
                            <option value="36" {{ in_array('36', request('events_archive_event_type', [])) ? 'selected' : '' }}>Proposal</option>
                        </select>                        
                        <label class="ml-5">Status:</label>
                        <select name="events_archive_status" id="event_list_EVENT_STATUS">
                            <option value="" selected="selected">-- All --</option>
                            <option value="1" {{ request('events_archive_status') == '1' ? 'selected' : '' }}>Tentative</option>
                            <option value="5" {{ request('events_archive_status') == '5' ? 'selected' : '' }}>Promised</option>
                            <option value="2" {{ request('events_archive_status') == '2' ? 'selected' : '' }}>Booked</option>
                            <option value="3" {{ request('events_archive_status') == '3' ? 'selected' : '' }}>Cancelled</option>
                            <option value="4" {{ request('events_archive_status') == '4' ? 'selected' : '' }}>Archived</option>
                        </select>
                        <label class="ml-5">From:</label>
                        <input name="event_archive_start_date" value="{{request('event_archive_start_date',date('Y-m-d'))}}" id="event_list_ed_more" size="12" maxlength="10" title="Event start date and time"  type="date" class="hasDatepicker">
                        <label class="ml-5">To:</label>
                        <input name="event_archive_end_date" value="{{request('event_archive_end_date')}}" id="event_list_ed_less" size="12" maxlength="10" title="Event start date and time" type="date" class="hasDatepicker">
                    </div>
                    <div class="filter_buttons" style="float: right">
                        <button type="submit" class="button font-bold radius-0" >Search</button>
                        <button type="button" class="button font-bold radius-0 event_list_clear_filter">Show All</button>
                    </div>
                </fieldset>
            </form>
        </div>
        <div class="line_break"></div>
        <p align="right">Records: 1 to {{ count($events) }} of {{ count($events) }}|Show: 
            <select name="show_records" id="show_records" >
                <option value="all">All</option>
                <option value="10">10</option>
                <option value="30" selected="">{{ count($events) }}</option>
                <option value="50">50</option>
                <option value="100">100</option>
            </select>
        </p>
        <div class="cus-row ">
            <div class="col-12 main-order-item">
                <div class="global-form main-form">
                    <table class="product-list table ">
                        <tr>
                            <th></th>
                            <th>
                                <a href="#">Event Id</a> 
                            </th>
                            <th>
                                <a href="#">Customer</a> 
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
                            <th>
                                Facilities
                            </th>
                            <th>
                                <a href="#">Adults</a> 
                            </th>
                            <th>
                                <a href="#">Sub-total</a> 
                            </th>
                            <th>
                                <a href="#">Status</a> 
                            </th>
                        </tr>
                        @if ($events->isNotEmpty())
                            @foreach ($events as $_event)
                            <tr class="supplier-row">
                                <td><span class="checkbox_container"><input type="checkbox" name="event_ids[]" value="{{ $_event->id }}"></span></td>
                                <td><a href="{{route('admin.event.show',$_event->id)}}" >{{$_event->id}}</a></td>
                                <td><a href="{{route('admin.customer.show',$_event->customer->id)}}">{{$_event->contact->full_name}}</a></td>
                                <td>{{$_event->lnk_sales_person}}</td>
                                <td>{{$_event->eventType->type_name}}</td>
                                <td><a href="{{route('admin.event.show',$_event->id)}}" >{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $_event->start_date_time)->format('D, M j - Y h:iA') }}</a></td>
                                <td>
                                    @foreach ($_event->eventFacilities as $_eventFaci)
                                        @if (!empty($_eventFaci->facility))
                                            {{$_eventFaci->facility->facility_name}} |
                                        @endif
                                    @endforeach
                                </td>
                                <td>{{$_event->adults}}</td>
                                <td>{{$_event->sub_total}}</td>
                                <td>@if ($_event->event_status == 1) {{'Tentative'}}@elseif($_event->event_status == 2) {{'Booked'}}@elseif($_event->event_status == 4) <span class="event_archived event_status">{{'Archived'}}</span> @elseif($_event->event_status == 5) {{'Promised'}}@elseif($_event->event_status == 3) <span class="event_cancelled event_status">{{'Cancelled'}}</span> @endif</td>
                            </tr>
                            @endforeach
                            <tr class="page_total">
                                <td colspan="7"><b>Page Total:</b></td>
                                <td class="lalign"></td>
                                <td class="lalign">{{ count($events) }}</td>
                            </tr>
                            <tr></tr>
                            <tr class="page_total">
                                <td colspan="7"><b>Total:</b></td>
                                <td class="lalign"></td>
                                <td class="lalign">{{ count($events) }}</td>
                            </tr>
                        @else
                        <tr class="supplier-row">
                        </tr>
                        @endif
                    </table>
                </div>
                <div class="line_break"></div>
                <div class="filter_buttons">
                    <button type="button"   class="select_all">Select All</button>
                    <button type="button" class="de_select">Deselect</button>
                </div>
                <div class="line_break"></div>
                <div class="filter_buttons">
                    <button type="button" id="event_list_delete" class="button font-bold radius-0">Delete</button>
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
            window.location.href = "{{ route('admin.event.archive-event') }}";
        });
        // $('#searchForm input, #searchForm select').on('change', function() {
        //     $('#searchForm').submit();
        // });
        $('.select_all').click(function() {
            $('.checkbox_container input[type="checkbox"]').prop('checked', true);
        });

        // Deselect button functionality
        $('.de_select').click(function() {
            $('.checkbox_container input[type="checkbox"]').prop('checked', false);
        });

    });

</script>
@endsection
