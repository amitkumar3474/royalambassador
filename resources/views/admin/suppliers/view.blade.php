@extends('admin.layouts.master')
@section('title', $supplier->supplier_name. ' Supplier Details')
@section('content')
<div class="card title_bar">
    <div>
        <h1>{{$supplier->supplier_name}}</h1> 
        <h2 style="color: #373232">(Supplier Details)</h2>
    </div>
</div>
<div class="card">
    <div class="row">
        @if (!empty($supplier->general_email))
            <div class="col-2 mb-10">
                <label class="align-right d-block">General Email:</label>
            </div>
            <div class="col-8 mb-10 pl-0">
                <span class="element">{{$supplier->general_email}}</span>
                <span class="mand_sign"></span>
            </div>
        @endif
        @if (!empty($supplier->main_phone))
            <div class="col-2 mb-10">
                <label class="align-right d-block">Office Phone:</label>
            </div>
            <div class="col-8 mb-10 pl-0">
                <span class="element">{{$supplier->main_phone}}</span>
                <span class="mand_sign"></span>
            </div>
        @endif
        @if (!empty($supplier->city))
            <div class="col-2 mb-10">
                <label class="align-right d-block">City:</label>
            </div>
            <div class="col-8 mb-10 pl-0">
                <span class="element">{{$supplier->city}}</span>
                <span class="mand_sign"></span>
            </div>
        @endif
        @if (!empty($supplier->province))
            <div class="col-2 mb-10">
                <label class="align-right d-block">Province:</label>
            </div>
            <div class="col-8 mb-10 pl-0">
                <span class="element">{{$supplier->province}}</span>
                <span class="mand_sign"></span>
            </div>
        @endif
        @if (!empty($supplier->country))
            <div class="col-2 mb-10">
                <label class="align-right d-block">Country:</label>
            </div>
            <div class="col-8 mb-10 pl-0">
                <span class="element">{{$supplier->country}}</span>
                <span class="mand_sign"></span>
            </div>
        @endif
        <div>
            <button id="supplier_view_delete" data-id="{{$supplier->id??''}}" class="button font-bold radius-0">Delete Supplier</button>
            <a href="#">
                <button id="supplier_view_edit" name="supplier_view_edit" class="button font-bold radius-0">Edit Supplier</button>
            </a>
        </div>
  </div>
</div>
<div class="line_break"></div>
<div class="cus-row ">
    @if ($supplier->contacts->isNotEmpty())
        @foreach ($supplier->contacts as $_contact)
            <div class="col-6 main-order-item">
                <div class="global-form main-form height-100">
                    <h2>{{$_contact->first_name.' '.$_contact->last_name}}</h2>
                    <hr>
                    <div class="row">
                        @if (isset($_contact->cell_phone))
                            <div class="col-4 mb-10">
                                <label class="align-right d-block">Cell Phone:</label>
                            </div>
                            <div class="col-8 mb-10 pl-0">
                                <span class="element">{{$_contact->cell_phone}}</span>
                                <span class="mand_sign"></span>
                            </div>
                        @endif
                        @if (isset($_contact->email))
                            <div class="col-4 mb-10">
                                <label class="align-right d-block">Email:</label>
                            </div>
                            <div class="col-8 mb-10 pl-0">
                                <span class="element">({{$_contact->email}})</span>
                                <span class="mand_sign"></span>
                            </div>
                        @endif
                        @if (isset($_contact->alt_phone))
                            <div class="col-4 mb-10">
                                <label class="align-right d-block">Alt Phone:</label>
                            </div>
                            <div class="col-8 mb-10 pl-0">
                                <span class="element">{{$_contact->alt_phone}}</span>
                                <span class="mand_sign"></span>
                            </div>
                        @endif
                        @if (isset($_contact->country))
                            <div class="col-4 mb-10">
                                <label class="align-right d-block">Country:</label>
                            </div>
                            <div class="col-8 mb-10 pl-0">
                                <span class="element">{{$_contact->country}}</span>
                                <span class="mand_sign"></span>
                            </div>
                        @endif
                        <div style="margin-top: 40px;">
                            <a href="javascript:void(0)" class="btn_delete_supplier_contact" data-id="{{$_contact->id}}">
                                <img src="{{ asset('backend/assets/img/icon_delete.png') }}"> Delete Contact
                            </a>
                            <a href="javascript:void(0)" class="supplier_contact_edit" data-id="{{$_contact->id}}">
                                <img src="{{ asset('backend/assets/img/icon_edit.png') }}"> Edit Contact
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
    <div class="col-6">
        <div class="card contact_wrap add_new_contact form_filters">
            <div style="text-align: center;">
                <a href="#" id="contact_new" style="text-decoration: none;font-size: 2rem;">+<br>New Contact</a>
            </div>
        </div>
    </div>
