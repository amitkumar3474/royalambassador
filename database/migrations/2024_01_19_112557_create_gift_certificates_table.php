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
        Schema::create('gift_certificates', function (Blueprint $table) {
            $table->id()->comment('Primary Key');
            $table->integer('lnk_buyer')->nullable()->comment('Customer who bought this certificate. Linked to CUSTOMER table');
            $table->integer('lnk_buyer_contact')->nullable()->comment('The contact under the buyer who has purchased this gift certificate. Linked to CUSTOMER_CONTACT table');
            $table->integer('lnk_marketing_campaign')->nullable()->comment('The marketing campaign by which we got this event. It is by defalt the same as customer, however it is possible that we get an old customer via a new campaign');
            $table->string('serial_no', 15)->nullable()->comment('The serial / on the gift certificate');
            $table->float('face_value', 5, 2)->nullable()->comment('The original value of this gift certificate');
            $table->float('cur_balance', 5, 2)->nullable()->comment('The current balance on this gift certificate after user spends');
            $table->tinyInteger('purchase_type')->nullable()->comment('Is it purchased or is a complimentary gift');
            $table->date('purchase_date')->nullable()->comment('Date when this gift certifacte was purchased');
            $table->tinyInteger('is_redeemed')->nullable()->comment('Is this gift certificate already redeemed or not');
            $table->integer('lnk_redeemer')->nullable()->comment('The customer who has redeemed this certificate. Linked to customer table.');
            $table->integer('lnk_redeemer_contact')->nullable()->comment('The contact under redeeming customer who is redeeming this gift certificate. Linked to CUSTOMER_CONTACT table');
            $table->date('date_redeemed')->nullable()->comment('Date when this gift certificate was redeemed in full');
            $table->tinyInteger('is_stopped')->nullable()->comment('Is this gift certificate stopped or not. Say when it is lost, customer can report a loss and we can put a stop on it.');
            $table->string('stop_notes', 512)->nullable()->comment('Stop notes if any');
            $table->integer('lnk_user_stop')->nullable()->comment('User who has changed this gift certificate to stopped status');
            $table->string('special_notes', 2048)->nullable()->comment('Special notes');
            $table->integer('lnk_user_insert')->nullable()->comment('User who first created this record');
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
        Schema::dropIfExists('gift_certificates');
    }
};
