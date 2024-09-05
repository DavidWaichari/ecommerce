<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::orderBy('updated_at', 'desc')->get();
        return view('admin/products/index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $categories = Category::all();
        $sub_categories = SubCategory::all();
        return view('admin/products/create', compact('categories', 'sub_categories'));
    }


    public function show(string $id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        $sub_categories = SubCategory::all();
        return view('admin/products/show', compact('product', 'categories', 'sub_categories'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'featured_image' => 'nullable|image|max:1024', // Validate featured image
            'images.*' => 'nullable|image|max:1024', // Validate images
        ]);
        if ($request->input('is_featured') == "on" ) {
            Product::where('is_featured', true)->update(['is_featured' => false]);
            $request['is_featured'] = true;
        }else{
            $request['is_featured'] = false;
        }

        // Append auth information
        $request['updated_by'] = auth()->id();

        // Create the product
        $product = Product::create($request->all());

        // Handle featured image upload
        if ($request->hasFile('featured_image')) {
            $product->addMedia($request->file('featured_image'))->toMediaCollection('featured_images');
        }

        // Handle multiple images upload
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $product->addMedia($image)->toMediaCollection('images');
            }
        }

        // Redirect to the products list with a success message
        return redirect()->route('admin.products.index')->with('success', 'Product created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        $sub_categories = SubCategory::all();
        return view('admin/products/edit', compact('product', 'categories', 'sub_categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'featured_image' => 'nullable|image|max:1024', // Validate featured image
            'images.*' => 'nullable|image|max:1024', // Validate images
        ]);


        if ($request->input('is_featured') == "on" ) {
            Product::where('is_featured', true)->update(['is_featured' => false]);
            $request['is_featured'] = true;
        }else{
            $request['is_featured'] = false;
        }

        // Find the product by ID
        $product = Product::findOrFail($id);

        // Update the product data
        $request['updated_by'] = auth()->id();
        $product->update($request->all());

        // Handle featured image update
        if ($request->hasFile('featured_image')) {
            // Delete existing featured image from the collection
            $product->clearMediaCollection('featured_images');
            $product->addMedia($request->file('featured_image'))->toMediaCollection('featured_images');
        }

        // Handle multiple images update
        if ($request->hasFile('images')) {
            // Delete existing images from the collection
            $product->clearMediaCollection('images');
            foreach ($request->file('images') as $image) {
                $product->addMedia($image)->toMediaCollection('images');
            }
        }

        // Redirect to the products list with a success message
        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);

        // Delete the product along with its media
        $product->clearMediaCollection('featured_images');
        $product->clearMediaCollection('images');
        $product->delete();

        // Redirect to the products list with a success message
        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully.');
    }
}
