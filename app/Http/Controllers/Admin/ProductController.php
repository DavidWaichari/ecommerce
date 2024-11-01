<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Processor;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str; // Import the Str class

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
        $brands = Brand::all();
        $processors  = Processor::all();
        return view('admin/products/create', compact('categories', 'brands','processors'));
    }

    /**
     * Show the specified resource.
     */
    public function show(Product $product)
    {
        $categories = Category::all();
        $brands = Brand::all();
        $processors = Processor::all();
        return view('admin/products/show', compact('product', 'categories', 'brands','processors'));
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
            'images.*' => 'nullable|image', // Validate images
        ]);

        if ($request->input('is_featured') == "on") {
            // Product::where('is_featured', true)->update(['is_featured' => false]);
            $request['is_featured'] = true;
        } else {
            $request['is_featured'] = false;
        }

        // Append auth information
        $request['updated_by'] = auth()->id();

        // Create the product
        $product = Product::create($request->except('featured_image', 'images'));

        // Handle featured image upload
        if ($request->hasFile('featured_image')) {
            $featuredImage = $request->file('featured_image');
            $featuredImageName = $this->generateImageName($product->name, $featuredImage->getClientOriginalExtension(), 'featured');
            $featuredImage->move(public_path('uploads/featured_images'), $featuredImageName);
            $product->featured_image = $featuredImageName;
        }

        // Handle multiple images upload
        if ($request->hasFile('images')) {
            $imageNames = [];
            foreach ($request->file('images') as $index => $image) {
                $imageName = $this->generateImageName($product->name, $image->getClientOriginalExtension(), 'image_' . ($index + 1));
                $image->move(public_path('uploads/images'), $imageName);
                $imageNames[] = $imageName;
            }
            $product->images = $imageNames;
        }

        // Save the product with the uploaded images
        $product->save();

        // Redirect to the products list with a success message
        return redirect()->route('admin.products.index')->with('success', 'Product created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        $brands = Brand::all();
        $processors = Processor::all();
        return view('admin/products/edit', compact('product', 'categories', 'brands','processors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'featured_image' => 'nullable|image|max:1024', // Validate featured image
            'images.*' => 'nullable|image|max:1024', // Validate images
        ]);

        if ($request->input('is_featured') == "on") {
            // Product::where('is_featured', true)->update(['is_featured' => false]);
            $request['is_featured'] = true;
        } else {
            $request['is_featured'] = false;
        }

        // Find the product by ID

        // Update the product data
        $request['updated_by'] = auth()->id();
        $product->update($request->except('featured_image', 'images'));

        // Handle featured image update
        if ($request->hasFile('featured_image')) {
            // Delete existing featured image
            if ($product->featured_image) {
                unlink(public_path('uploads/featured_images/' . $product->featured_image));
            }
            $featuredImage = $request->file('featured_image');
            $featuredImageName = $this->generateImageName($product->name, $featuredImage->getClientOriginalExtension(), 'featured');
            $featuredImage->move(public_path('uploads/featured_images'), $featuredImageName);
            $product->featured_image = $featuredImageName;
        }

        // Handle multiple images update
        if ($request->hasFile('images')) {
            // Delete existing images
            if ($product->images) {
                $existingImages = json_decode($product->images, true);
                foreach ($existingImages as $existingImage) {
                    unlink(public_path('uploads/images/' . $existingImage));
                }
            }
            $imageNames = [];
            foreach ($request->file('images') as $index => $image) {
                $imageName = $this->generateImageName($product->name, $image->getClientOriginalExtension(), 'image_' . ($index + 1));
                $image->move(public_path('uploads/images'), $imageName);
                $imageNames[] = $imageName;
            }
            $product->images = $imageNames;
        }

        // Save the product with the updated images
        $product->save();

        // Redirect to the products list with a success message
        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {

        // Delete the product's featured image from the server
        if ($product->featured_image) {
            $featuredImagePath = public_path('uploads/featured_images/' . $product->featured_image);
            if (file_exists($featuredImagePath)) {
                unlink($featuredImagePath);
            }
        }

        // Delete the product's additional images from the server
        if ($product->images) {
            $images = $product->images;
            foreach ($images as $image) {
                $imagePath = public_path('uploads/images/' . $image);
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }
        }


        // Delete the product record
        $product->delete();

        // Redirect to the products list with a success message
        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully.');
    }

    /**
     * Generate a unique image name based on the product name and image type.
     */
    private function generateImageName(string $productName, string $extension, string $type)
    {
        return Str::slug($productName) . '_' . $type . '_' . time() . '.' . $extension;
    }
}
