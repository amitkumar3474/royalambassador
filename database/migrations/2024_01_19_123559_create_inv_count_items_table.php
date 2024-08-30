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
        Schema::create('inv_count_items', function (Blueprint $table) {
            $table->id()->comment('Primary Key');
            $table->integer('lnk_inv_count')->nullable()->comment('The main inventory count to which this item is related');
            $table->integer('lnk_product')->nullable()->comment('The product being counted. Linked to PRODUCT_GEN');
            $table->integer('lnk_inv_level')->nullable()->comment('The location where this count is happening. When adding items to the count, this is null. However when finalizing the count for each warehouse location, user should also pick the level or warehouse location where the items are located');
            $table->float('qty_expected', 9, 3)->nullable()->comment('This is the qty that is supposed to be in inventory when this count started');
            $table->integer('lnk_package_type')->nullable();
            $table->string('package_name', 30)->nullable()->comment('Name of the package type that is used for this item. This name by default comes from PRODUCT_LIQUOR and the package type that is has. So in case if it is changed later, we do not loose the info here');
            $table->float('package_capacity', 6, 2)->nullable()->comment('Capacity of the package type that is used for this item. It comes from PRODUCT_LIQUOR and the package type that is has. So in case if it is changed later, we do not loose the info here');
            $table->integer('pack_count')->nullable();
            $table->float('singles_count', 5, 2)->nullable();
            $table->float('qty_counted', 9, 2)->nullable()->comment('This is the qty that is counted. Null at first. The reason we put Null at first instead of zero is to make sure user does not apply zero by mistake. This number is the number of packages times each package capacity plus the singles counted');
            $table->float('gross_weight', 9, 2)->nullable()->comment('Total weight including the box in gram. If we are counting by weighing the item, then we enter the gross weight here and system subtracts from it, the box weight. Because we already know the approx weight of each item, we can calculate total counted and put it into QTY_COUNTED column. Still user can adjust that number.');
            $table->float('box_weight', 7, 2)->nullable()->comment('The approx weight of the box in grams');
            $table->integer('discrep_qty')->nullable()->comment('Total discrepany qty. This is QTY_EXPECTED - QTY_COUNTED. It can be both plus or minus. When positive number, it means we are missing items. When negative it means that have more than expected.');
            $table->float('discrep_val')->nullable()->comment('Total dollar value of discrepancy. This is the discrepancy value times the average purchase price for that item. When positive number, it means we are missing items. When negative it means that have more than expected.');
            $table->string('count_notes', 512)->nullable()->comment('The notes related to this individual item count if any.');
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
        Schema::dropIfExists('inv_count_items');
    }
};
