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
        Schema::create('inv_counts', function (Blueprint $table) {
            $table->id()->comment('Primary Key');
            $table->date('count_date')->nullable()->comment('The date of this inventory count');
            $table->string('inv_levels', 100)->nullable()->comment('The inventory levels whose items we are counting. A multi-select in ilevel[]=10&ilevel[]=5');
            $table->tinyInteger('inv_count_status')->nullable()->comment('The status of this inventory count like preparation or  being counted');
            $table->integer('lnk_started_by')->nullable()->comment('User who started counting. Linked to SYS_USER');
            $table->dateTime('dt_started')->nullable()->comment('Date and time when counting started');
            $table->text('count_start_notes')->nullable()->comment('Special notes when starting to do the count');
            $table->integer('lnk_finished_by')->nullable()->comment('User who finished and applied the count.. Linked to SYS_USER');
            $table->dateTime('dt_finished')->nullable()->comment('Date and time when this count was finished and applied');
            $table->text('count_finish_notes')->nullable()->comment('Special notes when finishing and applying the counts');
            $table->integer('lnk_cancelled_by')->nullable()->comment('If this count has been cancelled, then this columns tell us who cancelled it. Linked to SYS_USER');
            $table->dateTime('dt_cancelled')->nullable()->comment('If this count has been cancelled, then this column gives us the date and time when it was cancelled');
            $table->text('cancel_notes')->nullable()->comment('If this count has been cancelledm then this column holds the cancellation notes');
            $table->integer('total_discrep_qty')->nullable()->comment('Total qty of dicrepency. This is the sum of discrepency count for each related INV_COUNT_ITEM');
            $table->float('total_discrep_val', 9, 2)->nullable()->comment('Total value of dicrepency. This is the sum of discrepency value for each related INV_COUNT_ITEM');
            $table->integer('lnk_auto_count_last_prod')->nullable()->comment('If this is an automatically created cycle count, then this column links to the last product in this count. So next time we know that the next cycle count should start on the part number after this one. ');
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
        Schema::dropIfExists('inv_counts');
    }
};
