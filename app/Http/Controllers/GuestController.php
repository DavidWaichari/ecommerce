<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function welcome()
    {
        $categories = Category::where('status', 'Active')->get();
        $featured_products = Product::where('is_featured', true)->get();
        //fetch products based on the number of orders count
        $best_sellers = Product::all();
        return view('client/welcome', compact('categories','featured_products','best_sellers'));
    }
    public function shop(Request $request)
    {
        $categories = Category::where('status', 'Active')->get();
        return view('client/shop-left-sidebar', compact('categories'));
    }
}
