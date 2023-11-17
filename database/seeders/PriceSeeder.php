<?php

namespace Database\Seeders;

use App\Models\Price;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $prices = array(
            array('max_weight' => '50', 'max_distance' => '200', 'rate' => '35'),
            array('max_weight' => '50', 'max_distance' => '1000', 'rate' => '35'),
            array('max_weight' => '50', 'max_distance' => '2000', 'rate' => '35'),
            array('max_weight' => '50', 'max_distance' => '10000', 'rate' => '35'),
            array('max_weight' => '200', 'max_distance' => '200', 'rate' => '35'),
            array('max_weight' => '200', 'max_distance' => '1000', 'rate' => '40'),
            array('max_weight' => '200', 'max_distance' => '2000', 'rate' => '60'),
            array('max_weight' => '200', 'max_distance' => '10000', 'rate' => '70'),
            array('max_weight' => '500', 'max_distance' => '200', 'rate' => '50'),
            array('max_weight' => '500', 'max_distance' => '1000', 'rate' => '60'),
            array('max_weight' => '500', 'max_distance' => '2000', 'rate' => '80'),
            array('max_weight' => '500', 'max_distance' => '10000', 'rate' => '90'),

            array('max_weight' => '501', 'max_distance' => '200', 'rate' => '15'),
            array('max_weight' => '501', 'max_distance' => '1000', 'rate' => '30'),
            array('max_weight' => '501', 'max_distance' => '2000', 'rate' => '40'),
            array('max_weight' => '501', 'max_distance' => '10000', 'rate' => '50')
        );

        foreach ($prices as $priceDate) {
            Price::create($priceDate);
        }
    }
}
