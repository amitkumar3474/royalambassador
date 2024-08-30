<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id()->comment('Primary Key');
            $table->integer('lnk_main_event')->nullable()->comment('If this event is part of a multi-day event, then one of the events will be the main one and all other events link to it. This column has that link.');
            $table->integer('lnk_rehearsal_for')->nullable()->comment('If this event is the rehearsal fro another event like a wedding, then this column links to the original event. Linked to EVENT table');
            $table->integer('lnk_customer')->comment('Customer to which this event belongs');
            $table->integer('lnk_event_planner')->nullable()->comment('The event planner if any. Linked to CUSTOMER');
            $table->integer('lnk_package')->nullable()->comment('If this event is sold by package, then this column is a link to the given package which in PRODUCT_GEN for products of type package');
            $table->integer('lnk_event_planner_contact')->nullable()->comment('If there is an event planner for this event, then this is the contact under the event planner record. Linked to CUSTOMER_CONTACT');
            $table->integer('lnk_customer_contact')->nullable()->comment('The contact under this customer who is responsible for this event');
            $table->integer('lnk_marketing_campaign')->nullable()->comment('The marketing campaign by which we got this event. It is by defalt the same as customer, however it is possible that we get an old customer via a new campaign');
            $table->integer('lnk_bill_to_customer')->nullable()->comment('The customer who is being billed for this event . This can be different from the customer who received the service.');
            $table->integer('lnk_bill_to_customer_contact')->nullable()->comment('The contact under bill to customer to which this event will be billed. Sometimes the bill to is different from actual customer, say another customer hosts the event.');
            $table->tinyInteger('event_status')->nullable()->comment('Current status of this event like booked or tentative');
            $table->char('catering_type',1)->nullable()->comment('If this is a catering event, then customer can either order from restaurant or from banquet menu. If it is from restaurant, it should be clear to the kitchen staff. This flag tells us that');
            $table->char('contract_type',3)->nullable()->comment('Type of contract for non-catering events like morning event or ceremony only event');
            $table->integer('lnk_event_type')->nullable()->comment('Type of event');
            $table->string('lnk_sales_person')->nullable()->comment('The staffs that have been the sales person for this event. It stores staff.uid');
            $table->string('event_title')->nullable()->comment('The title of this event like who and who wedding');
            $table->string('event_title_for_email')->nullable()->comment('The title of the event used when sending out confirmation email');
            $table->dateTime('start_date_time')->nullable()->comment('Event start date and time');
            $table->dateTime('end_date_time')->nullable()->comment('Event end date and time');
            $table->tinyInteger('dining_type')->nullable()->comment('Is it buffet or sit down');
            $table->tinyInteger('delivery_type')->nullable()->comment('Delivery type for catering events: delivery or pickup');
            $table->mediumInteger('adults')->nullable()->comment('Number of adults in the event');
            $table->integer('min_adults')->nullable()->comment('This means customer has to pay for a minimum this number of adults');
            $table->mediumInteger('kids')->nullable()->comment('Number of kids in this event');
            $table->mediumInteger('babies')->nullable()->comment('Babies count. For information only');
            $table->mediumInteger('pros')->nullable()->comment('Number of professionals in the event like music bands or DJs');
            $table->mediumInteger('seniors')->nullable()->comment('No of seniors attended. Used for special events only');
            $table->mediumInteger('adults_actual')->nullable()->comment('The actual number of adults attending the event. Used for kitchen and event sheet, not for procing or invoice');
            $table->mediumInteger('kids_actual')->nullable()->comment('The actual number of kids attending the event. Used for kitchen and event sheet, not for procing or invoice');
            $table->mediumInteger('babies_actual')->nullable()->comment('Actual number of babies that is sourced from floor plan');
            $table->mediumInteger('pros_actual')->nullable()->comment('The actual number of professionals a sourced by floor plan. We need this info for invoicing');
            $table->smallInteger('no_of_tables')->nullable()->comment('No of tables in this event');
            $table->float('tax1_amount')->nullable()->comment('Total of tax 1');
            $table->float('tax2_amount')->nullable()->comment('Total of tax 2');
            $table->float('tax3_amount')->nullable()->comment('Total of tax 3');
            $table->float('tax4_amount')->nullable()->comment('Total of tax 4');
            $table->float('tax5_amount')->nullable()->comment('Total of tax 5');
            $table->float('total_menu_items')->nullable()->comment('The total for menu items only, not the line items and not including taxes.');
            $table->float('total_children')->nullable()->comment('Total price for children before taxes');
            $table->float('total_babies')->nullable()->comment('Total charges for babies before taxes');
            $table->float('total_pros')->nullable()->comment('Total price for professionals before taxes');
            $table->float('total_line_items')->nullable()->comment('Total line items in this event before taxes');
            $table->float('total_room_rental')->nullable()->comment('Total amount for room rental');
            $table->float('total_gazebo')->nullable()->comment('Total price for Gazebo charged to this event if any');
            $table->float('total_security_deposit')->nullable()->comment('Total security deposit is the sum of event item whose IS_SECURITY_DEPOST flag is YES');
            $table->float('sub_total')->nullable()->comment('Subtotal of this event before taxes');
            $table->float('gratuity_percent')->nullable()->comment('The percentage for gratutiy. This is the base for calculating gratuity amount');
            $table->float('gratuity_amount')->nullable()->comment('The gratuity amount for this event');
            $table->float('grand_total')->nullable()->comment('Grand total after the taxes');
            $table->float('deposit')->nullable()->comment('Deposit paid by this customer');
            $table->tinyInteger('payment_method')->nullable()->comment('Method of payment for deposit');
            $table->float('balance')->nullable()->comment('Remaining balance for this event');
            $table->float('price_per_person_bt')->nullable()->comment('Price per person before taxes');
            $table->float('price_per_kid_bt')->nullable()->comment('Price per kid before taxes');
            $table->float('price_per_baby_bt')->nullable()->comment('Price per each baby before tax');
            $table->float('price_per_pro_bt')->nullable()->comment('Price per professional before taxes');
            $table->float('price_per_senior_bt')->nullable()->comment('Price per senior before tax. This is used only for special events');
            $table->float('price_per_person')->nullable()->comment('Total price per person after taxes');
            $table->float('price_per_kid')->nullable()->comment('Price per kid');
            $table->float('price_per_baby')->nullable()->comment('Price per each baby after taxes');
            $table->float('price_per_pro')->nullable()->comment('Price per professionals');
            $table->float('price_per_senior')->nullable()->comment('Price per senior after taxes. Mainly used in special events.');
            $table->float('price_per_person_contract')->nullable()->comment('Price per person as set in contract');
            $table->float('price_per_kid_contract')->nullable()->comment('Price per kid as set in contract');
            $table->float('price_per_pro_contract')->nullable()->comment('Price per professional as set in contract');
            $table->float('net_price_per_person')->nullable()->comment('Net price per person is only for showing purposes and is total menu items and room rentals divided by number of adults');
            $table->text('special_notes')->nullable()->comment('Special notes for this event if any');
            $table->string('invoice_notes')->nullable()->comment('Notes to show on the invoices');
            $table->text('contract_notes')->nullable()->comment('Notes that should appear on the contract only. These notes are edittable by user');
            $table->text('contract_extra_notes')->nullable()->comment('These notes appear as contract notes if any, however they can not be editted by user. They are supplied once and stored in global settings and copied into any new event.');
            $table->text('office_notes')->nullable()->comment('Notes that will be viewed and used by staff only and not for customer');
            $table->string('terms_conditions')->nullable()->comment('Terms and conditions for this event. Terms and conditions are stored per event, but rarely change');
            $table->date('booking_date')->nullable()->comment('The date when the order gets confirmed and status becomes booked');
            $table->integer('lnk_user_booked')->nullable()->comment('If this event has been booked, then this column tells us who set the event as booked. Linked to SYS_USER');
            $table->date('promised_date')->nullable()->comment('If this event has been set to promised at some point, then this column tells when it was set to promised');
            $table->integer('lnk_user_promised')->nullable()->comment('If this event was set to promised at some point of time, then this column tells us who set it as promised. Linked to SYS_USER');
            $table->string('ship_to_first_name')->nullable()->comment('First name of the person to which this order should be shipped to. For catering orders only');
            $table->string('ship_to_last_name')->nullable()->comment('Last name of the person to which this order should be shipped to. For catering orders only');
            $table->string('ship_to_street')->nullable()->comment('Street address where this order should be shipped to. For catering only');
            $table->string('ship_to_city')->nullable()->comment('City to where this order should be shipped. For catering orders only');
            $table->tinyInteger('ship_to_province')->nullable()->comment('Province to which this order should be shipped. For catering orders only');
            $table->string('ship_to_postal_code')->nullable()->comment('Postal code of the address to where this order should be shipped. For catering orders only');
            $table->string('ship_to_phone')->nullable()->comment('Phone no of the place where this order should be shipped to. For catering orders only');
            $table->string('tax_descriptor')->nullable()->comment('Keeps information about the sales taxes that are charged in this event');
            $table->integer('max_capacity')->nullable()->comment('Max capcity for an event. Used for special events only');
            $table->string('special_count_label')->nullable()->comment('Label for special count for this event. This is only used in special events. Say on Mother`s day they want to give rose to each mom. Then basically they want to count how many mom are there and this field will say: `Moms`. This way on screen and on print user will see count of Moms that they use to buy roses.');
            $table->integer('lnk_user_insert')->nullable()->comment('User who inserted this record');
            $table->integer('lnk_user_update')->nullable()->comment('User who last updated this record');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
};
