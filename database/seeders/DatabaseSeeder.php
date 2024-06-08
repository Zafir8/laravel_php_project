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

        \App\Models\User::factory()->create([
            'name' => 'Driver 1',
            'email' => 'driver@shuttlego.com',
            'password' => bcrypt('driver'),
            'role' => 4 // Driver
        ]);

        // create parent and student
        \App\Models\User::factory()->create([
            'name' => 'Parent 1',
            'email' => 'test_parent@shuttlego.com',
            'password' => bcrypt('parent'),
            'role' => 2 // Parent
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Student 1',
            'email' => 'student@shuttego.com',
            'password' => bcrypt('student'),
            'role' => 3 // Student
        ]);

        $this->call([
            VehicleCategorySeeder::class,
            DriverProfileSeeder::class,
            ScheduleSeeder::class,
            BookingSeeder::class,
            VehicleSeeder::class,
            PlanSeeder::class,
        ]);
    }
}
