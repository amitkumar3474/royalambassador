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
        Schema::create('search_results', function (Blueprint $table) {
            $table->id()->comment('Primary Key');
            $table->integer('lnk_owner')->nullable();
            $table->tinyInteger('search_type')->nullable()->default(1);
            $table->text('result_criteria_json')->nullable();
            $table->text('search_sql')->nullable()->comment('The SQL statement that was run to create the result set');
            $table->text('result_set_json')->nullable();
            $table->integer('result_count')->nullable()->comment('Number of found records in this search');
            $table->dateTime('search_date_time')->nullable()->comment('Date and time when this search has been performed');
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
        Schema::dropIfExists('search_results');
    }
};
