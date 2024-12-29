<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Testing\Fakes\Fake;

class SiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Disable foreign key checks to prevent constraint issues
        Schema::disableForeignKeyConstraints();
        DB::table('sites')->truncate(); // Clear the table before seeding
        Schema::enableForeignKeyConstraints();

        // Ensure provinces exist before seeding sites
        $provinceIds = DB::table('provinces')->pluck('id')->toArray();

        if (empty($provinceIds)) {
            $this->command->info('No provinces found! Please seed the provinces table first.');
            return;
        }

        // Sample data for sites
        DB::table('sites')->insert([
            [
                'provinces_id' => $provinceIds[0] ?? 1,
                'site_name' => 'Site Alpha',
                'site_manager' => Fake()->name(),
                'site_manager_contact_Details' => fake()->phoneNumber(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'provinces_id' => $provinceIds[1] ?? 2,
                'site_name' => 'Site Beta',
                'site_manager' => Fake()->name(),
                'site_manager_contact_Details' => fake()->phoneNumber(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'provinces_id' => $provinceIds[2] ?? 3,
                'site_name' => 'Site Gamma',
                'site_manager' => Fake()->name(),
                'site_manager_contact_Details' => fake()->phoneNumber(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
