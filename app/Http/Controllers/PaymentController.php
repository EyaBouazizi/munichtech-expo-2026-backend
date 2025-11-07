<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Checkout\Session;
use Illuminate\Http\JsonResponse;

class PaymentController extends Controller
{
    public function createSession(Request $request): JsonResponse
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));

        $data = $request->validate([
            'amount' => 'required|numeric',
            'currency' => 'required|string',
            'ticket_id' => 'required|integer',
        ]);
         $session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => $data['currency'],
                    'product_data' => [
                        'name' => "Ticket #{$data['ticket_id']}",
                    ],
                    'unit_amount' => $data['amount'] * 100,
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => env('APP_URL') . '/success?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => env('APP_URL') . '/cancel',
        ]);

        return response()->json(['id' => $session->id]);
    }
}
