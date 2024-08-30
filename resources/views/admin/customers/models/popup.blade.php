<div class="ui-dialog ui-widget1 ui-widget-content ui-corner-all ui-front ui-draggable ui-resizable ajax_obj create-popup-form d-none ui-draggable-customer-edit" tabindex="-1" style="top: 80px" role="dialog" aria-describedby="ajax_obj" aria-labelledby="ui-id-15">
    <div class="ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix">
        <span id="ui-id-15" class="ui-dialog-title">Edit Customer</span>
        <button class="ui-button ui-widget1 ui-state-default ui-corner-all ui-button-icon-only ui-dialog-titlebar-close" role="button" aria-disabled="false" title="close">
            <span class="ui-button-icon-primary ui-icon ui-icon-closethick closethick-customer-close"></span>
            <span class="ui-button-text">close</span>
        </button>
    </div>
    <div id="ajax_obj" class="ui-dialog-content ui-widget-content create-form-content frm_edit_customer">
        <span id="event_new" class="xmlb_form">
            <form id="edit_customer_form" action="{{ route('admin.customer.update',$customer->id) }}" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" name="customer_id" value="{{$customer->id}}">
                <div class="row">
                    <div class="col-4 mb-10">
                        <label class="align-right d-block">Customer Type:</label>
                    </div>
                    <div class="col-8 mb-10 pl-0">
                        <select name="customer_type">
                            <option value="1" {{($customer->customer_type == 1)? 'selected': ''}}>Personal</option>
                            <option value="2" {{($customer->customer_type == 2)? 'selected': ''}}>Corporate</option>
                            <option value="3" {{($customer->customer_type == 3)? 'selected': ''}}>Event Planner</option>
                        </select>
                        <span class="mand_sign">*</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 mb-10">
                        <label class="align-right d-block">Ad. Campaign:</label>
                    </div>
                    <div class="col-8 mb-10 pl-0">
                        <select name="ad_campaign">
                            @foreach ($marketingCamps as $_marketingCamp)
                            <option value="{{$_marketingCamp->id}}" {{($customer->lnk_marketing_campaign == $_marketingCamp->id)? 'selected':'' }}>{{$_marketingCamp->campaign_name}}</option>
                            @endforeach
                        </select>
                        <span class="mand_sign">*</span>
                    </div>
                </div>
                <div class="line_break"></div>
                <button type="submit" class="button font-bold radius-0">Save</button>
            </form>
        </span>
    </div>
