<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Plan;


class PlanSeeder extends Seeder {
    public function run(): void {
        Plan::create([
            'name' => 'Subscription Plan',
            'price' => 11000,
            'description' => '40 trips per month, Child app access, Parent app access, Official mobile app',
        ]);
    }
}
