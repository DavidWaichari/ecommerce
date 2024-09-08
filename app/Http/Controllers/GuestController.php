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
        return view('client/welcome', compact('categories','featured_products'));
    }
    public function shop(Request $request)
    {
        $categories = Category::where('status', 'Active')->get();
        return view('client/shop-left-sidebar', compact('categories'));
    }
}
