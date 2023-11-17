<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Courier;
use App\Models\Feedback;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            PriceSeeder::class, // seed the price first
            CourierSeeder::class,
            EmployeeSeeder::class,
            FeedbackSeeder::class,
        ]);
    }
}
