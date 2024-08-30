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
        Schema::create('rest_reserves', function (Blueprint $table) {
            $table->id()->comment('Primary Key');
            $table->integer('lnk_rest_hour')->comment('The hour of operation of the restaurant to which this reservation will be related');
            $table->integer('lnk_customer')->comment('Customer for whom we do this reservation');
            $table->integer('lnk_customer_contact')->comment('The contact under this customer who is reserving');
            $table->tinyInteger('reserve_status')->nullable()->comment('The status of this reservation like reserved or cancelled');
            $table->tinyInteger('reserve_type')->nullable()->comment('Type of reservation, Lunch or Dinner');
            $table->dateTime('reserve_date_time')->nullable()->comment('Reservation date and time');
            $table->smallInteger('no_of_guests')->nullable()->comment('No of guests to reserve');
            $table->string('table_no', 2)->nullable()->comment('Table no to be reserved');
            $table->string('reserve_notes', 1000)->nullable()->comment('Special notes related to this reservation');
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
        Schema::dropIfExists('rest_reserves');
    }
};
