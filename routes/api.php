<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\VehicleCategoryController as ApiVehicleCategoryController;
use App\Http\Controllers\Api\VehicleController as ApiVehicleController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('vehicle-categories', [ApiVehicleCategoryController::class, 'index']);
Route::get('vehicles', [ApiVehicleController::class, 'index']);

Route::get('vehicles/{categoryId}', [ApiVehicleController::class, 'getVehiclesByCategory']);
