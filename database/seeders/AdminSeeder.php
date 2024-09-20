<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        $adminEmail = env('ADMIN_EMAIL') || 'ackeewalk@gmail.com';
        $adminPassword = env('ADMIN_PASSWORD') || 'root';

        if (!$adminEmail || !$adminPassword) {
            $this->command->error('Admin email or password not set in .env file');
            return;
        }

        User::create([
            'name' => 'Admin',
            'email' => $adminEmail,
            'password' => Hash::make($adminPassword),
        ]);

        $this->command->info('Admin user created successfully');
    }
}