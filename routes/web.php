<?php

use App\Http\Controllers\CourierController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Models\Courier;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Register web routes for the application. These routes are loaded by the
| RouteServiceProvider and assigned to the "web" middleware group.
|
*/

// Home page route
Route::view('/', 'pages.home')->name('home');

// About page route
Route::view('/about', 'pages.about')->name('about');

// Contact Us page route
Route::view('/contact-us', 'pages.contact')->name('contact');

// Feedback page route
Route::view('/feedback', 'pages.feedback')->name('feedback');

// Track Status page route
Route::view('track-status', 'pages.trackStatus')->name('trackStatus');

// Track Status form submission route
Route::post('track-status', [CourierController::class, 'showStatus']);

// Price List page route
Route::view('pricelist', 'pages.pricelist')->name('pricelist');

// Payment processing route
Route::get('process-payment', [PaymentController::class, 'create']);

// Courier registration page route
Route::get('create-courier', [CourierController::class, 'create'])->name('registerCourier');

// Courier registration form submission route
Route::post('create-courier', [CourierController::class, 'store']);

// Admin dashboard route
Route::get('/admin', function () {
    return view('admin.dashboard');
})->middleware(['auth'])->name('dashboard');

// Authentication routes (login, logout, registration, etc.)
require __DIR__ . '/auth.php';
