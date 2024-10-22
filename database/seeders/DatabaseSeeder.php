<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call(UserSeeder::class);
        $this->call(AdminSeeder::class);

        /*
            run the following command to execute all seeders:
            php artisan db:seed

            Optionally, you can refresh your database and run
            the seeders in one go by running:

            php artisan migrate:refresh --seed
        */
    }
}
