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
        Schema::create('customer_branches', function (Blueprint $table) {
            $table->id();
            $table->integer('lnk_customer')->comment('The customer to which this branch is related');
            $table->string('branch_name')->nullable()->comment('Name of this branch or loaction');
            $table->tinyInteger('no_of_emps')->nullable()->comment('Number of employees for business customers');
            $table->string('street_addr')->nullable()->comment('Street address or name');
            $table->string('city')->nullable()->comment('City where this client company is');
            $table->string('postal_code')->nullable()->comment('Postal Code');
            $table->string('province')->nullable()->comment('Province or State where this client company is');
            $table->string('country')->nullable()->comment('Country where this client company is');
            $table->string('phone')->nullable()->comment('Client phone number');
            $table->string('fax')->nullable()->comment('Client Fax');
            $table->string('web_url')->nullable()->comment('Web site of this customer if any');
            $table->text('branch_notes')->nullable()->comment('Special notes on this branch if any');
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
        Schema::dropIfExists('customer_branches');
    }
};
