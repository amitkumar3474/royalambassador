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
        Schema::create('marketing_campaigns', function (Blueprint $table) {
            $table->id()->comment('Primary Key');
            $table->string('campaign_name', 90)->nullable()->comment('Name of this ad or marketing campaign');
            $table->tinyInteger('includes_gift_cert')->nullable()->comment('Tells us if we emailed or mailed any gift certificate to run this campaign ');
            $table->char('campaign_status', 1)->nullable()->comment('The current status of this campaign');
            $table->tinyInteger('is_active')->nullable()->comment('Tells us if the this campaign has been ever active and we could possibly get customers through it or not. This is easier to use than CAMPAIGN_STATUS in queries. Say even if it is already completed or aborted, we can still get customers through it and it is active.');
            $table->integer('show_order')->nullable()->comment('The order by which to show the source');
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
        Schema::dropIfExists('marketing_campaigns');
    }
};
