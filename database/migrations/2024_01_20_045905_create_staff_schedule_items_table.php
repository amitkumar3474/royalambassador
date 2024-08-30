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
        Schema::create('staff_schedule_items', function (Blueprint $table) {
            $table->id()->comment('Primary Key');
            $table->integer('lnk_staff_schedule')->comment('The main monthly schedult to which this line is related');
            $table->tinyInteger('schedule_type')->nullable()->comment('Type of this day like Regular working day, public holiday, full day vacation, hourly vacation or day off. ');
            $table->date('schedule_date')->nullable()->comment('Date of this work schedule');
            $table->dateTime('sch_start_dt')->nullable()->comment('The date and time when this schedule starts, say when staff starts working or hourly vacation starts. The date part is always the same as SCHED_DATE and we have it here to be similar to END_DT column');
            $table->dateTime('sch_end_dt')->nullable()->comment('The date and time when this schedule finishes like finish working or finish hourly vacation. The date component can be one day after the SCHED_DATE. Say the person works until 1am the next morning but we still consider it for previous day');
            $table->float('total_hours', 7, 4)->nullable()->comment('The total expected hours of work on this day');
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
        Schema::dropIfExists('staff_schedule_items');
    }
};
