<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => "Action Camera",
                'description' => "High-definition action camera with waterproof capabilities.",
                'status' => 'Active',
                'is_featured' => false,
                'is_sold' => false,
                'featured_image' => 'action_camera.jpg',
                'images' => json_encode(['action_camera.jpg']),
                'category_id' => 9, // Cameras
                'selling_price' => 299.99,
                'discount_price' => 299.99, // Same as selling price
                'updated_by' => 1,
                'brand_id'=> 1
            ],
            [
                'name' => "Portable Speakers",
                'description' => "High-quality portable speakers with superior sound and Bluetooth connectivity.",
                'status' => 'Active',
                'is_featured' => false,
                'is_sold' => false,
                'featured_image' => 'portable_speakers.jpg',
                'images' => json_encode(['portable_speakers.jpg']),
                'category_id' => 2, // Audio & Home Theater
                'selling_price' => 149.99,
                'discount_price' => 149.99, // Same as selling price
                'updated_by' => 1,
                'brand_id'=> 1
            ],
            [
                'name' => "Gaming Controller",
                'description' => "High-quality gaming controller with ergonomic design and responsive buttons.",
                'status' => 'Active',
                'is_featured' => false,
                'is_sold' => false,
                'featured_image' => 'gaming_controller.jpg',
                'images' => json_encode(['gaming_controller.jpg']),
                'category_id' => 2, // Audio & Home Theater
                'selling_price' => 79.99,
                'discount_price' => 79.99, // Same as selling price
                'updated_by' => 1,
                'brand_id'=> 1
            ],
            [
                'name' => "Wireless Mouse",
                'description' => "High-quality wireless mouse with ergonomic design and responsive buttons.",
                'status' => 'Active',
                'is_featured' => false,
                'is_sold' => false,
                'featured_image' => 'wireless_mouse.jpg',
                'images' => json_encode(['wireless_mouse.jpg']),
                'category_id' => 1, // Computers & Accessories
                'selling_price' => 49.99,
                'discount_price' => 49.99, // Same as selling price
                'updated_by' => 1,
                'brand_id'=> 1
            ],
            [
                'name' => "Camera Lens",
                'description' => "High-quality camera lens with superior optics and compatibility with various camera models.",
                'status' => 'Active',
                'is_featured' => false,
                'is_sold' => false,
                'featured_image' => 'camera_lens.jpg',
                'images' => json_encode(['camera_lens.jpg']),
                'category_id' => 9, // Cameras
                'selling_price' => 499.99,
                'discount_price' => 499.99, // Same as selling price
                'updated_by' => 1,
                'brand_id'=> 1
            ],
            [
                'name' => "Airpods Pro",
                'description' => "High-quality wireless earbuds with active noise cancellation and superior sound quality.",
                'status' => 'Active',
                'is_featured' => false,
                'is_sold' => false,
                'featured_image' => 'airpods_pro.jpg',
                'images' => json_encode(['airpods_pro.jpg']),
                'category_id' => 2, // Audio & Home Theater
                'selling_price' => 249.99,
                'discount_price' => 249.99, // Same as selling price
                'updated_by' => 1,
                'brand_id'=> 1
            ],
            [
                'name' => "CCTV Camera",
                'description' => "High-resolution CCTV camera with night vision and remote monitoring capabilities.",
                'status' => 'Active',
                'is_featured' => false,
                'is_sold' => false,
                'featured_image' => 'cctv_camera.jpg',
                'images' => json_encode(['cctv_camera.jpg']),
                'category_id' => 9, // Cameras
                'selling_price' => 249.99,
                'discount_price' => 249.99, // Same as selling price
                'updated_by' => 1,
                'brand_id'=> 1
            ],
            [
                'name' => "Wireless Keyboard",
                'description' => "High-quality wireless keyboard with ergonomic design and responsive keys.",
                'status' => 'Active',
                'is_featured' => false,
                'is_sold' => false,
                'featured_image' => 'wireless_keyboard.jpg',
                'images' => json_encode(['wireless_keyboard.jpg']),
                'category_id' => 1, // Computers & Accessories
                'selling_price' => 89.99,
                'discount_price' => 89.99, // Same as selling price
                'updated_by' => 1,
                'brand_id'=> 1
            ],
            [
                'name' => "Smartphone",
                'description' => "High-quality smartphone with advanced features including a high-resolution display, powerful processor, and extensive storage options.",
                'status' => 'Active',
                'is_featured' => false,
                'is_sold' => false,
                'featured_image' => 'smartphone.png',
                'images' => json_encode(['smartphone.png']),
                'category_id' => 5, // Mobiles & Tablets
                'selling_price' => 89.99,
                'discount_price' => 75, //less than selling
                'updated_by' => 1,
                'brand_id'=> 1
            ],
            [
                'name' => "Smart TV",
                'description' => "High-quality smart TV with advanced features including a high-resolution display, smart connectivity, and a sleek design.",
                'status' => 'Active',
                'is_featured' => false,
                'is_sold' => false,
                'featured_image' => 'smart_tv.jpg',
                'images' => json_encode(['smart_tv.jpg']),
                'category_id' => 4, // TV & Accessories
                'selling_price' => 89.99,
                'discount_price' => 75.00, // Less than selling price
                'updated_by' => 1,
                'brand_id'=> 1
            ],
            [
                'name' => "Smart Watch",
                'description' => "High-performance smartwatch with advanced features including fitness tracking, notifications, and long battery life.",
                'status' => 'Active',
                'is_featured' => false,
                'is_sold' => false,
                'featured_image' => 'smart_watch.jpg',
                'images' => json_encode(['smart_watch.jpg']),
                'category_id' => 6, // Smart Watches
                'selling_price' => 299.99,
                'discount_price' => 249.99, // Discounted price
                'updated_by' => 1,
                'brand_id'=> 1
            ],
            [
                'name' => "Digital Camera",
                'description' => "High-resolution digital camera with advanced features including optical zoom, image stabilization, and 4K video recording.",
                'status' => 'Active',
                'is_featured' => true,
                'is_sold' => false,
                'featured_image' => 'digital_camera.jpg',
                'images' => json_encode(['digital_camera.jpg']),
                'category_id' => 9, // Cameras
                'selling_price' => 299.99,
                'discount_price' => 249.99, // Discounted price
                'updated_by' => 1,
                'brand_id'=> 1
            ],
            [
                'name' => "Wireless Headphones",
                'description' => "High-quality wireless headphones with noise-canceling features, long battery life, and superior sound quality.",
                'status' => 'Active',
                'is_featured' => true,
                'is_sold' => false,
                'featured_image' => 'wireless_headphones.jpg',
                'images' => json_encode(['wireless_headphones.jpg']),
                'category_id' => 8, // Audio & Headphones
                'selling_price' => 299.99,
                'discount_price' => 249.99, // Discounted price
                'updated_by' => 1,
                'brand_id'=> 1
            ],
            [
                'name' => "Bluetooth Speaker",
                'description' => "High-quality wireless headphones with noise-canceling features, long battery life, and superior sound quality.",
                'status' => 'Active',
                'is_featured' => false,
                'is_sold' => false,
                'featured_image' => 'wireless_headphones.jpg',
                'images' => json_encode(['wireless_headphones.jpg']),
                'category_id' => 8, // Audio & Headphones
                'selling_price' => 299.99,
                'discount_price' => 249.99, // Discounted price
                'updated_by' => 1,
                'brand_id'=> 1
            ]


        ];

        foreach ($products as $productData) {
            Product::create($productData);
        }
    }
}
