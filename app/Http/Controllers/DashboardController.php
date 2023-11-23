<?php

namespace App\Http\Controllers;

use App\Enums\CourierStatusType;
use App\Enums\UserRoleType;
use App\Models\Courier;
use App\Models\Feedback;
use App\Models\TrackingStatus;
use App\Models\User;

// Control dashboard view.
class DashboardController extends Controller
{
    /**
     * Return statistics of all data.
     */
    public function stats()
    {
        $stats = array();
        // Below data is only meant for admin users.
        if (auth()->user()->role == UserRoleType::ADMIN) {
            $stats['Employees'] =  User::count();
            $stats['Feedbacks'] = Feedback::count();
        }

        $stats['Couriers'] = Courier::count();

        $Statuses = TrackingStatus::orderByDesc('id')->get(['courier_id', 'status'])->toArray();

        $countByStatusType = collect($Statuses)->unique('courier_id')->countBy('status');

        foreach (CourierStatusType::cases() as $status) {
            $stats[$status->toString()] = $countByStatusType[$status->value] ?? 0;
        }

        return view('admin.dashboard')->with('stats', $stats);
    }
}
