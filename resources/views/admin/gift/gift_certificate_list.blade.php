@extends('admin.layouts.master')
@section('title', 'All Gift Certificates')
@section('style')
    <style>
        .small_button{
            background: #F7941E;
            font-weight: bold;
            cursor: pointer;
            font-size: 12px;
            text-align: center;
            padding: 3px 6px 3px 6px;
            color: #FFF;
            display: inline-block;
            margin: .2em .4em 0 0;
            border: none
        }
        .round_box_6px {
            border: 1px solid #999;
            background: #FCFCFC;
        }
        .customer_row {
            padding: 3px 0;
            margin-bottom: 2px;
        }
        #customers .cust_name {
            width: 50%;
        }
        #customers span, #customers .add_booking_customer {
            float: left;
            margin-left: 3px;
        }
        #customer_list label {
            float: none;
        }
        #customers .h_sep {
            margin: 0;
            height: 0;
        }
        .h_sep {
            height: 6px;
            width: 98%;
            margin: 9px 0 9px 0;
            clear: both;
            border-bottom: 1px dashed #999;
        }
        .contact_row {
            margin: 0 0 3px 9px;
        }
        .contact_row .contact_name {
            width: 25%;
        }
        .contact_row .contact_phone {
            width: 35%;
        }
        /* Pagination styles */
    #pagination-links a {
        display: inline-block;
        padding: 5px 10px;
        margin-right: 5px;
        background-color: #F7941E;
        color: #333;
        text-decoration: none;
        border-radius: 3px;
    }
    #pagination-links a:hover {
        background-color: #e0e0e0;
    }
    #pagination-links span {
        display: inline-block;
        padding: 5px 10px;
        margin-right: 5px;
        background-color: #ccc;
        color: #fff;
        border-radius: 3px;
    }
    .new_gc_body_wrap {
        display: grid;
        grid-template-columns: 1fr 1.1fr;
        grid-gap: 1em;
    }
    .title_bar h2 {
        color: #373232;
    }
    .new_gc_body_wrap p,
    .new_gc_body_wrap_edit p {
        margin: 0 0 6px 0;
        line-height: 120%;
        padding: 2px;
    }
    .azbd_single_choice > span {
        background: #464040;
        border-radius: .3em;
        text-align: center;
        display: inline-block;
        padding: .3em;
        color: #FFF;
        margin: .06em;
        cursor: pointer;
    }
    .gc_payment_wrap {
        border-left: 1px solid #CCC;
        padding-left: 1em;
    }
    .azbd_single_choice span.selected {
        background: #34A853;
    }
    .svg-inline--fa {
        display: var(--fa-display,inline-block);
        height: 1em;
        overflow: visible;
        vertical-align: -.125em;
    }
    .new_gc_body_wrap_edit{
        margin-left: 70px;
    }
    .product-list .redeemed {
        background: #FFFF00;
    }
    </style>
