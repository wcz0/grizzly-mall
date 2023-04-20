<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AdminRoleUsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('admin_role_users')->delete();
        
        \DB::table('admin_role_users')->insert(array (
            0 => 
            array (
                'created_at' => '2023-04-17 09:14:56',
                'role_id' => 1,
                'updated_at' => '2023-04-17 09:14:56',
                'user_id' => 1,
            ),
            1 => 
            array (
                'created_at' => '2023-04-21 00:35:11',
                'role_id' => 2,
                'updated_at' => '2023-04-21 00:35:11',
                'user_id' => 2,
            ),
            2 => 
            array (
                'created_at' => '2023-04-21 00:35:29',
                'role_id' => 3,
                'updated_at' => '2023-04-21 00:35:29',
                'user_id' => 3,
            ),
        ));
        
        
    }
}