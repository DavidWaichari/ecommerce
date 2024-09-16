<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Check if the user already exists by email
        $user = User::where('email', 'dwaichari@gmail.com')->first();

        // If the user does not exist, create a new user
        if (!$user) {
            User::create([
                'first_name' => 'David',               // Add first name
                'last_name' => 'Waichari',              // Add last name
                'email' => 'dwaichari@gmail.com',       // Email
                'phone_number' => '0708473015',         // Add phone number
                'county' => 'Bungoma',                  // Add county
                'address' => '1145',                    // Add address
                'city' => 'Nakuru',                     // Add city
                'is_admin' => true,                     // Set is_admin to true
                'password' => bcrypt('1234'),           // Add password and hash it
            ]);
        }
    }
}
