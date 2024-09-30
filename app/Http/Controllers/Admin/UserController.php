<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role as ModelsRole;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::where('is_admin', true)->orderBy('updated_at', 'desc')->get();
        $user_type = "Admin";
        //check if we are fetching all the users
        if ($request->scope == 'all') {
            $users = User::orderBy('updated_at', 'desc')->get();
            $user_type = "All";
        }
        return view('admin.users.index', compact('users', 'user_type'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = ModelsRole::all();
        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $roles = collect();
        foreach ($request->roles as $role) {
            $roles->push(ModelsRole::find($role));
        }

        $user = User::create(['name' => $request->name]);
        $user->syncroles($roles);

        return redirect()->route('admin.users.index')->with('success', 'user created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $roles = ModelsRole::all();
        return view('admin.users.show', compact('user', 'roles'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $roles = ModelsRole::all();
        return view('admin.users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {

        
        $roles = collect();
        foreach ($request->roles as $role) {
            $roles->push(ModelsRole::find($role));
        }

        //check to see if the admin is checked
        if ($request->is_admin == 'on') {
           $user->is_admin = true;
        }else{
            if (Auth::user()->id != $user->id) {
                $user->is_admin = false;
            }
        }
        $user->save();

        $user->syncroles($roles);

        return redirect()->route('admin.users.index')->with('success', 'user updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        return 'Deleting of a user is not allowed Instead just revoke the role';
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'user deleted successfully.');
    }
}
