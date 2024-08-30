@extends('admin.layouts.master')
@section('title', 'Discount Coupons for Online Catering')
@section('style')
<style>
    .product-list {
        width: 100%;
    }

    .special_action {
        margin: 6px;
        text-align: center;
        padding: 2px 9px 4px 9px;
        display: inline;
    }

    #ajax_obj label {
        font-weight: bold;
        padding-right: 5px;
        min-width: 125px;
        text-align: right;
        display: inline-block;
        vertical-align: top;
    }

    #discount_amount_wrap,
    #discount_percent_wrap {
        display: none;
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
<span id="discount_coupon_list" class="xmlb_form">
    <form method="get" id="frm_discount_coupon_list" action="{{route('admin.manage.mgr-discount-coupon-list.index') }}" accept-charset="utf-8" enctype="multipart/form-data">
        <h1>All Coupons
            <div class="special_action">
                <button type="button" id="btn_add_new_coupon" class="button font-bold radius-0">New Coupon</button>
            </div>
        </h1>
        <div class="line_break"></div>
        <fieldset class="form_filters">
            <legend>Search by</legend>
            <label>Type Of Discount:</label>
            <select name="type_of_discount" id="discount_coupon_list_TYPE_OF_DISCOUNT">
                <option value="">-- All --</option>
                <option value="1" {{ request('type_of_discount') == 1 ? 'selected' : '' }}>Amount</option>
                <option value="2" {{ request('type_of_discount') == 2 ? 'selected' : '' }}>Percent</option>
            </select>
            <label>Used:</label>
            <select name="is_used" id="discount_coupon_list_IS_USED">
                <option value="">-- All --</option>
                <option value="1" {{ request('is_used') == 1?'selected':''}}>Yes</option>
                <option value="0" {{ request('is_used') == '0'?'selected':''}}>No</option>
            </select>
            <label>Active:</label>
            <select name="is_active" id="discount_coupon_list_IS_ACTIVE">
                <option value="">-- All --</option>
                <option value="1" {{ request('is_active') == 1?'selected':''}}>Yes</option>
                <option value="0" {{ request('is_active') == '0'?'selected':''}}>No</option>
            </select>
            <button type="submit" class="button font-bold radius-0">Search</button>
            <a href="{{route('admin.manage.mgr-discount-coupon-list.index') }}">
                <button type="button" class="button font-bold radius-0">Show All</button>
            </a>
        </fieldset>

        <div class="line_break"></div>
        <p align="right"><span id="records-display"></span> of <span id="total_records">{{ $allRecords }}</span> | Show:
            <select id="perPageSelect" class="max-100" name="pages">
                <option value="10" {{ request('pages') == 10?'selected':''}} @if(request('pages') == null){{'selected'}}@endif>10</option>
                <option value="20" {{ request('pages') == 20?'selected':''}}>20</option>
                <option value="30" {{ request('pages') == 30?'selected':''}}>30</option>
                <option value="50" {{ request('pages') == 50?'selected':''}}>50</option>
                <option value="100" {{ request('pages') == 100?'selected':''}}>100</option>
            </select>
        </p>

        <table class="bound product-list">
            <thead>
                <tr>
                    <th>Discount</th>
                    <th><a href="#" title="Click to sort by Coupon Code">Coupon Code</a></th>
                    <th><a href="#" title="Click to sort by Validation">Validation</a></th>
                    <th><a href="#" title="Click to sort by Sent to">Sent to</a></th>
                    <th><a href="#" title="Click to sort by Active">Active</a></th>
                    <th><a href="#" title="Click to sort by Used">Used</a></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($discountCoupons as $_discountCoupon)
                <tr>
                    <td>{{ $_discountCoupon->discount_amount?'$'.number_format($_discountCoupon->discount_amount, 2):'' }}
                        {{ $_discountCoupon->discount_percent?number_format($_discountCoupon->discount_percent, 2).'%':'' }}
                        {{ $_discountCoupon->min_purchase !== 0.00?'[Min Purchase: $'.number_format($_discountCoupon->min_purchase, 2).']':'' }}
                    </td>
                    <td>{{ $_discountCoupon->coupon_code }}</td>
                    <td>
                        {{ \Carbon\Carbon::parse($_discountCoupon->start_date)->format('M d- Y') }} to
                        {{ $_discountCoupon->expiry_date ? \Carbon\Carbon::parse($_discountCoupon->expiry_date)->format('M d- Y') : '[N/A]' }}
                    </td>
                    <td></td>
                    <td>{{ $_discountCoupon->is_active === 1?'Yes':'No' }}</td>
                    <td>{{ $_discountCoupon->is_used === 1?'Yes':'No' }}</td>
                    <td>
                        <button class="button font-bold radius-0 btn_discount_coupon" type="button"
                            coupon_id="{{ $_discountCoupon->id}}">Edit</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div id="pagination-links" class="pagination">
            {{ $discountCoupons->links() }}
        </div>
    </form>