</div>
{{-- create contact model --}}
<div class="ui-dialog ui-widget1 ui-widget-content ui-corner-all ui-front ui-draggable ui-resizable ajax_obj create-popup-form ui-draggable-contact d-none" tabindex="-1" style="top: 166px" role="dialog" aria-describedby="ajax_obj" aria-labelledby="ui-id-15">
    <div class="ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix">
        <span id="ui-id-15" class="ui-dialog-title">New Contact for this Customer</span>
        <button class="ui-button ui-widget1 ui-state-default ui-corner-all ui-button-icon-only ui-dialog-titlebar-close" role="button" aria-disabled="false" title="close">
            <span class="ui-button-icon-primary ui-icon ui-icon-closethick closethick-contact"></span>
            <span class="ui-button-text">close</span>
        </button>
    </div>
    <div id="ajax_obj" class="ui-dialog-content ui-widget-content create-form-content">
        <span id="event_new" class="xmlb_form">
            <form id="customer_contact_store" action="{{route('admin.customer.contact.store')}}" method="POST">
                @csrf
                <input type="hidden" name="customer_name" value="{{$customer->customer_name??''}}">
                <input type="hidden" name="customer_id" value="{{$customer->id??''}}">
                <fieldset class="round_box_3px">
                    <legend>Main Info</legend>
                    <div class="row">
                        <div class="col-4 mb-10">
                            <label class="align-right d-block">Relation:</label>
                        </div>
                        <div class="col-8 mb-10 pl-0">
                            <select id="customer_add_contact_relation" name="relation">
                                <option value="1" {{ old('relation') == '1' ? 'selected' : '' }}>Single Person</option>
                                <option value="2" {{ old('relation') == '2' ? 'selected' : '' }}>Bride</option>
                                <option value="3" {{ old('relation') == '3' ? 'selected' : '' }}>Groom</option>
                                <option value="4" {{ old('relation') == '4' ? 'selected' : '' }}>Wife</option>
                                <option value="5" {{ old('relation') == '5' ? 'selected' : '' }}>Husband</option>
                                <option value="6" {{ old('relation') == '6' ? 'selected' : '' }}>Child</option>
                                <option value="99" {{ old('relation') == '99' ? 'selected' : '' }}>Others</option>
                            </select>
                            <span class="mand_sign">*</span>
                        </div>
                        <div class="col-4 mb-10">
                            <label class="align-right d-block">Title:</label>
                        </div>
                        <div class="col-8 mb-10 pl-0">
                            <select id="customer_add_contact_mr_mrs" name="mr_mrs">
                                <option value="">----</option>
                                <option value="Mr." {{ old('mr_mrs') == 'Mr.' ? 'selected' : '' }}>Mr.</option>
                                <option value="Mrs." {{ old('mr_mrs') == 'Mrs.' ? 'selected' : '' }}>Mrs.</option>
                                <option value="Mis." {{ old('mr_mrs') == 'Mis.' ? 'selected' : '' }}>Mis.</option>
                                <option value="Dr." {{ old('mr_mrs') == 'Dr.' ? 'selected' : '' }}>Dr.</option>
                            </select>
                        </div>
                        <div class="col-4 mb-10">
                            <label class="align-right d-block">First Name:</label>
                        </div>
                        <div class="col-8 mb-10 pl-0">
                            <input name="first_name" size="34" type="text" value="{{ old('first_name') }}" title="First Name">
                            <span class="mand_sign">*</span>
                        </div>
                        <div class="col-4 mb-10">
                            <label class="align-right d-block">Last Name:</label>
                        </div>
                        <div class="col-8 mb-10 pl-0">
                            <input name="last_name" size="34" type="text" value="{{ old('last_name') }}" title="Last Name">
                            <span class="mand_sign">*</span>
                        </div>
                        <div class="col-4 mb-10">
                            <label class="align-right d-block">Main Email:</label>
                        </div>
                        <div class="col-8 mb-10 pl-0">
                            <input name="main_email" size="34" type="text" value="{{ old('main_email') }}" title="Email">
                        </div>
                        <div class="col-4 mb-10">
                            <label class="align-right d-block">Alt Email:</label>
                        </div>
                        <div class="col-8 mb-10 pl-0">
                            <input name="alt_email" size="34" type="text" value="{{ old('alt_email') }}" title="Alt Email ">
                        </div>
                        <div class="col-4 mb-10">
                            <label class="align-right d-block">Phone:</label>
                        </div>
                        <div class="col-8 mb-10 pl-0">
                            <input name="phone" size="25" type="text" value="{{ old('phone') }}" title="Phone">
                        </div>
                        <div class="col-4 mb-10">
                            <label class="align-right d-block">Fax:</label>
                        </div>
                        <div class="col-8 mb-10 pl-0">
                            <input name="fax" size="25" type="text" value="{{ old('fax') }}" title="Fax ">
                        </div>
                        <div class="col-4 mb-10">
                            <label class="align-right d-block">Cell Phone:</label>
                        </div>
                        <div class="col-8 mb-10 pl-0">
                            <input name="cell_phone" size="25" type="text" value="{{ old('cell_phone') }}" title="Cell Phone">
                        </div>
                        <div class="col-4 mb-10">
                            <label class="align-right d-block">Contact Notes:</label>
                        </div>
                        <div class="col-8 mb-10 pl-0">
                            <textarea name="contact_notes" rows="4" cols="50">{{ old('contact_notes') }}</textarea>
                        </div>
                    </div>
                </fieldset>
                <fieldset class="round_box_3px">
                    <legend>Address</legend>
                    <div class="row">
                        <div class="col-4 mb-10">
                            <label class="align-right d-block">Street Addr:</label>
                        </div>
                        <div class="col-8 mb-10 pl-0">
                            <input name="street_addr" size="34" type="text" value="{{ old('street_addr') }}" title="Street Addr">
                        </div>
                        <div class="col-4 mb-10">
                            <label class="align-right d-block">City:</label>
                        </div>
                        <div class="col-8 mb-10 pl-0">
                            <input name="city" size="34" type="text" value="{{ old('city') }}" title="City">
                        </div>
                        <div class="col-4 mb-10">
                            <label class="align-right d-block">Postal Code:</label>
                        </div>
                        <div class="col-8 mb-10 pl-0">
                            <input name="postal_code" size="34" type="text" value="{{ old('postal_code') }}" title="Postal Code">
                        </div>
                        <div class="col-4 mb-10">
                            <label class="align-right d-block">Province:</label>
                        </div>
                        <div class="col-8 mb-10 pl-0">
                            <select name="province">
                                <option>----</option>
                                <option value="1" {{ old('province') == '1' ? 'selected' : '' }}>Alberta</option>
                                <option value="2" {{ old('province') == '2' ? 'selected' : '' }}>British Columbia</option>
                                <option value="3" {{ old('province') == '3' ? 'selected' : '' }}>Manitoba</option>
                                <option value="4" {{ old('province') == '4' ? 'selected' : '' }}>New Brunswick</option>
                                <option value="5" {{ old('province') == '5' ? 'selected' : '' }}>Newfoundland</option>
                                <option value="6" {{ old('province') == '6' ? 'selected' : '' }}>Northwest Territories</option>
                                <option value="7" {{ old('province') == '7' ? 'selected' : '' }}>Nova Scotia</option>
                                <option value="8" {{ old('province') == '8' ? 'selected' : '' }}>Nunavut</option>
                                <option value="9" {{ old('province') == '9' ? 'selected' : '' }}>Ontario</option>
                                <option value="10" {{ old('province') == '10' ? 'selected' : '' }}>Prince Edward Island</option>
                                <option value="11" {{ old('province') == '11' ? 'selected' : '' }}>Quebec</option>
                                <option value="12" {{ old('province') == '12' ? 'selected' : '' }}>Saskatchewan</option>
                            </select>
                        </div>
                        <div class="col-4 mb-10">
                            <label class="align-right d-block">Country:</label>
                        </div>
                        <div class="col-8 mb-10 pl-0">
                            <select name="country">
                                <option>----</option>
                                <option value="CA" {{ old('country') == 'CA' ? 'selected' : '' }}>Canada</option>
                                <option value="US" {{ old('country') == 'US' ? 'selected' : '' }}>United States</option>
                                <option value="AF" {{ old('country') == 'AF' ? 'selected' : '' }}>Afghanistan</option>
                                <option value="AL" {{ old('country') == 'AL' ? 'selected' : '' }}>Albania</option>
                                <option value="DZ" {{ old('country') == 'DZ' ? 'selected' : '' }}>Algeria</option>
                                <option value="AS" {{ old('country') == 'AS' ? 'selected' : '' }}>American Samoa</option>
                                <option value="AD" {{ old('country') == 'AD' ? 'selected' : '' }}>Andorra</option>
                                <option value="AO" {{ old('country') == 'AO' ? 'selected' : '' }}>Angola</option>
                                <option value="AI" {{ old('country') == 'AI' ? 'selected' : '' }}>Anguilla</option>
                                <option value="AQ" {{ old('country') == 'AQ' ? 'selected' : '' }}>Antarctica</option>
                                <option value="AG" {{ old('country') == 'AG' ? 'selected' : '' }}>Antigua &amp; Barbuda</option>
                                <option value="AR" {{ old('country') == 'AR' ? 'selected' : '' }}>Argentina</option>
                                <option value="AM" {{ old('country') == 'AM' ? 'selected' : '' }}>Armenia</option>
                            </select>
                        </div>
                    </div>
                </fieldset>
                <div class="line_break"></div>
                <button type="submit" class="button font-bold radius-0">Save</button>
            </form>
        </span>
    </div>
