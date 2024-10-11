<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ParentsController;


use App\Http\Controllers\DashboardsController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ContactMessageController;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    return view('frontend.index');
})->name('frontend.index');
Route::get('/contact-us', function () {
    return view('frontend.contact');
})->name('frontend.index');
Route::resource('appointments', AppointmentController::class);
Route::put('appointments/{appointment}/status', [AppointmentController::class, 'updateStatus'])->name('appointments.updateStatus');
Route::post('/contact', [ContactMessageController::class, 'store'])->name('contact.store');
Route::get('/admin/contact-messages', [ContactMessageController::class, 'index'])->name('admin.contact-messages.index');
Route::get('/contact-messages', [ContactMessageController::class, 'index'])
    ->name('admin.contact-messages.index');
Route::get('/contact-messages/{message}', [ContactMessageController::class, 'show'])
    ->name('admin.contact-messages.show');
Route::put('/contact-messages/{message}', [ContactMessageController::class, 'markAsRead'])
    ->name('admin.contact-messages.mark-as-read');
Route::delete('/contact-messages/{message}', [ContactMessageController::class, 'destroy'])
    ->name('admin.contact-messages.destroy');
Route::resource('parents', ParentsController::class);


Route::get('/admin', [DashboardsController::class, 'index']);
Route::get('index', [DashboardsController::class, 'index']);