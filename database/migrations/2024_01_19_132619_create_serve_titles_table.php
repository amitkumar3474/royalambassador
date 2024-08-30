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
        Schema::create('serve_titles', function (Blueprint $table) {
            $table->id()->comment('The UID of the Serve Title');
            $table->integer('lnk_stitle_master')->nullable()->comment('The related master serve title');
            $table->integer('lnk_event')->nullable()->comment('The event for this Serve Title');
            $table->string('serve_title', 80)->nullable()->comment('The title of this Serve Title');
            $table->string('menu_combos', 90)->nullable()->comment('Here we define food or menu item combos. When we combine items to form a combo, then on the floor plan, user has to pick a full combo as an option and not the individual items in it');
            $table->tinyInteger('serve_order')->nullable()->comment('The order to serve this Serve Title');
            $table->tinyInteger('is_deleted')->nullable()->comment('Is the record logically deleted or not');
            $table->dateTime('dt_deleted')->nullable()->comment('Date and time when the record was deleted');
            $table->integer('lnk_user_delete')->nullable()->comment('User who deleted the record');
            $table->integer('lnk_user_insert')->nullable()->comment('User who first inserted this record. Can be null for online catering');
            $table->integer('lnk_user_update')->nullable()->comment('User who last updated this record. Can be null for online catering orders.');
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
        Schema::dropIfExists('serve_titles');
    }
};
