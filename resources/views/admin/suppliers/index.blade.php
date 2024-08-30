@extends('admin.layouts.master')
@section('title','All Suppliers')
@section('content')
<div class="page-title-bar d-flex">
    <h1 class="mr-10">Supplier List</h1>
    <div class="">
        <button type="button" id="supplier_new" class="button font-bold radius-0">New Supplier</button>
    </div>
</div>
<form action="{{route('admin.supplier.index')}}" id="searchForm" method="get">
    <fieldset class="form_filters">
        <legend>Search by</legend>
        <label>Supplier Name:</label>
        <input name="supplier_name" value="{{ request('supplier_name') }}" type="text" >
        <label class="ml-5">Does Liquor:</label>
        <select class="max-100" name="does_liquor" >
            <option value="" {{ request('does_liquor') == '' ? 'selected' : '' }}>----</option>
            <option value="1" {{ request('does_liquor') == '1' ? 'selected' : '' }}>Yes</option>
            <option value="0" {{ request('does_liquor') == '0' ? 'selected' : '' }}>No</option>
        </select>
        <button class="button radius-0 mt-5 ml-5 search" type="submit">Search</button>
        <button class="button radius-0 mt-5 ml-5 clear_search" type="button">Show All</button>
    </fieldset>
</form>
<div class="top-record mt-20">
    <p align="right">
        Records: 1 to {{ count($suppliers) }} of {{ count($suppliers) }} | Show: 
        <select class="max-100">
            <option value="all" >All</option>
            <option value="{{ count($suppliers) }}" selected>{{ count($suppliers) }}</option>
            <option value="10">10</option>
            <option value="30" >30</option>
            <option value="50">50</option>
            <option value="100">100</option>
        </select>
    </p>
</div>
<table class="product-list table mt-20">
    <tr>
        <th>
            <a href="#">Supplier Name</a> 
        </th>
        <th>
            <a href="#">Does Liquor</a> 
        </th>
        <th>
            <a href="#">Email</a> 
        </th>
        <th>
            <a href="#">Phone</a>
        </th>
        <th>
            <a href="#">City</a> 
        </th>
        <th></th>
    </tr>
    @foreach ($suppliers as $_supplier)
        <tr class="supplier-row">
            <td>
                <a href="{{ route('admin.supplier.show',$_supplier->id) }}">{{$_supplier->supplier_name}}</a>
            </td>
            <td>{{($_supplier->is_liquor_supplier == 1)? 'Yes': 'No'}}</td>
            <td>{{$_supplier->general_email?? ''}}</td>
            <td>{{$_supplier->main_phone?? ''}}</td>
            <td>{{$_supplier->city?? ''}}</td>
            <td>
                <a href="javascript:void(0)" id="btn_supplier_edit" data-id="{{$_supplier->id}}">
                    <img src="{{ asset('backend/assets/img/icon_edit.png') }}" class="">
                </a>
            </td>
        </tr>
    @endforeach
