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
        Schema::create('sys_privileges', function (Blueprint $table) {
            $table->id()->comment('Primary Key');
            $table->tinyInteger('related_rec_type')->nullable()->comment('Type of record that this record is related to: SYS_USER or SYS_USER_GROUP');
            $table->integer('lnk_related_rec')->nullable()->comment('Gives us the UID of the record to which this record is related. Either the UID of SYS_USER or SYS_USER_GROUP');
            $table->integer('lnk_sys_object')->nullable()->comment('Gives us the id of the object that we are granting access to or revoking access from. If this is a special privilege, then this column is null');
            $table->tinyInteger('grant_or_revoke')->nullable()->comment('Are we granting access or revoking it using this record');
            $table->text('esp_priv_xml')->nullable()->comment('If this is a special privilege, then this column keeps that privilege as xml');
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
        Schema::dropIfExists('sys_privileges');
    }
};
