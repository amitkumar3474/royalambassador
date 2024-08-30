<!-- ======= Sidebar ======= -->
<div class="page-left">
    <nav class="left-nav">
        <ul class="main-menu">
            <li>
                <a href="{{ route('admin.dashboard') }}"><img src="{{ asset('backend/assets/img/nav_home.png') }}" alt=""></a>
            </li>
            <li class="menu-sub">
                <a href="#"><img src="{{ asset('backend/assets/img/nav_liquor.png') }}" alt=""></a>
                <ul>
                    <h1>Liquor</h1>
                    <li><a href="{{route('admin.liquor.base-info')}}">1.1 Liquor Setup</a></li>
                    <li><a href="{{ route('admin.liquor-product') }}">1.2 All Liquor Products</a></li>
                    <li>
                        <a href="{{ route('admin.supplier.wine-per-supplier') }}">
                            1.3
                            <svg class="svg-inline--fa fa-wine-bottle" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="wine-bottle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="" height="13px" width="13px">
                                <path
                                    fill="currentColor"
                                    d="M393.4 9.4c12.5-12.5 32.8-12.5 45.3 0l64 64c12.5 12.5 12.5 32.8 0 45.3c-11.8 11.8-30.7 12.5-43.2 1.9l-9.5 9.5-48.8 48.8c-9.2 9.2-11.5 22.9-8.6 35.6c9.4 40.9-1.9 85.6-33.8 117.5L197.3 493.3c-25 25-65.5 25-90.5 0l-88-88c-25-25-25-65.5 0-90.5L180.2 153.3c31.9-31.9 76.6-43.1 117.5-33.8c12.6 2.9 26.4 .5 35.5-8.6l48.8-48.8 9.5-9.5c-10.6-12.6-10-31.4 1.9-43.2zM99.3 347.3l65.4 65.4c6.2 6.2 16.4 6.2 22.6 0l97.4-97.4c6.2-6.2 6.2-16.4 0-22.6l-65.4-65.4c-6.2-6.2-16.4-6.2-22.6 0L99.3 324.7c-6.2 6.2-6.2 16.4 0 22.6z"
                                ></path>
                            </svg>
                            Wine List by Supplier
                        </a>
                    </li>
                    <li><a href="{{ route('admin.warehouse-setup.index') }}">1.4 Inventory Setup</a></li>
                    <li><a href="{{route('admin.inventory-count.index')}}">1.5 Cycle Counts</a></li>
                    <li><a href="{{ route('admin.liquor-active-purchase') }}">1.6 Active Purchase Orders</a></li>
                    <li><a href="{{ route('admin.liquor-purchase-short') }}">1.7 Required Purchasing</a></li>
                    <li><a href="{{ route('admin.liquor-product-receive') }}">1.8 Receiving</a></li>
                    <li><a href="{{ route('admin.liquor-bar') }}">1.9 Liquor Bars</a></li>
                    <li><a href="{{ route('admin.liquor-inventory-report') }}">1.10 Liquor Inventory Report</a></li>
                </ul>                            
            </li>
            <li class="menu-sub">
                <a href="#"><img src="{{ asset('backend/assets/img/nav_manage.png') }}" alt=""></a>
                <ul>
                    <h1>Manage</h1>
                    <li><a href="#">2.1 Email Console</a></li>
                    <li><a href="#">2.2 Email Queue</a></li>
                    <li>
                        <a href="{{ route('admin.marketing-campaign.index') }}">2.3 Marketing Campaigns</a>
                    </li>
                    <li><a href="{{ route('admin.marketing-documents.index') }}">2.4 Marketing Documents</a></li>
                    <li><a href="#">2.5 Itinerary Templates</a></li>
                    <li>
                        <a href="{{ route('admin.staff-list.index',['staff_status' => 1]) }}">2.6 Staff Management</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.department.index') }}">2.7 Departments</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.schedule.user.staff') }}">2.8 My Schedule</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.schedule.restaurant') }}">2.9 Restaurant Schedule/Sales</a>
                    </li>
                    <li><a href="{{route('admin.manage.mgr-discount-coupon-list.index') }}">2.10 Coupons</a></li>
                    <li><a href="#">2.11 Users &amp; Privileges</a></li>
                    <li><a href="{{ route('admin.base-info.all-products') }}">2.12 Lists</a></li>
                </ul>
                <!-- <ul>
                    <h1>Manage</h1>
                    <li>
                        <a href="{{ route('admin.marketing-campaign.index') }}">2.3 Marketing Campaigns</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.schedule.user.staff') }}">2.8 My Schedule</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.schedule.restaurant') }}">2.9 Restaurant Schedule/Sales</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.staff-list.index',['staff_status' => 1]) }}">2.6 Staff Management</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.department.index') }}">2.7 Departments</a>
                    </li>
                </ul> -->
            </li>
            <li class="menu-sub">
                <a href="#"><img src="{{ asset('backend/assets/img/nav_customers.png') }}" alt=""></a>
                <ul>
                    <h1>Customers</h1>
                    <li><a href="{{ route('admin.customer.create') }}">3.1 New Customer</a></li>
                    <li><a href="{{ route('admin.customer.index') }}">3.2 Customers</a></li>
                    <li><a href="{{ route('admin.room.availability.calendar') }}">3.3 Availability Calendar</a></li>
                    <li><a href="{{route('admin.event.index')}}">3.4 Events / Floor Plans</a></li>
                    <li><a href="{{ route('admin.special-event.index') }}">3.5 Special Events</a></li>
                    <li><a href="{{ route('admin.GiftCertificate.index') }}">3.6 All Gift Certificates</a></li>
                </ul>                            
            </li>
            <li class="menu-sub">
                <a href="#"><img src="{{ asset('backend/assets/img/nav_purchasing.png') }}" alt=""></a>
                <ul>
                    <h1>Purchasing</h1>
                    <li><a href="{{ route('admin.po-list-preparation') }}">4.1 Purchase Order Preparation</a></li>
                    <li><a href="{{ route('admin.po-list-on-hand') }}">4.2 Active Purchase Orders</a></li>
                    <li><a href="{{ route('admin.weekly-items-requirement') }}">4.3 Weekly Requirement</a></li>
                    <li><a href="#">4.4 Monthly Requirement</a></li>
                    <li><a href="#">4.5 Item Requirement for Catering</a></li>
                    <li><a href="#">4.6 Purchasing Short List</a></li>
                </ul>                            
            </li>
            <li class="menu-sub">
                <a href="#"><img src="{{ asset('backend/assets/img/nav_reports.png') }}" alt=""></a>
                <ul>
                    <h1>Reports</h1>
                    <li><a href="#">5.1 Pending Tasks</a></li>
                    <li><a href="{{ route('admin.reports.report-sales-detail',['event_status' => 2, 'ed_more' => now()->format('Y-m-d')]) }}">5.2 Sales Details</a></li>
                    <li><a href="{{ route('admin.reports.report-actual-payments') }}">5.3 All Payments</a></li>
                    <li><a href="{{ route('admin.reports.report-event-list', ['ed_more' => now()->format('Y-m-d')] ) }}">5.4 Booked Events</a></li>
                    <li><a href="{{ route('admin.reports.report-booking-details',['event_status' => 2, 'ed_more' => now()->format('Y-m-d')]) }}">5.5 Booking Details</a></li>
                    <li><a href="{{ route('admin.reports.report-avg-price-per-person',['event_status' => 2, 'ed_more' => now()->format('Y-m-d')]) }}">5.6 Average Price Per Person</a></li>
                    <li><a href="{{ route('admin.booking.index') }}">5.7 Booking Comparison</a></li>
                    <li><a href="{{ route('admin.reports.report-sales-drilling',['event_status' => 2, 'ed_more' => now()->format('Y-m-d')]) }}">5.8 Sales Drilling</a></li>
                    <li><a href="{{ route('admin.reports.report-line-item-sales',['ed_more' => now()->format('Y-m-d')]) }}">5.9 Line Item Sales</a></li>
                    <li><a href="{{ route('admin.reports.report-sales-by-event-type') }}">5.10 Yearly Sales by Event Type</a></li>
                    <li><a href="#">5.11 Total Sales &amp; Comparison</a></li>
                    <li><a href="#">5.12 Total Guests &amp; Comparison</a></li>
                    <li><a href="#">5.13 Sales by Salesperson</a></li>
                    <li><a href="#">5.14 Monthly Cash Flow</a></li>
                    <li><a href="#">5.15 Cash Flow/Payments</a></li>
                    <li><a href="#">5.16 Revenue Details</a></li>
                    <li><a href="#">5.17 Commission Report</a></li>
                    <li><a href="#">5.18 User Logins</a></li>
                </ul>
            </li>
            <li class="menu-sub">
                <a href="#"><img src="{{ asset('backend/assets/img/nav_base_info.png') }}" alt=""></a>
                <ul>
                    <h1>Base Info</h1>
                    <li><a href="{{ route('admin.supplier.index') }}">6.1 Suppliers</a></li>
                    <li><a href="{{ route('admin.base-info.all-products', ['prod_status' => 1]) }}">6.2 All Products</a></li>
                    <li><a href="{{ route('admin.base-info.serve-title-masters.index') }}">6.3 Serve Title Masters</a></li>
                    <li><a href="{{ route('admin.base-info.facility-list.index') }}">6.4 Facilities</a></li>
                    <li><a href="{{ route('admin.base-info.floor-plan-settings.index') }}">6.5 Floor Plans</a></li>
                    <li><a href="{{ route('admin.base-info.event-type-list.index') }}">6.6 Event Type</a></li>
                    <li><a href="{{ route('admin.base-info.sys-setting-list') }}">6.7 Global Settings</a></li>
                    <li><a href="{{ route('admin.base-info.city-lookup-list') }}">6.8 City Lookup</a></li>
                    <li><a href="{{ route('admin.base-info.mgr-email-template-list') }}">6.9 Email Templates</a></li>
                </ul>                          
            </li>
            <li>
                <a href="#"><img src="{{ asset('backend/assets/img/mnu_icon_user_def.png') }}" alt=""></a>
            </li>
            <li class="logout-profile">
                <a href="{{ route('admin.logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">Logout</a>
                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST">
                    @csrf
                </form>
                <a href="{{ route('admin.user.profile') }}">Profile</a>
            </li>
        </ul>
    </nav>
</div>
<!-- End Sidebar-->
