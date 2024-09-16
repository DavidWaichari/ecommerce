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
        $address = session()->get('address');

        return view('client/checkout', compact('cart_items', 'address'));
    }

    public function process(Request $request)
    {
        //check if the user is authenticated
        return $address = session()->get('address');
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

    public function saveAddress(Request $request)
    {

        session()->forget('address');
        // Validate the incoming request
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'nullable|email',
            'phone_number' => 'nullable|string|max:15',
            'county' => 'required|string',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
        ]);

        // Save the address data to session
        session(['address' => $validated]);

        // Redirect back or to the next step
        return redirect()->back()->with('success', 'Address saved successfully!');
    }

}
