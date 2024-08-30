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
        Schema::create('user_tasks', function (Blueprint $table) {
            $table->id()->comment('Primary Key');
            $table->integer('lnk_owner')->nullable()->comment('Owner or the person who should do this task. Linked to SYS_USER table');
            $table->string('task_title', 180)->nullable()->comment('Title for this task');
            $table->text('task_desc')->nullable()->comment('Description of the task');
            $table->integer('lnk_main_task')->nullable()->comment('If a task needs more than one member of staff, then we insert a task for each individual attending staff. Then this column gives us the original and main task record.');
            $table->integer('lnk_replicated_from')->nullable()->comment('If this tasks is a recurring one and is replicated from another task, then this column keeps the link to the original task');
            $table->tinyInteger('task_type')->nullable()->comment('Type of this task like Call, Email or Appointment');
            $table->tinyInteger('task_sub_type')->nullable()->comment('Sub-type of this task if it applies. Say if this task is related to a second deposit collection, then this field show that');
            $table->integer('lnk_event')->nullable()->comment('If this task is related to an existing event, then this column keeps the reference');
            $table->integer('lnk_org_task')->nullable()->comment('If this task has been created as a result of another task, then this is the link to the original task');
            $table->tinyInteger('task_status')->nullable()->comment('The status of this taks, pending, done, aborted or re-scheduled');
            $table->dateTime('starts_at')->nullable()->comment('Date and time when this task is scheduled for');
            $table->dateTime('finishes_at')->nullable()->comment('This is the date and time when this task is supposed to finish');
            $table->dateTime('done_at')->nullable()->comment('Date and time when this task was accomplished');
            $table->tinyInteger('next_step')->nullable()->comment('Type of next step like follow-up, closed or appointment');
            $table->integer('lnk_next_step_doer')->nullable()->comment('The person who should perform the next step. Linked to SYS_USER table');
            $table->dateTime('next_step_dt')->nullable()->comment('Date and time when we should do the next step');
            $table->text('next_step_notes')->nullable()->comment('Notes for the next step. When a task is set as done, a new task will be generated and these notes will be transferred to TASK_NOTE column of that new task');
            $table->text('reschedule_notes')->nullable()->comment('If this task is re-scheduled, then this field will contain automatic reschedule notes in reverese chronological order');
            $table->dateTime('dt_cancelled')->nullable()->comment('Date and time when this task was set as cancelled');
            $table->integer('lnk_user_cancel')->nullable()->comment('User who set this task as cancelled');
            $table->tinyText('cancel_reason')->nullable()->comment('The reason why this task was cancelled if any');
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
        Schema::dropIfExists('user_tasks');
    }
};
