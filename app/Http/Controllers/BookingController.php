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

        // Get a driver
        $driver = User::where('role', 4)->inRandomOrder()->first();

        // Check if a driver exists, if not throw an error
        if (!$driver) {
            return redirect()->route('dashboard')->with('error', 'No driver available at the moment. Please try again later.');
        }

        // Get a vehicle
        $vehicle = Vehicle::where('vehicle_category_id', $request->vehicle_category_id)->first();

        // Check if a vehicle exists, if not throw an error
        if (!$vehicle) {
            return redirect()->route('dashboard')->with('error', 'No vehicle available for the selected category. Please try again later.');
        }

        // Get the vehicle category
        $vehicleCategory = $vehicle->category;

        // Check if the vehicle category is found, if not throw an error
        if (!$vehicleCategory) {
            return redirect()->route('dashboard')->with('error', 'Vehicle category not found. Please try again later.');
        }

        // Calculate the price based on the vehicle category
        $amount = $this->calculatePrice($vehicleCategory);

        // Create the booking
        Booking::create([
            'user_id' => Auth::id(),
            'driver_id' => $driver->id,
            'location' => $request->location,
            'vehicle_category_id' => $request->vehicle_category_id,
            'vehicle_id' => $vehicle->id,
            'pickup_location' => $request->pickup_location,
            'pickup_time' => $request->pickup_time,
            'amount' => $amount,
        ]);

        return redirect()->route('dashboard')->with('success', 'Ride booked successfully!');
    }

    /**
     * Calculate the price based on the vehicle category.
     */
    private function calculatePrice(VehicleCategory $vehicleCategory)
    {
        switch ($vehicleCategory->name) {
            case 'Bus':
                return 500;
            case 'Van':
                return 250;
            default:
                return 200;
        }
    }
}
