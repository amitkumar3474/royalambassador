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
        Schema::create('liquor_checkout_items', function (Blueprint $table) {
            $table->id()->comment('Primary Key');
            $table->integer('lnk_liquor_checkout')->comment('Link to the main liquor checout record that is in turn linked to event and the room for which the items are checked out');
            $table->integer('lnk_product')->nullable()->comment('The product that was consumed. Linked to PRODUCT_GEN');
            $table->float('qty_taken')->nullable()->comment('Total qty that was taken for this product and event. This is derived from all packages taken plus singles taken');
            $table->float('qty_returned')->nullable()->comment('Qty that was returned back to inventory after event was done');
            $table->float('empties_returned')->nullable()->comment('Number of empty bottles returned after the event is done');
            $table->float('qty_used')->nullable()->comment('The qty of this product that was used at the event');
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
        Schema::dropIfExists('liquor_checkout_items');
    }
};
