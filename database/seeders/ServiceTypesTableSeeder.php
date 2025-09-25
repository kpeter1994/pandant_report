<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ServiceTypesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('service_types')->delete();
        
        \DB::table('service_types')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Vonal javítás',
                'created_at' => '2025-09-25 09:24:04',
                'updated_at' => '2025-09-25 09:24:04',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Nyári üzemre való felkészítés',
                'created_at' => '2025-09-25 09:24:21',
                'updated_at' => '2025-09-25 09:24:21',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Téli üzemre való felkészítés',
                'created_at' => '2025-09-25 09:24:31',
                'updated_at' => '2025-09-25 09:24:31',
            ),
        ));
        
        
    }
}