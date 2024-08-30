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
        Schema::create('staff_schedule_plans', function (Blueprint $table) {
            $table->id()->comment('Primary Key');
            $table->integer('lnk_staff')->comment('The staff to whom this time plan is related');
            $table->tinyInteger('day_of_week')->nullable()->comment('Day of week for this plan item');
            $table->time('start_time')->nullable()->comment('The time that staff starts working');
            $table->time('end_time')->nullable()->comment('The time that staff finishes working');
            $table->mediumInteger('repeat_each_week')->nullable()->comment('Tells us if this plan repeats every week or say every 2 weeks. By default every week');
            $table->tinyInteger('is_off')->nullable()->comment('Is this staff off on this day or not');
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
        Schema::dropIfExists('staff_staff_schedule_plans');
    }
};
