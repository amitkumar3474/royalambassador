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
        Schema::create('tax_components', function (Blueprint $table) {
            $table->id()->comment('Primary Key');
            $table->string('component_name', 50)->nullable()->comment('Name of this tax component');
            $table->float('percentage', 9, 2)->nullable()->comment('Percentage of this tax component');
            $table->float('from_price', 9, 2)->nullable()->comment('This tax should apply to items priced more than this number');
            $table->float('to_price', 9, 2)->nullable()->comment('This tax should apply to products priced less that this price');
            $table->tinyInteger('is_active')->nullable()->comment('If this component is active or not');
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
        Schema::dropIfExists('tax_components');
    }
};
