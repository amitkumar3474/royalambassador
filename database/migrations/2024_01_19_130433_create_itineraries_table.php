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
        Schema::create('itineraries', function (Blueprint $table) {
            $table->id()->comment('Primary Key');
            $table->integer('lnk_event')->comment('The event to which this itinerary belongs');
            $table->integer('lnk_itin_tmpl')->comment('When creating an itinerary, we copy the xml content from the template and this column keeps the link to that temlate. Linked to ITINERARY_TMPL');
            $table->longText('itin_content_xml')->nullable()->comment('The itinerary stored as XML which is then parsed and shown on screen');
            $table->text('itin_values_json')->nullable()->comment('The values that user or customer has filled in for each input on itinerary will be stored here as a json string');
            $table->char('itin_status', 1)->nullable()->comment('The status of this itinerary like preparation or sent to customer or completed by customer');
            $table->integer('lnk_user_status')->nullable()->comment('User who last changed the status');
            $table->dateTime('dt_status_changed')->nullable()->comment('Date and time when the status changed');
            $table->text('submit_history')->nullable()->comment('A text history for the submission hstory. This is filled in by the system and shows when the itinerary was submitted to  customer or when completed or reclaimed back by or from customer');
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
        Schema::dropIfExists('itineraries');
    }
};
