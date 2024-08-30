<script>
    function displayCustomers(customers, currentPage) {
        var i = currentPage*10-9;
        var html = `
        <span id="event_new" class="xmlb_form">
            <div class="page-content">
                
                <div class="customers_wrap">
                    <form action="#" id="customer_filter" method="get">
                        <div class="filters_wrap">
                            <fieldset class="form_filters d-flex">
                                <legend>Search</legend>
                                <div class="id">
                                    <strong class="mr-5">Id:</strong>
                                    <input class="flt_by_id filter_elm_customer_id" id="flt_by_id" name="custome_id"
                                        value="{{old('custome_id')}}">
                                </div>
                                <div class="text">
                                    <strong class="mr-5 ml-5">Text:</strong>
                                    <input class="" id="flt_by_text" name="flt_by_text"
                                        value="{{old('flt_by_text')}}"
                                        title="Search by name, phone, cell phone or email">
                                </div>
                                <div class="type">
                                    <strong class="mr-5 ml-5">Customer Type:</strong>
                                    <select class="" id="flt_customer_type" name="customer_type">
                                        <option value="" {{ old('customer_type') == '' ? 'selected' : '' }}>--All--
                                        </option>
                                        <option value="1" {{ old('customer_type') == '1' ? 'selected' : '' }}>
                                            Personal</option>
                                        <option value="2" {{ old('customer_type') == '2' ? 'selected' : '' }}>
                                            Corporate</option>
                                        <option value="3" {{ old('customer_type') == '3' ? 'selected' : '' }}>Event
                                            Planner</option>
                                    </select>
                                </div>
                            </fieldset>
                        </div>
                    </form>
                    <button type="button" class="btn_new_customer button font-bold radius-0" >New Customer</button>

                </div>
                <div class="customer-rows-outer">`;
                customers.forEach(function(customer, index) {
                    var customerId = customer.id;
                    var customerRoute = "{{ route('admin.customer.show', ':customerId') }}".replace(':customerId', customerId);
                html +=`<div class="customers-inner">
                        <div class="customers">
                            <div class="sr-no">
                                <strong>${i++}) </strong>
                            </div>
                            <div class="customer-id">
                                <strong>Id:</strong>
                                <a href="${customerRoute}"  
                                    class="id-value">${customer.id}</a>
                            </div>
                            <div class="customer-name">
                                <a href="${customerRoute}">${customer.customer_name}`;
                                if (customer.customer_type == 2) {
                                    html += '(Corporate)';
                                } else if (customer.customer_type == 3) {
                                    html += '(Event Planner)';
                                }
                                html += `</a>
                            </div>
                            <div class="booking-status">
                                <strong>Booked:</strong>`;
                                if (customer.events.length > 0) {
                                    var count = customer.events.filter(event => event.event_status === 1).length;
                                } else {
                                    count = 0;
                                }

                                if (count != 0) {
                                    html += `<span class="value counted">${count}</span>`;
                                } else {
                                    html += `<span class="value">${count}</span>`;
                                }
                                html += ` </div>
                                <div class="tentative booking-status">
                                    <strong>Tentative:</strong>`;
                                    if (customer.events.length > 0) {
                                        var count = customer.events.filter(event => event.event_status === 1).length;
                                    } else {
                                        count = 0;
                                    }

                                    if (count != 0) {
                                        html += `<span class="value counted">${count}</span>`;
                                    } else {
                                        html += `<span class="value">${count}</span>`;
                                    }
                                    html += ` </div>`;
                                    var formattedDate = moment(customer.created_at).format('ddd, MMM D YYYY')
                                    html += `<div class="last-status">
                                <span><strong>Added:</strong> ${formattedDate} <strong>By:</strong>
                                ${customer.user.name} </span>
                            </div>
                        </div>`;
                        if (customer.contacts.length > 0) {
                        $.each(customer.contacts, function(index, contact) {
                            html += `
                            <div class="customers-contact">
                                <button type="button" class="button font-bold radius-0 add_booking_customer" contact_name="${contact.full_name}" customer_id="${customer.id}" contact_id="${contact.id}">Add Booking</button>
                                <div class="name">${contact.last_name}, ${contact.first_name}</div>
                                <div class="number">
                                    <strong>Phone:</strong>
                                    <span>${contact.cell_phone}</span>
                                </div>
                                <div class="email">
                                    <strong>Email:</strong>
                                    <span>${contact.main_email}</span>
                                </div>
                            </div>`;
                        });
                        }
                        html +=` </div>`;
                });
                html +=` </div>
            </div>
        </span>
        `;
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
     $(document).ready(function(){
        $('.new_booking_module').click(function() {
            $.ajax({
                url: "{{ route('admin.event.select-customer') }}",
                type: 'GET',
                success: function(response) {
                    var currentPage = response.current_page;
                    displayCustomers(response.data, currentPage);
                    displayPagination(response);
                    $('.ui-draggable-select_change_customer').show();
                    $('.ui-widget-overlay').css('display', 'block');
                    
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });            
        });
        $('.closethick-select-customer-close').click(function() {
            $('.ui-draggable-select_change_customer').hide();
            $('.ui-widget-overlay').css('display', 'none');
        });
    });
</script>