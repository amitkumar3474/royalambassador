@extends('admin.layouts.master')
@section('title', 'Tentative Events')
@section('content')
<div class="card title_bar">
    <h1>All Events</h1>
</div>
<div class="line_break"></div>
<div id="event_tabs" class="tab_content ui-tabs ui-widget ui-widget-content ui-corner-all">
    <ul class="ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all" role="tablist">
        <li class="ui-state-default ui-corner-top " role="tab">
            <a href="{{route('admin.event.index')}}" class="ui-tabs-anchor" role="presentation" tabindex="-1" id="ui-id-1">Current</a>
        </li>
        <li class="ui-state-default ui-corner-top ui-tabs-active ui-state-active" role="tab">
            <a href="{{route('admin.event.tentative-event')}}" class="ui-tabs-anchor" role="presentation" tabindex="-2" id="ui-id-2">Tentative</a>
        </li>
        <li class="ui-state-default ui-corner-top" role="tab">
            <a href="{{route('admin.event.archive-event')}}" class="ui-tabs-anchor" role="presentation" tabindex="-3" id="ui-id-3">Archive</a>
        </li>
        <li class="ui-state-default ui-corner-top" role="tab">
            <a href="{{route('admin.event.floor-plans')}}" class="ui-tabs-anchor" role="presentation" tabindex="-4" id="ui-id-4">Floor Plans</a>
        </li>
    </ul>
    <div class="ui-tabs-panel ui-widget-content ui-corner-bottom" id="event_tabs-2" aria-labelledby="ui-id-2" role="tabpanel" aria-expanded="true" aria-hidden="false">
        <div class="cus-row ">
            <div class="col-12 main-order-item">
                <h1>Tentative/Promised Events
                    <a href="#" target="_blank"><button class="button font-bold radius-0">print</button></a>
                </h1>
                <div>
                    <form action="{{route('admin.event.tentative-event')}}" id="searchForm" method="get">
                        <fieldset class="form_filters">
                            <legend>Search</legend>
                            <div class="filter_controls">
                                <label class="ml-5">Sales Persons:</label>
                                <select name="event_sales_person" id="event_list_LNK_SALES_PERSON">
                                    <option value="" {{ request('event_sales_person') == '' ? 'selected' : '' }}>--All--</option>
                                    <option value="71" {{ request('event_sales_person') == '71' ? 'selected' : '' }}>Aliyana Bland</option>
                                    <option value="77" {{ request('event_sales_person') == '77' ? 'selected' : '' }}>Ania Howlett</option>
                                    <option value="78" {{ request('event_sales_person') == '78' ? 'selected' : '' }}>Anil india</option>
                                    <option value="29" {{ request('event_sales_person') == '29' ? 'selected' : '' }}>Diana Bonilla</option>
                                    <option value="2" {{ request('event_sales_person') == '2' ? 'selected' : '' }}>John Giancola</option>
                                    <option value="47" {{ request('event_sales_person') == '47' ? 'selected' : '' }}>Nicolas Giancola</option>
                                    <option value="76" {{ request('event_sales_person') == '76' ? 'selected' : '' }}>Patrick Narvaez</option>
                                    <option value="4" {{ request('event_sales_person') == '4' ? 'selected' : '' }}>Stella Stalteri</option>
                                    <option value="72" {{ request('event_sales_person') == '72' ? 'selected' : '' }}>Vishi Sandhu</option>
                                    <option value="1" {{ request('event_sales_person') == '1' ? 'selected' : '' }}>Web Sales</option>
                                </select>
                                <label>Customer:</label>
                                <input name="event_customer_name" id="event_list_CUSTOMER_NAME" type="text" value="{{request('event_customer_name')}}" maxlength="90" size="25" title="Name of this customer. If this is a corporate customer, then this is the business name. If personal it is the concat of first name and last name or say The Smiths Family.">
                                <label class="ml-5">Status:</label>
                                <select name="event_status" id="event_list_EVENT_STATUS">
                                    <option value="1" {{ request('event_status') == '1' ? 'selected' : '' }} selected="selected">Tentative</option>
                                    <option value="5" {{ request('event_status') == '5' ? 'selected' : '' }}>Promised</option>
                                </select>
                            </div>
                            <div class="filter_buttons" style="float: right">
                                <button type="submit" class="button font-bold radius-0" >Search</button>
                                <button type="button" class="button font-bold radius-0 event_list_clear_filter">Show All</button>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
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
                            <th>
                                <a href="#">Event Id</a> 
                            </th>
                            <th>
                                Days to Event
                            </th>
                            <th>
                                <a href="#">Contact</a> 
                            </th>
                            <th>
                                <a href="#">Phone</a> 
                            </th>
                            <th>
                                <a href="#">Main Email</a>
                            </th>
                            <th>
                                <a href="#">Event Type</a> 
                            </th>
                            <th>
                                <a href="#">Initial Contact</a> 
                            </th>
                            <th>
                                <a href="#">Event Date</a> 
                            </th>
                            <th>
                                <a href="#">Adults</a> 
                            </th>
                            <th>
                                <a href="#">Total</a> 
                            </th>
                            <th>
                                <a href="#">Sales Persons</a> 
                            </th>
                        </tr>
                        @if ($events->isNotEmpty())
                            @foreach ($events as $_event)
                            <tr class="supplier-row">
                                <td><a href="{{route('admin.event.show',$_event->id)}}" >{{$_event->id}}</a></td>
                                @php
                                    $contact_start_date = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $_event->contact->created_at);
                                    $event_end_date = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $_event->start_date_time);

                                    $differenceInDays = $event_end_date->diffInDays($contact_start_date)+1;
                                @endphp
                                <td> {{$differenceInDays}}</td>
                                <td><a href="{{route('admin.customer.show',$_event->customer->id)}}">{{$_event->contact->full_name}}</a></td>
                                <td>Cell: {{$_event->contact->cell_phone}}</td>
                                <td>Email: {{$_event->contact->main_email}}</td>
                                <td>{{$_event->eventType->type_name}}</td>
                                <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $_event->contact->created_at)->format('M j - Y') }}</td>
                                <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $_event->start_date_time)->format('M j - Y') }}</td>
                                <td>{{$_event->adults}}</td>
                                <td>${{number_format($_event->sub_total,2)}}</td>
                                <td>{{$_event->lnk_sales_person}}</td>
                            </tr>
                            @endforeach
                        @else
                        <tr class="supplier-row">
                        </tr>
                        @endif
                    </table>
                </div>
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
            window.location.href = "{{ route('admin.event.tentative-event') }}";
        });
        // $('#searchForm input, #searchForm select').on('change', function() {
        //     $('#searchForm').submit();
        // });

    });

</script>
@endsection
