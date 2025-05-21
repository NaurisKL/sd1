<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Client\ConferenceController as ClientConferenceController;
use App\Http\Controllers\Employee\ConferenceController as EmployeeConferenceController;

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
    return redirect()->route('login');
});

// Authentication Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Registration Routes
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Protected Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Client Routes
    Route::middleware(['role:client'])->group(function () {
        Route::get('/client', function () {
            return view('client');
        })->name('client');
        
        Route::get('/client/conferences', [ClientConferenceController::class, 'index'])->name('client.conferences.index');
        Route::get('/client/conferences/{conference}', [ClientConferenceController::class, 'show'])->name('client.conferences.show');
    });

    // Employee Routes
    Route::middleware(['role:employee'])->group(function () {
        Route::get('/employee', function () {
            return view('employee');
        })->name('employee');
        
        Route::get('/employee/conferences', [EmployeeConferenceController::class, 'index'])->name('employee.conferences.index');
        Route::get('/employee/conferences/{conference}', [EmployeeConferenceController::class, 'show'])->name('employee.conferences.show');
    });

    // Admin Routes
    Route::middleware(['role:admin'])->group(function () {
        Route::get('/admin', function () {
            return view('admin');
        })->name('admin');

        // User Management Routes
        Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users.index');
        Route::get('/admin/users/create', [UserController::class, 'create'])->name('admin.users.create');
        Route::post('/admin/users', [UserController::class, 'store'])->name('admin.users.store');
        Route::get('/admin/users/{user}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
        Route::put('/admin/users/{user}', [UserController::class, 'update'])->name('admin.users.update');
        Route::delete('/admin/users/{user}', [UserController::class, 'destroy'])->name('admin.users.destroy');

        // Conference Management Routes
        Route::get('/admin/conferences', [App\Http\Controllers\Admin\ConferenceController::class, 'index'])->name('admin.conferences.index');
        Route::get('/admin/conferences/create', [App\Http\Controllers\Admin\ConferenceController::class, 'create'])->name('admin.conferences.create');
        Route::post('/admin/conferences', [App\Http\Controllers\Admin\ConferenceController::class, 'store'])->name('admin.conferences.store');
        Route::get('/admin/conferences/{conference}/edit', [App\Http\Controllers\Admin\ConferenceController::class, 'edit'])->name('admin.conferences.edit');
        Route::put('/admin/conferences/{conference}', [App\Http\Controllers\Admin\ConferenceController::class, 'update'])->name('admin.conferences.update');
        Route::delete('/admin/conferences/{conference}', [App\Http\Controllers\Admin\ConferenceController::class, 'destroy'])->name('admin.conferences.destroy');
    });
});