</span>

<div class="ui-widget-overlay ui-front d-none"></div>
<!-- Add New Coupon for Online Catering Module -->
<div class="ui-dialog ui-widget1 ui-widget-content ui-corner-all ui-front ui-draggable ui-resizable ajax_obj create-popup-form ui-draggable-add-new-coupon d-none "
    tabindex="-1" style="width: 540px; top:215.5px; left: 366.5px;" role="dialog" aria-describedby="ajax_obj"
    aria-labelledby="ui-id-15">
    <div class="ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix">
        <span id="ui-id-15" class="ui-dialog-title">New Coupon</span>
        <button
            class="ui-button ui-widget1 ui-state-default ui-corner-all ui-button-icon-only ui-dialog-titlebar-close add-new-coupon-close"
            role="button" aria-disabled="false" title="close">
            <span class="ui-button-icon-primary ui-icon ui-icon-closethick"></span>
            <span class="ui-button-text">close</span>
        </button>
    </div>
    <div id="ajax_obj" class="ui-dialog-content ui-widget-content create-form-content" style="width: auto">
        <span id="new_discount_coupon" class="xmlb_form">
            <form method="post" id="frm_new_discount_coupon" action="{{route('admin.manage.mgr-discount-coupon-list.store') }}" accept-charset="utf-8" enctype="multipart/form-data">
                @csrf
                <h2>New Coupon for Online Catering</h2>
                <div class="line_break"></div>
                <div class="line_break"></div>
                <label>Type Of Discount:</label>
                <span class="element">
                    <select id="type_of_discount" name="type_of_discount" fdprocessedid="n1kexd">
                        <option value="" selected="selected">----</option>
                        <option value="1">Amount</option>
                        <option value="2">Percent</option>
                    </select>
                </span>
                <span class="mand_sign">*</span>
                <div class="line_break"></div>
                <div id="discount_amount_wrap">
                    <label>Discount Amount:</label>
                    <span class="element">
                        <input id="discount_amount" name="discount_amount" type="number" step="0.01" maxlength="8"
                            title="The actual dollar value of discount if the discount type is by amount">
                    </span>
                    <span class="mand_sign"></span>
                </div>
                <div id="discount_percent_wrap">
                    <label>Discount Percent:</label>
                    <span class="element">
                        <input id="discount_percent" name="discount_percent" type="text" maxlength="6" size="8"
                            title="The discount percent to be given by this coupon if discount type is by percent.">
                    </span>
                    <span class="mand_sign"></span>
                </div>
                <div class="line_break"></div>
                <label>Min Purchase:</label>
                <span class="element">
                    <input id="new_discount_coupon_min_purchase" name="min_purchase" type="number" step="0.01"
                        maxlength="10" title="Minimum purchase required to use this coupon. Zero if not applicable"
                        fdprocessedid="nz2l5a">
                </span>
                <span class="mand_sign">*</span>
                <div class="line_break"></div>
                <label>Coupon Code:</label>
                <span class="element">
                    <input id="new_discount_coupon_coupon_code" name="coupon_code" type="text" maxlength="16" size="20"
                        value="666C1FF41EA47" title="The actual unique code for the coupon" fdprocessedid="jnnu4e">
                </span>
                <span class="mand_sign">*</span>
                <div class="line_break"></div>
                <label>Start Date:</label>
                <span class="element">
                    <input name="start_date" id="new_discount_coupon_start_date" size="12" maxlength="10"
                        title="The date when this coupon will be in effect" type="date" class="hasDatepicker"
                        fdprocessedid="vpn415">
                </span>
                <span class="mand_sign">*</span>
                <div class="line_break"></div>
                <label>Expiry Date:</label>
                <span class="element">
                    <input name="expiry_date" id="new_discount_coupon_expiry_date" size="12" maxlength="10"
                        title="The date when this coupon will expire. Null if it does not expire" type="date"
                        class="hasDatepicker" fdprocessedid="ir70lu">
                </span>
                <span class="mand_sign"></span>
                <div class="line_break"></div>
                <div class="">
                    <button type="submit" id="new_discount_coupon_save" class="button font-bold radius-0">Save</button>
                </div>
            </form>
        </span>
    </div>
</div>

