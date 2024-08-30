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
        Schema::create('prod_suppliers', function (Blueprint $table) {
            $table->id()->comment('Primary Key');
            $table->integer('lnk_product')->nullable()->comment('The product that is supplied');
            $table->integer('lnk_supplier')->nullable()->comment('The supplier that supplies the product');
            $table->integer('lnk_user_insert')->nullable()->comment('User who last updated this record');
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
        Schema::dropIfExists('prod_suppliers');
    }
};
