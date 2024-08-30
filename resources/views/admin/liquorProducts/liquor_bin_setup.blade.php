@extends('admin.layouts.master')
@section('title', 'Liquor Bins')
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
    .form_body {
        display: grid;
        grid-gap: .2em;
        grid-template-columns: 1fr 1fr 1fr;
    }

    .form_body>div {
        position: relative;
    }

    .form_body>div .actions {
        position: absolute;
        top: .1em;
        right: .1em;
    }

    #liquor_bins label {
        float: none;
    }

    #liquor_bins .green_font {
        font-size: 1.6em;
    }
    .form_filters {
        position: relative;
    }
    .form_filters .show_recs {
        position: absolute;
        top: -2em;
        right: 20px;
        background: #fff;
        padding: 0 .8em;
    }
    .green_font {
        color: #028955;
    }
    #ajax_obj label {
        color: #3A3A3A;
        font-weight: bold;
        padding-right: 5px;
        min-width: 125px;
        text-align: right;
        display: inline-block;
        vertical-align: top;
    }
    #ajax_obj p {
        margin: 0 0 6px 0;
        line-height: 120%;
        padding: 2px;
    }
    span.element {
        display: inline-block;
    }
    .mselect_item {
        display: inline-block;
        padding: 0 .2em .15em 0;
        cursor: pointer;
        margin: .1em;
    }
    .alert {
        position: relative; 
        display: inline-block; 
        color: #EC2119;
    }

    .alert[oldtitle]:hover::after {
        content: attr(oldtitle); 
        background-color: #e1e12c91;
        position: absolute; 
        top: 100%; 
        left: 15px; 
        color: #000; 
        padding: 5px;
        border-radius: 5px;
        font-size: 12px;
        white-space: nowrap; 
        z-index: 1000;
        margin-top: 5px;
        display: block; 
        text-align: center; 
        font-size: 10px;
        border: 1px solid #593f30;
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
<div id="event_tabs" class="az_tabs">
    <ul>
        <li><a href="{{route('admin.liquor.base-info')}}">Main</a></li>
        <li><a href="{{ route('admin.liquor-inv-list.index') }}">List</a></li>
        <li class="active">All Bins <a href="javascript:void(0)" id="btn_add_new_Bin">
            <svg class="svg-inline--fa fa-plus" aria-hidden="true" focusable="false" data-prefix="fas"
                    data-icon="plus" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                    data-fa-i2svg="">
                    <path fill="currentColor"
                        d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z">
                    </path>
                </svg></a>
        </li>
    </ul>
    <div class="cur_az_tab" id="event_tabs-1" aria-labelledby="ui-id-1" role="tabpanel" aria-expanded="true"
        aria-hidden="false">
        <span id="liquor_bins" class="xmlb_form">
            <form method="get" id="frm_liquor_bins" action="{{ route('admin.liquor.bin-setup') }}" accept-charset="utf-8" enctype="multipart/form-data">
                <fieldset class="form_filters">
                    <legend>Search by</legend> 
                    <span class="show_recs">Records: {{ $liquorBins->firstItem()??0 }} to {{ $liquorBins->lastItem()??0 }} of {{ $liquorBins->total() }} | Show: 
                        <select name="show_records" id="show_records" fdprocessedid="69aaob">
                            <option value="">All</option>
                            <option value="10" {{ request('show_records') == '10' ? 'selected' : '' }}>10</option>
                            <option value="30" {{ request('show_records') == '30' ? 'selected' : '' }}  @if(request('package_type_pages') == null){{'selected'}}@endif>30</option>
                            <option value="50" {{ request('show_records') == '50' ? 'selected' : '' }}>50</option>
                            <option value="100" {{ request('show_records') == '100' ? 'selected' : '' }}>100</option>
                        </select>
                    </span>
                    <label>Bin Number:</label> 
                    <input name="bin_number" id="liquor_bins_BIN_NUMBER" type="text" value="{{ request('bin_number') }}" maxlength="4" size="10" title="Unique bin # for this bin" fdprocessedid="6vmppp">
                    <label>Categories:</label>
                    <select name="lnk_wine_cats" id="liquor_bins_LNK_WINE_CATS" fdprocessedid="5h8o9k">
                        <option value="">--All--</option>
                        @foreach($wine_catagories as $_wineCatagory)
                            <option value="{{ $_wineCatagory->id }}" {{ (request('lnk_wine_cats') == $_wineCatagory->id)?'selected':''}}>{{ $_wineCatagory->wcat_name }}</option>
                        @endforeach
                    </select>
                    <label>Active:</label>
                    <select name="is_active" id="liquor_bins_IS_ACTIVE" fdprocessedid="j7uhze">
                        <option value="">--All--</option>
                        <option value="1" {{ request('is_active') == '1' ? 'selected' : '' }}>Yes</option>
                        <option value="0" {{ request('is_active') == '0' ? 'selected' : '' }}>No</option>
                    </select>
                    <button type="submit" id="liquor_bins_apply_filter" class="button font-bold radius-0">Search</button>
                    <a href="{{ route('admin.liquor.bin-setup') }}">
                        <button type="button" id="liquor_bins_clear_filter"class="button font-bold radius-0">Show All</button>
                    </a>
                </fieldset>
                <br>
                <div class="form_body">
                    @foreach($liquorBins as $_liquorBin)
                        <div class="card">
                            <div>
                                <span class="actions">
                                    <button type="button" class="button font-bold radius-0 liquor_bins_delete" lqbin_id="{{ $_liquorBin->id }}">Delete</button>
                                    <a href="javascript:void(0)" class="liquor_bins_edit" lqbin_id="{{ $_liquorBin->id }}"><button type="button" class="button font-bold radius-0">Edit</button></a>
                                </span>
                                <strong>Bin #: {{ $_liquorBin->bin_number }}
                                    @if( $_liquorBin->is_active !== 1)
                                        <span class="q_tip alert" data-hasqtip="0" oldtitle="not_active" aria-describedby="qtip-0"><svg class="svg-inline--fa fa-circle-exclamation" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="circle-exclamation" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zm0-384c13.3 0 24 10.7 24 24V264c0 13.3-10.7 24-24 24s-24-10.7-24-24V152c0-13.3 10.7-24 24-24zM224 352a32 32 0 1 1 64 0 32 32 0 1 1 -64 0z"></path></svg><!-- <i class="fas fa-exclamation-circle"></i> Font Awesome fontawesome.com --></span>
                                    @endif
                                </strong> | 
                                @php 
                                    if($_liquorBin->wineCatagories()->isNotEmpty()){
                                        $categories = implode(';', $_liquorBin->wineCatagories()->toArray());
                                    }else{
                                        $categories = '----';
                                    }
                                @endphp
                                <label class="auto_width">Categories:</label> {{ $categories }}
                                <hr>
                                @if($_liquorBin->productLiquors->isNotEmpty())
                                    @foreach($_liquorBin->productLiquors as $key => $_productLiquor)
                                    <p>{{ ++$key }}) <a href="#">{{ $_productLiquor->productGens->product_name }}</a> (Wine) 
                                        <a href="#">
                                            <svg class="svg-inline--fa fa-pen" aria-hidden="true" focusable="false"  data-prefix="fas" data-icon="pen" role="img" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 512 512" data-fa-i2svg="">
                                                <path fill="currentColor"
                                                    d="M362.7 19.3L314.3 67.7 444.3 197.7l48.4-48.4c25-25 25-65.5 0-90.5L453.3 19.3c-25-25-65.5-25-90.5 0zm-71 71L58.6 323.5c-10.4 10.4-18 23.3-22.2 37.4L1 481.2C-1.5 489.7 .8 498.8 7 505s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L421.7 220.3 291.7 90.3z">
                                                </path>
                                            </svg>
                                        </a>
                                    </p>
                                    @endforeach
                                @else
                                    <span class="green_font"><svg class="svg-inline--fa fa-circle-check" aria-hidden="true"
                                            focusable="false" data-prefix="fas" data-icon="circle-check" role="img"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                            <path fill="currentColor"
                                                d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z">
                                            </path>
                                        </svg>
                                    </span>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
                <div id="pagination-links" class="pagination">
                    {{ $liquorBins->links() }}
                </div>
            </form>
        </span>
    </div>
