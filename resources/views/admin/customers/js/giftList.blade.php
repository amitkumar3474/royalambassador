<script>
    function displayGifts(gifts, currentPage){
        var giftHtml = `
            <h2>Available Gift Certificates to Redeem</h2>
            <p>Please click on redeem for the relevant gift certificate</p>
            <form method="get" id="frm_gcs_filter" action="#" accept-charset="utf-8" enctype="multipart/form-data">
                <fieldset class="form_filters">
                    <legend>Search</legend>
                    <label>GC #:</label> 
                    <input name="flt_serial_no" id="flt_serial_no" type="text" value="" maxlength="15" size="6" title="The serial / on the gift certificate">
                    <label>Customer:</label> 
                    <input name="flt_customer_name" id="flt_customer_name" type="text" value="" maxlength="90" size="25" title="Name of this customer. If this is a corporate customer, then this is the business name. If personal it is the concat of first name and last name or say The Smiths Family.">
                    <label>Purchase Type:</label> 
                    <select name="flt_purchase_type" id="flt_purchase_type">
                        <option value="" selected="selected">----</option>
                        <option value="1">Purchased</option>
                        <option value="2">Complimentary</option>
                    </select>
                    <input type="submit" id="apply_filters" value="Search" class="button font-bold radius-0">
                    <input type="button" value="Clear" class="button font-bold radius-0 clear_filters_gift">
                </fieldset>
            </form>
            <p align="right" class="record-info">Records: 1 to 5 of 2,641</p>
            <div class="round_box_6px" style="height: 300px; border: 1px dotted #999;">
                <form method="post" id="frm_customer_gcs" action="{{ route('admin.GiftCertificate.store') }}" accept-charset="utf-8" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="customer_id" value="{{$customer->id}}">
                    <input type="hidden" id="customer_gcs_submit" class="customer_gcs_submit" name="gcs_id">
                    `;
            gifts.forEach(function(gift){
                giftHtml += `
                    <input type="submit" value="Redeem" id="customer_gcs_misc" name="customer_gcs_misc" class="customer_gcs_misc button font-bold radius-0"
                    data-serial-no="${gift.serial_no}" data-gift-id="${gift.id}">
                    <div class="left_col"><label>Customer:</label> ${gift.customer.customer_name} 
                        <strong>
                        ${gift.purchase_type == 1 ? 'Purchased' : 'Complimentary'}
                        ${(gift.purchase_type != 1 && gift.lnk_marketing_campaign) ? `<br><strong>Source:</strong> ${gift.lnk_marketing_campaign == 29 ? 'Holiday 2019 Gift-C25' : (gift.lnk_marketing_campaign == 28 ? 'Holiday 2019 Gift-d' : (gift.lnk_marketing_campaign == 27 ? 'Holiday 2019 Gift-e' : ''))}` : ''}
                        </strong>
                        <div class="line_break"></div>
                        <label>GC #:</label> ${gift.serial_no}
                        <label style="margin-left: 6px;">Value:</label> $${gift.face_value.toFixed(2)}
                        <label style="margin-left: 6px;">Purchased:</label> ${new Date(gift.purchase_date).toLocaleDateString('en-US', { year: 'numeric', month: 'short', day: 'numeric' })}
                    </div>
                    <div class="right_col"><label>Notes:</label>${gift.special_notes ? gift.special_notes : ''}</div>
                    <div class="h_sep"></div>
                `;
            });
        giftHtml += `</form></div>`;
        $('#available_gift_certs').html(giftHtml);
    }
    function displayGiftPagination(response) {
        var paginationLinks = $('.pagination-links');
        paginationLinks.empty();
        var currentPage = response.current_page;
        var lastPage = response.last_page;
        var prevPageUrl = response.prev_page_url;
        var nextPageUrl = response.next_page_url;
        var curantUrl = response.path;

        var totalRecords = response.total;
        var startRecord = (currentPage - 1) * response.per_page + 1;
        var endRecord = Math.min(currentPage * response.per_page, totalRecords);
        $('.record-info').html('Records: ' + startRecord + ' to ' + endRecord + ' of ' + totalRecords);
        if (prevPageUrl !== null) {
            paginationLinks.append('<a href="javascript:void(0)" onclick="fetchGiftPage(\'' + prevPageUrl + '\')">Previous</a>');
        }

        for (var i = 1; i <= lastPage; i++) {
            if (i === currentPage) {
                paginationLinks.append('<span>' + i + '</span>');
            } else {
                paginationLinks.append('<a href="javascript:void(0)" onclick="fetchGiftPage(\'' + curantUrl + '?page='+i+'\')">' + i + '</a>');
            }
        }
        if (nextPageUrl !== null) {
            paginationLinks.append('<a href="javascript:void(0)" onclick="fetchGiftPage(\'' + nextPageUrl + '\')">Next</a>');
        }
    }
    window.fetchGiftPage = function(url) {
        $.ajax({
            url: url,
            type: 'GET',
            success: function(response) {
                var currentPage = response.current_page;
                displayGifts(response.data, currentPage);
                displayGiftPagination(response);
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    };
    $('.redeem_customer_gift_certificate').click(function() {
        $.ajax({
            url: "{{ route('admin.GiftCertificate.get-list') }}",
            type: 'GET',
            success: function(response) {
                var currentPage = response.current_page;
                displayGifts(response.data, currentPage);
                displayGiftPagination(response);
                
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });            
    });
    $(document).delegate('.clear_filters_gift','click', function(){
        $('#frm_gcs_filter')[0].reset();  
        var formData = $('#frm_gcs_filter').serialize();
        $.ajax({
            url: "{{ route('admin.GiftCertificate.get-list') }}",
            type: 'GET',
            data: formData,
            success: function(response) {
                var currentPage = response.current_page;
                displayGifts(response.data, currentPage);
                displayGiftPagination(response);
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });  
    });
    $(document).delegate('#flt_serial_no, #flt_customer_name, #flt_purchase_type','change keyup', function () {
        var serial_no = $('#flt_serial_no').val();
        var customer_name = $('#flt_customer_name').val();
        var purchase_type = $('#flt_purchase_type').val();
        var formData = $('#frm_gcs_filter').serialize();
        $.ajax({
            url: "{{ route('admin.GiftCertificate.get-list') }}",
            type: 'GET',
            data: formData,
            success: function(response) {
                var currentPage = response.current_page;
                displayGifts(response.data, currentPage);
                displayGiftPagination(response);
                $('#flt_serial_no').val(serial_no);
                $('#flt_customer_name').val(customer_name); 
                $('#flt_purchase_type').val(purchase_type); 
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });  
    });
</script>