@extends('admin.layouts.master')
@section('title', 'Booked Events')
@section('style')
<style>
.product-list {
    width: 100%;
}
table.product-list tr.total {
    font-weight: bold;
    background: #F2E8C6;
}
.catering_row {
    display: grid;
    grid-template-columns: 1fr 1fr 2fr 6fr 1fr;
    grid-gap: 3px;
}
.form_filters {
    position: relative;
}
td.total {
    font-weight: bold;
}
.form_filters .show_recs {
    position: absolute;
    top: -2em;
    right: 20px;
    background: #fff;
    padding: 0 .8em;
}
.event_type_catering {
    background: #11C3FF;
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
    color: #0782C1;
    margin-left: 3px;
    text-align: center;
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
    text-align: center;

}

.pagination span span[aria-disabled="true"] {
    display: none;
}

/* Style the disabled pagination link */
.pagination .disabled {
    color: #ccc;
    pointer-events: none;
}

.flex.justify-between.flex-1.sm\:hidden a,
.flex.justify-between.flex-1.sm\:hidden span {
    display: none;
}

.relative.inline-flex.items-center.px-2.py-2.text-sm.font-medium.text-gray-500.bg-white.border.border-gray-300.rounded-l-md.leading-5.hover\:text-gray-400.focus\:z-10.focus\:outline-none.focus\:ring.ring-gray-300.focus\:border-blue-300.active\:bg-gray-100.active\:text-gray-500.transition.ease-in-out.duration-150::after {
    content: "<<";
    margin-left: 5px;
    /* Adjust as needed for spacing */
}

