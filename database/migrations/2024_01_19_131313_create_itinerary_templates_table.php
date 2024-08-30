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
        Schema::create('itinerary_templates', function (Blueprint $table) {
            $table->id()->comment('Primary Key');
            $table->string('tmpl_title', 120)->nullable()->comment('The title given to this template');
            $table->longText('tmpl_content_xml')->nullable()->comment('The actual content of the template in XML format');
            $table->text('print_layout')->nullable()->comment('This gives us the layout on how to print the sections of the itineraries based on this template');
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
        Schema::dropIfExists('itinerary_templates');
    }
};
