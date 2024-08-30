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
        Schema::create('supplier_contacts', function (Blueprint $table) {
            $table->id()->comment('Primary Key');
            $table->integer('lnk_supplier')->comment('The supplier to which this contact belongs');
            $table->string('mr_mrs')->nullable()->comment('Mr or Mrs or Miss');
            $table->string('first_name')->nullable()->comment('First name this contact');
            $table->string('last_name')->nullable()->comment('Last name');
            $table->string('phone')->nullable()->comment('Land line');
            $table->string('cell_phone')->nullable()->comment('Cell phone of this contact if any');
            $table->string('email')->nullable()->comment('email of the main contact');
            $table->string('alt_phone')->nullable()->comment('Alternate phone for this company');
            $table->string('alt_email')->nullable()->comment('Alternate email');
            $table->string('fax')->nullable()->comment('Fax');
            $table->integer('lnk_user')->nullable()->comment('Link to the user that has been created for this supplier to login and provide quotes. Can be null');
            $table->string('addr_line1')->nullable()->comment('Address line 1');
            $table->string('addr_line2')->nullable()->comment('Address line 2');
            $table->string('city')->nullable()->comment('City');
            $table->string('province')->nullable()->comment('Province or state of this company');
            $table->char('country',2)->nullable()->comment('Country of this company');
            $table->string('postal_code')->nullable()->comment('Postal code for this company');
            $table->text('special_notes')->nullable()->comment('Any special notes about this supplier');
            $table->integer('lnk_user_insert')->nullable()->comment('User who first inserted this record');
            $table->integer('lnk_user_update')->nullable()->comment('user who last updated this record');
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
        Schema::dropIfExists('supplier_contacts');
    }
};
