@extends('admin.layouts.master')
@section('title', 'All Liquor Products')
@section('style')
    <style>
        .grape_variety_wrap{
            margin-left: 130px;
        }
        .grape_variety_wrap p {
            display: grid;
            grid-template-columns: 6fr 1.5fr .4fr;
        }
    </style>
@endsection
@section('content')
<span id="product_liquors" class="xmlb_form">
    <form method="get" id="frm_product_liquors" action="{{ route('admin.liquor-product') }}">
        <div class="title_bar card">
            <h1>All Liquor Products
                <span class="special_action">
                    <a href="#" class=" add-liquor-product"><button type="button" class="button font-bold radius-0">Add New</button></a>
                </span>
            </h1>
        </div>
        <div class="line_break"></div>
        <fieldset class="form_filters">
            <legend>Search by</legend>
            <label>Name:</label>
            <input name="product_liquors_name" id="product_liquors_PRODUCT_NAME" type="text" value="" maxlength="120" size="15" title="Search by name, bin #" class="q_tip">
            <label>Supplier:</label>
            <select name="product_liquors_lnk_def_supplier" id="product_liquors_LNK_DEF_SUPPLIER">
                <option value="" selected="yes">--All--</option>
                @foreach ($suppliers as $_supplier)
                    <option value="{{$_supplier->id}}">{{$_supplier->supplier_name}}</option>
                @endforeach
            </select>
            <label>Category:</label>
            <select name="product_liquors_lnk_cat" id="product_liquors_LNK_CAT">
                <option value="" selected="yes">--All--</option>
                @foreach ($liquorCategories as $_liquorCategory) 
                    <option value="{{$_liquorCategory->id}}" {{ old('product_liquors_lnk_cat') == $_liquorCategory->id ? 'selected' : '' }}>{{$_liquorCategory->cat_name}}</option>
                @endforeach
            </select>
            <label>Region:</label>
            <input name="product_liquors_org_region" id="product_liquors_ORG_REGION" type="text" value="" maxlength="60" size="12" title="The region like Ontario or California where this wine or liquor product is from if specified">
            <label>Bin Number:</label>
            <input name="product_liquors_bim_number" id="product_liquors_BIN_NUMBER" type="text" value="" maxlength="4" size="3" title="Unique bin # for this bin">
            <label>Status:</label>
            <select name="product_liquors_prod_status" id="product_liquors_PROD_STATUS">
                <option value="" selected="selected">--All--</option>
                <option value="1">Active</option>
                <option value="2">End of Line</option>
            </select>
            <label>Favorite:</label>
            <select name="product_liquors_favorite_status" id="product_liquors_FAVORITE_STATUS">
                <option value="" selected="selected">--All--</option>
                <option value="1">No</option>
                <option value="2">Yes</option>
            </select>
            <label>Used at:</label>
            <select name="product_liquors_used_at_loc" id="product_liquors_USED_AT_LOC">
                <option value="" selected="selected">--All--</option>
                <option value="Q">Banquet</option>
                <option value="R">Restaurant</option>
                <option value="B">Both Banquet &amp; Restaurant</option>
            </select>
            <button type="submit" class="button font-bold radius-0" id="product_liquors_apply_filter" >Search</button>
            <button type="button" class="button font-bold radius-0" id="product_liquors_clear_filter">Show All</button>
        </fieldset>
    </form>
    <div class="line_break"></div>
    <div class="top-record mt-20">
        <p align="right">
            Records: 1 to 56 of 56 | Show:
            <select class="max-100">
                <option value="all">All</option>
                <option value="10">10</option>
                <option value="30" selected="">30</option>
                <option value="50">50</option>
                <option value="100">100</option>
            </select>
        </p>
    </div>
    <table class="product-list table mt-20">
        <tr>
            <th></th>
            <th>
                <a href="#">Category</a>
            </th>
            <th>
                <a href="#">Name</a>
            </th>
            <th>
                <a href="#">Brand</a>
            </th>
            <th>
                <a href="#">Bin Number</a>
            </th>
            <th>
                <a href="#">Supplier</a>
            </th>
            <th>
                <a href="#">Qty On Hand</a>
            </th>
            <th>
                <a href="#">Qty At Event</a>
            </th>
            <th>
                <a href="#">Price P./S.</a>
            </th>
            <th class="actions"></th>
        </tr>
        @foreach ($productGens as $_productGen)
            <tr>
                <td>
                    <input value="1619" type="checkbox" name="id_element" form_name="product_liquors" title="Click or Shift/Click to select sinlge or in a group" row_no="2">
                </td>
                <td>
                    {{$_productGen->category->cat_name}}/ 
                    @if ($_productGen->productLiquor->used_at_loc == 'Q')
                        {{'Banquet'}}
                    @elseif($_productGen->productLiquor->used_at_loc == 'R')
                        {{'Restaurant'}}
                    @else
                        {{'Both Banquet & Restaurant'}}
                    @endif
                </td>
                <td>
                    <a href="{{ route('admin.liquor-product.view',$_productGen->id) }}">{{$_productGen->product_name}}</a><br>
                    {{$_productGen->productLiquor->lnk_package_type}} {{$_productGen->productLiquor->liquorSize->size}}
                </td>
                <td>
                    {{$_productGen->productLiquor->liquorBrand->lbrand_name}}
                </td>
                <td>
                    <span class="bin_num">{{$_productGen->productLiquor->liquorBin?$_productGen->productLiquor->liquorBin->bin_number:'----'}} @if($_productGen->productLiquor->wine_type == 'R'){{ '(Red)'  }}@elseif($_productGen->productLiquor->wine_type == 'W'){{ '(White)' }}@elseif($_productGen->productLiquor->wine_type == 'S'){{ '(Rose)' }} @endif </span>
                    @php $vintages = App\Models\ProductGen::where('lnk_parent_id', $_productGen->id)->get(); @endphp
                    @foreach($vintages as $_vintage)
                        <p class="vintage_row"><strong>{{ $_vintage->productLiquor->vintage }}</strong> | <span title="Qty in Warehouse">On Hand:</span> {{ $_vintage->qty_on_hand??0  }}</p>
                    @endforeach
                </td>
                <td>{{$_productGen->supplier->supplier_name}}</td>
                <td>{{ $_productGen->qty_on_hand??0 }}</td>
                <td>{{ $_productGen->qty_at_event??0 }}</td>
                <td><strong title="Purchase Price">P:</strong>{{number_format($_productGen->purchase_price,2)}}</td>
                <td>
                    <button type="button" product_id="{{$_productGen->id}}" class="delete_product button font-bold radius-0">Delete</button>
                    <button type="button" product_id="{{$_productGen->id}}" class="button font-bold radius-0 liquor_product_edit">Edit</button>
                </td>
            </tr>
        @endforeach
    </table>
    <input type="submit" value="Delete" id="product_liquors_delete" name="product_liquors_delete" class="button font-bold radius-0">
