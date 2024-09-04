<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

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

        //append auth
        $request['added_by'] = auth()->id();
        $request['updated_by'] = auth()->id();

        $category = Category::create($request->all());
        // Handle featured image upload
        if ($request->hasFile('icon')) {
            $category->addMedia($request->file('icon'))->toMediaCollection('icons');
        }
        // Redirect to the categories list with a success message
        return redirect()->route('admin.categories.index')->with('success', 'Category created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = Category::findOrFail($id);
        return view('admin/categories/show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::findOrFail($id);
        return view('admin/categories/edit', compact('category'));
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

        // Find the category by ID
        $category = Category::findOrFail($id);
        $request['updated_by'] = auth()->id();
        // Update the category
        $category->update($request->all());

         // Handle featured image update
         if ($request->hasFile('icon')) {
            // Delete existing featured image from the collection
            $category->clearMediaCollection('icons');
            $category->addMedia($request->file('icon'))->toMediaCollection('icons');
        }
        // Redirect to the categories list with a success message
        return redirect()->route('admin.categories.index')->with('success', 'Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the category by ID
        $category = Category::findOrFail($id);

        // Delete the product along with its media
        $category->clearMediaCollection('featured_images');
        $category->clearMediaCollection('images');
        $category->delete();


        // Redirect to the categories list with a success message
        return redirect()->route('admin.categories.index')->with('success', 'Category deleted successfully.');
    }
}
