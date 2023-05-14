<?php

namespace Database\Seeders;

use App\Models\UserGroup;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('user_groups')->delete();

        UserGroup::insert([
            ['id'=> 1, 'name'=> 'A类客户'],
            ['id'=> 2, 'name'=> 'B类客户'],
            ['id'=> 3, 'name'=> 'C类客户'],
            ['id'=> 4, 'name'=> 'D类客户'],
        ]);
    }
}
