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
        Schema::create('po_slist_menus', function (Blueprint $table) {
            $table->id()->comment('Primary Key');
            $table->integer('lnk_supplier')->nullable()->comment('If this item is already linked to PRODUCT_GEN, then we already know the supplier. Otherwise user has to manually enter the supplier here. Linked to SUPPLIER');
            $table->integer('lnk_product')->nullable()->comment('The product that is being ordered if already in PRODUCT_GEN table. Linked to PRODUCT_GEN. Sometimes user only adds the product name and places the order. In these cases this column is null and product is not linked to any known product. Say we normally order to this supplier and this time we want to buy say an office supply as well from the same supplier. In this case this column is null.');
            $table->string('product_name', 120)->nullable()->comment('Product name. If lnk_product is set, this will come from poduct table by default');
            $table->string('vendor_part_num', 32)->nullable()->comment('The supplier part # for this item being ordered. If this record is not linked to any product in PRODUCT_GEN table, then user might want to enter this feild manually say to order somethign that we order only once in a blue moon.');
            $table->string('vendor_prod_name', 120)->nullable()->comment('The name given to this product by the vendor if any');
            $table->float('order_qty', 9, 2)->nullable()->comment('The qty that we order for this product. The reason that it is a float is in case we may order something non-discrete item in future.');
            $table->float('unit_price')->nullable()->comment('The price in which we are buying this item in the host currency and not the currency of the vendor');
            $table->float('sub_total')->nullable()->comment('Subtotal before taxes for this item of the purchasing short list in the currency of the host company and not the vendor currency');
            $table->text('reason')->nullable()->comment('Reason why it was added to the short list if any');
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
        Schema::dropIfExists('po_slist_menus');
    }
};
