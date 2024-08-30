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
        Schema::create('po_receive_items', function (Blueprint $table) {
            $table->id()->comment('Primary Key');
            $table->integer('lnk_po_receive')->comment('The related receive session in PO_RECEIVE table');
            $table->integer('lnk_po_item')->nullable()->comment('The purchase order item that is being received. Linked to PURCHASE_ORDER_ITEM');
            $table->tinyInteger('unit_of_measure')->nullable()->comment('The unit of measurement for this item that is received. By default it comes from the original product being ordered and received');
            $table->float('qty_received')->nullable()->comment('How many or how much we have received this item. The reason it is a float, is to be able to use it for non-discreet items in future');
            $table->float('unit_price')->nullable()->comment('The unit price for this received item. By default it comes from the related PURCHASE_ORDER_ITEM but user should be able to set it as well');
            $table->float('sub_total', 9, 2)->nullable()->comment('The sub total for this line which is unit price times qty');
            $table->string('receive_item_notes')->nullable()->comment('Extra notes for receiving this item, if any');
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
        Schema::dropIfExists('po_receive_items');
    }
};
