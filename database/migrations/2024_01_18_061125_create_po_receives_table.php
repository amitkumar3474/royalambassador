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
        Schema::create('po_receives', function (Blueprint $table) {
            $table->id();
            $table->integer('lnk_supplier')->nullable();
            $table->integer('lnk_customer')->nullable()->comment('If we are receiving items from a customer, say raw material to finish a job, this column provides the link to that customer');
            $table->date('receive_date')->nullable();
            $table->string('currency', 3)->nullable()->comment('The currency of this receive session. By default is comes from the purchase order or orders being received. In case we have two purchase orders from the same supplier in different currencies, we can not mix them into once receive. We have to separately receive them so we can calculate the totals');
            $table->float('sub_total', 9, 2)->nullable()->comment('The sub total for this receive session in the given currency');
            $table->text('receive_notes')->nullable()->comment('Any notes for this receive session');
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
        Schema::dropIfExists('po_receives');
    }
};
