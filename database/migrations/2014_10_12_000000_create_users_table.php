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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('first_name', 40)->nullable();
            $table->string('last_name', 40)->nullable();
            $table->string('login_id', 20)->nullable()->comment('Login id by which user can login');
            $table->string('user_groups', 60)->nullable()->comment('The user groups to which this user belongs');
            $table->text('grant_access')->nullable()->comment('Semi-colon separated list of individual page ids to which this user has access');
            $table->text('revoke_access')->nullable()->comment('Semi-colon separated list of individual page ids to which access by this user has been individually revoked');
            $table->string('landing_page', 100)->nullable();
            $table->tinyInteger('user_role')->nullable()->comment('Role of this user. This is only for the purpose of reporting.');
            $table->tinyInteger('account_status')->nullable()->comment('Account status for this user, full activ, half active, disabled or else');
            $table->string('db_access_rights', 31)->nullable()->comment('User database access rights like SELECT/INSERT/UPDATE/DELETE. It is of form prv[]=1&prv[]=2...');
            $table->date('reg_date')->nullable()->comment('Date when this user has registered or been created');
            $table->dateTime('last_login')->nullable()->comment('Date and time when this user has last logged in');
            $table->dateTime('last_activity_time')->nullable()->comment('The last time this user has been active on the server like opening a new page or saving a form');
            $table->tinyInteger('is_in_training_mode')->nullable()->comment('Tells us if this user is in training mode or not. If in training, then we connect the sessions of this user to the training database');
            $table->text('personal_settings_xml')->nullable()->comment('All the user and application specific settings for this user saved as XML');
            $table->tinyInteger('is_facebook_user')->nullable()->comment('Is this user a Facebook user or a true one');
            $table->string('facebook_id', 20)->nullable()->comment('Unique id of this user in Facebook');
            $table->string('fb_proxy_email', 100)->nullable()->comment('Proxy email of this user given to us through Facebook');
            $table->dateTime('pwd_reset_started')->nullable()->comment('Date/time when current process of resetting password for this user started and relevant email was sent to user');
            $table->dateTime('pwd_reset_ends')->nullable()->comment('Date/time when current process of resetting password ends and the reset code expires.');
            $table->string('pwd_reset_code', 32)->nullable()->comment('Current reset code sent to user in the url');
            $table->string('verify_code', 32)->nullable()->comment('The system generated verification code that is used to verify this user email before its activation');
            $table->dateTime('verify_code_expires_on')->nullable()->comment('The generated verification code expires on this time');
            $table->string('login_ips', 512)->nullable()->comment('The IP addresses from where this user can login if any');
            $table->integer('lnk_user_insert')->nullable()->comment('User who first inserted this record');
            $table->integer('lnk_user_update')->nullable()->comment('User who last updated this record');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
