@extends('admin.layouts.master')
@section('title', 'Product Liquor Details')
@section('style')
    <style>
        .prod_status_active {
            background: #6FBC53;
            color: #FFF;
        }

        .prod_status_eol {
            background: #EE1E74;
            color: #FFF;
        }
        .grape_variety_wrap {
            margin-left: 10em;
            width: 30em;
        }

        .grape_variety_wrap p {
            display: grid;
            grid-template-columns: 6fr 1.5fr .4fr;
        }

        .grape_name {
            width: 92%;
        }

        .grape_percent {
            width: 70%;
        }

        .btn_delete_grape_var_row {
            cursor: pointer;
            color: #F7941E;
        }
        #edit_product_vintage label {
            display: inline-block;
            float: none;
            width: 13em;
        }

        #edit_product_vintage .element {
            float: none;
        }
        .small_button {
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
        #ajust_item_inventory_qty label,#manually_receive_item label,#return_liquor_to_supplier label {
            display: inline-block; 
            float: none; width: 15em;
        }
        #ajust_item_inventory_qty .element,#manually_receive_item .element,#return_liquor_to_supplier .element {
            float: none;
        }
        a {
            text-decoration: none;
        }

        /* Drag & Drop */
        .dropzone.dz-clickable {
            cursor: pointer;
        }
        .dropzone {
            background: white none repeat scroll 0 0;
            border: 2px dashed #0087f7; 
            border-radius: 5px;
            background: white none repeat scroll 0 0;
            min-height: 150px; 
            padding: 54px;
        }
        .dropzone, .dropzone * {
            box-sizing: border-box;
        }      
        .dropzone .dz-message {
            margin: 2em 0; text-align: center;
        }
        .dropzone .dz-message span {
            font-weight: 400; 
            font-size: 1.4em; color: #646c7f;}
        .attached_docs_wrap {
            border: 1px solid #000;
        }
        #handle_attached_docs .card {
            display: inline-block; 
            min-height: 5em;
            vertical-align: top; margin: .5em;
        }
        .file_wrap {
            width: 18em; 
            overflow: hidden;
        }
        #handle_attached_docs .card > div {
            margin: .5em;
        }
        #handle_attached_docs .att_doc_edit, #handle_attached_docs .att_doc_delete {
            cursor: pointer;
        }
        .att_doc_edit_wrap input {
            width: 25em;
        }
        .card.form_wrap {
            display: inline-block;
            width: 48%;
        }
        #ui-id-1 p {
            margin: 0 0 6px 0;
            line-height: 120%;
            padding: 2px;
        }
        .cover_pic img {
            max-height: 24em;
        }
    </style>
@endsection
@section('content')
<div class="title_bar card">
    <span id="product_summary" class="xmlb_form">
        <h2>{{ $productGen->category->cat_name }} -:- {{ $productGen->sku }} {{$productGen->product_name}} </h2>
        <h2>({{$productGen->productLiquor->liquorSize->size}})</h2> / <h2>Supplier: <a
                href="{{ route('admin.supplier.show', $productGen->supplier->id) }}">{{$productGen->supplier->supplier_name}}</a>
        </h2>
    </span>
