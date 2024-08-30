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
        Schema::create('connected_emails', function (Blueprint $table) {
            $table->id();
            $table->integer('lnk_user')->comment('The user under this host company to whom this account belongs');
            $table->string('send_from_name', 50)->nullable()->comment('Emails should be sent from this name');
            $table->string('outgoing_server')->nullable()->comment('The address of the remote email server that will be used for outgoing emails');
            $table->string('incoming_server')->nullable()->comment('The server address for incoming emails. Usually the same as incoming, but could be not');
            $table->string('outgoing_protocol', 10)->nullable()->comment('The protocol used foroutgoing emails like IMAP or POP3');
            $table->string('incoming_protocol', 10)->nullable()->comment('The protocol like IMAP or POP3 used for incoming emails. It is usually the same as outgoing, but could be different');
            $table->string('user_name', 60)->nullable()->comment('The user name used to fetch the emails from the remote server');
            $table->string('password', 30)->nullable()->comment('The password on the remote server for this account');
            $table->integer('incoming_port')->nullable()->comment('The port number for incoming emails from this server if we are reading from this account');
            $table->integer('outgoing_port')->nullable()->comment('The port to send emails out through this server if we use this server for outgoing emails');
            $table->string('outgoing_security_str', 10)->nullable()->comment('The security string on this server for outgoing emails if any like ssl');
            $table->string('incoming_security_str',10)->nullable()->comment('The security string for this server for incoming emails. Usually the same for both incoming and outgoing, but could be different');
            $table->tinyInteger('default_send_via')->nullable()->comment('Tells us if this account will be used as default to send emails out');
            $table->date('checked_until_date')->nullable()->comment('This keeps the date until which we have already checked the emails. This way if we have not checked for some time, then we can check the rest and will not have a big date range to check');
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
        Schema::dropIfExists('connected_emails');
    }
};
