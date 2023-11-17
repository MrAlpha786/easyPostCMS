<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Employee::insert([
            'firstName' => 'admin',
            'lastName' => '',
            'email' => 'admin@admin.com',
            'password' => 'admin123',
            'role' => 1
        ]);
        Employee::factory(10)->create();
    }
}
