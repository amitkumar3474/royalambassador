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
        Schema::create('rest_schedules', function (Blueprint $table) {
            $table->id()->comment('Primary Key');
            $table->char('sch_usage', 1)->nullable()->comment('Usage of this schedule. Is it to create weekly schedule or should only show on the restaurant web site as text');
            $table->char('sch_venue', 1)->nullable()->comment('Tells us if this is for banquet or restaurant side. Only used for public showing');
            $table->tinyInteger('day_of_week')->nullable()->comment('Day of week this open hour is related to');
            $table->time('from_time')->nullable()->comment('From when restaurant is open on this day');
            $table->time('to_time')->nullable()->comment('To when restaurant is open on this day of week');
            $table->tinyInteger('open_for')->nullable()->comment('Is restaurant open for dinner or lunch on this hour');
            $table->integer('max_adults')->nullable()->comment('If more than these many adults or guests have been booked for this given time, then customer has to either book for another time or call to arrange');
            $table->integer('max_reservations')->nullable()->comment('If more than these many reservations have been already booked for this given time, then customer has to either book for another time or call to arrange');
            $table->integer('lnk_user_insert')->nullable()->comment('User who first inserted this record');
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
        Schema::dropIfExists('rest_schedules');
    }
};
