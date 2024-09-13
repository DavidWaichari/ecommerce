<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function welcome()
    {
        $categories = Category::where('status', 'Active')->with('products')->get();
        $featured_products = Product::where('is_featured', true)->get();
        //fetch products based on the number of orders count
        $best_sellers = Product::all();
        $popular_products = Product::all();
        $brands = Brand::all();
        return view('client/welcome', compact('categories','featured_products','best_sellers', 'brands','popular_products'));
    }
    public function shop(Request $request)
    {
        $categories = Category::where('status', 'Active')->get();
        return view('client/shop-left-sidebar', compact('categories'));
    }

    public function productDetails($slug)
    {
        $product = Product::where('slug', $slug)->first();
        $related_products = $product->category->products;
        return view('client/product_details', compact('product', 'related_products'));
    }
}
