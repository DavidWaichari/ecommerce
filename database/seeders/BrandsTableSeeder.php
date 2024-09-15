<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brands = ['Lenovo', 'HP', 'Dell', 'Canon', 'Epson','Apple' ];


        foreach ($brands as $brand) {
            $available = Brand::where('name', $brand)->first();
            if (!$available) {
                Brand::create([
                    'name'=>$brand,
                    'status'=>"Active",
                    "updated_by"=> 1,
                ]);
            }
        }
    }
}
