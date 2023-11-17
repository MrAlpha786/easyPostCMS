<?php

namespace App\Models;

use Illuminate\Support\Str;
use App\Enums\CourierStatusType;
use Database\Factories\CourierFactory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courier extends Model
{
    use HasFactory;

    // cast status value to enum
    protected $casts = [
        'status' => CourierStatusType::class,
    ];

    /**
     * Create a new factory instance for the model.
     */
    protected static function newFactory(): Factory
    {
        return CourierFactory::new();
    }

    /**
     * Generate a random tracking number when courier is added.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->tracking_number = 'EZP'+Str::random($length = 13);
            $model->status = CourierStatusType::ITEM_ACCEPTED_BY_COURIER;
        });
    }
}
