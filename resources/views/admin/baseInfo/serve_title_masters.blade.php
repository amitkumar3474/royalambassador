@extends('admin.layouts.master')
@section('title', 'Serve Title Masters Setup')
@section('style')
<style>
    .svg-inline--fa {
        display: var(--fa-display, inline-block);
        height: 1em;
        overflow: visible;
        vertical-align: -.125em;
    }
    .stmaster_wrap {
        display: inline-block;
        width: 32%;
        vertical-align: top;
        margin: .2em;
    }

    #serve_title_masters fieldset label {
        width: 9em;
    }
    #edit_serve_title_master .esp_option {
        margin-top: .5em;
    }
    #edit_serve_title_master select {
        width: 32em;
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
    #edit_serve_title_master select {
        width: 32em;
    }
</style>
@endsection
@section('content')
<!-- <div class="title_bar card">
    <h1>Serve Title Masters (Records: 1 to 7 of 7)
        <a href="#"><svg class="svg-inline--fa fa-plus" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="plus" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"></path></svg></a>
    </h1>
</div> -->
<span id="serve_title_masters" class="xmlb_form">
    <form method="post" id="frm_serve_title_masters" action="" accept-charset="utf-8" enctype="multipart/form-data">

        <input type="hidden" name="PAGE_ID" value="serve_title_masters">
        <input type="hidden" name="serve_title_masters" value="serve_title_masters">
        <input type="hidden" id="serve_title_masters_submit" name="serve_title_masters_submit">
        <div class="title_bar card">
            <h1>Serve Title Masters (Records: {{ $serveTitleMasters->count()?1:0 }} to {{ $serveTitleMasters->count() }} of {{ $serveTitleMasters->count() }})
                <a href="javascript:void(0)" class="add_serve_title_master"> 
                    <svg
                        class="svg-inline--fa fa-plus" aria-hidden="true" focusable="false" data-prefix="fas"
                        data-icon="plus" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                        data-fa-i2svg="">
                        <path fill="currentColor"
                            d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z">
                        </path>
                    </svg><!-- <i class="fas fa-plus"></i> Font Awesome fontawesome.com --></a>
            </h1>
        </div>
        @foreach($serveTitleMasters as $_serveTitleMaster)
            <div class="card stmaster_wrap">
                <div>
                    <h2>{{ $_serveTitleMaster->stitle_heading }} 
                        <button type="button" class="button btn_delete_serve_title_master" serve_title_master_id="{{ $_serveTitleMaster->id }}">Delete</button>
                        <button type="button" class="button btn_edit_serve_title_master" serve_title_master_id="{{ $_serveTitleMaster->id }}">Edit</button>
                    </h2>
                    <fieldset>
                        <legend>Specialty Options</legend>
                        @php 
                            $specialty_options = json_decode($_serveTitleMaster->specialty_options); 
                        @endphp
                        @if($specialty_options)
                            @foreach(['vt', 'vn', 'gf', 'nf', 'da'] as $option)
                                @if(isset($specialty_options->$option))
                                    <div class="esp_option">
                                        <label>
                                            @if($option == 'vt')
                                                Vegetarian:
                                            @elseif($option == 'vn')
                                                Vegan:
                                            @elseif($option == 'gf')
                                                Gluten Free:
                                            @elseif($option == 'nf')
                                                Nut Free:
                                            @elseif($option == 'da')
                                                Dairy Allergy:
                                            @endif
                                        </label>
                                        <a href="{{ route('admin.base-info.product-menu-view', serveTitleMastersproduct($specialty_options->$option)->id) }}" target="_blank">{{ serveTitleMastersproduct($specialty_options->$option)->product_name }}</a>, Category: {{ serveTitleMastersproduct($specialty_options->$option)->category->cat_name }}
                                    </div>
                                @endif
                            @endforeach
                        @endif
                    </fieldset>
                </div>
            </div>
        @endforeach

    </form>
</span>

