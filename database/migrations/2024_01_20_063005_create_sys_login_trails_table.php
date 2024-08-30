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
        Schema::create('sys_login_trails', function (Blueprint $table) {
            $table->id()->comment('Primary Key');
            $table->integer('lnk_user')->nullable()->comment('The user that has logged in if any');
            $table->tinyInteger('was_success')->nullable()->comment('Tells us if the login was successful or not');
            $table->integer('num_tried')->nullable()->comment('Number of times user tried to login before success');
            $table->string('user_ip_addr', 50)->nullable()->comment('The IP address of the user who tried to or did login');
            $table->text('ip_geo_loc_json')->nullable()->comment('We send the IP address to some online API and it returns the location info on that IP. Those location info are saved in this column if available');
            $table->string('geo_loc_country', 30)->nullable()->comment('Country where this IP is coming from');
            $table->string('geo_loc_region', 40)->nullable()->comment('The region inside of the country where it comes from');
            $table->string('geo_loc_city', 50)->nullable()->comment('City where the user is connecting from using the IP');
            $table->string('session_id', 50)->nullable()->comment('Id of the current session. We use this id to recognize how many login attempts were tried before successful login');
            $table->dateTime('dt_first_try')->nullable()->comment('Date and time of the first try of this user under this session');
            $table->dateTime('dt_last_try')->nullable()->comment('Date and time of the last try of this user under this sssion');
            $table->dateTime('dt_logged_in')->nullable()->comment('Date and time when user could successfully login if any');
            $table->dateTime('dt_last_active')->nullable()->comment('Date and time when user was active on this specific login. This way if user has logged in multiple times from different computers we can recognize on which one he/she was active and when. It could be null if user login has failed and is still trying');
            $table->dateTime('dt_logged_out')->nullable()->comment('Date and time when this user was logged out of the system if any');
            $table->char('logout_type', 1)->nullable()->comment('Type of logout which is either by user itself or system logged the user out becuase of inactivity for some time');
            $table->text('system_notes')->nullable()->comment('System generated notes on this login if any');
            $table->integer('lnk_user_insert')->nullable()->comment('User who first inserted this record. Could be null if user is not logged in and this was a fail');
            $table->integer('lnk_user_update')->nullable()->comment('User who last updated this record. if user is not logged in and this was a fail');
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
        Schema::dropIfExists('sys_login_trails');
    }
};