</div>
<div class="line_break"></div>
<div id="event_tabs" class="tab_content ui-tabs ui-widget ui-widget-content ui-corner-all">
    <ul class="ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all" role="tablist">
        <li class="ui-state-default ui-corner-top ui-tabs-active ui-state-active" role="tab">
            <a href="#" class="ui-tabs-anchor" role="presentation" tabindex="-1" id="ui-id-1">Product Details</a>
        </li>
    </ul>
    <div class="ui-tabs-panel ui-widget-content ui-corner-bottom" id="event_tabs-1" aria-labelledby="ui-id-1"
        role="tabpanel" aria-expanded="true" aria-hidden="false">
        <div class="cus-row ">
            <div class="col-6 main-order-item">
                <div class="global-form main-form">
                    <form method="post" id="frm_product_liquor_details" action="" accept-charset="utf-8"
                        enctype="multipart/form-data">
                        <h3>Main
                            <button type="button" class="button font-bold radius-0 liquor_product_edit"
                                product_id="{{ $productGen->id }}">Edit</button>
                        </h3>
                        <hr>
                        <div class="row">
                            <div class="col-4 mb-10">
                                <label class="align-right d-block">Category:</label>
                            </div>
                            <div class="col-8 mb-10 pl-0">
                                <span class="element">{{ $productGen->category->cat_name }}</span>
                                <span class="mand_sign"></span>
                            </div>
                            <div class="col-4 mb-10">
                                <label class="align-right d-block">Brand:</label>
                            </div>
                            <div class="col-8 mb-10 pl-0">
                                <span class="element">{{ $productGen->productLiquor->liquorBrand->lbrand_name }}</span>
                                <span class="mand_sign"></span>
                            </div>
                            <div class="col-4 mb-10">
                                <label class="align-right d-block">Purchased In:</label>
                            </div>
                            <div class="col-8 mb-10 pl-0">
                                <span class="element">{{ $productGen->productLiquor->packageType->package_name }}</span>
                                <span class="mand_sign"></span>
                            </div>
                            <div class="col-4 mb-10">
                                <label class="align-right d-block">Bottle Size:</label>
                            </div>
                            <div class="col-8 mb-10 pl-0">
                                <span class="element">{{ $productGen->productLiquor->liquorSize->size }}</span>
                                <span class="mand_sign"></span>
                            </div>
                            <div class="col-4 mb-10">
                                <label class="align-right d-block">Purchase Price:</label>
                            </div>
                            <div class="col-8 mb-10 pl-0">
                                <span class="element">${{ number_format($productGen->purchase_price,2) }}</span>
                                <span class="mand_sign"></span>
                            </div>
                            <div class="col-4 mb-10">
                                <label class="align-right d-block">Per Single:</label>
                            </div>
                            <div class="col-8 mb-10 pl-0">
                                <span class="element">$42.90</span>
                                <span class="mand_sign"></span>
                            </div>
                            <div class="col-4 mb-10">
                                <label class="align-right d-block">Sell Price RA Inhouse:</label>
                            </div>
                            <div class="col-8 mb-10 pl-0">
                                <span class="element">${{ number_format($productGen->price_bq_inhouse) }}</span>
                                <span class="mand_sign"></span>
                            </div>
                            <div class="col-4 mb-10">
                                <label class="align-right d-block">Other Price:</label>
                            </div>
                            <div class="col-8 mb-10 pl-0">
                                <span class="element">$8.00 per</span>
                                <span class="warning">Unit not Set</span>
                                <span class="mand_sign"></span>
                            </div>
                            <div class="col-4 mb-10">
                                <label class="align-right d-block">Avg Consume:</label>
                            </div>
                            <div class="col-8 mb-10 pl-0">
                                <span class="element">0.0000</span>
                                <span class="mand_sign"></span>
                            </div>
                            <div class="col-4 mb-10">
                                <label class="align-right d-block">Brand:</label>
                            </div>
                            <div class="col-8 mb-10 pl-0">
                                <span class="element">{{ $productGen->productLiquor->liquorBrand->lbrand_name }}</span>
                                <span class="mand_sign"></span>
                            </div>
                            <div class="col-4 mb-10">
                                <label class="align-right d-block">Alcohol:</label>
                            </div>
                            <div class="col-8 mb-10 pl-0">
                                <span class="element">{{ $productGen->productLiquor->alcohol_percent }}%</span>
                                <span class="mand_sign"></span>
                            </div>
                            <div class="col-4 mb-10">
                                <label class="align-right d-block">Region:</label>
                            </div>
                            <div class="col-8 mb-10 pl-0">
                                <span
                                    class="element">{{ $productGen->productLiquor->org_city?$productGen->productLiquor->org_city .', ':''  }}
                                    {{ $productGen->productLiquor->org_region?$productGen->productLiquor->org_region .', ':''  }}
                                    {{ $productGen->productLiquor->org_country?getAllCountryNames()[$productGen->productLiquor->org_country]:''}}</span>
                                <span class="mand_sign"></span>
                            </div>
                        </div>
                        <div class="line_break"></div>
                        <div class="form_footer">
                            <button type="button" id="" class="button delete_product"
                                product_id="{{$productGen->id}}">Delete</button>
                        </div>
                        <fieldset class="edit_supps_wrap">
                            <legend>Suppliers</legend>
                            <p class="supp_prod_row header" style="display: grid;grid-template-columns: 5fr 3fr 1fr;">
                                <span>Supplier</span>
                                <span>SKU</span>
                            </p>
                            @foreach($productGen->suppliers as $_supplier)
                            <p class="supp_prod_row" style="display: grid;grid-template-columns: 5fr 3fr 1fr;">
                                <span>
                                    <a
                                        href="{{ route('admin.supplier.show', $_supplier->supplier->id) }}">{{ $_supplier->supplier->supplier_name }}</a>
                                </span>
                                <span>
                                    {{ $_supplier->supplier->vendor_part_num }}
                                </span>
                            </p>
                            @endforeach
                            <div class="line_break"></div>
                        </fieldset>
                        <br>
                        @if($productGen->lnk_cat == 102)
                            <h2>Vintages  <span style="cursor: pointer;" class="add_new_vintage btn"><svg style="color: #0782C1; height: 1em; vertical-align: -0.140em;" class="svg-inline--fa fa-plus" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="plus" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"></path></svg><!-- <i class="fa-solid fa-plus"></i> Font Awesome fontawesome.com --></span>
                                <!-- <button type="button" class="button font-bold radius-0 add_new_vintage">Add</button> -->
                            </h2>
                            <hr>
                        @endif
                        @if(count($vintages) == 0)
                        <h3>In Warehouse</h3>
                        <hr>
                        <div class="in_warehouse">
                            <a href="javascript:void(0)">
                                <span class="small_button btn_adjust_qtys">Adjust Qtys</span>
                            </a>
                            <a href="javascript:void(0)">
                                <span class="small_button btn_manual_receive">Manual Receive</span>
                            </a>
                            <a href="javascript:void(0)">
                                <span class="small_button btn_return_supplier">Return</span>
                            </a>
                        </div>
                        <div class="line_break"></div>
                        <h3>Quantities
                            <button type="button" class="button font-bold radius-0 liquor_product_edit"
                                product_id="{{ $productGen->id }}">Edit</button>
                        </h3>
                        <hr>
                        <div class="row">
                            <div class="col-4 mb-10">
                                <label class="align-right d-block">Dec. Points:</label>
                            </div>
                            <div class="col-8 mb-10 pl-0">
                                <span class="element">{{ number_format($productGen->decimal_points??0, 2) }}</span>
                                <span class="mand_sign"></span>
                            </div>
                            <div class="col-4 mb-10">
                                <label class="align-right d-block">Qty on Hand:</label>
                            </div>
                            <div class="col-8 mb-10 pl-0">
                                <span class="element">{{ number_format($productGen->qty_on_hand??0, 2) }}</span>
                                <span class="mand_sign"></span>
                            </div>
                            <div class="col-4 mb-10">
                                <label class="align-right d-block">Qty At Event:</label>
                            </div>
                            <div class="col-8 mb-10 pl-0">
                                <span class="element">{{ number_format($productGen->qty_at_event??0, 2) }}</span>
                                <span class="mand_sign"></span>
                            </div>
                            <div class="col-4 mb-10">
                                <label class="align-right d-block">Max in Stock:</label>
                            </div>
                            <div class="col-8 mb-10 pl-0">
                                <span class="element">{{ number_format($productGen->max_in_stock??0, 2) }}</span>
                                <span class="mand_sign"></span>
                            </div>
                            <div class="col-4 mb-10">
                                <label class="align-right d-block">Min in Stock:</label>
                            </div>
                            <div class="col-8 mb-10 pl-0">
                                <span class="element">{{ number_format($productGen->min_in_stock??0, 2) }}</span>
                                <span class="mand_sign"></span>
                            </div>
                            <div class="col-4 mb-10">
                                <label class="align-right d-block">Status:</label>
                            </div>
                            <div class="col-8 mb-10 pl-0">
                                <span
                                    class="element {{$productGen->prod_status==1?'prod_status_active':'prod_status_eol'}}">{{ $productGen->prod_status==1?'Active':'End of Line' }}</span>
                                <span class="mand_sign"></span>
                            </div>
                            <div class="col-4 mb-10">
                                <label class="align-right d-block">DTZ:</label>
                            </div>
                            <div class="col-8 mb-10 pl-0">
                                <span class="element">{{ number_format($productGen->days_to_zero??0, 2) }}</span>
                                <span class="mand_sign"></span>
                            </div>
                            <div class="col-4 mb-10">
                                <label class="align-right d-block">Description:</label>
                            </div>
                            <div class="col-8 mb-10 pl-0">
                                <span class="element">{{ $productGen->prod_desc }}</span>
                                <span class="mand_sign"></span>
                            </div>
                        </div>
                        @endif
                    </form>
                    @foreach($vintages as $_vintag)
                    <div class="vintage_row card" gn_prod_id="2664">
                        <div>
                            <div class="title">
                                <h3>{{ $_vintag->productLiquor->vintage }}</h3>
                                <span></span>
                                <span>
                                    <button type="button" class="edit_vintage" vintage_id="{{ $_vintag->id  }}">Edit</button>
                                    <span class="btn_delete_vintage">
                                        <button type="button" class="delete_vintage" vintage_id="{{ $_vintag->id  }}">Delete</button>
                                    </span>
                                </span>
                            </div>
                            <hr>
                            <div class="prices"><span><strong>Purchase Price (case):</strong>
                                    ${{number_format($_vintag->purchase_price_case, 2)}}</span><span><strong>Bottle
                                        Price:</strong>{{ number_format($_vintag->price_bq_inhouse, 2) }}</span><span><strong>Half:</strong>
                                    ${{ number_format($_vintag->productLiquor->price_half_bottle, 2) }}</span><span><strong>Glass:</strong> ${{ number_format($_vintag->productLiquor->price_by_glass, 2) }}</span><span><strong>Online 
                                        <!-- <i class="fas fa-mouse"></i> Font Awesome fontawesome.com -->:</strong>
                                    ${{number_format($_vintag->price_bq_catering, 2)}}</span><span> | <strong>${{ number_format($_vintag->productLiquor->price_others, 2) }} per {{ $_vintag->productLiquor->price_others_unit }}</strong></span></div>
                            <hr>
                            <div class="in_warehouse">
                                <h4>In Warehouse:</h4><br>
                                <a href="javascript:void(0)">
                                    <span class="small_button btn_adjust_qtys">Adjust Qtys</span>
                                </a>
                                <a href="javascript:void(0)">
                                    <span class="small_button btn_manual_receive">Manual Receive</span>
                                </a>
                                <a href="javascript:void(0)">
                                    <span class="small_button btn_return_supplier">Return</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="card form_wrap">
                <div class="cover_pic">
                    @if(!empty($cover_pic) && $cover_pic->file_type == 'IMG')
                        <img src="{{ asset($cover_pic->org_file_name) }}">
                    @endif
                </div>  
                <br>
                <span id="handle_attached_docs" class="xmlb_form">
                    <form action="{{ route('admin.marketing-documents.store') }}" class="dropzone dz-clickable" id="doc-upload">
                        @csrf
                        <input type="hidden" name="lnk_related_rec" value="{{ $productGen->id }}">
                        <input type="hidden" name="usage_type" value="PRT">
                        <!-- The value of this hidden input: fname_prefix is added by the upload handler
                        to the begining of the file name before copying into temp folder. This way we make
                        sure if two users are uploading the files with eaxt same name, will not overwrite
                        each other's work
                        -->          
                        <div class="dz-default dz-message">
                            <span>Drag &amp; Drop Files here or Click to Upload</span>
                        </div>
                    </form>
                    <br>
                    <div class="attached_docs_wrap"></div>
                </span>
            </div>
            <!-- <div class="col-6">
                <div class="card form_wrap">
                    <div class="cover_pic"></div>
                    <br>
                    <span id="handle_attached_docs" class="xmlb_form">
                        <form action="/plugin/dropzone/upload_handler.php" class="dropzone dz-clickable"
                            id="doc-upload">

                            <div class="dz-default dz-message">
                                <span>Drag &amp; Drop Files here or Click to Upload</span>
                            </div>
                        </form>
                        <br>
                        <div class="attached_docs_wrap"></div>
                    </span>
                </div>
            </div> -->
        </div>
        <div class="line_break"></div>
        <div class="line_break"></div>
        <div class="cus-row ">
            <div class="col-6 main-order-item card">
                <form method="post" id="frm_on_purchase_orders" action="">
                    @csrf
                    <h2>On Purchase (Records: 1 to 10 of 48 | Show: <select name="show_records" id="show_records"
                            onchange="handleShowRecords('on_purchase_orders',this.value) ;">
                            <option value="all">All</option>
                            <option value="10" selected="">10</option>
                            <option value="30">30</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>)</h2>
                    <hr>
                    <table class="product-list table mt-20">
                        <tr>
                            <th>
                                <a href="#"
                                    onclick="handleListSorting('on_purchase_orders','{cs:PO_DATE DESC}','{ns:PO_NUMBER ASC}') ; return false ;"
                                    title="Click to sort by PO Number">PO Number</a>
                            </th>
                            <th>
                                <a href="#"
                                    onclick="handleListSorting('on_purchase_orders','{cs:PO_DATE DESC}','{ns:PO_DATE ASC}') ; return false ;"
                                    title="Click to sort by PO Date">PO Date</a>
                            </th>
                            <th>
                                <a href="#"
                                    onclick="handleListSorting('on_purchase_orders','{cs:PO_DATE DESC}','{ns:NUM_PACKS ASC}') ; return false ;"
                                    title="Click to sort by Num Cases">Num Cases</a>
                            </th>
                            <th>
                                <a href="#"
                                    onclick="handleListSorting('on_purchase_orders','{cs:PO_DATE DESC}','{ns:PRICE_PER_PACK ASC}') ; return false ;"
                                    title="Click to sort by Price/Case">Price/Case</a>
                            </th>
                            <th>
                                <a href="#"
                                    onclick="handleListSorting('on_purchase_orders','{cs:PO_DATE DESC}','{ns:UNIT_PRICE ASC}') ; return false ;"
                                    title="Click to sort by Unit Price">Unit Price</a>
                            </th>
                        </tr>
                        <tr>
                            <td><a href="#">PO510959</a></td>
                            <td>2023-10-24</td>
                            <td>1.0</td>
                            <td>$42.90</td>
                            <td>$42.90</td>
                        </tr>
                        <tr>
                            <td><a href="#">PO510951</a></td>
                            <td>2023-10-10</td>
                            <td>3.0</td>
                            <td>$42.90</td>
                            <td>$42.90</td>
                        </tr>
                        <tr>
                            <td><a href="#">PO510931</a></td>
                            <td>2023-09-05</td>
                            <td>4.0</td>
                            <td>$42.90</td>
                            <td>$42.90</td>
                        </tr>
                        <tr>
                            <td><a href="#">PO510926</a></td>
                            <td>2023-08-28</td>
                            <td>4.0</td>
                            <td>$42.90</td>
                            <td>$42.90</td>
                        </tr>
                        <tr>
                            <td><a href="#">PO510921</a></td>
                            <td>2023-08-21</td>
                            <td>1.0</td>
                            <td>$42.90</td>
                            <td>$42.90</td>
                        </tr>
                    </table>
                    <div>
                        <div class="page_nav_wrap"><span class="page_nav_cell round_box_3px">&lt;&lt;</span><span
                                class="page_nav_cell round_box_3px cur_page">1</span><span
                                class="page_nav_cell round_box_3px"><a page_no="2"
                                    href="javascript:doPageNavigation('on_purchase_orders',2);">2</a></span><span
                                class="page_nav_cell round_box_3px"><a page_no="3"
                                    href="javascript:doPageNavigation('on_purchase_orders',3);">3</a></span><span
                                class="page_nav_cell round_box_3px"><a page_no="4"
                                    href="javascript:doPageNavigation('on_purchase_orders',4);">4</a></span><span
                                class="page_nav_cell round_box_3px"><a page_no="5"
                                    href="javascript:doPageNavigation('on_purchase_orders',5);">5</a></span><span
                                class="page_nav_cell round_box_3px"><a page_no="5"
                                    href="javascript:doPageNavigation('on_purchase_orders',5); ">&gt;&gt;</a></span>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-6">
                <div class="card form_wrap">
                    <h2>Monchify Transaction History (0)</h2>
                    <hr>
                    <table class="product-list table mt-20">
                        <tr>
                            <th rowspan="2"><a href="#"
                                    onclick="handleListSorting('transact_history','{cs:INV_ACTION_DATE DESC, INV_ACTION.DT_CREATED DESC, UID DESC}','{ns:INV_ACTION_TYPE ASC}') ; return false ;"
                                    title="Click to sort by Action">Action</a></th>
                            <th rowspan="2"><a href="#"
                                    onclick="handleListSorting('transact_history','{cs:INV_ACTION_DATE DESC, INV_ACTION.DT_CREATED DESC, UID DESC}','{ns:INV_ACTION_DATE ASC}') ; return false ;"
                                    title="Click to sort by Date">Date</a></th>
                            <th rowspan="2"><a href="#"
                                    onclick="handleListSorting('transact_history','{cs:INV_ACTION_DATE DESC, INV_ACTION.DT_CREATED DESC, UID DESC}','{ns:LEVEL_CODE ASC}') ; return false ;"
                                    title="Click to sort by Location">Location</a></th>
                            <th colspan="3">Qty</th>
                            <th rowspan="2">Purpose / Reason</th>
                        </tr>
                        <tr>
                            <th>B.</th>
                            <th>+/-</th>
                            <th>A.</th>
                        </tr>
                        <tr>

                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="ui-widget-overlay ui-front d-none"></div>
