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
        // Fetch products ordered by 'created_at' in descending order
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
        return view('admin/products/create',compact('categories', 'sub_categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        //append auth
        $request['added_by'] = auth()->id();
        $request['updated_by'] = auth()->id();

        Product::create($request->all());
        // Redirect to the products list with a success message
        return redirect()->route('admin.products.index')->with('success', 'Category created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        $sub_categories = SubCategory::all();
        return view('admin/products/show', compact('product', 'categories','sub_categories'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        $sub_categories = SubCategory::all();
        return view('admin/products/edit', compact('product', 'product', 'categories','sub_categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Find the product by ID
        $product = Product::findOrFail($id);
        $request['updated_by'] = auth()->id();
        // Update the product
        $product->update($request->all());

        // Redirect to the products list with a success message
        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the product by ID
        $product = Product::findOrFail($id);

        // Delete the product
        $product->delete();

        // Redirect to the products list with a success message
        return redirect()->route('admin.products.index')->with('success', 'product deleted successfully.');
    }
}
