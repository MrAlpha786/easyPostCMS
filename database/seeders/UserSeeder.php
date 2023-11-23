<?php

namespace Database\Seeders;

use App\Enums\UserRoleType;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create an admin.
        User::create([
            'firstName' => 'admin',
            'lastName' => '',
            'email' => 'admin@admin.com',
            'password' => 'admin123',
            'role' => UserRoleType::ADMIN,
        ]);
        // Create a clerk for demo.
        User::create([
            'firstName' => 'clerk1',
            'lastName' => '',
            'email' => 'clerk@email.com',
            'password' => 'clerk123',
            'role' => UserRoleType::CLERK,
        ]);
        User::factory(10)->create();
    }
}
