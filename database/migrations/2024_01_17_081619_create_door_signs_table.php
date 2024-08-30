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
        Schema::create('door_signs', function (Blueprint $table) {
            $table->id()->comment('Primary Key');
            $table->integer('lnk_event')->comment('The event to which this door sign is created');
            $table->string('sign_text')->nullable()->comment('The text of the door sign. This can include line breaks as well');
            $table->string('sign_arrow')->nullable()->comment('Name of the arror image which is used');
            $table->string('layout_id')->nullable()->comment('Name or id of the layout used for this door sign, like layout1. The layout names are pre-defined and should be then recognizable in the pdf file');
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
        Schema::dropIfExists('door_signs');
    }
};
