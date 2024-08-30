@extends('admin.layouts.master')
@section('title', 'Restaurant Daily Sales')
@section('content')
<div class="card title_bar">
    <h1>Manage Restaurant</h1>
</div>
<div class="line_break"></div>
<div id="event_tabs" class="tab_content ui-tabs ui-widget ui-widget-content ui-corner-all">
    <ul class="ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all" role="tablist">
        <li class="ui-state-default ui-corner-top" role="tab">
            <a href="#" class="ui-tabs-anchor" onclick="window.location.href='{{ route('admin.schedule.restaurant') }}'"
                role="presentation" tabindex="-1" id="ui-id-1">Schedule</a>
        </li>
        <li class="ui-state-default ui-corner-top ui-tabs-active ui-state-active" role="tab">
            <a href="#" class="ui-tabs-anchor" role="presentation" tabindex="-2" id="ui-id-2">Daily Sales </a>
        </li>
    </ul>
    <div id="event_tabs-2" aria-labelledby="ui-id-2" class="ui-tabs-panel ui-widget-content ui-corner-bottom"
        role="tabpanel" aria-expanded="false" aria-hidden="true">
        <span id="customer_tasks" class="xmlb_form">
            <h1>Daily Restaurant Sales</h1>
            <div class="line_break"></div>
            <form action="#" id="frm_rest_daily_sales_list" method="get">
                <fieldset class="form_filters">
                    <legend>Search</legend>
                    Date: <label>From</label>
                    <input name="rest_daily_sales_list_d_more" id="rest_daily_sales_list_d_more" size="12"
                        maxlength="10" title="The date to which this revenue record is related" type="date"
                        class="hasDatepicker">
                    <label>To</label>
                    <input name="rest_daily_sales_list_d_less" id="rest_daily_sales_list_d_less" size="12"
                        maxlength="10" title="The date to which this revenue record is related" type="date"
                        class="hasDatepicker">
                    <label>Show:</label>
                    <select id="month_select">
                        <option value="">--All--</option>
                        <option value="01" month_first="2024-01-01" month_last="2024-01-31">January</option>
                        <option value="02" month_first="2024-02-01" month_last="2024-02-29">February</option>
                        <option value="03" month_first="2024-03-01" month_last="2024-03-31">March</option>
                        <option value="04" month_first="2024-04-01" month_last="2024-04-30">April</option>
                        <option value="05" month_first="2024-05-01" month_last="2024-05-31">May</option>
                        <option value="06" month_first="2024-06-01" month_last="2024-06-30">June</option>
                        <option value="07" month_first="2024-07-01" month_last="2024-07-31">July</option>
                        <option value="08" month_first="2024-08-01" month_last="2024-08-31">August</option>
                        <option value="09" month_first="2024-09-01" month_last="2024-09-30">September</option>
                        <option value="10" month_first="2024-10-01" month_last="2024-10-31">October</option>
                        <option value="11" month_first="2024-11-01" month_last="2024-11-30">November</option>
                        <option value="12" month_first="2024-12-01" month_last="2024-12-31">December</option>
                    </select>
                    <button type="submit" id="rest_daily_sales_list_apply_filter"
                        class="button font-bold radius-0">Search</button>
                    <button type="button" id="rest_daily_sales_list_clear_filter" class="button font-bold radius-0">Show
                        All</button>
                </fieldset>
            </form>
            <div class="line_break"></div>
            <div class="top-record mt-20">
                <p align="right">
                    Records: 1 to 3 of 3 | Show:
                    <select class="max-100">
                        <option value="all">All</option>
                        <option value="3" selected="">3</option>
                        <option value="10">10</option>
                        <option value="30">30</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                </p>
            </div>
            <table class="product-list table mt-20">
                <tbody>
                    <tr>
                        <th>
                            <a href="#">Date</a>
                        </th>
                        <th>
                            <a href="#">Guests</a>
                        </th>
                        <th>
                            <a href="#">Food/Beverage</a>
                        </th>
                        <th>
                            <a href="#">Alcohol</a>
                        </th>
                        <th>
                            <a href="#">Total Food & Drink</a>
                        </th>
                        <th>
                            <a href="#">Cash Gratuity</a>
                        </th>
                        <th>
                            <a href="#">Non-Cash Gratuity</a>
                        </th>
                        <th>
                            <a href="#">Total Gratuity</a>
                        </th>
                        <th>
                            <a href="#">Sub Total</a>
                        </th>
                        <th>
                            <a href="#">HST</a>
                        </th>
                        <th>
                            <a href="#">Grand Total</a>
                        </th>
                        <th>
                            <a href="#">Cash</a>
                        </th>
                        <th>
                            <a href="#">Credit/Debit</a>
                        </th>
                        <th></th>
                    </tr>
                    <tr class="supplier-row">
                        <td>Page Total</td>
                        <td>0</td>
                        <td>$0.00</td>
                        <td>$0.00</td>
                        <td>$0.00</td>
                        <td>$0.00</td>
                        <td>$0.00</td>
                        <td>$0.00</td>
                        <td>$0.00</td>
                        <td>$0.00</td>
                        <td>$0.00</td>
                        <td>$0.00</td>
                        <td>$0.00</td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </span>
        <div class="line_break"></div>
        <button type="button" id="add_new_line">+</button>
        <span id="sales_new_row" class="xmlb_form" style="display: none;">
            <fieldset>
                <legend>New Line</legend>
                <label>Date:</label> <input name="sales_new_row_related_date" id="sales_new_row_related_date" size="12"
                    maxlength="10" title="The date to which this revenue record is related" type="date"
                    class="hasDatepicker" fdprocessedid="tzjs9o">
                *<span class="sep"></span><label>Guests:</label> <input id="sales_new_row_no_of_guests"
                    name="sales_new_row_no_of_guests" type="text" maxlength="4" size="3"
                    title="No of guests or customers for this day" fdprocessedid="uhr2cu">
                *<span class="sep"></span><label>Food/Beverage:</label> <input id="total_food_bevg"
                    name="total_food_bevg" type="number" step="0.01" maxlength="8"
                    title="Total food and beverage sales for the day" fdprocessedid="y5p4fp">
                *<span class="sep"></span><label>Alcohol:</label> <input id="total_alcohol" name="total_alcohol"
                    type="number" step="0.01" maxlength="8" title="Total alcohol sales for the day"
                    fdprocessedid="ywyy5m">
                *<span class="sep"></span><label>Cash Gratuity:</label> <input id="gratuity_cash" name="gratuity_cash"
                    type="number" step="0.01" maxlength="8" title="Total cash gratuity" fdprocessedid="6b6x3s">
                *<span class="sep"></span><label>Non-Cash Gratuity:</label> <input id="gratuity_not_cash"
                    name="gratuity_not_cash" type="number" step="0.01" maxlength="8" title="Total non-cash gratuity"
                    fdprocessedid="xnbj2a">
                *<span class="sep"></span><label>HST:</label> <input id="total_tax1" name="total_tax1" type="number"
                    step="0.01" maxlength="8" title="Total Tax1. Tax 1 can be say HST or any other sales tax"
                    fdprocessedid="w7rkid">
                *<br><br><label>Cash Payment:</label> <input id="cash_payment" name="cash_payment" type="number"
                    step="0.01" maxlength="9" title="The amount of this transaction that customer has paid in cash"
                    fdprocessedid="fvi9dg">
                *<span class="sep"></span><label>Credit Debit Payment:</label> <input id="credit_debit_payment"
                    name="credit_debit_payment" type="number" step="0.01" maxlength="9"
                    title="The amount of this transaction that customer has paid via credit or debit card"
                    fdprocessedid="buxtp">
                *<span class="sep"></span><input type="image" src="/images/icon_save.png" id="sales_new_row_save"
                    name="sales_new_row_save" class="button"
                    onclick=" if($('#sales_new_row_save').attr('xmlb_in_progress') == 'yes') {alert('In progress. Please wait!') ; return ;}if(preSubmitsales_new_row()){ajax_var_sales_new_row += '&amp;action_elm_id=' + 'action_ajax_save' ; $('#sales_new_row_save').attr('xmlb_in_progress','yes') ; saveForm('sales_new_row','restaurant_daily_sales',ajax_var_sales_new_row) ;}"
                    fdprocessedid="mr311u">
            </fieldset>
        </span>
    </div>
</div>
@endsection
@section('scripts')
<script>
$(document).ready(function() {
    $('#add_new_line').click(function(e) {
        e.preventDefault();
        $('#add_new_line').css('display', 'none');
        $('#sales_new_row').css('display', 'block');
    });
});

$(document).ready(function() {
    $('.ui-state-default a').click(function(e) {
        e.preventDefault();
        $('.ui-state-default').removeClass('ui-tabs-active ui-state-active');
        $(this).closest('li').addClass('ui-tabs-active ui-state-active')
        $('.ui-tabs-panel').css('display', 'none');
        var text = $(this).attr('tabindex');
        if (text == -1) {
            $('#event_tabs-1').show();
        } else if (text == -2) {
            $('#event_tabs-2').show();
        } else {
            $('.main-order-item').css('order', '1');
            $('.corporate-form').show();
        }
    });
});
</script>
@endsection