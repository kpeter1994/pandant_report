<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SitesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('sites')->delete();
        
        \DB::table('sites')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Debreceni közlekedési üzem',
                'created_at' => '2025-09-24 13:25:52',
                'updated_at' => '2025-09-24 13:25:52',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Kecskeméti közlekedési üzem',
                'created_at' => '2025-09-24 13:25:58',
                'updated_at' => '2025-09-24 13:25:58',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Óbudai üzem  BKV 54 csuklós',
                'created_at' => '2025-09-24 13:26:06',
                'updated_at' => '2025-09-24 13:26:06',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Székesfehérvár helyi közlekedés',
                'created_at' => '2025-09-24 13:26:13',
                'updated_at' => '2025-09-24 13:26:13',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Esztergom Helyközi közlekedés',
                'created_at' => '2025-09-24 13:26:20',
                'updated_at' => '2025-09-24 13:26:20',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Hatvan helyi közlekedés',
                'created_at' => '2025-09-24 13:26:35',
                'updated_at' => '2025-09-24 13:26:35',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Szabadáras közlekedés',
                'created_at' => '2025-09-24 13:26:43',
                'updated_at' => '2025-09-24 13:26:43',
            ),
        ));
        
        
    }
}