<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Processor;
use App\Models\Product;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function welcome()
    {
        // Fetch categories with the count of products and sort by the count
        $categories = Category::where('status', 'Active')
        ->withCount('products') // Get the count of related products
        ->orderBy('products_count', 'desc') // Sort categories by product count in descending order
        ->get();

        $featured_products = Product::where('is_featured', true)->get();
        //fetch products based on the number of orders count
        $best_sellers = Product::all();
        $popular_products = Product::all();
        $brands = Brand::all();
        return view('client/welcome', compact('categories','featured_products','best_sellers', 'brands','popular_products'));
    }

    public function shop(Request $request)
    {
        // return $request->category;
        // Get all active categories
        $categories = Category::where('status', 'Active')->get();
        $brands = Brand::all();
        $processors = Processor::all();
        $selected_category = null;
        // Check if the 'category' query parameter is passed
        if ($request->category) {
            // Filter products by the selected category
            $selected_category = Category::where('slug', $request->category)->first();
            $products = Product::where('status', 'Active')
                                ->where('category_id', $selected_category->id)
                                ->paginate(12);
            // Update the title text to show the selected category
            $title_text = "Products in " . $selected_category->name;
        } else {
            // Show all products if no category is selected
            $products = Product::where('status', 'Active')->paginate(12);
            $title_text = "All products";
        }
        // return $category;
        // Return the view with the categories, products, and title text
        return view('client/shop-left-sidebar', compact('categories', 'products', 'title_text','selected_category','brands','processors'));
    }


    public function productDetails($slug)
    {
        $product = Product::where('slug', $slug)->first();
        $related_products = $product->category->products;
        return view('client/product_details', compact('product', 'related_products'));
    }
}
