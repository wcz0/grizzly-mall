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
        Schema::create('store_products', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->primary();
            $table->unsignedBigInteger('mer_id')->default(new \Illuminate\Database\Query\Expression('0'));
            $table->string('image')->default('');
            $table->string('recommend_image')->default('');
            $table->string('slider_image')->default('');
            $table->string('name')->default('');
            $table->string('info')->default('');
            $table->string('keyword')->default('');
            $table->string('bar_code')->default('');
            $table->unsignedInteger('cate_id')->index();
            $table->decimal('price', 8,2);
            $table->decimal('vip_price', 8,2);
            $table->decimal('ot_price', 8,2);
            $table->decimal('postage', 8,2);
            $table->string('unit_name')->default('');
            $table->unsignedInteger('sort')->index()->default(new \Illuminate\Database\Query\Expression('0'));
            $table->unsignedMediumInteger('sales')->index()->default(new \Illuminate\Database\Query\Expression('0'));
            $table->unsignedMediumInteger('stock');
            $table->unsignedTinyInteger('is_show')->index()->default(new \Illuminate\Database\Query\Expression('1'));
            $table->unsignedTinyInteger('is_hot')->index()->default(new \Illuminate\Database\Query\Expression('0'));
            $table->unsignedTinyInteger('is_benefit')->index()->default(new \Illuminate\Database\Query\Expression('0'));
            $table->unsignedTinyInteger('is_best')->index()->default(new \Illuminate\Database\Query\Expression('0'));
            $table->unsignedTinyInteger('is_nwe')->index()->default(new \Illuminate\Database\Query\Expression('1'));
            $table->unsignedTinyInteger('is_virtual')->default(new \Illuminate\Database\Query\Expression('0'));
            $table->unsignedTinyInteger('virtual_type')->default(new \Illuminate\Database\Query\Expression('0'));
            $table->unsignedTinyInteger('is_postage')->index()->default(new \Illuminate\Database\Query\Expression('1'));
            $table->unsignedTinyInteger('mer_use')->default(new \Illuminate\Database\Query\Expression('0'));
            $table->integer('give_integral');
            $table->decimal('cost', 8,2);
            $table->unsignedTinyInteger('is_seckill')->default(new \Illuminate\Database\Query\Expression('0'));
            $table->unsignedTinyInteger('is_bargain')->default(new \Illuminate\Database\Query\Expression('0'));
            $table->unsignedTinyInteger('is_good')->default(new \Illuminate\Database\Query\Expression('0'));
            $table->unsignedTinyInteger('is_sub')->default(new \Illuminate\Database\Query\Expression('0'));
            $table->unsignedTinyInteger('is_vip')->default(new \Illuminate\Database\Query\Expression('0'));
            $table->mediumInteger('ficti')->default(new \Illuminate\Database\Query\Expression('0'));
            $table->unsignedInteger('browse')->default(new \Illuminate\Database\Query\Expression('0'));
            $table->string('code_path')->default('');
            $table->string('source_link')->default('');
            $table->string('video_link')->default('');
            $table->unsignedInteger('temp_id');
            $table->unsignedTinyInteger('spec_type')->default(new \Illuminate\Database\Query\Expression('0'));
            $table->string('activity')->default('');
            $table->string('spu')->default('');
            $table->string('command_word')->default('');
            $table->string('recommend_llist')->default('');
            $table->unsignedTinyInteger('vip_product')->default(new \Illuminate\Database\Query\Expression('0'));
            $table->unsignedTinyInteger('presale')->default(new \Illuminate\Database\Query\Expression('0'));
            $table->dateTime('presale_start_time')->nullable();
            $table->dateTime('presale_end_time')->nullable();
            $table->unsignedInteger('presale_day')->default(new \Illuminate\Database\Query\Expression('1'));
            $table->string('logistics')->default('');
            $table->unsignedTinyInteger('freight');
            $table->string('custom_form')->default('');
            $table->string('is_limit')->default('');
            $table->unsignedTinyInteger('limit_type')->default(new \Illuminate\Database\Query\Expression('0'));
            $table->unsignedInteger('limit_num')->default(new \Illuminate\Database\Query\Expression('0'));
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
        Schema::dropIfExists('store_products');
    }
};
