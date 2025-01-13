<?php

namespace Database\Seeders;

use App\Models\ConsigneeCompany;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TransportCompany;
use Faker\Factory as Faker;
class ConsigneeCompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 100) as $index) {
            ConsigneeCompany::create([
                'consignee_company_name' => $faker->company(),
                'consignee_company_tin' => $faker->unique()->numerify('TIN##########'), // Random unique TIN
            ]);
        }
    }
}
