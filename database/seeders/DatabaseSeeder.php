<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\VehicleCategory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin'),
            'role' => 1
        ]);

        $this->call([
            VehicleCategorySeeder::class,
            DriverProfileSeeder::class,
            ScheduleSeeder::class,
            BookingSeeder::class,
            VehicleSeeder::class,
        ]);
    }
}
