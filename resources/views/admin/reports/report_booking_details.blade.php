@extends('admin.layouts.master')
@section('title', 'Booking Details')
@section('style')
<style>
.product-list {
    width: 100%;
}
table.product-list tr.total {
    font-weight: bold;
    background: #F2E8C6;
}
.warning {
    padding: 3px 6px;
    display: inline-block;
    background: #DB241E;
    color: #fff;
    font-weight: bold;
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
.flex.justify-between.flex-1.sm\:hidden a, .flex.justify-between.flex-1.sm\:hidden span{
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
<span id="event_list" class="xmlb_form">
    <form method="get" id="frm_event_list" action="{{ route('admin.reports.report-booking-details') }}" accept-charset="utf-8" enctype="multipart/form-data">
        <h1>Bookings Details</h1>
        <div class="line_break"></div>
        <fieldset class="form_filters">
            <legend>Search</legend>
            <label>Sales Persons:</label>
            <select name="lnk_sales_person" id="sales_details_LNK_SALES_PERSON">
                <option value="">-- All --</option>
                @foreach($salesPersons as $_salesPerson)
                    <option value="{{$_salesPerson->id}}" {{ request('lnk_sales_person') == $_salesPerson->id ? 'selected' : '' }}>{{ $_salesPerson->first_name }} {{ $_salesPerson->last_name }}</option>
                @endforeach
            </select>
            <label>Event Type:</label>
            <select name="lnk_event_type" id="sales_details_LNK_EVENT_TYPE" fdprocessedid="upo1ss">
                <option value="">-- All --</option>
                @foreach($eventTypes as $_eventType)
                    <option value="{{ $_eventType->id }}" {{ request('lnk_event_type') == $_eventType->id ? 'selected' : '' }}>{{ $_eventType->type_name }}</option>
                @endforeach
            </select>
            <label>Status:</label>
            <select name="event_status" id="event_status" fdprocessedid="ui40rl">
                <option value="">-- All --</option>
                <option value="1" {{ request('event_status') == 1 ? 'selected' : '' }}>Tentative</option>
                <option value="5" {{ request('event_status') == 5 ? 'selected' : '' }}>Promised</option>
                <option value="2" {{ request('event_status') == 2 ? 'selected' : '' }}>Booked</option>
                <option value="3" {{ request('event_status') == 3 ? 'selected' : '' }}>Cancelled</option>
                <option value="4" {{ request('event_status') == 4 ? 'selected' : '' }}>Archived</option>
            </select>
            Booking Date: <label>From</label>
             <input name="ed_more" id="event_list_ed_more" value="{{ request('ed_more') }}" size="12" maxlength="10" title="Date when this when this event is booked" type="date" class="hasDatepicker" fdprocessedid="4689rd">
            <label>To</label> 
            <input name="ed_less" id="event_list_ed_less" value="{{ request('ed_less') }}"size="12" maxlength="10" title="Date when this when this event is booked" type="date" class="hasDatepicker" fdprocessedid="efxv24">
            <button type="submit" id="event_list_apply_filter" class="button font-bold radius-0">Search</button>
            <a href="{{ route('admin.reports.report-booking-details') }}">
                <button type="button" id="event_list_clear_filter" class="button font-bold radius-0">Show All</button>
            </a>
        </fieldset>

        <p align="right"><span id="records-display"></span> of <span id="total_records">{{ $allRecords }}</span> | Show:
            <select id="perPageSelect" class="max-100" name="pages">
                <option value="10" {{ request('pages') == 10?'selected':''}}>10</option>
                <option value="20" {{ request('pages') == 20?'selected':''}}>20</option>
                <option value="30" {{ request('pages') == 30?'selected':''}} @if(request('pages') == null){{'selected'}}@endif>30</option>
                <option value="50" {{ request('pages') == 50?'selected':''}}>50</option>
                <option value="100" {{ request('pages') == 100?'selected':''}}>100</option>
            </select>
        </p>

        <table class="bound product-list">
            <thead>
                <tr>
                    <th><a href="#" title="Click to sort by Id">Id</a></th>
                    <th><a href="#" title="Click to sort by Customer">Customer</a></th>
                    <th><a href="#"  title="Click to sort by Event Type">Event Type</a></th>
                    <th><a href="#"  title="Click to sort by Initial Contact">Initial Contact</a></th>
                    <th><a href="#" title="Click to sort by Booking Date">Booking Date</a></th>
                    <th><a href="#" title="Click to sort by Function Date">Function Date</a></th>
                    <th><a href="#" title="Click to sort by Sub-total">Sub-total</a></th>
                    <th><a href="#" title="Click to sort by Deposit">Deposit</a></th>
                    <th>Deposit Method</th>
                    <th><a href="#" title="Click to sort by Sales Persons">Sales Persons</a></th>
                </tr>
            </thead>
            <tbody>
            @foreach($events as $_event)
                <tr>
                    <td><a href="{{route('admin.event.show', $_event->id)}}">{{ $_event->id }}</a></td>
                    <td><a href="{{ route('admin.customer.show',$_event->lnk_customer) }}">{{ $_event->customer->customer_name }}</a></td>
                    <td>@if($_event->eventType->type_name == 'Catering')<span class="event_type_catering">Catering</span>@else{{$_event->eventType->type_name}}@endif</td>
                    <td>{{ $_event->contact->created_at }}</td>
                    <td>{{ $_event->booking_date }}</td>
                    <td>{{ DateTime::createFromFormat('Y-m-d H:i:s', $_event->end_date_time)->format('D, M d-Y') }}</td>
                    <td class="ralign">${{ number_format($_event->sub_total, 2) }}</td>
                    <td>
                        @if ($_event->deposit == 0)
                            <span title="No payment for this event" class="warning">$0.00</span>
                        @else
                            ${{ number_format($_event->deposit, 2) }}
                        @endif
                    </td>
                        <td>{{ $_event->payment_method?$__event->payment_method:'Not Set' }}</td>
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
                        </td>
                    </tr>
            @endforeach
            <tr class="total">
                    <td colspan="2"><strong>Page Total:</strong></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="ralign"><strong>${{ number_format($events->sum('sub_total'), 2) }}</strong></td>
                    <td class="ralign"><strong>${{ number_format($events->sum('deposit'), 2) }}</strong></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr class="total">
                    <td colspan="2"><strong>Grand Total:</strong></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="ralign"><strong>${{ number_format($subTotal, 2) }}</strong></td>
                    <td class="ralign"><strong>${{ number_format($deposit, 2) }}</strong></td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>

        <div></div>
        <p>
            <button type="button" id="event_list_export" class="button font-bold radius-0">Export</button>
        </p>
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