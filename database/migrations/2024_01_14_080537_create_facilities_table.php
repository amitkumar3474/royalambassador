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
        Schema::create('facilities', function (Blueprint $table) {
            $table->id()->comment('Primary Key');
            $table->string('facility_name')->nullable()->comment('Name of this facility or room');
            $table->string('abbreviation')->nullable()->comment('Abbreviated name for this facility used in the event calendar');
            $table->string('lnk_child_facilities')->nullable()->comment('If this facility can be broken into more than one, say a bigger room that can be separated by wall into two then here we will keep the UID of those child facilities.');
            $table->integer('max_capacity')->nullable()->comment('Maximum number of people this room can fit');
            $table->tinyInteger('max_concurrent_events')->nullable()->comment('Maximum number of concurrent events that can take place in this facility');
            $table->text('contract_terms')->nullable()->comment('Extra contract terms and conditions that should be added to the event terms and conditions if customer picks this facility');
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
        Schema::dropIfExists('facilities');
    }
};
