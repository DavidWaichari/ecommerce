<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role as ModelsRole;

class RoleControler extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch roles ordered by 'created_at' in descending order
        $roles = ModelsRole::orderBy('updated_at', 'desc')->get();
        return view('admin/roles/index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = Permission::all();
        return view('admin/roles/create', compact('permissions'));
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
        $permissions = collect();

        foreach ($request->permissions as $permission) {
           $permissions->push(Permission::find($permission));
        }

        //create the role
        $role = ModelsRole::create(['name' => $request->name]);
        $role->syncPermissions($permissions);
      
        return redirect()->route('admin.roles.index')->with('success', 'role created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(ModelsRole $role)
    {
        return view('admin/roles/show', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ModelsRole $role)
    {
        return view('admin/roles/edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ModelsRole $role)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $role->update($request->all());

        return redirect()->route('admin.roles.index')->with('success', 'role updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ModelsRole $role)
    {

        $role->delete();
        return redirect()->route('admin.roles.index')->with('success', 'role deleted successfully.');
    }
}
