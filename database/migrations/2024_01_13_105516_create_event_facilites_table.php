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
        Schema::create('event_facilites', function (Blueprint $table) {
            $table->id()->comment('Primary Key');
            $table->integer('lnk_event')->comment('Event to which this record is related');
            $table->integer('lnk_facility')->comment('Facility to which this record is related');
            $table->tinyInteger('max_concurrent_events')->nullable()->comment('Max number of events that can run in this facility at the same time. This is by default the same as FACILITY record, however user can change it at will to any number which is bigger than default. All the facility usages that have overlapping time have to have the same value for this column.');
            $table->integer('lnk_pricing')->nullable()->comment('The pricing option used for this facility');
            $table->tinyInteger('is_main_room')->nullable()->comment('Tells us if this is the main room for this event or not. This is used when editing the event as well as on the report Room by Contract Type. In case full Embassy, both Embassy East and West will be main');
            $table->float('sub_total')->nullable()->comment('The price for this facility');
            $table->float('tax1_amount')->nullable()->comment('Tax 1 applied to this facility pricing');
            $table->float('tax2_amount')->nullable()->comment('Tax 2 amount applied to this facility pricing');
            $table->float('grand_total')->nullable()->comment('The grand total after taxes');
            $table->float('revenue_percent')->nullable()->comment('The percentage of revenue that goes to this facility');
            $table->dateTime('start_date_time')->nullable()->comment('Date and time when this event starts in this facility');
            $table->dateTime('end_date_time')->nullable()->comment('Date and time when this event ends in this facility');
            $table->tinyInteger('same_timing_as_event')->nullable()->comment('Tells us if the timing for this room should be the same as event. If yes, then when user changes timing of the event, we also automatically change the room timing');
            $table->string('special_notes')->nullable()->comment('Special notes or instruction for this event in this facility');
            $table->text('contract_terms')->nullable()->comment('Extra terms and conditions to be added to the event becuase customer has picked this facility');
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
        Schema::dropIfExists('event_facilites');
    }
};
