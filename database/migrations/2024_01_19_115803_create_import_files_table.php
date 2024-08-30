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
        Schema::create('import_files', function (Blueprint $table) {
            $table->id()->comment('Primary Key');
            $table->string('file_name', 60)->nullable()->comment('Name of the stored uploaded file');
            $table->string('report_file_name', 60)->nullable()->comment('Name of the file where the report for this import is stored');
            $table->integer('number_success')->nullable()->comment('Number of records successfully imported');
            $table->integer('number_fail')->nullable()->comment('Number of records who failed during the import');
            $table->integer('lnk_user_insert')->nullable()->comment('User who uploaded this file');
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
        Schema::dropIfExists('import_files');
    }
};