.relative.inline-flex.items-center.px-2.py-2.-ml-px.text-sm.font-medium.text-gray-500.bg-white.border.border-gray-300.rounded-r-md.leading-5.hover\:text-gray-400.focus\:z-10.focus\:outline-none.focus\:ring.ring-gray-300.focus\:border-blue-300.active\:bg-gray-100.active\:text-gray-500.transition.ease-in-out.duration-150::after {
    content: ">>";
    margin-left: 5px;
    /* Adjust as needed for spacing */
}
</style>
@endsection
@section('content')
<span id="event_list" class="xmlb_form">
    <form method="get" id="frm_event_list" action="{{ route('admin.reports.report-event-list') }}" accept-charset="utf-8" enctype="multipart/form-data">
        <div class="title_bar card">
            <h1>Booked Events</h1>
            <h1></h1>
        </div>
        <fieldset class="form_filters">
            <legend>Search</legend>
            <label>Sales Persons:</label>
            <select name="lnk_sales_person" id="event_list_LNK_SALES_PERSON" fdprocessedid="hc4p6dj">
                <option value="">--All--</option>
                @foreach($salesPersons as $_salesPerson)
                    <option value="{{$_salesPerson->id}}" {{ request('lnk_sales_person') == $_salesPerson->id ? 'selected' : '' }}>{{ $_salesPerson->first_name }} {{ $_salesPerson->last_name }}</option>
                @endforeach
            </select>
            <label>Event Type:</label>
            <select name="lnk_event_type" id="event_list_LNK_EVENT_TYPE" fdprocessedid="s74ugl">
                <option value="">-- All --</option>
                @foreach($eventTypes as $_eventType)
                    <option value="{{ $_eventType->id }}" {{ request('lnk_event_type') == $_eventType->id ? 'selected' : '' }}>{{ $_eventType->type_name }}</option>
                @endforeach
            </select>
            <label>Facility:</label>
            <select name="lnk_facility" id="event_list_LNK_FACILITY" fdprocessedid="20qkb">
                <option value="" selected="yes">--All--</option>
                @foreach($facilities as $_facility)
                    <option value="{{ $_facility->id }}" {{ request('lnk_facility') == $_facility->id ? 'selected' : '' }}>{{ $_facility->facility_name }}</option>
                @endforeach
            </select>
            <label>From</label> 
            <input name="ed_more" id="event_list_ed_more" value="{{ request('ed_more') }}" size="12" maxlength="10" title="Event start date and time" type="date" class="hasDatepicker" fdprocessedid="eu53g9">
            <label>To</label> 
            <input name="ed_less" id="event_list_ed_less" value="{{ request('ed_less') }}" size="12" maxlength="10" title="Event start date and time" type="date" class="hasDatepicker" fdprocessedid="nm589">
            <button type="submit" id="event_list_apply_filter" class="button font-bold radius-0">Search</button>
            <a href="{{ route('admin.reports.report-event-list') }}">
                <button type="button" id="event_list_clear_filter" class="button font-bold radius-0">Show All</button>
            </a>
            <!-- <input type="submit" value="Search" id="event_list_apply_filter" name="event_list_apply_filter" fdprocessedid="rnwj">
            <input type="submit" value="Show All" id="event_list_clear_filter" name="event_list_clear_filter" fdprocessedid="ecfts"> -->
            <span class="show_recs">
                <span id="records-display"></span> of <span id="total_records">{{ $allRecords }}</span> | Show: 
                <select id="perPageSelect" class="max-100" name="pages">
                    <option value="all">All</option>
                    <option value="10" {{ request('pages') == 10?'selected':''}}>10</option>
                    <option value="20" {{ request('pages') == 20?'selected':''}} @if(request('pages') == null){{'selected'}}@endif>20</option>
                    <option value="30" {{ request('pages') == 30?'selected':''}}>30</option>
                    <option value="50" {{ request('pages') == 50?'selected':''}}>50</option>
                    <option value="100" {{ request('pages') == 100?'selected':''}}>100</option>
                </select>
            </span>
        </fieldset>
        <p style="text-align: left; margin-top: .3em; padding: 0.3em ">
            <button type="button" class="button font-bold radius-0">Export to Excel</button>
            <!-- <input type="submit" value="Export to Excel" id="event_list_edit" name="event_list_edit" class="button" fdprocessedid="ykho6i"> -->
        </p>

        <div class="line_break"></div>
        <table class="bound product-list">
            <thead>
                <tr>
                    <th><a href="#" title="Click to sort by Event Id">Event Id</a></th>
                    <th><a href="#" title="Click to sort by Customer">Customer</a></th>
                    <th><a href="#" title="Click to sort by Phone">Phone</a></th>
                    <th><a href="#" title="Click to sort by Sales Persons">Sales Persons</a></th>
                    <th><a href="#" title="Click to sort by Event Type">Event Type</a></th>
                    <th><a href="#" title="Click to sort by Function Date">Function Date</a></th>
                    <th>Facilities</th>
                    <th><a href="#" title="Click to sort by Adults">Adults</a></th>
                </tr>
            </thead>
            <tbody>
                @foreach($events as $_event)
                    <tr>
                        <td><a href="{{route('admin.event.show', $_event->id)}}">{{ $_event->id }}</a></td>
                        <td><a href="{{ route('admin.customer.show',$_event->lnk_customer) }}">{{ $_event->customer->customer_name }}</a></td>
                        <td>{{ $_event->contact->phone }}</td>
                        <td>
                        @php $first = true; @endphp
                        @foreach($_event->salesPersons() as $_key => $_salesPerson)
                            @if (!$first)
                                -
                            @else
                                @php $first = false; @endphp
                            @endif
                            {{ $_salesPerson->first_name }} {{ $_salesPerson->last_name }} 
                        @endforeach
                        <br>{{$_event->contact->cell_phone?'Cell:'.$_event->contact->cell_phone:'' }}</td>
                        <td>@if($_event->eventType->type_name == 'Catering')<span class="event_type_catering">Catering</span>@else{{$_event->eventType->type_name}}@endif</td>
                        <td><a href="{{route('admin.event.show', $_event->id)}}">{{ DateTime::createFromFormat('Y-m-d H:i:s', $_event->end_date_time)->format('D, M d-Y') }}</a></td>
                        
                        <td>
                        @php $first = true; @endphp
                        @foreach($_event->eventFacilities as $_facility)
                            @if (!$first)
                                |
                            @else
                                @php $first = false; @endphp
                            @endif
                            {{ $_facility->facility->facility_name }}
                        @endforeach
                        </td>
                        <td class="number">{{ $_event->adults }}</td>
                    </tr>
                @endforeach 
                <tr class="page_total">
                    <td colspan="6"></td>
                    <td class="ralign total">Total:</td>
                    <td class="ralign total">{{ $totalAdults }}</td>
                </tr>
                </tbody>
            </table>
            <button type="button" class="button font-bold radius-0">Export to Excel</button>
            <!-- <input type="submit" value="Export to Excel" id="event_list_edit" name="event_list_edit" class="button" fdprocessedid="ec0xob"> -->
    </form>
</span>
@endsection
@section('scripts')
<script>
$(document).ready(function() {
    $('#perPageSelect').on('change', function() {
        const perPage = $(this).val();
        const url = new URL(window.location.href);
        url.searchParams.set('perPage', perPage);
        window.location.href = url.toString();
        $('#frm_event_list').submit();
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