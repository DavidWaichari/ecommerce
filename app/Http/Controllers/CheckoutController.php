<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        $total = array_sum(array_map(function($item) {
            return $item['price'] * $item['quantity'];
        }, $cart));

        return view('checkout.index', compact('cart', 'total'));
    }

    public function process(Request $request)
    {
        // Implement your checkout logic here
        // This might include:
        // - Validating the order
        // - Processing payment
        // - Creating an order in your database
        // - Clearing the cart
        // - Redirecting to a thank you page

        // For now, let's just clear the cart and redirect
        session()->forget('cart');
        return redirect()->route('home')->with('success', 'Order placed successfully!');
    }
}
