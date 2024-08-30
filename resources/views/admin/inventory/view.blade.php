@extends('admin.layouts.master')
@section('title', 'Inventory Counts')
@section('content')
<div id="main_content">
    <span id="view_inv_count" class="xmlb_form">
        <div class="title_bar card">
            <h1>Cycle Count Details
                @if($invCount->inv_count_status == 1)
                {{'(Preparation)'}}
                @elseif($invCount->inv_count_status == 2)
                {{'(Being Counted)'}}
                @elseif($invCount->inv_count_status == 3)
                {{'(Counted/Applied)'}}
                @else
                {{'(Cancelled)'}}
                @endif</h1>
            <br><br>
            @php
            $dateString = $invCount->count_date;
            $date = new DateTime($dateString);
            $formattedDate = $date->format('D, M d, Y');
            @endphp
            <p><label>Date:</label><span class="element">{{ $formattedDate }}</span><span class="mand_sign"></span></p>
            <p><label>Places to Count:</label><span class="element">
                    @php $Places_to_Count = json_decode($invCount->inv_levels)?? 'Entire Inventory'@endphp
                    @if($Places_to_Count == 'Entire Inventory')
                    {{ $Places_to_Count }}
                    @else
                    @foreach($invLevels as $_invLevel)
                    @if(in_array($_invLevel->id,$Places_to_Count ))
                    {{$_invLevel->level_code}} -:-
                    @endif
                    @endforeach
                    @endif
                </span><span class="mand_sign"></span></p>
        </div>
        <fieldset>
            <legend>Main</legend>
            <label>Inv Count Status:</label>
            @if($invCount->inv_count_status == 1)
            {{'(Preparation)'}}
            @elseif($invCount->inv_count_status == 2)
            {{'(Being Counted)'}}
            @elseif($invCount->inv_count_status == 3)
            {{'(Counted/Applied)'}}
            @else
            {{'(Cancelled)'}}
            @endif
            <div class="line_break"></div><label>Total Discrep
                Qty:{{ $invCount->total_discrep_qty??0 }}</label> 0<div class="line_break"></div><label>Total Discrep
                Val:${{number_format($invCount->total_discrep_val??0,2)}}</label> $0.00<div class="line_break"></div>
            <label>Created On:</label> {{ $invCount->count_date }} <label>By:</label> {{$invCount->user->name}}
        </fieldset>
        <div class="line_break"></div>
        <div class="">
            <button id="edit_notes" class="button radius-0">Edit Notes</button>
            <button class="button radius-0 btn_delete_invcunt" data-id="{{ $invCount->id }}">Delete this Count</button>
            <button class="button radius-0">Start Counting</button>
        </div>
    </span>
    <span id="inv_count_items" class="xmlb_form">
        <fieldset>
            <legend>Items in the Count
                <button type="button" id="items_count" class="button">+</button>
            </legend>

            <p align="right">Records: 0 to 0 of 0 | Show: <select name="show_records" id="show_records"
                    onchange="handleShowRecords('inv_count_items',this.value) ;">
                    <option value="all">All</option>
                    <option value="1" selected="">1</option>
                    <option value="10">10</option>
                    <option value="30">30</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select></p>

            <table class="product-list table mt-20">
                <tbody>
                    <tr>
                        <th></th>
                        <th>
                            <a href="#">Name</a>
                        </th>
                        <th>
                            <a href="#">Product</a>
                        </th>
                        <th>
                            <a href="#">Qty Expected</a>
                        </th>
                        <th>
                            <a href="#">Qty Counted</a>
                        </th>
                        <th>

                        </th>
                        <th></th>
                    </tr>
                    <tr class="supplier-row">
                    </tr>
                </tbody>
            </table>
            <button class="button radius-0">Remove</button>
            <button class="button radius-0">Remove All</button>
        </fieldset>
    </span>
</div>

<!-- Edit Notes Module show -->
<div class="ui-widget-overlay ui-front d-none"></div>
<div class="ui-dialog ui-widget1 ui-widget-content ui-corner-all ui-front ui-draggable ui-resizable ajax_obj create-popup-form ui-draggable-edit-schedule-notes d-none"
    tabindex="-1" style=" width:555px; top: 260px; left: 394.5px;" role="dialog" aria-describedby="ajax_obj"
    aria-labelledby="ui-id-15">
    <div class="ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix">
        <span id="ui-id-15" class="ui-dialog-title">Edit Inventory Count</span>
        <button class="ui-button ui-widget1 ui-state-default ui-corner-all ui-button-icon-only ui-dialog-titlebar-close"
            role="button" aria-disabled="false" title="close">
            <span class="ui-button-icon-primary ui-icon ui-icon-closethick closethick-edit-schedule-close"></span>
            <span class="ui-button-text">close</span>
        </button>
    </div>
    <div id="ajax_obj" class="ui-dialog-content ui-widget-content create-form-content" style="width: auto">
        <span id="event_new" class="xmlb_form">
            <div class="line_break"></div>
            <form action="#" id="frm_new_inv_count" method="POST" novalidate="novalidate">
                @csrf
                <div class="row">
                    <div class="col-4 mb-10">
                        <label class="align-right d-block">Comment/Notes:</label>
                    </div>
                    <div class="col-8 mb-10 pl-0">
                        <input type="hidden" class="edit_id" name="id" value="{{ $invCount->id }}">
                        <textarea id="edit_staff_schedule_schedule_notes" name="new_count_start_notes" cols="40"
                            rows="6" maxlength="4000">{{ $invCount->count_start_notes }}</textarea>
                    </div>
                </div>
                <div class="line_break"></div>
                <button type="submit" id="frm_new_inv_count"
                    class="button font-bold radius-0 edit_staff_schedule_item_save">Save</button>
            </form>
        </span>
    </div>
