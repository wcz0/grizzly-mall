<?php

namespace Database\Factories;

use App\Models\StoreProductCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\StoreProduct>
 */
class StoreProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id' => app('snowflake')->id(),
            'mer_id' => 0, //todo 临时
            'image' => fake()->imageUrl,
            'recommend_image' => fake()->imageUrl,
            'slider_image' => fake()->imageUrl,
            'name' => fake()->text(mt_rand(15,25)),
            'info' => fake()->text(200),
            'keyword' => fake()->text(10),
            'bar_code' => fake()->uuid,
            'cate_id' => StoreProductCategory::offset(mt_rand(0, StoreProductCategory::count() - 1))->first()->id,
            'price' => fake()->randomFloat(2, 0, 100000),
            'vip_price' => fake()->randomFloat(2, 0, 100000),
            'ot_price' => fake()->randomFloat(2, 0, 100000),
            'postage' => fake()->randomFloat(2, 0, 100),
            'unit_name' => ['个', '件', '箱', '条', '片'][mt_rand(0, 4)],
            'sort' => mt_rand(0, 100),
            'sales' => mt_rand(0, 100000),
            'stock' => mt_rand(0, 100000),
            'is_show' => [0, 1, 1][mt_rand(0, 2)],
            'is_hot' => [0, 0, 1][mt_rand(0, 2)],
            'is_benefit' => [0, 0, 1][mt_rand(0, 2)],
            'is_best' => [0, 0, 1][mt_rand(0, 2)],
            'is_new' => [0, 0, 1][mt_rand(0, 2)],
            'is_virtual' => [0, 0, 1][mt_rand(0, 2)],
            'virtual_type' => mt_rand(0, 2),
            'is_postage' => [0, 0, 1][mt_rand(0, 2)],
            'mer_use' => [0, 0, 1][mt_rand(0, 2)],
            'give_integral' => mt_rand(0, 100000),
            'cost' => fake()->randomFloat(2, 0, 100000),
            'is_seckill' => [0, 0, 1][mt_rand(0, 2)],
            'is_bargain' => [0, 0, 1][mt_rand(0, 2)],
            'is_good' => [0, 0, 1][mt_rand(0, 2)],
            'is_sub' => [0, 0, 1][mt_rand(0, 2)],
            'is_vip' => [0, 0, 1][mt_rand(0, 2)],
            'ficti' => mt_rand(0, 100000),
            'browse' => mt_rand(0, 100000),
            'code_path' => fake()->imageUrl(),
            'soure_link' => fake()->imageUrl(),
            'video_link' => fake()->imageUrl(),
            'temp_id' => 0, //todo
            'spec_type' => [0, 0, 1][mt_rand(0, 2)],
            'activity' => ['0,1,2,3', '0,2,1,3', '0,3,2,1'][mt_rand(0, 2)],
            'spu' => fake()->uuid,
            'command_word' => fake()->text(30),
            'recommend_list' => 0, //todo:
            'vip_product' => [0, 0, 1][mt_rand(0, 2)],
            'presale' => [0, 0, 1][mt_rand(0, 2)],
            'presale_start_time' => fake()->dateTime,
            'presale_end_time' => fake()->dateTime,
            'presale_day' => mt_rand(0, 5),
            'logistics' => '1,2',
            'freight' => mt_rand(0, 2),
            'custom_form' => '', //todo
            'is_limit' => [0, 0, 1][mt_rand(0, 2)],
            'limit_type' => mt_rand(0, 2),
            'limit_num' => mt_rand(0, 20),
            'created_at' => fake()->dateTime,
            'updated_at' => fake()->dateTime,
            'deleted_at' => [null, null, fake()->dateTime][mt_rand(0, 2)],
        ];
    }
}
