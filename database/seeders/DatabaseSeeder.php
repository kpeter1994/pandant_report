<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        Role::factory()->create(['name' => 'Admin']);

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'smitpeter777@gmail.com',
            'password' => Hash::make('aA123456'),
            'role_id' => Role::where('name', 'Admin')->first()->id,
        ]);
        $this->call(SitesTableSeeder::class);
    }
}
