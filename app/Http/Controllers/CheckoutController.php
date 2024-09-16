<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
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
        // Get authenticated user
        $user = Auth::user();

        // Retrieve cart from session
        $cart = session()->get('cart', []);

        // Check if cart is empty
        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
        }

        // Process the cart items and create an order
        $order = new Order();
        $order->user_id = $user->id;
        $order->payment_method = $request->payment_method;
        $order->total = collect($cart)->sum('price'); // Adjust according to your cart structure
        $order->status = 'Pending'; // Set initial order status
        $order->save();

        // Save each cart item as an order item
        foreach ($cart as $item) {
            $orderItem = new OrderItem();
            $orderItem->order_id = $order->id;
            $orderItem->product_id = $item['product_id'];
            $orderItem->quantity = $item['quantity'];
            $orderItem->price = $item['price'];
            $orderItem->save();
        }

        // Clear the cart after processing
        session()->forget('cart');

        // Redirect to the homepage or orders page with a success message
        return redirect()->route('/')->with('success', 'Order placed successfully!');
    }
}
