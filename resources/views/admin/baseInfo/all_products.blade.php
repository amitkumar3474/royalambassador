@extends('admin.layouts.master')
@section('title', 'On Hand PO List')
@section('style')
<style>
    .svg-inline--fa {
        display: var(--fa-display, inline-block);
        height: 1em;
        overflow: visible;
        vertical-align: -.125em;
    }
    .az_tabs {
        background: #F5F5F5;
        margin-left: .5em;
    }
    .az_tabs ul {
        padding: 0;
        margin: 0;
    }
    .az_tabs > ul li.active {
        margin-bottom: -1px;
        border-bottom: 0;
        background: #FFF;
    }
    .az_tabs > ul li {
        font-size: 1.4em;
        width: 10em;
        float: left;
        text-align: center;
        padding: .5em;
        list-style-type: none;
        margin-right: .4em;
        border: 1px solid #999;
        border-bottom: 0;
    }
    .az_tabs ul:after {
        clear: both;
        content: "";
        display: table;
    }
    .form_filters select,
    .form_filters .ui-multiselect {
        max-width: 11em;
    }
    .form_filters {
        position: relative;
    }
    .form_filters .show_recs {
        position: absolute;
        top: -2em;
        right: 20px;
        background: #fff;
        padding: 0 .8em;
    }
    .page_div .form_filters input, .page_div .form_filters select {
        margin-left: 5px;
        float: none;
    }
    input[type="text"], input[type="password"], textarea {
        border: 1px solid #666666;
    }
    .header > span {
        font-weight: bold;
    }
    .prod_status {
        padding: 2px;
        border: 1px solid #999;
        display: inline-block;
        width: 70px;
        text-align: center;
    }
    .prod_status_active {
        background: #6FBC53;
    }
    .prod_status_eol {
        background: #EE1E74;
        color: #FFF;
    }
    .red_font {
        color: #EC2119;
    }
    #product_menu_new label, #product_menu_new .element, #product_menu_new .mand_sign {
        float: none;
    }
    #product_menu_new label {
        width: 11em;
    }
    #product_menu_new .checkboxes_wrap strong {
        margin-right: 2em;
    }
    #ajax_obj label {
        font-weight: bold;
        padding-right: 5px;
        min-width: 125px;
        text-align: right;
        display: inline-block;
        vertical-align: top;
    }
    .ui-widget input, .ui-widget select, .ui-widget textarea, .ui-widget button {
        font-family: Verdana, Arial, sans-serif;
        font-size: 1em;
    }
    p {
        margin: 0 0 6px 0;
        line-height: 120%;
        padding: 2px;
    }
    .btn {
        font-size: 1em;
        margin-left: .2em;
        cursor: pointer;
        background: none;
        color: #F7941E;
        min-width: auto;
    }
    .btn_delete_prod_cat {
        margin-left: .5em;
    }
    .please_wait {
        max-width: 1.5em;
    }
    .scat_wrap {
        display: inline-block; 
        border: 1px solid #999; 
        padding: .3em;
        margin: .1em;}
    .btn_add_sub_cat {
        display: none;
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

@if(isset($drinks))
    <style>
        .cat_row {
            background: #B9C495; 
            width: 100%; 
            font-weight: bold; 
            padding: 3px; 
            font-size: larger;
        }
        .product_row {
            display: grid; 
            grid-template-columns: .3fr 5fr 1fr 1fr 1fr 1fr; 
            padding: .2em 0; 
            margin-left: 1.5em; 
            border-bottom: 1px dotted #999;
        }
        .cur_az_tab {
            background: #FFF;
            padding: 1.5em;
            margin-top: -1px;
            border: 1px solid #999;
        }
            
    </style>
@endif
@if(isset($productMenus) || isset($productArchiveMenus))
    <style>
        .cat_row {
            background: #B9C495;
            width: 100%;
            font-weight: bold;
            padding: 3px;
            font-size: larger;
        }
        .product_row {
            display: grid;
            grid-template-columns: 5fr 1fr 3fr 1fr 1fr 1fr 1fr;
            padding: .2em 0;
            margin-left: 1.5em;
            border-bottom: 1px dotted #999;
        }
        .cur_az_tab {
            background: #FFF;
            padding: 1.5em;
            margin-top: -1px;
            border: 1px solid #999;
            display: inline-block;
            width:100%;
        }
    </style>
@endif

@if(isset($wineCategories))
    <style>
        .azbd_single_choice > span {
            background: #464040; 
            border-radius: .3em; 
            text-align: center; 
            display: inline-block;
            padding: .3em; 
            color: #FFF; 
            margin: .06em;
        }
        .azbd_single_choice.enabled  > span  {
            cursor: pointer;
        }
        .azbd_single_choice.disabled  > span {
            cursor: #888;
        }
        .azbd_single_choice span.selected {
            background: #34A853;
        }
        .wcat_row {
            padding: .3em .4em; display: grid; 
            grid-template-columns: 2em 5fr 3em;
            margin: .1em 0; cursor: pointer;
        }
        .wine_row {
            display: grid; 
            grid-template-columns: 3em 7fr 1fr 1fr 1fr 4fr 2.5fr 3fr 3em 2fr;
        }
        .wine_row > span {
            border: 1px dotted #999; padding: 1px 2px;
        }
        #wine_list {
            display: grid; 
            grid-template-columns: 2fr 5fr; grid-gap: .3em;
        }
        #wine_list label {
            float: none; 
            display: inline-block; 
            width: 60px;
        }
        .flt_wrap {
            display: inline-block; 
            width: 70%;
        }
        .cur_az_tab {
            background: #FFF;
            padding: 1.5em;
            margin-top: -1px;
            border: 1px solid #999;
        }
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
        .big_button, input[type=submit].big_button {
            background: #F7941E;
            font-weight: bold;
            font-size: 15px;
            text-align: center;
            padding: 8px 15px 7px 15px;
            color: #FFF;
            display: inline-block;
            margin: .4em .8em 0 0;
        }
        #wine_list label {
            float: none;
            display: inline-block;
            width: 60px;
        }
        .more_filters_wrap label {
            width: 160px;
            display: inline-block;
            vertical-align: top;
            text-align: right;
        }
        .actual_body:hover {
            background: #E2D9B5;
        }
        .hlighted {
            background: #B3D1ef;
        }
        .warning {
            padding: 3px 6px;
            display: inline-block;
            background: #DB241E;
            color: #fff;
            font-weight: bold;
        }
        .azbd_single_choice span.selected {
            background: #34A853;
        }
        .big_button:hover, .small_button:hover, input[type=submit].big_button:hover {
            background: #EC5816;
            cursor: pointer;
        }
    </style> 
@endif

@if(isset($productcats))
    <style>
        .cat_row {
            cursor: pointer; display: grid; 
            grid-template-columns: .4fr .4fr .4fr 4fr auto;
        }
        .product_row {
            display: grid; 
            grid-template-columns: .5fr 6fr 1fr; 
            padding: .1em;
            border-bottom: 1px dotted #999;
        }
        .left_col, .right_col {
            width: 47%;
            display: inline-block;
            vertical-align: top;
            border: 1px solid #999;
            padding: 1%;
        }
        .cur_az_tab {
            background: #FFF;
            padding: 1.5em;
            margin-top: -1px;
            border: 1px solid #999;
        }
        table.bound {
            width: 100%;
        }
        #product_cat_new label, #product_cat_new .element {
            float: none;
        }
    </style>
@endif
@endsection
@section('content')
<div class="title_bar card">
    <h1>Manage Products</h1>
</div>

