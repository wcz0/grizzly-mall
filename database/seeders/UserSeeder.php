<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $a = 1;
        do {
            $data = User::factory()
                ->count(10)
                ->make();

            User::insert($data->toArray());
            $a++;
        } while ($a <= 1000);
    }
}
