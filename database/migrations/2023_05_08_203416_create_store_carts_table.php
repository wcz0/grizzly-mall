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
        Schema::create('store_carts', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->primary();
            $table->unsignedBigInteger('user_id');
            $table->string('type')->index()->default('');
            $table->unsignedBigInteger('product_id')->index();
            $table->string('product_attr')->default('');
            $table->unsignedSmallInteger('number');
            $table->unsignedTinyInteger('is_pay')->default(new \Illuminate\Database\Query\Expression('0'));
            $table->unsignedTinyInteger('is_new');
            $table->unsignedBigInteger('combination_id');
            $table->unsignedBigInteger('seckill_id');
            $table->unsignedBigInteger('bargain_id');
            $table->unsignedBigInteger('advance_id');
            $table->unsignedTinyInteger('state');
            $table->timestamps();
            $table->softDeletes();
            $table->index(['is_pay', 'user_id']);
            $table->index(['is_new', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('store_carts');
    }
};
