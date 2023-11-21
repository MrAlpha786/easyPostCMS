<?php

namespace App\Models;

use Illuminate\Support\Str;
use App\Enums\CourierStatusType;
use Database\Factories\CourierFactory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Courier extends Model
{
    use HasFactory;

    protected $guarded = [
        'price',
    ];

    // cast status value to enum
    protected $casts = [
        'status' => CourierStatusType::class,
    ];

    /**
     * Generate unique tracking_number
     */
    private function generateTrackingNumber()
    {
        do {
            $value = Str::start(Str::random($length = 13), 'EZP');
        } while (static::where('tracking_number', $value)->exists());

        $this->tracking_number =  $value;
    }

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
            $model->generateTrackingNumber();
        });
    }

    /**
     * Accessor to calculate and retrieve the price attribute.
     *
     * @return float
     */
    public function getPriceAttribute()
    {
        // Calculate the price based on the required attributes
        return Price::calculatePrice($this->weight);
    }

    /**
     * Search for the query
     */
    public function scopeSearch($query, $q)
    {
        $columns = ['tracking_number', 'sender_name', 'recipient_name', 'sender_pincode', 'recipient_pincode'];

        foreach ($columns as $column) {
            $query->orWhere($column, 'LIKE', '%' . $q . '%');
        }

        return $query;
    }

    /**
     * Override the save method to ensure the price is recalculated before saving.
     *
     * @param array $options
     * @return bool
     */
    public function save(array $options = [])
    {
        // Recalculate the price before saving
        $this->attributes['price'] = $this->getPriceAttribute();

        return parent::save($options);
    }

    // Define the relationship with status
    public function trackingStatuses(): HasMany
    {
        return $this->hasMany(TrackingStatus::class);
    }
}
