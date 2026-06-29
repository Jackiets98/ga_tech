<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        $email = env('ADMIN_EMAIL', 'admin@lcaexpress.com');
        $password = env('ADMIN_PASSWORD', 'changeme123');

        User::updateOrCreate(
            ['email' => $email],
            [
                'name' => 'Site Admin',
                'password' => Hash::make($password),
            ]
        );
    }
}
