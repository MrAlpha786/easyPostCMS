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
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::view('/', 'pages.home');

Route::view('/about', 'pages.about');

Route::view('/contact-us', 'pages.contact');

Route::view('/feedback', 'pages.feedback');

Route::view('/track-status', 'pages.trackStatus');

Route::get('/process-payment', [PaymentController::class, 'create']);

Route::get('/register-courier', [CourierController::class, 'create']);

Route::post('/register-courier', [CourierController::class, 'store']);
