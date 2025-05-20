<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('user-types');
});

Route::get('/client', function () {
    return view('client');
});

Route::get('/employee', function () {
    return view('employee');
});

Route::get('/admin', function () {
    return view('admin');
});

// Admin routes
Route::prefix('admin')->group(function () {
    // User management routes
    Route::get('/users', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('admin.users.index');
    Route::get('/users/{user}/edit', [App\Http\Controllers\Admin\UserController::class, 'edit'])->name('admin.users.edit');
    Route::put('/users/{user}', [App\Http\Controllers\Admin\UserController::class, 'update'])->name('admin.users.update');

    // Conference management routes
    Route::get('/conferences', [App\Http\Controllers\Admin\ConferenceController::class, 'index'])->name('admin.conferences.index');
    Route::get('/conferences/create', [App\Http\Controllers\Admin\ConferenceController::class, 'create'])->name('admin.conferences.create');
    Route::post('/conferences', [App\Http\Controllers\Admin\ConferenceController::class, 'store'])->name('admin.conferences.store');
    Route::get('/conferences/{conference}/edit', [App\Http\Controllers\Admin\ConferenceController::class, 'edit'])->name('admin.conferences.edit');
    Route::put('/conferences/{conference}', [App\Http\Controllers\Admin\ConferenceController::class, 'update'])->name('admin.conferences.update');
    Route::delete('/conferences/{conference}', [App\Http\Controllers\Admin\ConferenceController::class, 'destroy'])->name('admin.conferences.destroy');
});