</div>
<hr>
<div class="title_bar card">         
    <h2 style="color: #373232">Supplied Products 
      <img id="btn_add_more" src="{{ asset('backend/assets/img/icon_add.png') }}">
    </h2>
</div>
<div class="line_break"></div>
<fieldset class="form_filters">
    <legend>Search by</legend>
    <label>Name:</label> 
    <input name="product_list_PRODUCT_NAME" id="product_list_PRODUCT_NAME" type="text" value="" maxlength="120" size="12" title="Product name" class="auto_focus">
    <label>Status:</label> 
    <select name="product_list_PROD_STATUS" id="product_list_PROD_STATUS">
        <option value="-- All --" selected="selected">-- All --</option>
        <option value="1">Active</option>
        <option value="2">End of Line</option>
    </select>
    <input type="submit" value="Search" id="product_list_apply_filter" class="button font-bold radius-0" name="product_list_apply_filter">
    <input type="submit" value="Show All" id="product_list_clear_filter" class="button font-bold radius-0" name="product_list_clear_filter">
</fieldset>
<div class="line_break"></div>
<div class="top-record mt-20">
    <p align="right">
        Records: 0 to 0 of 0 | Show: 
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
    <tbody>
        <tr>
            <th></th>
            <th>
                <a href="#">Name</a> 
            </th>
            <th>
                <a href="#">Vendor Part#</a> 
            </th>
            <th>
                <a href="#">Vendor Name</a> 
            </th>
            <th>
                <a href="#">Price</a>
            </th>
        </tr>
        @foreach ($products as $product)   
            <tr class="actual_body">
                <td></td>
                <td>
                    <a href="{{ route('admin.liquor-product.view',$product->id) }}">{{$product->product_name}}</a> 
                    <br>
                    Package: {{$product->lnk_package_type}}
                </td>
                <td>
                    {{$product->vendor_part_num}}
                </td>
                <td>
                    {{$product->vendor_prod_name}}
                </td>
                <td>
                    {{$product->price}}
                </td>
            </tr>
         @endforeach
    </tbody>
