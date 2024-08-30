<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::group(['prefix' => 'admin', 'as' => 'admin.','namespace' => 'App\Http\Controllers\Admin'], function (){
    Route::get('/login', 'Auth\LoginController@login')->name('login');
    Route::post('/authenticate', 'Auth\LoginController@authenticate')->name('authenticate');
});
// ,'middleware' => ['auth']
Route::group(['prefix' => 'admin', 'as' => 'admin.','namespace' => 'App\Http\Controllers\Admin' ,'middleware' => ['auth']], function (){
    
    Route::post('login/post', 'Auth\LoginController@store')->name('login.post');
    Route::post('login/update/{id}', 'Auth\LoginController@update')->name('login.update');
    Route::get('/user_profile', 'Auth\LoginController@userProfile')->name('user.profile');
    Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

    Route::get('/', 'DashboardController@index')->name('dashboard');
    Route::get('room-availability-calendar', 'DashboardController@roomCalendar')->name('room.availability.calendar');
    
    Route::get('wine-per-supplier', 'SupplierController@winePerSupplier')->name('supplier.wine-per-supplier');
    Route::resource('supplier', 'SupplierController');
    Route::get('add-booking-customer', 'CustomerController@addBookingCustomer')->name('customer.add-booking-customer');
    Route::get('customer-new-rest-reserve', 'CustomerController@customerNewRestReserve')->name('customer.new-restaurant-reserve');
    Route::resource('customer', 'CustomerController');
    Route::get('create-customer-search','CustomerController@createCustomerSearch')->name('create-customer-search');
    Route::post('special-booking', 'SpecialEventController@specialBooking')->name('special-booking');
    Route::resource('special-event', 'SpecialEventController');
    
    Route::get('select-customer', 'EventController@selectCustomer')->name('event.select-customer');
    Route::get('event/create', 'EventController@create')->name('event.create');
    Route::get('event/event_list', 'EventController@index')->name('event.index');
    Route::get('event/tentative_event', 'EventController@tentativEvent')->name('event.tentative-event');
    Route::get('event/archive_event', 'EventController@archivEvent')->name('event.archive-event');
    Route::get('event/floor_plans', 'EventController@floorPlans')->name('event.floor-plans');
    Route::post('event/store', 'EventController@store')->name('event.store');
    Route::get('event/{id}', 'EventController@show')->name('event.show');
    Route::get('event/{id}/edit', 'EventController@edit')->name('event.edit');
    Route::put('event/{id}', 'EventController@update')->name('event.update');
    Route::delete('event/{id}', 'EventController@destroy')->name('event.destroy');
    Route::post('update-address', 'EventController@updateShipAddress')->name('update.shipaddress');

    Route::post('event/floor_plans/store', 'EventFloorPlanController@store')->name('event.floor-plans.store');
    Route::get('event/floor_plans/{id}', 'EventFloorPlanController@show')->name('event.floor-plans.show');
    Route::delete('event/floor_plans/{id}', 'EventFloorPlanController@destroy')->name('event.floor-plans.destroy');
    
    Route::post('event/itinerary/store', 'EventItineraryController@store')->name('event.itinerary.store');
    Route::get('event/itinerary/{id}', 'EventItineraryController@show')->name('event.itinerary.show');
    Route::delete('event/itinerary/{id}', 'EventItineraryController@destroy')->name('event.itinerary.destroy');

    Route::post('event-facility', 'EventFacilityController@store')->name('event-facility.store');
    Route::delete('delete-multiple', 'EventFacilityController@destroy')->name('facility.delete.multiple');
    Route::get('get-facility/{id}', 'EventFacilityController@getEditFacility')->name('getediteventfacility');
    Route::post('event-facility/update', 'EventFacilityController@update')->name('eventfacility.update');
    Route::get('get-event/{id}', 'EventFacilityController@getEventDate')->name('get.eventdate');


    Route::post('payment-method-store', 'StoredPayMethodController@Store')->name('payment.method.store');
    Route::delete('payment-method-destroy/{id}', 'StoredPayMethodController@destroy')->name('payment.method.destroy');

    Route::post('customer-contact-store', 'CustomerContactController@store')->name('customer.contact.store');
    Route::get('customer-contact-edit/{id}', 'CustomerContactController@edit')->name('customer.contact.edit');
    Route::delete('customer-contact-destroy/{id}', 'CustomerContactController@destroy')->name('customer.contact.destroy');

    Route::post('customer-branch-store', 'CustomerBranchController@store')->name('customer.branch.store');
    Route::post('customer-branch-update/', 'CustomerBranchController@update')->name('customer.branch.update');
    Route::get('get-edit-branch/{id}', 'CustomerBranchController@getEditBranch')->name('get.edit.branch');
    Route::delete('customer-branch-destroy/{id}', 'CustomerBranchController@destroy')->name('customer.branch.destroy');

    Route::post('customer-department-store', 'CustomerDepartmentController@store')->name('customer.department.store');

    Route::post('supplier-contact-store', 'SupplierContactController@store')->name('supplier.contact.store');
    Route::delete('supplier-contact-destroy/{id}', 'SupplierContactController@destroy')->name('supplier.contact.destroy');
    Route::get('supplier-contact-edit/{id}', 'SupplierContactController@edit')->name('supplier.contact.edit');

    Route::get('liquor-product', 'LiquorProductController@index')->name('liquor-product');
    Route::get('purchase-short-list', 'LiquorProductController@liquorPurchaseShort')->name('liquor-purchase-short');
    Route::get('product-receive-list', 'LiquorProductController@receiveProduct')->name('liquor-product-receive');
    Route::get('liquor-bar-console', 'LiquorProductController@liquorBar')->name('liquor-bar');
    Route::get('liquor-inventory-report', 'LiquorProductController@liquorInvReport')->name('liquor-inventory-report');
    // Route::get('liquor-inv-list', 'LiquorProductController@liquorInvList')->name('liquor.inventory-list');
    Route::get('liquor-product/{id}', 'LiquorProductController@show')->name('liquor-product.view');
    Route::post('liquor-product/store', 'LiquorProductController@store')->name('liquor-product.store');
    Route::delete('liquor-product/destroy/{id}', 'LiquorProductController@destroy')->name('liquor-product.destroy');
    Route::get('liquor-product/{id}/edit', 'LiquorProductController@edit')->name('liquor-product.edit');
    Route::post('liquor-product/update', 'LiquorProductController@update')->name('liquor-product.update');
    Route::post('liquor-product-vintage', 'LiquorProductController@addVintage')->name('liquor-product.vintage');
    Route::get('liquor-product-vintage/{id}/edit', 'LiquorProductController@editVintage')->name('liquor-product.vintage.edit');
    Route::post('liquor-product-vintage/update', 'LiquorProductController@updateVintage')->name('liquor-product.vintage.update');
    Route::delete('liquor-product-vintage/destroy/{id}', 'LiquorProductController@destroyVintage')->name('liquor-product.vintage.destroy');

    Route::get('liquor-product-get-bins', 'LiquorProductController@getBins')->name('liquor-product-get-bins');

    Route::resource('warehouse-setup', 'WarehouseSetupController');

    Route::get('active-purchase-order', 'PurchaseOrderController@index')->name('liquor-active-purchase');
    Route::post('active-purchase-order-store', 'PurchaseOrderController@store')->name('liquor-active-purchase.store');
    Route::get('purchase-order-list', 'PurchaseOrderController@list')->name('purchase-order-list');
    Route::get('purchase-order-view/{id}', 'PurchaseOrderController@show')->name('purchase-order-view');
    Route::get('po-list-preparation', 'PurchaseOrderController@poListPreparation')->name('po-list-preparation');
    Route::post('active-purchase-order/update', 'PurchaseOrderController@update')->name('liquor-active-purchase.update');
    Route::delete('purchase-order/destroy/{id}', 'PurchaseOrderController@destroy')->name('purchase-order.destroy');
    Route::get('po-receive-new', 'PurchaseOrderController@poReceiveNew')->name('po-receive-new');
    Route::get('liquor-product-search', 'PurchaseOrderController@liquorProductSearch')->name('liquor-product-search');
    Route::get('po-list-on-hand', 'PurchaseOrderController@poListOnHand')->name('po-list-on-hand');
    Route::get('weekly-items-requirement', 'PurchaseOrderController@weeklyItemsRrequirementList')->name('weekly-items-requirement');

    Route::get('liquor-base-info', 'LiquorBrandsController@index')->name('liquor.base-info');
    Route::post('liquor-brand/store', 'LiquorBrandsController@store')->name('liquor-brand.store');
    Route::post('liquor-brand/update', 'LiquorBrandsController@update')->name('liquor-brand.update');
    Route::get('liquor-brand/{id}/edit', 'LiquorBrandsController@edit')->name('liquor-brand.edit');
    Route::delete('liquor-brand/{id}', 'LiquorBrandsController@destroy')->name('liquor-brand.destroy');

    Route::resource('liquor-base-info-package-type', 'PackageTypeController');

    Route::resource('liquor-inv-list', 'LiquorListController');
    Route::get('liquor-list-item/store', 'LiquorListController@liquorListItemStore')->name('liquor-list-item.store');
    Route::get('liquor-list-item/destroy', 'LiquorListController@liquorListItemDestroy')->name('liquor-list-item.destroy');
    
    Route::get('liquor-bin-setup', 'LiquorBinController@index')->name('liquor.bin-setup');
    Route::post('liquor-bin-setup/store', 'LiquorBinController@store')->name('liquor.bin-setup.store');
    Route::get('liquor-bin-setup/{id}/edit', 'LiquorBinController@edit')->name('liquor.bin-setup.edit');
    Route::delete('liquor-bin-setup/{id}/destroy', 'LiquorBinController@destroy')->name('liquor.bin-setup.destroy');

    Route::get('inventory-count', 'InventoryCountController@index')->name('inventory-count.index');
    Route::post('inventory-count-store', 'InventoryCountController@store')->name('inventory-count.store');
    Route::get('inventory-count-show/{id}', 'InventoryCountController@show')->name('inventory-count.show');
    Route::delete('inventory-count-destroy/{id}', 'InventoryCountController@destroy')->name('inventory-count.destroy');

    Route::get('user-staff-schedule', 'ManageController@scheduleUserStaff')->name('schedule.user.staff');
    Route::post('staff-schedule-store', 'ManageController@staffScheduleItemStore')->name('schedule.store');
    Route::post('weekly-staff-schedule-store', 'ManageController@weeklyStaffScheduleStore')->name('manage.weekly-staff-schedule-store');
    Route::delete('staff-schedule-item/{id}', 'ManageController@destroy')->name('schedule.destroy');
    Route::get('staff-schedule-item/{id}/edit', 'ManageController@edit')->name('schedule.edit');

    Route::post('restaurant-weekly-schedule', 'RestaurantController@weeklyScheduleStore')->name('restaurant.weekly.schedule.store');
    Route::get('restaurant-weekly-schedule{id}/edit', 'RestaurantController@weeklyScheduleEdit')->name('restaurant.weekly.schedule.edit');
    Route::get('manage-restaurant-schedule', 'RestaurantController@scheduleRestaurant')->name('schedule.restaurant');
    Route::get('restaurant-daily-sale', 'RestaurantController@restaurantDailySale')->name('restaurant.daily.sale');
    Route::delete('restaurant-weekly-schedule{id}/destroy', 'RestaurantController@weeklyScheduleDestroy')->name('restaurant.weekly.schedule.destroy');
    Route::resource('restaurant-hour', 'RestaurantController');

    Route::get('report-booking-comparison', 'BookingController@index')->name('booking.index');
    Route::get('restaurant-reservation', 'BookingController@restaurantReservation')->name('booking.restaurant.reservation');
    Route::get('restaurant-reservation-get', 'BookingController@restaurantReservationGet')->name('booking.restaurant.reservation-get');
    Route::post('restaurant-reservation-store', 'BookingController@bookingStore')->name('booking.reserve.store');
    Route::get('restaurant-reservation/{id}/edit', 'BookingController@edit')->name('booking.reserve.edit');
    Route::delete('restaurant-reservation/destroy/{id}', 'BookingController@destroy')->name('booking.reserve.destroy');

    Route::get('past-due-deposit', 'DashboardController@deposit')->name('past.due.deposit');

    Route::get('gift-certificate-list', 'GiftCertificateController@index')->name('GiftCertificate.index');
    Route::post('gift-certificate-store', 'GiftCertificateController@store')->name('GiftCertificate.store');
    Route::get('gift-certificate/{id}/edit', 'GiftCertificateController@edit')->name('GiftCertificate.edit');
    Route::get('gift-certificate/list', 'GiftCertificateController@getGiftCertificateLists')->name('GiftCertificate.get-list');
    Route::delete('gift-certificate-destroy/{id}', 'GiftCertificateController@destroy')->name('GiftCertificate.destroy');

    Route::group(['prefix' => 'base-info', 'as' => 'base-info.'], function () {
        Route::get('product-list', 'AllProductController@index')->name('all-products');
        Route::post('product-list', 'AllProductController@store')->name('all-products.store');
        Route::get('product-list-edit/{id}', 'AllProductController@edit')->name('all-products.edit');
        Route::post('product-list-update', 'AllProductController@update')->name('all-products.update');
        Route::delete('product-list-destroy', 'AllProductController@destroy')->name('all-products.destroy');
        Route::get('restaurant-wine-list', 'AllProductController@wineCategoryList')->name('restaurant-wine-category-list');
        Route::post('restaurant-wine-store', 'AllProductController@wineCategoryStore')->name('restaurant-wine-category.store');
        Route::get('restaurant-wine-edit/{id}', 'AllProductController@wineCategoryEdit')->name('restaurant-wine-category.edit');
        Route::delete('restaurant-wine-destroy', 'AllProductController@wineCategoryDestroy')->name('restaurant-wine-category.destroy');
        Route::get('category-wine-list', 'AllProductController@wineList')->name('category-wine-list');
        Route::get('product-menu-view/{id}', 'AllProductController@menuShow')->name('product-menu-view');
        Route::post('product-preparation', 'AllProductController@preparationStore')->name('product-preparation.store');
        Route::get('product-preparation-edit/{id}', 'AllProductController@preparationEdit')->name('product-preparation.edit');
        Route::resource('product-cat-list', 'ProductCategoryController');
        Route::get('product-drink-list', 'AllProductController@drinkList')->name('product-drink-list');
        Route::get('product-archive-list', 'AllProductController@ProductArchiveList')->name('product-archive-list');
        Route::resource('serve-title-masters', 'ServeTitleMasterController');
        Route::resource('facility-list', 'FacilityController');
        Route::post('facility-pricing-store', 'FacilityController@pricingStore')->name('facility-pricing.store');
        Route::get('facility-pricing-destroy', 'FacilityController@pricingDestroy')->name('facility-pricing.destroy');
        Route::resource('floor-plan-settings', 'FloorPlanRoomController');
        Route::resource('event-type-list', 'EventTypeController');
        Route::get('sys-setting-list', 'AllProductController@sysSettingList')->name('sys-setting-list');
        Route::get('city-lookup-list', 'AllProductController@cityLookupList')->name('city-lookup-list');
        Route::get('mgr-email-template-list', 'AllProductController@mgrEmailTemplateList')->name('mgr-email-template-list');
    });

    Route::post('document-category', 'MarketingDocumentController@documentCategoryStore')->name('document-category.store');
    Route::get('document-category/{id}/edit', 'MarketingDocumentController@documentCategoryedit')->name('document-category.edit');
    Route::put('document-category/{id}/update', 'MarketingDocumentController@documentCategoryUpdate')->name('document-category.update');
    Route::delete('document-category/{id}/destroy', 'MarketingDocumentController@documentCategoryDestroy')->name('document-category.destroy');
    Route::get('all-marketing-document', 'MarketingDocumentController@allMarketingDocuments')->name('all-marketing-document');
    Route::resource('marketing-documents', 'MarketingDocumentController');
    
    Route::resource('marketing-campaign', 'MarketingCampaignController');
    
    Route::get('department-list', 'DepartmentController@index')->name('department.index');
    Route::post('department-list-store', 'DepartmentController@store')->name('department.store');
    Route::get('department-list/{id}/edit', 'DepartmentController@edit')->name('department.edit');
    Route::post('delete-departments', 'DepartmentController@deleteDepartments')->name('departments.delete');
    
    Route::get('staff-schedule', 'StaffManagementController@staffSchedule')->name('staff-management.staff-schedule');
    Route::resource('staff-list', 'StaffManagementController');
    
    Route::get('event-menu-item', 'EventItemController@menuItem')->name('event-item.menu-item');
    Route::post('serve-title-combo/save', 'EventItemController@serveTitleCombo')->name('event-item.serveTitleCombo');
    Route::post('event-menu-item/store', 'EventItemController@menuItemStore')->name('event-item.menu-store');
    Route::get('event-menu-item/get-combo', 'EventItemController@getComboEdit')->name('event-item.getComboEdit');
    Route::get('event-item-show-guests/{id}', 'EventItemController@ShowGuests')->name('event-item.ShowGuests');
    Route::delete('serve-title-destroy/{id}', 'EventItemController@serveTitledestroy')->name('event-item.serveTitleDestroy');
    Route::resource('event-item', 'EventItemController');

    Route::group(['prefix' => 'reports', 'as' => 'reports.'], function () {
        Route::get('report-sales-detail', 'ReportController@salesDetails')->name('report-sales-detail');
        Route::get('report-actual-payments', 'ReportController@reportActualPayments')->name('report-actual-payments');
        Route::get('report-event-list', 'ReportController@reportEventList')->name('report-event-list');
        Route::get('report-booking-details', 'ReportController@reportBookingDetails')->name('report-booking-details');
        Route::get('report-avg-price-per-person', 'ReportController@reportAvgPricePerPerson')->name('report-avg-price-per-person');
        Route::get('report-sales-drilling', 'ReportController@reportSalesDrilling')->name('report-sales-drilling');
        Route::get('report-line-item-sales', 'ReportController@reportLineItemSales')->name('report-line-item-sales');
        Route::get('report-sales-by-event-type', 'ReportController@reportSalesByEventType')->name('report-sales-by-event-type');
    });

    Route::group(['prefix' => 'manage', 'as' => 'manage.'], function(){
        Route::resource('mgr-discount-coupon-list','DiscountCouponController');
    });
});
