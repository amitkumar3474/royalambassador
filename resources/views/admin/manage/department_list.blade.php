@extends('admin.layouts.master')
@section('title', 'Manage Departments')
@section('style')
<style>
    .special_action {
        display: inline;
    }
</style>
@endsection
@section('content')
<h1>Departments
    <div class="special_action">
        <button type="button" class="button radius-0 manage_department_new">Add New</button>
    </div>
</h1>
<div class="line_break"></div>
<form action="{{ route('admin.department.index') }}" method="get">
    <fieldset class="form_filters">
        <legend>Search</legend>
        Department Name: <input name="department_name" id="department_name" type="text" value="" maxlength="80" size="40" title="Name of this department">
        <button type="submit" id="department_list_apply_filter" class="button radius-0">Search</button>
        <button type="button" id="department_list_clear_filter" class="button radius-0">Show All</button>
    </fieldset>
</form>
<p align="right">Showing Records: 1 to {{$departments->count()}} of {{$departments->count()}}</p>
<table class="product-list table mt-20">
    <tbody>
        <tr>
            <th class="id_column"></th>
            <th>Department Name</th>
            <th>Description</th>
            <th>Date Created</th>
        </tr>
        @foreach ($departments as $department)
            <tr>
                <td class="id_column">
                    <input value="{{$department->id}}" type="checkbox" name="department_id[]" form_name="department_list"title="Click or Shift/Click to select sinlge or in a group" >
                </td>
                <td><a href="javascript:void(0)" class="edit_department" data-department-id="{{$department->id}}">{{$department->dept_name}}</a> </td>
                <td><a href="javascript:void(0)" class="edit_department" data-department-id="{{$department->id}}">{{$department->dept_desc??''}}</a></td>
                <td>{{ date('Y-m-d',strtotime($department->created_at)) }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
<div class="line_break"></div>
<div class="special_action">
    <button type="button" class="button radius-0 department_select_all">Select All</button>
    <button type="button" class="button radius-0 department_deselect">Deselect</button>
</div>
<div class="line_break"></div>
<p><input type="button" value="Delete" id="department_list_delete" name="department_list_delete" class="button radius-0"></p>

<div class="ui-widget-overlay ui-front d-none"></div>
{{-- popup module --}}
<div class="ui-dialog ui-widget1 ui-widget-content ui-corner-all ui-front ui-draggable ui-resizable ajax_obj ui-draggable-add-department d-none" tabindex="-1" style="position: absolute; height: auto; width: 600px; top: 110.5px; left: 344px;" role="dialog" aria-describedby="ajax_obj" aria-labelledby="ui-id-15">
    <div class="ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix">
        <span id="ui-id-15" class="ui-dialog-title">Add/Edit Department</span>
        <button class="ui-button ui-widget1 ui-state-default ui-corner-all ui-button-icon-only ui-dialog-titlebar-close" role="button" aria-disabled="false" title="close">
            <span class="ui-button-icon-primary ui-icon ui-icon-closethick closethick-btn"></span>
            <span class="ui-button-text">close</span>
        </button>
    </div>
    <div id="ajax_obj" class="ui-dialog-content ui-widget-content create-form-content" style="width: auto">
        <span id="event_new" class="xmlb_form">
            <form method="post" id="frm_department_new" action="" accept-charset="utf-8" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="department_edit_id" value="">
                <p>
                    <label>Department Name:</label>
                    <span class="element">
                        <input id="department_name" name="department_name" type="text" maxlength="80" size="50" title="Name of this department">
                    </span>
                    <span class="mand_sign">*</span>
                </p>
                <br>
                <p>
                    <label>Description:</label>
                    <span class="element">
                        <textarea id="department_desc" name="department_desc" cols="40" rows="6" title="Extra description for the department if needed" maxlength="400"></textarea>
                    </span>
                </p>
                <br>
                <button type="submit" id="department_new_save" class="button radius-0">Save</button>
            </form>
        </span>
    </div>
</div>
@endsection
@section('scripts')
<script>
    $(document).ready(function() {
        // popup module
        $('.manage_department_new').click(function() {
            $('.ui-draggable-add-department').removeClass('d-none');
            $('.ui-widget-overlay').removeClass('d-none');
        });
        $('.closethick-btn').click(function() {
            $('.ui-draggable-add-department').addClass('d-none');
            $('.ui-widget-overlay').addClass('d-none');
            $('#frm_department_new')[0].reset();
            $('#frm_department_new input[name="department_edit_id"]').val('');
            $('#frm_department_new').validate().resetForm();

        });

        // Select all checkboxes
        $('.department_select_all').click(function() {
            $('input[type="checkbox"][name="department_id[]"]').prop('checked', true);
        });

        // Deselect all checkboxes
        $('.department_deselect').click(function() {
            $('input[type="checkbox"][name="department_id[]"]').prop('checked', false);
        });

        $('#frm_department_new').validate({
            rules: {
                'department_name': 'required',
            },
            messages: {
                'department_name': 'Please enter Dept Name or Dept Name too short.'
            }
        });

        $('#department_list_clear_filter').click(function () { 
            window.location.href = "{{ route('admin.department.index') }}"
        });

        $('#frm_department_new').submit(function (e) { 
            e.preventDefault();
            if ($(this).valid()) {
                var formData = $('#frm_department_new').serialize();
                $.ajax({
                    type: "POST",
                    url: "{{ route('admin.department.store') }}",
                    data: formData,
                    success: function (response) {
                        if (response.success) {
                            alert(response.message);
                            window.location.reload();
                        } else {
                            alert(response.message);
                            window.location.reload();
                        }
                    },
                    error: function(xhr, status, error) {
                        // Handle errors
                        console.error(error);
                    }
                });
            }
        });
        $('#department_list_delete').click(function() {
            if (confirm('Do you really want to delete the selected item(s)?')) {
                var departmentIds = [];
                $('input[type="checkbox"][name="department_id[]"]:checked').each(function() {
                    departmentIds.push($(this).val());
                    // $(this).closest('tr').remove();
                });
                if (departmentIds.length > 0) {
                    $.ajax({
                        url: "{{ route('admin.departments.delete') }}",
                        type: 'POST',
                        data: { departmentIds: departmentIds, _token: "{{csrf_token()}}" },
                        success: function(response) {
                            if (response.success) {
                                alert(response.message);
                                window.location.reload();
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error('Error deleting data:', error);
                        }
                    });
                } else {
                    alert('Please select the items by clicking on the check box next to them.');
                }
            }
        });
        $('.edit_department').click(function () { 
            var department_id = $(this).data('department-id');
            var url = "{{ route('admin.department.edit',':id') }}";
            url = url.replace(':id',department_id);
            $.ajax({
                type: "GET",
                url: url,
                success: function (response) {
                    $('#frm_department_new input[name="department_edit_id"]').val(response.department.id)
                    $('#frm_department_new input[name="department_name"]').val(response.department.dept_name)
                    $('#frm_department_new textarea[name="department_desc"]').val(response.department.dept_desc);
                    $('.ui-draggable-add-department').removeClass('d-none');
                    $('.ui-widget-overlay').removeClass('d-none');
                }
            });
        });
    });
</script>
@endsection