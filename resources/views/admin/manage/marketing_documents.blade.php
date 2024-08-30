@extends('admin.layouts.master')
@section('title', 'Marketing Documents')
@section('style')
<style>
    .svg-inline--fa {
        display: var(--fa-display, inline-block);
        height: 1em;
        overflow: visible;
        vertical-align: -.125em;
    }

    /* .btn_copy_live_db_to_training {
        cursor: pointer;
        margin-left: .5em;
        color: #A04710;
        font-size: 19px;
    } */
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

    .dropzone,
    .dropzone * {
        box-sizing: border-box;
    }

    .dropzone .dz-message {
        margin: 2em 0;
        text-align: center;
    }

    .dropzone .dz-message span {
        font-weight: 400;
        font-size: 1.4em;
        color: #646c7f;
    }

    .attached_docs_wrap {
        border: 1px solid #000;
    }

    #handle_attached_docs .card {
        display: inline-block;
        min-height: 5em;
        vertical-align: top;
        margin: .5em;
    }

    .file_wrap {
        width: 18em;
        overflow: hidden;
    }

    #handle_attached_docs .card>div {
        margin: .5em;
    }

    #handle_attached_docs .att_doc_edit,
    #handle_attached_docs .att_doc_delete {
        cursor: pointer;
    }
    .forms_wrap .card {
        display: inline-block;
        width: 48%;
        vertical-align: top;
    }
    .usage_wrap {
        width: 60em;
        margin: .6em;
        vertical-align: top;
        background: #f7f7f7;
    }

    .usage_wrap>div {
        margin: 1em;
    }

    label,
    .element,
    .mand_sign {
        float: none;
        display: inline-block;
    }
    #doc_cat_new label, #doc_cat_new .element   {
        float: none;
    }
    #ajax_obj p, #ui-id-1 p {
        margin: 0 0 6px 0;
        line-height: 120%;
        padding: 2px;
    }
    #ajax_obj label {
        font-weight: bold;
        padding-right: 5px;
        min-width: 125px;
        text-align: right;
        display: inline-block;
        vertical-align: top;
    }
    .att_doc_edit_wrap input {
        width: 25em;
    }
    #doc_cat_edit label, #doc_cat_edit .element {
        float: none;
    }
</style>
@endsection
@section('content')
<div class="title_bar card">
    <h1>Document Categories / Marketing Documents</h1>
</div>

<div class="forms_wrap">
    <div class="card">
        <div>
            <span id="document_categories" class="xmlb_form">
                <form method="post" id="frm_document_categories" action="" accept-charset="utf-8" enctype="multipart/form-data">
                    <input type="hidden" name="PAGE_ID" value="marketing_documents">
                    <input type="hidden" name="document_categories" value="document_categories">
                    <input type="hidden" id="document_categories_submit" name="document_categories_submit">
                    <h2>Categories for Uploaded Documents
                        <a href="javascript:void(0)" class="btn_add_cat_d">
                            <svg class="svg-inline--fa fa-plus" aria-hidden="true" focusable="false" data-prefix="fas"
                                data-icon="plus" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                data-fa-i2svg="">
                                <path fill="currentColor"
                                    d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z">
                                </path>
                            </svg><!-- <i class="fas fa-plus"></i> Font Awesome fontawesome.com -->
                        </a>
                    </h2>
                    @foreach($attachedDocCategories as $_attachedDocCategory)
                        <div class="card usage_wrap">
                            <div>
                                <h3>{{ catUsageDoc()[$_attachedDocCategory->cat_usage] }}
                                    <a href="javascript:void(0)" class="btn_add_cat_d">
                                        <svg class="svg-inline--fa fa-plus" aria-hidden="true" focusable="false"
                                            data-prefix="fas" data-icon="plus" role="img" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 448 512" data-fa-i2svg="">
                                            <path fill="currentColor"
                                                d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z">
                                            </path>
                                        </svg><!-- <i class="fas fa-plus"></i> Font Awesome fontawesome.com -->
                                    </a>
                                </h3>
                                <table class="product-list">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Desc</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php 
                                            $datas = App\Models\AttachedDocCategory::where('cat_usage', $_attachedDocCategory->cat_usage)->get();
                                        @endphp 
                                        @foreach($datas as $_data)
                                            <tr>
                                                <td>{{ $_data->cat_name }}
                                                    @if($_data->is_default_cat == 1)
                                                        <span title="Default category for products under this usage type">
                                                            (*Default*)
                                                        </span>
                                                    @endif
                                                </td>
                                                <td>{{ $_data->cat_desc }}</td>
                                                <td align="center">
                                                    <button type="button" class="button font-bold radius-0 btn_edit_doc_cat" doc_cat_id="{{ $_data->id }}">Edit</button>
                                                    <button type="button" id="document_categories_delete" class="button font-bold radius-0 btn_delete_doc_cat" doc_cat_id="{{ $_data->id }}">Delete</button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @endforeach
                </form>
            </span>
        </div>
    </div>

    <div class="card">
        <div>
            <h2>Marketing Documents</h2>
            <p>These are the documents that appear under eamil pages and you can easily attach and send them
                to customers or prospects.</p>
            <span id="handle_attached_docs" class="xmlb_form">
                <form action="{{ route('admin.marketing-documents.store') }}" class="dropzone dz-clickable" id="doc-upload">
                    @csrf
                    <input type="hidden" name="lnk_related_rec" value="0">
                    <input type="hidden" name="usage_type" value="MKT">
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
                <div class="attached_docs_wrap">
                    
                </div>
            </span>
        </div>
    </div>