<div class="az_tabs">
    <ul>
        <li class="@if(isset($productMenus)) {{'active'}} @endif">
            @if(!isset($productMenus))
                <a href="{{ route('admin.base-info.all-products') }}">Menu Items</a>
            @endif
            @if(isset($productMenus))
            Menu Items 
                <a href="javascript:void(0)" class="btn_add_banquet_menu_add" product_type='M'>
                    <svg class="svg-inline--fa fa-plus" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="plus" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                        <path fill="currentColor" d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z">
                        </path>
                    </svg>
                </a>
            @endif
        </li>
        <li>
            @if(!isset($wineCategories))
                <a href="{{ route('admin.base-info.restaurant-wine-category-list') }}">Wine List</a>
            @endif
            @if(isset($wineCategories))
                Wine List
                <span class="q_tip btn" data-hasqtip="0" title="This page is mainly used to publish wine list on Consulate web site. Categories and filters are only used on Consulate web site. However the wines are part of database and are used inside as well." aria-describedby="qtip-0"><svg class="svg-inline--fa fa-circle-info" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="circle-info" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z"></path></svg><!-- <i class="fa-solid fa-circle-info"></i> Font Awesome fontawesome.com --></span>
            @endif
            </li>
        <li><a href="#">Product Lists</a></li>
        <li class="@if(isset($drinks)) {{'active'}} @endif">
            @if(!isset($drinks))
                <a href="{{ route('admin.base-info.product-drink-list') }}">Drinks List</a>
            @endif
            @if(isset($drinks))
                Drinks List
                <a href="javascript:void(0)" class="btn_add_banquet_menu_add" product_type='D'>
                    <svg class="svg-inline--fa fa-plus" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="plus" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                        <path fill="currentColor" d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z">
                        </path>
                    </svg>
                </a>
                <span class="q_tip btn" data-hasqtip="0" title="This list is only used for the drinks on Consulate web site" aria-describedby="qtip-0">
                    <svg class="svg-inline--fa fa-circle-info" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="circle-info" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z"></path></svg><!-- <i class="fa-solid fa-circle-info"></i> Font Awesome fontawesome.com -->
                </span>
            @endif
        </li>
        <li class="@if(isset($productcats)) {{'active'}} @endif">@if(isset($productcats)){{ 'Product Categories' }} @endif
            @if(!isset($productcats))
                <a href="{{ route('admin.base-info.product-cat-list.index', ['cat_type'=>'M', 'is_active'=>1]) }}">Product Categories</a>
            @endif
        </li>
        <li class="@if(isset($productArchiveMenus)) {{'active'}} @endif">@if(isset($productArchiveMenus)) {{'Archived'}} @endif
            @if(!isset($productArchiveMenus))
                <a href="{{ route('admin.base-info.product-archive-list') }}">Archived</a>
            @endif
        </li>
    </ul>

    @if(isset($productMenus))
        <div class="cur_az_tab">
            <span id="all_products" class="xmlb_form">
                <form method="get" id="frm_all_products" action="{{ route('admin.base-info.all-products') }}" accept-charset="utf-8" enctype="multipart/form-data">
                    <fieldset class="form_filters">
                        <legend>Search</legend> 
                        <span class="show_recs">
                            <span id="records-display" ></span> of <span id="total_records"> {{$allRecords}} </span> | Show:
                            <select id="perPageSelect" class="max-100" name="pages">
                                <option value="10" {{ request('pages') == 10?'selected':''}}>10</option>
                                <option value="30" {{ request('pages') == 30?'selected':''}}>30</option>
                                <option value="1" {{ request('pages') == 50?'selected':''}} @if(request('pages') == null){{'selected'}}@endif>50</option>
                                <option value="100" {{ request('pages') == 100?'selected':''}}>100</option>
                            </select>
                        </span>
                        Name: <input name="product_name" id="all_products_PRODUCT_NAME" type="text" value="{{ request('product_name')}}" maxlength="120" size="15" title="Product name">
                        Category:
                        <select name="lnk_cat" id="all_products_LNK_CAT">
                            <option value="">--All--</option>
                            @foreach($productCats as $_productCat)
                                <option value="{{ $_productCat->id }}" {{ request('lnk_cat') == $_productCat->id?'selected':''}}>{{ $_productCat->cat_name }}</option>
                            @endforeach
                        </select>
                        Usage:
                        <select name="usage_type" id="all_products_USAGE_TYPE" multiple="multiple">
                            <option value="BI">Banquet Inhouse</option>
                            <option value="BC">Banquet Catering</option>
                            <option value="RI">Restaurant Inhouse</option>
                            <option value="RC">Restaurant Catering</option>
                        </select>
                        Specialty Options:
                        <select name="specialty_options" id="all_products_SPECIALTY_OPTIONS" multiple="multiple">
                            <option value="VT">Vegetarian</option>
                            <option value="VN">Vegan</option>
                            <option value="GF">Gluten Free</option>
                            <option value="NF">Nut Free</option>
                            <option value="DA">Dairy Allergy</option>
                        </select>
                        Status:
                        <select name="prod_status" id="all_products_PROD_STATUS">
                            <option value="--All--">--All--</option>
                            <option value="1" selected="yes">Active</option>
                            <option value="2">End of Line</option>
                        </select>
                        Favorite:
                        <select name="favorite_status" id="all_products_FAVORITE_STATUS">
                            <option value="--All--" selected="selected">--All--</option>
                            <option value="1">No</option>
                            <option value="2">Yes</option>
                        </select>
                        <button type="submit" class="button font-bold radius-0">Search</button>
                        <a href="{{ route('admin.base-info.all-products') }}">
                            <button type="button" class="button font-bold radius-0">Show All</button>
                        </a>
                    </fieldset>
                </form>
                <br>            
                @foreach($productMenus as $_productcat)
                    <div class="cat_row">{{ $_productcat->cat_name  }}</div>
                    <div class="product_row header">
                        <span>Name/Desc</span>
                        <span></span>
                        <span>Usage</span>
                        <span>Status</span>
                        <span></span>
                        <span>Inhouse $</span>
                        <span>Takout $</span>
                    </div>
                        @foreach($_productcat->productGens as $_productGen)
                            <div class="product_row actual_body" gn_prod_id="55">
                                <span class="product_name">
                                    <a href="{{ route('admin.base-info.product-menu-view', $_productGen->id) }}">{{$_productGen->product_name}}</a>
                                </span>
                                <span>
                                    <a href="javascript:void(0)" class="btn_banquet_menu_edit" gn_prod_id="{{ $_productGen->id }}">
                                        <span class="edit_icon">
                                            <svg class="svg-inline--fa fa-pencil" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="pencil" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                                <path fill="currentColor" d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z"></path>
                                            </svg>
                                        </span>
                                    </a>
                                </span>
                                @php
                                    $usageType = json_decode($_productGen->productMenus->usage_type);
                                @endphp
                                
                                <span>
                                    @foreach($usageType as $_usage_type) 
                                        @if($_usage_type == 'BI')
                                            {{ 'Banquet Inhouse' }}
                                        @elseif($_usage_type == 'BC')
                                            {{ ';Banquet Catering' }}
                                        @elseif($_usage_type == 'RI')
                                            {{ ';Restaurant Inhouse' }}
                                        @elseif($_usage_type == 'RC')
                                            {{ ';Restaurant Catering' }}
                                        @endif
                                    @endforeach 
                                </span>
                                <span>
                                    @if($_productGen->prod_status == 1)
                                        <span class="prod_status_active prod_status">{{ 'Active' }} </span>
                                    @else($_productGen->prod_status == 2)
                                        <span class="prod_status_eol prod_status">{{ 'End of Line' }} </span>
                                    @endif
                                </span>
                                <span>
                                    <span class="q_tip red_font" title="Is favorite">
                                        <svg class="svg-inline--fa fa-heart" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="heart" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                            <path fill="currentColor" d="M47.6 300.4L228.3 469.1c7.5 7 17.4 10.9 27.7 10.9s20.2-3.9 27.7-10.9L464.4 300.4c30.4-28.3 47.6-68 47.6-109.5v-5.8c0-69.9-50.5-129.5-119.4-141C347 36.5 300.6 51.4 268 84L256 96 244 84c-32.6-32.6-79-47.5-124.6-39.9C50.5 55.6 0 115.2 0 185.1v5.8c0 41.5 17.2 81.2 47.6 109.5z"></path>
                                        </svg>
                                    </span>
                                </span>
                                <span>{{$_productGen->price_rstn_inhouse?'$'.number_format($_productGen->price_rstn_inhouse, 2):''}}</span>
                                <span>{{$_productGen->price_bq_catering?'$'.number_format($_productGen->price_bq_catering, 2):''}}</span>
                            </div>
                        @endforeach
                    @endforeach
                <input type="submit" value="Export to Excel" id="all_products_edit" name="all_products_edit" class="button" fdprocessedid="3jzhx">
                <div id="pagination-links" class="pagination">
                    {{ $productMenus->links() }}
                </div>
            </span>
        </div>
    @endif

    @if(isset($wineCategories))
        <div class="cur_az_tab">
            <div>
                <span id="wine_list" class="xmlb_form">
                    <div class="card">
                        <div>
                            <span style="float: right;">
                                <a href="#">
                                    <span class="pdf_export small_button">MS Word Printout 
                                        <svg class="svg-inline--fa fa-file-word" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="file-word" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" data-fa-i2svg=""><path fill="currentColor" d="M64 0C28.7 0 0 28.7 0 64V448c0 35.3 28.7 64 64 64H320c35.3 0 64-28.7 64-64V160H256c-17.7 0-32-14.3-32-32V0H64zM256 0V128H384L256 0zM111 257.1l26.8 89.2 31.6-90.3c3.4-9.6 12.5-16.1 22.7-16.1s19.3 6.4 22.7 16.1l31.6 90.3L273 257.1c3.8-12.7 17.2-19.9 29.9-16.1s19.9 17.2 16.1 29.9l-48 160c-3 10-12 16.9-22.4 17.1s-19.8-6.2-23.2-16.1L192 336.6l-33.3 95.3c-3.4 9.8-12.8 16.3-23.2 16.1s-19.5-7.1-22.4-17.1l-48-160c-3.8-12.7 3.4-26.1 16.1-29.9s26.1 3.4 29.9 16.1z"></path></svg><!-- <i class="fas fa-file-word"></i> Font Awesome fontawesome.com -->
                                    </span>
                                </a>
                            </span>
            
                            <h2>Categories 
                                <a href="javascript:void(0)" class="add_new_wine_category">
                                    <svg class="svg-inline--fa fa-plus" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="plus" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"></path></svg><!-- <i class="fas fa-plus"></i> Font Awesome fontawesome.com -->
                                </a>  
                            </h2>
            
                            <p>Please click on a category to view the items</p>
                            <div class="wcats_wrap ui-sortable" style="display: block;">
                            @foreach($wineCategories as $key => $_wineCategory)
                                <div class="wcat_row card actual_body" wcat_id="{{ $_wineCategory->id }}">
                                    <span>{{ ++$key }}</span>
                                    <span>{{ $_wineCategory->wcat_name }}</span>
                                    <span>
                                        <span class="btn_edit_wcat btn" wcat_id="{{ $_wineCategory->id }}">
                                            <svg class="svg-inline--fa fa-pen" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="pen" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M362.7 19.3L314.3 67.7 444.3 197.7l48.4-48.4c25-25 25-65.5 0-90.5L453.3 19.3c-25-25-65.5-25-90.5 0zm-71 71L58.6 323.5c-10.4 10.4-18 23.3-22.2 37.4L1 481.2C-1.5 489.7 .8 498.8 7 505s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L421.7 220.3 291.7 90.3z"></path></svg><!-- <i class="fas fa-pen"></i> Font Awesome fontawesome.com -->
                                        </span> 
                                        <span class="btn_delete_wcat btn" wcat_id="{{ $_wineCategory->id }}">
                                            <svg class="svg-inline--fa fa-trash-can" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-can" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z"></path></svg><!-- <i class="fas fa-trash-alt"></i> Font Awesome fontawesome.com -->
                                        </span>
                                    </span>
                                </div>
                            @endforeach
                            </div>
                            <br>
                            <div class="more_filters_wrap">
                                <h3>More Filters:</h3>
                                <br>
                
                                <p>
                                    <label>Type:</label> 
                                    <span class="flt_wine_type azbd_single_choice enabled">
                                        <span value="R">Red</span>
                                        <span value="W">White</span>
                                        <span value="S">Rose</span>
                                    </span>
                                </p>
                                <p>
                                    <label>Allow:</label> 
                                    <span class="flt_allow azbd_single_choice enabled">
                                        <span value="by_glass">By the Glass</span>
                                        <span value="half_bottle">Half Bottle</span>
                                    </span>
                                </p>
                                <p>
                                    <label>Country:</label> 
                                    <span class="flt_wrap">
                                        <span class="flt_country azbd_single_choice enabled">
                                            <span value="AF">Afghanistan</span>
                                            <span value="AI">Anguilla</span>
                                            <span value="AQ">Antarctica</span>
                                            <span value="AR">Argentina</span>
                                            <span value="AU">Australia</span>
                                            <span value="CA">Canada</span>
                                            <span value="FR">France</span>
                                            <span value="IN">India</span>
                                            <span value="IT">Italy</span>
                                            <span value="NZ">New Zealand</span>
                                            <span value="ES">Spain</span>
                                            <span value="US">United States</span>
                                            <span value="ZR">Zaire</span>
                                        </span>
                                    </span>
                                </p>
                                <p>
                                <label>Region:</label> 
                                    <span class="flt_wrap">
                                        <span class="flt_region azbd_single_choice enabled"></span>
                                    </span>
                                </p>
                            </div>
                            <span class="btn_clear_all_filters big_button">Clear all Filters</span>
                        </div>
                    </div>  
                    <div class="card">
                        <div>
                            <h2>Wines</h2>
                            <div class="all_wines_wrap" style="display: block;">
                                <!-- <div class="wine_row header">
                                    <span></span>
                                    <span>Name</span>
                                    <span>Type</span>
                                    <span>Bottle</span>
                                    <span>Bin #</span>
                                    <span>Category</span>
                                    <span>Country</span>
                                    <span>Region</span>
                                    <span>Qty</span>
                                    <span>Price</span>
                                </div>
                                <div class="wine_row card actual_body">
                                    <span>1</span>
                                    <span>
                                        <a href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2672" target="_blank">test1212</a>
                                    </span>
                                    <span>White</span>
                                    <span>1 Oz</span>
                                    <span>
                                        <span class="warning">**</span>
                                    </span>
                                    <span>Rose Wines<br>White Wines</span>
                                    <span>Antarctica</span>
                                    <span>qew</span>
                                    <span>
                                        <span class="warning">0</span>
                                    </span>
                                    <span>$</span>
                                </div> -->
                                <!-- <div class="wine_row card actual_body">
                                    <span>2</span>
                                    <span>
                                        <a href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1994" target="_blank">Cape Bleue Rose (Jean-Luc Colombo) <strong>2020</strong></a>
                                    </span>
                                    <span>Rose</span>
                                    <span>750 ML</span>
                                    <span>244</span>
                                    <span>Rose Wines<br>House Wines</span>
                                    <span>France</span>
                                    <span>Provence</span>
                                    <span>
                                        <span class="warning">0</span>
                                    </span>
                                    <span>$48.00<br>Glass: $14.00</span>
                                </div>
                                <div class="wine_row card actual_body">
                                    <span>3</span>
                                    <span>
                                        <a href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1994" target="_blank">Cape Bleue Rose (Jean-Luc Colombo) <strong>2021</strong></a>
                                    </span>
                                    <span>Rose</span>
                                    <span>750 ML</span>
                                    <span>244</span>
                                    <span>Rose Wines<br>House Wines</span>
                                    <span>France</span>
                                    <span>Provence</span>
                                    <span>1</span>
                                    <span>$48.00</span>
                                </div>
                                <div class="wine_row card actual_body">
                                    <span>4</span>
                                    <span>
                                        <a href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=2681" target="_blank">test12 <strong>2024</strong></a>
                                    </span>
                                    <span>Red</span>
                                    <span>1 Liter</span>
                                    <span>212</span>
                                    <span>Rose Wines<br>White Wines</span>
                                    <span>India</span>
                                    <span>344</span>
                                    <span>
                                        <span class="warning">0</span>
                                    </span>
                                    <span>$234.00<br>Half: $24324.00<br>Glass: $324.00</span>
                                </div>
                                <div class="wine_row card actual_body">
                                    <span>5</span>
                                    <span>
                                        <a href="https://www.royalambassador.ca/db_base_info/product_liquor_view.php?gn_prod_id=1896" target="_blank">Vini Fantini Calalenta IGP Rosato <strong>2020</strong></a>
                                    </span>
                                    <span>Rose</span>
                                    <span>750 ML</span>
                                    <span>215</span>
                                    <span>Rose Wines</span>
                                    <span>Italy</span>
                                    <span>Abruzzo</span>
                                    <span>4</span>
                                    <span>$48.00</span>
                                </div> -->
                            </div>
                        </div>
                    </div>      
                </span>
            </div>
        </div>
    @endif
    @if(isset($drinks))
        <div class="cur_az_tab">
            <span id="drink_items" class="xmlb_form">
                <form method="get" id="frm_drink_items" action="{{ route('admin.base-info.product-drink-list') }}" accept-charset="utf-8" enctype="multipart/form-data">
                    <fieldset class="form_filters">
                        <legend>Search</legend> 
                        <span class="show_recs">Count: 132</span>
                        Name: <input name="cat_name" id="drink_items_CAT_NAME" type="text" maxlength="60" size="15" title="Name of this prodcut category" value="{{ request('cat_name') }}">
                        <button type="submit" class="button">Search</button>
                        <a href="{{ route('admin.base-info.product-drink-list') }}">
                            <button type="button" class="button">Show All</button>
                        </a>
                        <!-- <input type="submit" value="Search" id="drink_items_apply_filter" name="drink_items_apply_filter"> -->
                        <!-- <input type="submit" value="Show All" id="drink_items_clear_filter" name="drink_items_clear_filter"> -->
                    </fieldset>
                    <br>
                </form>

                @foreach($drinks as $_pDrink)
                    @if(count($_pDrink->productGens) > 0)
                        <div class="cat_row">{{ $_pDrink->cat_name }}</div>
                        <div class="product_row header">
                            <span></span>
                            <span>Name/Desc</span>
                            <span></span>
                            <span>Price (In-house)</span>
                            <span>Price (Takeout)</span> 
                        </div>
                        @foreach($_pDrink->productGens as $key => $_productGen)
                            <div class="product_row actual_body" gn_prod_id="{{ $_productGen->id }}">
                                <span>{{ ++$key }})</span>
                                <span>
                                    <a href="{{ route('admin.base-info.product-menu-view', $_productGen->id) }}">{{ $_productGen->product_name }} </a> 
                                    <a href="javascript:void(0)" class="btn_banquet_menu_edit" gn_prod_id="{{ $_productGen->id }}">
                                        <svg class="svg-inline--fa fa-pen" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="pen" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M362.7 19.3L314.3 67.7 444.3 197.7l48.4-48.4c25-25 25-65.5 0-90.5L453.3 19.3c-25-25-65.5-25-90.5 0zm-71 71L58.6 323.5c-10.4 10.4-18 23.3-22.2 37.4L1 481.2C-1.5 489.7 .8 498.8 7 505s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L421.7 220.3 291.7 90.3z"></path></svg><!-- <i class="fas fa-pen"></i> Font Awesome fontawesome.com -->
                                    </a>
                                </span>
                                <span>
                                    <span class="btn_delete_drink btn btn_banquet_menu_delete" gn_prod_id="{{ $_productGen->id }}">
                                        <svg class="svg-inline--fa fa-trash-can" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-can" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z"></path></svg><!-- <i class="fas fa-trash-alt"></i> Font Awesome fontawesome.com -->
                                    </span>
                                </span>
                                <span>{{$_productGen->price_rstn_inhouse?'$'.number_format($_productGen->price_rstn_inhouse, 2):''}}</span>
                                <span>{{$_productGen->price_bq_catering?'$'.number_format($_productGen->price_bq_catering, 2):''}}</span>
                            </div>
                        @endforeach
                        @foreach($_pDrink->subCategories as $_subCategory)
                         @if(!empty($_subCategory->productGens))
                            @foreach($_subCategory->productGens as  $_productGen)
                                <div class="product_row actual_body" gn_prod_id="{{ $_productGen->id }}">
                                    <span>{{ ++$key }})</span>
                                    <span>
                                        <a href="{{ route('admin.base-info.product-menu-view', $_productGen->id) }}">{{ $_productGen->product_name }} </a> ({{ $_subCategory->cat_name }})
                                        <a href="javascript:void(0)" class="btn_banquet_menu_edit" gn_prod_id="{{ $_productGen->id }}">
                                            <svg class="svg-inline--fa fa-pen" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="pen" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M362.7 19.3L314.3 67.7 444.3 197.7l48.4-48.4c25-25 25-65.5 0-90.5L453.3 19.3c-25-25-65.5-25-90.5 0zm-71 71L58.6 323.5c-10.4 10.4-18 23.3-22.2 37.4L1 481.2C-1.5 489.7 .8 498.8 7 505s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L421.7 220.3 291.7 90.3z"></path></svg><!-- <i class="fas fa-pen"></i> Font Awesome fontawesome.com -->
                                        </a>
                                    </span>
                                    <span>
                                        <span class="btn_delete_drink btn btn_banquet_menu_delete" gn_prod_id="{{ $_productGen->id }}">
                                            <svg class="svg-inline--fa fa-trash-can" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-can" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z"></path></svg><!-- <i class="fas fa-trash-alt"></i> Font Awesome fontawesome.com -->
                                        </span>
                                    </span>
                                    <span>{{$_productGen->price_rstn_inhouse?'$'.number_format($_productGen->price_rstn_inhouse, 2):''}}</span>
                                    <span>{{$_productGen->price_bq_catering?'$'.number_format($_productGen->price_bq_catering, 2):''}}</span>
                                </div>
                            @endforeach
                         @endif
                        @endforeach
                    @else
                        @foreach($_pDrink->subCategories->groupBy('lnk_top_cat') as $_subCategory)
                            <div class="cat_row">{{ $_pDrink->cat_name }}</div>
                            <div class="product_row header">
                                <span></span>
                                <span>Name/Desc</span>
                                <span></span>
                                <span>Price (In-house)</span>
                                <span>Price (Takeout)</span> 
                            </div>
                            @php $serialNumber = 1; @endphp
                            @foreach($_subCategory as $skey => $_drink)
                                @foreach($_drink->productGens as $key => $_productGen)
                                    <div class="product_row actual_body" gn_prod_id="{{ $_productGen->id }}">
                                        <span>{{ $serialNumber++  }})</span>
                                        <span>
                                            <a href="{{ route('admin.base-info.product-menu-view', $_productGen->id) }}">{{ $_productGen->product_name }} </a> ({{ $_drink->cat_name }})
                                            <a href="javascript:void(0)" class="btn_banquet_menu_edit" gn_prod_id="{{ $_productGen->id }}">
                                                <svg class="svg-inline--fa fa-pen" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="pen" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M362.7 19.3L314.3 67.7 444.3 197.7l48.4-48.4c25-25 25-65.5 0-90.5L453.3 19.3c-25-25-65.5-25-90.5 0zm-71 71L58.6 323.5c-10.4 10.4-18 23.3-22.2 37.4L1 481.2C-1.5 489.7 .8 498.8 7 505s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L421.7 220.3 291.7 90.3z"></path></svg><!-- <i class="fas fa-pen"></i> Font Awesome fontawesome.com -->
                                            </a>
                                        </span>
                                        <span>
                                            <span class="btn_delete_drink btn btn_banquet_menu_delete" gn_prod_id="{{ $_productGen->id }}">
                                                <svg class="svg-inline--fa fa-trash-can" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-can" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z"></path></svg><!-- <i class="fas fa-trash-alt"></i> Font Awesome fontawesome.com -->
                                            </span>
                                        </span>
                                        <span>{{$_productGen->price_rstn_inhouse?'$'.number_format($_productGen->price_rstn_inhouse, 2):''}}</span>
                                        <span>{{$_productGen->price_bq_catering?'$'.number_format($_productGen->price_bq_catering, 2):''}}</span>
                                    </div>
                                @endforeach
                            @endforeach
                            
                        @endforeach
                    @endif
                @endforeach
            </span>
        </div>
    @endif

    @if(isset($productcats))
        <div class="cur_az_tab">
            <div class="left_col">
                <span id="product_cat_list" class="xmlb_form">
                    <form method="get" id="frm_product_cat_list" action="{{ route('admin.base-info.product-cat-list.index') }}" accept-charset="utf-8" enctype="multipart/form-data">
                        <h1>Product Categories 
                            <a href="javascript:void(0)" class="add_new_product_category "><svg class="svg-inline--fa fa-plus" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="plus" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"></path></svg><!-- <i class="fas fa-plus"></i> Font Awesome fontawesome.com --></a>
                        </h1>
                        <fieldset class="form_filters">
                            <legend>Search</legend>
                            <span class="show_recs">Showing Records: 1 to {{ count($productcats) }} of {{ count($productcats) }}</span>
                            Type: 
                            <select name="cat_type" id="product_cat_list_cat_type">
                                <option value="">--All--</option>
                                <option value="L" {{ ($_REQUEST['cat_type'] == 'L')?'selected':'' }}>Liquor</option>
                                <option value="M" {{ ($_REQUEST['cat_type'] == 'M')?'selected':'' }}>Menu Item</option>
                                <option value="D" {{ ($_REQUEST['cat_type'] == 'D')?'selected':'' }}>Drink</option>
                            </select>
                            Active: 
                            <select name="is_active" id="product_cat_list_is_active">
                                <option value="">--All--</option>
                                <option value="1" {{ ($_REQUEST['is_active'] == 1)?'selected':'' }}>Yes</option>
                                <option value="0" {{ ($_REQUEST['is_active'] == 0)?'selected':'' }}>No</option>
                            </select>
                        </fieldset>
                    </form>
                    <br>
                    <table class="bound product-list">
                        <thead>
                            <tr>
                                <th>
                                    <a href="#" title="Click to sort by Name">Name</a>
                                </th>
                                <th>
                                    <a href="#" title="Click to sort by Type">Type</a>
                                </th>
                                <th>
                                    <a href="#" title="Click to sort by Active">Active</a>
                                </th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($productcats as $_productcat)
                            <tr class="cat_wrap actual_body">
                                <td>
                                    <strong>
                                        <span class="cat_name">{{ $_productcat->cat_name }}</span> 
                                        <span class="btn btn_add_sub_cat" style="display: none;" cat_name = "{{ $_productcat->cat_name }}"cat_id= "{{ $_productcat->id }}" cat_type="{{ $_productcat->cat_type }}">Add Sub-category 
                                            <svg class="svg-inline--fa fa-plus" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="plus" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"></path></svg><!-- <i class="fas fa-plus"></i> Font Awesome fontawesome.com -->
                                        </span>
                                    </strong>
                                    @php
                                        $subcats = App\Models\ProductCat::where('lnk_top_cat', $_productcat->id)->get();
                                    @endphp
                                    @if(count($subcats) > 0)
                                        <br>
                                            Sub-categories:
                                        <br>
                                    @endif
                                    @foreach($subcats as $_subcat)
                                        <span class="scat_wrap" scat_id="45">{{ $_subcat->cat_name }} 
                                            <a href="javascript:void(0)" class="btn_edit_sub_cat" product_cat_id = "{{ $_subcat->id }}">
                                                <svg class="svg-inline--fa fa-pencil" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="pencil" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z"></path></svg><!-- <i class="fas fa-pencil-alt"></i> Font Awesome fontawesome.com -->
                                            </a>
                                            <span class="btn_delete_sub_cat btn" confirm="Delete this sub-category?" product_cat_id = "{{ $_subcat->id }}">
                                                <svg class="svg-inline--fa fa-trash-can" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-can" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z"></path></svg><!-- <i class="fas fa-trash-alt"></i> Font Awesome fontawesome.com -->
                                            </span>
                                        </span>
                                    @endforeach
                                </td>
                                <td>
                                    @if($_productcat->cat_type == 'M')
                                        {{ 'Menu Item' }}
                                    @elseif($_productcat->cat_type == 'L')
                                        {{ 'Liquor' }}
                                    @elseif($_productcat->cat_type == 'D')
                                        {{ 'Drink' }}
                                    @endif
                                </td>
                                <td>
                                    @if($_productcat->is_active == 1)
                                        {{ 'Yes' }}
                                    @elseif($_productcat->is_active == 0)
                                        {{ 'No' }}
                                    @endif
                                </td>
                                <td class="no_wrap">
                                    <a href="javascript:void(0)" class="edit_product_category" product_cat_id = "{{ $_productcat->id }}">
                                        <svg class="svg-inline--fa fa-pen btn" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="pen" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M362.7 19.3L314.3 67.7 444.3 197.7l48.4-48.4c25-25 25-65.5 0-90.5L453.3 19.3c-25-25-65.5-25-90.5 0zm-71 71L58.6 323.5c-10.4 10.4-18 23.3-22.2 37.4L1 481.2C-1.5 489.7 .8 498.8 7 505s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L421.7 220.3 291.7 90.3z"></path></svg><!-- <i class="fas fa-pen btn"></i> Font Awesome fontawesome.com -->
                                    </a>
                                    <span class="btn_delete_prod_cat btn" product_cat_id = "{{ $_productcat->id }}" confirm="Delete this category?">
                                        <svg class="svg-inline--fa fa-trash-can" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-can" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z"></path></svg><!-- <i class="fas fa-trash-alt"></i> Font Awesome fontawesome.com -->
                                    </span>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <p>
                    </p>  
                </span>
            </div>
            <div class="left_col">
                <span id="product_cats_menu" class="xmlb_form">
                    <form method="post" id="frm_product_cats_menu" action="" accept-charset="utf-8" enctype="multipart/form-data">

                        <input type="hidden" name="PAGE_ID" value="product_cat_list">
                        <input type="hidden" name="product_cats_menu" value="product_cats_menu">
                        <h1>Manage Food Categories</h1>

                        <div class="card">
                            <div>
                                <h2>Banquet Inhouse</h2>
                                <div class="bq_inhouse_cats_wrap cats_wrap ui-sortable" style="display: block;">
                                    <p class="cat_row header">
                                        <span></span>
                                        <span>Id</span>
                                        <span>Order</span>
                                        <span>Name</span>
                                        <span>Count</span>
                                    </p>
                                    <p class="cat_row actual_body" cat_id="4203">
                                        <span>1)</span>
                                        <span>4203</span>
                                        <span>1</span>
                                        <span>South Asian (Gold Breakfast)</span>
                                        <span>8</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="card">
                            <div>
                                <h2>Banquet Catering</h2>
                                <div class="bq_catering_cats_wrap cats_wrap ui-sortable" style="display: block;">
                                    <p class="cat_row header">
                                        <span></span>
                                        <span>Id</span>
                                        <span>Order</span>
                                        <span>Name</span>
                                        <span>Count</span>
                                    </p>
                                    <p class="cat_row actual_body" cat_id="80">
                                        <span>1)</span>
                                        <span>80</span>
                                        <span>1</span>
                                        <span>Family Combos</span>
                                        <span>3</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <br>      
                        <div class="card">
                            <div>
                                <h2>Consulate Catering/Inhouse</h2>
                                <div class="rstn_cats_wrap cats_wrap ui-sortable" style="display: block;">
                                    <p class="cat_row header">
                                        <span></span>
                                        <span>Id</span>
                                        <span>Order</span>
                                        <span>Name</span>
                                        <span>Count</span>
                                    </p>
                                    <p class="cat_row actual_body" cat_id="80">
                                        <span>1)</span>
                                        <span>80</span>
                                        <span>1</span>
                                        <span>Family Combos</span>
                                        <span>3</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </form>
                </span>
            </div>
        </div>
    @endif

    @if(@isset($productArchiveMenus))
        <div class="cur_az_tab">
            <span id="all_products" class="xmlb_form">
                <form method="get" id="frm_all_products" action="{{ route('admin.base-info.product-archive-list') }}" accept-charset="utf-8" enctype="multipart/form-data">
                    <fieldset class="form_filters">
                        <legend>Search</legend> 
                        <span class="show_recs">
                            <span id="records-display" ></span> of <span id="total_records"> {{$allRecords}} </span> | Show:
                            <select id="perPageSelect" class="max-100" name="pages">
                                <option value="10" {{ request('pages') == 10?'selected':''}}>10</option>
                                <option value="30" {{ request('pages') == 30?'selected':''}}>30</option>
                                <option value="1" {{ request('pages') == 50?'selected':''}} @if(request('pages') == null){{'selected'}}@endif>50</option>
                                <option value="100" {{ request('pages') == 100?'selected':''}}>100</option>
                            </select>
                        </span>
                        Name: <input name="product_name" id="all_products_PRODUCT_NAME" type="text" value="{{ request('product_name')}}" maxlength="120" size="15" title="Product name">
                        Category:
                        <select name="lnk_cat" id="all_products_LNK_CAT">
                            <option value="">--All--</option>
                            @foreach($productCats as $_productCat)
                                <option value="{{ $_productCat->id }}" {{ request('lnk_cat') == $_productCat->id?'selected':''}}>{{ $_productCat->cat_name }}</option>
                            @endforeach
                        </select>
                        Usage:
                        <select name="usage_type" id="all_products_USAGE_TYPE" multiple="multiple">
                            <option value="BI">Banquet Inhouse</option>
                            <option value="BC">Banquet Catering</option>
                            <option value="RI">Restaurant Inhouse</option>
                            <option value="RC">Restaurant Catering</option>
                        </select>
                        Specialty Options:
                        <select name="specialty_options" id="all_products_SPECIALTY_OPTIONS" multiple="multiple">
                            <option value="VT">Vegetarian</option>
                            <option value="VN">Vegan</option>
                            <option value="GF">Gluten Free</option>
                            <option value="NF">Nut Free</option>
                            <option value="DA">Dairy Allergy</option>
                        </select>
                        <button type="submit" class="button font-bold radius-0">Search</button>
                        <a href="{{ route('admin.base-info.product-archive-list') }}">
                            <button type="button" class="button font-bold radius-0">Show All</button>
                        </a>
                    </fieldset>
                </form>
                <br>            
                @foreach($productArchiveMenus as $_productcat)
                    <div class="cat_row">{{ $_productcat->cat_name  }}</div>
                    <div class="product_row header">
                        <span>Name/Desc</span>
                        <span></span>
                        <span>Usage</span>
                        <span>Status</span>
                        <span></span>
                        <span>Inhouse $</span>
                        <span>Takout $</span>
                    </div>
                        @foreach($_productcat->ArchivedProductGens as $_productGen)
                            <div class="product_row actual_body" gn_prod_id="55">
                                <span class="product_name">
                                    <a href="{{ route('admin.base-info.product-menu-view', $_productGen->id) }}">{{$_productGen->product_name}}</a>
                                </span>
                                <span>
                                    <a href="javascript:void(0)" class="btn_banquet_menu_edit" gn_prod_id="{{ $_productGen->id }}">
                                        <span class="edit_icon">
                                            <svg class="svg-inline--fa fa-pencil" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="pencil" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                                <path fill="currentColor" d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z"></path>
                                            </svg>
                                        </span>
                                    </a>
                                </span>
                                @php
                                    $usageType = json_decode($_productGen->productMenus->usage_type);
                                @endphp
                                
                                <span>
                                    @foreach($usageType as $_usage_type) 
                                        @if($_usage_type == 'BI')
                                            {{ 'Banquet Inhouse' }}
                                        @elseif($_usage_type == 'BC')
                                            {{ ';Banquet Catering' }}
                                        @elseif($_usage_type == 'RI')
                                            {{ ';Restaurant Inhouse' }}
                                        @elseif($_usage_type == 'RC')
                                            {{ ';Restaurant Catering' }}
                                        @endif
                                    @endforeach 
                                </span>
                                <span>
                                    @if($_productGen->prod_status == 1)
                                        <span class="prod_status_active prod_status">{{ 'Active' }} </span>
                                    @else($_productGen->prod_status == 2)
                                        <span class="prod_status_eol prod_status">{{ 'End of Line' }} </span>
                                    @endif
                                </span>
                                <span>
                                    <span class="q_tip red_font" title="Is favorite">
                                        <svg class="svg-inline--fa fa-heart" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="heart" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                            <path fill="currentColor" d="M47.6 300.4L228.3 469.1c7.5 7 17.4 10.9 27.7 10.9s20.2-3.9 27.7-10.9L464.4 300.4c30.4-28.3 47.6-68 47.6-109.5v-5.8c0-69.9-50.5-129.5-119.4-141C347 36.5 300.6 51.4 268 84L256 96 244 84c-32.6-32.6-79-47.5-124.6-39.9C50.5 55.6 0 115.2 0 185.1v5.8c0 41.5 17.2 81.2 47.6 109.5z"></path>
                                        </svg>
                                    </span>
                                </span>
                                <span>{{$_productGen->price_rstn_inhouse?'$'.number_format($_productGen->price_rstn_inhouse, 2):''}}</span>
                                <span>{{ $_productGen->price_bq_catering?'$'.number_format($_productGen->price_bq_catering, 2):''}}</span>
                            </div>
                        @endforeach
                    @endforeach
                <input type="submit" value="Export to Excel" id="all_products_edit" name="all_products_edit" class="button" fdprocessedid="3jzhx">
                <div id="pagination-links" class="pagination">
                    {{ $productArchiveMenus->links() }}
                </div>
            </span>
        </div>
    @endif
