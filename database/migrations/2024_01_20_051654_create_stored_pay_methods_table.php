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
        Schema::create('stored_pay_methods', function (Blueprint $table) {
            $table->id()->comment('Primary Key');
            $table->integer('lnk_customer')->comment('The customer for which this payment method is stored');
            $table->string('cc_number', 20)->nullable()->comment('Credit card number');
            $table->tinyInteger('cc_type')->nullable()->comment('Type of credit card that is being stored');
            $table->string('cc_expiry', 7)->nullable()->comment('Credit card expiry YY/MM');
            $table->string('cc_security', 4)->nullable()->comment('Security code on the credit card that is needed to process a transaction');
            $table->string('acct_holder_name', 80)->nullable()->comment('Name of the account holder company or personal name');
            $table->text('system_notes')->nullable()->comment('Extra notes generated automatically by system');
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
        Schema::dropIfExists('staff_stored_pay_methods');
    }
};
