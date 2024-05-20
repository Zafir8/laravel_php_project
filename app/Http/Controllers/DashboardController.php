<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Subscriber;
use App\Models\CustomerDetail;
use App\Models\User;
use App\Enums\Role;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->role === Role::Admin) {
            $subscriptions = CustomerDetail::with('user', 'plan')->get();
            $totalUsers = User::count();
            $subscribedUsers = Subscriber::distinct('user_id')->count('user_id');

            return view('admin.dashboard', compact('subscriptions', 'totalUsers', 'subscribedUsers'));
        } else {
            $subscriptions = Subscriber::where('user_id', $user->id)->with('plan')->get();
            return view('dashboard', compact('subscriptions'));
        }
    }
}