@include('admin.liquorProducts.models.popup')
<!-- Edit Cover Pic Module -->
<div class="ui-dialog ui-widget1 ui-widget-content ui-corner-all ui-front ui-draggable ui-resizable ajax_obj create-popup-form ui-draggable-edit-marketing-document d-none "
    tabindex="-1" style="width: 480px; top: 252.833px; left: 388px;" role="dialog" aria-describedby="ajax_obj"
    aria-labelledby="ui-id-15">
    <div class="ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix">
        <span id="ui-id-15" class="ui-dialog-title">Add/Edit Document Category</span>
        <button class="ui-button ui-widget1 ui-state-default ui-corner-all ui-button-icon-only ui-dialog-titlebar-close edit-marketing-document-close"
            role="button" aria-disabled="false" title="close">
            <span class="ui-button-icon-primary ui-icon ui-icon-closethick"></span>
            <span class="ui-button-text">close</span>
        </button>
    </div>
    <form id="frm_att_doc_edit"  action="">
        <div class="att_doc_edit_wrap ui-dialog-content ui-widget-content" id="ui-id-1" style="display: block; width: auto; min-height: 50px; max-height: none; height: auto;">
            <br>
            <h2 id="doc_edit_title"></h2>
            <br>
            <p>
                <label>Title:</label>
                <input class="att_doc_title" name="doc_title">
            </p>
            <p>
                <label>Type:</label>
                <select class="att_doc_ftype" name="file_type">
                    <option value="OTH">Other</option>
                    <option value="IMG">Image</option>
                    <option value="YTB">Youtube Video</option>
                    <option value="PDF">PDF</option>
                    <option value="DOC">MS Word</option>
                    <option value="HTM">Web HTML</option>
                </select>
            </p>
            <p>
                <label>Category:</label>
                <select class="att_doc_cat" name="lnk_cat">
                    <option value="0">Def. for Marketing</option>
                </select>
            </p>
        </div>
        <div class="ui-dialog-buttonpane ui-widget-content ui-helper-clearfix">
            <div class="ui-dialog-buttonset">
                <button type="button" class="big_button ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only" role="button" aria-disabled="false">
                    <span class="ui-button-text">Save</span>
                </button>
                <button type="button" class="big_button ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only edit-marketing-document-close" role="button" aria-disabled="false">
                    <span class="ui-button-text">Cencel</span>
                </button>
            </div>
        </div>
    </form>
