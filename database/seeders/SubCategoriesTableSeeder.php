<?php

namespace Database\Seeders;

use App\Models\SubCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $category = SubCategory::where('name', 'Computers')->first();

        if (!$category) {
            SubCategory::create([
                "category_id" => "1",
                "name" => "Laptops",
                "description" => "Laptops",
                "status" => "Active",
                "updated_by" => 1
            ]);
        }
    }
}
