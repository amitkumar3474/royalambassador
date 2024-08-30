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
        Schema::create('user_email_templates', function (Blueprint $table) {
            $table->id()->comment('Primary Key');
            $table->string('template_id', 50)->nullable()->comment('The unique name given to this emil template');
            $table->string('email_subject', 180)->nullable()->comment('Subject of this email');
            $table->text('email_body')->nullable()->comment('Body of this email being sent');
            $table->string('marketing_docs_to_attach', 90)->nullable()->comment('If we are attaching marketing documents to this email blast to be sent, then colulmn keeps thier UID in a comma separated format. Each linked to ATTACHED_DOC');
            $table->string('misc_docs_to_attach', 4096)->nullable()->comment('If we are attaching and sending miscellanous documents along with this email, then this column keeps that info. The format is a similar xml format as SYS_EMAIL_QUEUE.ATTACHMENTS');
            $table->tinyInteger('main_usage')->nullable()->comment('The main usage for this user template: Email Blast or Individual. Email Blasts one are managed through email console, the rest through email templates page');
            $table->integer('total_sent')->nullable()->comment('Total number of sent emails to now');
            $table->dateTime('date_time_sent')->nullable()->comment('Date and time when the related emails were put into SYS_EMAIL_QUEUE table');
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
        Schema::dropIfExists('user_email_templates');
    }
};
