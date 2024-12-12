<?php

namespace Database\Seeders;

use App\Models\Provinces;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'province_id' => 1,
            'site_id' => 2,
            'role' => 'user'
        ]);
        Provinces::factory()->count(10)->sequence(
            ['Province_name' => 'Kabul'],
            ['Province_name' => 'Herat'],
            ['Province_name' => 'Kandahar'],
            ['Province_name' => 'Balkh'],
            ['Province_name' => 'Nangarhar'],
            ['Province_name' => 'Helmand'],
            ['Province_name' => 'Parwan'],
            ['Province_name' => 'Badakhshan'],
            ['Province_name' => 'Paktia'],
            ['Province_name' => 'Baghlan']
        )->create();


    }
}
