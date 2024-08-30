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
        Schema::create('sys_user_groups', function (Blueprint $table) {
            $table->id()->comment('Primary Key');
            $table->string('group_name', 40)->nullable()->comment('Unique name given to this group like Team Lead or Corporate');
            $table->integer('lnk_landing_page')->nullable()->comment('The page that users of this group go to by default unless specifically set per user. Linked to SYS_OBJECT');
            $table->string('group_desc')->nullable()->comment('More description of this group if required');
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
        Schema::dropIfExists('sys_user_groups');
    }
};
