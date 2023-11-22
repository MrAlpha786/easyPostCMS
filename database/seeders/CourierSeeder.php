<?php

namespace Database\Seeders;

use App\Models\Courier;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create 10 fake couriers
        Courier::factory(10)->create();

        // For each courier update status random times.
        foreach (Courier::all() as $courier) {
            $maxNumber = rand(2, 8);

            for ($i = 2; $i < $maxNumber; $i++) {
                $courier->update(['status' => $i]);
            }
            if ($maxNumber == 8) {
                $courier->update(['status' => rand(8, 10)]);
            }
        }
    }
}
