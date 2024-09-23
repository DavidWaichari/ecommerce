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
                "name" => "Laptops",
                "description" => "Portable laptops designed for work and entertainment on the go.",
                "icon" => "laptop",  // Font Awesome icon for laptop
                "status" => "Active",
                "updated_by" => 1
            ],
            [
                "name" => "Desktops",
                "description" => "Powerful desktop computers and their accessories for all your computing needs.",
                "icon" => "desktop",  // Font Awesome icon for desktop
                "status" => "Active",
                "updated_by" => 1
            ],
            [
                "name" => "Printers",
                "description" => "High-quality printers for all your printing needs, including inkjet and laser options.",
                "icon" => "print",  // Font Awesome icon for print
                "status" => "Active",
                "updated_by" => 1
            ],
            [
                "name" => "Projectors & Monitors",
                "description" => "High-definition projectors and monitors for an immersive viewing experience.",
                "icon" => "video",  // Font Awesome icon for video
                "status" => "Active",
                "updated_by" => 1
            ],
            [
                "name" => "Accessories",
                "description" => "Essential accessories for your devices, including chargers, cases, and peripherals.",
                "icon" => "cogs",  // Font Awesome icon for cogs
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