</div>

{{-- models popup element --}}
<div class="ui-widget-overlay ui-front d-none"></div>
<!-- New Add Bin -->
<div class="ui-dialog ui-widget1 ui-widget-content ui-corner-all ui-front ui-draggable ui-resizable ajax_obj create-popup-form ui-draggable-new-bin d-none "
    tabindex="-1" style="position: absolute; height: auto; width: 480px; top: 211.5px; left: 388px;" role="dialog"
    aria-describedby="ajax_obj" aria-labelledby="ui-id-15">
    <div class="ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix">
        <span id="ui-id-15" class="ui-dialog-title">Add/Edit Liquor Bins</span>
        <button class="ui-button ui-widget1 ui-state-default ui-corner-all ui-button-icon-only ui-dialog-titlebar-close ui-new-bin-close"
            role="button" aria-disabled="false" title="close">
            <span class="ui-button-icon-primary ui-icon ui-icon-closethick"></span>
            <span class="ui-button-text">close</span>
        </button>
    </div>
    <div id="ajax_obj" class="ui-dialog-content ui-widget-content create-form-content" style="width: auto">
        <span id="new_liquor_bin" class="xmlb_form">
            <form method="post" id="frm_new_liquor_bin" action="{{ route('admin.liquor.bin-setup.store') }}" accept-charset="utf-8" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="lqbin_id">
                <br>
                <h2 id="frm_bin_h"></h2>
                <br>
                <p>
                    <label>Bin Number:</label>
                    <span class="element">
                        <input id="new_liquor_bin_bin_number" name="bin_number" type="text" maxlength="4" size="3" title="Unique bin # for this bin" fdprocessedid="wx02j">
                    </span>
                    <span class="mand_sign">*</span>
                </p>
                <p class="bin_active d-none">
                    <label>Active:</label>
                    <span class="element">
                        <select id="edit_liquor_bin_is_active" name="is_active" fdprocessedid="32djhn">
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </span>
                    <span class="mand_sign">*</span>
                </p>
                <p>
                    <label>Categories:</label>
                    <span class="element" style="width: 60%; vertical-align: top;">
                        @foreach($wine_catagories as $_wineCatagory)
                            <span class="mselect_item">
                                <input type="checkbox" value="{{ $_wineCatagory->id }}" name="lnk_wine_cats[]">{{ $_wineCatagory->wcat_name }}
                            </span>
                        @endforeach
                    </span>
                    <span class="mand_sign"></span>
                </p>
                <br>
                <div class="">
                    <button type="submit" id="new_liquor_bin_save" class="button font-bold radius-0">Save</button>
                </div>
            </form>
        </span>
    </div>
