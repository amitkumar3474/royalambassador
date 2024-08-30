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
        Schema::create('catering_temporaries', function (Blueprint $table) {
            $table->id()->comment('The UID of this Customer Temporary record');
            $table->string('bil_first_name', 30)->nullable()->comment('The customer First Name');
            $table->string('bil_last_name', 30)->nullable()->comment('The customer Last Name');
            $table->string('bil_street', 80)->nullable()->comment('The customer billing strret address');
            $table->string('bil_city', 30)->nullable()->comment('The customer billing city');
            $table->tinyInteger('bil_province')->nullable()->comment('The customer billing Province');
            $table->string('bil_postal', 12)->nullable()->comment('The customer billing Postal Code');
            $table->string('bil_phone', 15)->nullable()->comment('The customer billing Phone Number');
            $table->string('bil_email', 40)->nullable()->comment('The customer billing EMail address');
            $table->tinyInteger('bil_allow_email')->nullable()->comment('Allow sending promotional emails or not');
            $table->string('del_same_as_bil', 34)->nullable()->comment('The Shipping info is the same as the billing info');
            $table->string('del_first_name', 30)->nullable()->comment('The delivery First Name');
            $table->string('del_last_name', 30)->nullable()->comment('the delivery Last Name');
            $table->string('del_street', 80)->nullable()->comment('The delivery Street');
            $table->string('del_city', 30)->nullable()->comment('the delivery City');
            $table->tinyInteger('del_province')->nullable()->comment('The delivery Province');
            $table->string('del_postal', 12)->nullable()->comment('The delivery Postal Code');
            $table->string('del_phone', 15)->nullable()->comment('Delivery Phone number');
            $table->tinyInteger('delivery_type')->nullable()->comment('Delivery type: Delivery or Pick-up');
            $table->dateTime('delivery_date')->nullable()->comment('The delivery/pickup Date and Time');
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
        Schema::dropIfExists('catering_temporaries');
    }
};
