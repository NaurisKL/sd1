<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\UserController;

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

    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
});

Route::middleware(['check.login'])->group(function () {
    Route::get('/client', function () {
        return view('client');
    })->name('client');

    Route::get('/employee', function () {
        return view('employee');
    })->name('employee');

    Route::get('/admin', function () {
        return view('admin');
    })->name('admin');

   
    Route::prefix('admin')->group(function () {
       
        Route::get('/users', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('admin.users.index');
        Route::get('/users/create', [App\Http\Controllers\Admin\UserController::class, 'create'])->name('admin.users.create');
        Route::post('/users', [App\Http\Controllers\Admin\UserController::class, 'store'])->name('admin.users.store');
        Route::get('/users/{user}/edit', [App\Http\Controllers\Admin\UserController::class, 'edit'])->name('admin.users.edit');
        Route::put('/users/{user}', [App\Http\Controllers\Admin\UserController::class, 'update'])->name('admin.users.update');
        Route::delete('/users/{user}', [App\Http\Controllers\Admin\UserController::class, 'destroy'])->name('admin.users.destroy');
    
        Route::get('/conferences', [App\Http\Controllers\Admin\ConferenceController::class, 'index'])->name('admin.conferences.index');
        Route::get('/conferences/create', [App\Http\Controllers\Admin\ConferenceController::class, 'create'])->name('admin.conferences.create');
        Route::post('/conferences', [App\Http\Controllers\Admin\ConferenceController::class, 'store'])->name('admin.conferences.store');
        Route::get('/conferences/{conference}/edit', [App\Http\Controllers\Admin\ConferenceController::class, 'edit'])->name('admin.conferences.edit');
        Route::put('/conferences/{conference}', [App\Http\Controllers\Admin\ConferenceController::class, 'update'])->name('admin.conferences.update');
        Route::delete('/conferences/{conference}', [App\Http\Controllers\Admin\ConferenceController::class, 'destroy'])->name('admin.conferences.destroy');
    });
});
