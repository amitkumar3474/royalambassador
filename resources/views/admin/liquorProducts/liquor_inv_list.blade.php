@extends('admin.layouts.master')
@section('title', 'Liquor Lists')
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

    .az_tabs>ul li.active {
        margin-bottom: -1px;
        border-bottom: 0;
        background: #FFF;
    }

    .az_tabs>ul li {
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
        padding: 1.5em;
        margin-top: -1px;
        border: 1px solid #999;
    }

    .list_wrap {
        width: 45%;
        display: inline-block;
        vertical-align: top;
        margin: .3em;
    }
    p {
        margin: 0 0 6px 0;
        line-height: 120%;
        padding: 2px;
    }
    #new_liquor_list label, #new_liquor_list .element {
        float: none;
        display: inline-block;
        vertical-align: top;
    }

    #new_liquor_list label {
        width: 8em;
        min-width: auto;
        text-align: right;
    }
    .btn_delete_lq_list {
        cursor: pointer;
    }
    .ui-menu {
        list-style: none;
        padding: 2px;
        margin: 0;
        display: block;
        outline: none;
        border-radius:4px;
        border: 1px solid #aaaaaa;
        z-index: 100;
        top: 0;
        left: 0;
    }
    .ui-menu .ui-menu-item a {
        text-decoration: none;
        display: block;
        /* padding: 2px .4em; */
        line-height: 1.5;
        min-height: 0;
        font-weight: normal;
        color: #222222;
        cursor: default;
    }
    .ui-menu .ui-menu-item {
        margin: 0;
        padding: 0;
        width: 100%;
    }
    .ui-menu li.ui-menu-item:hover{
        background: #ccc;
        border-radius: 4px;

    }
</style>
@endsection
@section('content')
<div class="title_bar card">
    <h1>Liquor Product Setup</h1>
