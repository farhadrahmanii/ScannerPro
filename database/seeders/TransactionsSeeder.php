<?php

namespace Database\Seeders;

use App\Models\ConsigneeCompany;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
class TransactionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Ensure required related data exists
        $userIds = DB::table('users')->pluck('id')->toArray();
        $vehicleIds = DB::table('vehicles')->pluck('id')->toArray();
        $categoryIds = DB::table('categories')->pluck('id')->toArray();
        $consigneeCompanytin = ConsigneeCompany::inRandomOrder()->value('consignee_company_tin');
        $siteid = \App\Models\Site::pluck('id')->toArray();

        if (empty($userIds) || empty($vehicleIds) || empty($categoryIds)) {
            $this->command->info('Make sure users, vehicles, and categories tables have data before running this seeder.');
            return;
        }

        // Seed 1000 transactions
        foreach (range(1, 1000) as $index) {
            DB::table('transactions')->insert([
                'site_id' => $faker->randomElement($siteid),
                'user_id' => $faker->randomElement($userIds),
                'vehicle_id' => $faker->randomElement($vehicleIds),
                'transaction_id' => strtoupper($faker->bothify('TRX-####-####')),
                'bill_of_landing' => $faker->bothify('BL-####'),
                'exporting_country' => $faker->country,
                'production_origin' => $faker->optional()->country,
                'item_name' => $faker->words(3, true),
                'category_id' => $faker->randomElement($categoryIds),
                'total_tonnage' => $faker->randomFloat(2, 1, 100),
                'number_of_items' => $faker->numberBetween(1, 100),
                'consignee_company_tin' => $consigneeCompanytin,
                'item_list' => $faker->words(5, true),
                'delivery_location' => $faker->address,
                'scan_status' => $faker->boolean,
                'scan_time' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
