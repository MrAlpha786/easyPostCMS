<?php

use App\Enums\UserRoleType;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\CourierController;
use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;

// Routes for guests (unauthenticated users)
Route::middleware('guest')->group(function () {
    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);
});

// Routes for authenticated users
Route::middleware('auth')->prefix('admin')->group(function () {
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');

    Route::get('courier-list', [CourierController::class, 'index'])->name('courierList');

    Route::get('create-courier', [CourierController::class, 'create'])->name('createCourier');
    Route::post('create-courier', [CourierController::class, 'store']);

    Route::get('update-status/{courier}/edit', [CourierController::class, 'edit'])->name('updateStatus');
    Route::put('update-status/{courier}', [CourierController::class, 'update']);

    Route::delete('delete-courier/{courier}', [CourierController::class, 'destroy'])->name('deleteCourier');
});

// Routes accessible only by users with the 'admin' role
Route::middleware(['auth', 'role:' . UserRoleType::ADMIN->toString()])->prefix('admin')->group(function () {
    // Admin-specific routes
    Route::view('employee-list', 'admin.employeeList')->name('employeeList');
    Route::view('create-employee', 'admin.createEmployee')->name('createEmployee');
    Route::post('create-employee', [EmployeeController::class, 'store']);
});
