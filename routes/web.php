<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LevelController;


use App\Http\Controllers\ParentsController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\DashboardsController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ContactMessageController;
use App\Http\Controllers\RegisterNewStudentsController;
use App\Http\Controllers\TeacherController;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    return view('frontend.index');
})->name('frontend.index');
Route::get('/contact-us', function () {
    return view('frontend.contact');
})->name('frontend.contact');
Route::get('/register-student', function () {
    return view('frontend.register-student');
})->name('frontend.contact');


Route::post('/register-new-student', [RegisterNewStudentsController::class, 'store'])->name('register-new-student.store');
Route::resource('appointments', AppointmentController::class);
Route::resource('parents', ParentsController::class);
Route::resource('students', StudentController::class);
Route::post('/students/{student}/upload-document', [StudentController::class, 'uploadDocument'])->name('students.upload-document');
Route::delete('/student-documents/{document}', [StudentController::class, 'deleteDocument'])->name('students.delete-document');
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
Route::resource('levels', LevelController::class);
Route::resource('classrooms', ClassroomController::class);
Route::resource('teachers', TeacherController::class);
Route::delete('teachers/{teacher}/classrooms/{classroom}', [TeacherController::class, 'detachClassroom'])
    ->name('teachers.detach-classroom');

Route::get('/check-file', function () {
    $path = storage_path('app/public/student_documents/mMVvtuWRq3iRfVLaZmh7Lvh7HyKXTsVlbbYATq5e.pdf');
    return file_exists($path) ? "File exists" : "File does not exist";
});
Route::get('/admin', [DashboardsController::class, 'index']);
Route::get('index', [DashboardsController::class, 'index']);
