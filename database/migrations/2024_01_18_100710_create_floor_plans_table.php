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
        Schema::create('floor_plans', function (Blueprint $table) {
            $table->id()->comment('Primary Key');
            $table->integer('lnk_event')->comment('The event to which this floor plan is related. For each event we can have multiple floor plans');
            $table->integer('lnk_fplan_room')->comment('The room to which this floor plan is related');
            $table->string('fplan_title', 120)->nullable()->comment('Title of the plan. This is mainly to differentiate if we have multiple floor plans for an event');
            $table->text('fplan_desc')->nullable()->comment('Description for the floor plan if any');
            $table->tinyInteger('fplan_descfplan_status')->nullable()->comment('The status of this floor plan, like preparation, submitted to customer, submitted back by customer and finalized');
            $table->tinyInteger('event_qtys_updated')->nullable()->comment('Tells us if event qtys have been updated after this floor plan was saved. After the main floor plan for an event is submitted we also adjust menu qtys in the event. However it is possible that event is submitted and changed again after. That is why we need this extra flag ');
            $table->tinyInteger('is_main_floor_plan')->nullable()->comment('Tells us if this is the main floor plan or not. If this is the main floor plan, then we get the guest numbers form it. Other floor plans are only saved for other purposes and the guests could overlap with this one');
            $table->integer('lnk_user_last_status')->nullable()->comment('The user who caused the status to be updated last time. ');
            $table->tinyInteger('auto_lock_plan')->nullable()->comment('By default we automatically lock the floor plan say 72 hours before the event, unless staff turn this flag off');
            $table->integer('lnk_user_auto_lock_off')->nullable()->comment('If auto lock was turned off on this floor plan, then this column gives us the person who turned it off');
            $table->dateTime('dt_auto_lock_off')->nullable()->comment('Date and time when the auto lock was turned off on this floor plan, if turned off');
            $table->text('submit_history')->nullable()->comment('The submission history of this floor plan back an forth between customer and staff.');
            $table->text('fplan_legend')->nullable()->comment('The legend used for the room. This is copied form FPLAN_ROOM table and is kept here, in case the one in FPLAN_ROOM changes');
            $table->string('fplan_bg_img', 90)->nullable()->comment('The background image used for floor plan. This is copied from FPLAN_ELM and kept here in case the original one changes');
            $table->mediumText('actual_plan_xml')->nullable()->comment('The actual content of the floor plan saved as XML');
            $table->mediumText('cur_screen_shot')->nullable()->comment('The screen shot or svg source of the floor plan as it is on screen. This is included in the pdf to make sure what you see on screen is exactly included in the pdf as is');
            $table->tinyInteger('is_locked')->nullable()->comment('Tell us if this record is currently locked by a user and can not be editted by another one. Is used to make sure two people can not cancel each other`s work');
            $table->integer('lnk_user_lock')->nullable()->comment('User has last locked it if any');
            $table->dateTime('dt_locked')->nullable()->comment('Date and time when this floor plan was locked by a user. Is used to release the lock if too long');
            $table->text('locking_hist')->nullable()->comment('Shows the lock and unlock history');
            $table->string('menu_removed_msg', 120)->nullable()->comment('When have choice of then user picks acutal EVENT_ITEM.UID form floor plan. However user could have deleted that menu item and in that case system cannot adjust qty properly. That is why we set this message here to make sure user will get it.');
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
        Schema::dropIfExists('floor_plans');
    }
};
