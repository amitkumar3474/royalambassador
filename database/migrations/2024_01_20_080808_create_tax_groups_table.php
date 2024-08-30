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
        Schema::create('tax_groups', function (Blueprint $table) {
            $table->id()->comment('Primary Key');
            $table->string('group_name', 50)->nullable()->comment('Name of this tax group');
            $table->string('tax_components', 120)->nullable()->comment('All the tax components that are part of this tax group');
            $table->tinyInteger('is_active')->nullable()->comment('Is this tax group active or not');
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
        Schema::dropIfExists('tax_groups');
    }
};
