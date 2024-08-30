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
        Schema::create('customer_temporares', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name')->nullable()->comment('Name of this customer. If this is a corporate customer, then this is the business name. If personal it is the concat of first name and last name or say The Smiths Family.');
            $table->tinyInteger('customer_type')->nullable()->comment('Business or personal customer');
            $table->integer('lnk_marketing_campaign')->nullable()->comment('How we originally found and added this customer to our database');
            $table->string('general_email')->nullable()->comment('General mail box for this customer. Mainly for business customers like info#@companyurl.com');
            $table->tinyInteger('no_of_emps')->nullable()->comment('Number of employees for business customers');
            $table->string('web_url')->nullable()->comment('Web site of this customer if any');
            $table->text('special_notes')->nullable()->comment('Special notes on this customer');
            $table->integer('lnk_account_owner')->nullable()->comment('The original owner of this account that shows who has brought this account into the company. Linked to SYS_USER');
            $table->tinyInteger('relation1')->nullable()->comment('Personal customers only. The relation of this person to this customer like Sole Person, Bride, Groom, Wife or the rest');
            $table->string('mr_mrs1')->nullable()->comment('Title of this customer like Mr. or Dr.');
            $table->string('first_name1')->nullable()->comment('First name of for this contact');
            $table->string('last_name1')->nullable()->comment('Last name for this contact');
            $table->string('main_email1')->nullable()->comment('Primary email address for this contact');
            $table->string('alt_email1')->nullable()->comment('Alternate email for this contact');
            $table->string('branch1')->nullable()->comment('The branch under this customer where this contact works');
            $table->string('department1')->nullable()->comment('The department where this contact is working');
            $table->string('position1')->nullable()->comment('The position name of this contact within the company');
            $table->tinyInteger('contact_level1')->nullable()->comment('The level of this contact like Executive or others');
            $table->string('phone1')->nullable()->comment('Client phone number');
            $table->string('fax1')->nullable()->comment('Client Fax');
            $table->string('cell_phone1')->nullable()->comment('Cleint Cell Phone');
            $table->string('street_addr1')->nullable()->comment('Street address for contact 1');
            $table->string('city1')->nullable()->comment('City for contact 1');
            $table->string('postal_code1')->nullable()->comment('Postal code for contact 1');
            $table->string('province1')->nullable()->comment('Provinc for contact 1');
            $table->string('country1')->nullable()->comment('Country for contact 1');
            $table->text('contact_notes1')->nullable()->comment('Special notes on this customer');
            $table->tinyInteger('relation2')->nullable()->comment('Personal customers only. The relation of this person to this customer like Sole Person, Bride, Groom, Wife or the rest');
            $table->string('mr_mrs2')->nullable()->comment('Title of this customer like Mr. or Dr.');
            $table->string('first_name2')->nullable()->comment('First name of for this contact');
            $table->string('last_name2')->nullable()->comment('Last name for this contact');
            $table->string('main_email2')->nullable()->comment('Primary email address for this contact');
            $table->string('alt_email2')->nullable()->comment('Alternate email for this contact');
            $table->string('branch2')->nullable()->comment('The branch under this customer where this contact works');
            $table->string('department2')->nullable()->comment('The department where this contact is working');
            $table->string('position2')->nullable()->comment('The position name of this contact within the company');
            $table->tinyInteger('contact_level2')->nullable()->comment('The level of this contact like Executive or others');
            $table->string('phone2')->nullable()->comment('Client phone number');
            $table->string('fax2')->nullable()->comment('Client Fax');
            $table->string('cell_phone2')->nullable()->comment('Cleint Cell Phone');
            $table->string('street_addr2')->nullable()->comment('Street address for contact 2');
            $table->string('city2')->nullable()->comment('City for contact 2');
            $table->string('postal_code2')->nullable()->comment('Postal code for contact 2');
            $table->string('province2')->nullable()->comment('Provinc for contact 2');
            $table->string('country2')->nullable()->comment('Country for contact 2');
            $table->text('contact_notes2')->nullable()->comment('Special notes on this customer');
            $table->integer('lnk_user_insert')->nullable()->comment('User who inserted this record');
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
        Schema::dropIfExists('customer_temporares');
    }
};
