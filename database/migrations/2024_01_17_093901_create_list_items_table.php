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
        Schema::create('list_items', function (Blueprint $table) {
            $table->id()->commrnt('Primary Key');
            $table->integer('lnk_list')->comment('The list to which this item is linked');
            $table->integer('lnk_related_rec')->nullable()->comment('A list is the representation of data stored in another table. So this column gives us to that table which is defined in the table LIST');
            $table->string('name_on_list', 120)->nullable()->comment('Name of this item on the list. Sometimes the name on a list is different from the original name');
            $table->integer('lnk_list_cat')->nullable()->comment('The category under this list to which this item belongs');
            $table->double('list_price', 6,2)->nullable()->comment('If the item also needs a price for this list, then we store it here');
            $table->string('more_prices_json')->nullable()->comment('Sometimes we have more than one price for an item. Say we can sell a bottle of wine in full or by glass or half bottle. Instead of adding multiple columns for each, we store them here as JSON');
            $table->integer('show_order')->nullable()->comment('The order by which thus item should show in the list');
            $table->tinyInteger('add_desc')->nullable()->comment('Tells us if we need the description to show on screen or not. Basically if we should the PROD_DESC via API or not');
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
        Schema::dropIfExists('list_items');
    }
};
