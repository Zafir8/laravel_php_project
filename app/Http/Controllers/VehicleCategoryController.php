<?php

namespace App\Http\Controllers;

use App\Models\VehicleCategory;
use App\Http\Requests\StoreVehicleCategoryRequest;
use App\Http\Requests\UpdateVehicleCategoryRequest;

class VehicleCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vehicleCategories = VehicleCategory::paginate(10); // Adjust the number as needed

        return view('vehicle-categories.index', [
            'categories' => $vehicleCategories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('vehicle-categories.form', [
            'category' => new VehicleCategory()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreVehicleCategoryRequest $request)
    {
        VehicleCategory::create([
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'status' => $request->get('status', 0),
        ]);

        return redirect()->route('vehicle-categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(VehicleCategory $vehicleCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(VehicleCategory $vehicleCategory)
    {
        return view('vehicle-categories.form', [
            'category' => $vehicleCategory
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVehicleCategoryRequest $request, VehicleCategory $vehicleCategory)
    {

        $vehicleCategory->update([
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'status' => $request->get('status', 0),
        ]);

        return redirect()->route('vehicle-categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VehicleCategory $vehicleCategory)
    {
        //
    }
}
