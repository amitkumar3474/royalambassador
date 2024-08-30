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
        Schema::create('signed_documents', function (Blueprint $table) {
            $table->id()->comment('Primary Key');
            $table->char('related_rec_type', 2)->nullable()->comment('Type of record that this document is created out of. Like an event, shipping document or more');
            $table->integer('lnk_related_rec')->nullable()->comment('The actual UID of the record to which this record is related');
            $table->string('doc_body_as_html', 90)->nullable()->comment('The body of the document that can be a mix of html, svg and javascript. This column will freeze once signed and submitted');
            $table->char('doc_status', 1)->nullable()->comment('Tells us if this document has been signed and submitted or not');
            $table->char('doc_type', 2)->nullable()->comment('TYpe of this document. Say the document is related to a member of staff, but still it can be say a contract, a safety agreement or any other document');
            $table->dateTime('dt_signed')->nullable()->comment('Date and time when the document was signed, submitted and finalized');
            $table->integer('lnk_user_singed_under')->nullable()->comment('Sometimes the user who signs and submits a document is the same user who has logged in. Sometimes a member of staff, say logs in and then customer signs. In both cases this column captures the person who was logged in when the doc was signed and submitted');
            $table->mediumText('system_notes')->nullable()->comment('System generated notes on this record');
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
        Schema::dropIfExists('signed_documents');
    }
};
