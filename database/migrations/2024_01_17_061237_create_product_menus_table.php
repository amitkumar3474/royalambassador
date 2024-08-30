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
        Schema::create('product_menus', function (Blueprint $table) {
            $table->id()->comment('Primary Key');
            $table->integer('lnk_product_gen')->nullable()->comment('The link to the product_gen table');
            $table->string('usage_type')->nullable()->comment('Usage of this product which is a multi-select of In-house Banquet, In-house Restaurant, Online Banquet, Online Restaurant');
            $table->integer('show_order')->nullable()->comment('Sometimes we need special ordering for itesms. Specially for dependant products on the catering web site. In such cases, this column provides that show order');
            $table->tinyInteger('is_line_item')->nullable()->comment('Shows if this item is a line item or not. Line items do not affect the price person and are added separately');
            $table->tinyInteger('combo_use_only')->nullable()->comment('If this flag is set to yes, it means this item should not appear in the menu items. Say we have many different types of salads that are used in the combo and get deactivated after a while. If we show them online, then there will be too many');
            $table->integer('lnk_liquor_list')->nullable()->comment('If this is item is related to a liquor list, like Deluxe Bar, it means that if customer has picked this item, then we have to check all the liquors in that list to the event');
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
        Schema::dropIfExists('product_menus');
    }
};