</div>
<div class="ui-widget-overlay ui-front d-none"></div>
@if(isset($productMenus) || isset($drinks) || isset($productArchiveMenus))
    <!-- add New Banquet Menu Module  -->
    <div class="ui-dialog ui-widget1 ui-widget-content ui-corner-all ui-front ui-draggable ui-resizable ajax_obj create-popup-form ui-draggable-add-new-banquet-menu d-none "
        tabindex="-1" style="width: 1360px; top:0px; left: 0px;" role="dialog" aria-describedby="ajax_obj"
        aria-labelledby="ui-id-15">
        <div class="ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix">
            <span id="ui-id-15" class="ui-dialog-title">Banquet Menu Add/Edit</span>
            <button class="ui-button ui-widget1 ui-state-default ui-corner-all ui-button-icon-only ui-dialog-titlebar-close add-new-banquet-menu-close"
                role="button" aria-disabled="false" title="close">
                <span class="ui-button-icon-primary ui-icon ui-icon-closethick"></span>
                <span class="ui-button-text">close</span>
            </button>
        </div>
        <div id="ajax_obj" class="ui-dialog-content ui-widget-content create-form-content" style="width: auto">
            <span id="product_menu_new" class="xmlb_form">
                <form method="post" id="frm_product_menu_new" action="{{ route('admin.base-info.all-products.store') }}" accept-charset="utf-8" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="product_type">
                    <h2>New Banquet Menu</h2>
                    <fieldset>
                        <legend>Main Info</legend>
                        <p>
                            <label>Name:</label>
                            <span class="element">
                                <input id="prod_name_regular" name="product_name" type="text" maxlength="120" size="80" title="Product name" fdprocessedid="a3wuh5">
                            </span>
                            <span class="mand_sign">*</span>
                        </p>
                        <p>
                            <label>Name for Catering:</label>
                            <span class="element">
                                <input id="prod_name_catering" name="prod_name_catering" type="text" maxlength="120" size="80" title="Name of catering if needed" fdprocessedid="ecdzsu">
                            </span>
                            <span class="mand_sign"></span> 
                            <span class="btn btn_copy_regular_name" title="Copy regular">
                                <svg class="svg-inline--fa fa-copy" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="copy" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M272 0H396.1c12.7 0 24.9 5.1 33.9 14.1l67.9 67.9c9 9 14.1 21.2 14.1 33.9V336c0 26.5-21.5 48-48 48H272c-26.5 0-48-21.5-48-48V48c0-26.5 21.5-48 48-48zM48 128H192v64H64V448H256V416h64v48c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V176c0-26.5 21.5-48 48-48z"></path></svg><!-- <i class="fas fa-copy"></i> Font Awesome fontawesome.com -->
                            </span>
                        </p>
                                
                        <p>
                            <label>Numbers Served:</label>
                            <span class="element">
                                <input id="product_menu_new_numbers_served" name="numbers_served" type="text" maxlength="2" size="2" value="1" title="Sometimes we have products say as a tray that serves more than one person. In that case this shows the number and is used by kitchen and also when calculating required material" fdprocessedid="tj6hq">
                            </span>
                            <span class="mand_sign"></span>
                            <label class="auto_width">Pieces Per Serving:</label>
                            <span class="element">
                                <input id="product_menu_new_pieces_per_serving" name="pieces_per_serving" type="text" maxlength="2" size="2" value="1" title="Pieces per serving is used for items like bread. Say for each serving, we need two pieces of garlic bread so this way we calculate how many of each piece the kitchen should make" fdprocessedid="5y4u54">
                            </span>
                            <span class="mand_sign">*</span>
                            <label class="auto_width">Size:</label>
                            <span class="element">
                                <select id="product_menu_new_product_size" name="product_size" fdprocessedid="58ufq">
                                    <option value="">----</option>
                                    <option value="9">3 oz.</option>
                                    <option value="1">4 oz.</option>
                                    <option value="2">6 oz.</option>
                                    <option value="3">8 oz.</option>
                                    <option value="4">Supreme</option>
                                    <option value="5">Single Portion</option>
                                    <option value="6">Dual Portion</option>
                                    <option value="7">Combo</option>
                                    <option value="8">Combo Portion</option>
                                </select>
                            </span>
                            <span class="mand_sign"></span>
                        </p>
                        <p>
                            <label>Specialty Options:</label>
                            <span class="element">
                                <span class="mselect_item">
                                    <input type="checkbox" value="VT" name="specialty_options[]"> Vegetarian
                                </span>
                                <span class="mselect_item">
                                    <input type="checkbox" value="VN" name="specialty_options[]"> Vegan
                                </span>
                                <span class="mselect_item">
                                    <input type="checkbox" value="GF" name="specialty_options[]"> Gluten Free
                                </span>
                                <span class="mselect_item">
                                    <input type="checkbox" value="NF" name="specialty_options[]"> Nut Free
                                </span>
                                <span class="mselect_item">
                                    <input type="checkbox" value="DA" name="specialty_options[]"> Dairy Allergy
                                </span>
                            </span>
                            <span class="mand_sign"></span>
                        </p>
                        <p>
                            <label>Category:</label>
                            <span class="element">
                                <select id="product_menu_new_lnk_cat" name="lnk_cat" fdprocessedid="amdw1g">
                                    <option value="" selected="selected">----</option>
                                    @foreach($productCats as $_productCat)
                                        <option value="{{ $_productCat->id }}">{{ $_productCat->cat_name }}</option>
                                        @foreach($_productCat->subCategories as $_subCategory)
                                            <option value="{{ $_subCategory->id }}">{{ $_productCat->cat_name }} -:- {{ $_subCategory->cat_name }}</option>
                                        @endforeach
                                    @endforeach
                                </select>
                            </span>
                            <span class="mand_sign">*</span>
                        </p>
                        <p class="checkboxes_wrap">
                            <label> </label>
                            <span class="element">
                                <input id="product_menu_new_is_combo" name="is_combo" type="checkbox">
                            </span>
                            <strong>Is Combo</strong>
                            <span class="element">
                                <input id="product_menu_new_is_line_item" name="is_line_item" type="checkbox">
                            </span>
                            <strong>Is Line Item</strong>
                            <span class="element">
                                <input id="product_menu_new_combo_use_only" name="combo_use_only" type="checkbox">
                            </span>
                            <strong>For Combo Use Only</strong>
                        </p>
                        <p>
                            <label>Unit Of Measure:</label>
                            <span class="element">
                                <select id="product_menu_new_unit_of_measure" name="unit_of_measure" fdprocessedid="74eman">
                                    <option value="">----</option>
                                    <option value="1" selected="selected">Each</option>
                                    <option value="2">Platter</option>
                                    <option value="3">Tray</option>
                                    <option value="4">Litre</option>
                                    <option value="5">Pound</option>
                                    <option value="6">Pound</option>
                                </select>
                            </span>
                            <span class="mand_sign">*</span>
                            <label class="auto_width" style="margin-left: .6em;">Favorite:</label>
                            <span class="element">
                                <select id="product_menu_new_favorite_status" name="favorite_status" fdprocessedid="alatcq">
                                    <option value="">----</option>
                                    <option value="1">No</option>
                                    <option value="2" selected="selected">Yes</option>
                                </select>
                            </span>
                            <span class="mand_sign">*</span>
                        </p>
                        <p>
                            <label>Description:</label>
                            <span class="element">
                                <textarea id="product_menu_new_prod_desc" name="prod_desc" cols="68" rows="6" title="Special description or remarks about the product" maxlength="4000"></textarea>
                            </span>
                            <span class="mand_sign"></span>
                        </p>
                        <p>
                            <label>Usage:</label>
                            <span class="short_help"></span>
                            <span class="element">
                                <span class="mselect_item">
                                    <input type="checkbox" value="BI" name="usage_type[]"> Banquet Inhouse
                                </span>
                                <span class="mselect_item">
                                    <input type="checkbox" value="BC" name="usage_type[]"> Banquet Catering</span>
                                    <span class="mselect_item">
                                        <input type="checkbox" value="RI" name="usage_type[]"> Restaurant Inhouse
                                    </span>
                                    <span class="mselect_item">
                                        <input type="checkbox" value="RC" name="usage_type[]"> Restaurant Catering
                                    </span>
                                </span>
                                <span class="mand_sign">*</span>
                            </p>
                            <fieldset>
                                <legend>Prices</legend>
                                <p>
                                    <label>Sell Price RA Inhouse:</label>
                                    <span class="element">
                                        <input id="product_menu_new_price_bq_inhouse" name="price_bq_inhouse" type="number" step="0.01" maxlength="9" title="Banquet price for inhouse events" fdprocessedid="fhsqk8">
                                    </span>
                                    <span class="mand_sign"></span>
                                    <label class="auto_width">Sale Price RA Catering:</label>
                                    <span class="element">
                                        <input id="product_menu_new_price_bq_catering" name="price_bq_catering" type="number" step="0.01" maxlength="9" title="Banquet price for catering  events" fdprocessedid="qojwt">
                                    </span>
                                    <span class="mand_sign"></span>
                                </p>
                                <p>
                                    <label>CR Inhouse:</label>
                                    <span class="element">
                                        <input id="product_menu_new_price_rstn_inhouse" name="price_rstn_inhouse" type="number" step="0.01" maxlength="9" title="Restaurant price for inhouse events" fdprocessedid="ku1hmf">
                                    </span>
                                    <span class="mand_sign"></span>
                                    <label class="auto_width">CR Catering:</label>
                                    <span class="element">
                                        <input id="product_menu_new_price_rstn_catering" name="price_rstn_catering" type="number" step="0.01" maxlength="9" title="Restaurant price for catering events" fdprocessedid="sibh6">
                                    </span>
                                    <span class="mand_sign"></span>
                                </p>
                            </fieldset>
                    </fieldset>
                    <div class="">
                        <button class="button font-bold radius-0 btn_new_facility" type="submit" id="product_menu_new_save">Save</button>
                        <!-- <input type="submit" value="Save" id="product_menu_new_save" name="product_menu_new_save" class="button"> -->
                    </div>
                </form>
            </span>
        </div>
    </div>

    <!-- Edit Banquent Menu Module -->

    <div class="ui-dialog ui-widget1 ui-widget-content ui-corner-all ui-front ui-draggable ui-resizable ajax_obj create-popup-form ui-draggable-edit-banquet-menu d-none "
        tabindex="-1" style="width: 1360px; top:0px; left: 0px;" role="dialog" aria-describedby="ajax_obj"
        aria-labelledby="ui-id-15">
        <div class="ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix">
            <span id="ui-id-15" class="ui-dialog-title">Banquet Menu Add/Edit</span>
            <button class="ui-button ui-widget1 ui-state-default ui-corner-all ui-button-icon-only ui-dialog-titlebar-close edit-banquet-menu-close"
                role="button" aria-disabled="false" title="close">
                <span class="ui-button-icon-primary ui-icon ui-icon-closethick"></span>
                <span class="ui-button-text">close</span>
            </button>
        </div>
        <div id="ajax_obj" class="ui-dialog-content ui-widget-content create-form-content" style="width: auto">
            <span id="product_menu_edit_main" class="xmlb_form">
                <form method="post" id="frm_product_menu_edit_main" action="{{ route('admin.base-info.all-products.update') }}" accept-charset="utf-8" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="gn_prod_id" value="">
                    <h2>This is the Main Product</h2>
                    <fieldset>
                        <legend>Main Info</legend>
                        <p>
                            <label>Category:</label>
                            <span class="element">
                                <select id="product_menu_edit_main_lnk_cat" name="lnk_cat" fdprocessedid="6anqjb">
                                    @foreach($productCats as $_productCat)
                                        <option value="{{ $_productCat->id }}">{{ $_productCat->cat_name }}</option>
                                        @foreach($_productCat->subCategories as $_subCategory)
                                            <option value="{{ $_subCategory->id }}">{{ $_productCat->cat_name }} -:- {{ $_subCategory->cat_name }}</option>
                                        @endforeach
                                    @endforeach
                                </select>
                            </span>
                            <span class="mand_sign">*</span>
                        </p>
                        <p>
                            <label>Name:</label>
                            <span class="element">
                                <input id="prod_name_regular" name="product_name" type="text" maxlength="120" size="80" value="" title="Product name" fdprocessedid="utl9vq">
                            </span>
                            <span class="mand_sign">*</span>
                        </p>
                        <p>
                            <label>Name for Catering:</label>
                            <span class="element">
                                <input id="prod_name_catering" name="prod_name_catering" type="text" maxlength="120" size="80" value="" title="Name of catering if needed" fdprocessedid="4qsn26">
                            </span>
                            <span class="mand_sign"></span> 
                            <span class="btn btn_copy_regular_name" title="Copy regular">
                                <svg class="svg-inline--fa fa-copy" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="copy" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M272 0H396.1c12.7 0 24.9 5.1 33.9 14.1l67.9 67.9c9 9 14.1 21.2 14.1 33.9V336c0 26.5-21.5 48-48 48H272c-26.5 0-48-21.5-48-48V48c0-26.5 21.5-48 48-48zM48 128H192v64H64V448H256V416h64v48c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V176c0-26.5 21.5-48 48-48z"></path></svg><!-- <i class="fas fa-copy"></i> Font Awesome fontawesome.com -->
                            </span>
                        </p>
                
                        <p>
                            <label>Numbers Served:</label>
                            <span class="element">
                                <input id="product_menu_edit_main_numbers_served" name="numbers_served" type="text" maxlength="2" size="2" value="" title="Sometimes we have products say as a tray that serves more than one person. In that case this shows the number and is used by kitchen and also when calculating required material" fdprocessedid="aa7gfk">
                            </span>
                            <span class="mand_sign"></span>
                            <label class="auto_width">Pieces Per Serving:</label>
                            <span class="element">
                                <input id="product_menu_edit_main_pieces_per_serving" name="pieces_per_serving" type="text" maxlength="2" size="" value="1" title="Pieces per serving is used for items like bread. Say for each serving, we need two pieces of garlic bread so this way we calculate how many of each piece the kitchen should make" fdprocessedid="4vs4pq">
                            </span>
                            <span class="mand_sign">*</span>
                            <label class="auto_width">Size:</label>
                            <span class="element">
                                <select id="product_menu_edit_main_product_size" name="product_size" fdprocessedid="kfj15">
                                    <option value="">----</option>
                                    <option value="9">3 oz.</option>
                                    <option value="1">4 oz.</option>
                                    <option value="2">6 oz.</option>
                                    <option value="3">8 oz.</option>
                                    <option value="4">Supreme</option>
                                    <option value="5">Single Portion</option>
                                    <option value="6">Dual Portion</option>
                                    <option value="7">Combo</option>
                                    <option value="8">Combo Portion</option>
                                </select>
                            </span>
                            <span class="mand_sign"></span>
                        </p>
                        <p>
                            <label>Specialty Options:</label>
                            <span class="element">
                                <span class="mselect_item">
                                    <input type="checkbox" value="VT" name="specialty_options[]"> Vegetarian
                                </span>
                                <span class="mselect_item">
                                    <input type="checkbox" value="VN" name="specialty_options[]"> Vegan
                                </span>
                                <span class="mselect_item">
                                    <input type="checkbox" value="GF" name="specialty_options[]"> Gluten Free
                                </span>
                                <span class="mselect_item">
                                    <input type="checkbox" value="NF" name="specialty_options[]"> Nut Free
                                </span>
                                <span class="mselect_item">
                                    <input type="checkbox" value="DA" name="specialty_options[]"> Dairy Allergy
                                </span>
                            </span>
                            <span class="mand_sign"></span>
                        </p>
                        <p class="checkboxes_wrap"><label> </label>
                            <span class="element">
                                <input id="product_menu_edit_main_is_combo" name="is_combo" type="checkbox">
                            </span>
                            <strong>Is Combo</strong>
                            <span class="element">
                                <input id="product_menu_edit_main_is_line_item" name="is_line_item" type="checkbox">
                            </span>
                            <strong>Is Line Item</strong>
                            <span class="element">
                                <input id="product_menu_edit_main_combo_use_only" name="combo_use_only" type="checkbox">
                            </span>
                            <strong>For Combo Use Only</strong>
                        </p>
                        <p>
                            <label>Status:</label>
                            <span class="element">
                                <select id="product_menu_edit_main_prod_status" name="prod_status" fdprocessedid="7xyytq">
                                    <option value="1">Active</option>
                                    <option value="2">End of Line</option>
                                </select>
                            </span>
                            <span class="mand_sign">*</span>
                            <label class="auto_width">Unit Of Measure:</label>
                            <span class="element">
                                <select id="product_menu_edit_main_unit_of_measure" name="unit_of_measure" fdprocessedid="f83xy7">
                                    <option value="1">Each</option>
                                    <option value="2">Platter</option>
                                    <option value="3">Tray</option>
                                    <option value="4">Litre</option>
                                    <option value="5">Pound</option>
                                    <option value="6">Pound</option>
                                </select>
                            </span>
                            <span class="mand_sign">*</span>
                            <label class="auto_width" style="margin-left: .6em;">Favorite:</label>
                            <span class="element">
                                <select id="product_menu_edit_main_favorite_status" name="favorite_status" fdprocessedid="17ynmp">
                                    <option value="1">No</option>
                                    <option value="2">Yes</option>
                                </select>
                            </span>
                            <span class="mand_sign">*</span>
                        </p>
                        <p>
                            <label>Show Order:</label>
                            <span class="element">
                                <input id="product_menu_edit_main_show_order" name="show_order" type="text" maxlength="4" size="3" value="" title="Sometimes we need special ordering for itesms. Specially for dependant products on the catering web site. In such cases, this column provides that show order" fdprocessedid="k10886">
                            </span>
                            <span class="mand_sign">*</span>
                        </p>
                        <p>
                            <label>Description:</label>
                            <span class="element">
                                <textarea id="product_menu_edit_main_prod_desc" name="prod_desc" cols="68" rows="6" title="Special description or remarks about the product" maxlength="4000"></textarea>
                            </span>
                            <span class="mand_sign"></span>
                        </p>
                        <p>
                            <label>Usage:</label>
                            <span class="short_help"></span>
                            <span class="element">
                                <span class="mselect_item">
                                    <input type="checkbox" value="BI" name="usage_type[]"> Banquet Inhouse
                                </span>
                                <span class="mselect_item">
                                    <input type="checkbox" value="BC" name="usage_type[]"> Banquet Catering
                                </span>
                                <span class="mselect_item selected">
                                    <input type="checkbox" value="RI" name="usage_type[]"> Restaurant Inhouse
                                </span>
                                <span class="mselect_item">
                                    <input type="checkbox" value="RC" name="usage_type[]"> Restaurant Catering
                                </span>
                            </span>
                            <span class="mand_sign">*</span>
                        </p>
                        <fieldset>
                            <legend>Prices</legend>
                            <p>
                                <label>Cost:</label>
                                <span class="element">
                                    <input id="product_menu_edit_main_avg_cost" name="avg_cost" type="number" step="0.01" maxlength="10" title="Cost of this item for reporting purposes" fdprocessedid="vdogy">
                                </span>
                                <span class="mand_sign"></span>
                            </p>
                            <p>
                                <label>Sell Price RA Inhouse:</label>
                                <span class="element">
                                    <input id="product_menu_edit_main_price_bq_inhouse" name="price_bq_inhouse" type="number" step="0.01" maxlength="9" title="Banquet price for inhouse events" fdprocessedid="d0ojhi">
                                </span>
                                <span class="mand_sign"></span>
                                <label class="auto_width">Sale Price RA Catering:</label>
                                <span class="element">
                                    <input id="product_menu_edit_main_price_bq_catering" name="price_bq_catering" type="number" step="0.01" maxlength="9" title="Banquet price for catering  events" fdprocessedid="8vekm">
                                </span>
                                <span class="mand_sign"></span>
                            </p>
                            <p>
                                <label>CR Inhouse:</label>
                                <span class="element">
                                    <input id="product_menu_edit_main_price_rstn_inhouse" name="price_rstn_inhouse" type="number" step="0.01" maxlength="9" value="" title="Restaurant price for inhouse events" fdprocessedid="cc77k8">
                                </span>
                                <span class="mand_sign"></span>
                                <label class="auto_width">CR Catering:</label>
                                <span class="element">
                                    <input id="product_menu_edit_main_price_rstn_catering" name="price_rstn_catering" type="number" step="0.01" maxlength="9" title="Restaurant price for catering events" fdprocessedid="4r9dff">
                                </span>
                                <span class="mand_sign">

                                </span>
                            </p>
                        </fieldset>
                    </fieldset>
      
                    <div class="form_footer">
                        <input type="submit" value="Save" id="product_menu_edit_main_save" name="product_menu_edit_main_save" class="button">
                    </div>
                </form>
            </span>
        </div>
    </div>