</div>
{{-- edit contact model --}}
<div class="ui-dialog ui-widget1 ui-widget-content ui-corner-all ui-front ui-draggable ui-resizable ajax_obj create-popup-form ui-draggable-contact-edit d-none" tabindex="-1" style="top: 166px" role="dialog" aria-describedby="ajax_obj" aria-labelledby="ui-id-15">
    <div class="ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix">
        <span id="ui-id-15" class="ui-dialog-title">Edit Contact</span>
        <button class="ui-button ui-widget1 ui-state-default ui-corner-all ui-button-icon-only ui-dialog-titlebar-close" role="button" aria-disabled="false" title="close">
            <span class="ui-button-icon-primary ui-icon ui-icon-closethick closethick-contact-edit"></span>
            <span class="ui-button-text">close</span>
        </button>
    </div>
    <div id="ajax_obj" class="ui-dialog-content ui-widget-content create-form-content">
        <span id="event_new" class="xmlb_form">
            <form id="edit_customer_contact_form" action="{{ route('admin.customer.contact.store') }}" method="POST">
                @csrf
                <input type="hidden" name="customerId" value="{{$customer->id??0}}">
                <input type="hidden" name="contact_id" value="">
                <h2>Edit Contact</h2>
                <fieldset class="round_box_3px">
                    <legend>Main Info</legend>
                    <div class="row">
                        <div class="col-4 mb-10">
                            <label class="align-right d-block">Relation:</label>
                        </div>
                        <div class="col-8 mb-10 pl-0">
                            <select id="customer_add_contact_relation" name="relation">
                                <option value="">----</option>
                                <option value="1" {{ old('relation') == '1' ? 'selected' : '' }}>Single Person</option>
                                <option value="2" {{ old('relation') == '2' ? 'selected' : '' }}>Bride</option>
                                <option value="3" {{ old('relation') == '3' ? 'selected' : '' }}>Groom</option>
                                <option value="4" {{ old('relation') == '4' ? 'selected' : '' }}>Wife</option>
                                <option value="5" {{ old('relation') == '5' ? 'selected' : '' }}>Husband</option>
                                <option value="6" {{ old('relation') == '6' ? 'selected' : '' }}>Child</option>
                                <option value="99" {{ old('relation') == '99' ? 'selected' : '' }}>Other</option>
                            </select>
                            <span class="mand_sign">*</span>
                        </div>
                        <div class="col-4 mb-10">
                            <label class="align-right d-block">Title:</label>
                        </div>
                        <div class="col-8 mb-10 pl-0">
                            <select id="customer_add_contact_mr_mrs" name="mr_mrs">
                                <option value="">----</option>
                                <option value="Mr." {{ old('mr_mrs') == 'Mr.' ? 'selected' : '' }}>Mr.</option>
                                <option value="Mrs." {{ old('mr_mrs') == 'Mrs.' ? 'selected' : '' }}>Mrs.</option>
                                <option value="Mis." {{ old('mr_mrs') == 'Mis.' ? 'selected' : '' }}>Mis.</option>
                                <option value="Dr." {{ old('mr_mrs') == 'Dr.' ? 'selected' : '' }}>Dr.</option>
                            </select>
                        </div>
                        <div class="col-4 mb-10">
                            <label class="align-right d-block">First Name:</label>
                        </div>
                        <div class="col-8 mb-10 pl-0">
                            <input name="first_name" size="34" value="{{old('first_name')}}" type="text" title="First Name">
                            <span class="mand_sign">*</span>
                        </div>
                        <div class="col-4 mb-10">
                            <label class="align-right d-block">Last Name:</label>
                        </div>
                        <div class="col-8 mb-10 pl-0">
                            <input name="last_name" size="34" type="text" value="{{old('last_name')}}" title="Last Name">
                            <span class="mand_sign">*</span>
                        </div>
                        <div class="col-4 mb-10">
                            <label class="align-right d-block">Main Email:</label>
                        </div>
                        <div class="col-8 mb-10 pl-0">
                            <input name="main_email" size="34" type="text" value="{{old('main_email')}}" title="Email">
                        </div>
                        <div class="col-4 mb-10">
                            <label class="align-right d-block">Alt Email:</label>
                        </div>
                        <div class="col-8 mb-10 pl-0">
                            <input name="alt_email" size="34" type="text" value="{{old('alt_email')}}" title="Alt Email ">
                        </div>
                        <div class="col-4 mb-10">
                            <label class="align-right d-block">Phone:</label>
                        </div>
                        <div class="col-8 mb-10 pl-0">
                            <input name="phone" size="25" type="text" value="{{old('phone')}}" title="Phone">
                        </div>
                        <div class="col-4 mb-10">
                            <label class="align-right d-block">Fax:</label>
                        </div>
                        <div class="col-8 mb-10 pl-0">
                            <input name="fax" size="25" type="text" value="{{old('fax')}}" title="Fax ">
                        </div>
                        <div class="col-4 mb-10">
                            <label class="align-right d-block">Cell Phone:</label>
                        </div>
                        <div class="col-8 mb-10 pl-0">
                            <input name="cell_phone" size="25" type="text" value="{{old('cell_phone')}}" title="Cell Phone">
                        </div>
                        <div class="col-4 mb-10">
                            <label class="align-right d-block">Contact Notes:</label>
                        </div>
                        <div class="col-8 mb-10 pl-0">
                            <textarea name="notes" rows="4" cols="50"></textarea>
                        </div>
                        <div class="col-4 mb-10">
                            <label class="align-right d-block">Allow Email::</label>
                        </div>
                        <div class="col-8 mb-10 pl-0">
                            <select name="allow_email">
                                <option value="1" {{ old('allow_email') == '1' ? 'selected' : '' }}>Yes</option>
                                <option value="0" {{ old('allow_email') == '0' ? 'selected' : '' }}>No</option>
                            </select>
                        </div>
                    </div>
                </fieldset>
                <fieldset class="round_box_3px">
                    <legend>Address</legend>
                    <div class="row">
                        <div class="col-4 mb-10">
                            <label class="align-right d-block">Street Addr:</label>
                        </div>
                        <div class="col-8 mb-10 pl-0">
                            <input name="street_addr" size="34" value="{{old('street_addr')}}" type="text" title="Street Addr">
                        </div>
                        <div class="col-4 mb-10">
                            <label class="align-right d-block">City:</label>
                        </div>
                        <div class="col-8 mb-10 pl-0">
                            <input name="city" size="34" type="text" value="{{old('city')}}" title="City">
                        </div>
                        <div class="col-4 mb-10">
                            <label class="align-right d-block">Postal Code:</label>
                        </div>
                        <div class="col-8 mb-10 pl-0">
                            <input name="postal_code" size="34" type="text" value="{{old('postal_code')}}" title="Postal Code">
                        </div>
                        <div class="col-4 mb-10">
                            <label class="align-right d-block">Province:</label>
                        </div>
                        <div class="col-8 mb-10 pl-0">
                            <select name="province">
                                <option value="1" {{ old('province') == '1' ? 'selected' : '' }}>Alberta</option>
                                <option value="2" {{ old('province') == '2' ? 'selected' : '' }}>British Columbia</option>
                                <option value="3" {{ old('province') == '3' ? 'selected' : '' }}>Manitoba</option>
                                <option value="4" {{ old('province') == '4' ? 'selected' : '' }}>New Brunswick</option>
                                <option value="5" {{ old('province') == '5' ? 'selected' : '' }}>Newfoundland</option>
                                <option value="6" {{ old('province') == '6' ? 'selected' : '' }}>Northwest Territorie</option>
                                <option value="7" {{ old('province') == '7' ? 'selected' : '' }}>Nova Scotia</option>
                                <option value="8" {{ old('province') == '8' ? 'selected' : '' }}>Nunavut</option>
                                <option value="9" {{ old('province') == '9' ? 'selected' : '' }}>Ontario</option>
                                <option value="10" {{ old('province') == '10' ? 'selected' : '' }}>Prince Edward Island</option>
                                <option value="11" {{ old('province') == '11' ? 'selected' : '' }}>Quebec</option>
                                <option value="12" {{ old('province') == '12' ? 'selected' : '' }}>Saskatchewan</option>
                                <option value="13" {{ old('province') == '13' ? 'selected' : '' }}>Yukon</option>
                            </select>
                        </div>
                        <div class="col-4 mb-10">
                            <label class="align-right d-block">Country:</label>
                        </div>
                        <div class="col-8 mb-10 pl-0">
                            <select name="country">
                                <option value="----">----</option>
                                <option value="CA" {{ old('country') == 'CA' ? 'selected' : '' }}>Canada</option>
                                <option value="US" {{ old('country') == 'US' ? 'selected' : '' }}>United States</option>
                                <option value="AF" {{ old('country') == 'AF' ? 'selected' : '' }}>Afghanistan</option>
                                <option value="AL" {{ old('country') == 'AL' ? 'selected' : '' }}>Albania</option>
                                <option value="DZ" {{ old('country') == 'DZ' ? 'selected' : '' }}>Algeria</option>
                                <option value="AS" {{ old('country') == 'AS' ? 'selected' : '' }}>American Samoa</option>
                                <option value="AD" {{ old('country') == 'AD' ? 'selected' : '' }}>Andorra</option>
                                <option value="AO" {{ old('country') == 'AO' ? 'selected' : '' }}>Angola</option>
                                <option value="AI" {{ old('country') == 'AI' ? 'selected' : '' }}>Anguilla</option>
                                <option value="AQ" {{ old('country') == 'AQ' ? 'selected' : '' }}>Antarctica</option>
                                <option value="AG" {{ old('country') == 'AG' ? 'selected' : '' }}>Antigua &amp; Barbuda</option>
                                <option value="AR" {{ old('country') == 'AR' ? 'selected' : '' }}>Argentina</option>
                                <option value="AM" {{ old('country') == 'AM' ? 'selected' : '' }}>Armenia</option>
                            </select>
                        </div>
                    </div>
                </fieldset>
                <div class="line_break"></div>
                <button type="submit" class="button font-bold radius-0">Save</button>
                <button type="button" class="button font-bold radius-0">Convert to Event Planner >></button>
            </form>
        </span>
    </div>
