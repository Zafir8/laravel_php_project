<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Vehicle;
use App\Models\Booking;
use App\Models\VehicleCategory;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function show()
    {
        $vehicleCategories = VehicleCategory::all();
        return view('book-a-ride', compact('vehicleCategories'));
    }

    public function bookRide(Request $request)
    {
        $request->validate([
            'location' => 'required|string',
            'vehicle_category_id' => 'required|integer|exists:vehicle_categories,id',
            'pickup_location' => 'required|string',
            'pickup_time' => 'required|date_format:Y-m-d\TH:i',
        ]);

        $driver = User::where('role', 4)->inRandomOrder()->first();

        if (!$driver) {
            return redirect()->route('dashboard')->with('error', 'No driver available at the moment. Please try again later.');
        }

        $vehicle = Vehicle::where('vehicle_category_id', $request->vehicle_category_id)->first();

        if (!$vehicle) {
            return redirect()->route('dashboard')->with('error', 'No vehicle available for the selected category. Please try again later.');
        }

        $vehicleCategory = $vehicle->category;

        if (!$vehicleCategory) {
            return redirect()->route('dashboard')->with('error', 'Vehicle category not found. Please try again later.');
        }

        $amount = $this->calculatePrice($vehicleCategory);

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

        $subscriber = Subscriber::where('user_id', Auth::id())->first();
        if ($subscriber) {
            $subscriber->deductPrice($amount);
        }

        return redirect()->route('dashboard')->with('success', 'Ride booked successfully!');
    }

    public function cancelRide($id)
    {
        $booking = Booking::find($id);

        if ($booking) {
            $booking->status = 'cancelled';
            $booking->save();

            return redirect()->back()->with('success', 'Ride cancelled successfully.');
        }

        return redirect()->back()->with('error', 'Ride not found.');
    }

    public function cancelRideByDriver($id)
    {
        $booking = Booking::find($id);

        if ($booking && $booking->driver_id == Auth::id()) {
            $booking->status = 'cancelled';
            $booking->save();

            return redirect()->back()->with('success', 'Ride cancelled successfully.');
        }

        return redirect()->back()->with('error', 'Ride not found or you are not authorized to cancel this ride.');
    }

    public function cancelRideByStudent($id)
    {
        $booking = Booking::find($id);

        if ($booking && $booking->user_id == Auth::id()) {
            $booking->status = 'cancelled';
            $booking->save();

            return redirect()->back()->with('success', 'Ride cancelled successfully.');
        }

        return redirect()->back()->with('error', 'Ride not found or you are not authorized to cancel this ride.');
    }

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
