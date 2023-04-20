<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AdminSettingsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('admin_settings')->delete();
        
        \DB::table('admin_settings')->insert(array (
            0 => 
            array (
                'created_at' => '2023-04-19 21:43:28',
                'key' => 'system_theme_setting',
                'updated_at' => '2023-04-21 00:19:32',
                'values' => '{"footer":true,"breadcrumb":true,"breadcrumbIcon":false,"themeColor":"#4080FF","menuWidth":250,"layoutMode":"double","theme":"light","siderTheme":"light","topTheme":"light","animateInType":"alpha","animateInDuration":550,"animateOutType":"alpha","animateOutDuration":450,"loginTemplate":"default","keepAlive":true,"enableTab":true,"tabIcon":true}',
            ),
        ));
        
        
    }
}