</div>
@endsection
@section('scripts')
@include('admin.liquorProducts.js.edit_liquor')
<script>
    $(document).ready(function(){
        $('.btn_add_grape_var_vintage').click(function () { 
            var newGrapeVariety = '<p class="wrap_vintage" style="margin: 0 0 6px 0; line-height: 120%; padding: 2px;"><span class="wine_prices_wrap"><span role="status" aria-live="polite" class="ui-helper-hidden-accessible"></span>'+
                '<input type="text" name="grape_name[]" class="grape_name ui-autocomplete-input" value="" autocomplete="off" fdprocessedid="q8f3ul"></span><span>'+
                '<input type="number" name="grape_percent[]"step=".01" max="100" class="grape_percent" value="" fdprocessedid="2o401">%</span>'+
                '<span><span class="btn_delete_grape_var_row"><svg style="height: 1rem;" class="svg-inline--fa fa-trash-can" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-can" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">'+
                '<path fill="currentColor"  d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z"> </path> </svg></span></span></p>'
                $('.vintage_edit_variety').append(newGrapeVariety);            
        });
        $('.vintage_edit_variety').on('click', '.btn_delete_grape_var_row', function() {
            $(this).closest('.wrap_vintage').remove();
        });

        $(document).delegate('.add-to-list', 'click', function() {
            $(this).closest('.list_dd_wrap').remove();
        })
    });

    $(document).ready(function(){

        $('.add_new_vintage').click(function(e) {
            e.preventDefault();
            $('.wrap_vintage').remove();
            var newGrapeVariety = '<p class="wrap_vintage" style="margin: 0 0 6px 0; line-height: 120%; padding: 2px;"><span class="wine_prices_wrap"><span role="status" aria-live="polite" class="ui-helper-hidden-accessible"></span>'+
                '<input type="text" name="grape_name[]" class="grape_name ui-autocomplete-input" value="" autocomplete="off" fdprocessedid="q8f3ul"></span><span>'+
                '<input type="number" name="grape_percent[]"step=".01" max="100" class="grape_percent" value="" fdprocessedid="2o401">%</span>'+
                '<span><span class="btn_delete_grape_var_row"><svg style="height: 1rem;" class="svg-inline--fa fa-trash-can" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-can" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">'+
                '<path fill="currentColor"  d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z"> </path> </svg></span></span></p>'
                $('.vintage_edit_variety').append(newGrapeVariety); 

            $('.ui-draggable-create-new-vintage').show();
            $('.ui-widget-overlay').css('display', 'block');
        });
        $('.closethick-create-new-vintage-close').click(function() {
            $('.ui-draggable-create-new-vintage').hide();
            $('.ui-widget-overlay').css('display', 'none');
        });

        $('.closethick-edit-vintage-close').click(function() {
            $('.ui-draggable-edit-vintage').hide();
            $('.ui-widget-overlay').css('display', 'none');
        });

        $('.edit_vintage').click(function () { 
            $('.wrap_vintage').remove();
            let vintage_id = $(this).attr('vintage_id');
            var url = "{{ route('admin.liquor-product.vintage.edit', ':id') }}";
            url = url.replace(':id', vintage_id);
            $.ajax({
                url: url,
                type: 'GET',
                success: function(data) {
                    $('#frm_edit_product_vintage input[name="vintage_pro_id"]').val(data.productGenVintage.id);
                    $('#frm_edit_product_vintage input[name="vintage_part_id"]').val(data.productGenVintage.sku);
                    $('#frm_edit_product_vintage input[name="vintage"]').val(data.productGenVintage.product_liquor.vintage);
                    $('#frm_edit_product_vintage input[name="vintage_purchase_price"]').val(data.productGenVintage.purchase_price);
                    $('#frm_edit_product_vintage input[name="vintage_purchase_price_case"]').val(data.productGenVintage.purchase_price_case);
                    $('#frm_edit_product_vintage input[name="vintage_price_bq_inhouse"]').val(data.productGenVintage.price_bq_inhouse);
                    $('#frm_edit_product_vintage input[name="vintage_price_bq_catering"]').val(data.productGenVintage.price_bq_catering);
                    $('#frm_edit_product_vintage input[name="vintage_price_rstn_inhouse"]').val(data.productGenVintage.price_rstn_inhouse);
                    $('#frm_edit_product_vintage input[name="vintage_price_half_bottle"]').val(data.productGenVintage.product_liquor.price_half_bottle);
                    $('#frm_edit_product_vintage input[name="vintage_price_by_glass"]').val(data.productGenVintage.product_liquor.price_by_glass);
                    $('#frm_edit_product_vintage input[name="vintage_price_others"]').val(data.productGenVintage.product_liquor.price_others);
                    $('#frm_edit_product_vintage select[name="vintage_price_others_unit"]').val(data.productGenVintage.product_liquor.price_others_unit);
                    $('#frm_edit_product_vintage select[name="vintage_prod_status"]').val(data.productGenVintage.prod_status);
                    $('#frm_edit_product_vintage textarea[name="vintage_prod_desc"]').val(data.productGenVintage.prod_desc);
                    $('#frm_edit_product_vintage input[name="vintage_price_rstn_catering"]').val(data.productGenVintage.price_rstn_catering);
                    
                    var grapeVariety = JSON.parse(data.productGenVintage.product_liquor.grape_variety);
                    $.each(grapeVariety.name, function(index, value) {
                        var newGrapeVariety = '<p class="wrap_vintage" style="margin: 0 0 6px 0; line-height: 120%; padding: 2px;"><span class="wine_prices_wrap"><span role="status" aria-live="polite" class="ui-helper-hidden-accessible"></span>'+
                            '<input type="text" name="grape_name[]" class="grape_name ui-autocomplete-input" value="'+value+'" autocomplete="off" fdprocessedid="q8f3ul"></span><span>'+
                            '<input type="number" name="grape_percent[]"step=".01" max="100" class="grape_percent" value="'+grapeVariety.percent[index]+'" fdprocessedid="2o401">%</span>'+
                            '<span><span class="btn_delete_grape_var_row"><svg style="height: 1rem;" class="svg-inline--fa fa-trash-can" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-can" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">'+
                            '<path fill="currentColor"  d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z"> </path> </svg></span></span></p>'
                            $('.vintage_edit_variety').append(newGrapeVariety);            
                    })

                    var newGrapeVariety = '<p class="wrap_vintage" style="margin: 0 0 6px 0; line-height: 120%; padding: 2px;"><span class="wine_prices_wrap"><span role="status" aria-live="polite" class="ui-helper-hidden-accessible"></span>'+
                        '<input type="text" name="grape_name[]" class="grape_name ui-autocomplete-input" value="" autocomplete="off" fdprocessedid="q8f3ul"></span><span>'+
                        '<input type="number" name="grape_percent[]"step=".01" max="100" class="grape_percent" value="" fdprocessedid="2o401">%</span>'+
                        '<span><span class="btn_delete_grape_var_row"><svg style="height: 1rem;" class="svg-inline--fa fa-trash-can" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-can" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">'+
                        '<path fill="currentColor"  d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z"> </path> </svg></span></span></p>'
                        $('.vintage_edit_variety').append(newGrapeVariety); 

                    $('.ui-draggable-edit-vintage').show();
                    $('.ui-widget-overlay').css('display', 'block');
                },
                error: function(error) {
                    console.error('Ajax request failed:', error);
                }
            });
            
        });

        $(document).on('click', '.delete_vintage', function() {
            let vintage_id = $(this).attr('vintage_id');
            if (confirm("Delete this vintage?") == true) {
                var url = "{{ route('admin.liquor-product.vintage.destroy', ':id') }}";
                url = url.replace(':id', vintage_id);
                $.ajax({
                    url: url,
                    type: 'DELETE',
                    data: {_token:  "{{csrf_token()}}"},
                    success: function(response) {
                        if (response.success) {
                            alert(response.message);
                            window.location.reload();
                        } else {
                            alert(response.message);
                        }
                    }
                });

            }
        });
    });

    $(document).ready(function(){
        $('.btn_adjust_qtys').click(function(e) {
            e.preventDefault();
            $('.ui-draggable-adjust-qtys').show();
            $('.ui-widget-overlay').css('display', 'block');
        });
        $('.closethick-adjust-qtys-close').click(function() {
            $('.ui-draggable-adjust-qtys').hide();
            $('.ui-widget-overlay').css('display', 'none');
        });

        $('.btn_manual_receive').click(function(e) {
            e.preventDefault();
            $('.ui-draggable-manual-receive').show();
            $('.ui-widget-overlay').css('display', 'block');
        });
        $('.closethick-manual-receive-close').click(function() {
            $('.ui-draggable-manual-receive').hide();
            $('.ui-widget-overlay').css('display', 'none');
        });

        $('.btn_return_supplier').click(function(e) {
            e.preventDefault();
            $('.ui-draggable-return-supplier').show();
            $('.ui-widget-overlay').css('display', 'block');
        });
        $('.closethick-return-supplier-close').click(function() {
            $('.ui-draggable-return-supplier').hide();
            $('.ui-widget-overlay').css('display', 'none');
        });
    });
    var usage_type = 'PRT';
    var lnk_related_rec = "{{ $productGen->id }}";
</script>
@include('admin.manage.drag_and_drop_js');
@endsection