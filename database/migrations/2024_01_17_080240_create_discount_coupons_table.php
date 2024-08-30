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
        Schema::create('discount_coupons', function (Blueprint $table) {
            $table->id()->comment('Primary key');
            $table->tinyInteger('type_of_discount')->nullable()->comment('Type of discount: percent or amount');
            $table->float('discount_amount', 7, 2)->nullable()->comment('The actual dollar value of discount if the discount type is by amount');
            $table->tinyInteger('discount_recurs')->nullable()->comment('If this is a discount by amount, then we can choose to recur the discount. It means say if give $25 discount for $150 purchase, then we should give $50 for $300 purchase and so so on');
            $table->float('discount_percent', 5, 2)->nullable()->comment('The discount percent to be given by this coupon if discount type is by percent.');
            $table->float('min_purchase', 9, 2)->nullable()->comment('Minimum purchase required to use this coupon. Zero if not applicable');
            $table->string('coupon_code', 16)->nullable()->comment('The actual unique code for the coupon');
            $table->date('start_date')->nullable()->comment('The date when this coupon will be in effect');
            $table->date('expiry_date')->nullable()->comment('The date when this coupon will expire. Null if it does not expire');
            $table->integer('lnk_customer_sent')->nullable()->comment('The customer to whom we have emailed or mailed this coupon code. ');
            $table->integer('lnk_contact_sent')->nullable()->comment('The customer contact to whom we have emailed or mailed this coupon');
            $table->tinyInteger('is_active')->nullable()->comment('Is this coupon active or probably expired');
            $table->tinyInteger('is_used')->nullable()->comment('If this coupon has been already used or not.');
            $table->tinyInteger('auto_apply')->nullable()->comment('If this is an automatic coupon then system will automatically apply it at time of checkout');
            $table->dateTime('date_time_used')->nullable()->comment('Date and time when this coupon was used if any');
            $table->float('discount_amount_given', 7, 2)->nullable()->comment('Final discount amount given in dollar value. This usefull when discount is by percent or say total amount is less than the discount coupon and it has been already used up.');
            $table->integer('lnk_customer_used')->nullable()->comment('The customer who has used this coupon if any');
            $table->integer('lnk_contact_used')->nullable()->comment('The contact under the customer who has used this coupon if any. ');
            $table->integer('lnk_event_used')->nullable()->comment('The event for which this coupon has been redeemed');
            $table->integer('lnk_event_deposit_used')->nullable()->comment('The deposit under the event for which this coupon has been used');
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
        Schema::dropIfExists('discount_coupons');
    }
};
