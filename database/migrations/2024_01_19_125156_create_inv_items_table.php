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
        Schema::create('inv_items', function (Blueprint $table) {
            $table->id()->comment('Primary Key');
            $table->tinyInteger('related_table')->nullable()->comment('Type of record to which this record is related: PO_RECEIVE_ITEM or WORK_ORDER');
            $table->integer('lnk_related_rec')->nullable()->comment('The related record for this inventory item that shows us how it was received. It is either linke to PO_RECEIVE_ITEM that shows we purchased this item or WORK_ORDER that shows we produced this item.');
            $table->integer('lnk_product')->nullable()->comment('The product in the inventory. Linked to PRODUCT_GEN');
            $table->integer('lnk_inv_level')->nullable()->comment('The physical location where this item is in the warehouse');
            $table->float('org_qty', 11, 4)->nullable()->comment('Original qty or amount of this batch when this batch was placed in its location. This only matters when there is a batch number or serial number. Otherwise all the same products in the inventory are the same and only CUR_QTY column shows how much we have');
            $table->float('cur_qty', 11, 4)->nullable()->comment('Current qty or amount related to this batch of products.');
            $table->integer('lnk_package_type')->nullable()->comment('Type of packaging for this batch if it applies. Linked to PACKAGE_TYPE');
            $table->integer('org_num_packages')->nullable()->comment('Original number of packages for this batch if packaging applies');
            $table->integer('cur_num_packages')->nullable()->comment('Current number of packages if packaging applies.');
            $table->string('lot_num', 30)->nullable()->comment('Lot number of the original product if any');
            $table->string('batch_num', 30)->nullable()->comment('Batch number of the original received product if any');
            $table->date('expiry_date')->nullable()->comment('Expiry date for this item in the inventory. All these items should have the same expiry');
            $table->text('system_notes')->nullable()->comment('System generated notes if any');
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
        Schema::dropIfExists('inv_items');
    }
};