</table>
{{-- create-new-supplier-start --}}
<div class="ui-widget-overlay ui-front d-none"></div>
<div class="ui-dialog ui-widget1 ui-widget-content ui-corner-all ui-front ui-draggable ui-resizable ajax_obj create-popup-form ui-draggable-supplier d-none" tabindex="-1" style="top: 166px" role="dialog" aria-describedby="ajax_obj" aria-labelledby="ui-id-15">
    <div class="ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix">
        <span id="ui-id-15" class="ui-dialog-title">New Supplier</span>
        <button class="ui-button ui-widget1 ui-state-default ui-corner-all ui-button-icon-only ui-dialog-titlebar-close" role="button" aria-disabled="false" title="close">
            <span class="ui-button-icon-primary ui-icon ui-icon-closethick closethick-create"></span>
            <span class="ui-button-text">close</span>
        </button>
    </div>
    <div id="ajax_obj" class="ui-dialog-content ui-widget-content create-form-content">
        <span id="event_new" class="xmlb_form">
            <form action="{{route('admin.supplier.store')}}" id="create_supplier" method="POST">
                <h2>New Supplier</h2>
                @csrf
                <div class="row">
                    <div class="col-4 mb-10">
                        <label class="align-right d-block">Supplier Name:</label>
                    </div>
                    <div class="col-8 mb-10 pl-0">
                        <input name="supplier_name" size="34" value="{{old('supplier_name')}}" type="text" title="Supplier Name">
                        <span class="mand_sign">*</span>
                        @error('supplier_name')
                            <span class="text-danger" style="color: rgb(255, 0, 0)">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-4 mb-10">
                        <label class="align-right d-block">Does Liquor:</label>
                    </div>
                    <div class="col-8 mb-10 pl-0">
                        <select name="does_liquor_is">
                            <option value="----" selected="selected">----</option>
                            <option value="1" {{ old('does_liquor_is') == '1' ? 'selected' : '' }}>Yes</option>
                            <option value="0" {{ old('does_liquor_is') == '0' ? 'selected' : '' }}>No</option>
                        </select> 
                        <span class="mand_sign">*</span>
                    </div>
                    <div class="col-4 mb-10">
                        <label class="align-right d-block">General Email:</label>
                    </div>
                    <div class="col-8 mb-10 pl-0">
                        <input size="34" class="general_email" name="general_email" value="{{old('general_email')}}" type="text" size="8" title="General Email">
                    </div>
                    <div class="col-4 mb-10">
                        <label class="align-right d-block">Office Phone:</label>
                    </div>
                    <div class="col-8 mb-10 pl-0">
                        <input size="34" class="office_phone" name="office_phone" value="{{old('office_phone')}}" type="text"  title="Office Phone">
                    </div>
                    <div class="col-4 mb-10">
                        <label class="align-right d-block">City:</label>
                    </div>
                    <div class="col-8 mb-10 pl-0">
                        <input size="34" class="city" name="city" value="{{old('city')}}" type="text" title="City">
                    </div>
                    <div class="col-4 mb-10">
                        <label class="align-right d-block">Province:</label>
                    </div>
                    <div class="col-8 mb-10 pl-0">
                        <select  name="province">
                            <option value="----" selected="selected">----</option>
                            <option value="AB" {{ old('province') == 'AB' ? 'selected' : '' }}>Alberta</option>
                            <option value="BC" {{ old('province') == 'BC' ? 'selected' : '' }}>British Columbia</option>
                            <option value="MB" {{ old('province') == 'MB' ? 'selected' : '' }}>Manitoba</option>
                            <option value="NB" {{ old('province') == 'NB' ? 'selected' : '' }}>New Brunswick</option>
                        </select>
                    </div>
                </div>
                <button type="submit" class="button font-bold radius-0">Save</button>
            </form>
        </span>
    </div>
</div>
{{-- create-new-supplier-end --}}
{{-- edit-supplier-start --}}
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
            <form action="{{route('admin.supplier.store')}}" id="edit_supplier" method="POST">
                @csrf
                <input type="hidden" name="supplier_id" value="">
                <fieldset class="round_box_3px">
                    <legend>Main Info</legend>
                    <div class="row">
                        <div class="col-4 mb-10">
                            <label class="align-right d-block">Supplier Name:</label>
                        </div>
                        <div class="col-8 mb-10 pl-0">
                            <input name="supplier_name" size="34" value="{{old('supplier_name')}}" type="text" title="Supplier Name">
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
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select> 
                            <span class="mand_sign">*</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4 mb-10">
                            <label class="align-right d-block">General Email:</label>
                        </div>
                        <div class="col-8 mb-10 pl-0">
                            <input size="34" class="general_email" name="general_email" type="text" size="8" title="General Email">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4 mb-10">
                            <label class="align-right d-block">Office Phone:</label>
                        </div>
                        <div class="col-8 mb-10 pl-0">
                            <input size="34" class="office_phone" name="office_phone" type="text" maxlength="10" title="Office Phone">
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
                            <input name="address_line1" size="34" type="text" title="Addr Line1">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4 mb-10">
                            <label class="align-right d-block">Addr Line2:</label>
                        </div>
                        <div class="col-8 mb-10 pl-0">
                            <input name="address_line2" size="34" type="text" title="Addr Line2">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4 mb-10">
                            <label class="align-right d-block">City:</label>
                        </div>
                        <div class="col-8 mb-10 pl-0">
                            <input name="city" size="34" type="text" title="City">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4 mb-10">
                            <label class="align-right d-block">Province:</label>
                        </div>
                        <div class="col-8 mb-10 pl-0">
                            <select name="province">
                                <option value="AB">Alberta</option>
                                <option value="BC">British Columbia</option>
                                <option value="MB">Manitoba</option>
                                <option value="NB">New Brunswick</option>
                            </select> 
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4 mb-10">
                            <label class="align-right d-block">Country:</label>
                        </div>
                        <div class="col-8 mb-10 pl-0">
                            <input name="country" size="34" type="text" title="Country">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4 mb-10">
                            <label class="align-right d-block">Postal Code:</label>
                        </div>
                        <div class="col-8 mb-10 pl-0">
                            <input name="postal_code" size="34" type="text" title="Postal Code">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4 mb-10">
                            <label class="align-right d-block">Special Notes:</label>
                        </div>
                        <div class="col-8 mb-10 pl-0">
                            <textarea  name="special_notes" rows="4" cols="50"></textarea>
                        </div>
                    </div>
                </fieldset>
                <div class="line_break"></div>
                <button type="submit" class="button font-bold radius-0">Save</button>
            </form>
        </span>
    </div>
