<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TrackingStatus extends Model
{
    use HasFactory;

    /**
     * Get the latest status only
     */
    public function scopeLatest($query)
    {
        return $query->orderBy('created_at')->first();
    }

    // Define the relationship with courier
    public function courier(): BelongsTo
    {
        return $this->belongsTo(
            Courier::class,
            'tracking_number',
            'tracking_number'
        );
    }
}
