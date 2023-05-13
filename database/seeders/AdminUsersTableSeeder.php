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
                'deleted_at' => NULL,
                'division_id' => 0,
                'id' => 1,
                'last_ip' => '127.0.0.1',
                'last_time' => '2023-05-12 00:39:20',
                'level' => 0,
                'login_count' => 3,
                'name' => 'Administrator',
                'password' => '$2y$10$//bRFNll86fZ/5L1UJ/XWe2MDI.HWb3UfnL1IAi74XlmSXr3ZIUzu',
                'remember_token' => NULL,
                'state' => 1,
                'updated_at' => '2023-05-12 00:39:20',
                'username' => 'admin',
            ),
            1 => 
            array (
                'avatar' => NULL,
                'created_at' => '2023-04-21 00:35:11',
                'deleted_at' => NULL,
                'division_id' => 0,
                'id' => 2,
                'last_ip' => '',
                'last_time' => '2023-04-17 09:14:56',
                'level' => 0,
                'login_count' => 0,
                'name' => '李四',
                'password' => '$2y$10$zdUa3VmG6i1IgTtW88ECOONYUhXxvqzdOXlhrUhebgVSCUcvPVqkm',
                'remember_token' => NULL,
                'state' => 1,
                'updated_at' => '2023-04-21 00:35:11',
                'username' => 'user',
            ),
            2 => 
            array (
                'avatar' => NULL,
                'created_at' => '2023-04-21 00:35:29',
                'deleted_at' => NULL,
                'division_id' => 0,
                'id' => 3,
                'last_ip' => '',
                'last_time' => '2023-04-17 09:14:56',
                'level' => 0,
                'login_count' => 0,
                'name' => '张三',
                'password' => '$2y$10$wy01GSOmxgFQ/WAu3pFlFOOsQZ3pDPuLNjUx6UV5UJRo4kkeRa0oS',
                'remember_token' => NULL,
                'state' => 1,
                'updated_at' => '2023-04-21 00:35:29',
                'username' => 'manager',
            ),
        ));
        
        
    }
}