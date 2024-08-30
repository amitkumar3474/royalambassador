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
        Schema::create('list_item_categories', function (Blueprint $table) {
            $table->id()->comment('Primary Key');
            $table->integer('lnk_list')->comment('The list to which this item is linked');
            $table->string('cat_name', 90)->nullable()->comment('Name of this category');
            $table->integer('lnk_top_cat')->nullable()->comment('If this is a sub-category under another category, then this is the link to the top category');
            $table->integer('show_order')->nullable()->comment('The order by which thus item should show in the list');
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
        Schema::dropIfExists('list_item_categories');
    }
};
