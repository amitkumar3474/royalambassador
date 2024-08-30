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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name')->nullable()->comment('Name of this customer. If this is a corporate customer, then this is the business name. If personal it is the concat of first name and last name or say The Smiths Family.');
            $table->tinyInteger('customer_type')->default(1)->nullable()->comment('Business or personal customer');
            $table->integer('lnk_marketing_campaign')->nullable()->comment('The related marketing campaign');
            $table->string('general_email')->nullable()->comment('General mail box for this customer. Mainly for business customers like info#@companyurl.com');
            $table->tinyInteger('no_of_emps')->nullable()->comment('Number of employees for business customers');
            $table->string('web_url')->nullable()->comment('Web site of this customer if any');
            $table->text('special_notes')->nullable()->comment('Special notes on this customer');
            $table->integer('lnk_org_account_owner')->nullable()->comment('The original owner of this account that shows who has brought this account into the company. Linked to SYS_USER');
            $table->integer('lnk_cur_account_owner')->nullable()->comment('The current account owner of this customer. This person will get the commission on this account if ALLOW_COMMISSION is YES. Linked to SYS_USER');
            $table->tinyInteger('acct_owner_fixed')->nullable()->comment('After we change the current account owner for this customer, it can not be changed afterwards unless by an admin. This column tells us if the account owner has been fixed or not');
            $table->text('acct_owner_change_hist')->nullable()->comment('The history of changes to account owner');
            $table->tinyInteger('allow_commission')->nullable()->comment('Is commission allowed for the sales people on this customer or not.');
            $table->string('monchify_id')->nullable()->comment('The unique id of this record in Monchify used to synch between the two');
            $table->float('acct_balance')->nullable()->comment('The current balance on this customer account');
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
        Schema::dropIfExists('customers');
    }
};
