<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Create a test user with known credentials
        \App\Models\User::factory()->create([
            'username' => 'testuser',
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('password'), // password
            'is_active' => true,
            'last_login' => now(),
        ]);

        // Create an admin user with known credentials
        \App\Models\User::factory()->create([
            'username' => 'admin',
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => bcrypt('admin123'), // admin123
            'is_active' => true,
            'last_login' => now(),
        ]);

        // Create additional user with simple credentials
        \App\Models\User::factory()->create([
            'username' => 'johndoe',
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => bcrypt('john123'), // john123
            'is_active' => true,
            'last_login' => now(),
        ]);

        // Create 97 more users with random data (total 100)
        \App\Models\User::factory(97)->create();
    }
}
