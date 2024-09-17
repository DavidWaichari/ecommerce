<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $suppliers = Supplier::orderBy('updated_at', 'desc')->get();
        return view('admin/suppliers/index', compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('admin/suppliers/create' );
    }


    public function show(string $id)
    {
        $supplier = Supplier::findOrFail($id);
        return view('admin/suppliers/show',compact('supplier'));
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


        // Append auth information
        $request['updated_by'] = Auth::user()->id;

        // Create the supplier
        $supplier = Supplier::create($request->all());



        // Redirect to the suppliers list with a success message
        return redirect()->route('admin.suppliers.index')->with('success', 'supplier created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $supplier = Supplier::findOrFail($id);

        return view('admin/suppliers/edit', compact('supplier'));
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



        // Find the supplier by ID
        $supplier = Supplier::findOrFail($id);

        // Update the supplier data
        $request['updated_by'] = auth()->id();
        $supplier->update($request->all());



        // Redirect to the suppliers list with a success message
        return redirect()->route('admin.suppliers.index')->with('success', 'supplier updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $supplier = Supplier::findOrFail($id);

        $supplier->delete();

        // Redirect to the suppliers list with a success message
        return redirect()->route('admin.suppliers.index')->with('success', 'supplier deleted successfully.');
    }
}
