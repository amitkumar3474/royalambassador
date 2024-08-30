<div class="ui-dialog ui-widget1 ui-widget-content ui-corner-all ui-front ui-draggable ui-resizable ajax_obj create-popup-form ui-draggable-sell-new-gift-certificate d-none" tabindex="-1" style="top: 290px; width:1172px; top: 159px; left: 80.5px;" role="dialog" aria-describedby="ajax_obj" aria-labelledby="ui-id-15">
    <div class="ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix">
        <span id="ui-id-15" class="ui-dialog-title">Sell a New Gift Certificate</span>
        <button class="ui-button ui-widget1 ui-state-default ui-corner-all ui-button-icon-only ui-dialog-titlebar-close" role="button" aria-disabled="false" title="close">
            <span class="ui-button-icon-primary ui-icon ui-icon-closethick closethick-close"></span>
            <span class="ui-button-text">close</span>
        </button>
    </div>
    <div id="ajax_obj" class="ui-dialog-content ui-widget-content customer-list" style="width: auto">
    </div>
    <div id="pagination-links" class="pagination">
                
    </div>
    <br>
    <div id="ajax_obj" class="ui-dialog-content ui-widget-content new_gift_cert_form d-none" style="width: auto;">
        <span id="new_gift_cert" class="xmlb_form" >
            <form action="{{ route('admin.GiftCertificate.store') }}" id="new_gift_cert_post" method="post">
                @csrf
                <div class="new_gc_body_wrap">
                    <div>
                        <div class="card title_bar">
                            <h2 id="new_gc_title">Sell Gift Certificate to Ainslie-Maria D'Alesio</h2>
                        </div>
                        <input type="hidden" name="new_gc_lnk_buyer" id="new_gc_lnk_buyer" value="">
                        <input type="hidden" name="new_gc_lnk_buyer_contact" id="new_gc_lnk_buyer_contact" value="">
                        <p>
                            <label>Purchase Type:</label>
                            <span class="new_gc_purchase_type azbd_single_choice enabled">
                                <span value="1" class="purchase_option" data-value="1">Purchased</span>
                                <span value="2" class="purchase_option" data-value="2">Complimentary</span>
                            </span>
                            <input type="hidden" id="selected_purchase_type" name="purchase_type" value="">
                        </p>
                        <p>
                            <label>Serial Num:</label>
                            <span class="element">
                            <input type="text" id="serial_no" read_only="read_only" name="serial_no">
                            </span>
                        </p>
                        <p class="part_of_ad_campaign d-none">
                            <label>Via ad Campaign?</label>
                            <span class="azbd_single_choice enabled">
                            <span value="no">No</span>
                            <span value="yes">Yes</span>
                            </span>
                        </p>
                        <p class="mcampaign_wrap d-none">
                            <label>Ad. Campaign:</label>
                            <span class="element">
                            <select id="gc_mcampaign" name="gc_mcampaign">
                                <option value="" selected="selected">----</option>
                                <option value="29">Holiday 2019 Gift-C25</option>
                                <option value="28">Holiday 2019 Gift-d</option>
                                <option value="27">Holiday 2019 Gift-e</option>
                            </select>
                            </span>
                            <span class="mand_sign"></span>
                        </p>
                        <p>
                            <label>Value:</label>
                            <span class="element">
                            <input type="number" step=".01" class="gift_cert_face_value" name="gift_cert_face_value">
                            </span>
                        </p>
                        <p>
                            <label>Purchased On:</label>
                            <span class="element">
                            <input name="new_gift_cert_purchase_date" id="new_gift_cert_purchase_date" size="12" maxlength="10" value="{{ date('Y-m-d') }}"
                                title="Date when this gift certifacte was purchased" type="date" class="hasDatepicker">
                            </span>
                            <span class="mand_sign">*</span>
                        </p>
                        <p>
                            <label>Notes:</label>
                            <span class="element">
                            <textarea id="new_gift_cert_special_notes" name="new_gift_cert_special_notes" cols="40" rows="3" title="Special notes" maxlength="2048"></textarea>
                            </span>
                            <span class="mand_sign"></span>
                        </p>
                    </div>
                    <div class="gc_payment_wrap">
                        <div class="new_payment_main_wrap d-none">
                            <div class="card title_bar">
                                <h2>Add Payment</h2>
                            </div>
                            <div class="form_body">
                                <p>
                                    <label>Paid On:</label>
                                    <input type="date" name="payment_date" class="date payment_date hasDatepicker" value="{{ date('Y-m-d') }}" id="dp1714623838039">
                                </p>
                                <p>
                                    <label>Payment Method:</label>
                                    <select class="payment_method" name="payment_method">
                                        <option value="">----</option>
                                        <option value="1">Cheque</option>
                                        <option value="2">Cash</option>
                                        <option value="3">Debit</option>
                                        <option value="4">Visa</option>
                                        <option value="5">Master Card</option>
                                        <option value="10">American Express</option>
                                        <option value="9">E-Transfer</option>
                                        <option value="6">Others</option>
                                    </select>
                                </p>
                                <p>
                                    <label>Payment Amount:</label>
                                    <input size="15" class="payment_amount" name="payment_amount" type="number" step=".01" value="0">
                                </p>
                                <p>
                                    <label>Overhead:</label>
                                    <input size="10" class="overhead_percent" name="overhead_percent" type="number" step=".01" value="0">
                                </p>
                                <p>
                                    <label>After Overhead:</label>
                                    <input size="15" class="payable_amount" name="payable_amount" type="number" step=".01" value="0">
                                </p>
                                <p>
                                    <label>Trans. Type:</label>
                                    <span class="transact_type azbd_single_choice enabled">
                                        <span value="1" class="selected transact_type_selected"><svg class="svg-inline--fa fa-check" aria-hidden="true" focusable="false"
                                                data-prefix="fas" data-icon="check" role="img" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 448 512" data-fa-i2svg="">
                                                <path fill="currentColor"
                                                    d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z">
                                                </path>
                                            </svg><!-- <i class="fas fa-check"></i> Font Awesome fontawesome.com --> Purchase
                                        </span>
                                        <span value="2" class="transact_type_selected">Refund</span>
                                    </span>
                                </p>
                                <p>
                                    <label>Payment Notes:</label>
                                    <textarea class="payment_notes" name="payment_notes" rows="3" cols="50"></textarea>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div><button type="submit" class="btn_create_gift_cert small_button">Continue</button></div>
                </div>
            </form>
        </span>
    </div>
    <div class="new_customer_wrap"></div>
