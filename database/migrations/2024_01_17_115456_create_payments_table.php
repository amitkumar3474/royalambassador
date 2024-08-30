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
        Schema::create('payments', function (Blueprint $table) {
            $table->id()->comment('Primary Key');
            $table->tinyInteger('related_table')->nullable()->comment('The table to which this record is related in des_payment_related_table');
            $table->integer('lnk_related_rec')->nullable()->comment('This links to the related record. Say if Payment is related to a deposit for an event, then columns links to that EVENT_DEPOSIT record. If payment is related to an special event booking, then it links to ESP_EVENT_BOOK record');
            $table->char('payment_purpose', 1)->nullable()->comment('The purpose of this payment that can be payment as first deposit and more');
            $table->string('paid_by_name', 60)->nullable()->comment('Name of the person who made this payment like customer name or anyone else');
            $table->date('payment_date')->nullable()->comment('When the payment was made on this invoice if any');
            $table->tinyInteger('payment_method')->nullable()->comment('Method of this payment like cash, cheque, visa or mastercard');
            $table->tinyInteger('transaction_type')->nullable()->comment('Transaction type like a purchase or refund');
            $table->float('payment_amount', 9, 2)->nullable()->comment('Amount paid or to be paid in case of deposit');
            $table->float('overhead_percent', 4, 2)->nullable()->comment('If customer is paying by credit card, this percentage will be added to the payment amount');
            $table->float('amount_after_overhead', 9, 2)->nullable()->comment('Total payable amount after overhead');
            $table->string('cheque_num', 30)->nullable()->comment('Cheque number');
            $table->date('cheque_date')->nullable()->comment('The date when the cheque can be cashed. This is specially useful for post-dated cheques');
            $table->string('cheque_acct_holder', 60)->nullable()->comment('The name of the person who is the account owner of this cheque');
            $table->string('cheque_bank_name', 60)->nullable()->comment('Name of the bank that which is on the cheque');
            $table->text('payment_notes')->nullable()->comment('Special notes on this invoice if any');
            $table->dateTime('transact_dt')->nullable()->comment('Date and time when this transaction was processed');
            $table->tinyInteger('transact_was_fine')->nullable()->comment('Tells us if the transaction went through or not. Say if it is an online transaction, did it go through or not. It can also apply to checks say if cheque was fine or not');
            $table->text('transaction_record')->nullable()->comment('If this payment is processed online via payment gateway, then this column will hold the transction record info that is returned by payment gateway');
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
        Schema::dropIfExists('payments');
    }
};
