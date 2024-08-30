@extends('admin.layouts.master')
@section('title', 'Active Purchase Orders')
@section('style')
<style>
    .product-list tr:nth-child(even) {
        background-color: #E5D07B; /* Set the background color for even rows */
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
    .product-list a {
        color: #0782C1;
    }
</style>
@endsection
@section('content')
<div class="title_bar card">
    <h1>Purchase Orders under Preparation</h1>
</div>
<div id="event_tabs" class="tab_content ui-tabs ui-widget ui-widget-content ui-corner-all">
    
    <div class="ui-tabs-panel ui-widget-content ui-corner-bottom" id="event_tabs-1" aria-labelledby="ui-id-1" role="tabpanel" aria-expanded="true" aria-hidden="false">
        <div class="card">
            <div>
                <form action="{{ route('admin.po-list-preparation') }}" id="search_purchase_order">
                    <fieldset class="form_filters">
                        <legend>Search by</legend>
                        <label>Supplier:</label> 
                        <select name="supplier" id="purchase_orders_LNK_SUPPLIER">
                            <option value="" selected="selected">-- All --</option>
                            @if(isset($suppliers))
                                @foreach($suppliers as $_supplier)
                                    <option value="{{$_supplier->id}}" {{ request('supplier') == $_supplier->id?'selected':''}}>{{ $_supplier->supplier_name }}</option>
                                @endforeach
                            @endif
                        </select>
                        <button type="submit" class="button font-bold radius-0">Search</button>
                        <a href="po-list-preparation">
                            <button type="button" value="Show All" class="button font-bold radius-0">Show All</button>
                        </a>
                    </fieldset>

                    <div class="top-record mt-20 pages_p">
                        <p align="right">
                            <span id="records-display"></span> of <span id="total_records"> {{$allRecords}} </span> | Show:
                            <select id="perPageSelect" class="max-100" name="pages">
                                <option value="10" {{ request('pages') == 10?'selected':''}}>10</option>
                                <option value="30" {{ request('pages') == 30?'selected':''}} @if(request('pages') == null){{'selected'}}@endif>30</option>
                                <option value="50" {{ request('pages') == 50?'selected':''}}>50</option>
                                <option value="100" {{ request('pages') == 100?'selected':''}}>100</option>
                            </select>
                        </p>
                    </div>
                </form>
                <table class="product-list table mt-20">
                    <thead>
                        <tr>
                            <th><a href="#">Supplier</a></th>
                            <th><a href="#">PO Date</a></th>
                            <th><a href="#">Sub Total</a></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($purchaseOrders as $_purchaseOrder)
                            <tr>
                                <td><a href="{{ route('admin.supplier.show',$_purchaseOrder->supplier->id) }}">{{$_purchaseOrder->supplier->supplier_name}}</a></td>
                                <td><a href="{{ route('admin.purchase-order-view',$_purchaseOrder->id) }}">{{ $_purchaseOrder->po_date }}</a></td>
                                <td>${{ number_format($_purchaseOrder->sub_total,2) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <p><input type="button" value="Delete" id="purchase_order_list_delete" name="purchase_order_list_delete" class="button"></p>
                <div id="pagination-links" class="pagination">
                    {{ $purchaseOrders->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    $(document).ready(function() {
        $('.pages_p').change(function() {
            $('#search_purchase_order').submit();
        });
    });

    $(document).ready(function() {
        $('#perPageSelect').on('change', function() {
            const perPage = $(this).val();
            const url = new URL(window.location.href);
            url.searchParams.set('perPage', perPage);
            window.location.href = url.toString();
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