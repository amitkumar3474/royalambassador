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
        Schema::create('floor_plan_rooms', function (Blueprint $table) {
            $table->id()->comment('Primary Key');
            $table->string('room_name', 50)->nullable()->comment('Name of this room or combination of rooms');
            $table->text('room_legend')->nullable()->comment('Legend or description for this room if any');
            $table->string('bg_img_file_name', 90)->nullable()->comment('Background image for the floor plan. This is manually uploaded by user');
            $table->integer('room_length')->nullable()->comment('The lenght of this room in feet');
            $table->integer('room_width')->nullable()->comment('The width of this room in feet');
            $table->integer('toolbar_width')->nullable()->comment('The width of the toolbar for floor plans related to this room. Using this var, we can adjust the toolbar much easier');
            $table->float('image_scale', 4, 2)->nullable()->comment('The scaling to be used for images related to these floor plans. We need to have different scaling for vertical vs horizantal rooms');
            $table->text('def_fplan')->nullable()->comment('Default floor plan for this room that is copied into a new floor plan');
            $table->integer('lnk_user_insert')->nullable()->comment('User who first created this record');
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
        Schema::dropIfExists('floor_plan_rooms');
    }
};