</div>
{{-- edit sell gift Certificate --}}
<div class="ui-dialog ui-widget1 ui-widget-content ui-corner-all ui-front ui-draggable ui-resizable ajax_obj create-popup-form ui-draggable-sell-edit-gift-certificate d-none" tabindex="-1" style="width:546px; top: 295px; left: 358.5px;" role="dialog" aria-describedby="ajax_obj" aria-labelledby="ui-id-15">
    <div class="ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix">
        <span id="ui-id-15" class="ui-dialog-title">Edit Gift Certificate</span>
        <button class="ui-button ui-widget1 ui-state-default ui-corner-all ui-button-icon-only ui-dialog-titlebar-close" role="button" aria-disabled="false" title="close">
            <span class="ui-button-icon-primary ui-icon ui-icon-closethick closethick-close"></span>
            <span class="ui-button-text">close</span>
        </button>
    </div>
    <div id="ajax_obj" class="ui-dialog-content ui-widget-content" style="width: auto;">
        <span id="new_gift_cert" class="xmlb_form" >
            <form action="{{ route('admin.GiftCertificate.store') }}" id="frm_edit_gift_certificate" method="post">
                @csrf
                <div class="new_gc_body_wrap_edit">
                    <div>
                        <input type="hidden" name="page_id" value="gift_certificate_edit">
                        <input type="hidden" name="gc_id" value="">
                        <p>
                            <label>GC #:</label>
                            <span class="element">
                            <input type="text" id="edit_gift_certificate_serial_no" name="edit_gift_certificate_serial_no" readonly>
                            </span>
                        </p>
                        <p>
                            <label>Purchase Type:</label>
                            <select name="edit_gift_certificate_purchase_type" disabled="">
                                <option value="1">Purchased</option>
                                <option value="2" selected="selected">Complimentary</option>
                            </select>
                        </p>
                        <p>
                            <label>Value $:</label>
                            <span class="element">
                            <input type="number" step=".01" class="gift_cert_face_value" name="edit_gift_certificate_face_value">
                            </span>
                        </p>
                        <p>
                            <label>Purchased On:</label>
                            <span class="element">
                            <input name="edit_gift_certificate_purchase_date" id="edit_gift_certificate_purchase_date" size="12" maxlength="10" value=""
                                title="Date when this gift certifacte was purchased" type="date" class="hasDatepicker" readonly>
                            </span>
                            <span class="mand_sign">*</span>
                        </p>
                        <p>
                            <label>Notes:</label>
                            <span class="element">
                            <textarea id="new_gift_cert_special_notes" name="edit_gift_certificate_special_notes" cols="40" rows="3" title="Special notes" maxlength="2048"></textarea>
                            </span>
                            <span class="mand_sign"></span>
                        </p>
                    </div>
                    <div><button type="submit" class="btn_create_gift_cert button font-bold radius-0">Save</button></div>
                </div>
            </form>
        </span>
    </div>
</div>