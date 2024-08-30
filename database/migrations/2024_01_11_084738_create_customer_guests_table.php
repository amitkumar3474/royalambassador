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
        Schema::create('customer_guests', function (Blueprint $table) {
            $table->id()->comment('Primary key');
            $table->integer('lnk_customer')->comment('The customer to which this guest belongs. Linked to CUSTOMER');
            $table->integer('lnk_customer_contact')->nullable()->comment('Sometime we want to know who`s guest it is. Say for a wedding, a guest could have been invited by bride or groom. This column gives us that idea');
            $table->string('first_name')->nullable()->comment('First Name for the guest');
            $table->string('last_name')->nullable()->comment('Last Name for the guest');
            $table->tinyInteger('age_type')->nullable()->comment('Age type of this guest like Child or Adult or Senior');
            $table->string('addr_line1')->nullable()->comment('Street Adrress of the guest');
            $table->string('addr_line2')->nullable()->comment('Second line of address like unit or apratment #');
            $table->string('city')->nullable()->comment('City part of the address');
            $table->string('province')->nullable()->comment('Province of the guest');
            $table->string('postal_code')->nullable()->comment('Postal Code of the guest');
            $table->char('country')->nullable()->comment('Country part of address');
            $table->string('phone')->nullable()->comment('Phone number of the guest');
            $table->string('cell_phone')->nullable()->comment('Cell phone for this guest');
            $table->string('email')->nullable()->comment('Email of the guest');
            $table->string('grouping')->nullable()->comment('This column allows user to group guests together. Say if two guest are both under the group Mr Simon then we show them together. We can also have heirarchy. Say guest can be under Groom and then Simon. That way we will have two groups within each other for better display and management');
            $table->string('guest_notes')->nullable()->comment('Extra notes about this guest if any. Say who is it or from which company in case of corporate guests');
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
        Schema::dropIfExists('customer_guests');
    }
};
