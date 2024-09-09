<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Processor;
use Illuminate\Http\Request;

class ProcessorControler extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch processors ordered by 'created_at' in descending order
        $processors = Processor::orderBy('updated_at', 'desc')->get();
        return view('admin/processors/index', compact('processors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin/processors/create');
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

        $processor = Processor::create($request->all());

        return redirect()->route('admin.processors.index')->with('success', 'processor created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(processor $processor)
    {
        return view('admin/processors/show', compact('processor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(processor $processor)
    {
        return view('admin/processors/edit', compact('processor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, processor $processor)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $request['updated_by'] = auth()->id();
        // Update the processor
        $processor->update($request->all());

        return redirect()->route('admin.processors.index')->with('success', 'processor updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(processor $processor)
    {

        $processor->delete();
        return redirect()->route('admin.processors.index')->with('success', 'processor deleted successfully.');
    }
}
