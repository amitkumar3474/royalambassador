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
        Schema::create('facility_pricings', function (Blueprint $table) {
            $table->id()->comment('Primary Key');
            $table->integer('lnk_facility')->comment('Facility for which this pricing is');
            $table->string('pricing_title')->nullable()->comment('Title or description of this pricing');
            $table->float('price')->nullable()->comment('Price for this item which will be the default price');
            $table->integer('lnk_tax_group')->nullable()->comment('Tax group that should apply to this item at the end');
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
        Schema::dropIfExists('facility_pricings');
    }
};
