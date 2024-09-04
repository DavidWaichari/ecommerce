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
        $categories = [
            [
                "name" => "Desktops",
                "description" => "Computers",
                "icon" => "desktop",
                "status" => "Active",
                "updated_by" => 1
            ],
            [
                "name" => "Laptops",
                "description" => "Laptops",
                "icon" => "laptop",
                "status" => "Active",
                "updated_by" => 1
            ],
            [
                "name" => "Mobiles & Tablets",
                "description" => "Mobiles & Tablets",
                "icon" => "mobile",
                "status" => "Active",
                "updated_by" => 1
            ],
            [
                "name" => "Cameras",
                "description" => "Cameras",
                "icon" => "camera",
                "status" => "Active",
                "updated_by" => 1
            ],
            [
                "name" => "Accessories",
                "description" => "Accessories",
                "icon" => "headphones",
                "status" => "Active",
                "updated_by" => 1
            ],
        ];

        foreach ($categories as $category) {
            $available = Category::where('name', $category['name'])->first();
            if (!$available) {
                Category::create($category);
            }
        }
    }
}
