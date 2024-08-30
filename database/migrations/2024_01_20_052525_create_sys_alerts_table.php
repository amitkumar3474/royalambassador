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
        Schema::create('sys_alerts', function (Blueprint $table) {
            $table->id()->comment('Key');
            $table->integer('lnk_event')->comment('The event for which this alert is generated');
            $table->string('lnk_for_user', 11)->nullable()->comment('The user for whom this alert is generated');
            $table->string('how_gen_details')->nullable()->comment('Details of how this alert was generated');
            $table->text('alert_title')->nullable()->comment('Title or text of the alert');
            $table->char('alert_status', 1)->nullable()->comment('The status of the alert: active or cleared');
            $table->dateTime('dt_generated')->nullable()->comment('Date and time when this alert was generated');
            $table->dateTime('dt_cleared')->nullable()->comment('Date and time when this alert was cleared by user');
            $table->integer('lnk_user_cleared')->nullable()->comment('User who cleared the alert, Linked to SYS_USER');
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
        Schema::dropIfExists('sys_alerts');
    }
};
