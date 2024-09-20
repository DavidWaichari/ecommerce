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
        // Fetch only categories that have at least one product
        $categories = Category::where('status', 'Active')
            ->has('products') // Only include categories that have related products
            ->withCount('products') // Get the count of related products
            ->orderBy('products_count', 'desc') // Sort categories by product count in descending order
            ->get();

        // Fetch only brands that have at least one product
        $brands = Brand::where('status', 'Active')
            ->has('products') // Only include brands that have related products
            ->withCount('products') // Get the count of related products for sorting
            ->orderBy('products_count', 'desc') // Sort brands by product count in descending order
            ->get();

        $featured_products = Product::where('is_featured', true)->get();

        // Placeholder logic for best sellers and popular products
        $best_sellers = Product::all();
        $popular_products = Product::all();

        return view('client/welcome', compact('categories', 'featured_products', 'best_sellers', 'brands', 'popular_products'));
    }


    public function shop(Request $request)
    {
        // Get all active categories and brands
        $categories = Category::where('status', 'Active')->get();
        $brands = collect();
        $processors = Processor::all();
        $selected_category = null;
        $selected_processors = collect();
        $selected_brands = collect();

        // Check if the 'category' query parameter is passed
        if ($request->category) {
            // Filter products by the selected category
            $selected_category = Category::where('slug', $request->category)->first();
            if ($selected_category) {
                $productsQuery = Product::where('status', 'Active')
                    ->where('category_id', $selected_category->id);
                $title_text = "Products in " . $selected_category->name;
            } else {
                $productsQuery = Product::where('status', 'Active');
                $title_text = "All products";
            }
        } else {
            // Show all products if no category is selected
            $productsQuery = Product::where('status', 'Active');
            $title_text = "All products";
        }

        // Filter by product name if 'product_name' query parameter is present
        if ($request->has('product_name') && !empty($request->product_name)) {
            $productsQuery->where('name', 'like', '%' . $request->product_name . '%');
        }

        // Get brands associated with the products in the query
        foreach ($productsQuery->get()->pluck('brand_id')->unique() as $id) {
            $brand = Brand::find($id);
            if ($brand) {
                $brands->push($brand);
            }
        }

        // Check if the 'processors' query parameter is passed
        if ($request->has('processors')) {
            $processorsInput = $request->processors;

            if (is_string($processorsInput)) {
                $processorsInput = explode(',', $processorsInput);
            }

            foreach ((array)$processorsInput as $processor_name) {
                $processor = Processor::where('slug', $processor_name)->first();
                if ($processor) {
                    $selected_processors->push($processor);
                }
            }

            if ($selected_processors->isNotEmpty()) {
                $productsQuery->whereIn('processor_id', $selected_processors->pluck('id'));
            }
        }

        // Check if the 'brands' query parameter is passed
        if ($request->has('brands')) {
            $brandsInput = $request->brands;

            if (is_string($brandsInput)) {
                $brandsInput = explode(',', $brandsInput);
            }

            foreach ((array)$brandsInput as $brand_name) {
                $brand = Brand::where('slug', $brand_name)->first();
                if ($brand) {
                    $selected_brands->push($brand);
                }
            }

            if ($selected_brands->isNotEmpty()) {
                $productsQuery->whereIn('brand_id', $selected_brands->pluck('id'));
            }
        }

        // Check for the 'sort' parameter to sort products by price
        if ($request->has('sort')) {
            if ($request->sort == 'asc') {
                $productsQuery->orderBy('discount_price', 'asc');
            } elseif ($request->sort == 'desc') {
                $productsQuery->orderBy('discount_price', 'desc');
            }
        }

        // Get the paginated products
        $products = $productsQuery->paginate(12);

        // Return the view with the categories, products, title text, and other variables
        return view('client/shop-left-sidebar', compact(
            'categories',
            'products',
            'title_text',
            'selected_category',
            'brands',
            'selected_brands',
            'processors',
            'selected_processors'
        ));
    }


    public function productDetails($slug)
    {
        $product = Product::where('slug', $slug)->first();
        $related_products = $product->category->products;
        return view('client/product_details', compact('product', 'related_products'));
    }
}
