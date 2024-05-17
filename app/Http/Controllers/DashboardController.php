<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Subscriber;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $subscriptions = Subscriber::where('user_id', $user->id)->with('plan')->get();
        return view('dashboard', compact('subscriptions'));
    }
}

