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
        Schema::create('inv_actions', function (Blueprint $table) {
            $table->id()->comment('Primary key');
            $table->integer('lnk_product')->nullable()->comment('The product to which this action is related. Linked to PRODUCT_GEN');
            $table->integer('lnk_inv_item')->nullable()->comment('This is the inventory item that this inventory action will affect. Say if we check an item out for an invoice, then the INV_ACTION will be check out and it is linked to the invoice item so user can easily see. Also it will link to the INV_ITEM and will deduct from it so we know where in the inventory and how many we have.');
            $table->integer('lnk_related_rec')->nullable()->comment('This provides a link to a related record, if any. Say if this item was consumed for a work order, this column links to the WORK_ORDER. If received, this it will link to PO_RECEIVE_ITEM. However for testing or adjustment, it will be NULL');
            $table->tinyInteger('inv_action_type')->nullable()->comment('Type of this action like receiving items into inventory, consuming them or adjusting the inventory level');
            $table->tinyInteger('inv_action_sub_type')->nullable()->comment('Sub type which depends on the main type');
            $table->date('inv_action_date')->nullable()->comment('The date when this actio took place');
            $table->integer('lnk_doer')->nullable()->comment('The person who did this action. Linked to SYS_USER');
            $table->tinyInteger('unit_of_measure')->nullable()->comment('Unit of measure for the quantities in this record');
            $table->float('qty_before', 11, 4)->nullable()->comment('The QTY_ON_HAND in PRODUCT_GEN record before this action took place');
            $table->float('qty_this', 11, 4)->nullable()->comment('The qty of this action like receiving of 5 items into inventory. This is a positive number when receiving products into inventory, negative when consuming from inventory and either plus or minus when adjusting the inventory level.');
            $table->float('qty_after', 11, 4)->nullable()->comment('QTY_ON_HAND in PRODUCT_GEN record after this action took place. This is basically QTY_BEFORE + QTY_THIS and QTY_THIS can be both positive or negative');
            $table->char('action_source', 1)->nullable()->comment('Tells us if the source of action has been through Azarbod system or Monchify');
            $table->text('inv_action_notes')->nullable()->comment('Any notes about this action');
            $table->integer('lnk_user_insert')->nullable()->comment('User who first created this record');
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
        Schema::dropIfExists('inv_actions');
    }
};
