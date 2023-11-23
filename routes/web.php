<?php

use App\Http\Controllers\CourierController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PriceController;
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

// Tracker page route
Route::view('tracker', 'pages.trackStatus')->name('tracker');

// Price List page route
Route::get('pricelist', [PriceController::class, 'showPricelist'])->name('pricelist');

// Customer feddback routes
Route::controller(FeedbackController::class)->prefix('feedback')->group(function () {
    // Feedback page route
    Route::get('/', 'createFeedback')->name('feedback');
    Route::post('/submit', 'storeFeedback')->name('submitFeedback');
});

// Customer courior registration routes.
Route::controller(CourierController::class)->prefix('courier')->group(function () {
    // Courier registration routes
    Route::get('/', 'createCourier')->name('courier');
    // Track Status routes
    Route::get('/track', 'trackCourier')->name('trackCourier');
    Route::post('/register', 'registerCourier')->name('registerCourier');
});

// Payment portal routes.
Route::controller(PaymentController::class)->prefix('payment')->group(function () {
    Route::get('/', 'create')->name('createPayment');
    Route::post('/process', 'processPayment')->name('processPayment');
    Route::get('/success', 'paymentSuccess')->name('paymentSuccess');
    Route::get('/failure', 'paymentFailure')->name('paymentFailure');
});

// Admin dashboard route
Route::get('/admin', [DashboardController::class, 'stats'])->middleware(['auth'])->name('dashboard');

// Authentication routes (login, logout, etc.)
require __DIR__ . '/auth.php';
