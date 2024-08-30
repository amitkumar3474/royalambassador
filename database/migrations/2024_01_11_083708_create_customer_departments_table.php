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
        Schema::create('customer_departments', function (Blueprint $table) {
            $table->id();
            $table->integer('lnk_customer')->comment('The customer to which this branch is related');
            $table->integer('lnk_branch')->comment('The branch under the customer to which this department belongs');
            $table->string('dept_name')->nullable()->comment('Name of this department');
            $table->string('phone')->nullable()->comment('Client phone number');
            $table->string('fax')->nullable()->comment('Client Fax');
            $table->text('dept_notes')->nullable()->comment('Special notes on this department if any');
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
        Schema::dropIfExists('customer_departments');
    }
};
