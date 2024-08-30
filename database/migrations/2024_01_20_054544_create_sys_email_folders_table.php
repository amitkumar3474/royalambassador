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
        Schema::create('sys_email_folders', function (Blueprint $table) {
            $table->id()->comment('Primary Key');
            $table->integer('lnk_user')->comment('The user under this company or maybe not (say if this is an admin user using the registration panel) to whom this folder belongs');
            $table->tinyInteger('sys_folder_type')->nullable()->comment('If this is a system folder like inbox or trash, then this column tells us what type of system foler it is');
            $table->string('folder_name', 40)->nullable()->comment('Name of this folder');
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
        Schema::dropIfExists('sys_email_folders');
    }
};
