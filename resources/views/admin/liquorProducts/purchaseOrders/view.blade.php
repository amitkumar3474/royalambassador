@extends('admin.layouts.master')
@section('title', 'Purchase Order Details')
@section('style')
<style>
    .po_status {
        padding: 3px;
        color: #fff;
        margin: 3px;
        display: inline-block;
        width: 90px;
        text-align: center;
    }
    .po_preparation {
        background: #94CAFC;
    }
    .po_completed {
        background: #07B70A;
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
    .ui-menu {
        list-style: none;
        padding: 2px;
        margin: 0;
        display: block;
        outline: none;
        border-radius:4px;
        border: 1px solid #aaaaaa;
        z-index: 100;
        top: 0;
        left: 0;
    }
    .ui-menu .ui-menu-item a {
        text-decoration: none;
        display: block;
        /* padding: 2px .4em; */
        line-height: 1.5;
        min-height: 0;
        font-weight: normal;
        color: #222222;
        cursor: default;
    }
        :focus-visible {
        outline: -webkit-focus-ring-color auto 1px;
    }
    .ui-menu .ui-menu-item {
        margin: 0;
        padding: 0;
        width: 100%;
    }
    .ui-menu li.ui-menu-item:hover{
        background: #ccc;
        border-radius: 4px;

    }
</style>
@endsection
@section('content')
<div class="title_bar card">
    <h1>Purchase Order # {{$purchaseOrder->po_number}}  @if($purchaseOrder->po_receive_status == 4){{ ': Aborted' }}@endif</h1>
    <br>
    <h2 style="color:black">
        <a href="{{ route('admin.supplier.show',$purchaseOrder->supplier->id) }}">{{$purchaseOrder->supplier->supplier_name}}</a> / 
        <span class="phone">{{$purchaseOrder->supplier->main_phone??'No Phone'}}</span> / {{$purchaseOrder->po_date}}
    </h2>
    <br>
</div>
<form id="frm_view_purchase_order" action="{{ route('admin.liquor-active-purchase.update') }}" method="post">
    @csrf
    <input type="hidden" name="po_id" value="{{$purchaseOrder->id}}">
    <div class="global-form main-form height-100 ">
        <div class="cus-row">
            <div class="col-5">
                <div class="cus-row">
                    <div class="col-4 mb-10">
                        <label class="align-right">Status:</label>
                    </div>
                    <div class="col-8 mb-10 pl-0">
                        @if($purchaseOrder->po_status == 1)<span class="po_preparation po_status">{{ 'Preparation' }}</span>@elseif($purchaseOrder->po_status == 2)<span class="po_completed po_status">{{ 'Completed' }}</span>@elseif($purchaseOrder->po_status == 3)<span class="po_preparation po_status">{{ 'Completed' }}</span>@elseif($purchaseOrder->po_status == 4)<span class="po_preparation po_status">{{ 'Sent' }}</span>@endif
                    </div>
                    <div class="col-4 mb-10">
                        <label class="align-right">Receive Status:</label>
                    </div>
                    <div class="col-8 mb-10 pl-0">
                        @if($purchaseOrder->po_receive_status == 1)<span class="not_received receive_status">{{ 'Not Received' }}</span>@elseif($purchaseOrder->po_receive_status == 2)<span class="partial_received receive_status">{{ 'Partly Received' }}</span>@elseif($purchaseOrder->po_receive_status == 3)<span class="full_received receive_status">{{ 'Fully Received' }}</span>@elseif($purchaseOrder->po_receive_status == 4)<span class="aborted receive_status">{{ 'Aborted' }}</span>@endif
                    </div>
                    @if($purchaseOrder->po_status == 1)
                        <div class="col-4 mb-10">
                            <label class="align-right">PO Date:</label>
                        </div>
                        <div class="col-8 mb-10 pl-0">
                            <input name="po_date" id="po_date" size="12" maxlength="10" value="{{$purchaseOrder->po_date}}" title="Date of the purchase order. This is usually the same date that purchase order is approved. It is null when purchase order is created in preparation and is filled when the PO is approved and being sent to supplier." type="date" fdprocessedid="273j9">
                        </div>
                        <div class="col-4 mb-10">
                            <label class="align-right">Required For:</label>
                        </div>
                        <div class="col-8 mb-10 pl-0">
                            <input name="date_required" id="date_required" size="12" maxlength="10" value="{{$purchaseOrder->date_required}}" title="Default required date for the items in this purchase order. Still each item can have its own required date" type="date" fdprocessedid="3p9pqf">              
                        </div>
                    @elseif($purchaseOrder->po_status == 2)
                        <div class="col-4 mb-10">
                            <label class="align-right">PO Date:</label>
                        </div>
                        <div class="col-8 mb-10 pl-0">
                            <span>{{$purchaseOrder->po_date}}</span>
                        </div>
                        <div class="col-4 mb-10">
                            <label class="align-right">Required For:</label>
                        </div>
                        <div class="col-8 mb-10 pl-0">
                            <span>{{$purchaseOrder->date_required}}</span>
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-5">
                <div class="cus-row">
                    @if($purchaseOrder->po_status == 1)
                        <div class="col-4 mb-10">
                            <label class="align-right">License Number:</label>
                        </div>
                        <div class="col-8 mb-10 pl-0">
                            <input id="license_number" value="{{$purchaseOrder->license_number}}" name="license_number" type="text" maxlength="40" size="20" title="If this purchase order requires any license, like liquor license then we enter it here" fdprocessedid="dcvpye">
                        </div>
                        <div class="col-4 mb-10">
                            <label class="align-right">Notes:</label>
                        </div>
                        <div class="col-8 mb-10 pl-0">
                            <textarea id="po_notes" name="po_notes" cols="30" rows="3" title="Extra notes on the purchase order if any" maxlength="4000">{{$purchaseOrder->po_notes}}</textarea>                                
                        </div>
                        <div class="col-4 mb-10">
                            <label class="align-right">Sub Total:</label>
                        </div>
                        <div class="col-8 mb-10 pl-0">
                            <input id="sub_total" name="sub_total" type="number" step="0.01" maxlength="10" value="{{$purchaseOrder->sub_total??0}}" title="Subtotal of this purchase order in the host currency" fdprocessedid="taxbtc">                                
                        </div>
                    @elseif($purchaseOrder->po_status == 2)
                        <div class="col-4 mb-10">
                            <label class="align-right">License Number:</label>
                        </div>
                        <div class="col-8 mb-10 pl-0">
                            <span>{{$purchaseOrder->license_number}}</span>
                        </div>
                        <div class="col-4 mb-10">
                            <label class="align-right">Notes:</label>
                        </div>
                        <div class="col-8 mb-10 pl-0">
                            <span>{{$purchaseOrder->po_notes}}</span>
                        </div>
                        <div class="col-4 mb-10">
                            <label class="align-right">Sub Total:</label>
                        </div>
                        <div class="col-8 mb-10 pl-0">
                            <span>${{number_format($purchaseOrder->sub_total, 2)}}</span>
                        </div>
                        <div class="col-4 mb-10">
                            <label class="align-right">Tax1 Amount:</label>
                        </div>
                        <div class="col-8 mb-10 pl-0">
                            <span>${{number_format($purchaseOrder->tax1_amount, 2)}}</span>
                        </div>
                        <div class="col-4 mb-10">
                            <label class="align-right">Grand Total:</label>
                        </div>
                        <div class="col-8 mb-10 pl-0">
                            <span>${{number_format($purchaseOrder->grand_amount, 2)}}</span>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="">
        <a href="#">
            <button id="edit" type="button" name="edit" class="button font-bold radius-0" fdprocessedid="cc14x8c">Edit PO</button>
        </a>
        @if($purchaseOrder->po_status == 1)
            <button type="button" class="button font-bold radius-0 btn_po_delete" po_id="{{ $purchaseOrder->id }}">Delete PO</button>
            <button type="button" id="btn_set_as_completed" name="edit" class="button font-bold radius-0" fdprocessedid="fvhz2c">Set as Completed</button>
        @elseif($purchaseOrder->po_status == 2)
            <a href="{{ route('admin.po-receive-new',['po_id' => $purchaseOrder->id]) }}">
                <button type="button" class="button font-bold radius-0 btn_new_receive_session">New Receive Session</button>
            </a>
            <button type="button" class="button font-bold radius-0 btn_back_to_preparation" po_id="{{ $purchaseOrder->id }}" page_id='Back to Preparation'>Back to Preparation</button>
        @endif
        <input type="submit" value="Export to Excel" id="misc" name="misc" class="button">
        <button type="button" class="button font-bold radius-0 btn_duplicate_this_po" po_id="{{ $purchaseOrder->id }}" page_id='duplicate this po'>Duplicate this PO</button>
        <button type="button" class="button font-bold radius-0 btn_refresh_prices" po_id="" page_id=''>Refresh Prices</button>
        @if($purchaseOrder->po_status == 1)
            <input type="submit" value="Save Changes" id="btn_save_po_changes" name="page_id" class="button font-bold radius-0">
        @endif
        <button type="button" class="button font-bold radius-0 btn_abort_this_po" po_id="{{ $purchaseOrder->id }}" page_id='Abort this PO'>Abort this PO</button>
    </div>
</form>

<div class="card">
    <div>
        <table class="product-list table mt-20">
            <thead>
                <tr>
                    <th></th>
                    <th>Name</th>
                    <th>SKU #</th>
                    <th>Package</th>
                    <th>Num Cases</th>
                    <th>Price/Case</th>
                    <th>Subtotal</th>
                    <th class="actions"></th>
                </tr>
            </thead>
            <tbody>
                <!-- <tr class="" po_item_id="7577">
                    <td class="calign"><span class="show_order">1</span><input type="image" src="/images/icon_move_up.png" id="po_cur_items_prepare_move_up" name="po_cur_items_prepare_move_up" class="button" onclick="refreshForm('po_cur_items_prepare','purchase_order_view','action_elm_id=action_move_up&amp;rec_uid=7577') ; return false ;" fdprocessedid="e27zq"><input type="image" src="/images/icon_move_down.png" id="po_cur_items_prepare_move_down" name="po_cur_items_prepare_move_down" class="button" onclick="refreshForm('po_cur_items_prepare','purchase_order_view','action_elm_id=action_move_down&amp;rec_uid=7577') ; return false ;" fdprocessedid="0m4c7ki"></td>
                    <td><a href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1507">Cola</a><br>Use: 0.0074</td>
                    <td><input id="po_cur_items_prepare_vendor_part_num1" name="po_cur_items_prepare_vendor_part_num1" type="text" maxlength="32" size="22" value="051010" title="The supplier part # for this item being ordered. If this record is not linked to any product in PRODUCT_GEN table, then user might want to enter this feild manually say to order somethign that we order only once in a blue moon." class="vendor_part_num" fdprocessedid="2skw5m"></td>
                    <td>Tank</td>
                    <td><input id="po_cur_items_prepare_num_packs1" name="po_cur_items_prepare_num_packs1" type="number" maxlength="7" size="8" step="1" value="2" title="Number of packages that we are ordering if ordering by package" class="num_packs" fdprocessedid="jj98pa"></td>
                    <td><input id="po_cur_items_prepare_price_per_pack1" name="po_cur_items_prepare_price_per_pack1" type="number" step="0.01" maxlength="9" value="0" title="If we are ordering by package, then this column gives us the price per individual package" class="price_pack" fdprocessedid="np9tt7"></td>
                    <td><span class="po_item_stotal">$0.00</span></td>
                    <td><input type="image" src="/images/icon_delete.png" id="po_cur_items_prepare_delete" name="po_cur_items_prepare_delete" class="button" onclick="if (confirm('Do you really want to delete this record?')) {document.getElementById('po_cur_items_prepare_submit').value = '7577' ;} else return false ;" fdprocessedid="5owrwi"></td>
                </tr> -->
            </tbody>
        </table>                 
    </div>
</div>
@if($purchaseOrder->po_status == 1)
    <div class="card">
        <div>
        <h2>Add More Items</h2>
        <p>Please Note that only the items that are purchased (Is Purchased = Yes) will show here.</p>
            <table class="product-list table mt-20 add_more_items">
                <thead>
                    <tr>
                        <th></th>
                        <th>Liquor</th>
                        <th>SKU #</th>
                        <th># of Packages</th>
                        <th>Price per Package</th>
                        <th class="actions"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="order_row">
                        <td>1</td>
                        <td><span role="status" aria-live="polite" class="ui-helper-hidden-accessible"></span><input type="text" id="ui-autocomplete-input_1" class="sku ui-autocomplete-input" autocomplete="off" fdprocessedid="2xs1bn"></td>
                        <td><input type="text" id="vendor_sku_1" class="vendor_sku" fdprocessedid="kh3f4"></td><td><input type="number" step="1" id="num_packs_1" class="num_packs" fdprocessedid="it6jw"></td>
                        <td><input type="number" min=".01" step=".01" id="price_per_pack_1" class="price_per_pack" fdprocessedid="7onca"></td>
                        <td><button type="button" class="remove_empty_line">Remove</button></td>
                    </tr>
                    <tr class="order_row">
                        <td>2</td>
                        <td><span role="status" aria-live="polite" class="ui-helper-hidden-accessible"></span><input type="text" id="ui-autocomplete-input_2" class="sku ui-autocomplete-input" autocomplete="off" fdprocessedid="jy84ok"></td>
                        <td><input type="text" id="vendor_sku_2" class="vendor_sku" fdprocessedid="grj2fu"></td>
                        <td><input type="number" step="1" id="num_packs_2" class="num_packs" fdprocessedid="2u9rt"></td>
                        <td><input type="number" min=".01" step=".01" id="price_per_pack_2" class="price_per_pack" fdprocessedid="p4ar1dvu"></td>
                        <td><button type="button" class="remove_empty_line">Remove</button></td>
                    </tr>
                    <tr class="order_row">
                        <td>3</td>
                        <td><span role="status" aria-live="polite" class="ui-helper-hidden-accessible"></span><input type="text" id="ui-autocomplete-input_3" class="sku ui-autocomplete-input" autocomplete="off" fdprocessedid="wsyan5"></td>
                        <td><input type="text" id="vendor_sku_3" class="vendor_sku" fdprocessedid="ggpo9s"></td>
                        <td><input type="number" step="1" id="num_packs_3" class="num_packs" fdprocessedid="vdkche"></td>
                        <td><input type="number" min=".01" step=".01" id="price_per_pack_3" class="price_per_pack" fdprocessedid="bm35zfu"></td>
                        <td><button type="button" class="remove_empty_line">Remove</button></td>
                    </tr>
                </tbody>
            </table>      
            <br>
            <p>
                <button type="button" class="button font-bold radius-0 btn_add_empty_line">Add Empty Line</button>
                <button type="button" class="button font-bold radius-0">Save Rows</button>
            </p>           
            <br>
        </div>
    </div>
@endif
<div class="card">
    <div>
        <h2>EMail History (0)</h2>
        <hr>
        <table class="product-list table mt-20">
            <tbody>
                <tr>
                    <th>To</th>
                    <th>Email Subject</th>
                    <th>Status</th>
                    <th>Date Time Added</th>
                    <th>Date Time Sent</th>
                    <th class="actions"></th>
                </tr>
            </tbody>
        </table>                 
    </div>
</div>
<div class="hello">

</div>

<div class="ui-widget-overlay ui-front d-none"></div>
<!-- Finalize Purchase Order -->
<div class="ui-dialog ui-widget1 ui-widget-content ui-corner-all ui-front ui-draggable ui-resizable ajax_obj create-popup-form ui-draggable-finalize-purchase-order d-none"
    tabindex="-1" style="position: absolute; height: auto;  width: 540px; top: 182px; left: 358px;"
    role="dialog" aria-describedby="ajax_obj" aria-labelledby="ui-id-15">
    <div class="ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix">
        <span id="ui-id-15" class="ui-dialog-title">Finalize Purchase Order</span>
        <button class="ui-button ui-widget1 ui-state-default ui-corner-all ui-button-icon-only ui-dialog-titlebar-close"
            role="button" aria-disabled="false" title="close">
            <span class="ui-button-icon-primary ui-icon ui-icon-closethick closethick-finalize-purchase-order-close"></span>
            <span class="ui-button-text">close</span>
        </button>
    </div>
    <div id="ajax_obj" class="ui-dialog-content ui-widget-content create-form-content" style="width: auto">
        <span id="edit_purchase_order" class="xmlb_form">
            <form method="post" id="frm_edit_purchase_order" action="" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="page_id" value="purchase_order_set_as_completed">
                <input type="hidden" name="po_id" value="{{ $purchaseOrder->id }}">
                <h2>Set PO: #{{ $purchaseOrder->po_number }} as Completed.</h2>
                    <p>Note: After this step, you can no longer make changes to this purchase order</p>
                    <br>
                    <p>
                        <label>PO Number:</label>
                        <span class="element">
                            <input id="edit_purchase_order_po_number" name="po_number" type="text" maxlength="32" size="22" value="{{ $purchaseOrder->po_number }}" title="Internal purchase order number given to this PO by the host company" fdprocessedid="ng875">
                            @error('po_number')
                             <span style="color:red">{{ $message }}</span>
                            @enderror
                        </span>
                        <span class="mand_sign">*</span>
                    </p>
                    <div class="line_break"></div>
                    <p>
                        <label>PO Date:</label>
                        <span class="element">
                            <input name="po_date" id="edit_purchase_order_po_date" size="12" maxlength="10" value="{{ $purchaseOrder->po_date }}" title="Date of the purchase order. This is usually the same date that purchase order is approved. It is null when purchase order is created in preparation and is filled when the PO is approved and being sent to supplier." type="date">
                        </span>
                        <span class="mand_sign">*</span>
                    </p>
                    <div class="line_break"></div>
                    <p><label>Notes:</label>
                    <span class="element">
                        <textarea id="edit_purchase_order_po_notes" name="po_notes" cols="30" rows="3" title="Extra notes on the purchase order if any" maxlength="4000">{{ $purchaseOrder->po_notes }}</textarea>
                    </span>
                    <span class="mand_sign"></span>
                </p>
                <div class="line_break"></div>
                <div class="form_footer">
                    <input type="submit" value="Continue" id="edit_purchase_order_save" name="edit_purchase_order_save" class="button">
                </div>
            </form>
        </span>
    </div>
</div>
@endsection
@section('scripts')
<script>
    $(document).ready(function(){
        $('#btn_set_as_completed').click(function(e) {
            e.preventDefault();
            $('.ui-draggable-finalize-purchase-order').show();
            $('.ui-widget-overlay').css('display', 'block');
        });
        $('.closethick-finalize-purchase-order-close').click(function() {
            $('.ui-draggable-finalize-purchase-order').hide();
            $('.ui-widget-overlay').css('display', 'none');
        });
    });

    $(document).ready(function(){
        $(document).on('click', '.btn_po_delete', function() {
            let po_id = $(this).attr('po_id');
            if (confirm("Do you really want to delete this record?") == true) {
                var url = "{{ route('admin.purchase-order.destroy', ':id') }}";
                url = url.replace(':id', po_id);
                $.ajax({
                    url: url,
                    type: 'DELETE',
                    data: {_token:  "{{csrf_token()}}"},
                    success: function(response) {
                        if (response.success) {
                            alert(response.message);
                            window.location.href = "{{ route('admin.liquor-active-purchase') }}";
                        } else {
                            alert(response.message);
                        }
                    }
                });

            }
        });
    })

    $(document).ready(function() {
        $('#frm_edit_purchase_order').submit(function(event) {
            event.preventDefault();
            if (confirm("Are you sure? Double checked?") == true) {
                var formData = $(this).serialize();
                $.ajax({
                    url: "{{ route('admin.liquor-active-purchase.update') }}",
                    type: 'POST',
                    data: formData,
                    success: function(response) {
                        location.reload();
                    },
                    error: function(response) {
                        var errorMessages = '';
                        $.each(response.responseJSON.errors, function(key, value) {
                            errorMessages += value;
                        });
                        alert(errorMessages);
                    }
                });
            }
        });
    });

    $(document).ready(function(){
        $(document).on('click', '.btn_duplicate_this_po, .btn_abort_this_po, .btn_back_to_preparation', function() {
            let po_id = $(this).attr('po_id');
            let page_id = $(this).attr('page_id');
            if(page_id == 'duplicate this po'){
                var alert = 'Create a duplicate of this Purchase Order?';
            }else if(page_id == 'Abort this PO'){
                var alert = 'Do you really want to abort this Purchase Order?';
            }else if(page_id == 'Back to Preparation'){
                var alert = 'Set it back to Preparation?';
            }
            if (confirm(alert) == true) {
                $.ajax({
                    url: "{{ route('admin.liquor-active-purchase.update') }}",
                    type: 'POST',
                    data: { po_id: po_id, page_id: page_id, _token: "{{ csrf_token() }}" }, 
                    success: function(response) {
                        var url = "{{ route('admin.purchase-order-view', ':id') }}";
                        url = url.replace(':id', response.id);
                        window.location.href = url;
                    }
                });

            }
        });
    })
    $(document).ready(function(){
        $('#frm_view_purchase_order').validate({
            rules: {
                'po_date': 'required',
                'date_required': 'required',
                'sub_total': 'required',
            },
            messages: {
                'po_date': 'Please enter po date.',
                'date_required': 'Please enter Required Date.',
                'sub_total': 'Please enter Sub Total.'
            }
        });
    })
    $(document).ready(function(){
        $('.btn_refresh_prices').click(function (e) { 
            e.preventDefault();
            if (confirm("This will refresh the prices to the latest from the product. Continue?") == true) {
                location.reload();
            }
        });
        $('.btn_add_empty_line').click(function () { 
            indexNumber = $('.order_row').length + 1; 
            var addEmptyLine = '<tr class="order_row">' +
                                '<td>'+indexNumber+'</td>' +
                                '<td><span role="status" aria-live="polite" class="ui-helper-hidden-accessible"></span><input type="text" id="ui-autocomplete-input_'+indexNumber+'" class="sku ui-autocomplete-input" autocomplete="off" fdprocessedid="jy84ok"></td>' +
                                '<td><input type="text" id="vendor_sku_'+indexNumber+'" class="vendor_sku" fdprocessedid="grj2fu"></td>' +
                                '<td><input type="number" step="1" id="num_packs_'+indexNumber+'" class="num_packs" fdprocessedid="2u9rt"></td>' +
                                '<td><input type="number" min=".01" step=".01" id="price_per_pack_'+indexNumber+'" class="price_per_pack" fdprocessedid="p4ar1dvu"></td>' +
                                '<td><button type="button" class="remove_empty_line">Remove</button></td>' +
                            '</tr>';
            $('.add_more_items').append(addEmptyLine);
            indexNumber++;
        });

        $(document).on('click', '.remove_empty_line', function() {
            if(confirm("Remove this row?")){
                $(this).closest('.order_row').remove();
                $('.order_row').each(function(i) {
                    $(this).find('td:first').text(i + 1);
                    $(this).find('td:first').text(i + 1);
                    $(this).find('.ui-autocomplete-input').attr('id', 'ui-autocomplete-input_' + (i + 1));
                    $(this).find('.vendor_sku').attr('id', 'vendor_sku_' + (i + 1));
                    $(this).find('.num_packs').attr('id', 'num_packs_' + (i + 1));
                    $(this).find('.price_per_pack').attr('id', 'price_per_pack_' + (i + 1));
                });
                indexNumber = $('.order_row').length + 1; 
            }
        });

        $(document).on('input', '.order_row .ui-autocomplete-input', function() {
            var inputValue = $(this).val(); // Replace spaces with underscores
            var firstTdText = $(this).closest('.order_row').find('td:first-child').text();
            $.ajax({
                url: "{{ route('admin.liquor-product-search') }}",
                type: 'GET',
                data: { input_value: inputValue },
                success: function(response) {
                    $('.hello').empty();
                    if(firstTdText == 1){
                        top = 579.375
                    }else{
                        var top = 579.375 + 33*(firstTdText - 1);
                    }
                    
                    var html = '<ul row_no= '+firstTdText+' class="ui-menu" style="position: absolute; top: '+ top +'px; left: 117.771px; width: 161.667px; background: white;">';
                    $.each(response.productNames, function(index, product) {
                        html += '<li class="ui-menu-item" sku='+product.sku+' price_per_package='+ product.purchase_price_case +'><a>' + product.product_name + '</li></a>';
                    });
                    html += '</ul>'
                    $('.hello').append(html);
                }
            });
        });

        // $(document).on('click', function(event) {
        //     $('.hello').empty();
        //     $('.ui-autocomplete-input').val('');
        // });

        $(document).on('click', '.hello ul li', function(event) {
            var i = $(this).closest('.hello ul').attr('row_no');
            console.log(i);
            $('#ui-autocomplete-input_'+i+'').val($(this).text());
            $('#vendor_sku_'+i+'').val($(this).attr('sku'));
            $('#price_per_pack_'+i+'').val($(this).attr('price_per_package'));
            // $('#vendor_sku_'+i+'').val($(this).attr('sku'))
            var sku = $(this).attr('sku');
            $('.hello').empty();
        });
    })

</script>
@endsection