<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
class DriverSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Define how many rows you want to seed
        $numberOfDrivers = 1000;

        foreach (range(1, $numberOfDrivers) as $index) {
            DB::table('drivers')->insert([
                'user_id' => 1, // Assuming users are already seeded
                'name' => $faker->name(),
                'father_name' => $faker->name('male'),
                'national_id' => $faker->unique()->numerify('############'), // Random 12-digit ID
                'passport_no' => $faker->optional()->regexify('[A-Z0-9]{8}'), // Optional random passport
                'contact_information' => $faker->phoneNumber(),
                'nationality' => $faker->country(),
                'transport_company' => $faker->company(),
                'transport_company_tin' => $faker->unique()->numerify('TIN-######'), // Unique TIN
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