@endif

@if(isset($productcats))
    <!-- add New Product Category Module  -->
    <div class="ui-dialog ui-widget1 ui-widget-content ui-corner-all ui-front ui-draggable ui-resizable ajax_obj create-popup-form ui-draggable-add-new-product-category d-none "
        tabindex="-1" style="width: 600px; top:54.5px; left: 328px;" role="dialog" aria-describedby="ajax_obj"
        aria-labelledby="ui-id-15">
        <div class="ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix">
            <span id="ui-id-15" class="ui-dialog-title">Add/Edit Product Category</span>
            <button class="ui-button ui-widget1 ui-state-default ui-corner-all ui-button-icon-only ui-dialog-titlebar-close add-new-product-category-close"
                role="button" aria-disabled="false" title="close">
                <span class="ui-button-icon-primary ui-icon ui-icon-closethick"></span>
                <span class="ui-button-text">close</span>
            </button>
        </div>
        <div id="ajax_obj" class="ui-dialog-content ui-widget-content create-form-content" style="width: auto">
            <span id="product_cat_new" class="xmlb_form">
                <form method="post" id="frm_product_cat_new" action="{{ route('admin.base-info.product-cat-list.store') }}" accept-charset="utf-8" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="product_cat_id" value="">
                    <p class="cat_type_hide_and_show d-none">
                        <label>Type:</label>
                        <span class="element">
                            <select id="product_cat_new_cat_type" name="cat_type" fdprocessedid="ifgop9">
                                <option value="" selected="selected">----</option>
                                <option value="L">Liquor</option>
                                <option value="M">Menu Item</option>
                                <option value="D">Drink</option>
                            </select>
                        </span>
                        <span class="mand_sign">*</span>
                    </p>
                    <p>
                        <label>Name:</label>
                        <span class="short_help"></span>
                        <span class="element">
                            <input id="product_cat_new_cat_name" name="cat_name" type="text" maxlength="60" size="40" title="Name of this prodcut category" fdprocessedid="rb3x7">
                        </span>
                        <span class="mand_sign">*</span>
                    </p>
                    <p>
                        <label>Show Order:</label>
                        <span class="element">
                            <input id="product_cat_new_show_order" name="show_order" type="text" maxlength="2" size="2" fdprocessedid="vfd6m">
                        </span>
                        <span class="mand_sign">*</span>
                    </p>
                    <p class="cat_type_active d-none">
                        <label>Active:</label>
                        <span class="short_help"></span>
                        <span class="element">
                            <select id="product_subcat_new_is_active" name="is_active" fdprocessedid="7ht16">
                                <option value="1" selected="selected">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </span>
                    </p>
                    <p>
                        <label>Extra Notes:</label>
                        <span class="element">
                            <textarea id="product_cat_new_extra_notes" name="extra_notes" cols="40" rows="6" title="Extra notes on the category if any" maxlength="4000"></textarea>
                        </span>
                        <span class="mand_sign"></span>
                    </p>
                    <br>
                    <div class="form_footer">
                        <input type="submit" value="Save" id="product_cat_new_save" class="button">
                        <input type="button" value="Delete" id="product_cat_edit_delete" class="d-none" confirm = "Are you sure you want to delete this Product_cat?">
                    </div>
                </form>
            </span>
        </div>
    </div>

    <!--Add Sub Category Module-->
    <div class="ui-dialog ui-widget1 ui-widget-content ui-corner-all ui-front ui-draggable ui-resizable ajax_obj create-popup-form ui-draggable-add-sub-category d-none "
        tabindex="-1" style="width: 600px; top:54.5px; left: 328px;" role="dialog" aria-describedby="ajax_obj"
        aria-labelledby="ui-id-15">
        <div class="ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix">
            <span id="ui-id-15" class="ui-dialog-title">Add/Edit Product Category</span>
            <button class="ui-button ui-widget1 ui-state-default ui-corner-all ui-button-icon-only ui-dialog-titlebar-close add-sub-category-close"
                role="button" aria-disabled="false" title="close">
                <span class="ui-button-icon-primary ui-icon ui-icon-closethick"></span>
                <span class="ui-button-text">close</span>
            </button>
        </div>
        <div id="ajax_obj" class="ui-dialog-content ui-widget-content create-form-content" style="width: auto">
            <span id="product_subcat_new" class="xmlb_form">
                <form method="post" id="frm_product_subcat_new" action="{{ route('admin.base-info.product-cat-list.store') }}" accept-charset="utf-8" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="lnk_top_cat" value="">
                    <input type="hidden" name="cat_type">
                    <br>
                    <h2>New sub-category under <span class="set_cat_name"></span></h2>
                    <br>
                    <p>
                        <label>Name:</label>
                        <span class="short_help"></span>
                        <span class="element">
                            <input id="product_subcat_new_cat_name" name="cat_name" type="text" maxlength="60" size="40" title="Name of this prodcut category" fdprocessedid="yohag3">
                        </span>
                        <span class="mand_sign">*</span>
                    </p>
                    <p>
                        <label>Show Order:</label>
                        <span class="element">
                            <input id="product_subcat_new_show_order" name="show_order" type="text" maxlength="2" size="2" fdprocessedid="tg9uqk">
                        </span>
                        <span class="mand_sign">*</span>
                    </p>
                    <label>Active:</label>
                    <span class="short_help"></span>
                    <span class="element">
                        <select id="product_subcat_new_is_active" name="is_active" fdprocessedid="7ht16">
                            <option value="1" selected="selected">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </span>
                    <span class="mand_sign">*</span>
                    
                    <div class="form_footer">
                        <input type="submit" value="Save" id="product_subcat_new_save" class="button">
                    </div>
                </form>
            </span>
        </div>
    </div>
