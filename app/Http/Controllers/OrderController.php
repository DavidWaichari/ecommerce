<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::orderBy('created_at', 'DESC')->get();
       
        return view('admin/orders/index', compact('orders'));
    }

    public function create()
    {
        $customers = User::where('is_admin', false)->get();
        return view('admin/orders/create', compact('customers'));
    }

    public function details($id)
    {
        $order = Order::findOrFail($id);
        $products = Product::where('status', 'Active')->get();
        return view('admin/orders/show', compact('order', 'products'));
    }

    public function approve($id)
    {
        $order = Order::findOrFail($id);
        
        //check the number of items available for each product
        foreach ($order->items as $item) {
            if ($item->quantity > $item->product->in_stock) {
               return redirect()->back()->with('error', 'The order of '.$item->product->name.' exceeds the items in stock. the itemsin stock is '.$item->product->in_stock );;
            }
        }
        //reduce the number of items in the products
        foreach ($order->items as $item) {
            $product = $item->product;
            $product->in_stock -= $item->no_of_items;
            $product->save();
        }

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

        foreach ($order->items as $item) {
            $product = $item->product;
            $product->in_stock += $item->no_of_items;
            $product->save();
        }
        $order->delete();

        return redirect()->route('admin.orders.index')->with('success', 'Order deleted successfully.');
    }

    public function addItemForm($orderId)
    {
        $order = Order::find($orderId);
       
        $products = Product::where('status', 'Active')->get();

        return view('admin/orders/add_order_items', compact('order', 'products'));
    }

    public function addItem(Request $request)
    {

        $order = Order::find($request->order_id);
        $product = Product::find($request->product_id);
        //add item
        $item = OrderItem::create([
            'order_id' => $order->id,
            'product_id'=> $product->id,
            'quantity' => $request->quantity,
            'unit_price'=> $product->discount_price,
            'total_amount' => $request->quantity * $product->discount_price
        ]);
        // //update the order
        $order->total_amount += $item->total_amount;
        $order->save();
        
        return redirect(route('admin.orders.details', $order->id))->with('success', 'Order Item added successfully.');
    }

    public function removeItem($item_id)
    {
        $item = OrderItem::find($item_id);
        //update the order
        $order = $item->order;
        $order->total_amount -= $item->total_amount;
        $order->save();

        $item->delete();

        return redirect()->back()->with('success', 'Order Item deleted successfully.');
    }

    public function store(Request $request)
    {
        //if there is user
        $order = Order::create($request->all());
        return redirect(route('admin.orders.details', $order->id))->with('success', 'Order started...');
    }
}
