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
        Schema::create('liquor_checkouts', function (Blueprint $table) {
            $table->id()->comment('Primary Key');
            $table->integer('lnk_event')->comment('Event to which this item is added');
            $table->integer('lnk_facility')->comment('The facility or room where this group of liquor is checked out to');
            $table->integer('lnk_bartender')->nullable()->comment('The bartender or person in charge whos is taking these items');
            $table->tinyInteger('checkout_status')->nullable()->comment('The status of this checkout like Preparation which means they are adding items to the cart and then Moved to Event and then Returned and Closed');
            $table->dateTime('checkout_started')->nullable()->comment('Date and time when the bartender started adding items to the cart ');
            $table->dateTime('checkout_finished')->nullable()->comment('Date and time when bartender finished adding items to the cart and moved the cart to the facility where event is happening');
            $table->string('checkout_notes')->nullable()->comment('Related notes for this checkout if any');
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
        Schema::dropIfExists('liquor_checkouts');
    }
};
