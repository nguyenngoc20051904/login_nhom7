<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BatchController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('home');
});




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Routes Auth của Breeze
require __DIR__.'/auth.php';

// Phân quyền quản lý resource theo role

// Admin quản lý toàn bộ
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('students', StudentController::class);
    Route::resource('teachers', TeacherController::class);
    Route::resource('courses', CourseController::class);
    Route::resource('batches', BatchController::class);
    Route::resource('enrollments', EnrollmentController::class);
    Route::resource('payments', PaymentController::class);
    Route::get('report/report1/{pid}', [ReportController::class, 'report1'])->name('report.report1');
});

Route::middleware(['auth', 'role:admin,user'])->group(function () {
    Route::resource('students', StudentController::class)->only(['create','index', 'show','store']);
    Route::resource('batches', BatchController::class)->only(['index', 'show']);
    Route::resource('enrollments', EnrollmentController::class);
    Route::resource('payments', PaymentController::class)->only(['index', 'show']);
    Route::get('report/report1/{pid}', [ReportController::class, 'report1'])->name('report.report1');
});

