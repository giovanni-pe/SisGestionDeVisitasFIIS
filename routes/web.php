<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\VisitController;
use App\Http\Controllers\VisitRequestController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
})->middleware('auth');
 
Route::get('/',[App\Http\Controllers\AdminController::class,'index'])->name('home')->middleware('auth');

Auth::routes(['register'=>true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::resource('/usuarios',App\Http\Controllers\UserController::class)->middleware('can:usuarios');


Route::resource('processes',App\Http\Controllers\ProcessController::class);



Route::resource('visitor_representatives', App\Http\Controllers\VisitorRepresentativeController::class);

Route::get('/visit-requests', [VisitRequestController::class, 'index'])->name('visitRequests.index');

// Ruta para actualizar el estado de una solicitud
Route::patch('/visit-requests/{id}/status', [VisitRequestController::class, 'updateStatus'])->name('visitRequests.updateStatus');
Route::get('/visits/scan', [VisitController::class, 'scan'])->name('visits.scan');
Route::post('/visits/process', [VisitController::class, 'processQRCode'])->name('visits.process');
Route::post('/visits/complete/{id}', [VisitController::class, 'completeVisit'])->name('visits.complete');
Route::get('/visits/in-progress', [VisitController::class, 'visitsInProgress'])->name('visits.in_progress');
Route::get('/visits/completed', [VisitController::class, 'visitsCompleted'])->name('visits.completed');
Route::get('/visits/cancelled', [VisitController::class, 'visitsCancelled'])->name('visits.cancelled');
