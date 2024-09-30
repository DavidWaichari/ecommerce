<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $exists = Role::where('name', 'Developer')->first();
        if (!$exists) {
            //Developer
            $role = Role::create(['name' => 'Developer']);
            //attach all the permissions
            $permissions = Permission::all();
            $role->syncPermissions($permissions);
    
            //fetch the first User
            $user = User::where('is_admin', true)->first();
    
            //assign role
            $user->assignRole($role);
        }
    }
}