</table>
{{-- edit supplier form --}}
<div class="ui-widget-overlay ui-front d-none"></div>
<div class="ui-dialog ui-widget1 ui-widget-content ui-corner-all ui-front ui-draggable ui-resizable ajax_obj create-popup-form d-none ui-draggable-supplier-edit" tabindex="-1" style="top: 80px" role="dialog" aria-describedby="ajax_obj" aria-labelledby="ui-id-15">
    <div class="ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix">
        <span id="ui-id-15" class="ui-dialog-title">Edit Supplier</span>
        <button class="ui-button ui-widget1 ui-state-default ui-corner-all ui-button-icon-only ui-dialog-titlebar-close" role="button" aria-disabled="false" title="close">
            <span class="ui-button-icon-primary ui-icon ui-icon-closethick edit-form-close"></span>
            <span class="ui-button-text">close</span>
        </button>
    </div>
    <div id="ajax_obj" class="ui-dialog-content ui-widget-content create-form-content">
        <span id="event_new" class="xmlb_form">
            <form action="{{route('admin.supplier.update',$supplier->id)}}" id="supplier_edit" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" name="supplier_id" value="{{$supplier->id}}">
                <fieldset class="round_box_3px">
                    <legend>Main Info</legend>
                    <div class="row">
                        <div class="col-4 mb-10">
                            <label class="align-right d-block">Supplier Name:</label>
                        </div>
                        <div class="col-8 mb-10 pl-0">
                            <input name="supplier_name" size="34" value="{{old('supplier_name',$supplier->supplier_name)}}" type="text" title="Supplier Name">
                            <span class="mand_sign">*</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4 mb-10">
                            <label class="align-right d-block">Does Liquor:</label>
                        </div>
                        <div class="col-8 mb-10 pl-0">
                            <select name="does_liquor_is">
                                <option value="----" selected="selected">----</option>
                                <option value="1" {{(old('does_liquor_is',$supplier->is_liquor_supplier) == 1)? 'selected': ''}}>Yes</option>
                                <option value="0" {{(old('does_liquor_is',$supplier->is_liquor_supplier) == 0)? 'selected': ''}}>No</option>
                            </select> 
                            <span class="mand_sign">*</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4 mb-10">
                            <label class="align-right d-block">General Email:</label>
                        </div>
                        <div class="col-8 mb-10 pl-0">
                            <input size="34" class="general_email" name="general_email" value="{{old('general_email',$supplier->general_email)}}" type="text" size="8" title="General Email">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4 mb-10">
                            <label class="align-right d-block">Office Phone:</label>
                        </div>
                        <div class="col-8 mb-10 pl-0">
                            <input size="34" class="office_phone" name="office_phone" value="{{old('office_phone',$supplier->main_phone)}}" type="text" title="Office Phone">
                        </div>
                    </div>
                </fieldset>
                <div class="line_break"></div>
                <fieldset class="round_box_3px">
                    <legend>Address</legend>
                    <div class="row">
                        <div class="col-4 mb-10">
                            <label class="align-right d-block">Addr Line1:</label>
                        </div>
                        <div class="col-8 mb-10 pl-0">
                            <input name="address_line1" size="34" value="{{old('address_line1',$supplier->addr_line1)}}" type="text" title="Addr Line1">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4 mb-10">
                            <label class="align-right d-block">Addr Line2:</label>
                        </div>
                        <div class="col-8 mb-10 pl-0">
                            <input name="address_line2" size="34" value="{{old('address_line2',$supplier->addr_line2)}}" type="text" title="Addr Line2">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4 mb-10">
                            <label class="align-right d-block">City:</label>
                        </div>
                        <div class="col-8 mb-10 pl-0">
                            <input name="city" size="34" value="{{old('city',$supplier->city)}}" type="text" title="City">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4 mb-10">
                            <label class="align-right d-block">Province:</label>
                        </div>
                        <div class="col-8 mb-10 pl-0">
                            <select name="province">
                                <option value="AB" {{(old('province',$supplier->province) == 'AB')? 'selected': ''}}>Alberta</option>
                                <option value="BC" {{(old('province',$supplier->province) == 'BC')? 'selected': ''}}>British Columbia</option>
                                <option value="MB" {{(old('province',$supplier->province) == 'MB')? 'selected': ''}}>Manitoba</option>
                                <option value="NB" {{(old('province',$supplier->province) == 'NB')? 'selected': ''}}>New Brunswick</option>
                            </select> 
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4 mb-10">
                            <label class="align-right d-block">Country:</label>
                        </div>
                        <div class="col-8 mb-10 pl-0">
                            <input name="country" size="34" value="{{old('country',$supplier->country)}}" type="text" title="Country">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4 mb-10">
                            <label class="align-right d-block">Postal Code:</label>
                        </div>
                        <div class="col-8 mb-10 pl-0">
                            <input name="postal_code" size="34" value="{{old('postal_code',$supplier->postal_code)}}" type="text" title="Postal Code">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4 mb-10">
                            <label class="align-right d-block">Special Notes:</label>
                        </div>
                        <div class="col-8 mb-10 pl-0">
                            <textarea  name="special_notes" rows="4" cols="50">{{old('special_notes',$supplier->special_notes)}}</textarea>
                        </div>
                    </div>
                </fieldset>
                <div class="line_break"></div>
                <button type="submit" class="button font-bold radius-0">Save</button>
            </form>
        </span>
    </div>
