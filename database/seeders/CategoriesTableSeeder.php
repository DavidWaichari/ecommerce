<?php

namespace Database\Seeders;

use App\Models\Category;
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
                "name" => "Computers & Accessories",
                "description" => "Computers and their accessories",
                "icon" => "desktop",  // Font Awesome icon for desktop
                "status" => "Active",
                "updated_by" => 1
            ],
            [
                "name" => "Audio & Home Theater",
                "description" => "Audio systems and home theaters",
                "icon" => "headphones-alt",  // Font Awesome icon for headphones
                "status" => "Active",
                "updated_by" => 1
            ],
            [
                "name" => "Laptop",
                "description" => "Laptops",
                "icon" => "laptop",  // Font Awesome icon for laptop
                "status" => "Active",
                "updated_by" => 1
            ],
            [
                "name" => "TV & Accessories",
                "description" => "Televisions and related accessories",
                "icon" => "tv",  // Font Awesome icon for TV
                "status" => "Active",
                "updated_by" => 1
            ],
            [
                "name" => "Mobiles & Tablets",
                "description" => "Mobile phones and tablets",
                "icon" => "mobile-alt",  // Font Awesome icon for mobile
                "status" => "Active",
                "updated_by" => 1
            ],
            [
                "name" => "Headphone & Earphone",
                "description" => "Headphones and earphones",
                "icon" => "headphones",  // Font Awesome icon for headphones
                "status" => "Active",
                "updated_by" => 1
            ],
            [
                "name" => "Battery & Accessories",
                "description" => "Batteries and related accessories",
                "icon" => "battery-full",  // Font Awesome icon for battery
                "status" => "Active",
                "updated_by" => 1
            ],
            [
                "name" => "Watches",
                "description" => "Watches",
                "icon" => "clock",  // Font Awesome icon for clock/watch
                "status" => "Active",
                "updated_by" => 1
            ],
            [
                "name" => "Cameras",
                "description" => "Cameras",
                "icon" => "camera",  // Font Awesome icon for camera
                "status" => "Active",
                "updated_by" => 1
            ],
            [
                "name" => "Accessories",
                "description" => "Accessories for various products",
                "icon" => "cogs",  // Font Awesome icon for cogs (general accessories)
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
