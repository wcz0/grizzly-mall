<?php

namespace Database\Factories;

use App\Models\UserGroup;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $snowflake = app('snowflake');
        return [
            'id' => $snowflake->id(),
            'username' => fake()->uuid(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'name' => fake()->name(),
            'birthday' => fake()->date(),
            'card_id' => 460033199901010001,
            'mark' => fake()->text(),
            'group_id' => UserGroup::offset(mt_rand(1, UserGroup::count() - 1))->first()->id,
            'nickname' => fake()->name(),
            'avatar' => fake()->imageUrl(),
            'phone' => fake()->phoneNumber(),
            'add_ip' => fake()->ipv4(),
            'last_time' => fake()->dateTime(),
            'last_ip' => fake()->ipv4(),
            'money' => fake()->randomFloat(2, 0, 100000),
            'brokerage_price' => fake()->randomFloat(2, 0, 100000),
            'integral' => mt_rand(0, 10000),
            'exp' => fake()->randomFloat(2, 0, 100000),
            'sign_num' => mt_rand(0, 31),
            'state' => [0, 1, 1][mt_rand(0, 2)],
            'level' => mt_rand(0, 5),
            'agent_level' => mt_rand(0, 2),
            'spread_open' => mt_rand(0, 1),
            'spread_id' => 0, //todo
            'spread_time' => null, //todo
            'user_type' => ['pc', 'applet', 'h5'][mt_rand(0, 2)],
            'is_promoter' => [0, 0, 1][mt_rand(0, 2)],
            'pay_count' => mt_rand(0, 100),
            'spread_count' => 0,
            'clean_time' => fake()->dateTime(),
            'address' => fake()->address(),
            'admin_id' => 0,
            'login_type' => mt_rand(0, 2),
            'record_phone' => fake()->phoneNumber(),
            'member_level' => mt_rand(0, 2),
            'member_ever' => [0, 0, 0, 1][mt_rand(0, 3)],
            'overdue_time' => fake()->dateTime(),
            'division_type' => 0, //todo
            'division_status' => 0, //todo
            'is_division' => 0,
            'is_agent' => 0,
            'is_staff' => 0,
            'division_percent' => mt_rand(0, 10),
            'division_change' => null,
            'division_end_time' => fake()->dateTime(),
            'email' => fake()->safeEmail(),
            'created_at' => fake()->dateTime(),
            'updated_at' => fake()->dateTime(),
            'deleted_at' => mt_rand(1, 100) <= 5 ? fake()->dateTime() : null,
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