@endsection
@section('content')
<span id="gift_certificate_list" class="xmlb_form">
    <form method="get" id="frm_gift_certificate_list" action="{{ route('admin.GiftCertificate.index') }}" accept-charset="utf-8">
        <h1>All Gift Certificates</h1>
        <div class="line_break"></div>
        <div class="line_break"></div>
        <fieldset class="form_filters">
            <legend>Search by</legend>
            <label>Customer:</label> 
            <input name="gift_certificate_list_customer_name" id="gift_certificate_list_CUSTOMER_NAME" type="text" value="{{ request('gift_certificate_list_customer_name') }}" maxlength="90" size="20" title="Name of this customer. If this is a corporate customer, then this is the business name. If personal it is the concat of first name and last name or say The Smiths Family." onchange="javascript:gift_certificate_list_applyFilters(); ">
            <label>GC #:</label> 
            <input name="gift_certificate_list_serial_no" id="gift_certificate_list_SERIAL_NO" type="text" value="{{ request('gift_certificate_list_serial_no') }}" maxlength="15" size="5" title="The serial / on the gift certificate">
            <label>Purchase Type:</label> 
            <select name="gift_certificate_list_purchase_type" id="gift_certificate_list_PURCHASE_TYPE">
                <option value="" selected="selected">--All--</option>
                <option value="1" {{ request('gift_certificate_list_purchase_type') == '1' ? 'selected' : '' }}>Purchased</option>
                <option value="2" {{ request('gift_certificate_list_purchase_type') == '2' ? 'selected' : '' }}>Complimentary</option>
            </select>
            <label>Ad. Campaign:</label> 
            <select name="gift_certificate_list_lnk_marketing_campaign" id="gift_certificate_list_LNK_MARKETING_CAMPAIGN">
                <option value="" selected="yes">--All--</option>
                <option value="29" {{ request('gift_certificate_list_lnk_marketing_campaign') == '29' ? 'selected' : '' }}>Holiday 2019 Gift-C25</option>
                <option value="28" {{ request('gift_certificate_list_lnk_marketing_campaign') == '28' ? 'selected' : '' }}>Holiday 2019 Gift-d</option>
                <option value="27" {{ request('gift_certificate_list_lnk_marketing_campaign') == '27' ? 'selected' : '' }}>Holiday 2019 Gift-e</option>
            </select>
            <label>Redeemed:</label> 
            <select name="gift_certificate_list_is_redeemed" id="gift_certificate_list_IS_REDEEMED">
                <option value="" selected="selected">--All--</option>
                <option value="1" {{ request('gift_certificate_list_is_redeemed') == '1' ? 'selected' : '' }}>Yes</option>
                <option value="0" {{ request('gift_certificate_list_is_redeemed') == '0' ? 'selected' : '' }}>No</option>
            </select>
            <label>Customer Type:</label> 
            <select name="gift_certificate_list_customer_type" id="gift_certificate_list_CUSTOMER_TYPE">
                <option value="" selected="selected">--All--</option>
                <option value="1" {{ request('gift_certificate_list_customer_type') == '1' ? 'selected' : '' }}>Personal</option>
                <option value="2" {{ request('gift_certificate_list_customer_type') == '2' ? 'selected' : '' }}>Corporate</option>
                <option value="3" {{ request('gift_certificate_list_customer_type') == '3' ? 'selected' : '' }}>Event Planner</option>
            </select>
            <button type="submit" id="gift_certificate_list_apply_filter" class="button font-bold radius-0">Search</button>
            <button type="button" id="gift_certificate_list_clear_filter" class="button font-bold radius-0">Show All</button>
        </fieldset>
    </form>    
    <div class="top-record mt-20">
        <p align="right">
            Records: 1 to 3 of 3 | Show: 
            <select class="max-100">
                <option value="all">All</option>
                <option value="3" selected="">3</option>
                <option value="10">10</option>
                <option value="30">30</option>
                <option value="50">50</option>
                <option value="100">100</option>
            </select>
        </p>
    </div>
    <div class="special_action">
        <button type="button" class="button font-bold radius-0 sell_gift_certificate">Sell Gift Certificate</button>
    </div>
    <table class="product-list table mt-20">
        <tbody>
            <tr>
                <th>
                    <a href="#">Buyer</a> 
                </th>
                <th>
                    <a href="#">GC #</a> 
                </th>
                <th>
                    <a href="#">Value $</a> 
                </th>
                <th>
                    <a href="#">Purchase Type</a>
                </th>
                <th>
                    <a href="#">Purchased On</a> 
                </th>
                <th>
                    <a href="#">Redeemed</a> 
                </th>
                <th>
                    <a href="#">Notes</a> 
                </th>
                <th></th>
            </tr>
            @foreach ($giftCertificates as $giftCertificate)
                <tr class="supplier-row {{($giftCertificate->date_redeemed != null)? 'redeemed':''}}">
                    <td><a href="{{ route('admin.customer.show',$giftCertificate->customer->id) }}">{{ $giftCertificate->customer->customer_name }}</a></td>
                    <td>{{ $giftCertificate->serial_no }}</td>
                    <td>${{ $giftCertificate->face_value }}</td>
                    <td>
                        @if ($giftCertificate->purchase_type == 1)
                            {{'Purchased'}}
                        @else
                            {{'Complimentary'}}
                            @if (isset($giftCertificate->lnk_marketing_campaign)) 
                                <br><strong>Source:</strong> 
                                {{ 
                                    $giftCertificate->lnk_marketing_campaign == 29 ? 'Holiday 2019 Gift-C25' :
                                    ($giftCertificate->lnk_marketing_campaign == 28 ? 'Holiday 2019 Gift-d' :
                                    ($giftCertificate->lnk_marketing_campaign == 27 ? 'Holiday 2019 Gift-e' : ''))
                                }}
                            @endif
                        @endif
                    </td>
                    <td>{{date('M d- Y', strtotime($giftCertificate->purchase_date))}}</td>
                    <td>
                        <strong>{{ ($giftCertificate->is_redeemed == 0)? 'No': 'Yes' }}</strong>
                        @if ($giftCertificate->date_redeemed != null)
                            By: <a href="{{route('admin.customer.show', $giftCertificate->customer->id)}}">{{$giftCertificate->customer->customer_name}}</a>
                            On: {{date('M d, Y', strtotime($giftCertificate->date_redeemed))}}
                        @endif
                    </td>
                    <td>Added on {{date('l M d, Y', strtotime($giftCertificate->purchase_date)) }} By {{$giftCertificate->user->name}}</td>
                    <td>
                        @if (!$giftCertificate->date_redeemed)
                            <button type="button" data-id="{{$giftCertificate->id}}" class="button font-bold radius-0 gift_certificate_list_delete">Delete</button>
                            <button type="button" data-id="{{$giftCertificate->id}}" class="button font-bold radius-0 gift_certificate_edit">Edit</button>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</span>
