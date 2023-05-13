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
        ini_set('memory_limit', '112048M');
        $a = 1;
        do {
            $data = User::factory()
                ->count(1000)
                ->make();

            User::insert($data->toArray());
            $a++;
        } while ($a <= 10);
    }
}
