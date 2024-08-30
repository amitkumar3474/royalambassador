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
        Schema::create('product_cats', function (Blueprint $table) {
            $table->id()->comment('Primary Key');
            $table->string('cat_name')->nullable()->comment('Name of this prodcut category');
            $table->char('cat_type', 1)->nullable()->comment('Where this category is used: Banquet, Liquor, Restaurant menu or Restaurant Drink');
            $table->integer('lnk_top_cat')->nullable()->comment('If this is a sub-category of another category then this is the link');
            $table->text('extra_notes')->nullable()->comment('Extra notes on the category if any');
            $table->integer('show_order')->nullable();
            $table->tinyInteger('is_active')->nullable()->comment('Is active or not');
            $table->integer('lnk_user_insert')->nullable()->comment('User who created this record');
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
        Schema::dropIfExists('product_cats');
    }
};
