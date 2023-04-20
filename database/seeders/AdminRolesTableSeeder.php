<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AdminRolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('admin_roles')->delete();
        
        \DB::table('admin_roles')->insert(array (
            0 => 
            array (
                'created_at' => '2023-04-17 09:14:56',
                'id' => 1,
                'name' => 'Administrator',
                'slug' => 'administrator',
                'updated_at' => '2023-04-17 09:14:56',
            ),
            1 => 
            array (
                'created_at' => '2023-04-21 00:33:31',
                'id' => 2,
                'name' => 'user',
                'slug' => 'user',
                'updated_at' => '2023-04-21 00:33:31',
            ),
            2 => 
            array (
                'created_at' => '2023-04-21 00:34:12',
                'id' => 3,
                'name' => 'manager',
                'slug' => 'manager',
                'updated_at' => '2023-04-21 00:34:12',
            ),
        ));
        
        
    }
}