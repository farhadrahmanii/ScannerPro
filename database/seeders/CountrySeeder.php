<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $countries = [
            [
                'name' => json_encode([
                    'en' => 'Afghanistan',
                    'ps' => 'افغانستان',
                    'fa' => 'افغانستان'
                ]),
            ],
            [
                'name' => json_encode([
                    'en' => 'United States',
                    'ps' => 'متحده ایالات',
                    'fa' => 'ایالات متحده'
                ]),
            ],
            [
                'name' => json_encode([
                    'en' => 'Pakistan',
                    'ps' => 'پاکستان',
                    'fa' => 'پاکستان'
                ]),
            ],
            // Add more countries here...
        ];

        foreach ($countries as $country) {
            Country::create($country);
        }
    }
}
