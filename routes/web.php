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