@endif

<!-- Add New Wine Category Module -->
@if(isset($wineCategories))
    <div class="ui-dialog ui-widget1 ui-widget-content ui-corner-all ui-front ui-draggable ui-resizable ajax_obj create-popup-form ui-draggable-add-new-wine-category d-none "   
        tabindex="-1" style="width: 600px; top:200px; left: 328px;" role="dialog" aria-describedby="ajax_obj"
        aria-labelledby="ui-id-15">
        <div class="ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix">
            <span id="ui-id-15" class="ui-dialog-title">Manage Wine Category</span>
            <button class="ui-button ui-widget1 ui-state-default ui-corner-all ui-button-icon-only ui-dialog-titlebar-close add-new-wine-category-close"
                role="button" aria-disabled="false" title="close">
                <span class="ui-button-icon-primary ui-icon ui-icon-closethick"></span>
                <span class="ui-button-text">close</span>
            </button>
        </div>
        <div id="ajax_obj" class="ui-dialog-content ui-widget-content create-form-content" style="width: auto">
            <span id="new_wine_cat" class="xmlb_form">
                <form method="post" id="frm_new_wine_cat" action="{{ route('admin.base-info.restaurant-wine-category.store') }}" accept-charset="utf-8" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="wine_cat_id">
                    <br>
                    <h2 id="frm_category"></h2>
                    <br>
                    <p>
                        <label>Name:</label>
                        <span class="element">
                            <input id="new_wine_cat_wcat_name" name="wcat_name" type="text" maxlength="90" size="50" title="Name of this category for restaurant wine" fdprocessedid="zr13fh">
                        </span>
                        <span class="mand_sign">*</span>
                    </p>
                    <p>
                        <label>Show Order:</label>
                        <span class="element">
                            <input id="new_wine_cat_show_order" name="show_order" type="text" maxlength="2" size="2" title="The order by which this category should show up on screen" fdprocessedid="ipyn7g">
                        </span>
                        <span class="mand_sign">*</span>
                    </p>
                    <p>
                        <label>Extra Notes:</label>
                        <span class="element">
                            <textarea id="new_wine_cat_extra_notes" name="extra_notes" cols="40" rows="6" title="Extra description for the item if any" maxlength="255"></textarea>
                        </span>
                        <span class="mand_sign"></span>
                    </p>
                    <br>
                    <div class="form_footer">
                        <input type="submit" value="Save" id="new_wine_cat_save" name="new_wine_cat_save" class="button" onclick="return preSubmitnew_wine_cat() ;" fdprocessedid="jhw6be">
                    </div>
      
                    <style type="text/css">
                        #new_wine_cat label            {float: none; display: inline-block; width: 8em;}
                        #new_wine_cat .element         {float: none;}
                    </style>
                </form>
            </span>
        </div>
    </div>
