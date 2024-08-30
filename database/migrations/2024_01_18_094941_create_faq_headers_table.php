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
        Schema::create('faq_headers', function (Blueprint $table) {
            $table->id()->comment('Primary Key');
            $table->string('header_title', 80)->nullable()->comment('The title for this header');
            $table->integer('show_order')->nullable()->comment('The order by which it should show in the customer portal');
            $table->string('header_img', 60)->nullable()->comment('Name of image to show as header for this FAQ header');
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
        Schema::dropIfExists('faq_headers');
    }
};
