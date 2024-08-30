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
        Schema::create('liquor_moves', function (Blueprint $table) {
            $table->id()->comment('Primary Key');
            $table->integer('lnk_by_user')->nullable()->comment('The user who is performing this move');
            $table->integer('lnk_from_bar')->nullable()->comment('If we are moving the items to a bar either from inventory or from another bar, this column provides the link to that bar. Linked to LIQOUR_BAR');
            $table->integer('lnk_to_bar')->nullable()->comment('If we are moving the items from a bar either to inventory or to another bar, this column provides the link to that bar. Linked to LIQOUR_BAR');
            $table->integer('lnk_from_inv_level')->nullable()->comment('If we are moving an item from one warehouse location to another or to a bar, then this column keeps the original location. Linked to INV_LEVEL');
            $table->integer('lnk_to_inv_level')->nullable()->comment('If we are moving item from a bar or another location to a location then this column keeps the id of the destination location. Linked to INV_LEVEL');
            $table->integer('lnk_product')->nullable()->comment('The product that was consumed. Linked to PRODUCT_GEN');
            $table->char('move_status', 1)->nullable()->comment('Gives us the status of this item. The idea is that when we add items the status will be Being Moved. Then when user completes the move, the status is Moved. Then because we do not delete these records, we can get a report on how many times and by who the items where moved. ');
            $table->integer('packs_taken')->nullable()->comment('Total number of packages of this product taken to this event');
            $table->float('singles_taken', 5, 2)->nullable()->comment('Total number of singles of this product taken to this event');
            $table->float('total_qty')->nullable()->comment('Total qty that was taken for this product and event. This is derived from all packages taken plus singles taken');
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
        Schema::dropIfExists('liquor_moves');
    }
};
