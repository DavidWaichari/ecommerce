<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::orderBy('created_at', 'DESC')->get();
        return view('admin/orders/index', compact('orders'));
    }

    public function details($id)
    {
        $order = Order::findOrFail($id);
        return view('admin/orders/show', compact('order'));
    }

    public function approve($id)
    {
        $order = Order::findOrFail($id);
        $order->status = 'Approved'; // Assuming you have a 'status' field
        $order->save();

        return redirect()->route('admin.orders.index')->with('success', 'Order approved successfully.');
    }

    public function reject($id)
    {
        $order = Order::findOrFail($id);
        $order->status = 'Rejected'; // Assuming you have a 'status' field
        $order->save();

        return redirect()->route('admin.orders.index')->with('error', 'Order rejected successfully.');
    }

    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        //return the items instock for the products

        foreach ($oder->items as $item) {
            $product = $item->product;
            $product->in_stock += $item->no_of_items;
            $product->save();
        }
        $order->delete();

        for

        return redirect()->route('admin.orders.index')->with('success', 'Order deleted successfully.');
    }
}
