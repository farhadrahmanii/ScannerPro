<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Provinces;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Factories\CategoryFactory;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'status' => 1,
            'site_id' => 2,
            'phone' => fake()->phoneNumber(),
            'role' => 'admin'
        ]);

        Provinces::factory()->count(13)->sequence(
            ['Province_name' => 'Kabul'],
            ['Province_name' => 'Herat'],
            ['Province_name' => 'Kandahar'],
            ['Province_name' => 'Balkh'],
            ['Province_name' => 'Nangarhar'],
            ['Province_name' => 'Takhar'],
            ['Province_name' => 'Parwan'],
            ['Province_name' => 'Badakhshan'],
            ['Province_name' => 'Paktia'],
            ['Province_name' => 'Baghlan'],
            ['Province_name' => 'Faryab'],
            ['Province_name' => 'khost'],
            ['Province_name' => 'kunduz'],
            ['Province_name' => 'Nimroz'],
        )->create();
        Category::factory()->count(10)->sequence(
            ['category_name' => fake()->name()],
            ['category_name' => 'Handicrafts'],
            ['category_name' => 'Medical Supplies'],
            ['category_name' => 'Home Decor'],
            ['category_name' => 'Minerals'],
            ['category_name' => 'Textiles'],
            ['category_name' => 'Electronics'],
            ['category_name' => 'Furniture'],
            ['category_name' => 'Perishable Goods'],
            ['category_name' => 'Consumer Goods'],
        )->create();
        $this->call(SiteSeeder::class);
        $this->call(TransportCompanySeeder::class);
        $this->call(DriverSeeder::class);
        $this->call(VehicleSeeder::class);

        // Inside the run() method
        $adminRole = Role::updateOrCreate(
            ['name' => 'admin', 'guard_name' => 'web'],
            ['name' => 'admin', 'guard_name' => 'web']
        );
        $siteUserRole = Role::updateOrCreate(
            ['name' => 'Site_user', 'guard_name' => 'web'],
            ['name' => 'Site_user', 'guard_name' => 'web']
        );

        // Assign the role to the user
        $user = User::where('email', 'test@example.com')->first();
        if ($user) {
            $user->assignRole('admin');
        }

        $this->call(PermissionsTableSeeder::class);

        $this->call(ConsigneeCompanySeeder::class);
        $this->call(TransactionsSeeder::class);

    }
}