<div class="ui-widget-overlay ui-front d-none"></div>
@include('admin.gift.models.popup')
@endsection
@section('scripts')
@include('admin.gift.js.create_gift')
<script>
    $(document).ready(function () {
        $('.closethick-close').click(function () { 
            $('.ui-draggable-sell-new-gift-certificate').hide();
            $('.ui-draggable-sell-edit-gift-certificate').hide();
            $('.ui-widget-overlay').css('display', 'none');            
        });
        $('.transact_type_selected').on('click', function(event) {
            $('.transact_type_selected').removeClass('selected').find('svg').remove();
            $(this).addClass('selected').prepend('<svg class="svg-inline--fa fa-check" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"></path></svg>');
        });
        $('.new_gc_purchase_type span').on('click', function () {
            $(this).siblings('span').removeClass('selected').find('svg').remove();
            if ($(this).attr('value') == 1) {
                $('.new_payment_main_wrap').show();
                $('.part_of_ad_campaign').hide();
                $('#serial_no').val('P5415');
            } else {
                $('.new_payment_main_wrap').hide();
                $('.part_of_ad_campaign').show();
                $('#serial_no').val('C5415');
            }
            $(this).addClass('selected').prepend('<svg class="svg-inline--fa fa-check" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"></path></svg>');
        });
        $('.azbd_single_choice span').on('click', function () {
            if ($(this).attr('value') == 'yes') {
                $('.mcampaign_wrap').show();
            } else {
                $('.mcampaign_wrap').hide();
            }
            $(this).siblings('span').removeClass('selected');
            $(this).parent().find('svg').remove();
            $(this).addClass('selected');
            $(this).addClass('selected').prepend('<svg class="svg-inline--fa fa-check" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"></path></svg>');
        });
        $(document).delegate('.add_booking_customer','click', function(){
            var customer_id = $(this).attr("customer_id");
            var cu_contact_id = $(this).attr("cu_contact_id");
            var customer_name = $(this).attr("customer_name");

            $(".customer_row, .contact_row, #customers .h_sep").css("display", "none");
            $(".customer_row[customer_id=\"" + customer_id + "\"]").css("display", "block");
            $(".contact_row[customer_id=\"" + customer_id + "\"]").css("display", "block");
            $("#pagination-links").css("display", "none");

            $("#new_gc_lnk_buyer").val(customer_id);
            $("#new_gc_lnk_buyer_contact").val(cu_contact_id);
            $("#new_gc_title").text("Sell Gift Certificate to " + customer_name); // Add title
            $(".new_gift_cert_form").css("display", "block");
            $('.new_gift_cert_form').show();
        });
    });
    $(document).ready(function() {
        $('.purchase_option').on('click', function () {
            var selectedValue = $(this).attr('data-value');
            $('#selected_purchase_type').val(selectedValue);
            $(this).addClass('selected').siblings().removeClass('selected');
        });
        $('#gift_certificate_list_clear_filter').click(function () { 
            window.location.href = "{{ route('admin.GiftCertificate.index') }}"           
        });
        $(document).on('click', '.gift_certificate_list_delete', function() {
            var id = $(this).attr('data-id');

            if (confirm("Do you really want to delete this record?") == true) {
                var url = "{{ route('admin.GiftCertificate.destroy', ':id') }}";
                url = url.replace(':id', id);
                $.ajax({
                    url: url,
                    type: 'DELETE',
                    data: {_token:  "{{csrf_token()}}"},
                    success: function(response) {
                        if (response.success) {
                            alert(response.message);
                            // window.location.href = "{{ route('admin.customer.index') }}";
                            window.location.reload();
                        } else {
                            alert(response.message);
                        }
                    }
                });

            }
        });
    });
    $(document).ready(function() {
        $('#new_gift_cert_post').submit(function(event) {
            event.preventDefault();

            // if (!confirm("Create the gift certificate and process payment?"))
            //     return;

            var purchase_type = $("#selected_purchase_type").val();
            if (purchase_type == '' && !$(".purchase_option").hasClass("selected")) {
                alert("Please select the purchase type!");
                return false;
            }

            if (purchase_type == '2') {
                var part_of_ad_campaign = $(".part_of_ad_campaign").find("span.selected").attr("value");
                if (!$(".part_of_ad_campaign").find("span").hasClass("selected")) {
                    alert("Please select if this is part of ad-campaign or not!");
                    return false;
                }

                if (part_of_ad_campaign == 'yes') {
                    var mcampaign_id = $("#gc_mcampaign").val();
                    $('.mcampaign_wrap').show();
                    if (mcampaign_id == "") {
                        alert("Please select the ad. campaign!");
                        return false;
                    }
                }
            }
            var face_value = $(".gift_cert_face_value").val();
            if (face_value == "") {
                alert("Please enter the gift certificate value!");
                return false;
            }

            var purchase_date = $.trim($("#new_gift_cert_purchase_date").val());
            if (purchase_date == "") {
                alert("Please enter the purchase date!");
                return false;
            }
            this.submit();
        });
        $("#frm_edit_gift_certificate").validate({
            rules: {
                'edit_gift_certificate_face_value': {
                    required: true,
                    number: true
                },
            },
            messages: {
                'edit_gift_certificate_face_value': {
                    number: 'Please enter Face Value integer number',
                    required: 'Please enter Face Value or Face Value too short. It has to be #min_len# characters.',
                }
            }
        });
    });

</script>
@endsection