</div>
@endsection
@section('scripts')
@error('bin_number')
    <script>
        alert("{{ $message }}")
    </script>
@enderror
<script>
    $(document).ready(function(){
        $('#btn_add_new_Bin').click(function(){
            $('#frm_new_liquor_bin #frm_bin_h').html('New Liquor Bin');
            $('.ui-widget-overlay').removeClass('d-none');
            $('.ui-draggable-new-bin').removeClass('d-none');
        });

        $('.ui-new-bin-close').click(function(){
            $('.bin_active').addClass('d-none');
            $('#frm_new_liquor_bin input[name="lqbin_id"]').val('');
            $('#frm_new_liquor_bin input[name="bin_number"]').val('');
            $('#frm_new_liquor_bin select[name="is_active"]').val('');
            $('#frm_new_liquor_bin input[name="lnk_wine_cats[]"]').prop('checked', false);
            $('.ui-widget-overlay').addClass('d-none');
            $('.ui-draggable-new-bin').addClass('d-none');
        });

        // Liquor Bin Form Submit
        $('#frm_new_liquor_bin').submit(function(e){
            var bin_number =  $('#frm_new_liquor_bin input[name="bin_number"]').val();
            if(bin_number == ''){
                alert('Please enter Bin Number It has to be 1 characters.');
                e.preventDefault();
            }
        });

        // Liquor Bins Edit
        $('.liquor_bins_edit').click(function(){
            $('#frm_new_liquor_bin #frm_bin_h').html('Edit Bin');
            var lqbin_id = $(this).attr('lqbin_id');
            var url = "{{ route('admin.liquor.bin-setup.edit', ':id') }}";
            url = url.replace(':id', lqbin_id);
            $.ajax({
                type: "GET",
                url: url,
                success: function (response) {
                    $('.bin_active').removeClass('d-none');
                    $('#frm_new_liquor_bin input[name="lqbin_id"]').val(response.liquorBin.id);
                    $('#frm_new_liquor_bin input[name="bin_number"]').val(response.liquorBin.bin_number);
                    $('#frm_new_liquor_bin select[name="is_active"]').val(response.liquorBin.is_active);
                
                    var lnk_wine_cats = response.liquorBin.lnk_wine_cats;
                    $('#frm_new_liquor_bin input[name="lnk_wine_cats[]"]').prop('checked', false);
                    if (lnk_wine_cats && lnk_wine_cats.length > 0) {
                        lnk_wine_cats.forEach(function(value) {
                            $('#frm_new_liquor_bin input[name="lnk_wine_cats[]"][value="' + value + '"]').prop('checked', true);
                        });
                    }

                    $('.ui-widget-overlay').removeClass('d-none');
                    $('.ui-draggable-new-bin').removeClass('d-none');
                }
            });
        })

        // Liquor Bins Delete
        $('.liquor_bins_delete').click(function(){
            if(confirm("Do you really want to delete this record?")){
                var lqbin_id = $(this).attr('lqbin_id');
                var url = "{{ route('admin.liquor.bin-setup.destroy', ':id') }}";
                url = url.replace(':id', lqbin_id);
                $.ajax({
                    type: "DELETE",
                    url: url,
                    data: {_token: "{{ csrf_token() }}"},
                    success: function (response) {
                        if(response.success){
                            alert(response.message)
                            window.location.reload();
                        }
                    }
                });
            }
        });

        $('#show_records').change(function(){
            $('#frm_liquor_bins').submit();
        })

        $('#pagination-links a').on('click', function(event) {
            event.preventDefault();
            const page = $(this).attr('href').split('page=')[1];
            const url = new URL(window.location.href);
            url.searchParams.set('page', page);
            window.location.href = url.toString();
        });
    })
</script>
@endsection