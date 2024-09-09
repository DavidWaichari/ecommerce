<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandControler extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch brands ordered by 'created_at' in descending order
        $brands = Brand::orderBy('updated_at', 'desc')->get();
        return view('admin/brands/index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin/brands/create');
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

        $brand = Brand::create($request->all());

        return redirect()->route('admin.brands.index')->with('success', 'brand created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        return view('admin/brands/show', compact('brand'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand)
    {
        return view('admin/brands/edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, brand $brand)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $request['updated_by'] = auth()->id();
        // Update the brand
        $brand->update($request->all());

        return redirect()->route('admin.brands.index')->with('success', 'brand updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {

        $brand->delete();
        return redirect()->route('admin.brands.index')->with('success', 'brand deleted successfully.');
    }
}
