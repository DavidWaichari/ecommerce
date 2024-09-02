<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch categories ordered by 'created_at' in descending order
        $sub_categories = SubCategory::orderBy('updated_at', 'desc')->get();
        return view('admin/subcategories/index', compact('sub_categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin/subcategories/create',compact('categories'));
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

        SubCategory::create($request->all());
        // Redirect to the categories list with a success message
        return redirect()->route('admin.sub_categories.index')->with('success', 'Category created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = SubCategory::findOrFail($id);
        return view('admin/subcategories/show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $subCategory = SubCategory::findOrFail($id);
        $categories = Category::all();
        return view('admin/subcategories/edit', compact('subCategory', 'categories'));
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
        $category = SubCategory::findOrFail($id);
        $request['updated_by'] = auth()->id();
        // Update the category
        $category->update($request->all());

        // Redirect to the categories list with a success message
        return redirect()->route('admin.sub_categories.index')->with('success', 'Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the category by ID
        $category = SubCategory::findOrFail($id);

        // Delete the category
        $category->delete();

        // Redirect to the categories list with a success message
        return redirect()->route('admin.sub_categories.index')->with('success', 'Category deleted successfully.');
    }
}
