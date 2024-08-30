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
        Schema::create('sys_settings', function (Blueprint $table) {
            $table->id()->comment('Primary Key');
            $table->tinyInteger('setting_cat')->nullable()->comment('Category for this setting. This only helps better sort them on the page');
            $table->string('setting_name', 120)->nullable()->comment('Name of this configuration value');
            $table->text('setting_value')->nullable()->comment('Value for this setting');
            $table->string('setting_desc', 512)->nullable()->comment('Description of what this setting is about');
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
        Schema::dropIfExists('sys_settings');
    }
};
