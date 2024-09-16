<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        $cart_items = collect($cart);
        $user = Auth::user();

        return view('client/checkout', compact('cart_items', 'user'));
    }

    public function process(Request $request)
    {
        //check if the user is authenticated
        $address = session()->get('address');
        $user = Auth::user();
        if (!$user) {
            User::create([

            ]);
        }
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
