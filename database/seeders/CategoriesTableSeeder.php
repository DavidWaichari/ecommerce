<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $category = Category::where('name', 'Computers')->first();

        if (!$category) {
            Category::create([
                "name" => "Computers",
                "description" => "Computers",
                "status" => "Active",
                "updated_by" => 1
            ]);
        }
    }
}
