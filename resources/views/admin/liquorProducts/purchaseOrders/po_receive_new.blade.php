@extends('admin.layouts.master')
@section('title', 'New Receive Session')
@section('style')
<style>
   table.mb_bound th {
    background: green;
    padding-top: 6px;
    padding-bottom: 6px;
    padding-left: 6px;
    padding-right: 6px;
    color: white;
    font-size: 20px;
}
table.mb_bound td {
    padding-top: 6px;
    padding-bottom: 6px;
    background: #e6e6ff;
    padding-left: 6px;
    padding-right: 6px;
    font-size: 24px;
}
.qty_to_order input {
    width: 110px;
    height: 82px;
    line-height: 1.65;
    float: left;
    display: block;
    padding: 0;
    margin: 0;
    padding-left: 10px;
    padding-right: 10px;
    border: 1px solid black;
    font-size: 42px;
    font-family: "Trebuchet MS", Helvetica, sans-serif !important;
}
</style>
@endsection
@section('content')
<div class="title_bar card">
    <h1>Receive Session for PO: <a href="">{{$purchaseOrder->po_number}}</a> - <a href="#">{{$purchaseOrder->supplier->supplier_name}}</a> </h1>
    <br>
</div>

<div class="global-form main-form height-100 ">
    <div class="cus-row">
        <div class="col-5">
            <div class="cus-row">
                <div class="col-4 mb-10">
                    <label class="align-right">Warehouse:</label>
                </div>
                <div class="col-8 mb-10 pl-0">
                    <select class="rec_inv_level" fdprocessedid="itmn">
                        <option value="----">----</option><option value="1">1st. Floor Wine Room</option><option value="2">2nd. Floor Wine Room </option><option value="3">Banquet Hall Liquor Room</option><option value="4">Beer Fridge (East)</option><option value="5">Beer Fridge (West)</option><option value="6">Greenhouse Liquor Room</option><option value="7">Greenhouse Beer Fridge</option><option value="10">Conservatory Beer Fridge</option><option value="11">Consulate Warehouse</option></select>
                </div>
                <div class="col-4 mb-10">
                    <label class="align-right">Receive Date:</label>
                </div>
                <div class="col-8 mb-10 pl-0">
                    <input type="date" id="po_receive_date" name="po_receive_date" value="2024-05-11" class="">
                </div>
                <div class="col-4 mb-10">
                    <label class="align-right">Receive Notes:</label>
                </div>
                <div class="col-8 mb-10 pl-0">
                    <textarea id="po_receive_notes" name="po_receive_notes" cols="30" rows="3"></textarea>
                </div>
            </div>
            <button class="button font-bold radius-0">Verify Qtys</button>
        </div>
    </div>
</div>
<div class="card">
    <div>
        <h2>Items to Receive (0)</h2>
        <p>Please pick the warehouse location where you put each item or uncheck any item that is not being
        received.</p>
        <table class=" mb_bound table mt-20">
            <tbody>
                <tr>
                    <th>Product Name</th>
                    <th>Vendor Part #</th>
                    <th>BIN #</th>
                    <th>Ordered</th>
                    <th>Received</th>
                    <th>Remaining</th>
                    <th>Num Cases</th>
                </tr>
                <tr class="row_to_receive">
                    <td>
                        <select name="" id="">
                            <option value="">----</option>
                        </select>
                        <!-- <input type="text" class="sku ui-autocomplete-input" autocomplete="off" fdprocessedid="l46rjm"> -->
                    </td>
                    <td>
                        <input type="text" class="vendor_sku" fdprocessedid="skw3uc">
                    </td>
                    <td>

                    </td>
                    <td>0</td>
                    <td class="ralign">0</td>
                    <td class="ralign">0</td>
                    <td class="num_packs">
                        <div class="qty_to_order">
                            <input class="qty_to_receive" min="0" step="1" value="0" type="number" fdprocessedid="9pkahs">
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>                 
    </div>
</div>
<br>
<input type="submit" value="Add New Row" id="btn_add_empty_row" name="btn_add_empty_row" class="button" fdprocessedid="56mm1l">
<input type="submit" value="Receive the Items" id="btn_receive_items" name="btn_receive_items" class="button" fdprocessedid="qwigf9">
@endsection
@section('scripts')

@endsection