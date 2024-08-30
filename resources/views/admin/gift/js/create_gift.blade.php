<script>
    function newCustomer(){
        var html = `<div class="page-content">
            <div class="page-title-bar d-flex">
                <h1 class="mr-10">Add a New Customer</h1>
                <div class="customer_type_select">
                    <button type="button" class="button checked" data-id="1">
                        <svg class="svg-inline--fa fa-check" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                            <path fill="currentColor" d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"></path>
                        </svg>
                        Personal</button>
                    <button type="button" class="button" data-id="2">
                        <svg class="svg-inline--fa fa-check" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                            <path fill="currentColor" d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"></path>
                        </svg>
                        Corporate</button>
                    <button type="button" class="button" data-id="3">
                        <svg class="svg-inline--fa fa-check" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                            <path fill="currentColor" d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"></path>
                        </svg>
                        Event Planner</button>
                </div>
            </div>
            <form action="{{ route('admin.customer.store') }}" method="post" id=customer_form>
                @csrf
                <input name="route" value="second" type="hidden">
                <div class="cus-row ">
                    <div class="col-6 main-order-item">
                        <div class="global-form main-form height-100">
                            <h2>Main</h2>
                            <hr>
                            <div class="cus-row">
                                <div class="col-4 mb-10">
                                    <label class="align-right">Title:</label>
                                </div>
                                <div class="col-8 mb-10 pl-0">
                                    <select class="mr_mrs" name="mr_mrs">
                                        <option value="">----</option>
                                        <option value="Mr." {{ old('mr_mrs') == 'Mr.' ? 'selected' : '' }}>Mr.</option>
                                        <option value="Mrs." {{ old('mr_mrs') == 'Mrs.' ? 'selected' : '' }}>Mrs.</option>
                                        <option value="Mis." {{ old('mr_mrs') == 'Mis.' ? 'selected' : '' }}>Mis.</option>
                                        <option value="Dr." {{ old('mr_mrs') == 'Dr.' ? 'selected' : '' }}>Dr.</option>
                                    </select>                            
                                </div>
                                <div class="col-4 mb-10">
                                    <label class="align-right">Relation:</label>
                                </div>
                                <div class="col-8 mb-10 pl-0">
                                    <select class="contact_relation" name="relation">
                                        <option value="1" {{ old('relation') == '1' ? 'selected' : '' }}>Single Person</option>
                                        <option value="2" {{ old('relation') == '2' ? 'selected' : '' }}>Bride</option>
                                        <option value="3" {{ old('relation') == '3' ? 'selected' : '' }}>Groom</option>
                                        <option value="4" {{ old('relation') == '4' ? 'selected' : '' }}>Wife</option>
                                        <option value="5" {{ old('relation') == '5' ? 'selected' : '' }}>Husband</option>
                                        <option value="6" {{ old('relation') == '6' ? 'selected' : '' }}>Child</option>
                                        <option value="99" {{ old('relation') == '99' ? 'selected' : '' }}>Others</option>
                                    </select>
                                    <br>
                                    @error('relation')
                                        <span class="text-danger" style="color: rgb(255, 0, 0)">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-4 mb-10">
                                    <label class="align-right">First Name:</label>
                                </div>
                                <div class="col-8 mb-10 pl-0">
                                    <input size="34" class="first_name" name="first_name" value="{{ old('first_name') }}" type="text"><br>
                                    @error('first_name')
                                        <span class="text-danger" style="color: rgb(255, 0, 0)">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-4 mb-10">
                                    <label class="align-right">Last Name:</label>
                                </div>
                                <div class="col-8 mb-10 pl-0">
                                    <input size="34" class="last_name" name="last_name" value="{{ old('last_name') }}" type="text"><br>
                                    @error('last_name')
                                        <span class="text-danger" style="color: rgb(255, 0, 0)">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-4 mb-10">
                                    <label class="align-right">Main Email:</label>
                                </div>
                                <div class="col-8 mb-10 pl-0">
                                    <input size="34" class="main_email" type="email" name="main_email" value="{{ old('main_email') }}">
                                    <button type="button" class="button add" data-id="1">
                                        <svg class="svg-inline--fa fa-plus" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="plus" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"></path></svg>
                                    </button><br>
                                    @error('main_email')
                                        <span class="text-danger" style="color: rgb(255, 0, 0)">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="alt_email row d-none">
                                    <div class="col-4 mb-10" style="float: left;">
                                        <label class="align-right">Alt Email:</label>
                                    </div>
                                    <div class="col-8 mb-10 pl-0" style="float:right;">
                                        <input size="34" class="alt_email" type="email" name="alt_email" value="{{ old('alt_email') }}">
                                    </div>
                                </div>

                                <div class="col-4 mb-10">
                                    <label class="align-right">Cell Phone:</label>
                                </div>
                                <div class="col-8 mb-10 pl-0">
                                    <input class="phone_cell" type="text" name="cell_phone" value="{{ old('cell_phone') }}">
                                    <button type="button" class="button add" data-id="2">
                                        <svg class="svg-inline--fa fa-plus" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="plus" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"></path></svg>
                                    </button><br>
                                    @error('cell_phone')
                                        <span class="text-danger" style="color: rgb(255, 0, 0)">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="alt_phone row d-none">
                                    <div class="col-4 mb-10" style="float: left;">
                                        <label class="align-right">Alt Phone:</label>
                                    </div>
                                    <div class="col-8 mb-10 pl-0">
                                        <input class="phone cell" type="text" name="alt_phone" value="{{ old('alt_phone') }}">
                                    </div>
                                </div>
                                <div class="col-4 mb-10">
                                    <label class="align-right">Ad Campaign:</label>
                                </div>
                                <div class="col-8 mb-10 pl-0">
                                    <select class="customer_ad_campaign" name="ad_campaign">
                                        <option >----</option>
                                        @foreach ($marketingCamps as $_marketingCamp)
                                            <option value="{{$_marketingCamp->id}}">{{$_marketingCamp->campaign_name}}</option>
                                        @endforeach
                                    </select><br>
                                    @error('ad_campaign')
                                        <span class="text-danger" style="color: rgb(255, 0, 0)">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-4 mb-10">
                                    <label class="align-right">Street Addr:</label>
                                </div>
                                <div class="col-8 mb-10 pl-0">
                                    <input size="34" class="street_addr" type="text" name="street_addr" value="{{ old('street_addr') }}">
                                </div>
                                <div class="col-4 mb-10">
                                    <label class="align-right">City:</label>
                                </div>
                                <div class="col-2 mb-10 p-0">
                                    <input class="city w-100" type="text" name="city" value="{{ old('city') }}">
                                </div>
                                <div class="col-2 mb-10 p-0">
                                    <label class="align-right">Postal Code:</label>
                                </div>
                                <div class="col-3 mb-10">
                                    <input class="postal_code w-100" type="text" name="postal_code" value="{{ old('postal_code') }}">
                                </div>
                                <div class="col-4 mb-10">
                                    <label class="align-right">Country:</label>
                                </div>
                                <div class="col-3 mb-10 pl-0">
                                    <select class="country w-100" name="country">
                                        <option value="">----</option>
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
                                <div class="col-2 mb-10 pr-0">
                                    <label class="align-right">Province:</label>
                                </div>
                                <div class="col-3 mb-10">
                                    <select class="province w-100" name="province">
                                        <option >----</option>
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
                                    <label class="align-right">Contact Notes:</label>
                                </div>
                                <div class="col-8 mb-10 pl-0">
                                    <textarea class="contact_notes" rows="3" cols="50" name="contact_notes">{{ old('contact_notes') }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 corporate_info">
                        <div class="global-form corporate-form height-100 d-none">
                            <h2>Corporate Info.</h2>
                            <hr>
                            <div class="cus-row">
                                <div class="col-4 mb-10">
                                    <label class="align-right">Customer Name:</label>
                                </div>
                                <div class="col-8 mb-10 pl-0">
                                    <input size="34" class="customer_name" name="customer_name" value="{{ old('customer_name') }}"><br>
                                    @error('customer_name')
                                        <span class="text-danger" style="color: rgb(255, 0, 0)">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-4 mb-10">
                                    <label class="align-right">General Email:</label>
                                </div>
                                <div class="col-8 mb-10 pl-0">
                                    <input type="email" size="34" name="general_email" value="{{ old('general_email') }}">
                                </div>
                                <div class="col-4 mb-10">
                                    <label class="align-right">Num. Employees:</label>
                                </div>
                                <div class="col-8 mb-10 pl-0">
                                    <select class="customer_num_emps" name="no_of_emps">
                                        <option value="">----</option>
                                        <option value="1" {{ old('employee_count') == '1' ? 'selected' : '' }}>1 to 10</option>
                                        <option value="2" {{ old('employee_count') == '2' ? 'selected' : '' }}>11 to 50</option>
                                        <option value="3" {{ old('employee_count') == '3' ? 'selected' : '' }}>51 to 100</option>
                                        <option value="4" {{ old('employee_count') == '4' ? 'selected' : '' }}>101 to 500</option>
                                        <option value="5" {{ old('employee_count') == '5' ? 'selected' : '' }}>501 to 5,000</option>
                                        <option value="6" {{ old('employee_count') == '6' ? 'selected' : '' }}>More than 5,000</option>
                                    </select>
                                </div>
                                <div class="col-4 mb-10">
                                    <label class="align-right">Web:</label>
                                </div>
                                <div class="col-8 mb-10 pl-0">
                                    <input size="34" class="customer_web" type="text" name="web_url" value="{{ old('web_url') }}">
                                </div>
                                <div class="col-4 mb-10">
                                    <label class="align-right">Special Notes:</label>
                                </div>
                                <div class="col-8 mb-10 pl-0">
                                    <textarea class="customer_notes" rows="3" cols="50" name="special_notes">{{ old('special_notes') }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="new_customer_dups d-none"></div>
                    
                </div>
                <div class="form_footer mt-20">
                    <button class="button submit-form font-bold radius-0" type="submit">Save</button>
                </div>
            </form>
        </div>`;
        $('.new_customer_wrap').html(html);
        initializeValidation();
    }
    var validator;
    function initializeValidation() {
        validator = $('#customer_form').validate({
            rules: {
                'first_name': 'required',
                'last_name': 'required',
                'relation': 'required',
                'main_email': 'required',
                'cell_phone': 'required',
                'ad_campaign': 'number',
                'postal_code': {
                    maxlength: 10
                }
            },
            messages: {
                'first_name': 'First Name is required',
                'last_name': 'Last Name is required',
                'relation': 'The relation must be a number.',
                'main_email': 'The main email field is required.',
                'cell_phone': 'Cell Phone is required',
                'ad_campaign': 'The ad campaign must be a number.',
                'postal_code': 'Postal Code should not exceed 10 characters.',
            }
        });
    }
     function displayCustomers(customers, currentPage) {
        var i = currentPage*10-9;
        var html = `
        <span id="event_new" class="xmlb_form">
            <div class="page-content-item">
                
                <div class="customers_wrap">
                    <form action="#" id="customer_filter" method="get">
                        <div class="form_filters">
                            <label>Name:</label> 
                            <input name="flt_by_text" id="flt_by_text" type="text" value="" maxlength="90" size="25" title="Name of this customer. If this is a corporate customer, then this is the business name. If personal it is the concat of first name and last name or say The Smiths Family.">
                            <label>Customer Type:</label> 
                            <select name="customer_type" id="customer_type">
                                <option value="" selected="selected">--All--</option>
                                <option value="1">Personal</option>
                                <option value="2">Corporate</option>
                                <option value="3">Event Planner</option>
                            </select>
                            <button type="button" id="clear_filters" class="button font-bold radius-0">Clear</button>
                            
                            <span class="btn_add_new_customer small_button button font-bold radius-0">New Customer</span>
                        </div>
                    </form>
                    <div class="line_break"></div>
                    <div class="line_break"></div>
                    <p align="right" class="record-info">Records: 1 to 10 of 52,636</p>
                </div>
                <div id="customers" class="round_box_6px">`;
                customers.forEach(function(customer, index) {
                html +=`<div class="customer_row" customer_id="${customer.id}">
                        <span class="cust_name">
                            <label>Customer:</label> 
                            ${customer.customer_name}`;
                            if (customer.customer_type == 2) {
                                html += '(Corporate)';
                            } else if (customer.customer_type == 3) {
                                html += '(Event Planner)';
                            }else{
                                html += '(Personal)';
                            }
                html += `</span>
                        <span>
                            <label>Events Booked:</label>`;
                            if (customer.events.length > 0) {
                                var count = customer.events.filter(event => event.event_status === 1).length;
                            } else {
                                count = 0;
                            }
                            if (count != 0) {
                                html += `${count}`;
                            } else {
                                html += `${count}`;
                            }
                html += `</span>
                        <span>
                            <label>Tentative:</label>`;
                            if (customer.events.length > 0) {
                                var count = customer.events.filter(event => event.event_status === 1).length;
                            } else {
                                count = 0;
                            }

                            if (count != 0) {
                                html += `${count}`;
                            } else {
                                html += `${count}`;
                            }
                html += ` </span>
                        <div class="line_break"></div></div>`;
                        if (customer.contacts.length > 0) {
                        $.each(customer.contacts, function(index, contact) {
                            html += `
                            <div class="contact_row" customer_id="${customer.id}">
                                <button type="button" title="Book this customer" class="button font-bold radius-0 add_booking_customer" customer_id="${customer.id}" cu_contact_id="${contact.id}" customer_name="${customer.customer_name}">Add Booking</button>
                                <span class="contact_name">${contact.last_name}, ${contact.first_name}</span>`;
                                if (contact.cell_phone != null) {
                        html += `<span class="contact_phone">
                                    <label>Phone:</label>${contact.cell_phone}
                                </span>`;
                                } else {
                        html += `<span class="contact_phone">
                                    <label>Phone:</label>${contact.phone}
                                </span>`;
                                }
                        html += `<span class="email">
                                    <label>Email:</label>${contact.main_email}
                                </span>
                                <div class="line_break"></div>
                            </div><div class="h_sep"></div>`;
                        });
                        }
                });
                html +=`</div>
            </div>
        </span>`;
        $('.customer-list').html(html);
    }

    function displayPagination(response) {
        var paginationLinks = $('#pagination-links');
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
            paginationLinks.append('<a href="#" onclick="fetchPage(\'' + prevPageUrl + '\')">Previous</a>');
        }

        for (var i = 1; i <= lastPage; i++) {
            if (i === currentPage) {
                paginationLinks.append('<span>' + i + '</span>');
            } else {
                paginationLinks.append('<a href="#" onclick="fetchPage(\'' + curantUrl + '?page='+i+'\')">' + i + '</a>');
            }
        }
        if (nextPageUrl !== null) {
            paginationLinks.append('<a href="#" onclick="fetchPage(\'' + nextPageUrl + '\')">Next</a>');
        }
    }
    window.fetchPage = function(url) {
        $.ajax({
            url: url,
            type: 'GET',
            success: function(response) {
                var currentPage = response.current_page;
                displayCustomers(response.data, currentPage);
                displayPagination(response);
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    };

    $('.sell_gift_certificate').click(function() {
        $.ajax({
            url: "{{ route('admin.event.select-customer') }}",
            type: 'GET',
            success: function(response) {
                var currentPage = response.current_page;
                displayCustomers(response.data, currentPage);
                displayPagination(response);
                $('.ui-draggable-sell-new-gift-certificate').show();
                $('.ui-widget-overlay').css('display', 'block');
                
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });            
    });
    $(document).delegate('#customer_filter','change keyup', function () {
        // var inputId = $(this).attr('id');
        var customer_name = $('#flt_by_text').val();
        var customer_type = $('#customer_type').val();
        console.log(customer_name);
        console.log(customer_type);
        var formData = $('#customer_filter').serialize();
        $.ajax({
            url: "{{ route('admin.event.select-customer') }}",
            type: 'GET',
            data: formData,
            success: function(response) {
                var currentPage = response.current_page;
                displayCustomers(response.data, currentPage);
                displayPagination(response);
                $('#flt_by_text').val(customer_name);
                $('#customer_type').val(customer_type); 
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });  
    });

    $(document).delegate('#clear_filters','click', function(){
        $('#customer_filter')[0].reset();
        var formData = $('#customer_filter').serialize();
        $.ajax({
            url: "{{ route('admin.event.select-customer') }}",
            type: 'GET',
            data: formData,
            success: function(response) {
                var currentPage = response.current_page;
                displayCustomers(response.data, currentPage);
                displayPagination(response);
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });  
    });
    $(document).delegate('.btn_add_new_customer','click', function(){
        $('.customer-list').hide();
        $('#pagination-links').hide();
        newCustomer(); 
    });
    $(document).delegate('.add','click', function(e){
        e.preventDefault();
        var item = $(this).attr('data-id');
        console.log(item);
        if (item == 1) {
            $('.alt_email').show();
            $($(this)).hide();
        }else if(item == 2){
            $('.alt_phone').show();
            $($(this)).hide();
        }
    });
    $(document).delegate('.customer_type_select button','click', function(e){
        e.preventDefault();

        $(".customer_type_select button").removeClass("checked");
        $(".customer_type_select button svg").css('display', 'none');

        $(this).addClass("checked");
        $(this).find('svg').show();

        var selectedDataId = $(this).attr('data-id');
        localStorage.setItem('selectedDataId', selectedDataId);

        var value = $(this).attr('data-id');
        if (value == 1) {
            $('.main-form').show();
            $('.corporate-form').hide();
            $('.main-order-item').css('order', '0');
        } else if (value == 2) {
            $('.corporate-form').show();
            $('.corporate_info').css('order', '1');
            $('.main-order-item').css('order', '2');
            validator.settings.rules['customer_name'] = "required";
            validator.settings.messages['customer_name'] = "Please enter the customer name";
            validator.focusInvalid();
        } else {
            $('.corporate-form').show();
            $('.corporate_info').css('order', '1');
            $('.main-order-item').css('order', '2');
        }
    });
    var storedDataId = localStorage.getItem('selectedDataId');
    if (storedDataId) {
        $(".customer_type_select button[data-id='" + storedDataId + "']").addClass("checked");
        $(".customer_type_select button[data-id='" + storedDataId + "'] svg").show();
        $(".customer_type_select button[data-id='" + storedDataId + "']").trigger('click');
    }
    $('.gift_certificate_edit').click(function() {
        var gc_id = $(this).data('id');
        var url = "{{ route('admin.GiftCertificate.edit',':id') }}";
        url = url.replace(':id', gc_id);
        $.ajax({
            url: url
            , type: 'GET'
            , success: function(data) {
                $('#frm_edit_gift_certificate input[name="gc_id"]').val(data.giftCert.id);
                $('#frm_edit_gift_certificate input[name="edit_gift_certificate_serial_no"]').val(data.giftCert.serial_no);
                $('#frm_edit_gift_certificate select[name="edit_gift_certificate_purchase_type"]').val(data.giftCert.purchase_type);
                $('#frm_edit_gift_certificate input[name="edit_gift_certificate_face_value"]').val(data.giftCert.face_value);
                $('#frm_edit_gift_certificate input[name="edit_gift_certificate_purchase_date"]').val(data.giftCert.purchase_date);
                $('#frm_edit_gift_certificate textarea[name="edit_gift_certificate_special_notes"]').val(data.giftCert.special_notes);

            }
            , error: function(error) {
                console.error('Ajax request failed:', error);
            }
        });
        $('.ui-draggable-sell-edit-gift-certificate').show();
        $('.ui-widget-overlay').css('display', 'block');
    });

</script>