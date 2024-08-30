@extends('admin.layouts.master')
@section('title', 'Payment Details')
@section('style')
<style>
    .product-list{
        width:100%;
    }
    table.product-list tr.total {
        font-weight: bold;
        background: #F2E8C6;
    }
</style>
@endsection
@section('content')
<div class="title_bar card">
    <h1>Payment Details</h1>
</div>
<fieldset class="form_filters">
    <legend>Search by</legend>
    <label>Related To:</label>
    <select name="payment_list_RELATED_TABLE" id="payment_list_RELATED_TABLE" onchange="javascript:payment_list_applyFilters();" fdprocessedid="0e20na">
        <option value="--All--" selected="selected">--All--</option>
        <option value="1">Event</option>
        <option value="2">Sepcial Event Booking</option>
        <option value="3">Gift Certificate</option>
    </select>
    <label>Paid By Name:</label> 
    <input name="payment_list_PAID_BY_NAME" id="payment_list_PAID_BY_NAME" type="text" value="" maxlength="60" size="20" title="Name of the person who made this payment like customer name or anyone else" onchange="javascript:payment_list_applyFilters(); " fdprocessedid="58rsbq">
    <label>From</label> 
    <input name="payment_list_pd_more" id="payment_list_pd_more" value="2024-06-11" size="12" maxlength="10" title="When the payment was made on this invoice if any" onchange="javascript:payment_list_applyFilters(); " type="date" class="hasDatepicker" fdprocessedid="toi1p9">
    <label>To</label> 
    <input name="payment_list_pd_less" id="payment_list_pd_less" size="12" maxlength="10" title="When the payment was made on this invoice if any" onchange="javascript:payment_list_applyFilters(); "
        type="date" class="hasDatepicker" fdprocessedid="eym9cj">
        <label>Payment Method:</label>
    <select name="payment_list_PAYMENT_METHOD" id="payment_list_PAYMENT_METHOD"  onchange="javascript:payment_list_applyFilters();" fdprocessedid="8dnmtg">
        <option value="--All--" selected="selected">--All--</option>
        <option value="1">Cheque</option>
        <option value="2">Cash</option>
        <option value="3">Debit</option>
        <option value="4">Visa</option>
        <option value="5">Master Card</option>
        <option value="10">American Express</option>
        <option value="9">E-Transfer</option>
        <option value="6">Others</option>
    </select>
    <label>Trans. Type:</label>
    <select name="payment_list_TRANSACTION_TYPE" id="payment_list_TRANSACTION_TYPE" onchange="javascript:payment_list_applyFilters();" fdprocessedid="tvzode">
        <option value="--All--" selected="selected">--All--</option>
        <option value="1">Purchase</option>
        <option value="2">Refund</option>
    </select>
    <label>Purpose:</label>
    <select name="payment_list_PAYMENT_PURPOSE" id="payment_list_PAYMENT_PURPOSE" onchange="javascript:payment_list_applyFilters();" fdprocessedid="qqnsr">
        <option value="--All--" selected="selected">--All--</option>
        <option value="F">First Deposit</option>
        <option value="S">Second Deposit</option>
        <option value="L">Final Payment</option>
        <option value="E">Special Event</option>
        <option value="G">Gift Certificate</option>
    </select>
    <button type="button" id="payment_list_apply_filter" class="button font-bold radius-0">Search</button>
    <button type="button" id="payment_list_clear_filter" class="button font-bold radius-0">Show All</button>
    <!-- <input type="submit" value="Search" id="payment_list_apply_filter" name="payment_list_apply_filter" onclick="javascript:payment_list_applyFilters(); return false;" fdprocessedid="r8lkjg">
    <input type="submit" value="Show All" id="payment_list_clear_filter" name="payment_list_clear_filter"
        onclick="javascript:clearFormFilters('payment_list') ; return false;" fdprocessedid="a0e7eh"> -->
</fieldset>
<div class="line_break"></div>
<p align="right">Records: 0 to 0 of 0 | Show: 
    <select name="show_records" id="show_records"  onchange="handleShowRecords('payment_list',this.value) ;" fdprocessedid="6fpq">
        <option value="all">All</option>
        <option value="10">10</option>
        <option value="20" selected="">20</option>
        <option value="30">30</option>
        <option value="50">50</option>
        <option value="100">100</option>
    </select>
</p>
<table class="bound product-list">
    <thead>
        <tr>
            <th><a href="#"
                    onclick="handleListSorting('payment_list','{cs:UID DESC}','{ns:RELATED_TABLE ASC}') ; return false ;"
                    title="Click to sort by Related To">Related To</a></th>
            <th><a href="#"
                    onclick="handleListSorting('payment_list','{cs:UID DESC}','{ns:PAID_BY_NAME ASC}') ; return false ;"
                    title="Click to sort by Paid By Name">Paid By Name</a></th>
            <th><a href="#"
                    onclick="handleListSorting('payment_list','{cs:UID DESC}','{ns:PAYMENT_DATE ASC}') ; return false ;"
                    title="Click to sort by Paid On">Paid On</a></th>
            <th><a href="#"
                    onclick="handleListSorting('payment_list','{cs:UID DESC}','{ns:PAYMENT_METHOD ASC}') ; return false ;"
                    title="Click to sort by Payment Method">Payment Method</a></th>
            <th><a href="#"
                    onclick="handleListSorting('payment_list','{cs:UID DESC}','{ns:TRANSACTION_TYPE ASC}') ; return false ;"
                    title="Click to sort by Trans. Type">Trans. Type</a></th>
            <th><a href="#"
                    onclick="handleListSorting('payment_list','{cs:UID DESC}','{ns:PAYMENT_AMOUNT ASC}') ; return false ;"
                    title="Click to sort by Payment Amount">Payment Amount</a></th>
            <th><a href="#"
                    onclick="handleListSorting('payment_list','{cs:UID DESC}','{ns:OVERHEAD_PERCENT ASC}') ; return false ;"
                    title="Click to sort by Overhead">Overhead</a></th>
            <th><a href="#"
                    onclick="handleListSorting('payment_list','{cs:UID DESC}','{ns:AMOUNT_AFTER_OVERHEAD ASC}') ; return false ;"
                    title="Click to sort by Amount After Overhead">Amount After Overhead</a></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <tr class="total">
            <td colspan="2">Page Total:</td>
            <td></td>
            <td></td>
            <td class="ralign"><strong>$0.00</strong></td>
            <td></td>
            <td class="ralign"><strong>$0.00</strong></td>
            <td></td>
        </tr>
        <tr class="total">
            <td colspan="2">Grand Total:</td>
            <td></td>
            <td></td>
            <td class="ralign"><strong>$0.00</strong></td>
            <td></td>
            <td class="ralign"><strong>$0.00</strong></td>
            <td></td>
        </tr>
    </tbody>
</table>
@endsection
@section('scripts')
@endsection