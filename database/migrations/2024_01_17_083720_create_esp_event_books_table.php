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
        Schema::create('esp_event_books', function (Blueprint $table) {
            $table->id()->comment('Primary Key');
            $table->integer('lnk_event')->comment('Special event for which this is booked');
            $table->integer('lnk_customer')->comment('Customer who is booking');
            $table->integer('lnk_customer_contact')->comment('The contact under this customer who is booking');
            $table->integer('lnk_seat_with')->nullable()->comment('Sometimes customers book separate but want to sit together. In such cases this column gives us the other booking by which customer wants to sit. Linked to ESP_EVENT_BOOK');
            $table->tinyInteger('no_adults')->nullable()->comment('No of adults booked');
            $table->tinyInteger('no_kids')->nullable()->comment('No of kids booked');
            $table->tinyInteger('no_seniors')->nullable()->comment('No of seniors in this booking');
            $table->tinyInteger('no_special_guests')->nullable()->comment('If the column SPECIAL_COUNT_LABEL is filled in for this event, it means we are counting say number of Moms in the event to pass roses to them. Then in those cases, user should also enter this number. This number does not count in total number of guests and already included in the count for other guests');
            $table->float('total_adults', 9, 2)->nullable()->comment('Total price for adults. This is the event price per adult times number of adults in this booking');
            $table->float('total_kids', 9, 2)->nullable()->comment('Total menu or meal for children in this booking. This is price per kids times number of kids in this booking');
            $table->float('total_seniors', 9, 2)->nullable()->comment('Total menu item price for seniors in this booking. This is number of seniors in this booking times price per seniors in the event.');
            $table->float('total_menu_items', 9, 2)->nullable()->comment('Total menu items for this customer or booking. This is price per adult of the event times number of adults for this event');
            $table->float('total_extra_options', 9, 2)->nullable()->comment('Total extra options for this customer if they select any');
            $table->float('sub_total', 9, 2)->nullable()->comment('Sub total for this booking which is the total menu items plus extra options');
            $table->float('gratuity_percent', 4, 2)->nullable()->comment('Gratuity percent applied to sub_total of the event');
            $table->float('gratuity_amount', 9, 2)->nullable()->comment('The gratuity amount to be included in sub total for this booking');
            $table->float('tax1_amount')->nullable()->comment('Tax1 amount for this booking or customer');
            $table->float('tax2_amount')->nullable()->comment('Tax2 amount for this booking or customer');
            $table->float('tax3_amount')->nullable()->comment('Tax3 amount for this booking or customer');
            $table->float('grand_total', 9, 2)->nullable()->comment('Grand total which is the sub total plus taxes');
            $table->float('total_paid', 9, 2)->nullable()->comment('Total amount paid by this customer up to now');
            $table->float('cur_balance', 9, 2)->nullable()->comment('Current unpaid balance for this booking');
            $table->text('extra_options_desc')->nullable()->comment('Description of extra options for this booking if any');
            $table->string('tax_descriptor')->nullable()->comment('Describes tax names and tax percentage for each of the tax components.');
            $table->string('table_numbers', 30)->nullable()->comment('The table no or numbers assigned to this guest');
            $table->tinyInteger('cc_type')->nullable()->comment('Credit card if provided like Visa/ Master Card');
            $table->string('cc_no', 20)->nullable()->comment('Credit card # if provided');
            $table->string('cc_expiry', 4)->nullable()->comment('Creadit card expiry in MMYY format if provided');
            $table->string('cc_security_code', 5)->nullable()->comment('The security code or CVS code that is required when processing credit card');
            $table->tinyInteger('cc2_type')->nullable()->comment('Type of credit card for the second card if provided');
            $table->string('cc2_no', 20)->nullable()->comment('Credit card number for the second credit card if any');
            $table->string('cc2_expiry', 4)->nullable()->comment('Expiry date for the second card if any in MMYY format');
            $table->string('cc2_security_code', 5)->nullable()->comment('http://www.pennexaluminum.com/');
            $table->string('cc_instructions', 210)->nullable()->comment('Special instructions regarding customer credit card like do not charge or charge later.');
            $table->text('special_notes')->nullable()->comment('Special notes if any');
            $table->string('dietary_notes', 1024)->nullable()->comment('Dietary notes for this booking that should on the table or tables where this customer has been assigned to. This is important to be seen on the table and not booking so event manager can easily spot it');
            $table->integer('lnk_user_insert')->nullable()->comment('User who first inserted this record');
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
        Schema::dropIfExists('esp_event_books');
    }
};
