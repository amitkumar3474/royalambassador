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
        Schema::create('event_deposits', function (Blueprint $table) {
            $table->id()->comment('Primary Key');
            $table->integer('lnk_event')->comment('Event to which this invoice belongs');
            $table->date('due_date')->nullable()->comment('Date when the deosit will be due');
            $table->tinyInteger('deposit_status')->nullable()->comment('Current status of this invoice');
            $table->tinyInteger('is_security_deposit')->nullable()->comment('Tells us if this is a security deposit or not. If yes, they should be treated differently');
            $table->string('preauth_code')->nullable()->comment('If this is a security deposit, then we pre-authorize the amount. Once pre-authorized payment gateway will give us a code back that we can use to charge the amount. That code is stored here');
            $table->string('preauth_trans_id')->nullable()->comment('If this deposit has been already pre-authorized, we need the transaction id to actually charge the amount ');
            $table->dateTime('dt_preauthorized')->nullable()->comment('If already pre-authorized, this column gives us the date and time when it was pre-authorized');
            $table->integer('lnk_preauthorized_by')->nullable()->comment('The user who has pre-authorized this deposit');
            $table->float('deposit_amount')->nullable()->comment('Amount of this deposit');
            $table->float('total_paid')->nullable()->comment('Total paid for this deposit so far');
            $table->float('balance_due')->nullable()->comment('Balance due or remaining for this deposit');
            $table->text('deposit_notes')->nullable()->comment('Special notes on this invoice if any');
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
        Schema::dropIfExists('event_deposits');
    }
};
