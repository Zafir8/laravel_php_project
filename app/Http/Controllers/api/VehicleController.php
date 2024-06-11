<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function index()
    {
        $vehicles = Vehicle::paginate(10); // Adjust the number as needed
        return response()->json($vehicles);
    }

    public function getVehiclesByCategory($categoryId)
    {
        $vehicles = Vehicle::where('vehicle_category_id', $categoryId)->get();

        if ($vehicles->isEmpty()) {
            return response()->json(['message' => 'No vehicles found for this category'], 404);
        }

        return response()->json($vehicles);
    }
}
