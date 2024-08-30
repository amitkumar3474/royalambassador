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
        Schema::create('commissions', function (Blueprint $table) {
            $table->id()->comment('Primary Key');
            $table->string('for_month', 7)->nullable()->comment('Gives us the month where this commision should be paid');
            $table->integer('lnk_sales_person')->nullable()->comment('sales person to which this commission belongs. Linked to STAFF table');
            $table->float('total_comm', 9, 2)->nullable()->comment('Total commission that this sales person should get on this month');
            $table->tinyInteger('payment_status')->nullable()->comment('Current status of this commission');
            $table->date('comm_paid_on')->nullable()->comment('Date when this commission was paid out if any');
            $table->text('comm_notes')->nullable()->comment('Any extra notes like when paid or others');
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
        Schema::dropIfExists('commissions');
    }
};
