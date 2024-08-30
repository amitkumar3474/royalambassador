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
        Schema::create('revenue_items', function (Blueprint $table) {
            $table->id()->comment('Primary Key');
            $table->integer('lnk_facility')->comment('Facility to which this revenue item is related');
            $table->integer('lnk_event')->comment('Event that has generated this revnue');
            $table->float('revenue_amount', 9, 2)->nullable()->comment('Amount of revenue');
            $table->float('revenue_percent', 5, 2)->nullable()->comment('The percentage of total event revenue that has gone to this revenue item');
            $table->integer('lnk_user_insert')->nullable()->comment('User who first inserted this record');
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
        Schema::dropIfExists('revenue_items');
    }
};
