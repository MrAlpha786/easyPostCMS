<?php

namespace App\Observers;

use App\Models\Courier;

class CourierObserver
{
    /**
     * Handle the Courier "created" event.
     */
    public function created(Courier $courier): void
    {
        $courier->trackingStatuses()->create(['status' => $courier->status]);
    }

    /**
     * Handle the Courier "updated" event.
     */
    public function updated(Courier $courier): void
    {
        if ($courier->trackingStatuses()->orderBy('updated_at', 'desc')->first()->status != $courier->status)
            $courier->trackingStatuses()->create(['status' => $courier->status]);
    }

    /**
     * Handle the Courier "deleted" event.
     */
    public function deleted(Courier $courier): void
    {
        $courier->trackingStatuses()->truncate();
    }
}
