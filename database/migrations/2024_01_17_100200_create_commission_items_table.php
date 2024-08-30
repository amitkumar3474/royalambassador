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
        Schema::create('commission_items', function (Blueprint $table) {
            $table->id()->comment('Primary Key');
            $table->integer('lnk_commission')->comment('The commission and hence the month to which this commission item is related');
            $table->integer('lnk_event')->comment('The event to which this commission is related');
            $table->float('amount', 9, 2)->nullable()->comment('Amount of this commission');
            $table->float('percentage', 9, 2)->nullable()->comment('percentage of the commission');
            $table->tinyInteger('commission_type')->nullable()->comment('first one, last one or refund');
            $table->text('notes')->nullable()->comment('Notes of the commission');
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
        Schema::dropIfExists('commission_items');
    }
};
