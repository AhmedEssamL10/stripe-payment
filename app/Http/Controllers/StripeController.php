<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Stripe\Charge;
use Stripe\Stripe;
// use Stripe\Checkout\Session;

class StripeController extends Controller
{
    public function stripe()
    {
        return view('stripe');
    }
    public function stripePost(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));

        Charge::create([
            'amount' => 100 * 100,
            'currency' => "usd",
            'source' => $request->stripeToken,
            'description' => 'Test payment from Ahmed Essam'
        ]);
        // Session::flash('sussess');
        return back()->with('status', ' success');
    }
}
