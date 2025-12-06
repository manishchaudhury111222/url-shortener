<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SuperAdminSeeder extends Seeder
{
    public function run(): void
    {
        // Create Super Admin
        User::create([
            'name' => 'Super Admin',
            'email' => 'super@example.com',
            'password' => Hash::make('password'),
            'role' => User::ROLE_SUPER_ADMIN,
            'company_id' => null,
        ]);
    }
}