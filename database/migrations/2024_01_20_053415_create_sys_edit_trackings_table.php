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
        Schema::create('sys_edit_trackings', function (Blueprint $table) {
            $table->id()->comment('Primary Key');
            $table->char('action_type', 1)->nullable()->comment('Type of action that we are tracking like Insert, Update or Delete');
            $table->string('tracked_table', 90)->nullable()->comment('Name of the table that we are tracking');
            $table->integer('lnk_tracked_rec')->nullable()->comment('UID of the record that is beign track');
            $table->string('changed_columns', 1024)->nullable()->comment('Name of the columns that have changed in the target table, separated by semi-colon. Is null in case of delete');
            $table->longText('change_details_xml')->nullable()->comment('The details of the changes. This is an XML that shows column name, old value and new value');
            $table->dateTime('edit_date_time')->nullable()->comment('Date and time when this edit has taken place');
            $table->integer('lnk_user_edit')->nullable()->comment('The person who performed the edits');
            $table->char('action_status', 1)->nullable()->comment('In some cases an action is required on an edit. Say when user changes a record, admin should take some other actions. This field tells us if an action is required or already taken care of.');
            $table->dateTime('date_time_cleared')->nullable()->comment('If this edit has to be cleared, (say sent to another system) then this column shows when it was cleared');
            $table->integer('lnk_user_clear')->nullable()->comment('The user who has cleared this action if any');
            $table->string('clear_notes')->nullable()->comment('Any note when clearing this edit say it was exported to another system and synchronized with another program');
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
        Schema::dropIfExists('sys_edit_trackings');
    }
};
