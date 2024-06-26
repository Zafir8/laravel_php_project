<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Vehicle;

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
                'engine_number' => '123456',
                'chassis_number' => '123456',
                'owner_name' => 'John Doe',
                'owner_nic' => '123456789V',
                'owner_license' => '123456789V',
                'owner_address' => '123, Main Street, Colombo 01',
                'owner_mobile' => '0712345678',
            ],
            [
                'vehicle_category_id' => 1,
                'number' => 'EF 5678 GH',
                'status' => 'active',
                'engine_number' => '123457',
                'chassis_number' => '123457',
                'owner_name' => 'Jane Doe',
                'owner_nic' => '123456789V',
                'owner_license' => '123456789V',
                'owner_address' => '123, Main Street, Colombo 01',
                'owner_mobile' => '0712345678',
            ],
            [
                'vehicle_category_id' => 1,
                'number' => 'IJ 9101 KL',
                'status' => 'active',
                'engine_number' => '123458',
                'chassis_number' => '123458',
                'owner_name' => 'Jane Doe',
                'owner_nic' => '123456789V',
                'owner_license' => '123456789V',
                'owner_address' => '123, Main Street, Colombo 01',
                'owner_mobile' => '0712345678',
            ],
            // Van
            [
                'vehicle_category_id' => 2,
                'number' => 'MN 1122 OP',
                'status' => 'active',
                'engine_number' => '123459',
                'chassis_number' => '123459',
                'owner_name' => 'Jane Doe',
                'owner_nic' => '123456789V',
                'owner_license' => '123456789V',
                'owner_address' => '123, Main Street, Colombo 01',
                'owner_mobile' => '0712345678',
            ],
            // Bus
            [
                'vehicle_category_id' => 2,
                'number' => 'QR 1314 ST',
                'status' => 'active',
                'engine_number' => '123460',
                'chassis_number' => '123460',
                'owner_name' => 'Jane Doe',
                'owner_nic' => '123456789V',
                'owner_license' => '123456789V',
                'owner_address' => '123, Main Street, Colombo 01',
                'owner_mobile' => '0712345678',
            ],
        ];

        foreach ($vehicles as $vehicle) {
            Vehicle::create([
                'number' => $vehicle['number'],
                'status' => $vehicle['status'],
                'engine_number' => $vehicle['engine_number'],
                'chassis_number' => $vehicle['chassis_number'],
                'owner_name' => $vehicle['owner_name'],
                'owner_nic' => $vehicle['owner_nic'],
                'owner_license' => $vehicle['owner_license'],
                'owner_address' => $vehicle['owner_address'],
                'owner_mobile' => $vehicle['owner_mobile'],
                'vehicle_category_id' => $vehicle['vehicle_category_id'],
            ]);
        }
    }
}
