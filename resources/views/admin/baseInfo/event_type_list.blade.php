@extends('admin.layouts.master')
@section('title', 'All Event Types')
@section('style')
<style>
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
<h1>Event Types <button class="button font-bold radius-0" id="add_new_event_type" type="button">Add New</button></h1>
<div style="width: 30%;">
    <form action="{{ route('admin.base-info.event-type-list.index') }}" id="search_evwnt_type">
        <div class="top-record mt-20 pages_p">
            <p align="right">
                <span id="records-display">Records: 1 to 30</span> of <span id="total_records"> {{ $allRecords }} </span> | Show:
                <select id="perPageSelect" class="max-100" name="pages">
                    <option value="10" {{ request('pages') == 10?'selected':''}}>10</option>
                    <option value="30" {{ request('pages') == 30?'selected':''}} @if(request('pages') == null){{'selected'}}@endif>30</option>
                    <option value="50" {{ request('pages') == 50?'selected':''}}>50</option>
                    <option value="100" {{ request('pages') == 100?'selected':''}}>100</option>
                </select>
            </p>
        </div>
    </form>
    <table id="event_type_list" class="product-list table mt-20">
        <thead>
            <tr>
                <th></th>
                <th>Type Name</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($eventTypes as $_eventType)
                <tr>
                    <td><input type="checkbox" value="{{ $_eventType->id }}" name="event_type"></td>
                    <td>{{ $_eventType->type_name }}</td>
                    <td>
                        <button type="button" class="button font-bold radius-0 btn_edit_event_type" event_type_id="{{ $_eventType->id }}">Edit</button>
                        <button type="button" class="button font-bold radius-0 btn_delete_event_type" event_type_id="{{ $_eventType->id }}">Delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <span id="select_deselect">
        <button type="button" class="button font-bold radius-0 btn_select_all_event_type">Select All</button>/
        <button type="button" class="button font-bold radius-0 btn_deselect_event_type">DeSelect</button>
    </span>
    <div id="pagination-links" class="pagination">
        {{ $eventTypes->links() }}
    </div>
    <p>
        <button type="button" class="button font-bold radius-0 btn_checked_delete_event_type">Delete</button>
    </p>
</div>

<div class="ui-widget-overlay ui-front d-none"></div>
<!-- add new event type module  -->
<div class="ui-dialog ui-widget1 ui-widget-content ui-corner-all ui-front ui-draggable ui-resizable ajax_obj create-popup-form ui-draggable-add-new-event-type d-none "
    tabindex="-1" style="width: 560px; top: 257.5px; left: 448px;" role="dialog" aria-describedby="ajax_obj"
    aria-labelledby="ui-id-15">
    <div class="ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix">
        <span id="ui-id-15" class="ui-dialog-title"></span>
        <button class="ui-button ui-widget1 ui-state-default ui-corner-all ui-button-icon-only ui-dialog-titlebar-close"
            role="button" aria-disabled="false" title="close">
            <span class="ui-button-icon-primary ui-icon ui-icon-closethick add-new-event-type-close"></span>
            <span class="ui-button-text">close</span>
        </button>
    </div>
    <div id="ajax_obj" class="ui-dialog-content ui-widget-content create-form-content" style="width: auto">
        <span id="edit_liquor_brand" class="xmlb_form">
            <form action="{{ route('admin.base-info.event-type-list.store') }}" id="frm_add_new_event_type" method="POST" novalidate="novalidate">
                @csrf
                <input type="hidden" value="" name="event_type_id">
                <div class="row">
                    <div class="col-4 mb-10">
                        <label class="align-right d-block">Type Name:</label>
                    </div>
                    <div class="col-8 mb-10 pl-0">
                        <input id="" name="type_name" value="" type="text"
                            maxlength="60" size="40" title="Name of this event type">
                        <span class="mand_sign">*</span>
                    </div>
                </div>
                <div class="line_break"></div>
                <button type="submit" class="button font-bold radius-0">Save</button>
            </form>
        </span>
    </div>
</div>
@endsection
@section('scripts')
<script>
$(document).ready(function() {
    $('#add_new_event_type').click(function() {
        $('.ui-draggable-add-new-event-type').find('.ui-dialog-title').html('New Event Type');
        $('#frm_add_new_event_type input[name="event_type_id"]').val('');
        $('#frm_add_new_event_type input[name="type_name"]').val('');
        $('.ui-widget-overlay').removeClass('d-none');
        $('.ui-draggable-add-new-event-type').removeClass('d-none');
    });

    $('.add-new-event-type-close').click(function() {
        $('#frm_add_new_event_type').validate().resetForm();
        $('.ui-widget-overlay').addClass('d-none');
        $('.ui-draggable-add-new-event-type').addClass('d-none');
    });

    $('#frm_add_new_event_type').validate({
        rules: {
            'type_name': 'required'
        },
        messages: {
            'type_name' : 'Please enter Type Name or Type Name too short. It has to be 1 characters.'
        }
    });

    $('.btn_edit_event_type').click(function() {
        var event_type_id = $(this).attr('event_type_id');
        var event_type_name = $(this).closest('tr').find('td:nth-child(2)').text();
        $('.ui-draggable-add-new-event-type').find('.ui-dialog-title').html('Edit Event Type');
        $('#frm_add_new_event_type input[name="event_type_id"]').val(event_type_id);
        $('#frm_add_new_event_type input[name="type_name"]').val(event_type_name);
        $('.ui-widget-overlay').removeClass('d-none');
        $('.ui-draggable-add-new-event-type').removeClass('d-none');
    });

    $('.btn_delete_event_type').click(function(){
        if(confirm('Do you really want to delete this record?')){
            var event_type_id = $(this).attr('event_type_id');
            var url = "{{ route('admin.base-info.event-type-list.destroy', ':id') }}";
            url = url.replace(':id', event_type_id);
            $.ajax({
                type: "DELETE",
                url: url,
                data: {_token: "{{ csrf_token() }}"},
                success: function (response) {
                    alert(response.success);
                    window.location.reload();
                }
            });
        }
    });

    $('.btn_select_all_event_type').click(function(){
        $('#event_type_list input[name="event_type"]').prop('checked', true);
    });

    $('.btn_checked_delete_event_type').click(function(){
        if(confirm('Do you really want to delete all checked records?')){
            var checkedIds = $('#event_type_list input[name="event_type"]:checked').map(function() {
                return $(this).val();
            }).get();

            if (checkedIds.length > 0) {
                var url = "{{ route('admin.base-info.event-type-list.destroy', ':id') }}";
                url = url.replace(':id', checkedIds.join(','));
                    console.log(url);
                $.ajax({
                    type: "DELETE",
                    url: url,
                    data: {_token: "{{ csrf_token() }}"},
                    success: function (response) {
                        alert(response.success);
                        window.location.reload();
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            } else {
                alert('No records selected for deletion');
            }
        }
    });

    $('.btn_deselect_event_type').click(function(){
        $('#event_type_list input[name="event_type"]').prop('checked', false);
    })

    $(document).ready(function() {
        $('#perPageSelect').on('change', function() {
            const perPage = $(this).val();
            const url = new URL(window.location.href);
            url.searchParams.set('perPage', perPage);
            window.location.href = url.toString();
            $('#search_evwnt_type').submit();
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