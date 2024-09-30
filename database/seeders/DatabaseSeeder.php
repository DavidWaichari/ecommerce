<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use Database\Seeders\PermissionsTableSeeder as SeedersPermissionsTableSeeder;
use Illuminate\Database\Seeder;
use PermissionsTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call(UsersTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(BrandsTableSeeder::class);
        $this->call(ProcessorTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(SeedersPermissionsTableSeeder::class);
        $this->call(RolesTableSeeder::class);

    }
}
