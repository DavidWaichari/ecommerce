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
        $shipping_cost = 0;
        $user = Auth::user();

        return view('client/checkout', compact('cart_items', 'user', 'shipping_cost'));
    }

    public function process(Request $request)
    {
        // Get authenticated user
        $user = Auth::user();

        // Retrieve cart from session
        $cart = session()->get('cart', []);

        // Check if cart is empty
        if (empty($cart)) {
            return redirect()->back()->with('error', 'Your cart is empty.');
        }

        // Process the cart items and create an order
        $order = new Order();
        $order->user_id = $user->id;
        $order->payment_method = $request->payment_method;
        $order->delivery_instructions = $request->delivery_instructions;
        $order->sub_total = collect($cart)->sum('discount_price');
        $order->tax_amount = collect($cart)->sum('discount_price') * 0.16;
        $order->contact_number = $request->contact_number;
        $order->total_amount = $order->sub_total + $order->tax_amount;
        $order->shipping_cost = 0;
        $order->status = 'Pending'; // Set initial order status
        $order->save();

        // Save each cart item as an order item
        foreach ($cart as $item) {
            $orderItem = new OrderItem();
            $orderItem->order_id = $order->id;
            $orderItem->product_id = $item['id'];
            $orderItem->quantity = $item['quantity'];
            $orderItem->unit_price = $item['discount_price'];
            $orderItem->total_amount = $orderItem->unit_price * $orderItem->quantity;
            $orderItem->save();
        }

        // Clear the cart after processing
        session()->forget('cart');

        // Redirect to the homepage or orders page with a success message
        return redirect()->route('account.orders')->with('success', 'Order placed successfully!');
    }
}
