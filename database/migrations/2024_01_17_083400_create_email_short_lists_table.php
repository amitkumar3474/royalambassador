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
        Schema::create('email_short_lists', function (Blueprint $table) {
            $table->id()->comment('Primary Key');
            $table->integer('lnk_owner')->nullable()->comment('The owner of this short list or the person who added this record. Linked to SYS_USER');
            $table->integer('lnk_customer_contact')->nullable()->comment('The customer contact to which the email should be sent');
            $table->tinyInteger('is_sent')->nullable()->comment('When we need to send the emails in chunks, this column tells us if the email has been already sent or not');
            $table->integer('lnk_user_insert')->nullable()->comment('User who first inserted this record');
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
        Schema::dropIfExists('email_short_lists');
    }
};
