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
        Schema::create('wine_categories', function (Blueprint $table) {
            $table->id()->comment('Primary Key');
            $table->string('wcat_name', 90)->nullable()->comment('Name of this category for restaurant wine');
            $table->tinyInteger('is_active')->nullable()->comment('Is this category of menus still active or not');
            $table->tinyInteger('show_order')->nullable()->comment('The order by which this category should show up on screen');
            $table->string('extra_notes')->nullable()->comment('Extra description for the item if any');
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
        Schema::dropIfExists('wine_categories');
    }
};
