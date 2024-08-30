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
        Schema::create('sys_user_limits', function (Blueprint $table) {
            $table->id()->comment('Primary Key');
            $table->string('limit_name', 80)->nullable()->comment('A name or title given to this limit to remember what it was');
            $table->integer('lnk_user')->nullable()->comment('The user to which this limit applies');
            $table->tinyInteger('limit_type')->nullable()->comment('Type of limit like cookie or IP Restriction');
            $table->string('ip_address', 20)->nullable()->comment('If the limit type is IP, then the IP from where user can connect');
            $table->string('cookie_name', 80)->nullable()->comment('If the limit type is cookie, then name of the cookie');
            $table->string('cookie_val', 80)->nullable()->comment('If the limit type is cookie, then value of the cookie');
            $table->string('encrypt_key', 30)->nullable()->comment('The key used to encrypt the cookie');
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
        Schema::dropIfExists('sys_user_limits');
    }
};
