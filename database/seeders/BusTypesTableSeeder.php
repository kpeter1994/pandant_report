<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BusTypesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('bus_types')->delete();
        
        \DB::table('bus_types')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'szoló',
                'created_at' => '2025-10-07 08:44:47',
                'updated_at' => '2025-10-07 08:44:47',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'csuklós',
                'created_at' => '2025-10-07 08:44:53',
                'updated_at' => '2025-10-07 08:44:53',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'sprinter',
                'created_at' => '2025-10-07 08:44:57',
                'updated_at' => '2025-10-07 08:44:57',
            ),
        ));
        
        
    }
}