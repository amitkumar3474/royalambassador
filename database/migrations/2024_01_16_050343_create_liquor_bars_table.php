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
        Schema::create('liquor_bars', function (Blueprint $table) {
            $table->id()->comment('Primary Key');
            $table->integer('lnk_event')->comment('Event to which this item is added');
            $table->integer('lnk_facility')->comment('The facility or room where this group of liquor is checked out to');
            $table->integer('lnk_bartender')->comment('The bartender or person in charge whos is taking these items');
            $table->char('bar_status', 1)->nullable()->comment('The status of this bar which is either open or closed. We can not close the bar if there are items in it');
            $table->string('bar_notes')->nullable()->comment('User initiated notes if any');
            $table->text('bar_close_log')->nullable()->comment('When we close a bar, we keep the log of what was originally in the bar so in case they want to re-open it they can put all back and re-open it say for correction');
            $table->text('system_notes')->nullable()->comment('System generated notes if any');
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
        Schema::dropIfExists('liquor_bars');
    }
};
