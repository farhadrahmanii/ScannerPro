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
            [
                'name' => json_encode([
                    'en' => 'India',
                    'ps' => 'هندوستان',
                    'fa' => 'هند'
                ]),
            ],
            [
                'name' => json_encode([
                    'en' => 'China',
                    'ps' => 'چین',
                    'fa' => 'چین'
                ]),
            ],
            [
                'name' => json_encode([
                    'en' => 'Germany',
                    'ps' => 'جرمنی',
                    'fa' => 'آلمان'
                ]),
            ],
            [
                'name' => json_encode([
                    'en' => 'France',
                    'ps' => 'فرانسه',
                    'fa' => 'فرانسه'
                ]),
            ],
            [
                'name' => json_encode([
                    'en' => 'Italy',
                    'ps' => 'ایتالیا',
                    'fa' => 'ایتالیا'
                ]),
            ],
            [
                'name' => json_encode([
                    'en' => 'Spain',
                    'ps' => 'هسپانیه',
                    'fa' => 'اسپانیا'
                ]),
            ],
            [
                'name' => json_encode([
                    'en' => 'Russia',
                    'ps' => 'روسیه',
                    'fa' => 'روسیه'
                ]),
            ],
            [
                'name' => json_encode([
                    'en' => 'Brazil',
                    'ps' => 'برازیل',
                    'fa' => 'برزیل'
                ]),
            ],
            [
                'name' => json_encode([
                    'en' => 'Japan',
                    'ps' => 'جاپان',
                    'fa' => 'ژاپن'
                ]),
            ],
            [
                'name' => json_encode([
                    'en' => 'South Korea',
                    'ps' => 'جنوبی کوریا',
                    'fa' => 'کره جنوبی'
                ]),
            ],
            [
                'name' => json_encode([
                    'en' => 'Australia',
                    'ps' => 'آسترالیا',
                    'fa' => 'استرالیا'
                ]),
            ],
            [
                'name' => json_encode([
                    'en' => 'Canada',
                    'ps' => 'کاناډا',
                    'fa' => 'کانادا'
                ]),
            ],
            [
                'name' => json_encode([
                    'en' => 'Mexico',
                    'ps' => 'مکسیکو',
                    'fa' => 'مکزیک'
                ]),
            ],
            [
                'name' => json_encode([
                    'en' => 'United Kingdom',
                    'ps' => 'متحده سلطنت',
                    'fa' => 'بریتانیا'
                ]),
            ],
            [
                'name' => json_encode([
                    'en' => 'South Africa',
                    'ps' => 'جنوبی افریقا',
                    'fa' => 'آفریقای جنوبی'
                ]),
            ],
            // Add more countries here...
        ];

        foreach ($countries as $country) {
            Country::create($country);
        }
    }
}
