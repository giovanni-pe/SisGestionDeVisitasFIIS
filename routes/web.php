<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AsistenciaController;
use App\Http\Controllers\VisitRequestController;
 Route::get('/asistencias/reportes', [AsistenciaController::class, 'reportes']);

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
Route::get('/asistencias/reportes', [App\Http\Controllers\AsistenciaController::class, 'reportes'])->name('reportes');
Route::get('/asistencias/pdf', [App\Http\Controllers\AsistenciaController::class, 'pdf'])->name('pdf');
Route::get('/asistencias/pdf_fechas', [App\Http\Controllers\AsistenciaController::class, 'pdf_fechas'])->name('pdf_fechas');
Auth::routes(['register'=>true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route::get('/miembros', [App\Http\Controllers\MiembroController::class, 'index']);
//Route::get('/miembros/create', [App\Http\Controllers\MiembroController::class, 'create']);

Route::resource('/usuarios',App\Http\Controllers\UserController::class)->middleware('can:usuarios');
Route::resource('/asistencias',App\Http\Controllers\AsistenciaController::class);

Route::resource('processes',App\Http\Controllers\ProcessController::class);



Route::resource('visitor_representatives', App\Http\Controllers\VisitorRepresentativeController::class);

Route::get('/visit-requests', [VisitRequestController::class, 'index'])->name('visitRequests.index');

// Ruta para actualizar el estado de una solicitud
Route::patch('/visit-requests/{id}/status', [VisitRequestController::class, 'updateStatus'])->name('visitRequests.updateStatus');
