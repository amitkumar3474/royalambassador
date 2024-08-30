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
        Schema::create('supplier_products', function (Blueprint $table) {
            $table->id();
            $table->integer('lnk_supplier')->comment('The supplier that is supplying this item.');
            $table->integer('lnk_product')->nullable()->comment('The product that is supplied by this supplier');
            $table->integer('lnk_po_receive_item')->nullable()->comment('If this price was added as a result of receiving a purchase order, then this provides the link to that receive item that will finally link to the Purchase Order');
            $table->string('vendor_part_num')->nullable()->comment('The vendor part number for this product by this vendor if any');
            $table->string('vendor_prod_name')->nullable()->comment('The name given to this product by this vendor if any');
            $table->float('price')->nullable()->comment('The last price or offer price for this product by this vendor. If there was a PO recived on this item, then the price is updated based on the PO price');
            $table->float('avg_price')->nullable()->comment('The average price of this item as provided by this vendor. If this item is received via a purchase order, then this average price is calculated automatically.');
            $table->text('price_desc')->nullable()->comment('A description on how this price was updated or added. Say it was an uploaded price list or it was added as a result of a po receive');
            $table->integer('lnk_user_insert')->nullable()->comment('User who first inserted this record');
            $table->integer('lnk_user_update')->nullable()->comment('user who last updated this record');
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
        Schema::dropIfExists('supplier_products');
    }
};
