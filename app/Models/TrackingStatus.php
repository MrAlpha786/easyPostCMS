<?php

namespace App\Models;

use App\Enums\CourierStatusType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TrackingStatus extends Model
{
    use HasFactory;

    protected $fillable = ['status',];

    // cast status value to enum
    protected $casts = [
        'status' => CourierStatusType::class,
    ];

    public function getStatusString()
    {
        return $this->status->toString();
    }

    // Define the relationship with courier
    public function courier(): BelongsTo
    {
        return $this->belongsTo(Courier::class);
    }
}
