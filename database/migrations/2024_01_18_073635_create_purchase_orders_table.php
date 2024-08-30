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
        Schema::create('purchase_orders', function (Blueprint $table) {
            $table->id()->comment('Primary Key');
            $table->integer('lnk_supplier')->nullable()->comment('The supplier to which we are placing this order');
            $table->string('po_number', 32)->nullable()->comment('Internal purchase order number given to this PO by the host company. At time preparation, it is null and user has to provide PO number when finalizing it.');
            $table->string('license_number', 40)->nullable()->comment('If this purchase order requires any license, like liquor license then we enter it here');
            $table->integer('lnk_event')->nullable()->comment('If this purchase order is related directly to an event, like when buying liquour for an event, then this column keeps that event id');
            $table->date('po_date')->nullable()->comment('Date of the purchase order. This is usually the same date that purchase order is approved. It is null when purchase order is created in preparation and is filled when the PO is approved and being sent to supplier.');
            $table->date('date_required')->nullable()->comment('Default required date for the items in this purchase order. Still each item can have its own required date');
            $table->tinyInteger('po_status')->nullable()->comment('Status of this purchase order like preparation or finalized');
            $table->char('currency', 3)->nullable()->comment('The currency of this purchase order');
            $table->tinyInteger('po_receive_status')->nullable()->comment('The receive status of this purchase order. Like fully received, partially received, not received');
            $table->integer('lnk_user_prepare')->nullable()->comment('User who has prepared this purchase order. Linked to SYS_USER');
            $table->dateTime('dt_prepare')->nullable()->comment('Date and time when this purchase order was created in preparation mode');
            $table->integer('lnk_user_approve')->nullable()->comment('User who has approved/finalized this purchase order. Linked to SYS_USER');
            $table->dateTime('dt_approve')->nullable()->comment('Date and time when this purchase order was approved');
            $table->integer('lnk_user_sent')->nullable()->comment('User who sent / emailed this purchase order for the first time');
            $table->dateTime('dt_sent')->nullable()->comment('Date and time when this purchase order was sent/emailed to customer for the first time');
            $table->float('sub_total', 9, 2)->nullable()->comment('Subtotal of this purchase order in the host currency');
            $table->float('tax1_amount')->nullable()->comment('Total amount of tax1 that applies to this PO');
            $table->float('tax2_amount')->nullable()->comment('Total amount of tax2 that applies to this PO');
            $table->float('tax3_amount')->nullable()->comment('Total amount of tax3 that applies to this PO');
            $table->float('grand_total', 9, 2)->nullable()->comment('Grand total after taxes');
            $table->string('tax_descriptor', 50)->nullable();
            $table->text('po_notes')->nullable()->comment('Extra notes on the purchase order if any');
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
        Schema::dropIfExists('purchase_orders');
    }
};