</div>
<div class="line_break"></div>
<div id="event_tabs" class="az_tabs">
    <ul>
        <li><a href="{{route('admin.liquor.base-info')}}">Main</a></li>
        <li class="active">List <a href="javascript:void(0)" id="btn_add_new_liquor_list">
                <svg class="svg-inline--fa fa-plus" aria-hidden="true" focusable="false" data-prefix="fas"
                    data-icon="plus" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                    data-fa-i2svg="">
                    <path fill="currentColor"
                        d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z">
                    </path>
                </svg><!-- <i class="fas fa-plus"></i> Font Awesome fontawesome.com --></a></li>
        <li><a href="{{ route('admin.liquor.bin-setup', ['is_active' => 1]) }}">All Bins</a></li>
    </ul>
    <div class="cur_az_tab" id="event_tabs-1" aria-labelledby="ui-id-1" role="tabpanel" aria-expanded="true" aria-hidden="false">
        <div class="row">
            @foreach($liquorLists as $_liquorList)
                <div class="col-6 card list_wrap">
                    <div class="cus-row ">
                        <div class="col-12 main-order-item">
                            <h2>{{ $_liquorList->lq_list_name }} ({{ $_liquorList->liquorListItems->count() }})
                                <span class="btn_delete_lq_list" lq_list_id="{{ $_liquorList->id }}">
                                    <svg style="width: 10px" class="svg-inline--fa fa-trash-can" aria-hidden="true"
                                        focusable="false" data-prefix="far" data-icon="trash-can" role="img"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                                        <path fill="currentColor"
                                            d="M170.5 51.6L151.5 80h145l-19-28.4c-1.5-2.2-4-3.6-6.7-3.6H177.1c-2.7 0-5.2 1.3-6.7 3.6zm147-26.6L354.2 80H368h48 8c13.3 0 24 10.7 24 24s-10.7 24-24 24h-8V432c0 44.2-35.8 80-80 80H112c-44.2 0-80-35.8-80-80V128H24c-13.3 0-24-10.7-24-24S10.7 80 24 80h8H80 93.8l36.7-55.1C140.9 9.4 158.4 0 177.1 0h93.7c18.7 0 36.2 9.4 46.6 24.9zM80 128V432c0 17.7 14.3 32 32 32H336c17.7 0 32-14.3 32-32V128H80zm80 64V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16z">
                                        </path>
                                    </svg><!-- <i class="far fa-trash-alt"></i> Font Awesome fontawesome.com --></span>
                                <a href="javascript:void(0)" class="btn_edit_lq_list" lq_list_id="{{ $_liquorList->id }}"><svg style="width: 10px" class="svg-inline--fa fa-pen" aria-hidden="true"
                                        focusable="false" data-prefix="fas" data-icon="pen" role="img"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                        <path fill="currentColor"
                                            d="M362.7 19.3L314.3 67.7 444.3 197.7l48.4-48.4c25-25 25-65.5 0-90.5L453.3 19.3c-25-25-65.5-25-90.5 0zm-71 71L58.6 323.5c-10.4 10.4-18 23.3-22.2 37.4L1 481.2C-1.5 489.7 .8 498.8 7 505s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L421.7 220.3 291.7 90.3z">
                                        </path>
                                    </svg><!-- <i class="fas fa-pen"></i> Font Awesome fontawesome.com --></a>
                            </h2>
                            <hr>
                            <div>
                                <table class="product-list table">
                                    @foreach($_liquorList->liquorListItems as $_liquorListItem)
                                        <tr class="supplier-row">
                                            <td>
                                                @if($_liquorListItem->product->product_type == 'L')
                                                    <a href="{{ route('admin.liquor-product.view', $_liquorListItem->product->id) }}">{{ $_liquorListItem->product->product_name }}</a>
                                                @else
                                                    <a href="{{ route('admin.base-info.product-menu-view',$_liquorListItem->product->id ) }}">{{ $_liquorListItem->product->product_name }}</a>
                                                @endif
                                            </td>
                                            <td>{{ number_format($_liquorListItem->qty, 1) }}</td>
                                            <td><button class="button font-bold radius-0 btn_delete_lq_list_item" lq_list_item_id="{{ $_liquorListItem->id }}">Delete</button></td>
                                        </tr>
                                    @endforeach
                                </table>
                                <div class="line_break"></div>
                                <p>
                                    <label>Add More Items:</label>
                                    <span role="status" aria-live="polite" class="ui-helper-hidden-accessible"></span>
                                    <input type="text" class="sku ui-autocomplete-input" size="35" autocomplete="off">
                                    <input type="number" size="10" class="qty" step="1" value="0">
                                    <button class="button font-bold radius-0 btn_save_lq_list" lq_list_id="{{ $_liquorList->id }}">GO</button>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
{{-- models popup element --}}
<div class="ui-widget-overlay ui-front d-none"></div>
<!-- New Liquor List -->
<div class="ui-dialog ui-widget1 ui-widget-content ui-corner-all ui-front ui-draggable ui-resizable ajax_obj create-popup-form ui-draggable-new-liquor-list d-none "
    tabindex="-1" style="position: absolute; height: auto; width: 480px; top: 225.5px; left: 388px;" role="dialog"
    aria-describedby="ajax_obj" aria-labelledby="ui-id-15">
    <div class="ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix">
        <span id="ui-id-15" class="ui-dialog-title">Add/Edit Liquor List</span>
        <button class="ui-button ui-widget1 ui-state-default ui-corner-all ui-button-icon-only ui-dialog-titlebar-close ui-new-liquor-list-close"
            role="button" aria-disabled="false" title="close">
            <span class="ui-button-icon-primary ui-icon ui-icon-closethick"></span>
            <span class="ui-button-text">close</span>
        </button>
    </div>
    <div id="ajax_obj" class="ui-dialog-content ui-widget-content create-form-content" style="width: auto">
        <span id="new_liquor_list" class="xmlb_form">
            <form method="post" id="frm_new_liquor_list" action="{{ route('admin.liquor-inv-list.store') }}" accept-charset="utf-8" enctype="multipart/form-data">
                @csrf
                <input type="hidden" value="" name="lq_list_id">
                <br>
                <h2 id="liquor_list_title"></h2>
                <br>
                <p>
                    <label>Name:</label>
                    <span class="element">
                        <input id="new_liquor_list_lq_list_name" name="lq_list_name" type="text" maxlength="30" size="20" title="Name of this list like standard or deluxe bar">
                    </span>
                    <span class="mand_sign">*</span>
                </p>
                <p>
                    <label>Description:</label>
                    <span class="element">
                        <textarea id="new_liquor_list_lq_list_desc" name="lq_list_desc" cols="40" rows="2" title="Description of this list if any" maxlength="500"></textarea>
                    </span>
                    <span class="mand_sign"></span>
                </p>
                <br>
                <div class="">
                    <button id="new_liquor_list_save" class="button font-bold radius-0">Save</button>
                </div>
            </form>
        </span>
    </div>
