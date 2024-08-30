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
        Schema::create('inv_levels', function (Blueprint $table) {
            $table->id()->comment('Primary Key');
            $table->integer('lnk_parent_level')->nullable()->comment('The top level of this inventory structure. Null if this is the very top level or main warehouse. Linked to INS_STRUCTURE');
            $table->string('level_code', 25)->nullable()->comment('The code given to this level. Each code has to be unique within its top level.');
            $table->tinyInteger('show_order')->nullable()->comment('The order by which this warehouse location should show on screen');
            $table->string('level_desc', 254)->nullable()->comment('Description of this inventory structure if any');
            $table->mediumText('level_pic')->nullable()->comment('Picture or photo of this inventory level within the warehouse. Can be sometimes useful to locate the item');
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
        Schema::dropIfExists('inv_levels');
    }
};
