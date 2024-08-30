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
        Schema::create('attached_documents', function (Blueprint $table) {
            $table->id()->comment('Primary Key');
            $table->integer('lnk_cat')->comment('Category of this document');
            $table->tinyInteger('is_active')->nullable()->comment('Is it still active or not');
            $table->char('usage_type', 3)->nullable()->comment('Usage type that shows to what type of record this record is linked');
            $table->string('doc_title')->nullable()->comment('Title of this document');
            $table->integer('lnk_related_rec')->nullable()->comment('The actual UID of the record to which this record is related');
            $table->string('doc_folder', 90)->nullable()->comment('The folder where this file is under attached files folder');
            $table->char('file_type', 3)->nullable()->comment('Type of this file like image or Youtube video. Is ued when rendering the file');
            $table->string('video_id', 20)->nullable()->comment('Video id if this is a youtube or similar video');
            $table->string('doc_file_name', 90)->nullable()->comment('Name of the file as saved on the server');
            $table->string('org_file_name')->nullable()->comment('Original name of the file. When user downloads the file, it is saved by this name');
            $table->text('doc_desc')->nullable()->comment('Extra description for this document');
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
        Schema::dropIfExists('attached_documents');
    }
};
