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
        Schema::create('package_types', function (Blueprint $table) {
            $table->id()->comment('Primary Key');
            $table->string('package_name', 30)->nullable()->comment('Name of this packaging type');
            $table->float('capacity', 6, 2)->nullable()->comment('The capacity of this packaging in the unit of its measurement');
            $table->tinyInteger('unit_of_measure')->nullable()->comment('Unit of measurement for the capacity of this package type');
            $table->string('package_desc')->nullable()->comment('Description of the package if any');
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
        Schema::dropIfExists('package_types');
    }
};
