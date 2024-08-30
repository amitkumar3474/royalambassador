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
        Schema::create('menu_tastings', function (Blueprint $table) {
            $table->id()->comment('Primary Key');
            $table->integer('lnk_event')->comment('The event for which we are bookin this menu tasting');
            $table->integer('lnk_rest_reserve')->nullable()->comment('The related reservation in REST_RESERVE table for this menu tasting. If customer has refused to do tasting, then this will be null');
            $table->tinyInteger('tasting_is_refused')->nullable()->comment('This means that customer does not want to do menu tastintg');
            $table->text('refuse_reason')->nullable()->comment('The reason customer refused to do menu tasting if any');
            $table->integer('lnk_user_refuse')->nullable()->comment('Person who recorded that customer does not want menu tasting');
            $table->date('date_time_refuse')->nullable()->comment('Date and time when it was recorded that customer refuses to do menu tasting');
            $table->integer('lnk_user_insert')->nullable()->comment('The user who first inserted this record');
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
        Schema::dropIfExists('menu_tastings');
    }
};
