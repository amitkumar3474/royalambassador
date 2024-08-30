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
        Schema::create('lists', function (Blueprint $table) {
            $table->id()->comment('Primary Key');
            $table->string('list_title', 90)->nullable()->comment('The title for this list');
            $table->string('linked_table', 60)->nullable()->comment('The table to which the items in the list are linked');
            $table->tinyInteger('price_mandatory')->nullable()->comment('Tells us if we need price for the items in this list.');
            $table->tinyInteger('is_active')->nullable()->comment('Is it still active and being used or not');
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
        Schema::dropIfExists('lists');
    }
};
