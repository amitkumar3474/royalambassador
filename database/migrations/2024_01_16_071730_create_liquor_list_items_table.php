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
        Schema::create('liquor_list_items', function (Blueprint $table) {
            $table->id()->comment('Primary Key');
            $table->integer('lnk_liquor_list')->comment('Link to the list to which this item belong');
            $table->integer('lnk_product')->nullable()->comment('The liquor product that will be on the list. Linked to PRODUCT_GEN for the products of type liquor');
            $table->float('qty', 4, 1)->nullable()->comment('Qty of this item in the list');
            $table->integer('show_order')->nullable()->comment('Order by which this item should show on the list');
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
        Schema::dropIfExists('liquor_list_items');
    }
};
