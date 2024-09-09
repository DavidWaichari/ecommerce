<?php

namespace Database\Seeders;

use App\Models\Processor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProcessorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $processors = ['i3', 'i5', 'i7', 'Celeron', 'AMD Ryzen' ];


        foreach ($processors as $processor) {
            $available = Processor::where('name', $processor)->first();
            if (!$available) {
                Processor::create([
                    'name'=>$processor,
                    'status'=>"Active",
                    "updated_by"=> 1,
                ]);
            }
        }
    }
}
