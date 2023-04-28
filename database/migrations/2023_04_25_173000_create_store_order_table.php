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
        Schema::create('store_order', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('parent_id');
            $table->string('trade_no')->default('');
            $table->string('user_name')->default('');
            $table->string('user_phone')->default('');
            $table->string('user_address')->default('');
            $table->text('caer_id');
            $table->decimal('freight_price', 8,2);
            $table->unsignedInteger('total_num');
            $table->decimal('total_price', 8,2);
            $table->decimal('total_postage', 8,2);
            $table->decimal('pay_price', 8,2)->index();
            $table->decimal('pay_postage', 8,2);
            $table->decimal('deduction_price', 8,2);
            $table->unsignedBigInteger('coupon_id')->index();
            $table->decimal('coupon_price', 8,2);
            $table->unsignedTinyInteger('pay_status')->index();
            $table->dateTime('pay_time')->index();
            $table->string('pay_type')->index()->default('');
            $table->unsignedTinyInteger('state')->index();
            $table->unsignedTinyInteger('refund_status');
            $table->unsignedTinyInteger('refund_type');
            $table->string('refund_express')->default('');
            $table->string('refund_express_name')->default('');
            $table->string('refund_reason_image')->default('');
            $table->string('refund_reason_explain')->default('');
            $table->dateTime('refund_time');
            $table->string('refund_reason')->default('');
            $table->string('refund_reject')->default('');
            $table->decimal('refund_price', 8,2);
            $table->string('delivery_name')->default('');
            $table->string('delivery_code')->default('');
            $table->string('delivery_type')->default('');
            $table->string('delivery_id')->default('');
            $table->string('fictitious_content')->default('');
            $table->unsignedInteger('delivery_id');
            $table->decimal('gain_integral', 8,2);
            $table->decimal('use_integral', 8,2);
            $table->decimal('back_integral', 8,2);
            $table->unsignedBigInteger('spread_user');
            $table->unsignedBigInteger('spread_super_user');
            $table->decimal('one_brokerage');
            $table->decimal('two_brokerage');
            $table->string('mark')->default('');
            $table->string('remark')->default('');
            $table->unsignedInteger('mer_id');
            $table->unsignedTinyInteger('is_mer_check');
            $table->unsignedBigInteger('combination_id');
            $table->unsignedInteger('pink_id');
            $table->decimal('cost', 8,2);
            $table->unsignedBigInteger('seckill_id');
            $table->unsignedInteger('bargain_id');
            $table->unsignedBigInteger('advance_id');
            $table->string('verify_code')->default('');
            $table->unsignedInteger('store_id');
            $table->unsignedTinyInteger('shipping_type');
            $table->unsignedInteger('clerk_id');
            $table->unsignedTinyInteger('is_channel');
            $table->unsignedTinyInteger('is_remind');
            $table->string('channel_type')->default('');
            $table->string('province')->default('');
            $table->string('express_dump')->default('');
            $table->unsignedTinyInteger('virtual_type');
            $table->string('virtual_info')->default('');
            $table->unsignedBigInteger('pay_user');
            $table->text('custom_form');
            $table->unsignedInteger('staff_id');
            $table->unsignedInteger('agent_id');
            $table->unsignedInteger('division_id');
            $table->decimal('staff_brokerage', 8,2);
            $table->decimal('agent_brokerage', 8,2);
            $table->decimal('division_brokerage', 8,2);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('store_order');
    }
};
