<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe;
use App\Models\Cart;

class MoneyController extends Controller
{
    // Payment
    public function payment(Request $request) {
        $payment = $request->paymentMethod;
        
        if (session()->has('user_id')) {
            if ($payment == "CARD") {
                return redirect()->route('customers.cardpay');
            } 
            else {
                $message = "Please Select a Payment Method";
                return view('customers.checkout', ['message' => $message]);
            }
        }
        else {
            return redirect()->route('customers.cardpay');
        }
    }

    public function imdt(Request $request) {
        if (session()->has('user_id')) {
            Cart::where('user_id', $request->session()->get('user_id'))
                ->update(['status' => '1']);
            session()->put('cart_value', 0);
        }
        else {
            $cart = collect([]);
            session()->put('cart_value', $cart);
        }

        return view('customers.imdtprocess');
    }

    public function cardpay(Request $request) {
            $stripe = new \Stripe\StripeClient('sk_test_51Lc5rqSBfFmsnB5R86HLGJo9gdy5k3djav8dQ1upgfWtnLo1oZez48c23l07Ao0EUPqHv91wQhzz89324eTSAYbI00sOxfdjvl');
    
            $total = session()->get('cart_total');
            $intent = $stripe->paymentIntents->create(
                [
                    'amount' => $total * 100,
                    'currency' => 'inr',
                    'payment_method_types' => ['card'],
                ]
            );
    
            // echo '<pre>';
            // print_r($intent->client_secret);
            return view('customers.cardpay', ['client_secret' => $intent->client_secret, 'total' => $total]);
    }
}
