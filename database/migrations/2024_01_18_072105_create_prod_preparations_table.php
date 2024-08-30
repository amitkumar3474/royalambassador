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
        Schema::create('prod_preparations', function (Blueprint $table) {
            $table->id()->comment('Primary Key');
            $table->integer('lnk_main_product')->nullable()->comment('The main product. Linked to PRODUCT_GEN');
            $table->integer('lnk_single_portion_for')->nullable()->comment('Sometimes a preparation is a single portion for another one. Say we prepare chicken for 4 people and customer wants to order for 5. In that case they pick the top and then then single portion. ');
            $table->mediumText('prep_desc')->nullable()->comment('Description of this preparation');
            $table->string('usage_type', 35)->nullable()->comment('Usage of this preparation which is a multi-select of In-house Banquet, In-house Restaurant, Online Banquet, Online Restaurant');
            $table->tinyInteger('is_active')->nullable()->comment('Tells us if this item is still active or not');
            $table->tinyInteger('unit_of_measure')->nullable()->comment('Sometimes the unit of measure of a preparation is different from the product. In that case, we put it here');
            $table->tinyInteger('numbers_served')->nullable()->comment('Numbers served for this specific preparation');
            $table->integer('pieces_per_serving')->nullable()->comment('Pieces per serving is used for items like bread. Say for each serving, we need two pieces of garlic bread so this way we calculate how many of each piece the kitchen should make');
            $table->double('price_bq_inhouse')->nullable()->comment('Banquet price for inhouse events');
            $table->double('price_bq_catering')->nullable()->comment('Banquet price for catering events');
            $table->double('price_rstn_inhouse')->nullable()->comment('Restaurant price for inhouse events');
            $table->double('price_rstn_catering')->nullable()->comment('Restaurant price for catering events');
            $table->integer('show_order')->nullable()->comment('Show order of the preparation within the main product');
            $table->tinyInteger('combo_use_only')->nullable()->comment('Is it only for combo use only or not. If yes, then will not show when user adds the item to the order. Only when adding the main item to a combo, it will show');
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
        Schema::dropIfExists('prod_preparations');
    }
};