<!-- Edit Coupon for Online Catering Module -->
<div class="ui-dialog ui-widget1 ui-widget-content ui-corner-all ui-front ui-draggable ui-resizable ajax_obj create-popup-form ui-draggable-edit-coupon d-none "
    tabindex="-1" style="width: 540px; top:215.5px; left: 366.5px;" role="dialog" aria-describedby="ajax_obj"
    aria-labelledby="ui-id-15">
    <div class="ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix">
        <span id="ui-id-15" class="ui-dialog-title">Edit Coupon</span>
        <button
            class="ui-button ui-widget1 ui-state-default ui-corner-all ui-button-icon-only ui-dialog-titlebar-close edit-coupon-close"
            role="button" aria-disabled="false" title="close">
            <span class="ui-button-icon-primary ui-icon ui-icon-closethick"></span>
            <span class="ui-button-text">close</span>
        </button>
    </div>
    <div id="ajax_obj" class="ui-dialog-content ui-widget-content create-form-content" style="width: auto">
        <span id="edit_discount_coupon" class="xmlb_form">
            <form method="post" id="frm_edit_discount_coupon" action="" accept-charset="utf-8" enctype="multipart/form-data">
                @method('put')
                @csrf
                <label>Type Of Discount:</label>
                <span class="element">
                    <select id="edit_discount_coupon_type_of_discount" name="type_of_discount" fdprocessedid="kdquy">
                        <option value="">----</option>
                        <option value="1">Amount</option>
                        <option value="2">Percent</option>
                    </select>
                </span>
                <span class="mand_sign">*</span>
                <div class="line_break"></div>
                <label>Discount Amount:</label>
                <span class="element">
                    <input  id="edit_discount_coupon_discount_amount" name="discount_amount" type="number" step="0.01" maxlength="8" title="The actual dollar value of discount if the discount type is by amount" fdprocessedid="s68xcf">
                </span>
                <span class="mand_sign"></span>
                <div class="line_break"></div>
                <label>Discount Percent:</label>
                <span class="element">
                    <input id="edit_discount_coupon_discount_percent" name="discount_percent" type="text" maxlength="6" size="8" value="" title="The discount percent to be given by this coupon if discount type is by percent." fdprocessedid="on2aw">
                </span>
                <span class="mand_sign"></span>
                <div class="line_break"></div>
                <label>Min Purchase:</label>
                <span class="element">
                    <input id="edit_discount_coupon_min_purchase" name="min_purchase" type="number" step="0.01" maxlength="10" value="" title="Minimum purchase required to use this coupon. Zero if not applicable" fdprocessedid="scrtsv">
                </span>
                <span class="mand_sign">*</span>
                <div class="line_break"></div>
                <label>Start Date:</label>
                <span class="element">
                    <input name="start_date" id="coupon_start_date" size="12" maxlength="10" value="" title="The date when this coupon will be in effect" type="date" class="hasDatepicker" fdprocessedid="gc15zo">
                </span><span class="mand_sign">*</span>
                <div class="line_break"></div>
                <label>Expiry Date:</label>
                <span class="element">
                    <input  name="expiry_date" id="edit_discount_coupon_expiry_date" size="12" maxlength="10" value="" title="The date when this coupon will expire. Null if it does not expire" type="date" class="hasDatepicker" fdprocessedid="s6mkqq">
                </span>
                <span class="mand_sign"></span>
                <div class="line_break"></div>
                <label>Active:</label>
                <span class="element">
                    <select id="edit_discount_coupon_is_active" name="is_active" fdprocessedid="nrqhcj">
                        <option value="">----</option>
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select></span>
                    <span class="mand_sign">*</span>
                <div class="line_break"></div>
                <div class="">
                    <button type="submit" id="edit_discount_coupon_save" class="button font-bold radius-0">Save</button>
                </div>
            </form>
        </span>
    </div>
