<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Subscriber;
use App\Models\Plan;
use App\Models\CustomerDetail;
use Carbon\Carbon;

class CheckoutController extends Controller
{
    public function show(Plan $plan)
    {
        return view('checkout', compact('plan'));
    }

    public function processPayment(Request $request, Plan $plan)
    {
        if ($request->payment_method == 'paypal') {
            return redirect()->route('paypal.createOrder', ['plan' => $plan->id]);
        } else {
            // Handle card payment
            $user = Auth::user();
            $subscription = Subscriber::create([
                'user_id' => $user->id,
                'plan_id' => $plan->id,
                'order_number' => 'ORD-' . strtoupper(uniqid()),
                'price' => $plan->price,
                'purchase_date' => Carbon::now(),
                'subscription_date' => Carbon::now(),
                'renewal_date' => Carbon::now()->addMonth(),
            ]);

            CustomerDetail::create([
                'user_id' => $user->id,
                'plan_id' => $plan->id,
                'order_number' => $subscription->order_number,
                'price' => $plan->price,
                'purchase_date' => $subscription->purchase_date,
                'subscription_date' => $subscription->subscription_date,
                'renewal_date' => $subscription->renewal_date,
                'user_name' => $user->name,
                'user_email' => $user->email,
            ]);

            return redirect()->route('dashboard')->with('success', 'Subscription successful!');
        }
    }
}