</div>
{{-- edit supplier form --}}
{{-- supplier contact form --}}
<div class="ui-dialog ui-widget1 ui-widget-content ui-corner-all ui-front ui-draggable ui-resizable ajax_obj create-popup-form ui-draggable-contact d-none" tabindex="-1" style="top: 166px" role="dialog" aria-describedby="ajax_obj" aria-labelledby="ui-id-15">
    <div class="ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix">
        <span id="ui-id-15" class="ui-dialog-title">New Contact for this Supplier</span>
        <button class="ui-button ui-widget1 ui-state-default ui-corner-all ui-button-icon-only ui-dialog-titlebar-close" role="button" aria-disabled="false" title="close">
            <span class="ui-button-icon-primary ui-icon ui-icon-closethick closethick-contact"></span>
            <span class="ui-button-text">close</span>
        </button>
    </div>
    <div id="ajax_obj" class="ui-dialog-content ui-widget-content create-form-content">
        <span id="event_new" class="xmlb_form">
            <form action="{{route('admin.supplier.contact.store')}}" id="create_supplier_contact" method="POST">
                <h2>New Supplier Contact</h2>
                @csrf
                <input type="hidden" name="supplier_id" value="{{$supplier->id??''}}">
                <div class="row">
                    <div class="col-4 mb-10">
                        <label class="align-right d-block">First Name:</label>
                    </div>
                    <div class="col-8 mb-10 pl-0">
                        <input name="first_name" size="34" type="text" value="{{old('first_name')}}" title="First Name">
                        <span class="mand_sign">*</span>
                    </div>
                    <div class="col-4 mb-10">
                        <label class="align-right d-block">Last Name:</label>
                    </div>
                    <div class="col-8 mb-10 pl-0">
                        <input name="last_name" size="34" type="text" value="{{old('last_name')}}" title="Last Name">
                    </div>
                    <div class="col-4 mb-10">
                        <label class="align-right d-block">Phone:</label>
                    </div>
                    <div class="col-8 mb-10 pl-0">
                        <input name="phone" size="25" type="text" value="{{old('phone')}}" title="Phone">
                    </div>
                    <div class="col-4 mb-10">
                        <label class="align-right d-block">Cell Phone:</label>
                    </div>
                    <div class="col-8 mb-10 pl-0">
                        <input name="cell_phone" size="25" type="text" value="{{old('cell_phone')}}" title="Cell Phone">
                    </div>
                    <div class="col-4 mb-10">
                        <label class="align-right d-block">Email:</label>
                    </div>
                    <div class="col-8 mb-10 pl-0">
                        <input name="email" size="34" type="text" value="{{old('email')}}" title="Email">
                    </div>
                    <div class="col-4 mb-10">
                        <label class="align-right d-block">Alt Phone:</label>
                    </div>
                    <div class="col-8 mb-10 pl-0">
                        <input name="alt_phone" size="25" type="text" value="{{old('alt_phone')}}" title="Alt Phone ">
                    </div>
                    <div class="col-4 mb-10">
                        <label class="align-right d-block">Alt Email:</label>
                    </div>
                    <div class="col-8 mb-10 pl-0">
                        <input name="alt_email" size="34" type="text" value="{{old('alt_email')}}" title="Alt Email ">
                    </div>
                    <div class="col-4 mb-10">
                        <label class="align-right d-block">Fax:</label>
                    </div>
                    <div class="col-8 mb-10 pl-0">
                        <input name="fax" size="25" type="text" value="{{old('fax')}}" title="Fax ">
                    </div>
                </div>
                <button type="submit" class="button font-bold radius-0">Save</button>
            </form>
        </span>
    </div>
