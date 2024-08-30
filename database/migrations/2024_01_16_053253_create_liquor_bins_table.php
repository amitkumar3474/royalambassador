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
        Schema::create('liquor_bins', function (Blueprint $table) {
            $table->id()->comment('Primary Key');
            $table->string('bin_number')->nullable()->comment('Unique bin # for this bin');
            $table->string('lnk_wine_cats')->nullable()->comment('Types of wine that can go under this bin.');
            $table->tinyInteger('is_active')->nullable()->comment('Is it still active and being used or not');
            $table->integer('lnk_user_insert')->nullable()->comment('User who inserted this record');
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
        Schema::dropIfExists('liquor_bins');
    }
};
