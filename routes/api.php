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
use App\Http\Controllers\BookingController;
use App\Http\Controllers\BusAmenityController;
use \App\Http\Controllers\BusTypeController;
use \App\Http\Controllers\BusController;
use App\Http\Controllers\BusPhotoController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserController;

// Route::middleware(['auth:sanctum'])->group(function () {
Route::get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/add-amenity', [AmenityController::class, 'store']);
Route::resource('/bus-types', BusTypeController::class);
Route::resource('/bus', BusController::class);
Route::post('/update-bus-photo', [BusController::class, 'updateBusPhoto']);
Route::get('/bus-by-operator/{operator_id}', [BusController::class, 'busByOperator']);
Route::resource('/bus-photos', BusPhotoController::class);
Route::resource('/locations', LocationsController::class);
Route::resource('/schedule', ScheduleController::class);
Route::resource('/route-point', RoutePointController::class);
Route::get('/route-points-by-schedule/{schedule_id}', [RoutePointController::class, 'routePointsBySchedule']);
Route::resource('/passenger', PassengerController::class);
Route::resource('/operator', BusOperatorController::class);
Route::resource('/amenities', AmenityController::class);
Route::resource('/schedules', ScheduleController::class);
Route::get('/schedule-by-operator/{operator_id}', [ScheduleController::class, 'scheduleByOperator']);
Route::resource('/bus-amenities', BusAmenityController::class);
Route::get('/particular-bus-amenities/{bus_no}', [BusAmenityController::class, 'busAmenities']);
Route::post('/delete-bus-amenities/{bus_no}/{amenity_id}', [BusAmenityController::class, 'delete']);
Route::post('/update-user-photo', [UserController::class, 'updateProfilePhoto']);
Route::post('/change-password', [UserController::class, 'changePassword']);
Route::resource('/admin', AdminController::class);
// });
Route::post('/login', [AuthController::class, 'login']);
Route::post('/reset-code', [AuthController::class, 'resetCode']);
Route::post('/verify-code', [AuthController::class, 'verifyCode']);
Route::post('/reset-password', [AuthController::class, 'resetPassword']);
Route::post('/logout', [AuthController::class, 'logout']);
Route::post('/register-passenger', [PassengerController::class, 'store']);
Route::post('/auth-google', [PassengerController::class, 'authGoogle']);
Route::post('/register-operator', [BusOperatorController::class, 'store']);
Route::post('/register-admin', [AdminController::class, 'store']);
Route::get('/buses', [BusController::class, 'buses']);
Route::get('/bus-gallery/{bus_no}', [BusPhotoController::class, "showGallery"]);
Route::get('/all-location', [LocationsController::class, "allLocations"]);
Route::get('/all-schedule', [ScheduleController::class, "allSchedules"]);
Route::get('/all-route-point', [RoutePointController::class, "allRoutePoints"]);
Route::post('/search-schedule', [ScheduleController::class, "searchSchedules"]);

// bookings
Route::post('/confirm-booking', [BookingController::class, "store"]);
Route::get('/booking-by-passenger/{id}', [BookingController::class, "getBookingByPassenger"]);
Route::get('/booking-by-operator/{id}', [BookingController::class, "getBookingByOperator"]);
Route::get('/booking/cancel-by-passenger/{id}', [BookingController::class, "cancelByPassenger"]);
Route::get('/all-payment-history-by-passenger/{id}', [BookingController::class, "getAllPaymentHistoryByPassenger"]);
Route::get('/booking/is-seat-booked/{schedule_id}', [BookingController::class, "isSeatBooked"]);
Route::get('/change-status/{id}/{status}', [BookingController::class, "changeStatus"]);

Route::get('/booking/check-booking-limit/{passenger_id}', [BookingController::class, 'checkBookingLimit']);
Route::post('/create-review', [ReviewController::class, "store"]);
