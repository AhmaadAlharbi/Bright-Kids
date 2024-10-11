<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\DashboardsController;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    return view('frontend.index');
})->name('frontend.index');

Route::get('/admin', [DashboardsController::class, 'index']);
Route::get('index', [DashboardsController::class, 'index']);