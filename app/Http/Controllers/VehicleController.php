<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use App\Http\Requests\StoreVehicleRequest;
use App\Http\Requests\UpdateVehicleRequest;
use App\Models\VehicleCategory;
use Illuminate\Http\Request;


class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vehicles = Vehicle::paginate(10); // Adjust the number as needed

        return view('vehicle.index', compact('vehicles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('vehicle.form', [
            'vehicle' => new Vehicle(),
            'vehicleCategories' => VehicleCategory::all()
        ]);


}


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Vehicle::create([
            'vehicle_category_id' => $request->get('vehicle_category_id'),
            'number' => $request->get('number'),
            'engine_number' => $request->get('engine_number'),
            'chassis_number' => $request->get('chassis_number'),
            'owner_name' => $request->get('owner_name'),
            'owner_nic' => $request->get('owner_nic'),
            'owner_license' => $request->get('owner_license'),
            'owner_address' => $request->get('owner_address'),
            'owner_mobile' => $request->get('owner_mobile'),
            'status' => $request->get('status', 0),
        ]);



        return redirect()->route('vehicles.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Vehicle $vehicle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vehicle $vehicle)
    {
        $vehicleCategories = VehicleCategory::all(); // Get all vehicle categories
        // Adjust the view path to 'vehicle.form' assuming form.blade.php is directly inside the 'vehicle' folder
        return view('vehicle.form', compact('vehicle', 'vehicleCategories'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVehicleRequest $request, Vehicle $vehicle)
    {
        $vehicle->update([
            'vehicle_category_id' => $request->get('vehicle_category_id'),
            'number' => $request->get('number'),
            'engine_number' => $request->get('engine_number'),
            'chassis_number' => $request->get('chassis_number'),
            'owner_name' => $request->get('owner_name'),
            'owner_nic' => $request->get('owner_nic'),
            'owner_license' => $request->get('owner_license'),
            'owner_address' => $request->get('owner_address'),
            'owner_mobile' => $request->get('owner_mobile'),
            'status' => $request->get('status', 0),
        ]);

        return redirect()->route('vehicles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vehicle $vehicle)
    {
        $vehicle->delete();

        return redirect()->route('vehicles.index');
    }
}
