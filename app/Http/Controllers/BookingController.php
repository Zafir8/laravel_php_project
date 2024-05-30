<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\VehicleCategory;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    /**
     * Show the booking form.
     */
    public function show()
    {
        $vehicleCategories = VehicleCategory::all();
        return view('book-a-ride', compact('vehicleCategories'));
    }

    /**
     * Handle the booking form submission.
     */
    public function bookRide(Request $request)
    {

        $request->validate([
            'location' => 'required|string',
            'vehicle_category_id' => 'required|integer|exists:vehicle_categories,id',
            'pickup_location' => 'required|string',
            'pickup_time' => 'required|date_format:Y-m-d\TH:i',
        ]);

        // get all the users with the role of driver
        $driver = User::where('role', 4)
            ->inRandomOrder()
            ->first();

        // check if a driver exists, if not throw an error
        if (!$driver) {
            return redirect()->route('dashboard')->with('error', 'No driver available at the moment. Please try again later.');
        }

        // get a vehicle
        $vehicle = Vehicle::where('vehicle_category_id', $request->vehicle_category_id)->first();

        Booking::create([
            'user_id' => Auth::id(),
            'driver_id' => $driver->id,
            'location' => $request->location,
            'vehicle_category_id' => $request->vehicle_category_id,
            'vehicle_id' => $vehicle->id,
            'pickup_location' => $request->pickup_location,
            'pickup_time' => $request->pickup_time,
            'amount' => 1000, // Assuming a fixed amount for demonstration
        ]);



        return redirect()->route('dashboard')->with('success', 'Ride booked successfully!');
    }

    /**
     * Calculate the price based on the vehicle category.
     */
    private function calculatePrice(VehicleCategory $vehicleCategory)
    {
        // Implement your pricing logic here. For now, let's assume a fixed price for each vehicle type.
        switch ($vehicleCategory->name) {
            case 'Bus':
                return 1000; // Example price for bus
            case 'Van':
                return 800; // Example price for van
            default:
                return 500; // Default price
        }
    }
}