</div>
{{-- supplier contact form --}}
{{-- supplier contact form edit --}}
<div class="ui-dialog ui-widget1 ui-widget-content ui-corner-all ui-front ui-draggable ui-resizable ajax_obj create-popup-form ui-draggable-contact-edit d-none" tabindex="-1" style="top: 166px" role="dialog" aria-describedby="ajax_obj" aria-labelledby="ui-id-15">
    <div class="ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix">
        <span id="ui-id-15" class="ui-dialog-title">Edit Supplier Contact</span>
        <button class="ui-button ui-widget1 ui-state-default ui-corner-all ui-button-icon-only ui-dialog-titlebar-close" role="button" aria-disabled="false" title="close">
            <span class="ui-button-icon-primary ui-icon ui-icon-closethick closethick-contact-edit"></span>
            <span class="ui-button-text">close</span>
        </button>
    </div>
    <div id="ajax_obj" class="ui-dialog-content ui-widget-content edit-form-content">
        <span id="event_new" class="xmlb_form">
            <form action="{{route('admin.supplier.contact.store')}}" id="supplier_contact_edit_form" method="POST">
                @csrf
                <input type="hidden" name="supplier_cont_id" value="">
                <div class="row">
                    <div class="col-4 mb-10">
                        <label class="align-right d-block">Title:</label>
                    </div>
                    <div class="col-8 mb-10 pl-0">
                        <select name="mr_mrs">
                            <option value="----">----</option>
                            <option value="Mr." {{ old('mr_mrs') == 'Mr.' ? 'selected' : '' }}>Mr.</option>
                            <option value="Mrs." {{ old('mr_mrs') == 'Mrs.' ? 'selected' : '' }}>Mrs.</option>
                            <option value="Mis." {{ old('mr_mrs') == 'Mis.' ? 'selected' : '' }}>Mis.</option>
                            <option value="Dr." {{ old('mr_mrs') == 'Dr.' ? 'selected' : '' }}>Dr.</option>
                        </select>
                    </div>
                    <div class="col-4 mb-10">
                        <label class="align-right d-block">First Name:</label>
                    </div>
                    <div class="col-8 mb-10 pl-0">
                        <input name="first_name" size="34" value="{{old('first_name')}}" type="text" title="First Name">
                        <span class="mand_sign">*</span>
                    </div>
                    <div class="col-4 mb-10">
                        <label class="align-right d-block">Last Name:</label>
                    </div>
                    <div class="col-8 mb-10 pl-0">
                        <input name="last_name" size="34" value="{{old('last_name')}}" type="text" title="Last Name">
                    </div>
                    <div class="col-4 mb-10">
                        <label class="align-right d-block">Phone:</label>
                    </div>
                    <div class="col-8 mb-10 pl-0">
                        <input name="phone" size="25" value="{{old('phone')}}" type="text" title="Phone">
                    </div>
                    <div class="col-4 mb-10">
                        <label class="align-right d-block">Cell Phone:</label>
                    </div>
                    <div class="col-8 mb-10 pl-0">
                        <input name="cell_phone" size="25" value="{{old('cell_phone')}}" type="text" title="Cell Phone">
                    </div>
                    <div class="col-4 mb-10">
                        <label class="align-right d-block">Email:</label>
                    </div>
                    <div class="col-8 mb-10 pl-0">
                        <input name="email" size="34" value="{{old('email')}}" type="text" title="Email">
                    </div>
                    <div class="col-4 mb-10">
                        <label class="align-right d-block">Alt Phone:</label>
                    </div>
                    <div class="col-8 mb-10 pl-0">
                        <input name="alt_phone" size="25" value="{{old('alt_phone')}}" type="text" title="Alt Phone ">
                    </div>
                    <div class="col-4 mb-10">
                        <label class="align-right d-block">Alt Email:</label>
                    </div>
                    <div class="col-8 mb-10 pl-0">
                        <input name="alt_email" size="34" value="{{old('alt_email')}}" type="text" title="Alt Email ">
                    </div>
                    <div class="col-4 mb-10">
                        <label class="align-right d-block">Fax:</label>
                    </div>
                    <div class="col-8 mb-10 pl-0">
                        <input name="fax" size="25" value="{{old('fax')}}" type="text" title="Fax ">
                    </div>
                </div>
                <button type="submit" class="button font-bold radius-0">Save</button>
            </form>
        </span>
    </div>
