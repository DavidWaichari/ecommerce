<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::where('email', 'dwaichari@gmail.com')->first();

        if (!$user) {
            User::create([
                "name" => "David Waichari",
                "email" => "dwaichari@gmail.com",
                "password"=>bcrypt("1234")
            ]);
        }
    }
}
