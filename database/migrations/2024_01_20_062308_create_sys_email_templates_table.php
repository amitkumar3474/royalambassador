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
        Schema::create('sys_email_templates', function (Blueprint $table) {
            $table->id()->comment('Primary Key');
            $table->string('template_id')->nullable();
            $table->tinyInteger('for_admin_only')->nullable();
            $table->string('lang', 2)->nullable()->comment('Language of this email template');
            $table->string('template_subject', 120)->nullable();
            $table->text('template_text')->nullable();
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
        Schema::dropIfExists('sys_email_templates');
    }
};
