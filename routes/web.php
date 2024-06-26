<?php

use App\Http\Controllers\PayPalController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VehicleCategoryController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ContactController;

// Home and Checkout Routes
Route::get('/', [PlanController::class, 'home'])->name('home');
Route::get('checkout/{plan}', [CheckoutController::class, 'show'])->name('checkout.show') ->middleware('auth');
Route::post('payment/process/{plan}', [CheckoutController::class, 'processPayment'])->name('payment.process') ->middleware('auth');
Route::get('payment/success', [CheckoutController::class, 'success'])->name('payment.success') ->middleware('auth');
Route::get('payment/cancel', [CheckoutController::class, 'cancel'])->name('payment.cancel') ->middleware('auth');

// Book a Ride Routes
Route::get('/book-a-ride', [BookingController::class, 'show'])->middleware('auth')->name('book.ride');
Route::post('/book-a-ride', [BookingController::class, 'bookRide'])->middleware('auth')->name('book.ride.submit');
Route::patch('/cancel-ride/{id}', [BookingController::class, 'cancelRide'])->name('cancel.ride');
Route::patch('/driver/cancel-ride/{id}', [BookingController::class, 'cancelRideByDriver'])->name('driver.cancel.ride');
Route::patch('/student/cancel-ride/{id}', [BookingController::class, 'cancelRideByStudent'])->name('student.cancel.ride');

// PayPal Routes
Route::post('paypal/create-order/{plan}', [PayPalController::class, 'createOrder'])->name('paypal.createOrder');
Route::get('paypal/success', [PayPalController::class, 'success'])->name('paypal.success');
Route::get('paypal/cancel', [PayPalController::class, 'cancel'])->name('paypal.cancel');

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


// route for about us page
Route::get('/about', function () {
    return view('about');
})->name('about');

// route for contact us page
Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::post('/contact/submit', [ContactController::class, 'submit'])->name('contact.submit');
