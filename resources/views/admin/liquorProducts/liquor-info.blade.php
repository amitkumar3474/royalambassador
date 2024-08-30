@extends('admin.layouts.master')
@section('title', 'Liquor Setup/Base Info')
@section('style')
<style>
    #ajax_obj label {
        font-weight: bold;
        padding-right: 5px;
        min-width: 125px;
        text-align: right;
        display: inline-block;
        vertical-align: top;
    }
    #ajax_obj p{
        margin-bottom: 10px;
    }
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
        margin-bottom: 0;
    }
    .az_tabs ul:after {
        clear: both;
        content: "";
        display: table;
    }

    .cur_az_tab {
        background: #FFF;
        /* padding: 1.5em; */
        margin-top: -1px;
        border: 1px solid #999;
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
@endsection
@section('content')
<div class="title_bar card">
    <h1>Liquor Product Setup</h1>
</div>
<div class="line_break"></div>
<div class="az_tabs">
    <ul>
        <li class="active">Main</li>
        <li><a href="{{ route('admin.liquor-inv-list.index') }}">List</a></li>
        <li><a href="{{ route('admin.liquor.bin-setup', ['is_active' => 1]) }}">All Bins</a></li>
    </ul>
    <div class="cur_az_tab" id="event_tabs-1" aria-labelledby="ui-id-1" role="tabpanel" aria-expanded="true" aria-hidden="false">
        <div class="row">
            <div class="col-6 card">
                <div>
                    <h2>Brands <a href="javascript:void(0)" ><svg style="width: 10px;" class="svg-inline--fa fa-plus add_liquor_brand" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="plus" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"></path></svg><!-- <i class="fas fa-plus"></i> Font Awesome fontawesome.com --></a></h2>
                    <div class="line_break"></div>
                    <form action="" id="frm_liquor_brands" method="get">
                        <fieldset class="form_filters">
                            <legend>Search by</legend>
                            <div class="filter_controls">
                                <label class="ml-5">Brand Name:</label>
                                <input name="liquor_brands_name" id="liquor_brands_LBRAND_NAME" value="{{request('liquor_brands_name')}}" type="text" value="" maxlength="60" size="20" title="Name of this brand" >
                            </div>
                            <div class="filter_buttons" style="float: right">
                                <button type="button" class="button font-bold radius-0 event_list_filter" value="event_list_filter">Search</button>
                                <button type="button" class="button font-bold radius-0 event_list_clear_filter" value="event_list_clear_filter">Show All</button>
                            </div>
                        </fieldset>
                    </form>
                </div>
                <div class="line_break"></div>
                <p align="right">
                    <span id="brand_records_display">Records: {{ $liquorBrand->firstItem()??0 }} to {{ $liquorBrand->lastItem()??0 }}</span> of <span id="brand_total_records"> {{ $liquorBrand->total() }} </span> | Show:
                    <select id="Brand_perPageSelect" class="max-100" name="brands_pages">
                        <option value="10" {{ request('brands_pages') == 10?'selected':''}}>10</option>
                        <option value="2" {{ request('brands_pages') == 2?'selected':''}} @if(request('brands_pages') == null){{'selected'}}@endif>2</option>
                        <option value="50" {{ request('brands_pages') == 50?'selected':''}}>50</option>
                        <option value="100" {{ request('brands_pages') == 100?'selected':''}}>100</option>
                    </select>
                </p>
                <div class="cus-row ">
                    <div class="col-12 main-order-item">
                        <div class="global-form main-form">
                            <table class="product-list table ">
                                <tr>
                                    <th>
                                        <a href="#">Brand Name</a>
                                    </th>
                                    <th>
                                    </th>
                                </tr>
                                @if ($liquorBrand->isNotEmpty())
                                    @foreach ($liquorBrand as $_liquorBrand)
                                    <tr class="supplier-row">
                                        <td>{{$_liquorBrand->lbrand_name}}</td>
                                        <td>
                                            <button type="button" class="button font-bold radius-0 liquor_brand_delete" data-id="{{$_liquorBrand->id}}">Delete</button>
                                            <button type="button" class="button font-bold radius-0 liquor_brand_edit" data-id="{{$_liquorBrand->id}}">Edit</button>
                                        </td>
                                    </tr>
                                    @endforeach
                                @else
                                <tr class="supplier-row">
                                </tr>
                                @endif
                            </table>
                            <div id="pagination-links" class="pagination brand-pagination-links">
                                {{ $liquorBrand->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 card">
                <div>
                    <h2>Package Types 
                        <a href="javascript:void(0)" id="btn_add_nae_package_type" style="color: #0782C1;">
                            <svg class="svg-inline--fa fa-plus" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="plus" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                                <path fill="currentColor" d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"></path>
                            </svg>
                        </a>
                    </h2>
                    <div class="line_break"></div>
                    <form action="" id="frm_package_types" method="get">
                        <fieldset class="form_filters">
                            <legend>Search by</legend>
                            <div class="filter_controls">
                                <label class="ml-5">Name:</label>
                                <input name="package_name" id="package_types_PACKAGE_NAME" type="text" value="{{request('package_name')}}" maxlength="30" size="20" title="Name of this packaging type" >
                                <label class="ml-5">Capacity:</label>
                                <input name="capacity" id="package_types_CAPACITY" type="text" value="{{request('capacity')}}" maxlength="7" size="8" title="The capacity of this packaging in the unit of its measurement" >
                            </div>
                            <div class="filter_buttons" style="float: right">
                                <button type="button" class="button font-bold radius-0 package_type_filter" value="package_type_filter">Search</button>
                                <button type="button" class="button font-bold radius-0 package_type_clear_filter" value="package_type_clear_filter">Show All</button>
                            </div>
                        </fieldset>
                    </form>
                </div>
                <div class="line_break"></div>
                <p align="right">
                <span id="brand_records_display">Records: {{ $packageTypes->firstItem()??0 }} to {{ $packageTypes->lastItem()??0 }}</span> of <span id="brand_total_records"> {{ $packageTypes->total() }} </span> | Show:
                    <select id="perPageSelect" class="max-100" name="package_type_pages">
                        <option value="10" {{ request('package_type_pages') == 10?'selected':''}}>10</option>
                        <option value="30" {{ request('package_type_pages') == 30?'selected':''}} @if(request('package_type_pages') == null){{'selected'}}@endif>30</option>
                        <option value="50" {{ request('package_type_pages') == 50?'selected':''}}>50</option>
                        <option value="100" {{ request('package_type_pages') == 100?'selected':''}}>100</option>
                    </select>
                </p>
                <div class="cus-row ">
                    <div class="col-12 main-order-item">
                        <div class="global-form main-form">
                            <table class="product-list table ">
                                <tr>
                                    <th>
                                        <a href="#">Name</a>
                                    </th>
                                    <th>
                                        <a href="#">Capacity</a>
                                    </th>
                                    <th>
                                        <a href="#">Unit Of Measure</a>
                                    </th>
                                    <th>
                                    </th>
                                </tr>
                                @foreach($packageTypes as $_packageType)
                                    <tr>
                                        <td>{{ $_packageType->package_name }}</td>
                                        <td>{{ number_format($_packageType->capacity, 2) }}</td>
                                        <td>{{ $_packageType->unit_of_measure }}</td>
                                        <td>
                                            <button class="button font-bold radius-0 btn_delete_package_type" packageType_id="{{ $_packageType->id }}">Delete</button>
                                            <button class="button font-bold radius-0 btn_edit_package_type" packageType_id="{{ $_packageType->id }}">Edit</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                            <div id="pagination-links" class="pagination package-pagination-links">
                                {{ $packageTypes->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- models popup element --}}
<div class="ui-widget-overlay ui-front d-none"></div>
<div class="ui-dialog ui-widget1 ui-widget-content ui-corner-all ui-front ui-draggable ui-resizable ajax_obj create-popup-form ui-draggable-create-brand d-none " tabindex="-1" style="top: 290px; width:550px; top: 159px; left: 394.5px;" role="dialog" aria-describedby="ajax_obj" aria-labelledby="ui-id-15">
    <div class="ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix">
        <span id="ui-id-15" class="ui-dialog-title">New Liquor Brand</span>
        <button class="ui-button ui-widget1 ui-state-default ui-corner-all ui-button-icon-only ui-dialog-titlebar-close" role="button" aria-disabled="false" title="close">
            <span class="ui-button-icon-primary ui-icon ui-icon-closethick closethick-brand-close"></span>
            <span class="ui-button-text">close</span>
        </button>
    </div>
    <div id="ajax_obj" class="ui-dialog-content ui-widget-content create-form-content" style="width: auto">
        <span id="new_liquor_brand" class="xmlb_form">
            <h2>New Liquor Brand</h2>
            <form action="#" id="frm_new_liquor_brand" method="POST" novalidate="novalidate">
                @csrf
                <div class="row">
                    <div class="col-4 mb-10">
                        <label class="align-right d-block">Brand Name:</label>
                    </div>
                    <div class="col-8 mb-10 pl-0">
                        <input id="new_liquor_brand_name" name="new_liquor_brand_name" value="{{old('new_liquor_brand_name')}}" type="text" maxlength="60" size="40" title="Name of this brand">
                        <span class="mand_sign">*</span>
                    </div>
                </div>
                <div class="line_break"></div>
                <button type="submit" class="button font-bold radius-0 liquor_brand_new_save">Save</button>
            </form>
        </span>
    </div>
</div>
{{-- edit liquor brand --}}
<div class="ui-dialog ui-widget1 ui-widget-content ui-corner-all ui-front ui-draggable ui-resizable ajax_obj create-popup-form ui-draggable-edit-brand d-none " tabindex="-1" style="top: 290px; width:550px; top: 159px; left: 394.5px;" role="dialog" aria-describedby="ajax_obj" aria-labelledby="ui-id-15">
    <div class="ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix">
        <span id="ui-id-15" class="ui-dialog-title">Liquor Inventory Base Info</span>
        <button class="ui-button ui-widget1 ui-state-default ui-corner-all ui-button-icon-only ui-dialog-titlebar-close" role="button" aria-disabled="false" title="close">
            <span class="ui-button-icon-primary ui-icon ui-icon-closethick closethick-edit-brand-close"></span>
            <span class="ui-button-text">close</span>
        </button>
    </div>
    <div id="ajax_obj" class="ui-dialog-content ui-widget-content create-form-content" style="width: auto">
        <span id="edit_liquor_brand" class="xmlb_form">
            <h2>Edit Liquor Brand</h2>
            <form action="#" id="frm_edit_liquor_brand" method="POST" novalidate="novalidate">
                @csrf
                <input type="hidden" name="liquor_brand_id" value="">
                <div class="row">
                    <div class="col-4 mb-10">
                        <label class="align-right d-block">Brand Name:</label>
                    </div>
                    <div class="col-8 mb-10 pl-0">
                        <input id="edit_liquor_brand_name" name="edit_liquor_brand_name" value="{{old('edit_liquor_brand_name')}}" type="text" maxlength="60" size="40" title="Name of this brand">
                        <span class="mand_sign">*</span>
                    </div>
                </div>
                <div class="line_break"></div>
                <button type="submit" class="button font-bold radius-0 edit_liquor_brand_save">Save</button>
            </form>
        </span>
    </div>
</div>

<!-- Add Packaget Types -->
<div class="ui-dialog ui-widget1 ui-widget-content ui-corner-all ui-front ui-draggable ui-resizable ajax_obj create-popup-form ui-draggable-add-packaget-type d-none " tabindex="-1" style="top: 290px; width:550px; top: 159px; left: 394.5px;" role="dialog" aria-describedby="ajax_obj" aria-labelledby="ui-id-15">
    <div class="ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix">
        <span id="ui-id-15" class="ui-dialog-title"></span>
        <button class="ui-button ui-widget1 ui-state-default ui-corner-all ui-button-icon-only ui-dialog-titlebar-close ui-dialog-add-packaget-type-close" role="button" aria-disabled="false" title="close">
            <span class="ui-button-icon-primary ui-icon ui-icon-closethick"></span>
            <span class="ui-button-text">close</span>
        </button>
    </div>
    <div id="ajax_obj" class="ui-dialog-content ui-widget-content create-form-content" style="width: auto">
        <span id="new_package_type" class="xmlb_form">
            <form method="post" id="frm_new_package_type" action="{{ route('admin.liquor-base-info-package-type.store') }}" accept-charset="utf-8" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="package_type_id">
                <h2></h2>
                    <br>
                <p>
                    <label>Name:</label>
                    <span class="element">
                        <input id="new_package_type_package_name" name="package_name" type="text" maxlength="30" size="20" title="Name of this packaging type">
                    </span>
                    <span class="mand_sign">*</span>
                </p>
                <p>
                    <label>Capacity:</label>
                    <span class="element">
                        <input id="new_package_type_capacity" name="capacity" type="text" maxlength="7" size="8" title="The capacity of this packaging in the unit of its measurement">
                    </span>
                    <span class="mand_sign">*</span>
                </p>
                <p>
                    <label>Unit Of Measure:</label>
                    <span class="element">
                        <select id="new_package_type_unit_of_measure" name="unit_of_measure">
                            <option value="">----</option>
                            <option value="1">Each</option>
                            <option value="12">Milligram</option>
                            <option value="13">Gram</option>
                            <option value="14">Kilogram</option>
                            <option value="15">Ton</option>
                            <option value="5">Pound</option>
                            <option value="21">ML</option>
                            <option value="24">Oz</option>
                            <option value="25">Gallon</option>
                            <option value="22">Liter</option>
                            <option value="23">Cubic Meter</option>
                            <option value="31">Millimeter</option>
                            <option value="32">Centimeter</option>
                            <option value="33">Kilometer</option>
                            <option value="34">Inch</option>
                            <option value="35">Foot</option>
                            <option value="36">Yard</option>
                            <option value="41">Sq Feet</option>
                            <option value="43">Sq Milimeter</option>
                            <option value="44">Sq Meter</option>
                        </select>
                    </span>
                    <span class="mand_sign">*</span>
                </p>
                <p>
                    <label>Description:</label>
                    <span class="element">
                        <textarea id="new_package_type_package_desc" name="package_desc" cols="40" rows="6" title="Description of the package if any" maxlength="254"></textarea>
                    </span>
                    <span class="mand_sign"></span>
                </p>
                <div class="line_break"></div>
                <div class="">
                    <button type="submit" id="new_package_type_save" class="button font-bold radius-0 edit_liquor_brand_save">Save</button>
                </div>
            </form>
        </span>
    </div>
</div>
@endsection
@section('scripts')
<script>
    $(document).ready(function() {
        $('.ui-state-default a').click(function() {
            // e.preventDefault();
            $('.ui-state-default').removeClass('ui-tabs-active ui-state-active');
            $(this).closest('li').addClass('ui-tabs-active ui-state-active')
            $('.ui-tabs-panel').css('display', 'none');
            var text = $(this).attr('tabindex');
            console.log(text);
            if (text == -1) {
                $('#event_tabs-1').show();
            } else if (text == -2) {
                $('#event_tabs-2').show();
            } else if (text == -3) {
                $('#event_tabs-3').show();
            }
        });

        $("#frm_new_liquor_brand").validate({
            rules: {
                'new_liquor_brand_name': 'required',
            }
            , messages: {
                'new_liquor_brand_name': 'Please enter Lbrand Name or Lbrand Name too short. It has to be 1 characters.',

            }
        });
        $("#frm_edit_liquor_brand").validate({
            rules: {
                'edit_liquor_brand_name': 'required',
            }
            , messages: {
                'edit_liquor_brand_name': 'Please enter Lbrand Name or Lbrand Name too short. It has to be 1 characters.',

            }
        });

        $('.add_liquor_brand').click(function () { 
            $('.ui-draggable-create-brand').show();
            $('.ui-widget-overlay').css('display', 'block');
        });
        $('.closethick-brand-close').click(function() {
            $('.ui-draggable-create-brand').hide();
            $('.ui-draggable-create-brand').removeClass('error')
            $('.ui-widget-overlay').css('display', 'none');
        });
        $('.liquor_brand_edit').click(function () { 
            $('.ui-draggable-edit-brand').show();
            $('.ui-widget-overlay').css('display', 'block');
            var brand_id = $(this).data('id');
            var url = "{{ route('admin.liquor-brand.edit', ':id') }}";
            url = url.replace(':id', brand_id);
            $.ajax({
                url: url
                , type: 'GET'
                , success: function(data) {
                    $('#frm_edit_liquor_brand input[name="liquor_brand_id"]').val(data.liquorBrand.id);
                    $('#frm_edit_liquor_brand input[name="edit_liquor_brand_name"]').val(data.liquorBrand.lbrand_name);
                }
                , error: function(error) {
                    console.error('Ajax request failed:', error);
                }
            });
        });
        $('.closethick-edit-brand-close').click(function() {
            $('.ui-draggable-edit-brand').hide();
            $('.ui-draggable-edit-brand').removeClass('error')
            $('.ui-widget-overlay').css('display', 'none');
        });

        $('.event_list_clear_filter, .package_type_clear_filter').on('click', function() {
            var selectValue = $(this).attr('value');
            var url = new URL(window.location.href);
            
            if (selectValue == "package_type_clear_filter") {
                $('#frm_package_types input[name="package_name"]').val('')
                $('#frm_package_types input[name="capacity"]').val('')
                $('#frm_package_types select[name="package_type_pages"]').val('');
                url.searchParams.delete('package_name');
                url.searchParams.delete('capacity');
                url.searchParams.delete('package_type_pages');
                url.searchParams.delete('package_page');
                window.location.href = url.toString();
            }

            if (selectValue == "event_list_clear_filter") {
                $('#frm_liquor_brands input[name="liquor_brands_name"]').val('');
                $('#frm_liquor_brands select[name="brands_pages"]').val('');
                url.searchParams.delete('liquor_brands_name');
                url.searchParams.delete('brands_pages');
                url.searchParams.delete('brands_page');
                window.location.href = url.toString();
            }
        });
        
        $('.package_type_filter, .event_list_filter').on('click', function() {
            var selectValue = $(this).attr('value');
            var url = new URL(window.location.href);
            
            if (selectValue == "package_type_filter") {
                var package_name =  $('#frm_package_types input[name="package_name"]').val();
                var capacity = $('#frm_package_types input[name="capacity"]').val();
                url.searchParams.set('package_name', package_name || '');
                url.searchParams.set('capacity', capacity || '');
                window.location.href = url.toString();
            }

            if (selectValue == "event_list_filter") {
                var liquor_brands_name = $('#frm_liquor_brands input[name="liquor_brands_name"]').val();
                url.searchParams.set('liquor_brands_name', liquor_brands_name || '');
                window.location.href = url.toString();
            }
        });

        $('#perPageSelect').on('change', function(event) {
            var url = new URL(window.location.href);
            var package_type_pages = $('#perPageSelect').val();
            url.searchParams.set('package_type_pages', package_type_pages || '');
            window.location.href = url.toString();
        });

        // Handler for the brand dropdown
        $('#Brand_perPageSelect').on('change', function(event) {
            var url = new URL(window.location.href);
            var brands_pages =  $('#Brand_perPageSelect').val();
            url.searchParams.set('brands_pages', brands_pages || '');
            window.location.href = url.toString();
        });
        $('.brand-pagination-links a').on('click', function(event) {
            event.preventDefault();
            const page = $(this).attr('href').split('brands_page=')[1];
            const url = new URL(window.location.href);
            url.searchParams.set('brands_page', page);
            window.location.href = url.toString();
        });

        $('.package-pagination-links a').on('click', function(event) {
            event.preventDefault();
            const page = $(this).attr('href').split('package_page=')[1];
            const url = new URL(window.location.href);
            url.searchParams.set('package_page', page);
            window.location.href = url.toString();
        });
        // $('#searchForm input, #searchForm select').on('change', function() {
        //     $('#searchForm').submit();
        // });

        $('#frm_new_liquor_brand').submit(function(e) {
            e.preventDefault();
            if(!$(this).find('input.error').length){
                var formData = $('#frm_new_liquor_brand').serialize();

                $.ajax({
                    url: "{{route('admin.liquor-brand.store')}}",
                    type: 'POST',
                    data: formData, 
                    success: function(response) {
                        if (response.success) {
                            location.reload();
                        } else {
                            alert(response.message);
                            location.reload();
                        }
                    },
                    error: function(xhr, status, error) {
                        
                        if (xhr.responseJSON && xhr.responseJSON.errors) {
                            var errors = xhr.responseJSON.errors;
                            $.each(errors, function(key, value) {
                                $('#' + key + '_error').remove();
                                
                                $('#' + key).after('<span id="' + key + '_error" class="text-danger">' + value[0] + '</span>');
                                
                                $('#' + key).addClass('error');
                            });
                        }
                    }
                });
            }
        });
        $('#frm_edit_liquor_brand').submit(function(e) {
            e.preventDefault();
            if(!$(this).find('input.error').length){
                var formData = $('#frm_new_liquor_brand').serialize();

                $.ajax({
                    url: "{{route('admin.liquor-brand.update')}}",
                    type: 'POST',
                    data: formData, 
                    success: function(response) {
                        if (response.success) {
                            location.reload();
                        } else {
                            alert(response.message);
                            location.reload();
                        }
                    },
                    error: function(xhr, status, error) {
                        
                        if (xhr.responseJSON && xhr.responseJSON.errors) {
                            var errors = xhr.responseJSON.errors;
                            $.each(errors, function(key, value) {
                                $('#' + key + '_error').remove();
                                
                                $('#' + key).after('<span id="' + key + '_error" class="text-danger">' + value[0] + '</span>');
                                
                                $('#' + key).addClass('error');
                            });
                        }
                    }
                });
            }
        });
        $(document).on('click', '.liquor_brand_delete', function() {
            var brand_id = $(this).attr('data-id');
            var url = "{{ route('admin.liquor-brand.destroy', ':id') }}";
            url = url.replace(':id', brand_id);
            $.ajax({
                url: url,
                type: 'DELETE',
                data: {_token: "{{ csrf_token() }}"}
                , success: function(response) {
                    if (response.success) {
                        alert(response.message);
                        window.location.href = "{{route('admin.liquor.base-info')}}"; 
                    } else {
                        alert(response.message);
                    }
                }
            });
        });

        $('#btn_add_nae_package_type').click(function(){
            $('.ui-draggable-add-packaget-type .ui-dialog-title').html('New Package Type');
            $('.ui-draggable-add-packaget-type h2').html('New Packaging Type');
            $('.ui-widget-overlay').removeClass('d-none');
            $('.ui-draggable-add-packaget-type').removeClass('d-none');
        });

        $('.ui-dialog-add-packaget-type-close').click(function(){
            $('#frm_new_package_type input[name="package_type_id"]').val('')
            $('#frm_new_package_type input[name="package_name"]').val('')
            $('#frm_new_package_type input[name="capacity"]').val('')
            $('#frm_new_package_type select[name="unit_of_measure"]').val('')
            $('#frm_new_package_type textarea[name="package_desc"]').val('')
            $('#frm_new_package_type').validate().resetForm();
            $('.ui-widget-overlay').addClass('d-none');
            $('.ui-draggable-add-packaget-type').addClass('d-none');
        });

        $('#frm_new_package_type').validate({
            rules:{
                'package_name':'required',
                'capacity':{
                    required:true,
                    number:true,
                },
                'unit_of_measure':'required',
            },
            messages:{
                'package_name':'Please enter Package Name.',
                'capacity':{
                    required:'Please enter Capacity.',
                    number:'Please enter Number',
                },
                'unit_of_measure':'Please enter Unit Of Measure.',
            },
            
        });

        $('.btn_edit_package_type').click(function(){
           var packageType_id = $(this).attr('packageType_id')
           var url = "{{ route('admin.liquor-base-info-package-type.edit', ':id') }}";
           url = url.replace(':id', packageType_id);
            $.ajax({
                type: "get",
                url: url,
                success: function (response) {
                    $('#frm_new_package_type input[name="package_type_id"]').val(response.packageType.id)
                    $('#frm_new_package_type input[name="package_name"]').val(response.packageType.package_name)
                    $('#frm_new_package_type input[name="capacity"]').val(response.packageType.capacity)
                    $('#frm_new_package_type select[name="unit_of_measure"]').val(response.packageType.unit_of_measure)
                    $('#frm_new_package_type textarea[name="package_desc"]').val(response.packageType.package_desc)

                    $('.ui-draggable-add-packaget-type .ui-dialog-title').html('Edit Package Type');
                    $('.ui-draggable-add-packaget-type h2').html('');
                    $('.ui-widget-overlay').removeClass('d-none');
                    $('.ui-draggable-add-packaget-type').removeClass('d-none');
                }
            });
        });

        $('.btn_delete_package_type').click(function(){
            if(confirm("Do you really want to delete this record?")){
                var packageType_id = $(this).attr('packageType_id')
                var url = "{{ route('admin.liquor-base-info-package-type.destroy', ':id') }}";
                url = url.replace(':id', packageType_id);
                $.ajax({
                    type: "DELETE",
                    url: url,
                    data: {_token:"{{ csrf_token() }}"},
                    success: function (response) {
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

    

</script>
@endsection