</div>


@endsection
@section('scripts')

    <script>
        @if($errors->any())
            $(document).ready(function() {
                $('.ui-draggable-supplier').css('display', 'block');
                $('.ui-widget-overlay').css('display', 'block');
            });
        @endif
        $(document).ready(function () {
            $('#supplier_new').click( function (e) {
                e.preventDefault();
                $('.ui-draggable-supplier').show();
                $('.ui-widget-overlay').css('display', 'block');
            });
            $('.closethick-create').click(function () { 
                $('.ui-draggable-supplier').hide();
                $('.ui-widget-overlay').css('display', 'none');
            });
            $('#btn_supplier_edit').click( function () {
                $('.ui-draggable-supplier-edit').show();
                $('.ui-widget-overlay').css('display', 'block');
                var supplierId = $(this).data('id');
                var url = "{{ route('admin.supplier.edit', ':id') }}";
                url = url.replace(':id', supplierId);
                $.ajax({
                    url: url,
                    type: 'GET',
                    success: function (data) {
                        $('#edit_supplier input[name="supplier_id"]').val(data.supplier.id);
                        $('#edit_supplier input[name="supplier_name"]').val(data.supplier.supplier_name);
                        $('#edit_supplier select[name="does_liquor_is"]').val(data.supplier.is_liquor_supplier);
                        $('#edit_supplier input[name="general_email"]').val(data.supplier.general_email);
                        $('#edit_supplier input[name="office_phone"]').val(data.supplier.main_phone);
                        $('#edit_supplier input[name="address_line1"]').val(data.supplier.addr_line1);
                        $('#edit_supplier input[name="address_line2"]').val(data.supplier.addr_line2);
                        $('#edit_supplier input[name="city"]').val(data.supplier.city);
                        $('#edit_supplier select[name="province"]').val(data.supplier.province);
                        $('#edit_supplier input[name="country"]').val(data.supplier.country);
                        $('#edit_supplier input[name="postal_code"]').val(data.supplier.postal_code);
                        $('#edit_supplier textarea[name="special_notes"]').val(data.supplier.special_notes);
                        
                    },
                    error: function (error) {
                        console.error('Ajax request failed:', error);
                    }
                });
            });
            $('.edit-form-close').click(function () { 
                $('.ui-draggable-supplier-edit').hide();
                $('.ui-widget-overlay').css('display', 'none');
            });

            $('.clear_search').on('click', function() {
                window.location.href = "{{ route('admin.supplier.index') }}";
            });
            $('select[name="does_liquor"]').on('change', function() {
                $('#searchForm').submit();
            });
            $('input[name="supplier_name"]').on('change', function() {
                $('#searchForm').submit();
            });

        });
        $(document).ready(function () {
            $("#create_supplier").validate({
                rules: {
                    'supplier_name': 'required',
                    'does_liquor_is': 'number',
                    
                }
                , messages: {
                    'supplier_name': 'Supplier Name is required',
                    'does_liquor_is': 'liquor is a must be integer value',
                }
            });
            $("#edit_supplier").validate({
                rules: {
                    'supplier_name': 'required',
                    'does_liquor_is': 'number',
                    
                }
                , messages: {
                    'supplier_name': 'Supplier Name is required',
                    'does_liquor_is': 'liquor is a must be integer value',
                }
            });
            
        });

    </script>
@endsection
