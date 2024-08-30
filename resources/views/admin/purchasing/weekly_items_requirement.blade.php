@extends('admin.layouts.master')
@section('title', 'On Hand PO List')
@section('style')
<style>
    .small_button, .ui-dialog-content .small_button {
        background: #F7941E;
        font-weight: bold;
        cursor: pointer;
        font-size: 12px;
        text-align: center;
        padding: 3px 6px 3px 6px;
        color: #FFF;
        display: inline-block;
        margin: .2em .4em 0 0;
    }
    .req_row {
        display: grid;
        padding: .2em 0;
        border-bottom: 1px dotted #999;
    }

    .qty {
        color: #0782C1;
        cursor: pointer;
    }

    .cat_header {
        background: #9d8944;
        padding: .3em;
        color: #FFF;
        font-size: larger;
        font-weight: bold;
    }

    .req_items {
        margin-top: .2em;
    }

    .btn_print_pdf {
        float: right;
    }
</style>
@endsection
@section('content')
<span id="new_req" class="xmlb_form">
    <form method="post" id="frm_new_req" action="" accept-charset="utf-8" enctype="multipart/form-data">
        <input type="hidden" name="PAGE_ID" value="weekly_items_requirement">
        <input type="hidden" name="new_req" value="new_req">
        <h2>Weekly Items Requirement</h2>
        <fieldset class="form_filters">
            <legend>Search</legend>
            <label>From:</label> 
            <input type="date" class="date flt_from_date hasDatepicker" value="2024-05-15" id="dp1715755534421" fdprocessedid="p930lp">
            <label>To:</label> 
            <input type="date" class="date flt_to_date hasDatepicker" value="2024-05-15" id="dp1715755534422" fdprocessedid="ctdh5s">
                <button type="button" class="small_button button redious-0">Go</button>
            <!-- <span class="small_button btn_go">GO</span> -->

            <span class="small_button btn_print_pdf">Print 
                <svg class="svg-inline--fa fa-file-pdf" style="height: 1em; vertical-align: -.125em;" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="file-pdf" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                    <path fill="currentColor"
                        d="M0 64C0 28.7 28.7 0 64 0H224V128c0 17.7 14.3 32 32 32H384V304H176c-35.3 0-64 28.7-64 64V512H64c-35.3 0-64-28.7-64-64V64zm384 64H256V0L384 128zM176 352h32c30.9 0 56 25.1 56 56s-25.1 56-56 56H192v32c0 8.8-7.2 16-16 16s-16-7.2-16-16V448 368c0-8.8 7.2-16 16-16zm32 80c13.3 0 24-10.7 24-24s-10.7-24-24-24H192v48h16zm96-80h32c26.5 0 48 21.5 48 48v64c0 26.5-21.5 48-48 48H304c-8.8 0-16-7.2-16-16V368c0-8.8 7.2-16 16-16zm32 128c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H320v96h16zm80-112c0-8.8 7.2-16 16-16h48c8.8 0 16 7.2 16 16s-7.2 16-16 16H448v32h32c8.8 0 16 7.2 16 16s-7.2 16-16 16H448v48c0 8.8-7.2 16-16 16s-16-7.2-16-16V432 368z">
                    </path>
                </svg>
            </span>
        </fieldset>

        <div class="req_items card" style="display: block;">
            <div>
                <div class="req_row header" style="grid-template-columns: 3fr 1fr 1fr;"><span>Product Name</span><span
                        class="ralign">2024-05-15</span><span class="ralign">Total</span></div>
                <div class="cat_header">Bar</div>
                <div class="req_row actual_body" gn_prod_id="158" style="grid-template-columns: 3fr 1fr 1fr;"><span><a
                            href="#"
                            target="_blank">Cash Bar</a></span><span class="ralign qty" day="2024-05-15">22</span><span
                        class="ralign">22</span></div>
                <div class="cat_header">Beverage</div>
                <div class="req_row actual_body" gn_prod_id="14" style="grid-template-columns: 3fr 1fr 1fr;"><span><a
                            href="#"
                            target="_blank">Coffee/Espresso/Tea</a></span><span class="ralign qty"
                        day="2024-05-15">22</span><span class="ralign">22</span></div>
                <div class="req_row actual_body" gn_prod_id="26" style="grid-template-columns: 3fr 1fr 1fr;"><span><a
                            href="#"
                            target="_blank">Soft Drinks and Juice</a></span><span class="ralign qty"
                        day="2024-05-15">22</span><span class="ralign">22</span></div>
                <div class="cat_header">Dessert</div>
                <div class="req_row actual_body" gn_prod_id="688" style="grid-template-columns: 3fr 1fr 1fr;"><span><a
                            href="#"
                            target="_blank">Apple Blossom</a></span><span class="ralign qty"
                        day="2024-05-15">18</span><span class="ralign">18</span></div>
                <div class="cat_header">Entrées</div>
                <div class="req_row actual_body" gn_prod_id="2274" style="grid-template-columns: 3fr 1fr 1fr;"><span><a
                            href="#"
                            target="_blank">12oz. Braised Short Rib</a></span><span class="ralign qty"
                        day="2024-05-15">7</span><span class="ralign">7</span></div>
                <div class="req_row actual_body" gn_prod_id="469" style="grid-template-columns: 3fr 1fr 1fr;"><span><a
                            href="#"
                            target="_blank">Chicken Supreme 8 oz.</a></span><span class="ralign qty"
                        day="2024-05-15">6</span><span class="ralign">6</span></div>
                <div class="req_row actual_body" gn_prod_id="946" style="grid-template-columns: 3fr 1fr 1fr;"><span><a
                            href="#"
                            target="_blank">Peppercorn squash</a></span><span class="ralign qty"
                        day="2024-05-15">2</span><span class="ralign">2</span></div>
                <div class="cat_header">Salad</div>
                <div class="req_row actual_body" gn_prod_id="20" style="grid-template-columns: 3fr 1fr 1fr;"><span><a
                            href="#"
                            target="_blank">Ambassador House</a></span><span class="ralign qty"
                        day="2024-05-15">9</span><span class="ralign">9</span></div>
                <div class="req_row actual_body" gn_prod_id="78" style="grid-template-columns: 3fr 1fr 1fr;"><span><a
                            href="#"
                            target="_blank">Caesar Salad</a></span><span class="ralign qty"
                        day="2024-05-15">13</span><span class="ralign">13</span></div>
                <div class="cat_header">Seafood</div>
                <div class="req_row actual_body" gn_prod_id="2159" style="grid-template-columns: 3fr 1fr 1fr;"><span><a
                            href="#"
                            target="_blank">Salmon, 6oz</a></span><span class="ralign qty"
                        day="2024-05-15">7</span><span class="ralign">7</span></div>
                <div class="cat_header">Vegetables</div>
                <div class="req_row actual_body" gn_prod_id="951" style="grid-template-columns: 3fr 1fr 1fr;"><span><a
                            href="#"
                            target="_blank">Potatoes, roasted</a></span><span class="ralign qty"
                        day="2024-05-15">22</span><span class="ralign">22</span></div>
                <div class="req_row actual_body" gn_prod_id="173" style="grid-template-columns: 3fr 1fr 1fr;"><span><a
                            href="#"
                            target="_blank">Seasonal Vegetables</a></span><span class="ralign qty"
                        day="2024-05-15">22</span><span class="ralign">22</span></div>
            </div>
        </div>
    </form>
</span>
@endsection
@section('scripts')
@endsection