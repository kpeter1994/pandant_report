<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BusesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('buses')->delete();
        
        \DB::table('buses')->insert(array (
            0 => 
            array (
                'id' => 1,
                'license_plate' => 'RWA315',
                'site_id' => 6,
                'bus_types_id' => 3,
                'created_at' => '2025-09-24 13:43:18',
                'updated_at' => '2025-09-24 13:43:18',
            ),
            1 => 
            array (
                'id' => 2,
                'license_plate' => 'RWA318',
                'site_id' => 2,
                'bus_types_id' => 2,
                'created_at' => '2025-09-24 13:43:28',
                'updated_at' => '2025-09-24 13:43:28',
            ),
            2 => 
            array (
                'id' => 3,
                'license_plate' => 'AEKF-293	',
                'site_id' => 3,
                'bus_types_id' => 1,
                'created_at' => '2025-09-24 13:43:38',
                'updated_at' => '2025-09-24 13:43:38',
            ),
            3 => 
            array (
                'id' => 4,
                'license_plate' => 'AEKF293',
                'site_id' => 6,
                'bus_types_id' => 3,
                'created_at' => '2025-09-24 13:43:48',
                'updated_at' => '2025-09-24 13:43:48',
            ),
        ));
        
        
    }
}