<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            // Brand Permissions
            'create-brand',
            'read-brand',
            'update-brand',
            'delete-brand',

            // Category Permissions
            'create-category',
            'read-category',
            'update-category',
            'delete-category',

            // Order Permissions
            'create-order',
            'read-order',
            'update-order',
            'delete-order',
            'approve-order',
            'reject-order',

            // Processor Permissions
            'create-processor',
            'read-processor',
            'update-processor',
            'delete-processor',

            // Product Permissions
            'create-product',
            'read-product',
            'update-product',
            'delete-product',

            // Stock Permissions
            'create-stock',
            'read-stock',
            'update-stock',
            'delete-stock',

            // Supplier Permissions
            'create-supplier',
            'read-supplier',
            'update-supplier',
            'delete-supplier',

            // User Permissions
            'create-user',
            'read-user',
            'update-user',
            'delete-user',

            // Roles
            'create-role',
            'read-role',
            'update-role',
            'delete-role',
        ];

        foreach ($permissions as $permission) {
            $available = Permission::where('name', $permission)->first();
            if (!$available) {
                Permission::create(['name' => $permission]);
            }
        }
    }
}
