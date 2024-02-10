<?php

use App\Enums\Role;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use App\Http\Controllers\VehicleController;
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

Route::get('/', function () {
    return view('home');
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('vehicle-categories', \App\Http\Controllers\VehicleCategoryController::class);
    Route::get('/vehicles/create', [VehicleController::class, 'create'])->name('vehicle.create');
    Route::post('/vehicles', [VehicleController::class, 'store'])->name('vehicle.store');
    Route::get('/vehicles/{vehicle}/edit', [VehicleController::class, 'edit'])->name('vehicle.edit');
    Route::put('/vehicles/{vehicle}', [VehicleController::class, 'update'])->name('vehicle.update');
    Route::delete('/vehicles/{vehicle}', [VehicleController::class, 'destroy'])->name('vehicle.destroy');







    Route::resource('vehicles', \App\Http\Controllers\VehicleController::class);
    Route::resource('users', \App\Http\Controllers\UserController::class);







});

Route::post('/post-test', function (Request $request) {
    dd($request);
});

Route::resource(
    'user',
    \App\Http\Controllers\UserController::class
);