</div>

<div class="ui-widget-overlay ui-front d-none"></div>
<!-- add new Document Categories  module  -->
<div class="ui-dialog ui-widget1 ui-widget-content ui-corner-all ui-front ui-draggable ui-resizable ajax_obj create-popup-form ui-draggable-add-new-cat_do d-none "
    tabindex="-1" style="width: 600px; top: 198.5px; left: 328px;" role="dialog" aria-describedby="ajax_obj"
    aria-labelledby="ui-id-15">
    <div class="ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix">
        <span id="ui-id-15" class="ui-dialog-title">Add/Edit Document Category</span>
        <button class="ui-button ui-widget1 ui-state-default ui-corner-all ui-button-icon-only ui-dialog-titlebar-close add-new-cat-do-close"
            role="button" aria-disabled="false" title="close">
            <span class="ui-button-icon-primary ui-icon ui-icon-closethick"></span>
            <span class="ui-button-text">close</span>
        </button>
    </div>
    <div id="ajax_obj" class="ui-dialog-content ui-widget-content create-form-content" style="width: auto">
        <span id="doc_cat_new" class="xmlb_form">
            <form method="post" id="frm_doc_cat_new" action="{{ route('admin.document-category.store') }}" accept-charset="utf-8" enctype="multipart/form-data">
                @csrf
                <p>
                    <label>Usage:</label>
                    <span class="element">
                        <select id="doc_cat_new_cat_usage" name="cat_usage" fdprocessedid="ussrou">
                            <option value="">----</option>
                            @foreach(catUsageDoc() as $key => $_catUsageDoc)
                                <option value="{{ $key }}">{{ $_catUsageDoc }}</option>
                            @endforeach
                            <!-- <option value="MKT">Marketing</option>
                            <option value="EVT">Event</option>
                            <option value="PRT">Product</option>
                            <option value="PCT">Product Category</option>
                            <option value="CTR">Customer</option>
                            <option value="STF">Staff</option>
                            <option value="TSK">User Task</option>
                            <option value="ITN">Itinerary</option> -->
                        </select>
                    </span>
                    <span class="mand_sign">*</span>
                </p>
                <p>
                    <label>Name:</label>
                    <span class="element">
                        <input id="doc_cat_new_cat_name" name="cat_name" type="text" maxlength="180" size="50" title="Name of the category" fdprocessedid="1q5ve9j">
                    </span>
                    <span class="mand_sign">*</span>
                </p>
                <p>
                    <label>Use as Default:</label>
                    <span class="element">
                        <select id="doc_cat_new_is_default_cat" name="is_default_cat" fdprocessedid="u0jie">
                            <option value="" selected="selected">----</option>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </span>
                    <span class="mand_sign">*</span>
                </p>
                <p>
                    <label>Description:</label>
                    <span class="element">
                        <textarea id="doc_cat_new_cat_desc" name="cat_desc" cols="47" rows="6" title="Short description of the category" maxlength="120"></textarea>
                    </span>
                    <span class="mand_sign"></span>
                </p>   
                <div class="line_break"></div>
                <div class="">
                    <button type="submit" id="doc_cat_new_save" class="button font-bold radius-0 btn_edit_doc_cat">Save</button>
                </div>    
            </form>
        </span>
    </div>
</div>

