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
        Schema::create('customer_contacts', function (Blueprint $table) {
            $table->id()->comment('Primary key');
            $table->integer('lnk_customer')->comment('The customer to which this contact is related');
            $table->string('customer_name')->nullable()->comment('We store customer name redundantly here to make the searches faster. Otherwise we must join CUSTOMER and CUSTOMER_CONTACT each time');
            $table->tinyInteger('relation')->nullable()->comment('The relation of this contact to the customer, like brid or husband for personal customers and business owner or employee for personal ones');
            $table->string('mr_mrs')->nullable()->comment('Title of this customer like Mr. or Dr.');
            $table->string('first_name')->nullable()->comment('First name of for this contact');
            $table->string('last_name')->nullable()->comment('Last name for this contact');
            $table->string('full_name')->nullable()->comment('This is the concatenation of FIRST_NAME and LAST_NAME and is used for search only. Say if we are searching for the word John Gi. Then as of now it does not find it because each is stored in a separate column. This column makes it possible');
            $table->string('main_email')->nullable()->comment('Primary email address for this contact');
            $table->string('alt_email')->nullable()->comment('Alternate email for this contact');
            $table->integer('lnk_branch')->nullable()->comment('The branch under this customer to which this contact belongs');
            $table->integer('lnk_department')->nullable()->comment('The department under the given branch where this customer works');
            $table->string('position')->nullable()->comment('The position name of this contact within the company');
            $table->tinyInteger('contact_level')->nullable()->comment('The level of this contact like Executive or others');
            $table->integer('lnk_user')->nullable()->comment('Link to SYS_USER table for this client login user');
            $table->string('phone')->nullable()->comment('Client phone number');
            $table->string('fax')->nullable()->comment('Client Fax');
            $table->string('cell_phone')->nullable()->comment('Cleint Cell Phone');
            $table->string('street_addr')->nullable()->comment('Street address for this contact');
            $table->string('city')->nullable()->comment('City where he/she lives in');
            $table->string('postal_code')->nullable()->comment('Postal code for this contact');
            $table->string('province')->nullable()->comment('Province');
            $table->string('country',2)->nullable()->comment('Country (2 letter codes)');
            $table->text('contact_notes')->nullable()->comment('Special notes on this customer');
            $table->tinyInteger('allow_email')->nullable()->comment('Allow sending emails to this customer`s email ');
            $table->string('monchify_id')->nullable()->comment('The unique id of this record in Monchify used to synch between the two');
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
        Schema::dropIfExists('customer_contacts');
    }
};
