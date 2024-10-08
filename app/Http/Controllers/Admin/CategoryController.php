<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch categories ordered by 'created_at' in descending order
        $categories = Category::orderBy('updated_at', 'desc')->get();
        return view('admin/categories/index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin/categories/create');
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

        if ($request->input('has_processor') == "on") {
            $request['has_processor'] = true;
        } else {
            $request['has_processor'] = false;
        }

        //append auth
        $request['added_by'] = auth()->id();
        $request['updated_by'] = auth()->id();

        $category = Category::create($request->all());

        // Handle featured image upload
        if ($request->hasFile('featured_image')) {
            $featuredImage = $request->file('featured_image');
            $featuredImageName = $this->generateImageName($category->name, $featuredImage->getClientOriginalExtension(), 'featured');
            $featuredImage->move(public_path('uploads/featured_images'), $featuredImageName);
            $category->featured_image = $featuredImageName;
        }

        // Handle multiple images upload
        if ($request->hasFile('images')) {
            $imageNames = [];
            foreach ($request->file('images') as $index => $image) {
                $imageName = $this->generateImageName($category->name, $image->getClientOriginalExtension(), 'image_' . ($index + 1));
                $image->move(public_path('uploads/images'), $imageName);
                $imageNames[] = $imageName;
            }
            $category->images = json_encode($imageNames);
        }

        return redirect()->route('admin.categories.index')->with('success', 'Category created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view('admin/categories/show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin/categories/edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        if ($request->input('has_processor') == "on") {
            $request['has_processor'] = true;
        } else {
            $request['has_processor'] = false;
        }

        $request['updated_by'] = auth()->id();

        // Delete old featured image if a new one is uploaded
        if ($request->hasFile('featured_image') && !empty($category->featured_image)) {
            $oldFeaturedImagePath = public_path('uploads/categories/featured_images/' . $category->featured_image);
            if (file_exists($oldFeaturedImagePath)) {
                unlink($oldFeaturedImagePath); // Delete the old featured image
            }
        }

        // Delete old images if new ones are uploaded
        if ($request->hasFile('images') && !empty($category->images)) {
            $oldImages = json_decode($category->images, true);
            foreach ($oldImages as $oldImage) {
                $oldImagePath = public_path('uploads/categories/images/' . $oldImage);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath); // Delete the old images
                }
            }
        }

        // Update the category
        $category->update($request->all());

        // Handle featured image upload
        if ($request->hasFile('featured_image')) {
            $featuredImage = $request->file('featured_image');
            $featuredImageName = $this->generateImageName($category->name, $featuredImage->getClientOriginalExtension(), 'featured');
            $featuredImage->move(public_path('uploads/categories/featured_images'), $featuredImageName);
            $category->featured_image = $featuredImageName;
        }

        // Handle multiple images upload
        if ($request->hasFile('images')) {
            $imageNames = [];
            foreach ($request->file('images') as $index => $image) {
                $imageName = $this->generateImageName($category->name, $image->getClientOriginalExtension(), 'image_' . ($index + 1));
                $image->move(public_path('uploads/categories/images'), $imageName);
                $imageNames[] = $imageName;
            }
            $category->images = json_encode($imageNames);
        }

        return redirect()->route('admin.categories.index')->with('success', 'Category updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        // Delete the featured image if it exists
        if (!empty($category->featured_image)) {
            $featuredImagePath = public_path('uploads/categories/featured_images/' . $category->featured_image);
            if (file_exists($featuredImagePath)) {
                unlink($featuredImagePath); // Delete the featured image
            }
        }

        // Delete multiple images if they exist
        if (!empty($category->images)) {
            $images = json_decode($category->images, true);
            foreach ($images as $image) {
                $imagePath = public_path('uploads/categories/images/' . $image);
                if (file_exists($imagePath)) {
                    unlink($imagePath); // Delete the image
                }
            }
        }

        // Delete the category record from the database
        $category->delete();

        // Redirect to the categories list with a success message
        return redirect()->route('admin.categories.index')->with('success', 'Category and its images deleted successfully.');
    }


    private function generateImageName(string $productName, string $extension, string $type)
    {
        return Str::slug($productName) . '_' . $type . '_' . time() . '.' . $extension;
    }
}
