<script>
    $(document).ready(function () {
        $('.closethick-liquor-product').click(function() {
            $('input[name="chk_wine_cat[]"]').prop('checked', false);
            $('#frm_edit_product_liquor select[name="edi_bin_number"]').val('');
            $('#frm_edit_product_liquor input[name="edit_winery_name"]').val('');
            $('#frm_edit_product_liquor select[name="edit_wine_type"]').val('');
            $('.wine_specific_wrap').addClass('d-none'); // Hide the div
            $('.supp_prod_row_edit').remove();
            $('.ui-draggable-liquor-product-edit').hide();
            $('.ui-widget-overlay').css('display', 'none');
        });

        $('.btn_edit_supp_prod_row').click(function() {
            var suppliersData = JSON.parse('<?php echo json_encode($suppliers); ?>');
            var supplier_dd =
                '<p class="supp_prod_row" style="display: grid;grid-template-columns: 5fr 3fr 1fr;"><span>' +
                '<select id="supplier_name" class="supp_select_edit" name="supplier_name[]">'+
                '<option value="">----</option>';
                $.each(suppliersData, function(index, supplier) {
                    supplier_dd += '<option value="' + supplier.id + '">' + supplier.supplier_name + '</option>';
                });
                
                supplier_dd +='</select></span > '+
                '<span > '+
                '<input type="hidden" name="s_p_id[]" value=""></input>' +
                '<input id="vpart_num" name="vpart_num[]" class = "vpart_num" type = "text" > '+
                '</span>'+
                '<span class = "btn btn_delete_supp_prod add-more-supplier" > <svg style="height: 1rem;" class="svg-inline--fa fa-trash-can" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-can" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">'+
                    '<path fill="currentColor" d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z"></path>'+
                    '</svg>'+
                '</p><div class="line_break"></div>';
            $(".edit_supps_wrap_1").append(supplier_dd);

        });

        $('body').delegate('.add-more-supplier', 'click', function() {
            $(this).closest('.supp_prod_row').remove();
        })

        $.validator.addMethod("checkSupplierSelectionEdit", function(value, element) {
            var valid = true;
            var supplierId = [];
            $('.supp_select_edit').each(function() {
                var selectName = $(this).val();
                if (selectName === '' || $.inArray(selectName, supplierId) != -1) {
                    valid = false;
                    return false; // Exit the loop early if a value is not found
                }
                supplierId.push(selectName);
            });
            return valid;
        }, "Please select the supplier for Only one record per supplier/product is allowed.");

        $.validator.addMethod("maxWineCategories", function(value, element) {
            return $('[name="chk_wine_cat[]"]:checked').length <= 4;
        }, "Product LQ Update: You can have max 4 selection for wine categories.");

        $("#frm_edit_product_liquor").validate({
            rules: {
                'product_name': 'required',
                'bottle_size' : 'required',
                'purchased_in' : 'required',
                'used_at' : 'required',
                'alcohol_percent' : 'required',
                'unit_of_measure' : 'required',
                'category' : 'required',
                'liquor_brand' : 'required',
                'counted_in' : 'required',
                'org_country' : 'required',
                'org_region'  : 'required',
                'chk_wine_cat[]': {
                    required : true,
                    maxWineCategories: true,
                },
                'edi_bin_number' : 'required',
                'edit_winery_name' : 'required',
                'edit_wine_type' : 'required',
                'max_in_stock' : {
                    required:true,
                    number:true
                },
                'min_in_stock' : {
                    required:true,
                    number:true
                },
                'supplier_name[]': {
                    checkSupplierSelectionEdit: true
                },
            },
            messages: {
                'min_in_stock': 'Please enter Min In Stock too short. It has to be 1 characters.',
                'max_in_stock': 'Please enter Max In Stock too short. It has to be 1 characters.',
                'product_name': 'Please enter product name.',
                'bottle_size': 'Please select bottle size.',
                'purchased_in': 'Please select purchased in.',
                'used_at': 'Please select used at.',
                'alcohol_percent': 'Please enter alcohol percent.',
                'unit_of_measure': 'Please select unit of measure.',
                'category': 'Please select product category.',
                'liquor_brand': 'Please select liquor brand.',
                'counted_in': 'Please select counted in.',
                'org_country': 'Please select country in.',
                'org_region' : 'Please enter the region.',
                'chk_wine_cat[]': {
                    required : 'Please select wine category.',
                    maxWineCategories : 'Product LQ Update: You can have max 4 selection for wine categories.'
                },
                'edi_bin_number' : 'Please select wine BIN Number.',
                'edit_winery_name' : 'Please select Winery.',
                'edit_wine_type' : 'Please select Wine Type.',
                // 'supplier_name[]': 'Please select the supplier for all rows or delete the row..',
            }
        });

        $('.liquor_product_edit').click(function () { 
            $('.wrap_vintage').remove();
            let product_id = $(this).attr('product_id');
            var url = "{{ route('admin.liquor-product.edit', ':id') }}";
            url = url.replace(':id', product_id);
            $.ajax({
                url: url,
                type: 'GET',
                success: function(data) {
                    $('.wine_prices_wrap_vantahe').removeClass('d-none'); 
                    $('#frm_edit_product_liquor input[name="gn_pro_id"]').val(data.productGen.id);
                    $('#frm_edit_product_liquor input[name="part_id"]').val(data.productGen.sku);
                    $('#frm_edit_product_liquor input[name="product_name"]').val(data.productGen.product_name);
                    $('#frm_edit_product_liquor select[name="bottle_size"]').val(data.productGen.product_size);
                    $('#frm_edit_product_liquor select[name="purchased_in"]').val(data.productGen.product_liquor.lnk_package_type);
                    $('#frm_edit_product_liquor select[name="counted_in"]').val(data.productGen.product_liquor.lnk_count_package_type);
                    $('#frm_edit_product_liquor select[name="edit_lq_prod_status"]').val(data.productGen.prod_status);
                    $('#frm_edit_product_liquor select[name="favorite_status"]').val(data.productGen.favorite_status);
                    $('#frm_edit_product_liquor select[name="edit_lq_lnk_def_supplier"]').val(data.productGen.lnk_def_supplier);
                    $('#frm_edit_product_liquor select[name="category"]').val(data.productGen.lnk_cat);
                    $('#frm_edit_product_liquor select[name="liquor_brand"]').val(data.productGen.product_liquor.lnk_liquor_brand);
                    $('#frm_edit_product_liquor select[name="used_at"]').val(data.productGen.product_liquor.used_at_loc);
                    $('#frm_edit_product_liquor input[name="purchase_price"]').val(data.productGen.purchase_price);
                    $('#frm_edit_product_liquor input[name="purchase_price_case"]').val(data.productGen.purchase_price_case);
                    $('#frm_edit_product_liquor input[name="price_bq_inhouse"]').val(data.productGen.price_bq_inhouse);
                    $('#frm_edit_product_liquor input[name="price_bq_catering"]').val(data.productGen.price_bq_catering);
                    $('#frm_edit_product_liquor input[name="price_rstn_inhouse"]').val(data.productGen.price_rstn_inhouse);
                    $('#frm_edit_product_liquor input[name="price_rstn_catering"]').val(data.productGen.price_rstn_catering);
                    $('#frm_edit_product_liquor input[name="price_half_bottle"]').val(data.productGen.product_liquor.price_half_bottle);
                    $('#frm_edit_product_liquor input[name="price_by_glass"]').val(data.productGen.product_liquor.price_by_glass);
                    $('#frm_edit_product_liquor input[name="price_others"]').val(data.productGen.product_liquor.price_others);
                    $('#frm_edit_product_liquor select[name="price_others_unit"]').val(data.productGen.product_liquor.price_others_unit);
                    $('#frm_edit_product_liquor select[name="org_country"]').val(data.productGen.product_liquor.org_country);
                    $('#frm_edit_product_liquor input[name="org_region"]').val(data.productGen.product_liquor.org_region);
                    $('#frm_edit_product_liquor input[name="org_city"]').val(data.productGen.product_liquor.org_city);
                    $('#frm_edit_product_liquor input[name="alcohol_percent"]').val(data.productGen.product_liquor.alcohol_percent);
                    $('#frm_edit_product_liquor input[name="max_in_stock"]').val(data.productGen.max_in_stock??0);
                    $('#frm_edit_product_liquor input[name="min_in_stock"]').val(data.productGen.min_in_stock??0);
                    $('#frm_edit_product_liquor textarea[name="prod_desc"]').val(data.productGen.prod_desc);

                    var suppliersData = JSON.parse('<?php echo json_encode($suppliers); ?>');
                        $.each(data.productGen.suppliers, function(index, value) {
                            var supplier_dd =
                            '<p class="supp_prod_row supp_prod_row_edit" style="display: grid;grid-template-columns: 5fr 3fr 1fr;"><span>' +
                            '<select id="supplier_name" class="supp_select_edit" name="supplier_name[]">'+
                            '<option value="">----</option>';
                            $.each(suppliersData, function(index, supplier) {
                                supplier_dd += '<option value="' + supplier.id + (supplier.id == value.lnk_supplier ? '" selected>' : '">') + supplier.supplier_name + '</option>';
                            });
                            supplier_dd +='</select></span > '+
                            '<span > '+
                            '<input type="hidden" name="s_p_id[]" value="'+ value.id +'"></input>' +
                            '<input id="vpart_num" name="vpart_num[]" class = "vpart_num" type = "text" > '+
                            '</span>'+
                            '<span class = "btn btn_delete_supp_prod add-more-supplier" > <svg style="height: 1rem;" class="svg-inline--fa fa-trash-can" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-can" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">'+
                                '<path fill="currentColor" d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z"></path>'+
                                '</svg>'+
                            '</p><div class="line_break supp_prod_row_edit"></div>';
                            $(".edit_supps_wrap_1").append(supplier_dd);
                        });
                        if(data.productGen.lnk_cat == 102){
                            $('.wine_specific_wrap').removeClass('d-none');
                            var lnk_wine_cats = data.productGen.product_liquor.lnk_wine_cats;
                            $('#frm_edit_product_liquor input[name="chk_wine_cat[]"]').prop('checked', false);
                            $.each(lnk_wine_cats, function(index, value) {
                                $('#frm_edit_product_liquor input[name="chk_wine_cat[]"][value="' + value + '"]').prop('checked', true);
                            });
                            getBinNumbers();
                            $('#frm_edit_product_liquor select[name="edi_bin_number"]').val(data.productGen.product_liquor.lnk_bin_number);
                            $('#frm_edit_product_liquor input[name="edit_winery_name"]').val(data.productGen.product_liquor.winery_name);
                            $('#frm_edit_product_liquor select[name="edit_wine_type"]').val(data.productGen.product_liquor.wine_type);
                        }
                        
                        if(data.vintages.length > 0 && data.productGen.lnk_cat == 102){
                            $('.wine_prices_wrap_vantahe').addClass('d-none'); 
                        }else{
                            if(data.vintages.length == 0 && data.productGen.lnk_cat == 102){
                                var grapeVariety = JSON.parse(data.productGen.product_liquor.grape_variety);
                                $.each(grapeVariety.name, function(index, value) {
                                    var newGrapeVariety = '<p class="wrap_vintage" style="margin: 0 0 6px 0; line-height: 120%; padding: 2px;"><span class="wine_prices_wrap"><span role="status" aria-live="polite" class="ui-helper-hidden-accessible"></span>'+
                                        '<input type="text" name="grape_name[]" class="grape_name ui-autocomplete-input" value="'+value+'" autocomplete="off" fdprocessedid="q8f3ul"></span><span>'+
                                        '<input type="number" name="grape_percent[]"step=".01" max="100" class="grape_percent" value="'+grapeVariety.percent[index]+'" fdprocessedid="2o401">%</span>'+
                                        '<span><span class="btn_delete_grape_var_row"><svg style="height: 1rem;" class="svg-inline--fa fa-trash-can" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-can" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">'+
                                        '<path fill="currentColor"  d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z"> </path> </svg></span></span></p>'
                                        $('.vintage_edit_product_variety').append(newGrapeVariety);            
                                })
                            }
                            var newGrapeVariety = '<p class="wrap_vintage" style="margin: 0 0 6px 0; line-height: 120%; padding: 2px;"><span class="wine_prices_wrap"><span role="status" aria-live="polite" class="ui-helper-hidden-accessible"></span>'+
                            '<input type="text" name="grape_name[]" class="grape_name ui-autocomplete-input" value="" autocomplete="off" fdprocessedid="q8f3ul"></span><span>'+
                            '<input type="number" name="grape_percent[]"step=".01" max="100" class="grape_percent" value="" fdprocessedid="2o401">%</span>'+
                            '<span><span class="btn_delete_grape_var_row"><svg style="height: 1rem;" class="svg-inline--fa fa-trash-can" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-can" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">'+
                            '<path fill="currentColor"  d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z"> </path> </svg></span></span></p>'
                            $('.vintage_edit_product_variety').append(newGrapeVariety); 
                        }
                        $('.ui-draggable-liquor-product-edit').show();
                        $('.ui-widget-overlay').css('display', 'block');
                },
                error: function(error) {
                    console.error('Ajax request failed:', error);
                }
            });
            
        });

        $('#frm_edit_product_liquor').submit(function(e) {
            if ($(this).valid()) {
            e.preventDefault();
            var formData = $(this).serialize();
            $.ajax({
                url: "{{ route('admin.liquor-product.update') }}",
                type: 'POST',
                data: formData,
                success: function(response) {
                    if (response.success) {
                        window.location.reload();
                    } else {
                        alert(response.message); // Display error message if any
                    }
                },
                error: function(xhr, status, error) {
                    // Clear previous error messages
                    $('.text-danger').remove();
                    $('.error').removeClass('error');

                    if (xhr.responseJSON && xhr.responseJSON.errors) {
                        var errors = xhr.responseJSON.errors;
                        $.each(errors, function(key, value) {
                            $('#' + key + '_error').remove();
                            var cleanedKey = key.replace('.0', ''); // Remove '.0' from the key
                            $('#' + cleanedKey).after('<span id="' + cleanedKey + '_error" class="text-danger">' + value[0] + '</span>');
                            $('#' + cleanedKey).addClass('error');
                        });
                    }
                }
            });
            }
        });

        $(document).on('click', '.delete_product', function() {
            let product_id = $(this).attr('product_id');
            console.log(product_id);
            if (confirm("Are you sure you want to remove this product?") == true) {
                var url = "{{ route('admin.liquor-product.destroy', ':id') }}";
                url = url.replace(':id', product_id);
                $.ajax({
                    url: url,
                    type: 'DELETE',
                    data: {_token:  "{{csrf_token()}}"},
                    success: function(response) {
                        if (response.success) {
                            alert(response.message);
                            window.location.href = "{{ route('admin.liquor-product') }}";
                        } else {
                            alert(response.message);
                        }
                    }
                });

            }
        });
    });
    $(document).ready(function() {
        $(document).on('change', '.edit_lq_lnk_cat', function() {
            var selectedCategoryText = $(this).find('option:selected').text();
            if (selectedCategoryText === 'Wine') {
                $('.wine_specific_wrap').removeClass('d-none'); // Show the div
            } else {
                $('input[name="chk_wine_cat[]"]').prop('checked', false);
                $('#frm_edit_product_liquor select[name="edi_bin_number"]').val('');
                $('#frm_edit_product_liquor input[name="edit_winery_name"]').val('');
                $('#frm_edit_product_liquor select[name="edit_wine_type"]').val('');
                $('.wine_specific_wrap').addClass('d-none'); // Hide the div
            }
        });

        $('.edit_add_new_vintage').click(function () { 
            var newGrapeVariety = '<p class="wrap_vintage" style="margin: 0 0 6px 0; line-height: 120%; padding: 2px;"><span class="wine_prices_wrap"><span role="status" aria-live="polite" class="ui-helper-hidden-accessible"></span>'+
                    '<input type="text" name="grape_name[]" class="grape_name ui-autocomplete-input" value="" autocomplete="off" fdprocessedid="q8f3ul"></span><span>'+
                    '<input type="number" name="grape_percent[]"step=".01" max="100" class="grape_percent" value="" fdprocessedid="2o401">%</span>'+
                    '<span><span class="btn_delete_grape_var_row"><svg style="height: 1rem;" class="svg-inline--fa fa-trash-can" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-can" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">'+
                    '<path fill="currentColor"  d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z"> </path> </svg></span></span></p>'
                    $('.vintage_edit_product_variety').append(newGrapeVariety);            
        });
        $('.vintage_edit_product_variety').on('click', '.btn_delete_grape_var_row', function() {
            $(this).closest('.wrap_vintage').remove();
        });

        
        $('.wine_category_checked').click(function(){
            getBinNumbers();
        })
    });

    // Categories base get liquor Bins 
    function getBinNumbers(){
        var checkedValues = $('input[name="chk_wine_cat[]"]:checked').map(function() {
            return $(this).val();
        }).get(); 
        console.log(checkedValues); 
        if(checkedValues.length > 0 ){
            $.ajax({
                type: "GET",
                url: "{{ route('admin.liquor-product-get-bins') }}",
                data: { data: checkedValues},
                success: function (response) {
                    $('.wine_bin_number').empty();
                    var wine_bin_number = '<option value="">----</option>';

                    $.each(response.liquorBins, function(index, value) {
                        wine_bin_number += '<option value="' + value.id + '">' + value.bin_number + '</option>';
                    });
                    $('.wine_bin_number').append(wine_bin_number);
                }
            });
        }else{
            $('.wine_bin_number').empty();
            var wine_bin_number = '<option value="">----</option>';
            $('.wine_bin_number').append(wine_bin_number);
        }
    }
    
</script>