<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AdminUsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('admin_users')->delete();
        
        \DB::table('admin_users')->insert(array (
            0 => 
            array (
                'avatar' => NULL,
                'created_at' => '2023-04-17 09:14:56',
                'id' => 1,
                'name' => 'Administrator',
                'password' => '$2y$10$//bRFNll86fZ/5L1UJ/XWe2MDI.HWb3UfnL1IAi74XlmSXr3ZIUzu',
                'remember_token' => NULL,
                'updated_at' => '2023-04-17 09:14:56',
                'username' => 'admin',
                'last_ip' => '',
                'last_time' => '2023-04-17 09:14:56',
                'login_count' => 0,
                'level' => 0,
                'state' => 1,
                'division_id' => 0,
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'avatar' => NULL,
                'created_at' => '2023-04-21 00:35:11',
                'id' => 2,
                'name' => '李四',
                'password' => '$2y$10$zdUa3VmG6i1IgTtW88ECOONYUhXxvqzdOXlhrUhebgVSCUcvPVqkm',
                'remember_token' => NULL,
                'updated_at' => '2023-04-21 00:35:11',
                'username' => 'user',
                'last_ip' => '',
                'last_time' => '2023-04-17 09:14:56',
                'login_count' => 0,
                'level' => 0,
                'state' => 1,
                'division_id' => 0,
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'avatar' => NULL,
                'created_at' => '2023-04-21 00:35:29',
                'id' => 3,
                'name' => '张三',
                'password' => '$2y$10$wy01GSOmxgFQ/WAu3pFlFOOsQZ3pDPuLNjUx6UV5UJRo4kkeRa0oS',
                'remember_token' => NULL,
                'updated_at' => '2023-04-21 00:35:29',
                'username' => 'manager',
                'last_ip' => '',
                'last_time' => '2023-04-17 09:14:56',
                'login_count' => 0,
                'level' => 0,
                'state' => 1,
                'division_id' => 0,
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}