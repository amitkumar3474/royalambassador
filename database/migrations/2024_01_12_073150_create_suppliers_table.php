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
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id()->comment('Primary Key');
            $table->string('supplier_name')->nullable()->comment('Company name of this supplier');
            $table->tinyInteger('is_liquor_supplier')->nullable()->comment('Is this supplier provides liquor products or not');
            $table->string('general_email')->nullable()->comment('General email of this supplier like info@');
            $table->string('main_phone')->nullable()->comment('Contact phone number');
            $table->string('alt_phone')->nullable()->comment('Alternate phone for this company');
            $table->string('fax')->nullable()->comment('Fax');
            $table->float('min_order_amount')->nullable()->comment('Minimum dollar value for the orders placed to this supplier if any');
            $table->tinyInteger('overall_rank')->nullable()->comment('Rank of this supplier, like highest or normal. When the prices are the same, the supplier with higher rank gets the job');
            $table->string('addr_line1')->nullable()->comment('Address line 1');
            $table->string('addr_line2')->nullable()->comment('Address line 2');
            $table->string('city')->nullable()->comment('City');
            $table->string('province')->nullable()->comment('Province or state of this company');
            $table->char('country')->nullable()->comment('Country of this company');
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
        Schema::dropIfExists('suppliers');
    }
};
