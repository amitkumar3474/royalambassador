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
        Schema::create('floor_plan_logs', function (Blueprint $table) {
            $table->id()->comment('Primary Key');
            $table->integer('lnk_fplan')->nullable()->comment('This log is for this floor plan');
            $table->mediumText('actual_plan_xml')->nullable()->comment('The actual content of the floor plan saved as XML');
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
        Schema::dropIfExists('floor_plan_logs');
    }
};
