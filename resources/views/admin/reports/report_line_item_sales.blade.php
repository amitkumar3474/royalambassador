@extends('admin.layouts.master')
@section('title', 'Line Item Sales')
@section('style')
<style>
    .product-list {
        width: 100%;
    }
    table.product-list tr.total {
        font-weight: bold;
        background: #F2E8C6;
    }
</style>
@endsection
@section('content')
<span id="event_item_list" class="xmlb_form">
    <form method="post" id="frm_event_item_list" action="" accept-charset="utf-8" enctype="multipart/form-data">
        <div class="card title_bar">
            <h1>Line Item Sales</h1>
        </div>

        <fieldset class="form_filters">
            <legend>Search</legend>
            <label>Product Name:</label> 
            <input name="event_item_list_PRODUCT_NAME" id="event_item_list_PRODUCT_NAME" type="text" value="" maxlength="1100" size="30" title="Name of the selected product for this item" fdprocessedid="n09x8j">
            <label>From</label> 
            <input name="event_item_list_ed_more" id="event_item_list_ed_more" value="2024-06-01" size="12" maxlength="10" title="Event start date and time" type="text" class="hasDatepicker" fdprocessedid="02smy">
            <label>To</label> 
            <input name="event_item_list_ed_less" id="event_item_list_ed_less" size="12" maxlength="10" title="Event start date and time" type="date" class="hasDatepicker" fdprocessedid="wpso8">
            <button type="button" id="event_list_apply_filter" class="button font-bold radius-0">Search</button>
            <a href="#">
                <button type="button" id="event_list_clear_filter" class="button font-bold radius-0">Show All</button>
            </a>
            <!-- <input type="submit" value="Search" id="event_item_list_apply_filter" name="event_item_list_apply_filter" fdprocessedid="3zj1m4">
            <input type="submit" value="Show All" id="event_item_list_clear_filter"  name="event_item_list_clear_filter" fdprocessedid="1v08jl"> -->
        </fieldset>

        <p align="right">Records: 1 to 30 of 469|Show: <select name="show_records" id="show_records"
                onchange="handleShowRecords('event_item_list',this.value) ;" fdprocessedid="syfevc">
                <option value="all">All</option>
                <option value="10">10</option>
                <option value="30" selected="">30</option>
                <option value="50">50</option>
                <option value="100">100</option>
            </select></p>
        <table class="bound product-list">
            <thead>
                <tr>
                    <th><a href="#" title="Click to sort by Id">Id</a></th>
                    <th><a href="#" title="Click to sort by Function Date">Function Date</a></th>
                    <th><a href="#" title="Click to sort by Product">Product</a></th>
                    <th><a href="#" title="Click to sort by Total">Total</a></th>
                </tr>
            </thead>
            <tbody>
                <tr class="actual_body">
                    <td><a href="https://www.royalambassador.ca/db_event/event_view.php?event_id=22993">22993</a></td>
                    <td>Jun 03- 2024</td>
                    <td>Bar on Consumption</td>
                    <td class="ralign">$225.00</td>
                </tr>
                <tr class="total">
                    <td colspan="3">Page Total:</td>
                    <td class="ralign"><strong>$17,745.00</strong></td>
                </tr>
                <tr class="total">
                    <td colspan="3">Page Total:</td>
                    <td class="ralign"><strong>$421,486.41</strong></td>
                </tr>
            </tbody>
        </table>
        <p>
            <button type="button" class="button font-bold radius-0">Export to Excel</button>
            <!-- <input type="submit" value="Delete" id="event_item_list_delete" name="event_item_list_delete" class="button"
                onclick="return presubmitListForm('event_item_list','event_item_list_submit','Do you really want to delete the selected Event(s)?')"
                fdprocessedid="eny0gr"><input type="submit" value="Export" id="event_item_list_export"
                name="event_item_list_export" class="button" fdprocessedid="gh58z"> -->
        </p>
        <script type="text/javascript">
        function event_item_list_applyFilters() {
            var cur_page_path = location.pathname;
            var page_args = location.search;
            page_args = page_args.substr(1);
            filter_val = $.trim($('#event_item_list_PRODUCT_NAME').val());
            if (filter_val != '') {
                var new_filter_arg = '{event_item.product_name:' + filter_val + '}';
                page_args = placeFilterArg(page_args, 'event_item_list', new_filter_arg);
            }
            filter_val = document.getElementById('event_item_list_ed_more').value;
            if (filter_val != '2024-06-01') {
                var new_filter_arg = '{ed_more:' + filter_val + '}';
                page_args = placeFilterArg(page_args, 'event_item_list', new_filter_arg);
            }
            filter_val = document.getElementById('event_item_list_ed_less').value;
            if (filter_val != '') {
                var new_filter_arg = '{ed_less:' + filter_val + '}';
                page_args = placeFilterArg(page_args, 'event_item_list', new_filter_arg);
            }
            if (page_args != "")
                document.location = cur_page_path + '?' + page_args;
            else
                document.location = cur_page_path;
        }
        </script>
    </form>
</span>
@endsection
@section('scripts')
@endsection