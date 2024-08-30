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
        Schema::create('staff_schedules', function (Blueprint $table) {
            $table->id()->comment('Primary Key');
            $table->integer('lnk_staff')->nullable()->comment('The staff to which this record is related');
            $table->string('schedule_month', 7)->nullable()->comment('The related month for this schedule. YYYY-MM format');
            $table->float('total_hours', 7, 4)->nullable()->comment('Total hours scheduled for this staff on this month');
            $table->text('schedule_notes')->nullable()->comment('Any notes about this schedule for this month');
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
        Schema::dropIfExists('staff_schedules');
    }
};
