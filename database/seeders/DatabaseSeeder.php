<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Production-safe seeders only — no Faker/factories required.
     */
    public function run(): void
    {
        $this->call([
            AdminUserSeeder::class,
            BlogSeeder::class,
        ]);
    }
}