</div>
{{-- Create login account for customer --}}
<div class="ui-dialog ui-widget1 ui-widget-content ui-corner-all ui-front ui-draggable ui-resizable ajax_obj create-popup-form ui-draggable-create-login d-none" tabindex="-1" style="top: 166px" role="dialog" aria-describedby="ajax_obj" aria-labelledby="ui-id-15">
    <div class="ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix">
        <span id="ui-id-15" class="ui-dialog-title">Create Login Account for Customer</span>
        <button class="ui-button ui-widget1 ui-state-default ui-corner-all ui-button-icon-only ui-dialog-titlebar-close" role="button" aria-disabled="false" title="close">
            <span class="ui-button-icon-primary ui-icon ui-icon-closethick closethick-login"></span>
            <span class="ui-button-text">close</span>
        </button>
    </div>
    <div id="ajax_obj" class="ui-dialog-content ui-widget-content create-form-content">
        <span id="event_new" class="xmlb_form">
            <form action="{{route('admin.login.post')}}" id="login_store" method="POST">
                @csrf
                <h2>Create login account for {{$customer->customer_name}}</h2>
                <div class="line_break"></div>
                <div class="row">
                    <div class="col-4 mb-10">
                        <label>First Name:</label>
                    </div>
                    <div class="col-8 mb-10 pl-0">
                        <input name="first_name" size="20" maxlength="60" value="" type="text" title="First Name">
                        <span class="mand_sign">*</span>
                    </div>
                    <div class="col-4 mb-10">
                        <label>Last Name:</label>
                    </div>
                    <div class="col-8 mb-10 pl-0">
                        <input name="last_name" size="20" maxlength="60" value="" type="text" title="Last Name">
                        <span class="mand_sign">*</span>
                    </div>
                    <div class="col-4 mb-10">
                        <label>Email Address:</label>
                    </div>
                    <div class="col-8 mb-10 pl-0">
                        <input name="email" size="30" maxlength="60" value="" type="text" title="Email Address">
                    </div>
                    <div class="col-4 mb-10">
                        <label>Suggested Password:</label>
                    </div>
                    <div class="col-8 mb-10 pl-0">
                        <input name="password" size="15" maxlength="60" value="{{ Illuminate\Support\Str::random(5) }}" type="text" title="password">
                    </div>
                </div>
                <div class="line_break"></div>
                <button type="submit" class="button font-bold radius-0">Continue</button>
            </form>
        </span>
    </div>
