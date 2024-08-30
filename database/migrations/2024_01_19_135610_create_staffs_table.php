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
        Schema::create('staffs', function (Blueprint $table) {
            $table->id()->comment('Primary Key');
            $table->string('first_name', 40)->nullable()->comment('staff first name');
            $table->string('last_name', 40)->nullable()->comment('staff last name');
            $table->string('email', 50)->nullable()->comment('staff email');
            $table->string('departments', 120)->nullable()->comment('Departments of this person like kitchen or sales or event management');
            $table->tinyInteger('staff_status')->nullable()->comment('The status of this staff like at work, left or on long term leave');
            $table->tinyInteger('is_on_calendar')->nullable()->comment('Is this employee on the scheduling and task calendar or not.');
            $table->integer('lnk_user')->nullable()->comment('If this person is allowed to login, the related user for him');
            $table->tinyInteger('is_on_commission')->nullable()->comment('if this staff has commission');
            $table->text('email_signature')->nullable()->comment('The signature of this member of staff as it should appear at the bottom of the emails');
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
        Schema::dropIfExists('staffs');
    }
};
