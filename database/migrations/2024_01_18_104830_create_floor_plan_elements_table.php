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
        Schema::create('floor_plan_elements', function (Blueprint $table) {
            $table->id()->comment('Primary Key');
            $table->integer('show_order')->nullable()->comment('The order by which to show this element on the toolbar');
            $table->string('elm_name', 60)->nullable()->comment('Name of this floor plan element like round table or podium');
            $table->string('abbreviated_name', 10)->nullable()->comment('Short name for this element to appear on the tool bar');
            $table->tinyInteger('elm_cat')->nullable()->comment('The category of this element. Say is this a round table, rectangle table or podium');
            $table->tinyInteger('is_guest_table')->nullable()->comment('Is it a guest table or other type like antipasto or cake table. If not a guest table, then user can not add guests to it');
            $table->tinyInteger('elm_active')->nullable()->comment('Status of this floor plan element like active or disabled');
            $table->tinyInteger('elm_usage_type')->nullable()->comment('This element to be used by staff only or both customer and staff');
            $table->tinyInteger('for_event_type')->nullable()->comment('Type of event that this element can be used for: regular events, special events or both');
            $table->tinyInteger('shape')->nullable()->comment('Shape of this table like round, rectangle or others');
            $table->float('width', 5, 2)->nullable()->comment('Width of this element if it applies');
            $table->float('length', 5, 2)->nullable()->comment('Length of this element if it applies');
            $table->float('diameter', 5, 2)->nullable()->comment('Diameter of the element for the round items');
            $table->float('height', 5, 2)->nullable()->comment('Height of the element if applies');
            $table->string('color', 6)->nullable()->comment('The 6 digit hex color code for this element if required');
            $table->string('bg_img', 40)->nullable()->comment('The background image for this element');
            $table->string('capacity_desc', 128)->nullable()->comment('Capacity description of this element. Say for guest tables it applies but not reception tables.');
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
        Schema::dropIfExists('fplan_elements');
    }
};
