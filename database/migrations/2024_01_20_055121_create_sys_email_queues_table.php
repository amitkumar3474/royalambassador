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
        Schema::create('sys_email_queues', function (Blueprint $table) {
            $table->id()->comment('Primary Key');
            $table->integer('lnk_connected_email')->nullable()->comment('The host company to which this record belongs. Linked to HOST_COMPANY. It can be null if this email is sent say via admin panel or general emails that are sent to change password or activation email');
            $table->integer('lnk_user')->nullable()->comment('The user under whom this email is stored. If user is part of a host company or not');
            $table->integer('lnk_folder')->nullable()->comment('The email account from which this email is read or sent');
            $table->string('send_to', 1000)->nullable()->comment('Send this email to this email address or addresses');
            $table->string('send_to_name', 120)->nullable()->comment('The name of the person to whom this email is being sent');
            $table->string('send_cc', 1000)->nullable()->comment('CC this email to');
            $table->string('send_bcc', 1000)->nullable()->comment('BCC this email to');
            $table->string('from_email', 120)->nullable()->comment('Email from whom this is sent');
            $table->string('from_name', 120)->nullable()->comment('Name from whom this email is sent');
            $table->dateTime('email_date_time')->nullable()->comment('The date and time of the email');
            $table->string('email_subject')->nullable()->comment('Subject of this email');
            $table->mediumText('email_body')->nullable()->comment('Body of this email being sent');
            $table->string('message_id', 40)->nullable()->comment('The unique message id given to this email. This id is used to retrieve the replies to the email and group them together');
            $table->tinyInteger('priority')->nullable()->comment('Priority or urgency of this email');
            $table->tinyInteger('how_generated')->nullable()->comment('How this email was generated, like job apply or internal messaging');
            $table->tinyInteger('send_status')->nullable()->comment('Current sending status of this email. Sent or not');
            $table->string('attachments', 4000)->nullable()->comment('This is a XML that shows what files have been attached to this email. The files themselves are saved in "email_attachments_folder"  on the server');
            $table->integer('lnk_customer')->nullable()->comment('The customer to which this email is related if any');
            $table->integer('lnk_customer_contact')->nullable()->comment('The contact to whom we are sending this email');
            $table->integer('lnk_event')->nullable()->comment('The event to which this email is related if any');
            $table->integer('lnk_event_planner')->nullable()->comment('Link to the event planner if any');
            $table->integer('lnk_rest_reserve')->nullable()->comment('If this is a confirmation email for a restaurant reservation, then this provides the link');
            $table->integer('lnk_user_task')->nullable()->comment('If this email is related to a user task, then this column provides the link');
            $table->integer('lnk_supplier')->nullable()->comment('If this email is sent to a supplier, then this column will give us the supplier id');
            $table->integer('lnk_purchase_order')->nullable()->comment('Link to purchase order when email a purchase order out');
            $table->integer('lnk_sys_email_template')->nullable()->comment('If this was sent out of a template, then this column provides the link. Usually used for the emails that are sent automatically and we want to check later to see if this specific type of email already gone or not');
            $table->integer('lnk_email_blast_templates')->nullable()->comment('If this is the result of an email blast, then this column keeps that link');
            $table->string('unique_token', 32)->nullable()->comment('The unique token generated for this email. This unique, auto-generated token helps us track when user opens the email or say clicks on the given link in it');
            $table->integer('read_count')->nullable()->comment('Number of times this email has been viewed or read');
            $table->dateTime('last_time_read')->nullable()->comment('Last time that email was read or viewed');
            $table->integer('lnk_user_last_read')->nullable()->comment('User who has last viewed or read this email');
            $table->integer('clicked_count')->nullable()->comment('Number of times user has clicked on the provided link in the email. This is used to track how the email blast has been working');
            $table->dateTime('last_time_clicked')->nullable()->comment('Last time user clicked on the provided link in the email');
            $table->integer('lnk_user_last_clicked')->nullable()->comment('The user who last clicked on the link in the email. Usually it should be the same user, however this gives us a good metric to see if user has shared the email');
            $table->integer('unsubscribed_count')->nullable()->comment('Number of times user clicked on the un-subscribe link in the email if any');
            $table->string('activity_log', 1024)->nullable()->comment('Logs any activity like trying to send on this email');
            $table->tinyInteger('do_attach_by_url')->nullable()->comment('Tells us if the attachments to this email should be attached or viewed online ');
            $table->string('view_token', 30)->nullable()->comment('When send attachments as attached to email many times it goes to junk email. That is why we create a ULR that user can click and view the related attachments online instead of attaching to email. This token will create a unique token to be used by that URL');
            $table->dateTime('date_time_added')->nullable()->comment('Date and time when this email was added to the queue');
            $table->dateTime('date_time_sent')->nullable()->comment('Date and time when this email was sent if any');
            $table->integer('lnk_user_insert')->nullable()->comment('User who inserted this email into the queue if there is any logged in user at that time');
            $table->integer('lnk_user_update')->nullable()->comment('User who last updated this record. It can be null if email sent via public pages like Contact Us page.');
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
        Schema::dropIfExists('sys_email_queues');
    }
};