</div>
{{-- methods of pay form --}}
<div class="ui-dialog ui-widget1 ui-widget-content ui-corner-all ui-front ui-draggable ui-resizable ajax_obj create-popup-form ui-draggable-methods-pay d-none" tabindex="-1" style="top: 166px" role="dialog" aria-describedby="ajax_obj" aria-labelledby="ui-id-15">
    <div class="ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix">
        <span id="ui-id-15" class="ui-dialog-title">Add/Edit Stored Method of Payment</span>
        <button class="ui-button ui-widget1 ui-state-default ui-corner-all ui-button-icon-only ui-dialog-titlebar-close" role="button" aria-disabled="false" title="close">
            <span class="ui-button-icon-primary ui-icon ui-icon-closethick closethick-methods-pay"></span>
            <span class="ui-button-text">close</span>
        </button>
    </div>
    <div id="ajax_obj" class="ui-dialog-content ui-widget-content create-form-content">
        <span id="event_new" class="xmlb_form">
            <form action="{{route('admin.payment.method.store')}}" id="payment_method_store" method="POST">
                @csrf
                <input type="hidden" name="customer_id" value="{{$customer->id??''}}">
                <h2>Add Method of Payment</h2>
                <div class="line_break"></div>
                <div class="row">
                    <div class="col-4 mb-10">
                        <label class="align-right d-block">Type:</label>
                    </div>
                    <div class="col-8 mb-10 pl-0">
                        <input type="radio" id="html" name="card_method_type" value="1">
                        <span value="1">Visa</span>
                        <input type="radio" id="html" name="card_method_type" value="2">
                        <span value="2">Master Card</span>
                    </div>
                    <div class="col-4 mb-10">
                        <label class="align-right d-block">Name on Card:</label>
                    </div>
                    <div class="col-8 mb-10 pl-0">
                        <input name="card_name" size="45" maxlength="60" value="{{$customer->customer_name??''}}" type="text" title="Name on Card">
                    </div>
                    <div class="col-4 mb-10">
                        <label class="align-right d-block">Card Number:</label>
                    </div>
                    <div class="col-8 mb-10 pl-0">
                        <input name="card_number" size="34" type="text" title="Card Number">
                    </div>
                    <div class="col-4 mb-10">
                        <label class="align-right d-block">Expiry:</label>
                    </div>
                    <div class="col-8 mb-10 pl-0">
                        <select class="card_expiry_month" name="card_expiry_month">
                            <option value="01">January</option>
                            <option value="02">February</option>
                            <option value="03">March</option>
                            <option value="04">April</option>
                            <option value="05">May</option>
                            <option value="06">June</option>
                            <option value="07">July</option>
                            <option value="08">August</option>
                            <option value="09">September</option>
                            <option value="10">October</option>
                            <option value="11">November</option>
                            <option value="12">December</option>
                        </select>
                        <select class="card_expiry_year" name="card_expiry_year">
                            <option value="2023">2023</option>
                            <option value="2024">2024</option>
                            <option value="2025">2025</option>
                            <option value="2026">2026</option>
                            <option value="2027">2027</option>
                            <option value="2028">2028</option>
                            <option value="2029">2029</option>
                            <option value="2030">2030</option>
                            <option value="2031">2031</option>
                            <option value="2032">2032</option>
                        </select>
                    </div>
                    <div class="col-4 mb-10">
                        <label class="align-right d-block">CVD:</label>
                    </div>
                    <div class="col-8 mb-10 pl-0">
                        <input name="card_cvd" size="20" type="text" title="CVD ">
                    </div>
                </div>
                <div class="line_break"></div>
                <button type="submit" class="button font-bold radius-0">Continue</button>
                <button type="submit" class="button font-bold radius-0">Save Only</button>
            </form>
        </span>
    </div>
