<?php

namespace App\Http\Controllers;

use App\Enums\CourierStatusType;
use App\Enums\UserRoleType;
use App\Models\Courier;
use App\Models\TrackingStatus;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function stats()
    {
        $stats = array();
        if (auth()->user()->role == UserRoleType::ADMIN)
            $stats['Employees'] =  User::count();

        $stats['Couriers'] = Courier::count();

        $Statuses = TrackingStatus::orderByDesc('id')->get(['courier_id', 'status'])->toArray();

        $countByStatusType = collect($Statuses)->unique('courier_id')->countBy('status');

        foreach (CourierStatusType::cases() as $status) {
            $stats[$status->toString()] = $countByStatusType[$status->value] ?? 0;
        }

        return view('admin.dashboard')->with('stats', $stats);
    }
}