</div>

<!-- Items in the Count Module -->
<div class="ui-dialog ui-widget1 ui-widget-content ui-corner-all ui-front ui-draggable ui-resizable ajax_obj create-popup-form ui-draggable-items_count d-none"
    tabindex="-1" style=" width:555px; top: 260px; left: 394.5px;" role="dialog" aria-describedby="ajax_obj"
    aria-labelledby="ui-id-15">
    <div class="ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix">
        <span id="ui-id-15" class="ui-dialog-title">Add Items to Inventory Count</span>
        <button class="ui-button ui-widget1 ui-state-default ui-corner-all ui-button-icon-only ui-dialog-titlebar-close"
            role="button" aria-disabled="false" title="close">
            <span class="ui-button-icon-primary ui-icon ui-icon-closethick closethick-edit-schedule-close"></span>
            <span class="ui-button-text">close</span>
        </button>
    </div>
    <div id="ajax_obj" class="ui-dialog-content ui-widget-content create-form-content" style="width: auto">
        <span id="event_new" class="xmlb_form">
            <div class="line_break"></div>
            <form method="post" id="frm_add_items" action="" accept-charset="utf-8" enctype="multipart/form-data">

                <input type="hidden" name="PAGE_ID" value="inv_count_add_items">

                <input type="hidden" name="PAGE_PARAMS" value="inv_count_id=414">
                <input type="hidden" name="add_items" value="add_items">
                <br>
                <h2>Add Items to be Counted</h2>
                <br>
                <label>Add All Products:</label>
                <button type="button" class="button">Favorite Products</button>
                <button type="button" class="button">In Stock Products</button>
                <br>
                <br>
                <p><label>Add Specific Type:</label><select class="lq_cat_id">
                        <option value="----">----</option>
                        <option value="63">Amaretto</option>
                        <option value="4196">Amaro</option>
                        <option value="4194">American Wisky</option>
                        <option value="36">Beer</option>
                        <option value="66">Bitters (Apperitifs/Digestives)</option>
                        <option value="4195">Bourbon</option>
                        <option value="68">Canadian Whisky (Rye)</option>
                        <option value="74">Champagne</option>
                        <option value="61">Cognac/Brandy</option>
                        <option value="60">Gin</option>
                        <option value="71">Grappa</option>
                        <option value="82">Irish Wisky</option>
                        <option value="67">Liqueurs</option>
                        <option value="70">Rum</option>
                        <option value="69">Scotch Whisky</option>
                        <option value="75">Special Orders</option>
                        <option value="72">Tequila</option>
                        <option value="76">Trevi Fountain</option>
                        <option value="65">Vermouth (Dry)</option>
                        <option value="64">Vermouth (Sweet)</option>
                        <option value="59">Vodka</option>
                        <option value="73">Wine</option>
                    </select>
                    <button type="button" class="btn_add_specific_items button">Continue</button></p>
            </form>
        </span>
    </div>
</div>
@endsection

@section('scripts')
<script>
$(document).ready(function() {
    $('#edit_notes').click(function() {
        $('.ui-draggable-edit-schedule-notes').show();
        $('.ui-widget-overlay').css('display', 'block');
    });

    $('.closethick-edit-schedule-close').click(function() {
        $('.ui-draggable-edit-schedule-notes').hide();
        $('.ui-widget-overlay').css('display', 'none');
    });

    $('#items_count').click(function() {
        $('.ui-draggable-items_count').show();
        $('.ui-widget-overlay').css('display', 'block');
    });

    $('.closethick-edit-schedule-close').click(function() {
        $('.ui-draggable-items_count').hide();
        $('.ui-widget-overlay').css('display', 'none');
    });

    $('#frm_new_inv_count').submit(function(e) {
        e.preventDefault();
        if (!$(this).find('input.error').length) {
            var formData = $('#frm_new_inv_count').serialize();
            $.ajax({
                url: "{{route('admin.inventory-count.store')}}",
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
                    // Handle errors
                    console.error(error);
                }
            });
        }
    });

    $(document).on('click', '.btn_delete_invcunt', function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        id = $(this).attr('data-id');

        if (confirm("Are you sure you want to delete this inventory count?") == true) {
            var url = "{{ route('admin.inventory-count.destroy', ':id') }}";
            url = url.replace(':id', id);
            $.ajax({
                url: url,
                type: 'DELETE',
                success: function(response) {
                    if (response.success) {
                        alert(response.message);
                        window.location.href = "{{ route('admin.inventory-count.index') }}";
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