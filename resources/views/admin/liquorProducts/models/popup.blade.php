{{-- edit liquor product --}}
<div class="ui-dialog ui-widget1 ui-widget-content ui-corner-all ui-front ui-draggable ui-resizable ajax_obj create-popup-form ui-draggable-liquor-product-edit d-none"
    tabindex="-1" style="width: 870px;left: 212.5px;" role="dialog" aria-describedby="ajax_obj"
    aria-labelledby="ui-id-15">
    <div class="ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix">
        <span id="ui-id-15" class="ui-dialog-title">Edit Product Liquor</span>
        <button class="ui-button ui-widget1 ui-state-default ui-corner-all ui-button-icon-only ui-dialog-titlebar-close"
            role="button" aria-disabled="false" title="close">
            <span class="ui-button-icon-primary ui-icon ui-icon-closethick closethick-liquor-product"></span>
            <span class="ui-button-text">close</span>
        </button>
    </div>
    <div id="ajax_obj" class="ui-dialog-content ui-widget-content create-form-content">
        <span id="event_new" class="xmlb_form">
            <form action="#" id="frm_edit_product_liquor" method="POST" novalidate="novalidate">
                @csrf
                <input type="hidden" name="gn_pro_id" value="">
                <div class="row wine_specific_wrap d-none">
                    <div class="col-3 mb-10">
                        <label class="align-right">Categories:</label>
                    </div>
                    <div class="col-9 mb-10 pl-0">
                        @foreach ($wineCategories as $_wineCategory)
                        <input type="checkbox" class="wine_category_checked" value="{{$_wineCategory->id}}" name="chk_wine_cat[]">{{$_wineCategory->wcat_name}}
                        @endforeach
                    </div>
                </div>
                <div class="row">
                    <div class="col-3 mb-10" style="text-align: center">
                        <label class="align-right">Part #:</label>
                    </div>
                    <div class="col-9 mb-10 pl-0">
                        <input name="part_id" value="{{old('part_id')}}" size="20" type="text">
                    </div>
                    <div class="col-3 mb-10" style="text-align: center">
                        <label class="align-right">Name:</label>
                    </div>
                    <div class="col-9 mb-10 pl-0">
                        <input id="product_name" name="product_name" value="{{old('product_name')}}" size="80"
                            type="text">
                        <span class="mand_sign">*</span>
                    </div>
                    <div class="col-12">
                        <div class="row">
                            <div class="col-4">
                                <div class="row">
                                    <div class="col-6 mb-10">
                                        <label class="align-right d-block">Bottle Size:</label>
                                    </div>
                                    <div class="col-6 mb-10 pl-0">
                                        <select id="bottle_size" class="bottle_size" name="bottle_size">
                                            <option value="" {{ old('bottle_size') == '' ? 'selected' : '' }}>----
                                            </option>
                                            @foreach ($liquorSizes as $_liquorSize)
                                            <option value="{{$_liquorSize->id}}"
                                                {{ old('bottle_size') == $_liquorSize->id ? 'selected' : '' }}>
                                                {{$_liquorSize->size}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="row">
                                    <div class="col-6 mb-10">
                                        <label class="align-right d-block">Purchased In:</label>
                                    </div>
                                    <div class="col-6 mb-10 pl-0">
                                        <select id="purchased_in" class="pkg_type_purchase" name="purchased_in">
                                            <option value="">----</option>
                                            @foreach($packageTypes as $_packageType)
                                                <option value="{{ $_packageType->id }}" {{ old('purchased_in') == $_packageType->id ? 'selected' : '' }}>{{ $_packageType->package_name }}</option>
                                            @endforeach
                                            <!-- <option value="" {{ old('purchased_in') == '' ? 'selected' : '' }}>----
                                            </option>
                                            <option value="2" {{ old('purchased_in') == '2' ? 'selected' : '' }}>Case of
                                                4</option>
                                            <option value="3" {{ old('purchased_in') == '3' ? 'selected' : '' }}>Case of
                                                6</option>
                                            <option value="4" {{ old('purchased_in') == '4' ? 'selected' : '' }}>Case of
                                                12</option>
                                            <option value="5" {{ old('purchased_in') == '5' ? 'selected' : '' }}>Case of
                                                18</option>
                                            <option value="6" {{ old('purchased_in') == '6' ? 'selected' : '' }}>Case of
                                                24</option>
                                            <option value="7" {{ old('purchased_in') == '7' ? 'selected' : '' }}>Case of
                                                20</option>
                                            <option value="8" {{ old('purchased_in') == '8' ? 'selected' : '' }}>Single
                                            </option>
                                            <option value="9" {{ old('purchased_in') == '9' ? 'selected' : '' }}>Tank
                                            </option> -->
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="row">
                                    <div class="col-6 mb-10">
                                        <label class="align-right d-block">Counted In:</label>
                                    </div>
                                    <div class="col-6 mb-10 pl-0">
                                        <select id="counted_in" class="pkg_type_count" name="counted_in">
                                            <option value="">----</option>
                                            @foreach($packageTypes as $_packageType)
                                                <option value="{{ $_packageType->id }}" {{ old('counted_in') == $_packageType->id ? 'selected' : '' }}>{{ $_packageType->package_name }}</option>
                                            @endforeach
                                            <!-- <option value="" {{ old('counted_in') == '' ? 'selected' : '' }}>----
                                            </option>
                                            <option value="2" {{ old('counted_in') == '2' ? 'selected' : '' }}>Case of 4
                                            </option>
                                            <option value="3" {{ old('counted_in') == '3' ? 'selected' : '' }}>Case of 6
                                            </option>
                                            <option value="4" {{ old('counted_in') == '4' ? 'selected' : '' }}>Case of
                                                12</option>
                                            <option value="5" {{ old('counted_in') == '5' ? 'selected' : '' }}>Case of
                                                18</option>
                                            <option value="6" {{ old('counted_in') == '6' ? 'selected' : '' }}>Case of
                                                24</option>
                                            <option value="7" {{ old('counted_in') == '7' ? 'selected' : '' }}>Case of
                                                20</option>
                                            <option value="8" {{ old('counted_in') == '8' ? 'selected' : '' }}>Single
                                            </option>
                                            <option value="9" {{ old('counted_in') == '9' ? 'selected' : '' }}>Tank
                                            </option> -->
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="row">
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-4 mb-10">
                                        <label class="align-right d-block">Status:</label>
                                    </div>
                                    <div class="col-8 mb-10 pl-0">
                                        <select id="edit_lq_prod_status" name="edit_lq_prod_status">
                                            <option value="1" selected="selected">Active</option>
                                            <option value="2">End of Line</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-4 mb-10">
                                        <label class="align-right d-block">Favorite:</label>
                                    </div>
                                    <div class="col-8 mb-10 pl-0">
                                        <select id="edit_lq_prod_status" name="favorite_status">
                                            <option value="1" selected="selected">Yes</option>
                                            <option value="0">No</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-3 mb-10" style="text-align: center">
                        <label class="align-right">Supplier:</label>
                    </div>
                    <div class="col-9 mb-10 pl-0">
                        <select id="edit_lq_lnk_def_supplier" name="edit_lq_lnk_def_supplier">
                            @foreach ($suppliers as $_supplier)
                            <option value="{{ $_supplier->id }}"
                                {{ old('edit_lq_lnk_def_supplier') == $_supplier->id ? 'selected' : '' }}>
                                {{ $_supplier->supplier_name }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-3 mb-10">
                        <label class="align-right d-block"></label>
                    </div>
                    <div class="col-9 mb-10 pl-0">
                        <fieldset class="edit_supps_wrap_1">
                            <legend>Suppliers <span class="btn btn_edit_supp_prod_row" title="Add row">
                                    <svg style="height: 1rem;" class="svg-inline--fa fa-plus" aria-hidden="true"
                                        focusable="false" data-prefix="fas" data-icon="plus" role="img"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                                        <path fill="currentColor"
                                            d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z">
                                        </path>
                                    </svg><!-- <i class="fa-solid fa-plus"></i> Font Awesome fontawesome.com --></span>
                            </legend>
                            <!-- <p class="supp_prod_row header" style="display: grid;grid-template-columns: 5fr 3fr 1fr;">
                                <span>Supplier</span>
                                <span>Vendor SKU</span><span></span>
                            </p> -->
                            <!-- <p class="supp_prod_row" style="display: grid;grid-template-columns: 5fr 3fr 1fr;"><span>
                                <select id="supplier_name" class="supp_select_edit" name="supplier_name[]">
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
                                <span class="btn btn_delete_supp_prod add-more-supplier"><svg style="height: 1rem;" class="svg-inline--fa fa-trash-can" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-can" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                                        <path fill="currentColor" d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z"></path>
                                    </svg> <i class="fa-solid fa-trash-can"></i> Font Awesome fontawesome.com</span>
                            </p> -->
                            <div class="line_break"></div>
                        </fieldset>
                    </div>
                    <div class="col-12">
                        <div class="row">
                            <div class="col-4">
                                <div class="row">
                                    <div class="col-4 mb-10">
                                        <label class="align-right d-block">Category:</label>
                                    </div>
                                    <div class="col-8 mb-10 pl-0">
                                        <select id="category" class="prod_cat edit_lq_lnk_cat" name="category">
                                            <option value="" {{ old('category') == '' ? 'selected' : '' }}>----</option>
                                            @foreach ($liquorCategories as $_liquorCategory)
                                            <option value="{{$_liquorCategory->id}}"{{ old('category') == $_liquorCategory->id ? 'selected' : '' }}>{{$_liquorCategory->cat_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="row">
                                    <div class="col-4 mb-10">
                                        <label class="align-right d-block">Brand:</label>
                                    </div>
                                    <div class="col-8 mb-10 pl-0">
                                        <select class="selectpicker" id="liquor_brand" name="liquor_brand"
                                            data-live-search="true">
                                            <option value="" {{ old('liquor_brand') == '' ? 'selected' : '' }}>----
                                            </option>
                                            @foreach ($liquorBrands as $_liquorBrand)
                                            <option value="{{ $_liquorBrand->id }}"
                                                {{ old('liquor_brand') == $_liquorBrand->id ? 'selected' : '' }}>
                                                {{ $_liquorBrand->lbrand_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-5">
                                <div class="row">
                                    <div class="col-4 mb-10">
                                        <label class="align-right d-block">Used at:</label>
                                    </div>
                                    <div class="col-8 mb-10 pl-0">
                                        <select id="used_at" class="used_at_loc" name="used_at">
                                            <option value="" {{ old('used_at') == '' ? 'selected' : '' }}>----</option>
                                            <option value="Q" {{ old('used_at') == 'Q' ? 'selected' : '' }}>Banquet
                                            </option>
                                            <option value="R" {{ old('used_at') == 'R' ? 'selected' : '' }}>Restaurant
                                            </option>
                                            <option value="B" {{ old('used_at') == 'B' ? 'selected' : '' }}>Both Banquet
                                                &amp; Restaurant</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 wine_specific_wrap d-none">
                        <div class="row">
                            <div class="col-4">
                                <div class="row">
                                    <div class="col-6 mb-10">
                                        <label class="align-right d-block">BIN Number:</label>
                                    </div>
                                    <div class="col-6 mb-10 pl-0">
                                    <select id="edit_lq_lnk_bin_number" class="edit_lq_lnk_bin_number wine_bin_number" name="edi_bin_number">
                                        <option value="">----</option>
                                    </select>
                                        <!-- <select id="edit_lq_lnk_bin_number" class="edit_lq_lnk_bin_number"
                                            name="edi_bin_number">
                                            <option value="" {{ old('edi_bin_number') == '' ? 'selected' : '' }}>----
                                            </option>
                                            <option value="100" {{ old('edi_bin_number') == 100 ? 'selected' : '' }}>100
                                            </option>
                                        </select> -->
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="row">
                                    <div class="col-4 mb-10">
                                        <label class="align-right d-block">Winery:</label>
                                    </div>
                                    <div class="col-8 mb-10 pl-0">
                                        <input id="edit_lq_winery_name" name="edit_winery_name" type="text"
                                            maxlength="50" title="Name of the winery if this is a wine">
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="row">
                                    <div class="col-6 mb-10">
                                        <label class="align-right d-block">Wine Type:</label>
                                    </div>
                                    <div class="col-6 mb-10 pl-0">
                                        <select id="edit_lq_wine_type" name="edit_wine_type">
                                            <option value="" {{ old('edit_wine_type') == '' ? 'selected' : '' }}>----
                                            </option>
                                            <option value="R" {{ old('edit_wine_type') == 'R' ? 'selected' : '' }}>Red
                                            </option>
                                            <option value="W" {{ old('edit_wine_type') == 'W' ? 'selected' : '' }}>White
                                            </option>
                                            <option value="S" {{ old('edit_wine_type') == 'S' ? 'selected' : '' }}>Rose
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <hr>
                    </div>
                    <div class="line_break"></div>
                        <div class="wine_prices_wrap_vantahe">
                            <div class="wine_prices_wrap">
                                <div class="col-12 mb-10">
                                    <label class="align-right">Grape Variety:</label>
                                </div>
                                <div class="grape_variety_wrap vintage_edit_product_variety">
                                    <p class="header"><span>Variety</span><span>Percent</span></p>
                                    <p class="wrap_vintage" style="margin: 0 0 6px 0; line-height: 120%; padding: 2px;">
                                        <!-- <span class="wine_prices_wrap">
                                            <span role="status" aria-live="polite" class="ui-helper-hidden-accessible"></span><input
                                                type="text" class="grape_name ui-autocomplete-input" value="" autocomplete="off"
                                                fdprocessedid="q8f3ul" name="grape_name[]"></span><span><input type="number" name="grape_percent[]" step=".01" max="100"
                                                class="grape_percent" value="" fdprocessedid="2o401">%</span><span><span
                                                class="btn_delete_grape_var_row"><svg style="height: 1rem;" class="svg-inline--fa fa-trash-can"
                                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-can"
                                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                                    data-fa-i2svg="">
                                                    <path fill="currentColor"
                                                        d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z">
                                                    </path>
                                                </svg>
                                            </span>
                                        </span>
                                    </p> -->
                                </div>
                            </div>
                            <div class="col-12">
                                <span class="small_button btn_add_grape_var edit_add_new_vintage button font-bold radius-0">Add Line +</span>
                                <hr>
                            </div>
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="row">
                                            <div class="col-4 mb-10">
                                                <label class="align-right d-block">Purchase Price:</label>
                                            </div>
                                            <div class="col-8 mb-10 pl-0">
                                                <input id="purchase_price" size="20" name="purchase_price"
                                                    value="{{old('purchase_price')}}" type="number" step=".01">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="row">
                                            <div class="col-4 mb-10">
                                                <label class="align-right d-block">Per Single:</label>
                                            </div>
                                            <div class="col-8 mb-10 pl-0">
                                                <input id="purchase_price_case" name="purchase_price_case" type="number"
                                                    step="0.01" maxlength="10" title="Purchase price by case">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="row">
                                            <div class="col-4 mb-10">
                                                <label class="align-right d-block">Sell Price RA Inhouse:</label>
                                            </div>
                                            <div class="col-8 mb-10 pl-0">
                                                <input id="price_bq_inhouse" name="price_bq_inhouse" type="number"
                                                    step="0.01" maxlength="9" title="Banquet price for inhouse events">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="row">
                                            <div class="col-4 mb-10">
                                                <label class="align-right d-block">Sale Price RA Catering:</label>
                                            </div>
                                            <div class="col-8 mb-10 pl-0">
                                                <input id="price_bq_catering" name="price_bq_catering" type="number"
                                                    step="0.01" maxlength="9" title="Banquet price for catering  events">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="row">
                                            <div class="col-4 mb-10">
                                                <label class="align-right d-block">CR Inhouse:</label>
                                            </div>
                                            <div class="col-8 mb-10 pl-0">
                                                <input id="price_rstn_inhouse" name="price_rstn_inhouse" type="number"
                                                    step="0.01" maxlength="9" title="Restaurant price for inhouse events">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="row">
                                            <div class="col-4 mb-10">
                                                <label class="align-right d-block">CR Catering:</label>
                                            </div>
                                            <div class="col-8 mb-10 pl-0">
                                                <input id="price_rstn_catering" name="price_rstn_catering" type="number"
                                                    step="0.01" maxlength="9" title="Restaurant price for catering events">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="row">
                                            <div class="col-4 mb-10">
                                                <label class="align-right d-block">Price Half Bottle:</label>
                                            </div>
                                            <div class="col-8 mb-10 pl-0">
                                                <input id="price_half_bottle" name="price_half_bottle" type="number"
                                                    step="0.01" maxlength="9"
                                                    title="If this is a wine, then this gives us the price for half bottle">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="row">
                                            <div class="col-4 mb-10">
                                                <label class="align-right d-block">Price Glass:</label>
                                            </div>
                                            <div class="col-8 mb-10 pl-0">
                                                <input id="price_by_glass" name="price_by_glass" type="number" step="0.01"
                                                    maxlength="9"
                                                    title="If this is a wine, then this gives us the price by glass">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="row">
                                            <div class="col-4 mb-10">
                                                <label class="align-right d-block">Other Price:</label>
                                            </div>
                                            <div class="col-8 mb-10 pl-0">
                                                <input id="price_others" name="price_others" type="number" step="0.01"
                                                    maxlength="9"
                                                    title="Sometimes they sell liquor by say ounce or 2 ounces. In that case this column keeps the price and the next one the unit">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="row">
                                            <div class="col-4 mb-10">
                                                <label class="align-right d-block">Other Price Unit:</label>
                                            </div>
                                            <div class="col-8 mb-10 pl-0">
                                                <select id="price_others_unit" name="price_others_unit">
                                                    <option value="" selected="selected">----</option>
                                                    <option value="OZ">Oz</option>
                                                    <option value="2O">2 Oz</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <div class="col-12">
                        <div class="row">
                            <div class="col-5">
                                <div class="row">
                                    <div class="col-4 mb-10">
                                        <label class="align-right d-block">Country:</label>
                                    </div>
                                    <div class="col-8 mb-10 pl-0">
                                        <select id="org_country" name="org_country">
                                            <option value="">----</option>
                                            @foreach(getAllCountryNames() as $code => $name)
                                            <option value="{{ $code }}">{{ $name }}</option>
                                            @endforeach
                                        </select>
                                        <!-- <select id="org_country" name="org_country"><option value="">----</option><option value="CA">Canada</option><option value="US">United States</option><option value="AF">Afghanistan</option><option value="AL">Albania</option><option value="DZ">Algeria</option><option value="AS">American Samoa</option><option value="AD">Andorra</option><option value="AO">Angola</option><option value="AI">Anguilla</option><option value="AQ">Antarctica</option><option value="AG">Antigua &amp; Barbuda</option><option value="AR">Argentina</option><option value="AM">Armenia</option><option value="AW">Aruba</option><option value="AU">Australia</option><option value="AT">Austria</option><option value="AZ">Azerbaijan</option><option value="BS">Bahama</option><option value="BH">Bahrain</option><option value="BD">Bangladesh</option><option value="BB">Barbados</option><option value="BE">Belgium</option><option value="BZ">Belize</option><option value="BJ">Benin</option><option value="BL">Belarus</option><option value="BM">Bermuda</option><option value="BT">Bhutan</option><option value="BO">Bolivia</option><option value="BA">Bosnia and Herzegovina</option><option value="BW">Botswana</option><option value="BV">Bouvet Island</option><option value="BR">Brazil</option><option value="IO">British Indian Ocean Territory</option><option value="VG">British Virgin Islands</option><option value="BN">Brunei</option><option value="BG">Bulgaria</option><option value="BF">Burkina Faso</option><option value="BI">Burundi</option><option value="CI">Cote D'ivoire (Ivory Coast)</option><option value="KH">Cambodia</option><option value="CM">Cameroon</option><option value="CV">Cape Verde</option><option value="CG">Congo</option><option value="KY">Cayman Islands</option><option value="CF">Central African Republic</option><option value="TD">Chad</option><option value="CL">Chile</option><option value="CN">China</option><option value="CX">Christmas Island</option><option value="CC">Cocos (Keeling) Islands</option><option value="CO">Colombia</option><option value="KM">Comoros</option><option value="CK">Cook Islands</option><option value="CR">Costa Rica</option><option value="HR">Croatia</option><option value="CU">Cuba</option><option value="CY">Cyprus</option><option value="CZ">Czech Republic</option><option value="DK">Denmark</option><option value="DJ">Djibouti</option><option value="DM">Dominica</option><option value="DO">Dominican Republic</option><option value="TP">East Timor</option><option value="EC">Ecuador</option><option value="EG">Egypt</option><option value="SV">El Salvador</option><option value="DG">Diego Garcia</option><option value="GQ">Equatorial Guinea</option><option value="ER">Eritrea</option><option value="EE">Estonia</option><option value="ET">Ethiopia</option><option value="FK">Falkland Islands (Malvinas)</option><option value="FO">Faroe Islands</option><option value="FJ">Fiji</option><option value="FI">Finland</option><option value="FR">France</option><option value="GF">French Guiana</option><option value="PF">French Polynesia</option><option value="TF">French Southern Territories</option><option value="GA">Gabon</option><option value="GM">Gambia</option><option value="GE">Georgia</option><option value="DE">Germany</option><option value="GH">Ghana</option><option value="GI">Gibraltar</option><option value="GR">Greece</option><option value="GL">Greenland</option><option value="GD">Grenada</option><option value="GP">Guadeloupe</option><option value="GU">Guam</option><option value="GT">Guatemala</option><option value="GN">Guinea</option><option value="GW">Guinea-Bissau</option><option value="GY">Guyana</option><option value="HT">Haiti</option><option value="HM">Heard &amp; McDonald Islands</option><option value="HN">Honduras</option><option value="HK">Hong Kong</option><option value="HU">Hungary</option><option value="IS">Iceland</option><option value="IN">India</option><option value="ID">Indonesia</option><option value="IR">Iran</option><option value="IQ">Iraq</option><option value="IE">Ireland</option><option value="IL">Israel</option><option value="IT" selected="selected">Italy</option><option value="JM">Jamaica</option><option value="JP">Japan</option><option value="JO">Jordan</option><option value="KZ">Kazakhstan</option><option value="KE">Kenya</option><option value="KI">Kiribati</option><option value="KP">Korea, North</option><option value="KR">Korea, South</option><option value="KW">Kuwait</option><option value="KG">Kyrgyzstan</option><option value="LA">Laos</option><option value="LV">Latvia</option><option value="LB">Lebanon</option><option value="LS">Lesotho</option><option value="LR">Liberia</option><option value="LY">Libya</option><option value="LI">Liechtenstein</option><option value="LT">Lithuania</option><option value="LU">Luxembourg</option><option value="MO">Macau</option><option value="MG">Madagascar</option><option value="MW">Malawi</option><option value="MY">Malaysia</option><option value="MV">Maldives</option><option value="ML">Mali</option><option value="MT">Malta</option><option value="MH">Marshall Islands</option><option value="MQ">Martinique</option><option value="MR">Mauritania</option><option value="MU">Mauritius</option><option value="YT">Mayotte</option><option value="MX">Mexico</option><option value="FM">Micronesia</option><option value="MD">Moldova</option><option value="MC">Monaco</option><option value="MN">Mongolia</option><option value="MS">Monserrat</option><option value="MA">Morocco</option><option value="MZ">Mozambique</option><option value="MM">Myanmar</option><option value="NA">Namibia</option><option value="NR">Nauru</option><option value="NP">Nepal</option><option value="NL">Netherlands</option><option value="AN">Netherlands Antilles</option><option value="NC">New Caledonia</option><option value="NZ">New Zealand</option><option value="NI">Nicaragua</option><option value="NE">Niger</option><option value="NG">Nigeria</option><option value="NU">Niue</option><option value="NF">Norfolk Island</option><option value="MP">Northern Mariana Islands</option><option value="NO">Norway</option><option value="OM">Oman</option><option value="PK">Pakistan</option><option value="PW">Palau</option><option value="PA">Panama</option><option value="PG">Papua New Guinea</option><option value="PY">Paraguay</option><option value="PE">Peru</option><option value="PH">Philippines</option><option value="PN">Pitcairn</option><option value="PL">Poland</option><option value="PT">Portugal</option><option value="PR">Puerto Rico</option><option value="QA">Qatar</option><option value="RE">Reunion</option><option value="RO">Romania</option><option value="RU">Russian Federation</option><option value="RW">Rwanda</option><option value="LC">Saint Lucia</option><option value="WS">Samoa</option><option value="SM">San Marino</option><option value="ST">Sao Tome &amp; Principe</option><option value="SA">Saudi Arabia</option><option value="SN">Senegal</option><option value="SC">Seychelles</option><option value="SL">Sierra Leone</option><option value="SG">Singapore</option><option value="SK">Slovakia</option><option value="SI">Slovenia</option><option value="SB">Solomon Islands</option><option value="SO">Somalia</option><option value="ZA">South Africa</option><option value="ES">Spain</option><option value="LK">Sri Lanka</option><option value="SH">St. Helena</option><option value="KN">St. Kitts and Nevis</option><option value="PM">St. Pierre &amp; Miquelon</option><option value="VC">St. Vincent &amp; the Grenadines</option><option value="SR">Suriname</option><option value="SU">Sudan</option><option value="SY">Syria</option><option value="SJ">Svalbard &amp; Jan Mayen Islands</option><option value="SZ">Swaziland</option><option value="SE">Sweden</option><option value="CH">Switzerland</option><option value="TW">Taiwan</option><option value="TJ">Tajikistan</option><option value="TZ">Tanzania</option><option value="TH">Thailand</option><option value="TG">Togo</option><option value="TK">Tokelau</option><option value="TO">Tonga</option><option value="TT">Trinidad &amp; Tobago</option><option value="TN">Tunisia</option><option value="TR">Turkey</option><option value="TM">Turkmenistan</option><option value="TC">Turks &amp; Caicos Islands</option><option value="TV">Tuvalu</option><option value="UG">Uganda</option><option value="UA">Ukraine</option><option value="AE">United Arab Emirates</option><option value="UK">United Kingdom</option><option value="UM">United States Minor Islands</option><option value="VI">United States Virgin Islands</option><option value="UY">Uruguay</option><option value="UZ">Uzbekistan</option><option value="VU">Vanuatu</option><option value="VA">Vatican City</option><option value="VE">Venezuela</option><option value="VN">Vietnam</option><option value="WF">Wallis &amp; Futuna Islands</option><option value="EH">Western Sahara</option><option value="YE">Yemen</option><option value="YU">Yugoslavia</option><option value="ZB">Zimbabwe</option><option value="ZR">Zaire</option><option value="ZM">Zambia</option></select> -->
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="row">
                                    <div class="col-4 mb-10">
                                        <label class="align-right d-block">Region:</label>
                                    </div>
                                    <div class="col-8 mb-10 pl-0">
                                        <input id="org_region" name="org_region" type="text" maxlength="60" size="12"
                                            title="The region like Ontario or California where this wine or liquor product is from if specified">
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="row">
                                    <div class="col-4 mb-10">
                                        <label class="align-right d-block">City:</label>
                                    </div>
                                    <div class="col-8 mb-10 pl-0">
                                        <input id="org_city" name="org_city" type="text" maxlength="60" size="20"
                                            title="The city where this product is originally from if any">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="row">
                            <div class="col-4">
                                <div class="row">
                                    <div class="col-4 mb-10">
                                        <label class="align-right d-block">Alcohol %:</label>
                                    </div>
                                    <div class="col-8 mb-10 pl-0">
                                        <input id="alcohol_percent" name="alcohol_percent" type="text" maxlength="5"
                                            size="8" title="The percentage of alcohol in this product">*
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="row">
                                    <div class="col-4 mb-10">
                                        <label class="align-right d-block">Max In Stock:</label>
                                    </div>
                                    <div class="col-8 mb-10 pl-0">
                                        <input id="max_in_stock" name="max_in_stock" type="number" maxlength="10"
                                            size="8" step="0.001" value="0"
                                            title="Maximum qty allowed for this item. This number is used when purchasing or producing this item so we know how many to buy or produce.">*
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="row">
                                    <div class="col-4 mb-10">
                                        <label class="align-right d-block">Min In Stock:</label>
                                    </div>
                                    <div class="col-8 mb-10 pl-0">
                                        <input id="min_in_stock" name="min_in_stock" type="number" maxlength="10"
                                            size="8" step="0.001" value="0"
                                            title="The minimum in-stock for this item. If the in-stock value is less than this number, then we have to order the item">*
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-3 mb-10">
                        <label class="align-right">Description:</label>
                    </div>
                    <div class="col-8 mb-10 pl-0">
                        <textarea id="prod_desc" name="prod_desc" cols="70" rows="6"
                            title="Special description or remarks about the product" maxlength="4000"></textarea>
                    </div>
                </div>
                <div class="line_break"></div>
                <button type="submit" class="button font-bold radius-0">Save All</button>
            </form>
        </span>
    </div>
</div>

{{-- Create New Vintage --}}
<div class="ui-dialog ui-widget1 ui-widget-content ui-corner-all ui-front ui-draggable ui-resizable ajax_obj create-popup-form ui-draggable-create-new-vintage d-none "
    tabindex="-1" style="position: fiex; height: auto; width: 1080px; top: 278px; left: 88px;"
    role="dialog" aria-describedby="ajax_obj" aria-labelledby="ui-id-15">
    <div class="ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix">
        <span id="ui-id-15" class="ui-dialog-title">New Liquor</span>
        <button class="ui-button ui-widget1 ui-state-default ui-corner-all ui-button-icon-only ui-dialog-titlebar-close"
            role="button" aria-disabled="false" title="close">
            <span class="ui-button-icon-primary ui-icon ui-icon-closethick closethick-create-new-vintage-close"></span>
            <span class="ui-button-text">close</span>
        </button>
    </div>
    <div id="ajax_obj" class="ui-dialog-content ui-widget-content create-form-content" style="width: auto">
        <span id="new_wine_vintage" class="xmlb_form">
            <form method="post" id="frm_new_wine_vintage" action="{{ route('admin.liquor-product.vintage') }}"
                accept-charset="utf-8">
                @csrf
                <input type="hidden" name="p_gn_id" value="@if(isset($productGen)){{ $productGen->id }} @endif">
                <h2>New Vintage Under @if(isset($productGen)){{ $productGen->product_name }} @endif</h2>
                <br>
                <p><label>Vintage:</label><span class="element"><input id="vintage" name="vintage" type="text"
                            maxlength="4" size="3" title="This number tells us how old a wine product is"
                            fdprocessedid="29skvm">
                    </span><span class="mand_sign"></span></p>
                <p><label>Purchase Price:</label><span class="element"><input id="vintage_purchase_price"
                            name="vintage_purchase_price" type="number" step="0.01" maxlength="10"
                            title="Average purchase price for one unit of this item in its unit of measure and in the host currency for this item"
                            fdprocessedid="2tf9r">
                    </span><span class="mand_sign"></span></p>
                <p><label>Sell Price RA Inhouse:</label><span class="element"><input
                            id="new_wine_vintage_price_bq_inhouse" name="vintage_price_bq_inhouse" type="number"
                            step="0.01" maxlength="9" title="Banquet price for inhouse events" fdprocessedid="6xq26">
                    </span><span class="mand_sign"></span></p>
                <p><label>Sale Price RA Catering:</label><span class="element"><input
                            id="new_wine_vintage_price_bq_catering" name="vintage_price_bq_catering" type="number"
                            step="0.01" maxlength="9" title="Banquet price for catering  events" fdprocessedid="9pj9c">
                    </span><span class="mand_sign"></span></p>
                <p><label>Price Half Bottle:</label><span class="element"><input id="vintage_price_half_bottle"
                            name="vintage_price_half_bottle" type="number" step="0.01" maxlength="9"
                            title="If this is a wine, then this gives us the price for half bottle"
                            fdprocessedid="nkqoc4">
                    </span><span class="mand_sign"></span><label class="auto_width">Price Glass:</label><span
                        class="element"><input id="new_wine_vintage_price_by_glass" name="vintage_price_by_glass"
                            type="number" step="0.01" maxlength="9"
                            title="If this is a wine, then this gives us the price by glass" fdprocessedid="i4i7fs">
                    </span><span class="mand_sign"></span></p>

                <hr>

                <label class="auto_width">Grape Variety:</label>
                <div class="grape_variety_wrap vintage_edit_variety">
                    <p class="header"><span>Variety</span><span>Percent</span></p>
                    <!-- <p class="wrap_vintage" style="margin: 0 0 6px 0; line-height: 120%; padding: 2px;">
                        <span class="wine_prices_wrap">
                            <span role="status" aria-live="polite" class="ui-helper-hidden-accessible"></span><input
                                type="text" class="grape_name ui-autocomplete-input" value="" autocomplete="off"
                                fdprocessedid="q8f3ul" name="grape_name[]"></span><span><input type="number" name="grape_percent[]" step=".01" max="100"
                                class="grape_percent" value="" fdprocessedid="2o401">%</span><span><span
                                class="btn_delete_grape_var_row"><svg style="height: 1rem;" class="svg-inline--fa fa-trash-can"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-can"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z">
                                    </path>
                                </svg>
                            </span>
                        </span>
                    </p> -->
                </div>
                <span class="small_button btn_add_grape_var_vintage">Add Line +</span>
                <hr>
                <p><label>Description:</label><span class="element"><textarea id="vintage_prod_desc"
                            name="new_wine_vintage_prod_desc" cols="80" rows="6"
                            title="Special description or remarks about the product" maxlength="4000"></textarea>
                    </span><span class="mand_sign"></span></p>
                <br>
                <div class="form_footer">
                <input type="submit" class="button liquor_product_edit" value="Save" id="btn_save" fdprocessedid="e4e5jw">
                    <!-- <button class="button font-bold radius-0 liquor_product_edit">Save</button> -->
                </div>
            </form>
        </span>
    </div>
</div>

{{-- Edit Vintage --}}
<div class="ui-dialog ui-widget1 ui-widget-content ui-corner-all ui-front ui-draggable ui-resizable ajax_obj create-popup-form ui-draggable-edit-vintage d-none "
    tabindex="-1" style="position: fiex; height: auto; width: 840px; top: 306px; left: 208px;"
    role="dialog" aria-describedby="ajax_obj" aria-labelledby="ui-id-15">
    <div class="ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix">
        <span id="ui-id-15" class="ui-dialog-title">Edit Product Liquor</span>
        <button class="ui-button ui-widget1 ui-state-default ui-corner-all ui-button-icon-only ui-dialog-titlebar-close"
            role="button" aria-disabled="false" title="close">
            <span class="ui-button-icon-primary ui-icon ui-icon-closethick closethick-edit-vintage-close"></span>
            <span class="ui-button-text">close</span>
        </button>
    </div>
    <div id="ajax_obj" class="ui-dialog-content ui-widget-content create-form-content" style="width: auto">
        <span id="edit_product_vintage" class="xmlb_form">
            <form method="post" id="frm_edit_product_vintage" action="{{ route('admin.liquor-product.vintage.update') }}" accept-charset="utf-8"
                enctype="multipart/form-data">
                @csrf

                <input type="hidden" name="vintage_pro_id" value="">
                <br>
                <p><label>Part #:</label><span class="element"><input id="new_prod_sku" name="vintage_part_id" type="text"
                            maxlength="34" size="23" title="SKU or item number for this product" fdprocessedid="d1iw0c">
                    </span><span class="mand_sign"></span></p>
                    <br>
                <p><label>Vintage:</label><span class="element"><input id="edit_product_vintage_vintage"
                            name="vintage" type="text" maxlength="4" size="3"
                            title="This number tells us how old a wine product is" fdprocessedid="857hot">
                    </span><span class="mand_sign"></span></p>
                    <br>
                <p><label>Purchase Price:</label><span class="element"><input id="edit_product_vintage_purchase_price"
                            name="vintage_purchase_price" type="number" step="0.01" maxlength="10"
                            title="Average purchase price for one unit of this item in its unit of measure and in the host currency for this item"
                            fdprocessedid="wik0in">
                    </span><span class="mand_sign"></span></p>
                    <br>
                <p><label>Purchase Price (Case):</label><span class="element"><input
                            id="edit_product_vintage_purchase_price_case"
                            name="vintage_purchase_price_case" type="number" step="0.01" maxlength="10"
                            title="Purchase price by case" fdprocessedid="284v78">
                    </span><span class="mand_sign"></span></p>
                    <br>
                <p><label>Sell Price RA Inhouse:</label><span class="element"><input
                            id="edit_product_vintage_price_bq_inhouse" name="vintage_price_bq_inhouse"
                            type="number" step="0.01" maxlength="9" title="Banquet price for inhouse events"
                            fdprocessedid="x77cz9">
                    </span><span class="mand_sign"></span><label class="auto_width">Sale Price RA Catering:</label><span
                        class="element"><input id="edit_product_vintage_price_bq_catering"
                            name="vintage_price_bq_catering" type="number" step="0.01" maxlength="9"
                            title="Banquet price for catering  events" fdprocessedid="4vjief">
                    </span><span class="mand_sign"></span></p>
                    <br>
                <p><label>CR Inhouse:</label><span class="element"><input id="edit_product_vintage_price_rstn_inhouse"
                            name="vintage_price_rstn_inhouse" type="number" step="0.01" maxlength="9"
                            title="Restaurant price for inhouse events" fdprocessedid="aqh6ge">
                    </span><span class="mand_sign"></span><label class="auto_width">CR Catering:</label><span
                        class="element"><input id="edit_product_vintage_price_rstn_catering"
                            name="vintage_price_rstn_catering" type="number" step="0.01" maxlength="9"
                            title="Restaurant price for catering events" fdprocessedid="5lu6hi">
                    </span><span class="mand_sign"></span></p>
                    <br>
                <p><label>Price Half Bottle:</label><span class="element"><input
                            id="edit_product_vintage_price_half_bottle" name="vintage_price_half_bottle"
                            type="number" step="0.01" maxlength="9"
                            title="If this is a wine, then this gives us the price for half bottle"
                            fdprocessedid="ir1rq">
                    </span><span class="mand_sign"></span><label class="auto_width">Price Glass:</label><span
                        class="element"><input id="edit_product_vintage_price_by_glass"
                            name="vintage_price_by_glass" type="number" step="0.01" maxlength="9"
                            title="If this is a wine, then this gives us the price by glass" fdprocessedid="wkkzk">
                    </span><span class="mand_sign"></span></p>
                    <br>
                <p><label>Other Price:</label><span class="element"><input id="edit_product_vintage_price_others"
                            name="vintage_price_others" type="number" step="0.01" maxlength="9"
                            title="Sometimes they sell liquor by say ounce or 2 ounces. In that case this column keeps the price and the next one the unit"
                            fdprocessedid="x2bjn5">
                    </span><span class="mand_sign"></span><label class="auto_width">Other Price Unit:</label><span
                        class="element"><select id="edit_product_vintage_price_others_unit"
                            name="vintage_price_others_unit" fdprocessedid="xvt5o">
                            <option value="" selected="selected">----</option>
                            <option value="OZ">Oz</option>
                            <option value="2O">2 Oz</option>
                        </select></span><span class="mand_sign"></span></p>
                        <br>
                <p><label>Status:</label><span class="element"><select id="edit_product_vintage_prod_status"
                            name="vintage_prod_status" fdprocessedid="6ehb8c">
                            <option value="1" selected="selected">Active</option>
                            <option value="2">End of Line</option>
                        </select></span><span class="mand_sign">*</span></p><input id="txt_grape_variety"
                    name="txt_grape_variety" type="text" maxlength="256" size="34"
                    title="If this is wine, then they may also enter the grape variety of it like Shiraz"
                    style="display: none;">

                <hr>

                <label class="auto_width">Grape Variety:</label>
                <div class="grape_variety_wrap vintage_edit_variety">
                    <p class="header"><span>Variety</span><span>Percent</span></p>
                    <!-- <p class="wrap_vintage" style="margin: 0 0 6px 0; line-height: 120%; padding: 2px;">
                        <span class="wine_prices_wrap">
                            <span role="status" aria-live="polite" class="ui-helper-hidden-accessible"></span><input
                                type="text" class="grape_name ui-autocomplete-input" value="" autocomplete="off"
                                fdprocessedid="q8f3ul" name="grape_name[]"></span><span><input type="number" name="grape_percent[]" step=".01" max="100"
                                class="grape_percent" value="" fdprocessedid="2o401">%</span><span><span
                                class="btn_delete_grape_var_row"><svg style="height: 1rem;" class="svg-inline--fa fa-trash-can"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-can"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z">
                                    </path>
                                </svg>
                            </span>
                        </span>
                    </p> -->
                </div>
                <span class="small_button btn_add_grape_var_vintage">Add Line +</span>
                <hr>                
                <p><label>Description:</label><span class="element"><textarea id="edit_product_vintage_prod_desc"
                            name="vintage_prod_desc" cols="80" rows="6"
                            title="Special description or remarks about the product" maxlength="4000"></textarea>
                    </span><span class="mand_sign"></span></p>
                <br>
                <div class="form_footer">
                    <input type="submit" value="Save" id="btn_save" class="button" fdprocessedid="p0l6j9">
                </div>
            </form>
        </span>
    </div>
</div>

{{-- Adjust Qtys--}}
<div class="ui-dialog ui-widget1 ui-widget-content ui-corner-all ui-front ui-draggable ui-resizable ajax_obj create-popup-form ui-draggable-adjust-qtys d-none "
    tabindex="-1" style="position: absolute; height: auto; width: 540px; top: 465px; left: 358px;"
    role="dialog" aria-describedby="ajax_obj" aria-labelledby="ui-id-15">
    <div class="ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix">
        <span id="ui-id-15" class="ui-dialog-title">Manually Receive Items</span>
        <button class="ui-button ui-widget1 ui-state-default ui-corner-all ui-button-icon-only ui-dialog-titlebar-close"
            role="button" aria-disabled="false" title="close">
            <span class="ui-button-icon-primary ui-icon ui-icon-closethick closethick-adjust-qtys-close"></span>
            <span class="ui-button-text">close</span>
        </button>
    </div>
    <div id="ajax_obj" class="ui-dialog-content ui-widget-content create-form-content" style="width: auto">
        <span id="ajust_item_inventory_qty" class="xmlb_form"><br>
            <div class="adjust_qty">
                <h2 style="text-align: center;">Adjust Item Quantity<br><br>@if(isset($productGen)){{ $productGen->product_name }} @endif</h2>
                <br>
                <p>
                <label>Select the Warehouse:</label>
                <select class="rec_inv_level" fdprocessedid="8yo8xg">
                    <option value="----">----</option>
                    <option value="1">1st. Floor Wine Room [6]</option>
                    <option value="2">2nd. Floor Wine Room  [6]</option>
                    <option value="3">Banquet Hall Liquor Room [14]</option>
                    <option value="4">Beer Fridge (East) [0]</option>
                    <option value="5">Beer Fridge (West) [0]</option>
                    <option value="6">Greenhouse Liquor Room [0]</option>
                    <option value="7">Greenhouse Beer Fridge [8]</option>
                    <option value="10">Conservatory Beer Fridge [0]</option>
                    <option value="11">Consulate Warehouse [6]</option>
                </select>
                </p>
                <br>
                <p>
                    <label>Number of Cases:</label>
                    <input type="number" class="num_packs" min="0" step="1" value="0" fdprocessedid="pq6teg">
                </p>
                <br>
                <p>
                    <label>Number of Singles:</label>
                    <input type="number" class="num_singles" min="0" step="0.25" value="0" fdprocessedid="77irb">
                </p>
                <br>
                <p>
                    <label>Adjustment Date:</label>
                    <input type="date" id="item_adjust_date" name="item_adjust_date" value="{{ date('Y-m-d') }}" class="hasDatepicker" fdprocessedid="15bgdg">
                </p>
                <br>
                <p>
                    <label>Adjustment Notes:</label>
                    <textarea id="item_adjust_notes" name="item_adjust_notes" cols="30" rows="3"></textarea>
                </p>
                <br>
                <button class="button font-bold radius-0" fdprocessedid="um8veg">Adjust Qty</button>
            </div>
        </span>
    </div>
</div>

{{--Manual Receive--}}
<div class="ui-dialog ui-widget1 ui-widget-content ui-corner-all ui-front ui-draggable ui-resizable ajax_obj create-popup-form ui-draggable-manual-receive d-none "
    tabindex="-1" style="position: absolute; height: auto; width: 540px; top: 465px; left: 358px;"
    role="dialog" aria-describedby="ajax_obj" aria-labelledby="ui-id-15">
    <div class="ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix">
        <span id="ui-id-15" class="ui-dialog-title">Manually Receive Items</span>
        <button class="ui-button ui-widget1 ui-state-default ui-corner-all ui-button-icon-only ui-dialog-titlebar-close"
            role="button" aria-disabled="false" title="close">
            <span class="ui-button-icon-primary ui-icon ui-icon-closethick closethick-manual-receive-close"></span>
            <span class="ui-button-text">close</span>
        </button>
    </div>
    <div id="ajax_obj" class="ui-dialog-content ui-widget-content create-form-content" style="width: auto">
        <span id="manually_receive_item" class="xmlb_form"><br>
            <div class="manual_reception">
                <h2 style="text-align: center;">Manually Receive @if(isset($productGen)){{ $productGen->product_name }} @endif / Vintage: 23</h2>
                <br>
                <p>
                    <label>Singles:</label>
                    <input type="number" class="num_singles" min="0" step="1" fdprocessedid="x3f3xv">
                </p>
                <br>
                <p>
                    <label>Packs:</label>
                    <input type="number" class="num_packs" min="0" step="1" fdprocessedid="ce04f5">
                </p>
                <br>
                <p>
                    <label>Select the Warehouse:</label>
                    <select class="rec_inv_level" fdprocessedid="9y45dn">
                        <option value="----">----</option>
                        <option value="1">1st. Floor Wine Room</option>
                        <option value="2">2nd. Floor Wine Room </option>
                        <option value="3">Banquet Hall Liquor Room</option>
                        <option value="4">Beer Fridge (East)</option>
                        <option value="5">Beer Fridge (West)</option>
                        <option value="6">Greenhouse Liquor Room</option>
                        <option value="7">Greenhouse Beer Fridge</option>
                        <option value="10">Conservatory Beer Fridge</option>
                        <option value="11">Consulate Warehouse</option>
                    </select>
                </p>
                <br>
                <p>
                    <label>Reception Date:</label>
                    <input type="date" id="item_receive_date" name="item_receive_date" value="{{ date('Y-m-d') }}" class="hasDatepicker" fdprocessedid="6nis6m">
                </p>
                <br>
                <p>
                    <label>Reception Notes:</label>
                    <textarea id="item_receive_notes" name="item_receive_notes" cols="30" rows="3"></textarea>
                </p>
                <br>
                <button class="button font-bold radius-0" fdprocessedid="r0uzkg">Receive</button>
            </div> 
        </span>
    </div>
</div>

{{--Return Liquor to Supplier--}}
<div class="ui-dialog ui-widget1 ui-widget-content ui-corner-all ui-front ui-draggable ui-resizable ajax_obj create-popup-form ui-draggable-return-supplier d-none "
    tabindex="-1" style="position: absolute; height: auto; width: 540px; top: 465px; left: 358px;"
    role="dialog" aria-describedby="ajax_obj" aria-labelledby="ui-id-15">
    <div class="ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix">
        <span id="ui-id-15" class="ui-dialog-title">Return Liquor to Supplier</span>
        <button class="ui-button ui-widget1 ui-state-default ui-corner-all ui-button-icon-only ui-dialog-titlebar-close"
            role="button" aria-disabled="false" title="close">
            <span class="ui-button-icon-primary ui-icon ui-icon-closethick closethick-return-supplier-close"></span>
            <span class="ui-button-text">close</span>
        </button>
    </div>
    <div id="ajax_obj" class="ui-dialog-content ui-widget-content create-form-content" style="width: auto">
        <span id="return_liquor_to_supplier" class="xmlb_form"><br>
            <div class="return_supplier">
                <h2 style="text-align: center;">Return to Supplier:<br>hello / Vintage: 23</h2>
                <br>
                <p>
                    <label>Select the Warehouse:</label>
                    <select class="rec_inv_level" fdprocessedid="925018">
                        <option value="----">----</option>
                        <option value="1,6">1st. Floor Wine Room (6)</option>
                        <option value="3,14">Banquet Hall Liquor Room (14)</option>
                        <option value="7,8">Greenhouse Beer Fridge (8)</option>
                        <option value="11,6">Consulate Warehouse (6)</option>
                        <option value="2,6">2nd. Floor Wine Room  (6)</option>
                    </select>
                </p>
                <br>
                <p>
                    <label>Packs (Case of 6):</label> 
                    <input type="number" class="num_packs" min="0" step="1" value="0" fdprocessedid="mgoirj">
                </p>
                <br>
                <p>
                    <label>Singles:</label> 
                    <input type="number" class="num_singles" min="0" step="1" value="0" fdprocessedid="yrxr8">
                </p>
                <br>
                <p>
                    <label>Select the Supplier:</label>
                    <select class="supplier" fdprocessedid="reuahc">
                        <option value="----">----</option>
                        <option value="16">A-1 cleaning </option>
                        <option value="54">Abcon</option>
                        <option value="53">Banville Wine Merchants</option>
                        <option value="46">Beer Store</option>
                        <option value="3">Bonanza</option>
                        <option value="60">Breakthru Beverage Canada (B &amp; W Wines)</option>
                        <option value="68">Camcarb</option><option value="55">Charton-Hobs</option>
                        <option value="57">Churchill Cellars</option><option value="64">Corveste Wines</option>
                        <option value="24">Dinetz</option><option value="4">Euro Desserts</option>
                        <option value="5">Euro Harvest</option><option value="39">Fairfield Inn and Suites </option>
                        <option value="50">Fettah</option><option value="22">Frid and Russell</option>
                        <option value="6">Gordon Food Services</option><option value="7">Grande Cheese</option>
                        <option value="65">Grape Brands Fine Wines and Spirits</option><option value="19">Hama Sushi</option>
                        <option value="13">Hidden Valley </option><option value="41">Holiday Inn Express</option>
                        <option value="42">Inn on the Moraine </option><option value="8">Jenco Specialties INC</option>
                        <option value="9">Jolly Foods </option><option value="43">LCBO</option>
                        <option value="11">Lisboa Bakery</option><option value="58">Marram Fine Wines</option>
                        <option value="17">Memories Floriest</option><option value="40">Monte Carlo</option>
                        <option value="74">parmeshwar</option><option value="73">pavan</option>
                        <option value="44">Profile Wine Group</option><option value="30">R-Distributing</option>
                        <option value="18">Rebekka Sushi</option><option value="31">Regina Noodle</option><option value="12">RNCS</option><option value="49">Rogers and Co</option><option value="1" selected="selected">Royal Ambassador</option><option value="32">Sabrina Foods </option><option value="33">Sani Clean</option><option value="34">Sicilian Ice Cream</option><option value="63">Stem Wine Group Inc.</option><option value="25">Superior Propane</option><option value="35">Sysco Foods</option><option value="48">Tawse Winery</option><option value="61">The Vine Agency</option><option value="66">Tre Amici</option><option value="38">Trevi Fountain</option><option value="69">True Theory</option><option value="51">TWC</option><option value="62">Unknown</option><option value="37">Veggie Boy</option><option value="67">Vertical Wine Group</option><option value="56">Victorica Wines</option><option value="52">Violet Hills Wine Imports</option><option value="47">Viva Spumanti</option><option value="59">Windrush</option></select></p>
                <br>
                <button class="button font-bold radius-0" fdprocessedid="q0rvdd">Return to Supplier</button>
            </div>
        </span>
    </div>
</div>