@endif
@endsection
@section('scripts')

@if(isset($wineCategories))
<script>
    $(document).ready(function () {
        function fetchWinesData() {
            var wcat_id = $('.hlighted').attr('wcat_id');
            var wine_type = $('.flt_wine_type .selected').attr('value');
            var org_country = $('.flt_country .selected').attr('value');
            var org_region = $('.flt_region .selected').attr('value');
            $.ajax({
                type: "GET",
                url: "{{ route('admin.base-info.category-wine-list') }}",
                data: {
                    wcat_id: wcat_id,
                    wine_type: wine_type,
                    org_country: org_country,
                    org_region:org_region,
                },
                success: function (response) {
                    var countryNamesData = {!! json_encode(getAllCountryNames()) !!};
                    var html = `
                        <div class="wine_row header">
                            <span></span>
                            <span>Name</span>
                            <span>Type</span>
                            <span>Bottle</span>
                            <span>Bin #</span>
                            <span>Category</span>
                            <span>Country</span>
                            <span>Region</span>
                            <span>Qty</span>
                            <span>Price</span>
                        </div>`
                    response.wineProducts.forEach(function(wineProduct, index) {
                        html += `
                            <div class="wine_row card actual_body">
                                <span>${++index}</span>
                                <span>
                                    <a href="#" target="_blank">${wineProduct.product_gens.product_name}</a>
                                </span>`;
                                var wine_type; 
                                if (wineProduct.wine_type == 'W') {
                                    wine_type = 'White';
                                } else if (wineProduct.wine_type == 'R') {
                                    wine_type = 'Red';
                                } else if (wineProduct.wine_type == 'S') {
                                    wine_type = 'Rose';
                                } else {
                                    wine_type = '<span class="warning">***</span>';
                                }
                        html += `<span>${wine_type}</span>
                                <span>${wineProduct.liquor_size.size}</span>`;
                                var bin_number = wineProduct.lnk_bin_number?wineProduct.lnk_bin_number:'<span class="warning">**</span>';
                        html += `<span>
                                    ${bin_number}
                                </span>`
                                
                        // Assuming wineCategories() returns an array of categories
                        
                            html +=  `<span>${wineProduct.lnk_wine_cats}</span>`;
                        
                            var countryName = countryNamesData[wineProduct.org_country];
                        html += `<span>${countryName}</span>
                                <span>${wineProduct.org_region}</span>
                                <span>
                                    <span class="warning">${wineProduct.product_gens.qty_on_hand??0}</span>
                                </span>
                                <span>$${wineProduct.product_gens.price_bq_inhouse??''}</span>
                            </div>`;
                    });
                    $('.flt_region').html('');
                    if (response.region.length > 0) {
                        var regionHtml = '';
                        response.region.forEach(function(region) {
                            regionHtml += `<span value="${region}" ${org_region == region ? 'class="selected"' : ''}>
                                ${org_region == region ? '<svg class="svg-inline--fa fa-check" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"></path></svg>' : ''}
                            ${region}</span>`;
                        });
                        $('.flt_region').html(regionHtml);
                    }
                    $('.all_wines_wrap').html(html);
                }
            });
        }

        fetchWinesData();

        $('.wcat_row').click(function () {
            $('.wcat_row').removeClass('hlighted');
            $(this).addClass('hlighted');
            fetchWinesData();
        });

        $('.flt_wine_type span').click(function () {
            $(this).siblings('span').removeClass('selected').find('svg').remove();
            $(this).addClass('selected').prepend('<svg class="svg-inline--fa fa-check" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"></path></svg>');
            fetchWinesData();
        });

        $('.flt_country span').click(function () {
            $(this).siblings('span').removeClass('selected').find('svg').remove();
            $(this).addClass('selected').prepend('<svg class="svg-inline--fa fa-check" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"></path></svg>');
            fetchWinesData();
        });

        $(document).on('click', '.flt_region span', function() {
            $(this).siblings('span').removeClass('selected').find('svg').remove();
            $(this).addClass('selected').prepend('<svg class="svg-inline--fa fa-check" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"></path></svg>');
            fetchWinesData();
        });

        $('.btn_clear_all_filters').click(function(){
            $('.wcat_row').removeClass('hlighted');
            $('.flt_country span').siblings('span').removeClass('selected').find('svg').remove();
            $('.flt_wine_type span').siblings('span').removeClass('selected').find('svg').remove();
            $(this).siblings('span').removeClass('selected').find('svg').remove();
            fetchWinesData();
        })
    });