<div class="ui-widget-overlay ui-front d-none"></div>
<!-- Add Serve Title Masters Module -->
<div class="ui-dialog ui-widget1 ui-widget-content ui-corner-all ui-front ui-draggable ui-resizable ajax_obj create-popup-form ui-draggable-add-serve-title-masters d-none "
    tabindex="-1" style="width: 600px; top:249.5px; left: 328px;" role="dialog" aria-describedby="ajax_obj"
    aria-labelledby="ui-id-15">
    <div class="ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix">
        <span id="ui-id-15" class="ui-dialog-title">Serve Title Master Add/Edit</span>
        <button class="ui-button ui-widget1 ui-state-default ui-corner-all ui-button-icon-only ui-dialog-titlebar-close add-serve-title-masters-close"
            role="button" aria-disabled="false" title="close">
            <span class="ui-button-icon-primary ui-icon ui-icon-closethick"></span>
            <span class="ui-button-text">close</span>
        </button>
    </div>
    <div id="ajax_obj" class="ui-dialog-content ui-widget-content create-form-content" style="width: auto"> 
        <span id="new_serve_title_master" class="xmlb_form">
            <form method="post" id="frm_new_serve_title_master" action="{{ route('admin.base-info.serve-title-masters.store') }}" accept-charset="utf-8" enctype="multipart/form-data">
                @csrf
            <br>
            <h2>New Serve Title Master</h2>
            <br>
            <p>
                <label>Heading:</label>
                <span class="element">
                    <input id="new_serve_title_master_stitle_heading" name="stitle_heading" type="text" maxlength="80" size="50" title="The heading or title of this serve title master" fdprocessedid="2bltuk">
                </span>
                <span class="mand_sign">*</span>
            </p>
        <br>
        <div class="">
            <button type="button" class="button btn_serve_title_master_submit">Save</button>
        </div>
            </form>
        </span>
    </div>
</div>

<!-- Edit Serve Title Masters Module -->
<div class="ui-dialog ui-widget1 ui-widget-content ui-corner-all ui-front ui-draggable ui-resizable ajax_obj create-popup-form ui-draggable-edit-serve-title-masters d-none "
    tabindex="-1" style="width: 600px; top:249.5px; left: 328px;" role="dialog" aria-describedby="ajax_obj"
    aria-labelledby="ui-id-15">
    <div class="ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix">
        <span id="ui-id-15" class="ui-dialog-title">Serve Title Master Add/Edit</span>
        <button class="ui-button ui-widget1 ui-state-default ui-corner-all ui-button-icon-only ui-dialog-titlebar-close edit-serve-title-masters-close"
            role="button" aria-disabled="false" title="close">
            <span class="ui-button-icon-primary ui-icon ui-icon-closethick"></span>
            <span class="ui-button-text">close</span>
        </button>
    </div>
    <div id="ajax_obj" class="ui-dialog-content ui-widget-content create-form-content" style="width: auto"> 
        <span id="edit_serve_title_master" class="xmlb_form">
            <!-- <form method="post" id="frm_edit_serve_title_master" action="" accept-charset="utf-8" enctype="multipart/form-data">

                <input type="hidden" name="PAGE_ID" value="serve_title_master_add_edit">

                <input type="hidden" name="PAGE_PARAMS" value="stitle_master_id=8&amp;action=edit">
                <input type="hidden" name="edit_serve_title_master" value="edit_serve_title_master">
                <br>
                <h2>Edit Serve Title Master</h2>
                <br>
                <p>
                    <label>Heading:</label>
                    <span class="element">
                        <input id="edit_serve_title_master_stitle_heading" name="edit_serve_title_master_stitle_heading" type="text" maxlength="80" size="50" value="Appetizer/Bread" title="The heading or title of this serve title master" fdprocessedid="rtmmrf">
                    </span>
                    <span class="mand_sign">*</span>
                </p>
                <input id="specialty_options" name="specialty_options" type="hidden" maxlength="256" value="eso[VT]=366&amp;eso[VN]=366&amp;eso[GF]=366&amp;eso[NF]=366&amp;eso[DA]=366" title="A multi-select that shows the specialty food options possible for the serve titles under this master record">

            
                <fieldset><legend>Specialty Options</legend>
                    <p>Please select an option for each of the specialty food options.</p>
                    <div class="esp_option" option="VT">
                        <label>Vegetarian:</label>
                            <select class="prod_select" fdprocessedid="nltfcm">
                                <option value="----">----</option>
                                <option value="366" selected="selected">Cucumber Wrapped Salad, Category: Salad</option>
                                <option value="376">Frittata, Category: Vegan &amp; Vegetarian Options</option>
                                <option value="946">Peppercorn squash, Category: Entrées</option>
                                <option value="2108">Penne, Gluten Free, Category: Pastas</option>
                                <option value="2313">Eggplant Tower, Category: Vegan &amp; Vegetarian Options</option>
                                <option value="2357">Aubergine + Summer Squash, Category: Entrées</option>
                                <option value="2534">Achar, Category: South Asian (Salad)</option>
                                <option value="2698">test, Category: test</option>
                            </select>
                        </div>
                        <div class="esp_option" option="VN">
                            <label>Vegan:</label>
                            <select class="prod_select" fdprocessedid="h7jjmh">
                                <option value="----">----</option>
                                <option value="366" selected="selected">Cucumber Wrapped Salad, Category: Salad</option>
                                <option value="376">Frittata, Category: Vegan &amp; Vegetarian Options</option>
                                <option value="946">Peppercorn squash, Category: Entrées</option>
                                <option value="2108">Penne, Gluten Free, Category: Pastas</option>
                            </select>
                        </div>
                        <div class="esp_option" option="GF">
                            <label>Gluten Free:</label>
                                <select class="prod_select" fdprocessedid="h62t">
                                    <option value="----">----</option>
                                    <option value="194">Salmon, Category: Seafood</option>
                                    <option value="366" selected="selected">Cucumber Wrapped Salad, Category: Salad</option>
                                    <option value="519">Lemon Sorbet, Category: Dessert</option>
                                    <option value="946">Peppercorn squash, Category: Entrées</option>
                                    <option value="2108">Penne, Gluten Free, Category: Pastas</option>
                                </select>
                            </div>
                            <div class="esp_option" option="NF">
                                <label>Nut Free:</label>
                                <select class="prod_select" fdprocessedid="9nogts">
                                    <option value="----">----</option>
                                    <option value="194">Salmon, Category: Seafood</option>
                                    <option value="366" selected="selected">Cucumber Wrapped Salad, Category: Salad</option>
                                    <option value="376">Frittata, Category: Vegan &amp; Vegetarian Options</option>
                                    <option value="519">Lemon Sorbet, Category: Dessert</option>
                                    <option value="946">Peppercorn squash, Category: Entrées</option>
                                </select>
                            </div>
                            <div class="esp_option" option="DA">
                                <label>Dairy Allergy:</label>
                                <select class="prod_select" fdprocessedid="nb9v1q">
                                    <option value="----">----</option>
                                    <option value="194">Salmon, Category: Seafood</option>
                                    <option value="366" selected="selected">Cucumber Wrapped Salad, Category: Salad</option>
                                    <option value="519">Lemon Sorbet, Category: Dessert</option>
                                    <option value="946">Peppercorn squash, Category: Entrées</option>
                                    <option value="2108">Penne, Gluten Free, Category: Pastas</option>
                                </select>
                            </div>
                </fieldset>
                <br>
                <div class="form_footer">
                    <input type="submit" value="Save" id="edit_serve_title_master_save" name="edit_serve_title_master_save" class="button" onclick="return preSubmitedit_serve_title_master() ;" fdprocessedid="p5bjp7">
                </div>
            </form> -->
        </span>
    </div>
