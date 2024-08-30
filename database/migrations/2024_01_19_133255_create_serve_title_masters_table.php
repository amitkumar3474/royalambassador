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
        Schema::create('serve_title_masters', function (Blueprint $table) {
            $table->id()->comment('The UID of the Serve Title');
            $table->string('stitle_heading', 80)->nullable()->comment('The heading or title of this serve title master ');
            $table->string('specialty_options')->nullable()->comment('A multi-select that shows the specialty food options possible for the serve titles under this master record');
            $table->integer('lnk_user_insert')->nullable()->comment('User who first inserted this record. Can be null for online catering');
            $table->integer('lnk_user_update')->nullable()->comment('User who last updated this record. Can be null for online catering orders..');
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
        Schema::dropIfExists('serve_title_masters');
    }
};
