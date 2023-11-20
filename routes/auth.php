<?php

use App\Enums\UserRoleType;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\CourierController;
use App\Http\Controllers\UserController;
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

    Route::get('couriers/index', [CourierController::class, 'index'])->name('courierList');

    Route::get('couriers/create', [CourierController::class, 'create'])->name('createCourier');
    Route::post('couriers/store', [CourierController::class, 'store']);

    Route::get('couriers/{courier}/edit', [CourierController::class, 'edit'])->name('updateStatus');
    Route::put('couriers/{courier}/update', [CourierController::class, 'update']);

    Route::delete('couriers/{courier}/delete', [CourierController::class, 'destroy'])->name('deleteCourier');
});

// Routes accessible only by users with the 'admin' role
Route::middleware(['auth', 'role:' . UserRoleType::ADMIN->toString()])->prefix('admin')->group(function () {
    // Admin-specific routes
    Route::get('users/index', [UserController::class, 'index'])->name('userList');

    Route::get('users/create', [UserController::class, 'create'])->name('createUser');
    Route::post('users/store', [UserController::class, 'store']);

    Route::get('users/{courier}/edit', [UserController::class, 'edit'])->name('updateUser');
    Route::put('users/{courier}/update', [UserController::class, 'update']);

    Route::delete('users/{courier}/delete', [CourierController::class, 'destroy'])->name('deleteUser');
});
