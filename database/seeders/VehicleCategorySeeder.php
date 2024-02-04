<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VehicleCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Bus' => 'This is a bus',
            'Van' => 'This is a van',
        ];

        foreach ($categories as $name => $description) {
            \App\Models\VehicleCategory::create([
                'name' => $name,
                'description' => $description,
            ]);
        }
    }
}
