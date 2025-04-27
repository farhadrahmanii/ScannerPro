<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TransportCompany;
use Faker\Factory as Faker;
class TransportCompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            TransportCompany::create([
                'transport_company_name' => $faker->company(),
                'transport_company_tin' => $faker->unique()->numerify('TIN##########'), // Random unique TIN
            ]);
        }
    }
}
