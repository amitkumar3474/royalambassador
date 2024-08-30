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
        Schema::create('event_guests', function (Blueprint $table) {
            $table->id()->comment('The UID of this guest to event mapping');
            $table->integer('lnk_event')->comment('The UID of the Event');
            $table->integer('lnk_customer_guest')->comment('The guest who is attending this event from list of customer guests. Linked to CUSTOMER_GUEST');
            $table->string('esp_menu_picks')->nullable()->comment('If we are picking special menu for this guest, then this column keeps that in this format: [{"stitle_id": "91295", "modify": "No oil"},{"stitle_id": "91296", "modify": "Change to rice"}     ,{"stitle_id": "91300", "product_id": "1546", "option": "GF"}]');
            $table->string('evg_notes')->nullable()->comment('Some notes say why this guest should attend this event or where he/she should be seated are captured here if any');
            $table->integer('lnk_user_insert')->nullable()->comment('User who inserted this record');
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
        Schema::dropIfExists('event_guests');
    }
};
