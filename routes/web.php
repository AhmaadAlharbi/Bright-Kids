<?php

use App\Http\Controllers\AppointmentController;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\DashboardsController;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    return view('frontend.index');
})->name('frontend.index');
Route::resource('appointments', AppointmentController::class);
Route::put('appointments/{appointment}/status', [AppointmentController::class, 'updateStatus'])->name('appointments.updateStatus');

Route::get('/admin', [DashboardsController::class, 'index']);
Route::get('index', [DashboardsController::class, 'index']);