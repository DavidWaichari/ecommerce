<?php

namespace Database\Seeders;

use App\Models\Supplier;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SupplierTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $supplier = Supplier::where('name', 'Henia')->first();

        if (!$supplier) {
            Supplier::create([
                'name' => 'Henia',
                'phone_number' => '0708456 xxx',
                'updated_by' => 1,
            ]);
        }
    }
}