</div>
{{-- add branch form --}}
<div class="ui-dialog ui-widget1 ui-widget-content ui-corner-all ui-front ui-draggable ui-resizable ajax_obj create-popup-form ui-draggable-add-branch d-none" tabindex="-1" style="top: 166px" role="dialog" aria-describedby="ajax_obj" aria-labelledby="ui-id-15">
    <div class="ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix">
        <span id="ui-id-15" class="ui-dialog-title">Add Branch</span>
        <button class="ui-button ui-widget1 ui-state-default ui-corner-all ui-button-icon-only ui-dialog-titlebar-close" role="button" aria-disabled="false" title="close">
            <span class="ui-button-icon-primary ui-icon ui-icon-closethick closethick-add-branch"></span>
            <span class="ui-button-text">close</span>
        </button>
    </div>
    <div id="ajax_obj" class="ui-dialog-content ui-widget-content create-form-content">
        <span id="event_new" class="xmlb_form">
            <form action="{{route('admin.customer.branch.store')}}" id="create_branch" method="POST">
                @csrf
                <input type="hidden" name="customer_id" value="{{$customer->id??''}}">
                <div class="row">
                    <div class="col-4 mb-10">
                        <label class="align-right d-block">Branch Name:</label>
                    </div>
                    <div class="col-8 mb-10 pl-0">
                        <input name="branch_name" size="40" type="text" value="{{old('branch_name')}}" title="Name of this branch or loaction">
                        <span class="mand_sign">*</span>
                    </div>
                    <div class="col-4 mb-10">
                        <label class="align-right d-block">No Of Emps:</label>
                    </div>
                    <div class="col-8 mb-10 pl-0">
                        <select name="no_of_emps">
                            <option value="1" {{ old('no_of_emps') == '1' ? 'selected' : '' }}>1 to 10</option>
                            <option value="2" {{ old('no_of_emps') == '' ? 'selected' : '' }}>11 to 50</option>
                            <option value="3" {{ old('no_of_emps') == '3' ? 'selected' : '' }}>51 to 100</option>
                            <option value="4" {{ old('no_of_emps') == '4' ? 'selected' : '' }}>101 to 500</option>
                            <option value="5" {{ old('no_of_emps') == '5' ? 'selected' : '' }}>501 to 5,000</option>
                            <option value="6" {{ old('no_of_emps') == '6' ? 'selected' : '' }}>More than 5,000</option>
                        </select>
                    </div>
                    <div class="col-4 mb-10">
                        <label class="align-right d-block">Street Addr:</label>
                    </div>
                    <div class="col-8 mb-10 pl-0">
                        <input name="street_addr" size="45" value="{{old('street_addr')}}" type="text" title="Street address or name">
                    </div>
                    <div class="col-4 mb-10">
                        <label class="align-right d-block">City:</label>
                    </div>
                    <div class="col-8 mb-10 pl-0">
                        <input name="city" size="40" type="text" value="{{old('city')}}" title="City where this client company is">
                    </div>
                    <div class="col-4 mb-10">
                        <label class="align-right d-block">Postal Code:</label>
                    </div>
                    <div class="col-8 mb-10 pl-0">
                        <input name="postal_code" size="20" value="{{old('postal_code')}}" type="text" title="Postal Code ">
                    </div>
                    <div class="col-4 mb-10">
                        <label class="align-right d-block">Province:</label>
                    </div>
                    <div class="col-8 mb-10 pl-0">
                        <input name="province" size="40" value="{{old('province')}}" type="text" title="Province or State where this client company is ">
                    </div>
                    <div class="col-4 mb-10">
                        <label class="align-right d-block">Country:</label>
                    </div>
                    <div class="col-8 mb-10 pl-0">
                        <input name="country" size="20" value="{{old('country')}}" type="text" title="Country where this client company is ">
                    </div>
                    <div class="col-4 mb-10">
                        <label class="align-right d-block">Phone:</label>
                    </div>
                    <div class="col-8 mb-10 pl-0">
                        <input name="phone" size="20" value="{{old('phone')}}" type="text" title="Client phone number">
                    </div>
                    <div class="col-4 mb-10">
                        <label class="align-right d-block">Fax:</label>
                    </div>
                    <div class="col-8 mb-10 pl-0">
                        <input name="fax" size="20" type="text" value="{{old('fax')}}" title="Client Fax">
                    </div>
                    <div class="col-4 mb-10">
                        <label class="align-right d-block">Web URL:</label>
                    </div>
                    <div class="col-8 mb-10 pl-0">
                        <input name="web_url" size="40" value="{{old('web_url')}}" type="text" title="Web site of this customer if any">
                    </div>
                    <div class="col-4 mb-10">
                        <label class="align-right d-block">Branch Notes:</label>
                    </div>
                    <div class="col-8 mb-10 pl-0">
                        <textarea name="branch_notes" cols="40" rows="6" title="Special notes on this branch if any" maxlength="4000">{{old('branch_notes')}}</textarea>
                    </div>
                </div>
                <div class="line_break"></div>
                <button type="submit" class="button font-bold radius-0">Save</button>
            </form>
        </span>
    </div>
