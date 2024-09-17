<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        return view('admin/orders/index', compact('orders'));
    }

    public function details($id)
    {
        $order = Order::findOrFail($id);

        return view('admin/orders/show', compact('order'));
    }
}
