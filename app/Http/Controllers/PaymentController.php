<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Stripe\Charge;
use Stripe\Stripe;

class PaymentController extends Controller
{

    public function index(Request $request)
    {
        return view('payment.index');
    }

    public function pay(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));
        Charge::create([
            "amount" => 100,
            "currency" => "INR",
            "source" => $request->stripeToken,
            "description" => "This payment is testing purpose of laravel-hotel",
        ]);

        Session::flash('success', 'Payment Successfull!');

        return back();
    }
}
