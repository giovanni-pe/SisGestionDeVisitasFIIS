<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\VisitorAuthController;
use App\Http\Controllers\Api\VisitorRepresentativeController;
use App\Http\Controllers\Api\VisitRequestController;
use App\Http\Controllers\Api\CalendarController;
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


Route::post('/register', [VisitorAuthController::class, 'registerUser']); // Registro de usuario
Route::middleware('auth:sanctum')->post('/representative/register', [VisitorAuthController::class, 'registerRepresentative']); // Registro de representante
Route::post('/representative/login', [VisitorAuthController::class, 'login']); // Login de representante


Route::middleware('auth:sanctum')->group(function () {
    Route::post('/representative', [VisitorRepresentativeController::class, 'storeOrUpdate']);
    Route::post('/visit-requests', [VisitRequestController::class, 'store']);
   // Route::get('/calendar/unavailable-dates', [CalendarController::class, 'getUnavailableDates']);
});

Route::get('/calendar/unavailable-dates', [CalendarController::class, 'getUnavailableDates']);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});