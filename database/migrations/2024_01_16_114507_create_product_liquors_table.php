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
        Schema::create('product_liquors', function (Blueprint $table) {
            $table->id()->comment('Primary Key');
            $table->integer('lnk_product_gen')->comment('Link to the PRODUCT_GEN table that holds the general product information');
            $table->string('lnk_wine_cats')->nullable()->comment('If this is a wine and needs to go on restaurant wine list, then this column gives us the link. Multi-select linked to RSTN_WINE_CAT');
            $table->char('wine_type', 1)->nullable()->comment('Type of this wine if applies like Red, White or Rose');
            $table->integer('lnk_liquor_brand')->comment('Brand of this liquor. Linked to LIQUORE_BRAND');
            $table->string('winery_name')->nullable()->comment('Name of the winery if this is a wine');
            $table->integer('lnk_bin_number')->nullable()->comment('It this is a wine, then we keep it in a bin and this column provides the link. Linked to LIQUOR_BIN');
            $table->double('price_half_bottle')->nullable()->comment('If this is a wine, then this gives us the price for half bottle');
            $table->double('price_by_glass')->nullable()->comment('If this is a wine, then this gives us the price by glass');
            $table->double('price_others')->nullable()->comment('Sometimes they sell liquor by say ounce or 2 ounces. In that case this column keeps the price and the next one the unit');
            $table->string('price_others_unit',2)->nullable()->comment('If we sell this item by other prices like by ounce or two ounces, this column keeps that other unit');
            $table->char('used_at_loc', 1)->nullable()->comment('Tells us where this item is being used. Is it for banquet only, for restaurant or both');
            $table->integer('lnk_vintage_for')->nullable()->comment('If this is wine, then usually there is a vintage. Say we have the same wine but the available vintages are 2015, 2007 and 2020. Each vintage is by itself a product which is separately stored, purchased & sold. So instead of creating a matrix for vintage and price, we add a separate record for each vintage as it makes it easier when purchasing or storing. The main product cannot have a vintage and only the ones that have this column linked to main product can have a value in their vintage. User can only order the ones that have no child vintage (like other vintages) or are a child vintage. Linked to PRODUCT_GEN');
            $table->integer('vintage')->nullable()->comment('This number tells us how old a wine product is');
            $table->float('alcohol_percent', 4, 1)->nullable()->comment('The percentage of alcohol in this product');
            $table->integer('lnk_bottle_size')->nullable()->comment('Bottle size for this liquor. Linked to LIQUOR_SIZE');
            $table->integer('lnk_package_type')->nullable()->comment('The type of package that this product uses');
            $table->integer('lnk_count_package_type')->nullable()->comment('Package type is for ordering and purchasing. However sometimes we can buy them in say singles but still need to count them in packs of 24. That is why we need counting package here');
            $table->string('org_country', 3)->nullable()->comment('Country of origin for this product if any');
            $table->string('org_region')->nullable()->comment('The region like Ontario or California where this wine or liquor product is from if specified');
            $table->string('org_city')->nullable()->comment('The city where this product is originally from if any');
            $table->string('grape_variety')->nullable()->comment('If this is wine, then they may also enter the grape variety of it like Shiraz. Sometimes there is more than one grape and they need to specify the percentage like Shiraz 30%, Gonjo 70%');
            $table->float('avg_consume_person_week', 7, 4)->nullable()->comment('Average consumtion of this liquor product per person per week. This is calculated and used ro suggest how many to purchase each week');
            $table->dateTime('dt_set_active')->nullable()->comment('If this item is active, this gives us the date and time when the item was set as active');
            $table->integer('lnk_user_active')->nullable()->comment('If this product is active, then this column tells us who set this item as active. Linked to SYS_USER');
            $table->dateTime('dt_set_inactive')->nullable()->comment('If this item is set to inactive or end of line, then this is the date and time when the item was set as end of line');
            $table->integer('lnk_user_inactive')->nullable()->comment('If this item has be set to inactive or end of line, then this column tells us who did that. Linked to SYS_USER');
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
        Schema::dropIfExists('product_liquors');
    }
};