</div>
{{--supplier contact form edit --}}
@endsection
@section('scripts')
    <script>
        $(document).ready(function () {
            $('#contact_new').click( function (e) {
                e.preventDefault();
                $('.ui-draggable-contact').show();
                $('.ui-widget-overlay').css('display', 'block');
            });
            $('.closethick-contact').click(function () { 
                $('.ui-draggable-contact').hide();
                $('.ui-widget-overlay').css('display', 'none');
            });

            $('.supplier_contact_edit').click( function () {
                $('.ui-draggable-contact-edit').show();
                $('.ui-widget-overlay').css('display', 'block');
                var supplierContId = $(this).data('id');
                var url = "{{ route('admin.supplier.contact.edit', ':id') }}";
                url = url.replace(':id', supplierContId);
                $.ajax({
                    url: url,
                    type: 'GET',
                    success: function (data) {
                        $('#supplier_contact_edit_form input[name="supplier_cont_id"]').val(data.supplierCont.id);
                        $('#supplier_contact_edit_form select[name="mr_mrs"]').val(data.supplierCont.mr_mrs);
                        $('#supplier_contact_edit_form input[name="first_name"]').val(data.supplierCont.first_name);
                        $('#supplier_contact_edit_form input[name="last_name"]').val(data.supplierCont.last_name);
                        $('#supplier_contact_edit_form input[name="phone"]').val(data.supplierCont.phone);
                        $('#supplier_contact_edit_form input[name="cell_phone"]').val(data.supplierCont.cell_phone);
                        $('#supplier_contact_edit_form input[name="email"]').val(data.supplierCont.email);
                        $('#supplier_contact_edit_form input[name="alt_phone"]').val(data.supplierCont.alt_phone);
                        $('#supplier_contact_edit_form input[name="alt_email"]').val(data.supplierCont.alt_email);
                        $('#supplier_contact_edit_form input[name="fax"]').val(data.supplierCont.fax);
                        
                    },
                    error: function (error) {
                        console.error('Ajax request failed:', error);
                    }
                });
            });
            $('.closethick-contact-edit').click(function () { 
                $('.ui-draggable-contact-edit').hide();
                $('.ui-widget-overlay').css('display', 'none');
            });

            $('#supplier_view_edit').click( function (e) {
                e.preventDefault();
                $('.ui-draggable-supplier-edit').show();
                $('.ui-widget-overlay').css('display', 'block');
            });
            $('.edit-form-close').click(function () { 
                $('.ui-draggable-supplier-edit').hide();
                $('.ui-widget-overlay').css('display', 'none');
            });
        });

        $(document).ready(function () {
            $("#supplier_edit").validate({
                rules: {
                    'supplier_name': 'required',
                    'does_liquor_is': 'number',
                    
                }
                , messages: {
                    'supplier_name': 'Supplier Name is required',
                    'does_liquor_is': 'liquor is a must be integer value',
                }
            });
            $("#create_supplier_contact").validate({
                rules: {
                    'first_name': 'required',
                    
                }
                , messages: {
                    'first_name': 'First Name is required',
                }
            });
        });
        var id;
        $(document).on('click', '#supplier_view_delete', function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            id = $(this).attr('data-id');

            if (confirm("Are you sure you want to remove this Supplier?") == true) {
                var url = "{{ route('admin.supplier.destroy', ':id') }}";
                url = url.replace(':id', id);
                $.ajax({
                    url: url
                    , type: 'DELETE'
                    , success: function(response) {
                        if (response.success) {
                            alert(response.message);
                            window.location.href = "{{ route('admin.supplier.index') }}";
                        } else {
                            alert(response.message);
                        }
                    }
                });

            }
        });
        var cid;
        $(document).on('click', '.btn_delete_supplier_contact', function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            cid = $(this).attr('data-id');

            if (confirm("Are you sure you want to remove this Supplier Contact?") == true) {
                var url = "{{ route('admin.supplier.contact.destroy', ':id') }}";
                url = url.replace(':id', cid);
                $.ajax({
                    url: url
                    , type: 'DELETE'
                    , success: function(response) {
                            alert(response.message);
                            window.location.reload();
                    }
                });

            }
        });
    </script>
@endsection