</div>
{{-- add department form --}}
<div class="ui-dialog ui-widget1 ui-widget-content ui-corner-all ui-front ui-draggable ui-resizable ajax_obj create-popup-form ui-draggable-new-department d-none" tabindex="-1" style="top: 166px" role="dialog" aria-describedby="ajax_obj" aria-labelledby="ui-id-15">
    <div class="ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix">
        <span id="ui-id-15" class="ui-dialog-title">New Department</span>
        <button class="ui-button ui-widget1 ui-state-default ui-corner-all ui-button-icon-only ui-dialog-titlebar-close" role="button" aria-disabled="false" title="close">
            <span class="ui-button-icon-primary ui-icon ui-icon-closethick closethick-new-department"></span>
            <span class="ui-button-text">close</span>
        </button>
    </div>
    <div id="ajax_obj" class="ui-dialog-content ui-widget-content create-form-content">
        <span id="event_new" class="xmlb_form">
            <form action="{{route('admin.customer.department.store')}}" id="create_department" method="POST">
                @csrf
                <input type="hidden" name="customer_id" value="{{$customer->id??''}}">
                <div class="row">
                    <div class="col-4 mb-10">
                        <label class="align-right d-block">Branch:</label>
                    </div>
                    <div class="col-8 mb-10 pl-0">
                        <select name="branch_id">
                            <option value="----" selected="selected">----</option>
                            @if ($customerBranchs && $customerBranchs->count() > 0)
                            @foreach ($customerBranchs as $_customerBra)
                            <option value="{{$_customerBra->id}}">{{$_customerBra->branch_name}}</option>
                            @endforeach
                            @endif
                        </select>
                        <span class="mand_sign">*</span>
                    </div>
                    <div class="col-4 mb-10">
                        <label class="align-right d-block">Dept Name:</label>
                    </div>
                    <div class="col-8 mb-10 pl-0">
                        <input name="dept_name" size="40" type="text" title="Name of this department">
                        <span class="mand_sign">*</span>
                    </div>
                    <div class="col-4 mb-10">
                        <label class="align-right d-block">Phone:</label>
                    </div>
                    <div class="col-8 mb-10 pl-0">
                        <input name="phone" size="20" type="text" title="Client phone number">
                    </div>
                    <div class="col-4 mb-10">
                        <label class="align-right d-block">Fax:</label>
                    </div>
                    <div class="col-8 mb-10 pl-0">
                        <input name="fax" size="20" type="text" title="Client Fax">
                    </div>
                    <div class="col-4 mb-10">
                        <label class="align-right d-block">Notes:</label>
                    </div>
                    <div class="col-8 mb-10 pl-0">
                        <textarea name="notes" cols="40" rows="6" title="Special notes on this department if any" maxlength="4000"></textarea>
                    </div>
                </div>
                <div class="line_break"></div>
                <button type="submit" class="button font-bold radius-0">Save</button>
            </form>
        </span>
    </div>
</div>
{{-- edit branch form --}}
<div class="ui-dialog ui-widget1 ui-widget-content ui-corner-all ui-front ui-draggable ui-resizable ajax_obj create-popup-form ui-draggable-edit-branch d-none" tabindex="-1" style="top: 166px" role="dialog" aria-describedby="ajax_obj" aria-labelledby="ui-id-15">
    <div class="ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix">
        <span id="ui-id-15" class="ui-dialog-title">Edit Branch</span>
        <button class="ui-button ui-widget1 ui-state-default ui-corner-all ui-button-icon-only ui-dialog-titlebar-close" role="button" aria-disabled="false" title="close">
            <span class="ui-button-icon-primary ui-icon ui-icon-closethick closethick-edit-branch"></span>
            <span class="ui-button-text">close</span>
        </button>
    </div>
    <div id="ajax_obj" class="ui-dialog-content ui-widget-content create-form-content">
        <span id="event_new" class="xmlb_form">
            <form action="{{route('admin.customer.branch.update')}}" id="edit_branch" method="POST">
                @csrf
                <input type="hidden" name="branch_id" value="">
                <div class="row">
                    <div class="col-4 mb-10">
                        <label class="align-right d-block">Branch Name:</label>
                    </div>
                    <div class="col-8 mb-10 pl-0">
                        <input name="branch_name" size="40" type="text" value="{{old('branch_name')}}" title="Name of this branch or loaction">
                        <span class="mand_sign">*</span>
                    </div>
                    <div class="col-4 mb-10">
                        <label class="align-right d-block">No Of Emps:</label>
                    </div>
                    <div class="col-8 mb-10 pl-0">
                        <select name="no_of_emps">
                            <option value="----" selected="selected">----</option>
                            <option value="1" {{ old('no_of_emps') == '1' ? 'selected' : '' }}>1 to 10</option>
                            <option value="2" {{ old('no_of_emps') == '' ? 'selected' : '' }}>11 to 50</option>
                            <option value="3" {{ old('no_of_emps') == '3' ? 'selected' : '' }}>51 to 100</option>
                            <option value="4" {{ old('no_of_emps') == '4' ? 'selected' : '' }}>101 to 500</option>
                            <option value="5" {{ old('no_of_emps') == '5' ? 'selected' : '' }}>501 to 5,000</option>
                            <option value="6" {{ old('no_of_emps') == '6' ? 'selected' : '' }}>More than 5,000</option>
                        </select>
                    </div>
                    <div class="col-4 mb-10">
                        <label class="align-right d-block">Street Addr:</label>
                    </div>
                    <div class="col-8 mb-10 pl-0">
                        <input name="street_addr" size="45" value="{{old('street_addr')}}" type="text" title="Street address or name">
                    </div>
                    <div class="col-4 mb-10">
                        <label class="align-right d-block">City:</label>
                    </div>
                    <div class="col-8 mb-10 pl-0">
                        <input name="city" size="40" type="text" value="{{old('city')}}" title="City where this client company is">
                    </div>
                    <div class="col-4 mb-10">
                        <label class="align-right d-block">Postal Code:</label>
                    </div>
                    <div class="col-8 mb-10 pl-0">
                        <input name="postal_code" size="20" value="{{old('postal_code')}}" type="text" title="Postal Code ">
                    </div>
                    <div class="col-4 mb-10">
                        <label class="align-right d-block">Province:</label>
                    </div>
                    <div class="col-8 mb-10 pl-0">
                        <input name="province" size="40" value="{{old('province')}}" type="text" title="Province or State where this client company is ">
                    </div>
                    <div class="col-4 mb-10">
                        <label class="align-right d-block">Country:</label>
                    </div>
                    <div class="col-8 mb-10 pl-0">
                        <input name="country" size="20" value="{{old('country')}}" type="text" title="Country where this client company is ">
                    </div>
                    <div class="col-4 mb-10">
                        <label class="align-right d-block">Phone:</label>
                    </div>
                    <div class="col-8 mb-10 pl-0">
                        <input name="phone" size="20" value="{{old('phone')}}" type="text" title="Client phone number">
                    </div>
                    <div class="col-4 mb-10">
                        <label class="align-right d-block">Fax:</label>
                    </div>
                    <div class="col-8 mb-10 pl-0">
                        <input name="fax" size="20" type="text" value="{{old('fax')}}" title="Client Fax">
                    </div>
                    <div class="col-4 mb-10">
                        <label class="align-right d-block">Web URL:</label>
                    </div>
                    <div class="col-8 mb-10 pl-0">
                        <input name="web_url" size="40" value="{{old('web_url')}}" type="text" title="Web site of this customer if any">
                    </div>
                    <div class="col-4 mb-10">
                        <label class="align-right d-block">Branch Notes:</label>
                    </div>
                    <div class="col-8 mb-10 pl-0">
                        <textarea name="branch_notes" cols="40" rows="6" title="Special notes on this branch if any" maxlength="4000">{{old('branch_notes')}}</textarea>
                    </div>
                </div>
                <div class="line_break"></div>
                <button type="submit" class="button font-bold radius-0">Save</button>
            </form>
        </span>
    </div>
