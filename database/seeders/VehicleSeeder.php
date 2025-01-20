<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
class VehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Define how many rows you want to seed
        $numberOfVehicles = 1000;
        $siteid = \App\Models\Site::pluck('id')->toArray();
        // Loop to insert multiple records
        foreach (range(1, $numberOfVehicles) as $index) {
            DB::table('vehicles')->insert([
                'site_id' => $faker->randomElement($siteid),
                'user_id' => 1, // Assuming users are already seeded
                'driver_id' => $faker->numberBetween(1, 3), // Assuming drivers are already seeded
                'vehicle_make' => $faker->word(),
                'vehicle_model' => $faker->word(),
                'year' => $faker->year(),
                'capacity' => $faker->randomFloat(2, 1, 10), // Random capacity between 1 and 10 tons
                'type' => $faker->word(),
                'plate_number' => $faker->unique()->numberBetween(1000, 9999),
                'vin' => $faker->regexify('[A-HJ-NPR-Z0-9]{17}'), // Random VIN generation
                'colour' => $faker->safeColorName(),
                'extended_body_type' => $faker->word(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

    }
}
