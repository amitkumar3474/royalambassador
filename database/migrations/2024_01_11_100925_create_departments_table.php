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
        Schema::create('departments', function (Blueprint $table) {
            $table->id()->comment('Primary Key');
            $table->string('dept_name')->nullable()->comment('Name of this department');
            $table->text('dept_desc')->nullable()->comment('Extra description for the department if needed');
            $table->integer('lnk_user_insert')->nullable()->comment('User who first inserted this record');
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
        Schema::dropIfExists('departments');
    }
};
