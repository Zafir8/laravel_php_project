<?php

namespace App\Http\Controllers;

use App\Models\VehicleCategory;
use App\Http\Requests\StoreVehicleCategoryRequest;
use App\Http\Requests\UpdateVehicleCategoryRequest;

class VehicleCategoryController extends Controller
{
    public function index()
    {
        $vehicleCategories = VehicleCategory::paginate(10); // Adjust the number as needed
        return view('vehicle-categories.index', [
            'categories' => $vehicleCategories
        ]);
    }

    public function create()
    {
        return view('vehicle-categories.form', [
            'category' => new VehicleCategory()
        ]);
    }

    public function store(StoreVehicleCategoryRequest $request)
    {
        VehicleCategory::create($request->validated());

        return redirect()->route('vehicle-categories.index')->with('success', 'Vehicle category created successfully.');
    }

    public function show(VehicleCategory $vehicleCategory)
    {
        //
    }

    public function edit(VehicleCategory $vehicleCategory)
    {
        return view('vehicle-categories.form', [
            'category' => $vehicleCategory
        ]);
    }

    public function update(UpdateVehicleCategoryRequest $request, VehicleCategory $vehicleCategory)
    {
        $vehicleCategory->update($request->validated());

        return redirect()->route('vehicle-categories.index')->with('success', 'Vehicle category updated successfully.');
    }

    public function destroy(VehicleCategory $vehicleCategory)
    {
        $vehicleCategory->delete();

        return redirect()->route('vehicle-categories.index')->with('success', 'Vehicle category deleted successfully.');
    }
}
// Compare this snippet from project/app/Http/Controllers/BookingController.php:
