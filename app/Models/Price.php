<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    use HasFactory;

    /**
     * Calculate the price based on weight, dimensions, and distance.
     *
     * @param  float  $weight
     * @return float
     */
    public static function calculatePrice($weight)
    {
        // For demo purpose I used only the parcel weight to calculate price
        // in real world, weight, dimensions, and distance can be used.
        $factor = 0;
        if ($weight > 500) {
            $factor = ($weight + 500) / 500;
            $weight %= 500;
        }

        // Find the appropriate price record based on weight and max_weight
        $cost = self::where('max_weight', '>=', $weight)
            ->where('max_distance', 1000)
            ->first()->value('rate');


        if ($factor > 0) {
            // additional charge for every extra 500gms
            $cost += $factor * self::where('max_weight', 501)->where('max_distance', 1000)->first()->value('rate');;
        }
        return $cost;
    }
}