</div>
@endsection
@section('scripts')
<script>
    $(document).ready(function(){
        $('#btn_add_new_liquor_list').click(function(){
            $('#frm_new_liquor_list #liquor_list_title').html('New Liquor List');
            $('.ui-widget-overlay').removeClass('d-none');
            $('.ui-draggable-new-liquor-list').removeClass('d-none');
        });
    
        $('.ui-new-liquor-list-close').click(function(){
            $('#frm_new_liquor_list input[name="lq_list_id"]').val('');
            $('#frm_new_liquor_list input[name="lq_list_name"]').val('');
            $('#frm_new_liquor_list textarea[name="lq_list_desc"]').val('');
            $('.ui-widget-overlay').addClass('d-none');
            $('.ui-draggable-new-liquor-list').addClass('d-none');
        });
    
        $('.btn_edit_lq_list').click(function(){
            $('#frm_new_liquor_list #liquor_list_title').html('Edit Liquor List');
            var lq_list_id = $(this).attr('lq_list_id');
            var url = "{{ route('admin.liquor-inv-list.edit', ':id') }}";
            url = url.replace(':id', lq_list_id);
            $.ajax({
                type: "GET",
                url: url,
                success: function (response) {
                    console.log(response.liquorList);
                    $('#frm_new_liquor_list input[name="lq_list_id"]').val(response.liquorList.id);
                    $('#frm_new_liquor_list input[name="lq_list_name"]').val(response.liquorList.lq_list_name);
                    $('#frm_new_liquor_list textarea[name="lq_list_desc"]').val(response.liquorList.lq_list_desc);
    
                    $('.ui-widget-overlay').removeClass('d-none');
                    $('.ui-draggable-new-liquor-list').removeClass('d-none');
                }
            });
        });
    
        $('#frm_new_liquor_list').submit(function(e){
            var lq_list_name = $('#frm_new_liquor_list input[name="lq_list_name"]').val();
            if(lq_list_name == ''){
                alert('Please enter Lq List Name or Lq List Name too short. It has to be 1 characters.');
                e.preventDefault();
            }
        });
    
        var $activeInputField;
        $(document).on('input', '.main-order-item .ui-autocomplete-input', function() {
            var inputValue = $(this).val(); // Get the value of the input field
            $activeInputField = $(this); // Store the reference to the input field
            var inputOffset = $activeInputField.offset(); // Get the position of the input field
            var inputHeight = $activeInputField.outerHeight(); // Get the height of the input field
    
            $.ajax({
                url: "{{ route('admin.liquor-product-search') }}",
                type: 'GET', 
                data: { input_value: inputValue },
                success: function(response) {
                    $('.liquor_product').remove(); 
                    var html = '<ul class="liquor_product ui-menu" style="position: absolute; top:' + (inputOffset.top + inputHeight) + 'px; left:' + inputOffset.left + 'px; width:' + $activeInputField.outerWidth() + 'px; background: white;">';
                    $.each(response.productNames, function(index, product) {
                        html += '<li class="ui-menu-item" lnk_product="' + product.id + '"><a>' + product.product_name + '</a></li>';
                    });
                    html += '</ul>';
                    $('body').append(html);
                }
            });
        });

        $(document).on('click', '.liquor_product li', function(event) {
            var selectedText = $(this).text();
            var product_id = $(this).attr('lnk_product');
            if ($activeInputField) {
                $activeInputField.val(selectedText);
                $activeInputField.attr('product_id', product_id);
                $activeInputField = null; 
            }
            $('.liquor_product').remove(); 
        });

        $('.btn_save_lq_list').click(function(e) {
            var lq_list_id = $(this).attr('lq_list_id');
            var product_id = $(this).closest('p').find('.ui-autocomplete-input').attr('product_id');
            var qty = $(this).closest('p').find('.qty').val();
            $('.error_message').remove();

            if (product_id === undefined) {
                var errorMessage = $('<div class="error_message"><p>Please enter Liquor for this line or remove it.</p></div>').css({
                    'position': 'absolute',
                    'top': $(this).offset().top + $(this).outerHeight() - 200,
                    'right': '50px',
                    'background-color': '#FF6600',
                    'color': '#fff',
                    'padding': '.3em',
                    'border-radius': '1px solid #A30003',
                    'font-weight': '500',
                    'z-index': '100'
                });
                $('body').append(errorMessage);
                setTimeout(function() {
                    errorMessage.fadeOut('slow', function() {
                        $(this).remove();
                    });
                }, 1000);
                e.preventDefault();
            }else if (qty <= 0) {
                var errorMessage = $('<div class="error_message"><p>Please enter valid qty for this line or remove it.</p></div>').css({
                    'position': 'absolute',
                    'top': $(this).offset().top + $(this).outerHeight() - 200,
                    'right': '50px',
                    'background-color': '#FF6600',
                    'color': '#fff',
                    'padding': '.3em',
                    'border-radius': '1px solid #A30003',
                    'font-weight': '500',
                    'z-index': '100'
                });
                $('body').append(errorMessage);
                setTimeout(function() {
                    errorMessage.fadeOut('slow', function() {
                        $(this).remove();
                    });
                }, 1000);
                e.preventDefault();
            }else {
                $.ajax({
                    type: "GET",
                    url: "{{ route('admin.liquor-list-item.store') }}",
                    data: {lq_list_id: lq_list_id, product_id: product_id, qty: qty},
                    success: function (response) {
                        window.location.reload(); // Reload the page after successful submission
                    }
                });
            }
        });

        $('.btn_delete_lq_list').click(function(){
            if(confirm("Delete this list?")){
                var lq_list_id = $(this).attr('lq_list_id');
                var url = "{{ route('admin.liquor-inv-list.destroy', ':id') }}";
                url = url.replace(':id', lq_list_id);
                $.ajax({
                    type: "DELETE",
                    url: url,
                    data: {_token: "{{ csrf_token() }}"},
                    success: function (response) {
                        if(response.success){
                            window.location.reload();
                        }else{
                            alert('LIQUOR_LIST delete not allowed. Related records exists in LIQUOR_LIST_ITEM.LNK_LIQUOR_LIST column.')
                            window.location.reload();
                        }
                    }
                });
            }
        });

        $('.btn_delete_lq_list_item').click(function(){
            if(confirm("Do you really want to delete this record?")){
                var lq_list_item_id = $(this).attr('lq_list_item_id');
                $.ajax({
                    type: "GET",
                    url: "{{ route('admin.liquor-list-item.destroy') }}",
                    data: {id: lq_list_item_id},
                    success: function (response) {
                        window.location.reload();
                    }
                });
            }
        });
    });

</script>
@endsection