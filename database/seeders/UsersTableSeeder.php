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
        $admin = User::where('email', 'admin@solocom.biz')->first();

        // If the user does not exist, create a new user
        if (!$admin) {
            User::create([
                'first_name' => 'System',               // Add first name
                'last_name' => 'Admin',              // Add last name
                'email' => 'admin@solocom.biz',       // Email
                'phone_number' => '0708473XXX',         // Add phone number
                'county' => 'Bungoma',                  // Add county
                'address' => '1145',                    // Add address
                'city' => 'Nakuru',                     // Add city
                'is_admin' => true,                     // Set is_admin to true
                'password' => bcrypt('1234'),           // Add password and hash it
            ]);
        }
        // Check if the user already exists by email
        $user = User::where('email', 'user@solocom.biz')->first();

        // If the user does not exist, create a new user
        if (!$user) {
            User::create([
                'first_name' => 'System',               // Add first name
                'last_name' => 'User',              // Add last name
                'email' => 'user@solocom.biz',       // Email
                'phone_number' => '0756473XXX',         // Add phone number
                'county' => 'Bungoma',                  // Add county
                'address' => '1145',                    // Add address
                'city' => 'NAIROBI',                     // Add city
                'is_admin' => false,                     // Set is_admin to true
                'password' => bcrypt('1234'),           // Add password and hash it
            ]);
        }
        // Check if the user already exists by email
        $solocom = User::where('email', 'suleiman@solocomglobal.com')->first();

        // If the user does not exist, create a new user
        if (!$solocom) {
            User::create([
                'first_name' => 'Suleiman',               // Add first name
                'last_name' => 'Abdullahi',              // Add last name
                'email' => 'suleiman@solocomglobal.com',       // Email
                'phone_number' => '0722533339',         // Add phone number
                'county' => 'Nairobi',                  // Add county
                'address' => 'Nairobi',                    // Add address
                'city' => 'NAIROBI',                     // Add city
                'is_admin' => true,                     // Set is_admin to true
                'password' => bcrypt('Duwahi@1604'),           // Add password and hash it
            ]);
        }
    }
}
