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
        Schema::create('sys_objects', function (Blueprint $table) {
            $table->id()->comment('Primary Key');
            $table->tinyInteger('obj_type')->nullable();
            $table->string('obj_id', 50)->nullable();
            $table->string('lang', 2)->nullable()->default('en')->comment('The language for this object. It is default_lang if NULL');
            $table->mediumText('obj_body_xml')->nullable();
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
        Schema::dropIfExists('sys_objects');
    }
};
