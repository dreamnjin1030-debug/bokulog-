<?php

namespace App\Http\Controllers;

use Stripe\stripe;
use Stripe\Checkout\Session;
use App\Models\Boxer;
use Illuminate\Http\Request;

class DonationController extends Controller
{
    public function create($boxer_id)
    {
        Stripe::setApikey(config('services.stripe.secret'));


        $session = Session::create([

            'payment_method_types' => ['card'],

            'line_items' => [[
                'price_data' => [
                    'currency' => 'jpy',

                    'product_data' => [
                        'name' => 'ボクサーへの投げ銭',
                    ],

                    'unit_amount' => 500,
                ],

                'quantity' => 1,
            ]],

            'mode' => 'payment',

            'success_url' => route('donation.success', $boxer_id),

            'cancel_url' => route('donation.cancel', $boxer_id),
        ]);

        return redirect($session->url);
    }

    public function success($boxer_id)
    {
        $boxer = Boxer::findOrFail($boxer_id);

        return view('donation.success', compact('boxer'));
    }

    public function cancel($boxer_id)
    {
        $boxer = Boxer::findOrFail($boxer_id);

        return view('donation.cancel', compact('boxer'));
    }
}