</div>
{{-- Redeem Customer Gift Certificate --}}
<div class="ui-dialog ui-widget1 ui-widget-content ui-corner-all ui-front ui-draggable ui-resizable ajax_obj create-popup-form ui_redeem_customer_gift d-none" tabindex="-1" style="width: 836px;left: 237.5px;" role="dialog" aria-describedby="ajax_obj" aria-labelledby="ui-id-15">
    <div class="ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix">
        <span id="ui-id-15" class="ui-dialog-title">Redeem Customer Gift Certificate</span>
        <button class="ui-button ui-widget1 ui-state-default ui-corner-all ui-button-icon-only ui-dialog-titlebar-close" role="button" aria-disabled="false" title="close">
            <span class="ui-button-icon-primary ui-icon ui-icon-closethick closethick-close"></span>
            <span class="ui-button-text">close</span>
        </button>
    </div>
    <div id="gc_tabs" class="tab_content ui-tabs ui-widget ui-widget-content ui-corner-all" style="min-height: 420px;">
        <h1>Customer: {{$customer->customer_name}}</h1>
        <ul class="ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all" role="tablist">
            <li class="ui-state-default ui-state-gc-tabs ui-corner-top ui-tabs-active ui-state-active" role="tab">
                <a href="#" class="ui-tabs-anchor" role="presentation" tabindex="-1" id="ui-id-1">Customer's ({{$inactiveGiftCertificates->count()??0}})</a>
            </li>
            <li class="ui-state-default ui-state-gc-tabs ui-corner-top" role="tab">
                <a href="#" class="ui-tabs-anchor" role="presentation" tabindex="-2" id="ui-id-2">All Gift Certificates</a>
            </li>
        </ul>
        <div class="ui-tabs-panel ui-tabs-panel-gc-tabs ui-widget-content ui-corner-bottom" id="gc_tabs-1" aria-labelledby="ui-id-1"
            role="tabpanel" aria-expanded="true" aria-hidden="false">
            <span id="esp_event_book_list2" class="xmlb_form m-6">
                <form method="post" id="frm_customer_gcs" action="{{ route('admin.GiftCertificate.store') }}" accept-charset="utf-8" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="customer_id" value="{{$customer->id}}">
                    <input type="hidden" id="customer_gcs_submit" name="gcs_id">
                    @if ($inactiveGiftCertificates->count() > 0)
                        <h2>Customer Gift Certificates ({{$inactiveGiftCertificates->count()??0}})</h2>
                        <div class="line_break"></div>
                        <div style="height: 360px; overflow: auto;">
                        @foreach ($inactiveGiftCertificates as $giftCert)
                            <input type="submit" value="Redeem" id="customer_gcs_misc" name="customer_gcs_misc" class="button font-bold radius-0"
                                onclick="if (confirm('Are you sure customer is redeeming Serial No: {{$giftCert->serial_no}}?')) {document.getElementById('customer_gcs_submit').value =  {{$giftCert->id}};} else return false ;">
                            <div class="left_col">
                                <label>GC #:</label> {{$giftCert->serial_no}}
                                <label style="margin-left: 6px;">Value:</label> ${{$giftCert->face_value}}
                                <label style="margin-left: 6px;">Purchased:</label> {{date('M d- Y', strtotime($giftCert->purchase_date))}} <strong>
                                    (@if ($giftCert->purchase_type == 1)
                                        {{'Purchased'}}
                                    @else
                                        {{'Complimentary'}}
                                        @if (isset($giftCert->lnk_marketing_campaign)) 
                                            <br><strong>Source:</strong> 
                                            {{ 
                                                $giftCert->lnk_marketing_campaign == 29 ? 'Holiday 2019 Gift-C25' :
                                                ($giftCert->lnk_marketing_campaign == 28 ? 'Holiday 2019 Gift-d' :
                                                ($giftCert->lnk_marketing_campaign == 27 ? 'Holiday 2019 Gift-e' : ''))
                                            }}
                                        @endif
                                    @endif)</strong>
                            </div>
                            <div class="right_col"><label>Notes:</label>{{$giftCert->special_notes}}</div>
                            <div class="h_sep"></div>
                        @endforeach
                        </div>
                    @else  
                        <h2>No active gift certificate purchased by this customer</h2>
                    @endif
                </form>
            </span>
        </div>
        <div id="gc_tabs-2" aria-labelledby="ui-id-2" class="ui-tabs-panel ui-tabs-panel-gc-tabs ui-widget-content ui-corner-bottom"
            style="display: none;" role="tabpanel" aria-expanded="false" aria-hidden="true">
            <span id="available_gift_certs" class="xmlb_form">
                
            </span>
            <div class="pagination-links pagination">
            </div>
        </div>
    </div>
</div>