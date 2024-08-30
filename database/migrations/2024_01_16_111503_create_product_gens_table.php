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
        Schema::create('product_gens', function (Blueprint $table) {
            $table->id()->comment('Primary Key');
            $table->string('product_name')->nullable()->comment('Product name');
            $table->string('prod_name_catering')->nullable()->comment('Name of catering if needed');
            $table->text('prod_desc')->nullable()->comment('Special description or remarks about the product');
            $table->char('product_type', 1)->nullable()->comment('Type of this product which is Banquet Menu, Liquor, Restaurant Menu: Drink or Food');
            $table->tinyInteger('product_size')->nullable()->comment('Sometimes we have size for a given product like 6 oz or family portion. This size is part of product and does not change say per event or per sales order');
            $table->integer('numbers_served')->nullable()->comment('Sometimes we have products say as a tray that serves more than one person. In that case this shows the number and is used by kitchen and also when calculating required material');
            $table->integer('pieces_per_serving')->nullable()->comment('Pieces per serving is used for items like bread. Say for each serving, we need two pieces of garlic bread so this way we calculate how many of each piece the kitchen should make');
            $table->integer('lnk_cat')->nullable()->comment('Category of this product. It is mainly used for menu items like banquet or restaurant menu');
            $table->integer('lnk_single_portion_for')->nullable()->comment('If this product is a single portion for a combo product, then this column provides that link. Linked to PRODUCT_GEN. For single portion type of products, we save only a record in PRODUCT_GEN and not PRODUCT_MENU as they are dependent and only need a price and name');
            $table->tinyInteger('favorite_status')->nullable()->comment('Tells us if this item is in the favorite items that are purchase regularly or not');
            $table->string('sku')->nullable()->comment('SKU or item number for this product');
            $table->string('upc')->nullable()->comment('UPC for this product if any');
            $table->tinyInteger('prod_status')->nullable()->comment('Status of this product like pending, active or end of line');
            $table->tinyInteger('is_combo')->nullable()->comment('Tells us if this is a combo or not. If yes, then user should enter what is in the combo');
            $table->integer('lnk_def_supplier')->nullable()->comment('The default supplier for this product if any');
            $table->tinyInteger('unit_of_measure')->nullable()->comment('Unit of measurement for this product');
            $table->integer('decimal_points')->nullable()->comment('Number of decimal points for quantities of this procduct.');
            $table->tinyInteger('is_sold')->nullable()->comment('Can this product be sold or not. Both finished products or raw materials like parts can be sold');
            $table->tinyInteger('is_made')->nullable()->comment('Is this item manufactured or not. If yes, then the manufacturing process will be enabled');
            $table->tinyInteger('is_purchased')->nullable()->comment('Is this product purchased or only manufactured. If yes then purchasing is enabled for this item.');
            $table->double('avg_cost', 9, 2)->nullable()->comment('Cost of this item for reporting purposes');
            $table->double('price_bq_inhouse')->nullable()->comment('Banquet price for inhouse events');
            $table->double('price_bq_catering')->nullable()->comment('Banquet price for catering  events');
            $table->double('price_rstn_inhouse')->nullable()->comment('Restaurant price for inhouse events');
            $table->double('price_rstn_catering')->nullable()->comment('Restaurant price for catering events');
            $table->string('specialty_options')->nullable()->comment('If this item can be used for special meal like allergy or vegeterian, then this multi-select column tells us the type of specialties it can be used for. Format is esp[]=VT&esp[]=DA');
            $table->double('purchase_price', 9, 2)->nullable()->comment('Average purchase price for one unit of this item in its unit of measure and in the host currency for this item');
            $table->double('purchase_price_case', 9, 2)->nullable()->comment('Purchase price by case');
            $table->float('qty_on_hand',9, 3)->nullable()->comment('Current on hand qty for this product');
            $table->float('qty_at_event',9, 3)->nullable()->comment('Qty that has been completed but not moved to warehouse yet and is not considered on hand yet.');
            $table->float('usage_per_month',9, 3)->nullable()->comment('Average usage per month for this product');
            $table->integer('days_to_zero')->nullable()->comment('Based on the current UPM (Usage per Month) and On Hand Qty, this columns shows how many days we have before we run out of this product.');
            $table->float('max_in_stock', 9, 3)->nullable()->comment('Maximum qty allowed for this item. This number is used when purchasing or producing this item so we know how many to buy or produce.');
            $table->float('min_in_stock', 9, 3)->nullable()->comment('The minimum in-stock for this item. If the in-stock value is less than this number, then we have to order the item');
            $table->integer('lead_days_purchase')->nullable()->comment('Lead time in days when we purchase this product');
            $table->text('product_notes')->nullable()->comment('Any notes like update notes are stored here.');
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
        Schema::dropIfExists('product_gens');
    }
};