</script>

@endif

<script>
    $(document).ready(function () {
        $('.btn_add_banquet_menu_add').click(function(){
            var product_type = $(this).attr('product_type');
            $('#frm_product_menu_new input[name="product_type"]').val(product_type);
            $('.ui-widget-overlay').removeClass('d-none');
            $('.ui-draggable-add-new-banquet-menu').removeClass('d-none');
        });

        $('.add-new-banquet-menu-close').click(function(){
            $('.ui-widget-overlay').addClass('d-none');
            $('.ui-draggable-add-new-banquet-menu').addClass('d-none');
        });

        $('.add_new_wine_category').click(function(){
            $('#frm_category').html('New Category');
            $('.ui-widget-overlay').removeClass('d-none');
            $('.ui-draggable-add-new-wine-category').removeClass('d-none');
        });

        $('.add-new-wine-category-close').click(function(){
            $('#frm_new_wine_cat input').validate().resetForm();
            $('#frm_new_wine_cat input[name="wcat_name"]').val('');
            $('#frm_new_wine_cat input[name="show_order"]').val('');
            $('#frm_new_wine_cat textarea[name="extra_notes"]').val('');
            $('.ui-widget-overlay').addClass('d-none');
            $('.ui-draggable-add-new-wine-category').addClass('d-none');
        });
        
        $('.edit-banquet-menu-close').click(function(){
            $('.ui-widget-overlay').addClass('d-none');
            $('.ui-draggable-edit-banquet-menu').addClass('d-none');
        });

        $('.add_new_product_category').click(function(){
            $('#frm_product_cat_new p.cat_type_hide_and_show').removeClass('d-none');
            $('.ui-draggable-add-new-product-category').removeClass('d-none');
            $('#frm_product_cat_new input#product_cat_edit_delete').addClass('d-none');
            $('.ui-widget-overlay').removeClass('d-none');
            $('#frm_product_cat_new p.cat_type_active').addClass('d-none');
        });

        $('.add-new-product-category-close').click(function(){
            $('#frm_product_cat_new input[name="product_cat_id"]').val('');
            $('#frm_product_cat_new select[name="is_active"]').val('');
            $('#frm_product_cat_new input[name="cat_name"]').val('');
            $('#frm_product_cat_new input[name="show_order"]').val('');
            $('#frm_product_cat_new textarea[name="extra_notes"]').val('');
            $('.ui-widget-overlay').addClass('d-none');
            $('.ui-draggable-add-new-product-category').addClass('d-none');
        });

        $('.btn_add_sub_cat').click(function(){
            var cat_name = $(this).attr('cat_name');
            var cat_id = $(this).attr('cat_id');
            var cat_type = $(this).attr('cat_type')
            $('.set_cat_name').text(cat_name);
            $('#frm_product_subcat_new input[name="lnk_top_cat"]').val(cat_id);
            $('#frm_product_subcat_new input[name="cat_type"]').val(cat_type);
            $('.ui-widget-overlay').removeClass('d-none');
            $('.ui-draggable-add-sub-category').removeClass('d-none');
        });

        $('.add-sub-category-close').click(function(){
            $('.ui-widget-overlay').addClass('d-none');
            $('.ui-draggable-add-sub-category').addClass('d-none');
        });

        $('#frm_product_menu_new').validate({
            rules:{
                'product_name': 'required',
                'pieces_per_serving':{
                    required:true,
                    number:true,
                },
                'lnk_cat': 'required',
                'favorite_status': 'required',
                'usage_type[]': 'required',
                'unit_of_measure': 'required',
                'specialty_options[]': 'required',
                'numbers_served': 'number',
            },
            messages:{
                'product_name': 'Please enter Product Name or Product Name too short. It has to be 1 characters.',
                'pieces_per_serving':{
                    required: 'Please enter PRODUCT_GEN.Pieces Per Serving It has to be 1 characters.',
                    number:'Please enter Number.',
                },
                'lnk_cat': 'Please select PRODUCT_GEN.Cat',
                'favorite_status': 'Please enter Favorite Status or Favorite Status too short. It has to be #min_len# characters.',
                'usage_type[]': 'Please select Usage',
                'unit_of_measure': 'Please enter Unit Of Measure or Unit Of Measure too short. It has to be #min_len# characters.',
                'specialty_options[]': 'Please enter Specialty Options.',
                'numbers_served': 'Please enter Number.',
            }
        });

        $('#frm_product_menu_edit_main').validate({
            rules:{
                'product_name': 'required',
                'pieces_per_serving':{
                    required:true,
                    number:true,
                },
                'usage_type[]': 'required',
                'numbers_served': 'number',
                'show_order':{
                    required:true,
                    number:true,
                },
            },
            messages:{
                'product_name': 'Please enter Product Name or Product Name too short. It has to be 1 characters.',
                'pieces_per_serving':{
                    required: 'Please enter PRODUCT_GEN.Pieces Per Serving It has to be 1 characters.',
                    number:'Please enter Number.',
                },
                'usage_type[]': 'Please select Usage',
                'numbers_served': 'number',
                'show_order':{
                    required: 'Please enter PRODUCT_CAT.Show Order It has to be 1 characters.',
                    number:'Please enter Number.',
                },
            }
        });

        $('#frm_product_cat_new').validate({
            rules:{
                'cat_type': 'required',
                'cat_name': 'required',
                'show_order':{
                    required:true,
                    number:true,
                },
            },
            messages:{
                'cat_type': 'Please enter PRODUCT_CAT.Cat Type It has to be #min_len# characters.',
                'cat_name': 'Please enter Cat Name or Cat Name too short. It has to be 1 characters.',
                'show_order':{
                    required: 'Please enter PRODUCT_CAT.Show Order It has to be 1 characters.',
                    number:'Please enter Number.',
                },
            }
        });

        $('#frm_product_subcat_new').validate({
            rules:{
                'cat_name': 'required',
                'show_order':{
                    required:true,
                    number:true,
                },
            },
            messages:{
                'cat_name': 'Please enter Cat Name or Cat Name too short. It has to be 1 characters.',
                'show_order':{
                    required: 'Please enter PRODUCT_CAT.Show Order It has to be 1 characters.',
                    number:'Please enter Number.',
                },
            }
        });

        $('#frm_new_wine_cat').validate({
            rules:{
                'wcat_name': 'required',
                'show_order':{
                    required:true,
                    number:true,
                },
            },
            message:{
                'wcat_name': "Please enter Wcat Name It has to be 1 characters.",
                'show_order':{
                    required: 'Please enter Show Order It has to be 1 characters.',
                    number:'Please enter Number.',
                },
            }
        })


        $('tr.cat_wrap').hover(
            function () {
                $(this).find('.btn_add_sub_cat').css('display', 'inline');
            },
            function () {
                $(this).find('.btn_add_sub_cat').css('display', 'none');
            }
        );

        $('#product_cat_list_cat_type, #product_cat_list_is_active').on('change', function(){
            $('#frm_product_cat_list').submit();
        })

        $('.edit_product_category, .btn_edit_sub_cat').click(function(){
            var product_cat_id = $(this).attr('product_cat_id');
            var url = "{{ route('admin.base-info.product-cat-list.edit', ':id') }}"
            url = url.replace(':id', product_cat_id);
            $.ajax({
                type: "GET",
                url: url,
                data: "data",
                success: function (response) {                    
                    $('#frm_product_cat_new input[name="product_cat_id"]').val(response.productCat.id);
                    $('#frm_product_cat_new select[name="is_active"]').val(response.productCat.is_active);
                    $('#frm_product_cat_new input[name="cat_name"]').val(response.productCat.cat_name);
                    $('#frm_product_cat_new input[name="show_order"]').val(response.productCat.show_order);
                    $('#frm_product_cat_new textarea[name="extra_notes"]').val(response.productCat.extra_notes);
                    
                    $('#frm_product_cat_new p.cat_type_hide_and_show').addClass('d-none');
                    $('#frm_product_cat_new p.cat_type_active').removeClass('d-none');
                    $('#frm_product_cat_new input#product_cat_edit_delete').removeClass('d-none');
                    $('#frm_product_cat_new input#product_cat_edit_delete').attr('product_cat_id', response.productCat.id);
                    $('.ui-widget-overlay').removeClass('d-none');
                    $('.ui-draggable-add-new-product-category').removeClass('d-none');
                }
            });
        });

        $('.btn_delete_prod_cat, .btn_delete_sub_cat, #product_cat_edit_delete').click(function(){
            var confirm_m = $(this).attr('confirm');
            if(confirm(confirm_m)){
                var product_cat_id = $(this).attr('product_cat_id');
                var url = "{{ route('admin.base-info.product-cat-list.destroy', ':id') }}";
                url = url.replace(':id', product_cat_id);
                $.ajax({
                    type:"DELETE",
                    url: url,
                    data: {_token: "{{ csrf_token() }}"},
                    success: function(response) {
                        alert(response.success)
                        window.location.reload();
                    }
                })
            }
        });

        $('.btn_banquet_menu_edit').click(function(){
            var gn_prod_id = $(this).attr('gn_prod_id');
            var url = "{{ route('admin.base-info.all-products.edit', ':id') }}";
            url = url.replace(':id', gn_prod_id);
            $.ajax({
                type: "GET",
                url: url,
                success: function (response) {
                    $('#frm_product_menu_edit_main input[name="gn_prod_id"]').val(response.productMenu.id);
                    $('#frm_product_menu_edit_main select[name="lnk_cat"]').val(response.productMenu.lnk_cat);
                    $('#frm_product_menu_edit_main input[name="product_name"]').val(response.productMenu.product_name);
                    $('#frm_product_menu_edit_main input[name="prod_name_catering"]').val(response.productMenu.prod_name_catering);
                    $('#frm_product_menu_edit_main input[name="numbers_served"]').val(response.productMenu.numbers_served);
                    $('#frm_product_menu_edit_main input[name="pieces_per_serving"]').val(response.productMenu.pieces_per_serving);
                    $('#frm_product_menu_edit_main select[name="product_size"]').val(response.productMenu.product_size);
                    $('#frm_product_menu_edit_main input[name="is_combo"]').prop('checked', response.productMenu.is_combo == 1);
                    $('#frm_product_menu_edit_main input[name="is_line_item"]').prop('checked', response.productMenu.product_menus.is_line_item == 1);
                    $('#frm_product_menu_edit_main input[name="combo_use_only"]').prop('checked', response.productMenu.product_menus.combo_use_only == 1);
                    $('#frm_product_menu_edit_main select[name="prod_status"]').val(response.productMenu.prod_status);
                    $('#frm_product_menu_edit_main select[name="unit_of_measure"]').val(response.productMenu.unit_of_measure);
                    $('#frm_product_menu_edit_main select[name="favorite_status"]').val(response.productMenu.favorite_status);
                    $('#frm_product_menu_edit_main textarea[name="prod_desc"]').val(response.productMenu.prod_desc);
                    $('#frm_product_menu_edit_main input[name="show_order"]').val(response.productMenu.product_menus.show_order);
                    $('#frm_product_menu_edit_main input[name="avg_cost"]').val(response.productMenu.avg_cost);
                    $('#frm_product_menu_edit_main input[name="price_bq_inhouse"]').val(response.productMenu.price_bq_inhouse);
                    $('#frm_product_menu_edit_main input[name="price_bq_catering"]').val(response.productMenu.price_bq_catering);
                    $('#frm_product_menu_edit_main input[name="price_rstn_inhouse"]').val(response.productMenu.price_rstn_inhouse);
                    $('#frm_product_menu_edit_main input[name="price_rstn_catering"]').val(response.productMenu.price_rstn_catering);
                    
                    $('#frm_product_menu_edit_main input[name="specialty_options[]"').prop('checked', false);
                    $('#frm_product_menu_edit_main input[name="usage_type[]"').prop('checked', false);
                    var specialtyOptions = JSON.parse(response.productMenu.specialty_options);
                    $.each(specialtyOptions, function(index, value){
                        $('#frm_product_menu_edit_main input[name="specialty_options[]"][value="' + value + '"]').prop('checked', true);
                    });

                    var usage_types = JSON.parse(response.productMenu.product_menus.usage_type);
                    $.each(usage_types, function(index, value){
                        $('#frm_product_menu_edit_main input[name="usage_type[]"][value="' + value + '"]').prop('checked', true);
                    });
                }
            });

            $('.ui-widget-overlay').removeClass('d-none');
            $('.ui-draggable-edit-banquet-menu').removeClass('d-none');
        });

        $('.btn_banquet_menu_delete').click(function(){
            if(confirm("Delete this item?")){
                var gn_prod_id = $(this).attr('gn_prod_id');
                $.ajax({
                    type: "DELETE",
                    url: "{{ route('admin.base-info.all-products.destroy') }}",
                    data: {gn_prod_id: gn_prod_id, _token: "{{ csrf_token() }}"},
                    success: function (response) {
                        if(response.success){
                            alert(response.message);
                            window.location.reload();
                        }else{
                            alert(response.message);
                        }
                    }
                });
            }
        });

        $('.btn_edit_wcat').click(function(){
            var wcat_id = $(this).attr('wcat_id');
            var url = "{{ route('admin.base-info.restaurant-wine-category.edit', ':id') }}";
            url = url.replace(':id', wcat_id);
            $.ajax({
                type: "get",
                url: url,
                success: function (response) {
                    $('#frm_category').html('Edit Category');
                    $('#frm_new_wine_cat input[name="wine_cat_id"]').val(response.wineCategory.id);
                    $('#frm_new_wine_cat input[name="wcat_name"]').val(response.wineCategory.wcat_name);
                    $('#frm_new_wine_cat input[name="show_order"]').val(response.wineCategory.show_order);
                    $('#frm_new_wine_cat textarea[name="extra_notes"]').val(response.wineCategory.extra_notes);
                    $('.ui-widget-overlay').removeClass('d-none');
                    $('.ui-draggable-add-new-wine-category').removeClass('d-none');
                }
            });
        });

        $('.btn_delete_wcat').click(function(){
            if(confirm("Delete this item?")){
                var wine_cat_id = $(this).attr('wcat_id');
                $.ajax({
                    type: "DELETE",
                    url: "{{ route('admin.base-info.restaurant-wine-category.destroy') }}",
                    data: {wine_cat_id: wine_cat_id, _token: "{{ csrf_token() }}"},
                    success: function (response) {
                        alert(response.message);
                        window.location.reload();
                    }
                });
            }
        });

        $(document).ready(function() {
            $('#perPageSelect').on('change', function() {
                const perPage = $(this).val();
                const url = new URL(window.location.href);
                url.searchParams.set('perPage', perPage);
                window.location.href = url.toString();
                $('#frm_all_products').submit();
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
    });
</script>
@endsection