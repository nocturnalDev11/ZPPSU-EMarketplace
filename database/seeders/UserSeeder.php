<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'first_name' => 'Lutreze',
            'last_name' => 'Jacinto',
            'role' => 'Student',
            'email' => 'jacintolutrezehue@gmail.com',
            'university_id' => 'CICS-12345678',
            'password' => Hash::make('securePassword123!'),
        ]);

        User::create([
            'first_name' => 'Jane',
            'last_name' => 'Smith',
            'role' => 'Staff',
            'email' => 'jane@example.com',
            'university_id' => '87654321',
            'password' => Hash::make('securePassword123!'),
        ]);

        User::create([
            'first_name' => 'John',
            'last_name' => 'Doe',
            'role' => 'Faculty',
            'email' => 'jlutrezehue@gmail.com',
            'university_id' => 'VL-123456',
            'password' => Hash::make('securePassword123!'),
        ]);
    }
}
