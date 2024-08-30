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
        Schema::create('home_page_banners', function (Blueprint $table) {
            $table->id()->comment('Primary Key');
            $table->mediumText('banner_image')->nullable()->comment('Image of the banner');
            $table->string('link_text', 120)->nullable()->comment('On any banner there is a text that is linked to another page. This is the text that should show for the link');
            $table->string('linked_to')->nullable()->comment('The above text should be linked here');
            $table->date('end_date')->nullable()->comment('After this date the banner should automatically become inactive');
            $table->tinyInteger('is_active')->nullable()->comment('Is this banner ad active or not');
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
        Schema::dropIfExists('home_page_banners');
    }
};