</span>
{{-- new liquor product popup models--}}
<div class="ui-widget-overlay ui-front d-none"></div>
<div class="ui-dialog ui-widget1 ui-widget-content ui-corner-all ui-front ui-draggable ui-resizable ajax_obj create-popup-form ui-draggable-liquor-product d-none" tabindex="-1" style="width: 1141px;left: 98.5px;" role="dialog" aria-describedby="ajax_obj" aria-labelledby="ui-id-15">
    <div class="ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix">
        <span id="ui-id-15" class="ui-dialog-title">New Liquor</span>
        <button class="ui-button ui-widget1 ui-state-default ui-corner-all ui-button-icon-only ui-dialog-titlebar-close" role="button" aria-disabled="false" title="close">
            <span class="ui-button-icon-primary ui-icon ui-icon-closethick closethick-liquor-product"></span>
            <span class="ui-button-text">close</span>
        </button>
    </div>
    <div id="ajax_obj" class="ui-dialog-content ui-widget-content create-form-content">
        <span id="event_new" class="xmlb_form">
            <form action="#" id="frm_add_liquor_product" method="POST" novalidate="novalidate">
                <h2>Add/Edit Liquor Product</h2>
                @csrf
                <div class="row">
                    <div class="col-2 mb-10">
                        <label class="align-right d-block">Part #:</label>
                    </div>
                    <div class="col-2 mb-10 pl-0">
                        <input name="part_id" value="{{old('part_id')}}" size="20" type="text">
                    </div>
                    <div class="col-2 mb-10">
                        <label class="align-right d-block">Name:</label>
                    </div>
                    <div class="col-4 mb-10 pl-0">
                        <input id="product_name" name="product_name" value="{{old('product_name')}}" size="50" type="text">
                        <span class="mand_sign">*</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2 mb-10">
                        <label class="align-right d-block">Bottle Size:</label>
                    </div>
                    <div class="col-2 mb-10 pl-0">
                        <select id="bottle_size" class="bottle_size" name="bottle_size">
                            <option value="" {{ old('bottle_size') == '' ? 'selected' : '' }}>----</option>
                            @foreach ($liquorSizes as $_liquorSize)
                                <option value="{{$_liquorSize->id}}" {{ old('bottle_size') == $_liquorSize->id ? 'selected' : '' }}>{{$_liquorSize->size}}</option>
                            @endforeach
                        </select>                        
                    </div>
                    <div class="col-2 mb-10">
                        <label class="align-right d-block">Favorite:</label>
                    </div>
                    <div class="col-4 mb-10 pl-0">
                        <input id="favorite" type="radio" name="favorite" value="1" {{ old('favorite') == '1' ? 'checked' : '' }}>
                        <span>Yes</span>
                        <input id="favorite" type="radio" name="favorite" value="0" {{ old('favorite') == '0' || old('favorite') === null ? 'checked' : '' }}>
                        <span>No</span>
                    </div>  
                </div>
                <div class="row">                  
                    <div class="col-2 mb-10">
                        <label class="align-right d-block">Purchased In:</label>
                    </div>
                    <div class="col-2 mb-10 pl-0">
                        <select id="purchased_in" class="pkg_type_purchase" name="purchased_in">
                            <option value="">----</option>
                            @foreach($packageTypes as $_packageType)
                                <option value="{{ $_packageType->id }}" {{ old('purchased_in') == $_packageType->id ? 'selected' : '' }}>{{ $_packageType->package_name }}</option>
                            @endforeach
                            <!-- <option value="" {{ old('purchased_in') == '' ? 'selected' : '' }}>----</option>
                            <option value="2" {{ old('purchased_in') == '2' ? 'selected' : '' }}>Case of 4</option>
                            <option value="3" {{ old('purchased_in') == '3' ? 'selected' : '' }}>Case of 6</option>
                            <option value="4" {{ old('purchased_in') == '4' ? 'selected' : '' }}>Case of 12</option>
                            <option value="5" {{ old('purchased_in') == '5' ? 'selected' : '' }}>Case of 18</option>
                            <option value="6" {{ old('purchased_in') == '6' ? 'selected' : '' }}>Case of 24</option>
                            <option value="7" {{ old('purchased_in') == '7' ? 'selected' : '' }}>Case of 20</option>
                            <option value="8" {{ old('purchased_in') == '8' ? 'selected' : '' }}>Single</option>
                            <option value="9" {{ old('purchased_in') == '9' ? 'selected' : '' }}>Tank</option> -->
                        </select>
                    </div>
                    <div class="col-2 mb-10">
                        <label class="align-right d-block">Counted In:</label>
                    </div>
                    <div class="col-2 mb-10 pl-0">
                        <select id="counted_in" class="pkg_type_count" name="counted_in">
                            <option value="" {{ old('counted_in') == '' ? 'selected' : '' }}>----</option>
                            @foreach($packageTypes as $_packageType)
                                <option value="{{ $_packageType->id }}" {{ old('counted_in') == $_packageType->id ? 'selected' : '' }}>{{ $_packageType->package_name }}</option>
                            @endforeach
                            <!-- <option value="" {{ old('counted_in') == '' ? 'selected' : '' }}>----</option>
                            <option value="2" {{ old('counted_in') == '2' ? 'selected' : '' }}>Case of 4</option>
                            <option value="3" {{ old('counted_in') == '3' ? 'selected' : '' }}>Case of 6</option>
                            <option value="4" {{ old('counted_in') == '4' ? 'selected' : '' }}>Case of 12</option>
                            <option value="5" {{ old('counted_in') == '5' ? 'selected' : '' }}>Case of 18</option>
                            <option value="6" {{ old('counted_in') == '6' ? 'selected' : '' }}>Case of 24</option>
                            <option value="7" {{ old('counted_in') == '7' ? 'selected' : '' }}>Case of 20</option>
                            <option value="8" {{ old('counted_in') == '8' ? 'selected' : '' }}>Single</option>
                            <option value="9" {{ old('counted_in') == '9' ? 'selected' : '' }}>Tank</option> -->
                        </select>
                    </div>
                    <div class="col-1 mb-10">
                        <label class="align-right d-block">Used at:</label>
                    </div>
                    <div class="col-2 mb-10 pl-0">
                        <select id="used_at" class="used_at_loc" name="used_at">
                            <option value="" {{ old('used_at') == '' ? 'selected' : '' }}>----</option>
                            <option value="Q" {{ old('used_at') == 'Q' ? 'selected' : '' }}>Banquet</option>
                            <option value="R" {{ old('used_at') == 'R' ? 'selected' : '' }}>Restaurant</option>
                            <option value="B" {{ old('used_at') == 'B' ? 'selected' : '' }}>Both Banquet &amp; Restaurant</option>
                        </select>                        
                    </div>
                </div>
                <div class="row prices_main_wrap">
                    <div class="col-2 mb-10">
                        <label class="align-right d-block">Purchase Price:</label>
                    </div>
                    <div class="col-2 mb-10 pl-0">
                        <input id="purchase_price" size="20" name="purchase_price" value="{{old('purchase_price')}}" type="number" step=".01">
                    </div>
                    <div class="col-1 mb-10">
                        <label class="align-right d-block lbl_purchase_price_case">N/A</label>
                    </div>
                    <div class="col-2 mb-10 pl-0">
                        <input size="20" name="purchase_price_case" value="{{old('purchase_price_case')}}" type="number" step=".01">
                    </div>
                    <div class="col-2 mb-10">
                        <label class="align-right d-block">Sell Price RA Inhouse:</label>
                    </div>
                    <div class="col-2 mb-10 pl-0">
                        <input size="20" id="sell_price_in_house" name="sell_price_in_house" value="{{old('sell_price_in_house')}}" type="number" step=".01">
                    </div>
                </div>
                <div class="row">
                    <div class="col-2 mb-10">
                        <label class="align-right d-block"></label>
                    </div>
                    <div class="col-10 mb-10 pl-0">
                        <fieldset class="edit_supps_wrap">
                            <legend>Suppliers <span class="btn btn_add_supp_prod_row" title="Add row">
                                    <svg style="height: 1rem;" class="svg-inline--fa fa-plus" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="plus" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                                        <path fill="currentColor" d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"></path>
                                    </svg><!-- <i class="fa-solid fa-plus"></i> Font Awesome fontawesome.com --></span>
                            </legend>
                            <p class="supp_prod_row header" style="display: grid;grid-template-columns: 5fr 3fr 1fr;">
                                <span>Supplier</span>
                                <span>Vendor SKU</span><span></span>
                            </p>
                            <p class="supp_prod_row" style="display: grid;grid-template-columns: 5fr 3fr 1fr;"><span>
                                <select id="supplier_name" class="supp_select" name="supplier_name[]">
                                    <option value="" selected>----</option>
                                    @foreach ($suppliers as $_supplier)
                                        <option value="{{ $_supplier->id }}" {{ in_array($_supplier->id, old('supplier_name', [])) ? 'selected' : '' }}>
                                            {{ $_supplier->supplier_name }}
                                        </option>
                                    @endforeach
                                </select></span>
                                <span>
                                    <input id="vpart_num" class="vpart_num" name="vpart_num[]" value="{{old('vpart_num')}}" type="text">
                                </span>
                            </p>
                            <div class="line_break"></div>
                        </fieldset>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2 mb-10">
                        <label class="align-right d-block">Unit of Measure:</label>
                    </div>
                    <div class="col-4 mb-10 pl-0">
                        <select id="unit_of_measure" class="uom" name="unit_of_measure">
                            <option value="" {{ old('unit_of_measure') == '' ? 'selected' : '' }}>----</option>
                            <option value="1" {{ old('unit_of_measure') == '1' ? 'selected' : '' }}>Each</option>
                            <option value="2" {{ old('unit_of_measure') == '2' ? 'selected' : '' }}>Platter</option>
                            <option value="3" {{ old('unit_of_measure') == '3' ? 'selected' : '' }}>Tray</option>
                            <option value="4" {{ old('unit_of_measure') == '4' ? 'selected' : '' }}>Litre</option>
                            <option value="5" {{ old('unit_of_measure') == '5' ? 'selected' : '' }}>Pound</option>
                            <option value="6" {{ old('unit_of_measure') == '6' ? 'selected' : '' }}>Pound</option>
                        </select>                        
                    </div>
                    <div class="col-2 mb-10">
                        <label class="align-right d-block">Alcohol Percent:</label>
                    </div>
                    <div class="col-3 mb-10 pl-0">
                        <input size="20" id="alcohol_percent" name="alcohol_percent" value="{{old('alcohol_percent')}}" type="number" step=".01">
                    </div>
                </div>
                <div class="row">
                    <div class="col-2 mb-10">
                        <label class="align-right d-block">Category:</label>
                    </div>
                    <div class="col-4 mb-10 pl-0">
                        <select id="category" class="prod_cat add_lq_lnk_cat" name="category">
                            <option value="" {{ old('category') == '' ? 'selected' : '' }}>----</option>
                            @foreach ($liquorCategories as $_liquorCategory) 
                                <option value="{{$_liquorCategory->id}}" {{ old('category') == $_liquorCategory->id ? 'selected' : '' }}>{{$_liquorCategory->cat_name}}</option>
                            @endforeach
                        </select>                        
                    </div>
                    <div class="col-2 mb-10">
                        <label class="align-right d-block">Brand:</label>
                    </div>
                    <div class="col-3 mb-10 pl-0">
                        <select class="selectpicker" id="liquor_brand" name="liquor_brand" data-live-search="true">
                            <option value="" {{ old('liquor_brand') == '' ? 'selected' : '' }}>----</option>
                            @foreach ($liquorBrands as $_liquorBrand)
                                <option value="{{ $_liquorBrand->id }}" {{ old('liquor_brand') == $_liquorBrand->id ? 'selected' : '' }}>{{ $_liquorBrand->lbrand_name }}</option>
                            @endforeach
                        </select>                        
                    </div>
                </div>
                <div class="row">
                    <div class="col-2 mb-10">
                        <label class="align-right d-block">Description:</label>
                    </div>
                    <div class="col-9 mb-10 pl-0">
                        <textarea name="description" cols="72" rows="3"></textarea>
                    </div>
                </div>
                <div class="line_break"></div>
                <div class="add_wine_specific_wrap main card d-none">
                    <div>
                        <h3>Wine Specific</h3>
                        <hr>
                        <div class="row">
                            <div class="col-3 mb-10">
                                <label class="align-right">Categories:</label>
                            </div>
                            <div class="col-9 mb-10 pl-0">
                                @foreach ($wineCategories as $_wineCategory)    
                                    <input type="checkbox" class="wine_category_checked" value="{{ $_wineCategory->id }}" name="chk_wine_cat[]">{{$_wineCategory->wcat_name}}
                                @endforeach
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2 mb-10">
                                <label class="align-right">Wine Type:</label>
                            </div>
                            <div class="col-1 mb-10 pl-0">
                                <select class="wine_type" name="wine_type">
                                    <option value="">----</option>
                                    <option value="R">Red</option>
                                    <option value="W">White</option>
                                    <option value="S">Rose</option>
                                </select>
                            </div>
                            <div class="col-1 mb-10">
                                <label class="align-right">Bin#:</label>
                            </div>
                            <div class="col-2 mb-10 pl-0">
                                <select class="wine_bin_number" name="lnk_bin_number">
                                    <option value="">----</option>
                                </select>
                            </div>
                            <div class="col-2 mb-10">
                                <label class="align-right">Country:</label>
                            </div>
                            <div class="col-3 mb-10 pl-0">
                                <select class="wine_country" name="wine_country">
                                    <option value="">----</option>
                                    @foreach (getAllCountryNames() as $key => $country_name)
                                    <option value="{{$key}}">{{$country_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2 mb-10">
                                <label class="align-right">Region:</label>
                            </div>
                            <div class="col-2 mb-10 pl-0">
                                <input type="text" size="10" class="wine_region" name="wine_region">
                            </div>
                            <div class="col-1 mb-10">
                                <label class="align-right">City:</label>
                            </div>
                            <div class="col-2 mb-10 pl-0">
                                <input type="text" size="15" class="wine_city" name="wine_city">
                            </div>
                            <div class="col-2 mb-10">
                                <label class="align-right">Winery:</label>
                            </div>
                            <div class="col-2 mb-10 pl-0">
                                <input type="text"  class="winery_name" name="winery_name">
                            </div>
                        </div><br>
                        <div class="grape_variety_wrap main">
                            <fieldset class="grape_variety_content grape_variety_content_hide main btn_add_grape_var_first_fieldset">
                                <legend>Grape Variety <span style="cursor: pointer" class="btn_add_grape_var_first btn"><svg style="width: 10px" class="svg-inline--fa fa-plus" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="plus" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"></path></svg><!-- <i class="fa-solid fa-plus"></i> Font Awesome fontawesome.com --></span></legend>
                                <p class="header"><span>Variety</span><span>Percent</span></p>
                                <p><span><input type="text" class="grape_name" name="grape_name[]" ></span>
                                <span><input type="number"  max="100" class="grape_percent" name="grape_percent[]">%</span>
                                </p><div class="line_break"></div>
                            </fieldset>
                        </div>
                        <div class="vintages_wrap">
                            
                        </div>
                    </div>
                    <p><span class="btn_add_vintage small_button button font-bold radius-0">Add Vintage</span></p>
                </div>
                <div class="add_to_list_wrap_hide main card">
                    <div>
                        <h3>Add to Lists
                            <span class="btn_add_to_list btn">
                                <svg style="height: 1rem;" class="svg-inline--fa fa-plus" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="plus" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                                    <path fill="currentColor" d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"></path>
                                </svg><!-- <i class="fa-solid fa-plus"></i> Font Awesome fontawesome.com --></span></h3>
                        <div class="lists_wrap">
                        </div>
                    </div>
                </div>
                <div class="line_break"></div>
                <button type="submit" class="button font-bold radius-0 liqour-store1">Save All</button>
            </form>
        </span>
    </div>
</div>
@include('admin.liquorProducts.models.popup')
@endsection
@section('scripts')
@include('admin.liquorProducts.js.edit_liquor') 
<script>

    // e.preventDefault();
    $(document).ready(function() {
        $('#product_liquors_clear_filter').click(function () { 
            window.location.href = "{{ route('admin.liquor-product') }}"
        });
        $('.add-liquor-product').click(function(e) {
            e.preventDefault();
            $('.ui-draggable-liquor-product').show();
            $('.ui-widget-overlay').css('display', 'block');
        });
        $('.closethick-liquor-product').click(function() {
            $('.ui-draggable-liquor-product').hide();
            $('.ui-widget-overlay').css('display', 'none');
        });
        $(document).on('change', '.add_lq_lnk_cat', function() {
            var selectedCategoryText = $(this).find('option:selected').text();
            if (selectedCategoryText == 'Wine') {
                $('.add_wine_specific_wrap').removeClass('d-none'); // Show the div
            } else {
                $('.add_wine_specific_wrap').addClass('d-none'); // Hide the div
            }
        });

        $(document).delegate('.btn_add_grape_var_first', 'click', function () { 
            var this_row =
                '<p><span><input type="text" class="grape_name" name="grape_name[]" ></span>' +
                '<span><input type="number"  max="100" class="grape_percent" name="grape_percent[]">%</span>' +
                '<svg style="height: 1rem;" class="svg-inline--fa fa-trash-can btn_delete_grape_var_row_first" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-can" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z"></path></svg>' +
                '</p><div class="line_break"></div>';

            this_row = $(this_row);
            $(this).closest(".btn_add_grape_var_first_fieldset").append(this_row);          
        });
        $(document).on("click", ".btn_delete_grape_var_row_first", function() {
            $(this).closest("p").remove();
        });
        
        $(document).delegate('.btn_add_grape_var', 'click', function () { 
            var vindex = $(this).closest('.field_length').attr('data-index');
            var this_row =
                '<p><span><input type="text" class="grape_name" name="grape_name['+vindex+'][]" ></span>' +
                '<span><input type="number"  max="100" class="grape_percent" name="grape_percent['+vindex+'][]">%</span>' +
                '<svg style="height: 1rem;" class="svg-inline--fa fa-trash-can btn_delete_grape_var_row" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-can" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z"></path></svg>' +
                '</p><div class="line_break"></div>';

            this_row = $(this_row);
            $(this).closest("fieldset").append(this_row);          
        });
        $(document).on("click", ".btn_delete_grape_var_row", function() {
            $(this).closest("p").remove();
        });
        $('.btn_add_vintage').click(function () { 
            $('#frm_add_liquor_product input[name="purchase_price"]').val('');
            $('#frm_add_liquor_product input[name="purchase_price_case"]').val('');
            $('#frm_add_liquor_product input[name="sell_price_in_house"]').val('');
            $('.grape_variety_content_hide').addClass('d-none'); // Hide the div
            $('.add_to_list_wrap_hide').addClass('d-none'); // Hide the div
            $('.prices_main_wrap').addClass('d-none'); // Hide the div
            var vintageCount = $('.field_length').length;
            var add_vintage ='<fieldset class="vntg_wrap field_length" data-index="' + vintageCount + '">'+
                '<legend>Vintage<span class="btn_delete_vintage btn"><svg style="width: 10px" class="svg-inline--fa fa-trash-can" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-can" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">'+
                    '<path fill="currentColor" d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z"></path>'+
                '</svg><!-- <i class="fa-solid fa-trash-can"></i> Font Awesome fontawesome.com --></span></legend>'+
                '<p><label>V. Year:</label><input type="number" step="1" class="vintage_year" name="vintage_year[]"> <label>Purchase Price:</label><input type="number" step=".01" class="vntg_purchase_price" name="vntg_purchase_price[]"></p> <div class="line_break"></div>'+
                '<p><label class="auto_width">Sell Price RA Inhouse:</label><input type="number" step=".01" class="vntg_price_ra_inhouse" name="vntg_price_ra_inhouse[]"> <label class="auto_width">Sale Price RA Catering:</label><input type="number" step=".01" class="vntg_price_ra_catering" name="vntg_price_ra_catering[]"></p>'+
                '<div class="grape_variety_wrap">'+
                    '<fieldset class="grape_variety_content vntg_num_1">'+
                        '<legend>Grape Variety <span class="btn_add_grape_var btn"><svg style="width: 10px" class="svg-inline--fa fa-plus" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="plus" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">'+
                            '<path fill="currentColor" d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"></path>'+
                        '</svg><!-- <i class="fa-solid fa-plus"></i> Font Awesome fontawesome.com --></span></legend>'+
                        '<p class="header"><span>Variety</span><span>Percent</span></p>'+
                        '<p><span><input type="text" class="grape_name" name="grape_name['+vintageCount+'][]" ></span>' +
                        '<span><input type="number"  max="100" class="grape_percent" name="grape_percent['+vintageCount+'][]">%</span>' +
                        '</p><div class="line_break"></div>'+
                    '</fieldset>'+
                '</div><div class="line_break"></div>'+
                '<p><label>Description:</label><textarea class="vntg_desc" name="vntg_desc[]" rows="3" cols="72"></textarea></p>'+
                '<div class="add_to_list_wrap vntg card">'+
                    '<div>'+
                        '<h3>Add to Lists <span class="btn_add_to_list btn"><svg style="width: 10px" class="svg-inline--fa fa-plus" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="plus" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">'+
                            '<path fill="currentColor" d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"></path>'+
                        '</svg><!-- <i class="fa-solid fa-plus"></i> Font Awesome fontawesome.com --></span></h3>'+
                        '<div class="lists_wrap"></div>'+
                    '</div>'+
                '</div>'+
            '</fieldset>'; 
            $('.vintages_wrap').append(add_vintage);
        });

        $('.vintages_wrap').on('click', '.btn_delete_vintage', function() {
            $(this).closest('.vntg_wrap').remove();

            if ($('.vintages_wrap .vntg_wrap').length === 0) {
                // Show another div if there are no vintage items left
                $('.grape_variety_content').removeClass('d-none');
                $('.add_to_list_wrap_hide').removeClass('d-none');
                $('.prices_main_wrap').removeClass('d-none');
            } 
        });
        $(document).delegate('.add-to-list', 'click', function() {
            $(this).closest('.list_dd_wrap').remove();
        })

        $('.btn_add_supp_prod_row').click(function() {
            var suppliersData = JSON.parse('<?php echo json_encode($suppliers); ?>');
            var supplier_dd =
                '<p class="supp_prod_row" style="display: grid;grid-template-columns: 5fr 3fr 1fr;"><span>' +
                '<select id="supplier_name" class="supp_select" name="supplier_name[]">'+
                '<option value="">----</option>';
                $.each(suppliersData, function(index, supplier) {
                    supplier_dd += '<option value="' + supplier.id + '">' + supplier.supplier_name + '</option>';
                });
                
                supplier_dd +='</select></span > '+
                '<span > '+
                '<input id="vpart_num" name="vpart_num[]" class = "vpart_num" type = "text" > '+
                '</span>'+
                '<span class = "btn btn_delete_supp_prod add-more-supplier" > <svg style="height: 1rem;" class="svg-inline--fa fa-trash-can" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-can" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">'+
                    '<path fill="currentColor" d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z"></path>'+
                    '</svg>'+
                '</p><div class="line_break"></div>';
            $(".edit_supps_wrap").append(supplier_dd);

        });
        $('.pkg_type_purchase').change(function () { 
            $("#frm_add_liquor_product .pkg_type_count").val($(this).val());  
            var selectedText = $(this).find('option:selected').text(); 
            if (selectedText != '----') {
                $("#frm_add_liquor_product .lbl_purchase_price_case").text('Per '+selectedText+ ':');            
            } else {
                $("#frm_add_liquor_product .lbl_purchase_price_case").text(' N/A');            
            }
        });
        
        $.validator.addMethod("checkSupplierSelection", function(value, element) {
            var valid = true;
            var supplierId = [];
            $('.supp_select').each(function() {
                var selectName = $(this).val();
                if (selectName === '' || $.inArray(selectName, supplierId) != -1) {
                    valid = false;
                    return false; // Exit the loop early if a value is not found
                }
                supplierId.push(selectName);
            });
            return valid;
        }, "Please select the supplier for Only one record per supplier/product is allowed.");
        $.validator.addMethod("maxWineCategories", function(value, element) {
            return $('[name="edit_wine_cats[]"]:checked').length <= 4;
        }, "Product LQ Insert: You can have max 4 selection for wine categories.");
        $.validator.addMethod("grapeName", function(value, element) {
            var valid = true;
            $('input[name="grape_name[]"]').each(function() {
                var selectName = $(this).val();
                if (selectName === '') {
                    valid = false;
                    return false; // Exit the loop early if a value is not found
                }
            });
            return valid;
        }, "Please enter grape or delete the line!");
        $.validator.addMethod("grapePercent", function(value, element) {
            var valid = true;
            $('input[name="grape_percent[]"]').each(function() {
                var selectName = $(this).val();
                if (selectName === '') {
                    valid = false;
                    return false; // Exit the loop early if a value is not found
                }
            });
            return valid;
        }, "Please enter the percent for grape!");
        $.validator.addMethod("vintageYear", function(value, element) {
            var valid = true;
            $('input[name="vintage_year[]"]').each(function() {
                var selectName = $(this).val();
                if (selectName === '') {
                    valid = false;
                    return false; // Exit the loop early if a value is not found
                }
            });
            return valid;
        }, "Please enter the vintage year or remove the vintage!");
        $("#frm_add_liquor_product").validate({
            rules: {
                'product_name': 'required',
                'bottle_size' : 'required',
                'purchased_in' : 'required',
                'used_at' : 'required',
                'alcohol_percent' : 'required',
                'unit_of_measure' : 'required',
                'category' : 'required',
                'liquor_brand' : 'required',
                'counted_in' : 'required',
                'supplier_name[]': {
                    checkSupplierSelection: true
                },
                'chk_wine_cat[]': {
                    required : true,
                    maxWineCategories: true,
                },
                'wine_type': 'required',
                'lnk_bin_number': 'required',
                'wine_country': 'required',
                'wine_region': 'required',
                'winery_name': 'required',
                'grape_name[]':{
                    grapeName: true
                },
                'grape_percent[]':{
                    grapePercent: true
                },
                'vintage_year[]':{
                    vintageYear: true
                },
            },
            messages: {
                'product_name': 'Please enter product name.',
                'bottle_size': 'Please select bottle size.',
                'purchased_in': 'Please select purchased in.',
                'used_at': 'Please select used at.',
                'alcohol_percent': 'Please enter alcohol percent.',
                'unit_of_measure': 'Please select unit of measure.',
                'category': 'Please select product category.',
                'liquor_brand': 'Please select liquor brand.',
                'counted_in': 'Please select counted in.',
                'edit_wine_cats[]': {
                    required : 'Please select wine category.',
                    maxWineCategories : 'Product LQ Insert: You can have max 4 selection for wine categories.'
                },
                'wine_type': 'Please select wine type',
                'lnk_bin_number': 'Please select wine bin number',
                'wine_country': 'Please select wine country',
                'wine_region': 'Please select wine region',
                'winery_name': 'Please enter winery name',
                // 'supplier_name[]': 'Please select the supplier for all rows or delete the row..',
            }
        });
        $('#frm_add_liquor_product').submit(function(e) {
            if ($(this).valid()) {
            e.preventDefault();
            var formData = $(this).serialize();

            $.ajax({
                url: "{{ route('admin.liquor-product.store') }}",
                type: 'POST',
                data: formData,
                success: function(response) {
                    if (response.success) {
                        window.location.reload();
                    } else {
                        alert(response.message); // Display error message if any
                    }
                },
                error: function(xhr, status, error) {
                    // Clear previous error messages
                    $('.text-danger').remove();
                    $('.error').removeClass('error');

                    if (xhr.responseJSON && xhr.responseJSON.errors) {
                        var errors = xhr.responseJSON.errors;
                        $.each(errors, function(key, value) {
                            $('#' + key + '_error').remove();
                            var cleanedKey = key.replace('.0', ''); // Remove '.0' from the key
                            $('#' + cleanedKey).after('<span id="' + cleanedKey + '_error" class="text-danger">' + value[0] + '</span>');
                            $('#' + cleanedKey).addClass('error');
                        });
                    }
                }
            });
            }
        });
    });

</script>
@endsection
