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
        Schema::create('prod_combos', function (Blueprint $table) {
            $table->id()->comment('Primary Key');
            $table->integer('lnk_main_product')->nullable()->comment('The main product. Linked to PRODUCT_GEN');
            $table->integer('lnk_product_used')->nullable()->comment('The product that is being used in the combo');
            $table->integer('lnk_prep_used')->nullable()->comment('If we are using a specific preparation of the product in the combo, then this column provides the link to the preparation. Linked to PROD_PREPARATION');
            $table->float('qty_used', 5, 1)->nullable()->comment('Qty used in the main product. Say for a combo, we have two drink and one medium fries');
            $table->char('size_used', 1)->nullable()->comment('Size of the item in the combo like medium or 4 oz');
            $table->tinyInteger('order_in_combo')->nullable()->comment('The order by which to show this item in the combo');
            $table->integer('lnk_user_insert')->nullable()->comment('User who inserted this record if any');
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
        Schema::dropIfExists('prod_combos');
    }
};
