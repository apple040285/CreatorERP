<?php

use Illuminate\Support\Facades\Route;

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


Route::prefix('apps')->group(function () {
    Route::get('/login', function () {
        return view('login');
    })->name('login');

    Route::get('/index', function () {
        return view('index');
    })->name('index');
});

Route::view('/{any}', 'application')
    ->where('any', '.*');
