@extends('admin.layouts.master')
@section('title', 'Active Purchase Orders')
@section('style')
<style>
    .po_preparation {
        background: #94CAFC;
    }
    .po_completed {
        background: #07B70A;
    }

    .po_status {
        padding: 3px;
        color: #fff;
        margin: 3px;
        display: inline-block;
        width: 90px;
        text-align: center;
    }
    .not_received {
        background: #94CAFC;
    }
    .full_received {
        background: #9E9E9E;
    }
    .aborted {
        background: #000;
        color: #FFF;
    }
    .partial_received {
        background: #07B70A;
    }
    .receive_status {
        padding: 3px;
        color: #fff;
        margin: 3px;
        display: inline-block;
        width: 8em;
        text-align: center;
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
    <h1>Liquor Purchase Orders</h1>
</div>
<div id="event_tabs" class="tab_content ui-tabs ui-widget ui-widget-content ui-corner-all">
    <ul class="ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all" role="tablist">
        <li class="ui-state-default ui-corner-top @if(isset($purchaseOrders)){{'ui-tabs-active ui-state-active'}}@endif" role="tab" style="padding-right: 12px;">
            <a href="{{ route('admin.liquor-active-purchase') }}" class="ui-tabs-anchor" role="presentation" tabindex="-2" id="ui-id-2">Active POs</a>
            @if(isset($purchaseOrders))
                <a href="#" class="create_purchase_order" style="position: absolute;top: 8px;right: 7px;">
                    <svg style="width: 15px" class="svg-inline--fa fa-plus add-icon liquor_list_add" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="plus" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"></path></svg>
                </a>
            @endif
        </li>
        <li class="ui-state-default ui-corner-top @if(isset($allPurchaseOrders)){{'ui-tabs-active ui-state-active'}}@endif" role="tab">
            <a href="{{ route('admin.purchase-order-list') }}" class="ui-tabs-anchor" role="presentation" tabindex="-3" id="ui-id-3">All
                <svg style="width: 10px" class="svg-inline--fa fa-plus add-icon d-none liquor_bin_add" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="plus" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"></path></svg>
            </a>
        </li>
    </ul>
    <div class="ui-tabs-panel ui-widget-content ui-corner-bottom" id="event_tabs-1" aria-labelledby="ui-id-1" role="tabpanel" aria-expanded="true" aria-hidden="false">
        @php $preparationOrder = App\Models\PurchaseOrder::where('po_status', 1)->count();@endphp
        <span style="color:red;font-weight:bold;font-size:16px;">Warning: {{ $preparationOrder }} older PO(s) still in preparation</span>
        @if(isset($purchaseOrders))
            <div class="card">
                <table class="product-list table mt-20">
                    <tbody>
                        <tr>
                            <th>
                                <a href="#">PO Number</a>
                            </th>
                            <th>
                                <a href="#">Supplier</a>
                            </th>
                            <th>
                                <a href="#">PO Date</a>
                            </th>
                            <th>
                                <a href="#">Status</a>
                            </th>
                            <th>
                                <a href="#">Receive Status</a>
                            </th>
                            <th>
                                <a href="#">Prepared By</a>
                            </th>
                            <th>
                                <a href="#">Prepared On</a>
                            </th>
                            <th>
                                <a href="#">Sub Total</a>
                            </th>
                            <th class="actions"></th>
                        </tr>
                        @foreach($purchaseOrders as $_purchaseOrder)
                        <tr class="actual_body">
                            <td><a href="{{ route('admin.purchase-order-view',$_purchaseOrder->id) }}">{{ $_purchaseOrder->po_number }}</a></td>
                            <td><a href="{{ route('admin.supplier.show',$_purchaseOrder->supplier->id) }}">{{$_purchaseOrder->supplier->supplier_name}}</a></td>
                            <td>{{ $_purchaseOrder->po_date }}</td>
                            <td>@if($_purchaseOrder->po_status == 1)<span class="po_preparation po_status">{{ 'Preparation' }}</span>@elseif($_purchaseOrder->po_status == 2)<span class="po_completed po_status">{{ 'Completed' }}</span>@elseif($_purchaseOrder->po_status == 3)<span class="po_preparation po_status">{{ 'Completed' }}</span>@elseif($_purchaseOrder->po_status == 4)<span class="po_preparation po_status">{{ 'Sent' }}</span>@endif</td>
                            <td>@if($_purchaseOrder->po_receive_status == 1)<span class="not_received receive_status">{{ 'Not Received' }}</span>@elseif($_purchaseOrder->po_receive_status == 2)<span class="partial_received receive_status">{{ 'Partly Received' }}</span>@elseif($_purchaseOrder->po_receive_status == 3)<span class="full_received receive_status">{{ 'Fully Received' }}</span>@elseif($_purchaseOrder->po_receive_status == 4)<span class="aborted receive_status">{{ 'Aborted' }}</span>@endif</td>
                            <td>{{ $_purchaseOrder->user->name }}</td>
                            <td>{{ date('Y-m-d', strtotime($_purchaseOrder->dt_prepare)) }}</td>
                            <td>${{ number_format($_purchaseOrder->sub_total,2) }}</td>
                            <td><button type="button" product_id="26" class="delete_product button font-bold radius-0">Edit</button></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="card">
                <div>
                    <h2>Green House Events</h2>
                    <hr>
                    <table class="product-list table mt-20">
                        <tbody>
                            <tr>
                                <th>Event ID</th>
                                <th>Customer</th>
                                <th>Event Type</th>
                                <th>Start Date Time</th>
                                <th>Status</th>
                                <th>Liquor List</th>
                                <th class="actions">Action</th>
                            </tr>
                            <tr class="" event_id="20734">
                                <td><a href="https://www.royalambassador.ca/db_event/event_view.php?event_id=20734" target="_blank">20734</a></td>
                                <td><a href="https://www.royalambassador.ca/db_customer/customer_view.php?customer_id=38854" target="_blank">Alessia Chiappetta - Todd Goncavles</a></td>
                                <td>Wedding Cer./Reception</td>
                                <td>Friday May 10, 2024</td>
                                <td>2</td>
                                <td>
                                    <select class="lq_list_id">
                                        <option value="----">----</option><option value="2">Premium Bar</option>
                                        <option value="1">Standard Bar</option>
                                    </select>
                                </td>
                                <td><button class="btn_create_event_po" event_id="20734">Create PO</button></td>
                            </tr>
                        </tbody>
                    </table>                 
                </div>
            </div>

            <div class="card">
                <div>
                    <h2>Special Orders</h2>
                    <p>Liquor products ordered specially by week's events</p>
                    <hr>
                    <table class="product-list table mt-20">
                        <tbody>
                            <tr>
                                <th>Product</th>
                                <th>Related Product</th>
                                <th>Usage</th>
                                <th>Suggested Qty</th>
                                <th class="actions">Action</th>
                            </tr>
                        </tbody>
                    </table>                 
                </div>
            </div>
        @endif
        @if(isset($allPurchaseOrders))
            <div class="card">
                <div>
                    <form action="{{ route('admin.purchase-order-list') }}" id="search_purchase_order">
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
                            <label>PO Number:</label> 
                            <input name="po_number" id="purchase_orders_PO_NUMBER" type="text" value="{{ request('po_number') }}" maxlength="32" size="11" title="Internal purchase order number given to this PO by the host company">
                            <label>Status:</label> 
                            <select name="po_status" id="purchase_orders_PO_STATUS" fdprocessedid="rgtl0i">
                                <option value="" selected="selected">--All--</option>
                                <option value="1" {{ request('po_status') == 1?'selected':''}}>Preparation</option>
                                <option value="2" {{ request('po_status') == 2?'selected':''}}>Completed</option>
                                <option value="3" {{ request('po_status') == 3?'selected':''}}>Completed</option>
                                <option value="4" {{ request('po_status') == 4?'selected':''}}>Sent</option>
                            </select>
                            <label>Receive Status:</label> 
                                <select name="po_receive_status[]" id="purchase_orders_PO_RECEIVE_STATUS" multiple="multiple">
                                    <option value="1" {{ in_array('1', request('po_receive_status', [])) ? 'selected' : '' }}>Not Received</option>
                                    <option value="2" {{ in_array('2', request('po_receive_status', [])) ? 'selected' : '' }}>Partly Received</option>
                                    <option value="3" {{ in_array('3', request('po_receive_status', [])) ? 'selected' : '' }}>Fully Received</option>
                                    <option value="4" {{ in_array('4', request('po_receive_status', [])) ? 'selected' : '' }}>Aborted</option>
                                </select>
                                <button type="submit" class="button font-bold radius-0">Search</button>
                                <a href="{{ route('admin.purchase-order-list') }}">
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
                                <th><a href="#">PO Number</a></th>
                                <th><a href="#">Supplier</a></th>
                                <th><a href="#">PO Date</a></th>
                                <th><a href="#">Status</a></th>
                                <th><a href="#">Receive Status</a></th>
                                <th><a href="#">Prepared By</a></th>
                                <th><a href="#">Prepared On</a></th>
                                <th><a href="#">Sub Total</a></th>
                                <th class="actions"></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($allPurchaseOrders as $_purchaseOrder)
                        <tr class="actual_body">
                            <td><a href="{{ route('admin.purchase-order-view',$_purchaseOrder->id) }}">{{ $_purchaseOrder->po_number }}</a></td>
                            <td><a href="{{ route('admin.supplier.show',$_purchaseOrder->supplier->id) }}">{{$_purchaseOrder->supplier->supplier_name}}</a></td>
                            <td>{{ $_purchaseOrder->po_date }}</td>
                            <td>@if($_purchaseOrder->po_status == 1)<span class="po_preparation po_status">{{ 'Preparation' }}</span>@elseif($_purchaseOrder->po_status == 2)<span class="po_completed po_status">{{ 'Completed' }}</span>@elseif($_purchaseOrder->po_status == 3)<span class="po_preparation po_status">{{ 'Completed' }}</span>@elseif($_purchaseOrder->po_status == 4)<span class="po_preparation po_status">{{ 'Sent' }}</span>@endif</td>
                            <td>@if($_purchaseOrder->po_receive_status == 1)<span class="not_received receive_status">{{ 'Not Received' }}</span>@elseif($_purchaseOrder->po_receive_status == 2)<span class="partial_received receive_status">{{ 'Partly Received' }}</span>@elseif($_purchaseOrder->po_receive_status == 3)<span class="full_received receive_status">{{ 'Fully Received' }}</span>@elseif($_purchaseOrder->po_receive_status == 4)<span class="aborted receive_status">{{ 'Aborted' }}</span>@endif</td>
                            <td>{{ $_purchaseOrder->user->name }}</td>
                            <td>{{ date('Y-m-d', strtotime($_purchaseOrder->dt_prepare)) }}</td>
                            <td>${{ number_format($_purchaseOrder->sub_total,2) }}</td>
                            <td><button type="button" product_id="26" class="delete_product button font-bold radius-0">Edit</button></td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div id="pagination-links" class="pagination">
                        {{ $allPurchaseOrders->links() }}
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>

<div class="ui-widget-overlay ui-front d-none"></div>
<!-- Create Purchase Order -->
<div class="ui-dialog ui-widget1 ui-widget-content ui-corner-all ui-front ui-draggable ui-resizable ajax_obj create-popup-form ui-draggable-create-purchase-order d-none"
    tabindex="-1" style="position: absolute; height: auto;  width: 640px; top: 181.5px; left: 276px;"
    role="dialog" aria-describedby="ajax_obj" aria-labelledby="ui-id-15">
    <div class="ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix">
        <span id="ui-id-15" class="ui-dialog-title">Create Purchase Order</span>
        <button class="ui-button ui-widget1 ui-state-default ui-corner-all ui-button-icon-only ui-dialog-titlebar-close"
            role="button" aria-disabled="false" title="close">
            <span class="ui-button-icon-primary ui-icon ui-icon-closethick closethick-create-purchase-order-close"></span>
            <span class="ui-button-text">close</span>
        </button>
    </div>
    <div id="ajax_obj" class="ui-dialog-content ui-widget-content create-form-content" style="width: auto">
    <span id="new_purchase_order" class="xmlb_form">
        <form method="post" id="frm_new_purchase_order" action="{{ route('admin.liquor-active-purchase.store') }}" accept-charset="utf-8" enctype="multipart/form-data">
            @csrf
            <br>
            <h2>New Empty Purchase Order</h2>
            <br>
            <p>
                <label>Supplier:</label>
                <span class="element">
                    <select id="new_purchase_order_lnk_supplier" name="supplier" fdprocessedid="k7dfqq">
                        <option value="">----</option>
                        @if(isset($suppliers))
                            @foreach($suppliers as $_supplier)
                                <option value="{{$_supplier->id}}">{{ $_supplier->supplier_name }}</option>
                            @endforeach
                        @endif
                    </select>
                </span>
                <span class="mand_sign">*</span>
            </p>
            <div class="line_break"></div>
            <p>
                <label>Currency:</label>
                <span class="element">
                    <select id="new_purchase_order_currency" name="currency" fdprocessedid="jesusg">
                        <option value="">----</option>
                        <option value="CAD" selected="selected">CAD</option>
                    </select>
                </span>
                <span class="mand_sign">*</span>
            </p>
            <div class="line_break"></div>
            <p>
                <label>PO Date:</label>
                <span class="element">
                    <input name="po_date" id="po_date" size="12" maxlength="10" value="{{ date('Y-m-d') }}"  type="date" class="hasDatepicker" fdprocessedid="oealx5">
                </span>
                <span class="mand_sign">*</span>
            </p>
            <div class="line_break"></div>
            <p>
                <label>Required For:</label>
                <span class="element">
                    <input name="date_required" id="date_required" size="12" maxlength="10"  type="date" class="hasDatepicker" fdprocessedid="mqug9">
                </span>
                <span class="mand_sign">*</span>
            </p>
            <br><br>
            <div class="form_footer">
                <input type="submit" value="Create PO" id="new_purchase_order_save" name="new_purchase_order_save" class="button" fdprocessedid="daw8ao">
            </div>
        </form>
        </span>
    </div>
</div>
@endsection
@section('scripts')
<script>
    $(document).ready(function(){
        $('.create_purchase_order').click(function(e) {
            e.preventDefault();
            $('.ui-draggable-create-purchase-order').show();
            $('.ui-widget-overlay').css('display', 'block');
        });
        $('.closethick-create-purchase-order-close').click(function() {
            $('.ui-draggable-create-purchase-order').hide();
            $('.ui-widget-overlay').css('display', 'none');
        });

        $('#frm_new_purchase_order').validate({
            rules: {
                'supplier': 'required',
                'currency': 'required',
                'po_date': 'required',
                'date_required': 'required',
            },
            messages: {
                'supplier': 'Please enter supplier.',
                'currency': 'Please enter currency.',
                'po_date': 'Please enter po date.',
                'date_required': 'Please enter Required Date.',
            }
        })
    });

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