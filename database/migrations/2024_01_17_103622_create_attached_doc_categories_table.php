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
        Schema::create('attached_doc_categories', function (Blueprint $table) {
            $table->id();
            $table->char('cat_usage', 3)->nullable()->comment('The usage of this category. Using this column we can separate thses cateogories say for documents uploaded for quotes, catalogue products and the rest.');
            $table->string('cat_name', 180)->nullable()->comment('Name of the category');
            $table->string('cat_desc')->nullable()->comment('Short description of the category');
            $table->tinyInteger('is_default_cat')->nullable()->comment('Tells us if this is the default category under this specific usage');
            $table->tinyInteger('is_system_rec')->nullable()->comment('Is it a system record. If this is a system record, it means end user should not be able to edit or update it. Say we have some docs in marketing category that should show under emails for quick attachment and user should not be able to delete or change this cateogry.');
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
        Schema::dropIfExists('attached_doc_categories');
    }
};
