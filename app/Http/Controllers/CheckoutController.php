<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CheckoutController extends Controller {
    public function show(Plan $plan) {
        return view('checkout', compact('plan'));
    }

    public function processPayment(Request $request, Plan $plan) {
        $request->validate([
            'card_number' => 'required',
            'expiration_date' => 'required',
            'cvc' => 'required',
        ]);

        // Simulate payment processing
        // Here you would integrate with a payment gateway API
        // For the sake of this example, we'll assume payment is always successful

        $user = Auth::user();

        $subscriber = Subscriber::create([
            'user_id' => $user->id,
            'plan_id' => $plan->id,
            'order_number' => Str::uuid(),
            'price' => $plan->price,
            'purchase_date' => now(),
            'subscription_date' => now(),
            'renewal_date' => now()->addMonth(),
        ]);

        // Flash success message to the session
        return redirect()->route('dashboard')->with('success', 'Subscribed successfully!');
    }
}
