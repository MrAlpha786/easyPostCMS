<?php

use App\Http\Controllers\CourierController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\PaymentController;
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
Route::get('feedback', [FeedbackController::class, 'createFeedback'])->name('feedback');
Route::post('feedback/submit', [FeedbackController::class, 'storeFeedback'])->name('submitFeedback');

// Track Status routes
Route::view('tracker', 'pages.trackStatus')->name('tracker');
Route::get('tracker/show', [CourierController::class, 'trackCourier'])->name('trackCourier');

// Courier registration routes
Route::get('courier', [CourierController::class, 'createCourier'])->name('courier');
Route::post('courier/register', [CourierController::class, 'registerCourier'])->name('registerCourier');

// Price List page route
Route::view('pricelist', 'pages.pricelist')->name('pricelist');
Route::get('process-payment', [PaymentController::class, 'create']);

// Admin dashboard route
Route::get('/admin', [DashboardController::class, 'stats'])->middleware(['auth'])->name('dashboard');


// Authentication routes (login, logout, etc.)
require __DIR__ . '/auth.php';
