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
            // Dump the request data and stop further execution



        Vehicle::create($request->all());



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
        return view ('vehicle.edit',[
            'vehicle' => $vehicle,
            'vehicleCategories' => $vehicleCategories

        ]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vehicle $vehicle)
    {
        $vehicle->update($request->all());

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
