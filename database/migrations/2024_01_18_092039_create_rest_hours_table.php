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
        Schema::create('rest_hours', function (Blueprint $table) {
            $table->id()->comment('Primary Key');
            $table->dateTime('start_dt')->nullable()->comment('Restaurant will be open from this time');
            $table->dateTime('end_dt')->nullable()->comment('Restaurant closes on this date and time');
            $table->tinyInteger('open_for')->nullable()->comment('Is restaurant open for dinner or lunch on this hour');
            $table->integer('max_adults')->nullable()->comment('Maximum number of adults allowed during this time period. Beyond that, customer has to call to book his/her spot');
            $table->integer('max_reservations')->nullable()->comment('Maximum number of bookings allowed during this time period. Beyond that, customer has to call to book his/her spot');
            $table->text('special_notes')->nullable()->comment('Special notes if any for this hours of operation');
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
        Schema::dropIfExists('rest_hours');
    }
};