</div>
@endsection
@section('scripts')
<script>
    $(document).ready(function(){
        $('.add_serve_title_master').click(function(){
            $('.ui-widget-overlay').removeClass('d-none');
            $('.ui-draggable-add-serve-title-masters').removeClass('d-none');
        });

        $('.add-serve-title-masters-close').click(function(){
            $('.ui-widget-overlay').addClass('d-none');
            $('.ui-draggable-add-serve-title-masters').addClass('d-none');
        });

        $('.edit-serve-title-masters-close').click(function(){
            $('.ui-widget-overlay').addClass('d-none');
            $('.ui-draggable-edit-serve-title-masters').addClass('d-none');
        });

        $('.btn_serve_title_master_submit').click(function(){
            var stitle_heading = $('#frm_new_serve_title_master input[name="stitle_heading"]').val().trim();
            
            if(stitle_heading.length > 0){
                $('#frm_new_serve_title_master').submit();
            } else {
                alert('Please enter a Stitle Heading. It must not be empty.');
            }
        });

        $(document).on('click', '#edit_serve_title_master_save', function() {
            var stitle_heading = $('#frm_edit_serve_title_master input[name="stitle_heading"]').val().trim();
            
            if(stitle_heading.length > 0){
                $('#frm_edit_serve_title_master').submit();
            } else {
                alert('Please enter a Stitle Heading. It must not be empty.');
            }
        });
        
        $('.btn_edit_serve_title_master').click(function(){
            $('#edit_serve_title_master').empty();
            var serve_title_master_id = $(this).attr('serve_title_master_id'); 
            var url = "{{ route('admin.base-info.serve-title-masters.edit', ':id') }}"
            url = url.replace(':id', serve_title_master_id);
            $.ajax({
                type: "GET",
                url: url,
                success: function (response) {
                    var id = response.serveTitleMaster.id;
                    var upurl = "{{ route('admin.base-info.serve-title-masters.update', ':id') }}";
                    upurl = upurl.replace(':id', id);
                    var specialty_options = JSON.parse(response.serveTitleMaster.specialty_options);
                    console.log(specialty_options);
                    var html = `<form method="post" id="frm_edit_serve_title_master" action="${upurl}" accept-charset="utf-8" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                        <br>
                        <h2>Edit Serve Title Master</h2>
                        <br>
                        <p>
                            <label>Heading:</label>
                            <span class="element">
                                <input id="edit_serve_title_master_stitle_heading" name="stitle_heading" type="text" maxlength="80" size="50" value="${response.serveTitleMaster.stitle_heading}" title="The heading or title of this serve title master" fdprocessedid="rtmmrf">
                            </span>
                            <span class="mand_sign">*</span>
                        </p>
                        <input id="specialty_options" name="specialty_options" type="hidden" maxlength="256" value="eso[VT]=366&amp;eso[VN]=366&amp;eso[GF]=366&amp;eso[NF]=366&amp;eso[DA]=366" title="A multi-select that shows the specialty food options possible for the serve titles under this master record">
                        <fieldset><legend>Specialty Options</legend>
                            <p>Please select an option for each of the specialty food options.</p>
                            <div class="esp_option" option="VT">
                                <label>Vegetarian:</label>
                                    <select class="prod_select" fdprocessedid="nltfcm" name="specialty_options_vt">
                                        <option value="">----</option>`;
                                            response.vegetarianProducts.forEach(function(vegetarianProduct) {
                                                html +=  `<option value="${vegetarianProduct.id}" ${specialty_options && specialty_options.vt == vegetarianProduct.id ? 'selected' : ''}>${vegetarianProduct.product_name}, Category: ${vegetarianProduct.category.cat_name}</option>`;
                                            });
                                 html +=  `</select>
                                </div>
                                <div class="esp_option" option="VN">
                                    <label>Vegan:</label>
                                    <select class="prod_select" fdprocessedid="h7jjmh" name="specialty_options_vn">
                                        <option value="">----</option>`;
                                            response.veganProducts.forEach(function(veganProduct) {
                                                html +=  `<option value="${veganProduct.id}" ${specialty_options && specialty_options.vn == veganProduct.id ? 'selected' : ''}>${veganProduct.product_name}, Category: ${veganProduct.category.cat_name}</option>`;
                                            });
                                html +=  ` </select>
                                </div>
                                <div class="esp_option" option="GF">
                                    <label>Gluten Free:</label>
                                        <select class="prod_select" fdprocessedid="h62t" name="specialty_options_gf">
                                            <option value="">----</option>`;
                                                response.glutenFreeProducts.forEach(function(glutenFreeProduct) {
                                                    html +=  `<option value="${glutenFreeProduct.id}" ${specialty_options && specialty_options.gf == glutenFreeProduct.id ? 'selected' : ''}>${glutenFreeProduct.product_name}, Category: ${glutenFreeProduct.category.cat_name}</option>`;
                                                });
                                html +=  `</select>
                                    </div>
                                    <div class="esp_option" option="NF">
                                        <label>Nut Free:</label>
                                        <select class="prod_select" fdprocessedid="9nogts" name="specialty_options_nf">
                                            <option value="">----</option>`;
                                                response.nutFreeProducts.forEach(function(nutFreeProduct) {
                                                    html +=  `<option value="${nutFreeProduct.id}" ${specialty_options && specialty_options.nf == nutFreeProduct.id ? 'selected' : ''}>${nutFreeProduct.product_name}, Category: ${nutFreeProduct.category.cat_name}</option>`;
                                                });
                                html +=  `</select>
                                    </div>
                                    <div class="esp_option" option="DA">
                                        <label>Dairy Allergy:</label>
                                        <select class="prod_select" fdprocessedid="nb9v1q" name="specialty_options_da">
                                            <option value="">----</option>`;
                                                response.dairyAllergyProducts.forEach(function(dairyAllergyProduct) {
                                                    html +=  `<option value="${dairyAllergyProduct.id}">${specialty_options && dairyAllergyProduct.product_name}, Category: ${dairyAllergyProduct.category.cat_name}</option>`;
                                                });
                                html +=  `</select>
                                    </div>
                        </fieldset>
                        <br>
                        <div class="form_footer">
                            <input type="button" value="Save" id="edit_serve_title_master_save" class="button" onclick="return preSubmitedit_serve_title_master() ;" fdprocessedid="p5bjp7">
                        </div>
                        </form>`;

                        $('#edit_serve_title_master').append(html);

                    $('.ui-widget-overlay').removeClass('d-none');
                    $('.ui-draggable-edit-serve-title-masters').removeClass('d-none');
                }
            });
        });

        $('.btn_delete_serve_title_master').click(function(){
            if(confirm('Do you really want to delete this record?')){
                var serve_title_master_id = $(this).attr('serve_title_master_id'); 
                var url = "{{ route('admin.base-info.serve-title-masters.destroy', ':id') }}";
                url = url.replace(':id', serve_title_master_id);
                $.ajax({
                    type: "DELETE",
                    url: url,
                    data:{_token: "{{ csrf_token() }}"},
                    success: function (response) {
                        alert(response.message);
                        window.location.reload();
                    }
                });
            }
        });
    });
</script>
@endsection