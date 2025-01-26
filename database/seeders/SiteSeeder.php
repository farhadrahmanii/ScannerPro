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
                'site_name' => 'Kabul Inland Container Depot (ICD-1)',
                'port' => 'Kabul Inland Container Depot',
                'provinces_id' => $provinceIds[0],
                'site_manager' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'site_name' => 'Ghazanfar Port (GP-1)',
                'port' => 'Ghazanfar Port',
                'provinces_id' => $provinceIds[2],
                'site_manager' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'site_name' => 'Hairatan Port (HP-1)',
                'port' => 'Hairatan Port',
                'provinces_id' => $provinceIds[2],
                'site_manager' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'site_name' => 'Shir Khan Bandar Port (SBP-1)',
                'port' => 'Shir Khan Bandar Port',
                'provinces_id' => $provinceIds[11],
                'site_manager' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'site_name' => 'Imamnazar Port (IP-1)',
                'port' => 'Imamnazar Port',
                'provinces_id' => $provinceIds[4],
                'site_manager' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'site_name' => 'Aqina Dry Port (ADP-1)',
                'port' => 'Aqina Dry Port',
                'provinces_id' => $provinceIds[9],
                'site_manager' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'site_name' => 'Torghundi Port (TP-1)',
                'port' => 'Torghundi Port',
                'provinces_id' => $provinceIds[0],
                'site_manager' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'site_name' => 'Spin Boldak dry port (SBP-1)',
                'port' => 'Spin Boldak dry port',
                'provinces_id' => $provinceIds[1],
                'site_manager' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'site_name' => 'Islam Qala Port (IQP-1)',
                'port' => 'Islam Qala Port',
                'provinces_id' => $provinceIds[1],
                'site_manager' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'site_name' => 'Dry port of Baramcha (DPB-1)',
                'port' => 'Dry port of Baramcha',
                'provinces_id' => $provinceIds[12],
                'site_manager' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
