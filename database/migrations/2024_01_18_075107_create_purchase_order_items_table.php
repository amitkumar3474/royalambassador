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
        Schema::create('purchase_order_items', function (Blueprint $table) {
            $table->id()->comment('Primary Key');
            $table->integer('lnk_purchase_order')->comment('The purchase order to which this item belongs');
            $table->integer('row_num')->nullable()->comment('Row number of this item within this purchase order');
            $table->integer('lnk_product')->nullable()->comment('The product that is being ordered if already in PRODUCT_GEN table. Linked to PRODUCT_GEN. Sometimes user only adds the product name and places the order. In these cases this column is null and product is not linked to any known product. Say we normally order to this supplier and this time we want to buy say an office supply as well from the same supplier. In this case this column is null.');
            $table->integer('lnk_prod_vintage')->nullable()->comment('If we are ordering specific vintage of this item, then this column keeps that. Linked to PRODUCT_GEN');
            $table->string('product_sku', 34)->nullable()->comment('The current SKU or part number of the product being ordered');
            $table->string('product_name', 120)->nullable()->comment('Product name. If lnk_product is set, this will come from poduct table by default');
            $table->string('vendor_part_num', 32)->nullable()->comment('The supplier part # for this item being ordered. If this record is not linked to any product in PRODUCT_GEN table, then user might want to enter this feild manually say to order somethign that we order only once in a blue moon.');
            $table->string('vendor_prod_name', 120)->nullable()->comment('The name given to this product by the vendor if any');
            $table->tinyInteger('unit_of_measure')->nullable()->comment('The unit of measurement for this item that is received. By default it comes from the original product being ordered');
            $table->integer('lnk_package_type')->nullable()->comment('If we are ordering by package, then this column provides the link to the package type');
            $table->string('package_name', 30)->nullable()->comment('Name of the ordered package. We save it here to make sure the future changes to original package will not affect it');
            $table->float('package_capacity', 6, 2)->nullable()->comment('The capacity of the package. Stored here to make sure the changes to the original package will not afftect here');
            $table->float('num_packs', 6, 1)->nullable()->comment('Number of packages that we are ordering if ordering by package');
            $table->float('order_qty', 9,3)->nullable()->comment('The qty that we order for this product. The reason that it is a float is in case we may order something non-discrete item in future.');
            $table->float('receive_qty', 9, 3)->nullable()->comment('Qty recieved from this purchase order item');
            $table->float('remain_qty', 9, 3)->nullable()->comment('Remaining qty from this item that has not been received yet');
            $table->tinyInteger('item_receive_status')->nullable()->comment('The receive status for this line like Fully Received, Partially Received or Not-Received');
            $table->float('price_per_pack')->nullable()->comment('If we are ordering by package, then this column gives us the price per individual package');
            $table->float('unit_price')->nullable()->comment('The price in which we are buying this item in the host currency and not the currency of the vendor');
            $table->float('sub_total')->nullable()->comment('Subtotal before taxes for this item of the purchasing short list in the currency of the host company and not the vendor currency');
            $table->float('tax1_amount')->nullable()->comment('Aamount of tax1 that applies to this PO line');
            $table->float('tax2_amount')->nullable()->comment('Aamount of tax2 that applies to this PO line');
            $table->float('tax3_amount')->nullable()->comment('Aamount of tax3 that applies to this PO line');
            $table->float('other_fees')->nullable()->comment('Extra fees like environment or deposit fee for liquor that are not taxable');
            $table->float('grand_total', 9, 2)->nullable()->comment('Grand total after taxes');
            $table->string('po_item_notes')->nullable()->comment('Extra notes for this item if any');
            $table->date('date_required')->nullable()->comment('The date when we need this product for.');
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
        Schema::dropIfExists('purchase_order_items');
    }
};
