<?php

use App\Http\Controllers\LocationsController;
use App\Http\Controllers\RoutePointController;
use App\Http\Controllers\ScheduleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\AuthController;
use \App\Http\Controllers\PassengerController;
use \App\Http\Controllers\BusOperatorController;
use \App\Http\Controllers\AdminController;
use \App\Http\Controllers\AmenityController;
use \App\Http\Controllers\BusTypeController;
use \App\Http\Controllers\BusController;
use App\Http\Controllers\BusPhotoController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::post('/add-amenity', [AmenityController::class, 'store']);
    Route::resource('/bus-types', BusTypeController::class);
    Route::resource('/bus', BusController::class);
    Route::resource('/bus-photos', BusPhotoController::class);
    Route::resource('/locations', LocationsController::class);
    Route::resource('/schedule', ScheduleController::class);
    Route::resource('/route-point', RoutePointController::class);
});
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register-passenger', [PassengerController::class, 'store']);
Route::post('/register-operator', [BusOperatorController::class, 'store']);
Route::post('/register-admin', [AdminController::class, 'store']);
Route::get('/buses', [BusController::class, 'buses']);
Route::get('/bus-gallery', [BusPhotoController::class, "showGallery"]);
Route::get('/all-location', [LocationsController::class, "allLocations"]);
Route::get('/all-schedule', [ScheduleController::class, "allSchedules"]);
Route::get('/all-route-point', [RoutePointController::class, "allRoutePoints"]);
