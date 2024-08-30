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
        Schema::create('rest_daily_sales', function (Blueprint $table) {
            $table->id()->comment('Primary Key');
            $table->date('related_date')->nullable()->comment('The date to which this revenue record is related');
            $table->float('total_food_bevg', 7, 2)->nullable()->comment('Total food and beverage sales for the day');
            $table->float('total_alcohol', 7, 2)->nullable()->comment('Total alcohol sales for the day');
            $table->float('total_food_drink', 9, 2)->nullable()->comment('Total food, beverage and drink');
            $table->float('gratuity_cash', 7, 2)->nullable()->comment('Total cash gratuity');
            $table->float('gratuity_not_cash', 7, 2)->nullable()->comment('Total non-cash gratuity');
            $table->float('total_gratuity', 7, 2)->nullable()->comment('Total gratuity for the day');
            $table->float('sub_total')->nullable()->comment('Sub-total which is the total before taxes');
            $table->float('total_tax1', 7, 2)->nullable()->comment('Total Tax1. Tax 1 can be say HST or any other sales tax');
            $table->float('total_tax2', 7, 2)->nullable()->comment('Total Tax 2 if applicable.');
            $table->float('total_tax3', 7, 2)->nullable()->comment('Total Tax 3 if applicable.');
            $table->float('grand_total')->nullable()->comment('Grand total which is the sub total plus taxes');
            $table->float('cash_payment')->nullable()->comment('The amount of this transaction that customer has paid in cash');
            $table->float('credit_debit_payment')->nullable()->comment('The amount of this transaction that customer has paid via credit or debit card');
            $table->integer('no_of_guests')->nullable()->comment('No of guests or customers for this day');
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
        Schema::dropIfExists('rest_daily_sales');
    }
};
