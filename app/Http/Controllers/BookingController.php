<?php

namespace App\Http\Controllers;

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
        ]);

        Booking::create([
            'user_id' => Auth::id(),
            'location' => $request->location,
            'vehicle_category_id' => $request->vehicle_category_id,
            'amount' => 1000,
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
