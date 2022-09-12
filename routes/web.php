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

    Route::prefix('sales-check')->group(function () {
        Route::get('/index', function () {
            return view('salesCheck.index');
        })->name('sales-check-index');

        Route::get('/form', function () {
            return view('salesCheck.form');
        })->name('sales-check-form');

        Route::get('/detail', function () {
            return view('salesCheck.detail');
        })->name('sales-check-detail');
    });

    Route::prefix('products-return')->group(function () {
        Route::get('/index', function () {
            return view('productsReturn.index');
        })->name('products-return-index');

        Route::get('/form', function () {
            return view('productsReturn.form');
        })->name('products-return-form');

        Route::get('/detail', function () {
            return view('productsReturn.detail');
        })->name('products-return-detail');
    });

    Route::prefix('transfer-job')->group(function () {
        Route::get('/form', function () {
            return view('transferJob.form');
        })->name('transfer-job-form');

        Route::get('/detail', function () {
            return view('transferJob.detail');
        })->name('transfer-job-detail');
    });
});

Route::view('/{any}', 'application')
    ->where('any', '.*');
