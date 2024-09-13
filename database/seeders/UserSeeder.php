<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'first_name' => 'Lutreze Hue',
            'last_name' => 'Jacinto',
            'role' => 'Student',
            'email' => 'test@example.com',
            'university_id' => 'CICS-12345678',
            'password' => Hash::make('password'),
        ]);
    }
}