<!-- Edit Document Categories  module  -->
<div class="ui-dialog ui-widget1 ui-widget-content ui-corner-all ui-front ui-draggable ui-resizable ajax_obj create-popup-form ui-draggable-edit-cat_do d-none "
    tabindex="-1" style="width: 600px; top: 198.5px; left: 328px;" role="dialog" aria-describedby="ajax_obj"
    aria-labelledby="ui-id-15">
    <div class="ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix">
        <span id="ui-id-15" class="ui-dialog-title">Add/Edit Document Category</span>
        <button class="ui-button ui-widget1 ui-state-default ui-corner-all ui-button-icon-only ui-dialog-titlebar-close edit-cat-do-close"
            role="button" aria-disabled="false" title="close">
            <span class="ui-button-icon-primary ui-icon ui-icon-closethick"></span>
            <span class="ui-button-text">close</span>
        </button>
    </div>
    <div id="ajax_obj" class="ui-dialog-content ui-widget-content create-form-content" style="width: auto">
        <span id="doc_cat_edit" class="xmlb_form">
            <form method="post" id="frm_doc_cat_edit" action="" accept-charset="utf-8" enctype="multipart/form-data">
                @method('put')
                @csrf
                <input type="hidden" name="PAGE_ID" value="attached_doc_cat_add_edit">
                <input type="hidden" name="PAGE_PARAMS" value="att_doc_cat_id=7&amp;action=edit">
                <input type="hidden" name="doc_cat_edit" value="doc_cat_edit">
                <p>
                    <label>Name:</label>
                    <span class="element">
                        <input id="doc_cat_edit_cat_name" name="cat_name" type="text" maxlength="180" size="50" value="Event Planner" title="Name of the category">
                    </span>
                    <span class="mand_sign">*</span>
                </p>
                <p>
                    <label>Default:</label>
                    <span class="element">
                        <input id="doc_cat_edit_is_default_cat" name="is_default_cat" type="checkbox">
                    </span>
                </p>
                <p>
                    <label>Description:</label>
                    <span class="element">
                        <textarea id="doc_cat_edit_cat_desc" name="cat_desc" cols="47" rows="6" title="Short description of the category" maxlength="120"></textarea>
                    </span>
                    <span class="mand_sign"></span>
                </p>     
                    
                <br>
                <div class="">
                    <button type="submit" id="doc_cat_edit_save" class="button font-bold radius-0 btn_edit_doc_cat">Save</button>
                </div> 
            </form>
        </span>
    </div>
</div>

<!-- Edit Marketing Document Module -->
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
<script>
    $(document).ready(function(){
        // Show Doc cat Add Form
        $('.btn_add_cat_d').click(function(){
            $('.ui-widget-overlay').removeClass('d-none');
            $('.ui-draggable-add-new-cat_do').removeClass('d-none');
        });

        $('.add-new-cat-do-close').click(function(){
            $('.ui-widget-overlay').addClass('d-none');
            $('.ui-draggable-add-new-cat_do').addClass('d-none');
        });

        $('.edit-cat-do-close').click(function(){
            $('.ui-widget-overlay').addClass('d-none');
            $('.ui-draggable-edit-cat_do').addClass('d-none');
        });

        // Validation Doc cat Add Form
        $('#frm_doc_cat_new').validate({
            rules: {
                'cat_usage': 'required',
                'cat_name': 'required',
                'is_default_cat': 'required',
            },
            messages:{
                'cat_usage' : "Please enter ATTACHED_DOC_CAT.Cat Usage. It has to be #min_len# characters.",
                'cat_name': 'Please enter ATTACHED_DOC_CAT.Cat Name. It has to be 1 character.',
                'is_default_cat': 'Please enter ATTACHED_DOC_CAT.Is Default Cat. It has to be #min_len# characters.',
            }
        });

        // Validation Doc cat Edit Form
        $('#frm_doc_cat_edit').validate({
            rules: {
                'cat_name': 'required',
            },
            messages:{
                'cat_name' : "Please enter ATTACHED_DOC_CAT.Cat Name. It has to be 1 character.",
            }
        });

        // Doc cat Edit Form Show
        $('.btn_edit_doc_cat').click(function(){
            var id = $(this).attr('doc_cat_id');
            var url = "{{ route('admin.document-category.edit', ':id') }}";
            url = url.replace(':id', id);
                $.ajax({
                type: "get",
                url: url,
                success: function (response) {
                    var url = "{{ route('admin.document-category.update', ':id') }}";
                    url = url.replace(':id', response.attachedDocCategory.id);
                    $('#frm_doc_cat_edit').attr('action', url)
                    $('#frm_doc_cat_edit input[name="cat_name"]').val(response.attachedDocCategory.cat_name)
                    $('#frm_doc_cat_edit textarea[name="cat_desc"]').val(response.attachedDocCategory.cat_desc)
                    if(response.attachedDocCategory.is_default_cat == 1) {
                        $('#frm_doc_cat_edit input[name="is_default_cat"]').prop('checked', true);
                    } else {
                        $('#frm_doc_cat_edit input[name="is_default_cat"]').prop('checked', false);
                    }
                    $('.ui-widget-overlay').removeClass('d-none');
                    $('.ui-draggable-edit-cat_do').removeClass('d-none');
                }
            });
        });

        // Doc cat Delete
        $('.btn_delete_doc_cat').click(function(){
            if(confirm("Do you really want to delete this record?")){
                var id = $(this).attr('doc_cat_id');
                var url = "{{ route('admin.document-category.destroy', ':id') }}";
                url = url.replace(':id', id);
                $.ajax({
                    type: "DELETE",
                    url: url,
                    data: {_token: "{{ csrf_token() }}"},
                    success: function (response) {
                        window.location.reload();
                    }
                });
            }
        });
    })

    var usage_type = 'MKT';
    var lnk_related_rec = '0';
</script>
@include('admin.manage.drag_and_drop_js');
@endsection