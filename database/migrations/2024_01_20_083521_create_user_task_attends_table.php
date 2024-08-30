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
        Schema::create('user_task_attends', function (Blueprint $table) {
            $table->id()->comment('Primary key');
            $table->integer('lnk_user_task')->nullable()->comment('The task that this attendant will attend or participates in');
            $table->tinyInteger('attendant_type')->nullable()->comment('Type of this attendant, like supplier or customer or staff');
            $table->integer('lnk_related_rec')->nullable()->comment('If this entity is of type say customer contact or supplier and if the customer contact or supplier already exists in the system, then this is the link to that given record');
            $table->string('mr_mrs', 4)->nullable()->comment('Title of this person like Mr. or Dr.');
            $table->string('first_name', 45)->nullable()->comment('First name of for this person');
            $table->string('last_name', 45)->nullable()->comment('Last name for this person');
            $table->string('company_name', 90)->nullable()->comment('Company name if any');
            $table->string('main_email', 50)->nullable()->comment('Primary email address for this contact');
            $table->string('alt_email', 50)->nullable()->comment('Alternate email for this contact');
            $table->string('phone', 20)->nullable()->comment('Client phone number');
            $table->string('cell_phone', 20)->nullable()->comment('Cleint Cell Phone');
            $table->text('entity_notes')->nullable()->comment('Special notes about this task entity');
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
        Schema::dropIfExists('user_task_attends');
    }
};
