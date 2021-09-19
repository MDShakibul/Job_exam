<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;

class CheckoutController extends Controller
{


    public function checkout()
    {
        // Enter Your Stripe Secret
        Stripe::setApiKey('sk_test_51JauHJBLF5GQ9vxakUzFNGZ4iRjC76hTH8yh6Q9Midfp4Y4oDhcTeT67wDy1WZmnXonDOV7vpzqzGoQy1ubIwJI600fWF3i7Bg');

        $amount = 100;
        $amount *= 100;
        $amount = (int) $amount;

        $payment_intent = \Stripe\PaymentIntent::create([
            'description' => 'Stripe Test Payment',
            'amount' => $amount,
            'currency' => 'BDT',
            'description' => 'Payment From MySite',
            'payment_method_types' => ['card'],
        ]);
        $intent = $payment_intent->client_secret;

        return view('checkout.credit-card', compact('intent'));
    }

    public function afterPayment()
    {
        echo 'Payment Has been Received Successfully';
    }
}
