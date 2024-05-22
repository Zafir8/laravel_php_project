<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VehicleCategoryController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BookingController;

// Home and Checkout Routes
Route::get('/', [PlanController::class, 'home'])->name('home');
Route::get('/checkout/{plan}', [CheckoutController::class, 'show'])->middleware('auth')->name('checkout.show');
Route::post('/checkout/{plan}', [CheckoutController::class, 'processPayment'])->middleware('auth')->name('payment.process');

// Book a Ride Routes
Route::get('/book-a-ride', [BookingController::class, 'show'])->middleware('auth')->name('book.ride');
Route::post('/book-a-ride', [BookingController::class, 'bookRide'])->middleware('auth')->name('book.ride.submit');

// Authenticated Routes
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Admin Routes
    Route::middleware(['admin'])->group(function () {
        Route::resource('vehicle-categories', VehicleCategoryController::class);
        Route::resource('vehicles', VehicleController::class);
        Route::resource('user', UserController::class);
    });
});

// Test Route
Route::post('/post-test', function (Request $request) {
    dd($request);
});
