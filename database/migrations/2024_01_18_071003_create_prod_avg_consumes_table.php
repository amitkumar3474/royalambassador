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
        Schema::create('prod_avg_consumes', function (Blueprint $table) {
            $table->id()->comment('Primary Key');
            $table->integer('lnk_product')->nullable()->comment('The product for which we are storing the average consumption. Linked to PRODUCT_GEN');
            $table->date('week_start')->nullable()->comment('The start of the week for which this consumption is stored');
            $table->date('week_end')->nullable()->comment('The end of the week for which this consumption is stored');
            $table->float('avg_consume', 7, 4)->nullable()->comment('The actual consumption per unit');
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
        Schema::dropIfExists('prod_avg_consumes');
    }
};
