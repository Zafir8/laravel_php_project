<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use App\Models\Plan;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Subscriber;
use App\Models\CustomerDetail;
use App\Models\Payment;

class CheckoutController extends Controller
{
    public function show(Plan $plan)
    {
        return view('checkout', compact('plan'));
    }

    public function processPayment(Request $request, Plan $plan)
    {
        $request->validate([
            'payment_method' => 'required|string',
            'card_number' => 'required_if:payment_method,card|string',
            'expiration_date' => 'required_if:payment_method,card|string',
            'cvc' => 'required_if:payment_method,card|string',
        ]);

        if ($request->payment_method == 'paypal') {
            return redirect()->route('paypal.createOrder', ['plan' => $plan->id]);
        }

        // Handle card payment
        $user = Auth::user();

        // Store payment details
        $payment = Payment::create([
            'user_id' => $user->id,
            'plan_id' => $plan->id,
            'card_number' => $request->card_number,
            'expiration_date' => $request->expiration_date,
            'cvc' => $request->cvc,
            'amount' => $plan->price,
            'status' => 'completed',
            'payment_method' => 'card',
        ]);

        //  the payment is successful, store the subscription
        $subscription = Subscriber::create([
            'user_id' => $user->id,
            'plan_id' => $plan->id,
            'order_number' => 'ORD-' . strtoupper(uniqid()),
            'price' => $plan->price,
            'purchase_date' => Carbon::now(),
            'subscription_date' => Carbon::now(),
            'renewal_date' => Carbon::now()->addMonth(),
        ]);

        // Store customer details
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
