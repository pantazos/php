<?php

use App\Http\Controllers\Api\V1\AuthApiController;
use App\Http\Controllers\Api\V1\BookingApiController;
use App\Http\Controllers\Api\V1\ConfigApiController;
use App\Http\Controllers\Api\V1\PaymentApiController;
use App\Http\Controllers\Api\V1\PayPalController;
use App\Http\Controllers\Api\V1\ReviewApiController;
use App\Http\Controllers\Api\V1\UsersApiController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
|
| Apis for user authentication like login, register and logout
|
*/

Route::post('/auth/login', [AuthApiController::class, 'login']);
Route::post('/auth/register', [AuthApiController::class, 'register']);
Route::middleware('auth:sanctum')->post('/auth/logout', [AuthApiController::class, 'logout']);

/*
|--------------------------------------------------------------------------
| Configs Routes
|--------------------------------------------------------------------------
|
| Apis to get app configs and data like services, categories, etc...
|
*/
Route::get('/configs', [ConfigApiController::class, 'index']);

/*
|--------------------------------------------------------------------------
| Review Routes
|--------------------------------------------------------------------------
|
| Apis to create new review, get reviews for a service
|
*/
Route::middleware('auth:sanctum')->post('/reviews', [ReviewApiController::class, 'store']);
Route::middleware('auth:sanctum')->get('/reviews/{serviceKey}', [ReviewApiController::class, 'index']);

/*
|--------------------------------------------------------------------------
| User Routes
|--------------------------------------------------------------------------
|
| Apis to get app configs and data like services, categories, etc...
|
*/
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::patch('/users', [UsersApiController::class, 'update']);
    Route::patch('/users/register-fcm-token', [UsersApiController::class, 'registerFCMToken']);
    Route::patch('/users/categories', [UsersApiController::class, 'updateCategories']);
});

/*
|--------------------------------------------------------------------------
| Booking Routes
|--------------------------------------------------------------------------
|
| Apis to CRUD bookings
|
*/
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/bookings', [BookingApiController::class, 'store']);
    Route::get('/bookings', [BookingApiController::class, 'index']);
    Route::get('/bookings/leads', [BookingApiController::class, 'leads']);
    Route::get('/bookings/{key}', [BookingApiController::class, 'show']);
    Route::post('/bookings/{key}/accept', [BookingApiController::class, 'accept']);
    Route::post('/bookings/{key}/on-the-way', [BookingApiController::class, 'onTheWay']);
    Route::post('/bookings/{key}/arrived', [BookingApiController::class, 'arrived']);
    Route::post('/bookings/{key}/in-progress', [BookingApiController::class, 'inProgress']);
    Route::post('/bookings/{key}/work-done', [BookingApiController::class, 'workDone']);
    Route::post('/bookings/{key}/approve-work', [BookingApiController::class, 'approveWork']);
    Route::post('/bookings/{key}/confirm-payment', [BookingApiController::class, 'confirmPayment']);
    Route::post('/bookings/{key}/cancel', [BookingApiController::class, 'cancel']);

    // Commission
    Route::apiResource('commissions', 'CommissionApiController');
});

/*
|--------------------------------------------------------------------------
| Payment Routes
|--------------------------------------------------------------------------
|
| Apis to create create payments
|
*/
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/payment/paypal/order', [PaymentApiController::class, 'createPayPalOrder']);
    Route::post('/payment/paypal/capture', [PaymentApiController::class, 'capturePayPalOrder']);
});
