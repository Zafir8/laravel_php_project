<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use App\Models\Plan;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Subscriber;
use App\Models\CustomerDetail;

class PayPalController extends Controller
{
    public function createOrder(Request $request, Plan $plan)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $token = $provider->getAccessToken();


        $provider->setAccessToken($token);

        $order = $provider->createOrder([
            "intent" => "CAPTURE",
            "purchase_units" => [
                [
                    "reference_id" => $plan->id,
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => $plan->price
                    ]
                ]
            ],
            "application_context" => [
                "cancel_url" => route('paypal.cancel'),
                "return_url" => route('paypal.success')
            ]
        ]);


        foreach ($order['links'] as $link) {
            if ($link['rel'] === 'approve') {
                return redirect()->away($link['href']);
            }
        }

        return redirect()->route('checkout.show', ['plan' => $plan->id])->with('error', 'Something went wrong.');
    }

    public function success(Request $request)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $token = $provider->getAccessToken();
        $provider->setAccessToken($token);

        $response = $provider->capturePaymentOrder($request->token);


        if ($response['status'] === 'COMPLETED') {
            $plan = Plan::find($response['purchase_units'][0]['reference_id']);
            $user = Auth::user();

            // Assuming the payment is successful, store the subscription
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

        return redirect()->route('checkout.show', ['plan' => $request->plan_id])->with('error', 'Payment failed.');
    }

    public function cancel()
    {
        return redirect()->route('dashboard')->with('error', 'You have canceled the payment.');
    }
}

