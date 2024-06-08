<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Subscriber;
use App\Models\CustomerDetail;
use App\Models\User;
use App\Models\Booking;
use App\Enums\Role;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->role === Role::Admin) {
            $subscriptions = CustomerDetail::with('user', 'plan')->get();
            $totalUsers = User::count();
            $subscribedUsers = Subscriber::distinct('user_id')->count('user_id');
            $totalRides = Booking::where('status', '!=', 'cancelled')->count();
            $canceledRides = Booking::where('status', 'cancelled')->count();
            $rides = Booking::with('driver', 'vehicle', 'user')->get();

            // Prepare data for the chart using created_at timestamp
            $rideCounts = Booking::selectRaw('count(*) as count, strftime("%m", created_at) as month')
                ->where('status', '!=', 'cancelled')
                ->groupBy('month')
                ->pluck('count', 'month')
                ->toArray();

            // Get the labels for the months
            $rideMonths = array_keys($rideCounts);
            $rideMonths = array_map(function ($month) {
                return Carbon::create()->month($month)->format('F');
            }, $rideMonths);

            // Prepare revenue data
            $revenueData = CustomerDetail::selectRaw('SUM(price) as revenue, strftime("%m", purchase_date) as month')
                ->groupBy('month')
                ->pluck('revenue', 'month')
                ->toArray();

            $revenueMonths = array_keys($revenueData);
            $revenueMonths = array_map(function ($month) {
                return Carbon::create()->month($month)->format('F');
            }, $revenueMonths);

            return view('admin.dashboard', compact('subscriptions', 'totalUsers', 'subscribedUsers', 'totalRides', 'canceledRides', 'rides', 'rideCounts', 'rideMonths', 'revenueData', 'revenueMonths'));

        } else {
            $subscriptions = Subscriber::where('user_id', $user->id)->with('plan')->get();
            $upcomingRides = Booking::where('user_id', $user->id)
                ->where('date', '>=', now())
                ->where('status', '!=', 'cancelled')
                ->with('vehicle', 'driver', 'vehicleCategory')
                ->get();

            if ($user->role === Role::ParentRole) {
                return view('dashboards.parent', compact('subscriptions', 'upcomingRides'));
            } elseif ($user->role === Role::Student) {
                return view('dashboards.student', compact('subscriptions', 'upcomingRides'));
            } elseif ($user->role === Role::Driver) {
                $assignedRides = Booking::where('driver_id', $user->id)
                    ->where('date', '>=', now())
                    ->where('status', '!=', 'cancelled')
                    ->with('vehicle', 'passenger', 'vehicleCategory')
                    ->get();

                return view('dashboards.driver', compact('subscriptions', 'assignedRides'));
            } else {
                return view('dashboard', compact('subscriptions', 'upcomingRides'));
            }
        }
    }
}
