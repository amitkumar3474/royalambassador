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
        Schema::create('speed_optimizes', function (Blueprint $table) {
            $table->id()->comment('Primary Key');
            $table->string('content_id', 50)->nullable()->comment('Unique id given to this processed content which is more descriptive than UID');
            $table->longText('processed_content')->nullable()->comment('The pre-processed content that is stored here in order to speed up the process');
            $table->string('content_desc', 512)->nullable()->comment('Description of what this content is and where it is used');
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
        Schema::dropIfExists('speed_optimizes');
    }
};
