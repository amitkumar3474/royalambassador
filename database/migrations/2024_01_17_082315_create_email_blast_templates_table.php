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
        Schema::create('email_blast_templates', function (Blueprint $table) {
            $table->id()->comment('Primary Key');
            $table->integer('lnk_marketing_campaign')->nullable()->comment('The marketing campaign to which this blast is related');
            $table->string('blast_desc')->nullable()->comment('Description of the purpose of this email');
            $table->string('blast_subject')->nullable()->comment('Subject of this email');
            $table->text('blast_body')->nullable()->comment('Body of this email being sent');
            $table->string('usage_notes')->nullable()->comment('This helps user know why he created this email template');
            $table->string('marketing_docs_to_attach', 90)->nullable()->comment('If we are attaching marketing documents to this email blast to be sent, then colulmn keeps thier UID in a comma separated format. Each linked to ATTACHED_DOC');
            $table->string('misc_docs_to_attach', 4096)->nullable()->comment('If we are attaching and sending miscellanous documents along with this email, then this column keeps that info. The format is a similar xml format as SYS_EMAIL_QUEUE.ATTACHMENTS');
            $table->text('embedded_links_xml')->nullable()->comment('We could have a number of links embedded in this email blast that each link to a different place. Because we track each link to see how many times it was clicked through, we cannot link directly to the location inside of the email. That is why we store the links as xml here and once user clicks on them, we first take user to the tracker script, record the click and then redirect user to the final destination');
            $table->integer('num_blasted')->nullable()->comment('Number of times this email was blasted');
            $table->integer('total_emails_sent')->nullable()->comment('Total emails sent via this blast');
            $table->dateTime('last_time_blasted')->nullable()->comment('Last time this email was blasted out to given recipients');
            $table->integer('num_opened')->nullable()->comment('Total number of time that an email in this blast was opened. If the same email is opened twice, this number will record it. This is not precise but can give us a metric');
            $table->integer('num_opened_unique')->nullable()->comment('Number of unique times an email in this blast was opened. This number does not include if the same email was opened twice');
            $table->integer('num_clicked')->nullable()->comment('Number of times the link in the email was clicked');
            $table->integer('num_clicked_unique')->nullable()->comment('Number of unique clicks on the link in the emails under this blast. If the same email is clicked twice, then this number will not count it');
            $table->integer('num_unsubscribed')->nullable()->comment('Number of clicks on the un-subscribe link provided in the emails under this blast');
            $table->integer('num_bounced_back')->nullable()->comment('Number of emails that bounced back from this email blast');
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
        Schema::dropIfExists('email_blast_temporares');
    }
};
