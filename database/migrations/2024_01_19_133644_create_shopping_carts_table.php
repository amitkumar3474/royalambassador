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
        Schema::create('shopping_carts', function (Blueprint $table) {
            $table->id()->comment('Primary Key');
            $table->string('session_id', 40)->nullable()->comment('Session Id of the current session. Is mainly used when user has not logged in');
            $table->string('unique_node_id', 30)->nullable()->comment('The unique id given to node when added to shopping cart array');
            $table->integer('lnk_product_gen')->nullable()->comment('The product that is being purchased.');
            $table->integer('lnk_prod_preparation')->nullable()->comment('If this item has preparation as well, then this link provides that.');
            $table->integer('lnk_parent_item')->nullable()->comment('If this is an extra option for another item that was already in the cart, then this column provides the link. Linked to SHOPPING_CART');
            $table->integer('lnk_additional_serving_for')->nullable()->comment('If this is an additional serving for a combo that was previously added to the cart, then this column provides the link to that main record. Linked to SHOPPING_CART');
            $table->char('catering_type', 1)->nullable()->comment('This flag tells us if this item was added to shopping cart via restaurant order or banquet order');
            $table->integer('lnk_event_item')->nullable()->comment('Sometimes we need to manage an event that has been already created by staff via the shopping cart. In such cases we copy every event item to this table this column provides the link to the original EVENT_ITEM record. This way we can later upadate the existing event item');
            $table->string('item_notes', 180)->nullable()->comment('Special notes for this item as set by customer');
            $table->integer('qty')->nullable()->default(0)->comment('Quantity being ordered');
            $table->double('unit_price')->nullable()->comment('Price of the item being purchased');
            $table->float('sub_total')->nullable()->default(0.00)->comment('sub-total for the order');
            $table->integer('lnk_user_insert')->nullable()->comment('User under which this record was created if any');
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
        Schema::dropIfExists('shopping_carts');
    }
};
