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
        Schema::create('event_items', function (Blueprint $table) {
            $table->id()->comment('Primary Key');
            $table->integer('lnk_product_gen')->nullable()->comment('The product that is being added to this event');
            $table->integer('lnk_prod_preparation')->nullable()->comment('If this item also has a preparation, then this is the link');
            $table->integer('lnk_event')->comment('Event to which this item is added');
            $table->integer('lnk_serve_title')->nullable()->comment('The Serve Title for this Event Item. This is null for line items.');
            $table->integer('lnk_parent_item')->nullable()->comment('If this item is an addition to another item, like extra cheese for a burger, then this column provides that link. Linke to EVENT_ITEM');
            $table->integer('lnk_additional_serving_for')->nullable()->comment('If customer is ordering a combo that say serves 4 and then an additional serving of 1. Then we add the additional serving here. This is different from single portion. Single portion can be ordered by itself. But additional serving is possible only if we order the original item and if the original is deleted, additional serving will be deleted as well. Linked to EVENT_ITEM');
            $table->tinyInteger('is_security_deposit')->nullable()->comment('If this is a security deposit and not an actual sales yet, then this flag is set to yes. Security deposits are not charged, they are held against the card and if say customer does not clean, then we charge it.');
            $table->char('item_source',1)->nullable()->comment('The source of this event item which is either Event (E) or Floor Plan (F). When customer submits floor plan and we adjust qtys, then if the source is Event we know that we can not delete this item. But if the source is floor plan, we can remove and / or re-adjust qtys');
            $table->char('catering_type',1)->nullable()->comment('If this item belongs to a catering event, then catering type is stored in the event itself. However sometimes they mix it up and add say restaurant item to a banquet catering event. In that case, the catering type here could be different from that of event itself');
            $table->tinyInteger('age_indicator')->nullable()->comment('Shows if this is for adults, child or N/A');
            $table->tinyInteger('choice_of')->nullable()->comment('If user can pick between two or three options (say some guests can pick chicken and some others meat) then this flag is set to yes. If yes, then total qty of these options plus specialty foods qty (if any) should match total number of guests. Also on the floor plan user should pick between the two or three option when selecting regular meal.');
            $table->string('special_sku')->nullable()->comment('Sometimes we need a special SKU. Say when user picks late night station in itinerary, we add $250 deposit to the event. That is why need to synch between itinerary and event and this column helps do that.');
            $table->mediumText('product_name')->nullable()->comment('Name of the related product. This is stored here so in case it is changed in product table, the old events do not get changed.');
            $table->text('combo_desc')->nullable()->comment('If this is a combo, we save the description or the items in the combo here so in case the main product description changes, here stays intact. This is not related to COMBO_INDEX that is used on events to count menu items');
            $table->string('item_notes')->nullable()->comment('Special notes for this item used in this event');
            $table->tinyInteger('combo_index')->nullable()->comment('If this menu item is part of a combo, then this column provides the index of the combo as definded in SERVE_TITLE.MENU_COMBOS column. In that column combos are separated by ; and the index of first one is and so on');
            $table->float('qty')->nullable()->comment('Quantity for this item');
            $table->float('unit_price')->nullable()->comment('Unit price');
            $table->float('sub_total')->nullable()->comment('Subtotal after discount is applied');
            $table->float('sub_total_ad')->nullable()->comment('Subtotal after discount is applied and before taxes');
            $table->float('tax1_amount')->nullable()->comment('Amount of tax1 on this item if any');
            $table->float('tax2_amount')->nullable()->comment('Amount of tax2 on this item if any');
            $table->float('tax3_amount')->nullable()->comment('Amount of tax3 on this item if any');
            $table->float('tax4_amount')->nullable()->comment('Amount of tax4 on this item if any');
            $table->float('tax5_amount')->nullable()->comment('Amount of tax5 on this item if any');
            $table->float('grand_total')->nullable()->comment('Grand total for this item after taxes');
            $table->tinyInteger('show_order')->nullable()->comment('Show order of this product within the serve title');
            $table->text('guest_names')->nullable()->comment('If this is a specialty menu, then customer might have entered the name of the guests who will get this item via floor plan. In such cases, we populate this column so we can quickly show to user when viewing the event');
            $table->tinyInteger('is_deleted')->nullable()->comment('Is the record logically deleted or not');
            $table->dateTime('dt_deleted')->nullable()->comment('Date and time when the record was deleted');
            $table->integer('lnk_user_delete')->nullable()->comment('User who deleted the record');
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
        Schema::dropIfExists('event_items');
    }
};
