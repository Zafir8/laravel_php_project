<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $vehicles = [
            [
                'vehicle_category_id' => 1,
                'number' => 'AB 1234 CD',
                'status' => 'active',
            ],
            [
                'vehicle_category_id' => 1,
                'number' => 'EF 5678 GH',
                'status' => 'active',
            ],
            [
                'vehicle_category_id' => 1,
                'number' => 'IJ 9101 KL',
                'status' => 'active',
            ],
            [
                'vehicle_category_id' => 1,
                'number' => 'MN 1121 OP',
                'status' => 'active',
            ],
            [
                'vehicle_category_id' => 1,
                'number' => 'QR 3141 ST',
                'status' => 'active',
            ],
            [
                'vehicle_category_id' => 1,
                'number' => 'UV 5161 WX',
                'status' => 'active',
            ],
            [
                'vehicle_category_id' => 1,
                'number' => 'YZ 7181 AB',
                'status' => 'active',
            ],
            [
                'vehicle_category_id' => 1,
                'number' => 'CD 9191 EF',
                'status' => 'active',
            ],
            [
                'vehicle_category_id' => 1,
                'number' => 'GH 2121 IJ',
                'status' => 'active',
            ],
            [
                'vehicle_category_id' => 1,
                'number' => 'KL 3131 MN',
                'status' => 'active',
            ],
        ];

        foreach ($vehicles as $vehicle) {
            \App\Models\Vehicle::create($vehicle);
        }
    }
}