</div>
@endsection
@section('scripts')
<script>
    $(document).ready(function() {
        function generateRandomString(length) {
            var characters = '0123456789ABCDEF';
            var array = new Uint8Array(length);
            window.crypto.getRandomValues(array);
            return Array.from(array, byte => characters[byte % characters.length]).join('');
        }

        $('#btn_add_new_coupon').click(function() {
            var randomString = generateRandomString(13);
            $('#frm_new_discount_coupon input[name="coupon_code"]').val(randomString);
            $('.ui-widget-overlay').removeClass('d-none');
            $('.ui-draggable-add-new-coupon').removeClass('d-none');
        });

        $('.add-new-coupon-close').click(function() {
            $('.ui-widget-overlay').addClass('d-none');
            $('.ui-draggable-add-new-coupon').addClass('d-none');
        });

        $('.edit-coupon-close').click(function() {
            $('.ui-widget-overlay').addClass('d-none');
            $('.ui-draggable-edit-coupon').addClass('d-none');
        });

        $("#type_of_discount").change(function() {
            discount_type = $(this).val();
            if (discount_type == 1) {
                $('#frm_new_discount_coupon input[name="discount_percent"]').val('');
                $("#discount_percent_wrap").hide();
                $("#discount_amount_wrap").show();
            } else if (discount_type == 2) {
                $('#frm_new_discount_coupon input[name="discount_amount"]').val('');
                $("#discount_amount_wrap").hide();
                $("#discount_percent_wrap").show();
            } else {
                $('#frm_new_discount_coupon input[name="discount_amount"]').val('');
                $('#frm_new_discount_coupon input[name="discount_percent"]').val('');
                $("#discount_amount_wrap").hide();
                $("#discount_percent_wrap").hide();
            }
        });

        $('#frm_new_discount_coupon').validate({
            rules: {
                'type_of_discount': 'required',
                'discount_amount': 'number',
                'discount_percent': 'number',
                'min_purchase': {
                    required: true,
                    number: true
                },
                'coupon_code': 'required',
                'start_date': 'required',
            },
            messages: {
                'min_purchase': 'Please enter Type Of Discount or Type Of Discount too short. It has to be #min_len# characters.',
                'discount_amount': 'Please Enter Number.',
                'discount_percent': 'Please Enter Number.',
                'min_purchase': {
                    required: 'Please enter Min Purchase or Min Purchase too short. It has to be #min_len# characters.',
                    number: 'Please Enter Number.',
                },
                'coupon_code': 'Please enter Coupon Code or Coupon Code too short. It has to be 1 characters.',
                'start_date': 'Please enter Start Date or Start Date too short. It should be in YYYY-MM-DD format.',
            }
        });

        $('.btn_discount_coupon').click(function() {
            var coupon_id = $(this).attr('coupon_id');
            var url = "{{route('admin.manage.mgr-discount-coupon-list.edit', ':id') }}";
            url = url.replace(':id', coupon_id);
            $.ajax({
                type: "get",
                url: url,
                success: function(response) {
                    var upurl = "{{route('admin.manage.mgr-discount-coupon-list.update', ':id') }}";
                    upurl = upurl.replace(':id', response.discountCoupon.id);
                    $('#frm_edit_discount_coupon').attr('action', upurl);
                    $('#frm_edit_discount_coupon select[name="type_of_discount"]').val(response.discountCoupon.type_of_discount);
                    $('#frm_edit_discount_coupon input[name="discount_amount"]').val(response.discountCoupon.discount_amount);
                    $('#frm_edit_discount_coupon input[name="discount_percent"]').val(response.discountCoupon.discount_percent);
                    $('#frm_edit_discount_coupon input[name="min_purchase"]').val(response.discountCoupon.min_purchase);
                    $('#frm_edit_discount_coupon input[name="start_date"]').val(response.discountCoupon.start_date);
                    $('#frm_edit_discount_coupon input[name="expiry_date"]').val(response.discountCoupon.expiry_date);
                    $('#frm_edit_discount_coupon select[name="is_active"]').val(response.discountCoupon.is_active);
                    $('.ui-widget-overlay').removeClass('d-none');
                    $('.ui-draggable-edit-coupon').removeClass('d-none');
                }
            });
        });

        $('#frm_edit_discount_coupon').validate({
            rules: {
                'type_of_discount': 'required',
                'discount_amount': 'number',
                'discount_percent': 'number',
                'min_purchase': {
                    required: true,
                    number: true
                },
                'coupon_code': 'required',
                'start_date': 'required',
                'is_active': 'required',
            },
            messages: {
                'min_purchase': 'Please enter Type Of Discount or Type Of Discount too short. It has to be #min_len# characters.',
                'discount_amount': 'Please Enter Number.',
                'discount_percent': 'Please Enter Number.',
                'min_purchase': {
                    required: 'Please enter Min Purchase or Min Purchase too short. It has to be #min_len# characters.',
                    number: 'Please Enter Number.',
                },
                'coupon_code': 'Please enter Coupon Code or Coupon Code too short. It has to be 1 characters.',
                'start_date': 'Please enter Start Date or Start Date too short. It should be in YYYY-MM-DD format.',
                'is_active': 'Please enter Active.',
            }
        });

        $('#perPageSelect').on('change', function() {
            const perPage = $(this).val();
            const url = new URL(window.location.href);
            url.searchParams.set('perPage', perPage);
            window.location.href = url.toString();
            $('#frm_discount_coupon_list').submit();
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