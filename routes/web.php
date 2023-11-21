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
Route::view('about', 'pages.about')->name('about');

// Contact Us page route
Route::view('contact', 'pages.contact')->name('contact');

// Feedback page route
Route::view('feedback', 'pages.feedback')->name('feedback');

// Track Status page route
Route::view('track', 'pages.trackStatus')->name('tracker');

// Track Status form submission route
Route::get('courier/track', [CourierController::class, 'trackCourier'])->name('trackCourier');


// Price List page route
Route::view('pricelist', 'pages.pricelist')->name('pricelist');


// Payment processing route
Route::get('process-payment', [PaymentController::class, 'create']);


Route::get('couriers/create', [CourierController::class, 'create'])->name('createCourier');
Route::post('couriers/store', [CourierController::class, 'store'])->name('storeCourier');


// Admin dashboard route
Route::get('/admin', function () {
    return view('admin.dashboard');
})->middleware(['auth'])->name('dashboard');

// Authentication routes (login, logout, registration, etc.)
require __DIR__ . '/auth.php';
