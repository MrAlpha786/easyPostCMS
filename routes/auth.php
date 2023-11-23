<?php

use App\Enums\UserRoleType;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\CourierController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\PriceController;
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

    Route::controller(CourierController::class)->prefix('courier')->group(function () {
        Route::get('/create', 'create')->name('createCourier');
        Route::post('/store', 'store')->name('storeCourier');
        Route::get('/index', 'index')->name('indexCourier');
        Route::get('/{id}/show', 'show')->name('showCourier');
        Route::get('/{id}/edit', 'edit')->name('editCourier');
        Route::patch('/{id}/update', 'update')->name('updateCourier');
        Route::delete('/{id}/delete', 'destroy')->name('deleteCourier');
    });

    Route::controller(FeedbackController::class)->prefix('feedbacks')->group(function () {
        Route::get('/create', 'create')->name('createFeedback');
        Route::post('/store', 'store')->name('storeFeedback');
    });
});

// Routes accessible only by users with the 'admin' role
Route::middleware(['auth', 'role:' . UserRoleType::ADMIN->toString()])->prefix('admin')->group(function () {

    Route::controller(UserController::class)->prefix('user')->group(function () {
        Route::get('/index', 'index')->name('indexUser');
        Route::get('/create', 'create')->name('createUser');
        Route::post('/store', 'store')->name('storeUser');
        Route::get('/{id}/edit', 'edit')->name('editUser');
        Route::patch('/{id}/update', 'update')->name('updateUser');
        Route::delete('/{id}/delete', 'destroy')->name('deleteUser');
    });

    Route::controller(FeedbackController::class)->prefix('feedback')->group(function () {
        Route::get('/index', 'index')->name('indexFeedback');
        Route::delete('/{id}/delete', 'delete')->name('deleteFeedback');
    });

    Route::controller(PriceController::class)->prefix('prices')->group(function () {
        Route::get('/edit', 'edit')->name('editPrices');
        Route::put('/update', 'update')->name('updatePrices');
    });
});
