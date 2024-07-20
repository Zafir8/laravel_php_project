<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\VehicleCategory;
use Illuminate\Http\Request;

class VehicleCategoryController extends Controller
{
    public function index()
    {
        $vehicleCategories = VehicleCategory::paginate(10);
        return response()->json($vehicleCategories);
    }
}
