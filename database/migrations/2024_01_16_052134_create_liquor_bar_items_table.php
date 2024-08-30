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
        Schema::create('liquor_bar_items', function (Blueprint $table) {
            $table->id()->comment('Primary Key');
            $table->integer('lnk_liquor_bar')->comment('Link to the bar where this item belongs');
            $table->integer('lnk_product')->nullable()->comment('The product that was consumed. Linked to PRODUCT_GEN');
            $table->float('qty_total')->nullable()->comment('Total qty of this liquour item that was moved to this bar via any number of moves');
            $table->float('qty_current')->nullable()->comment('Current qty of this item at this bar. This columns works great only if bartender touches the screen each time he/she serves the item so the supervisor can bring more. Otherwise it only shows the number that was moved in minus the number that was moved out. Then after bar is closed, this number becomes zeros');
            $table->float('empties_returned')->nullable()->comment('Number of empty bottles returned after the bar is closed');
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
        Schema::dropIfExists('liquor_bar_items');
    }
};
