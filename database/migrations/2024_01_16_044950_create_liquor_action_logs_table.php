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
        Schema::create('liquor_action_logs', function (Blueprint $table) {
            $table->id()->comment('Primary key');
            $table->integer('lnk_product')->comment('The product to which this action is related. Linked to PRODUCT_GEN');
            $table->integer('lnk_inv_level')->nullable()->comment('The warehouse where it should happen');
            $table->char('lq_action_type',1)->nullable()->comment('Type of this action like receiving items into inventory, consuming them or adjusting the inventory level');
            $table->dateTime('lq_action_dt')->nullable()->comment('The date and time when this actio took place');
            $table->integer('lnk_doer')->nullable()->comment('The person who did this action. Linked to SYS_USER');
            $table->string('monchify_id')->nullable()->comment('The id of this action on Monchify');
            $table->char('action_unit',2)->nullable()->comment('Unit of measure for the quantities in this record');
            $table->float('qty_before' ,11, 4)->nullable()->comment('The QTY_ON_HAND in PRODUCT_GEN record before this action took place');
            $table->float('qty_this', 11, 4)->nullable()->comment('The qty of this action like receiving of 5 items into inventory. This is a positive number when receiving products into inventory, negative when consuming from inventory and either plus or minus when adjusting the inventory level.');
            $table->float('qty_after', 11, 4)->nullable()->comment('QTY_ON_HAND in PRODUCT_GEN record after this action took place. This is basically QTY_BEFORE + QTY_THIS and QTY_THIS can be both positive or negative');
            $table->text('lq_action_notes')->nullable()->comment('Any notes about this action');
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
        Schema::dropIfExists('liquor_action_logs');
    }
};
