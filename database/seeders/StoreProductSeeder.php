<?php

namespace Database\Seeders;

use App\Models\StoreProduct;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StoreProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $a = 1;
        do {
            $data = StoreProduct::factory()
                ->count(10)
                ->make();

            StoreProduct::insert($data->toArray());
            $a++;
        } while ($a <= 1000);
    }
}
