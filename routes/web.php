<?php

use App\Http\Livewire;
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
    Route::get('/', fn () => redirect()->route('index'));

    Route::get('/login', function () {
        return view('login');
    })->name('login');

    Route::get('/index', function () {
        return view('index');
    })->name('index');

    // 銷售查補
    Route::prefix('sales-check')->group(function () {
        Route::get('/index', Livewire\SalesCheck\Index::class)->name('sales-check-index');
        Route::get('/form/{customer_id}', Livewire\SalesCheck\Form::class)->name('sales-check-form');
        Route::get('/detail/{customer_id}', Livewire\SalesCheck\Detail::class)->name('sales-check-detail');
    });

    // Route::prefix('sales-check')->group(function () {
    //     Route::get('/index', function () {
    //         return view('salesCheck.index');
    //     })->name('sales-check-index');

    //     Route::get('/form', function () {
    //         return view('salesCheck.form');
    //     })->name('sales-check-form');

    //     Route::get('/detail', function () {
    //         return view('salesCheck.detail');
    //     })->name('sales-check-detail');
    // });

    Route::prefix('sales-list')->group(function () {
        Route::get('/index', Livewire\SalesList\Index::class)->name('sales-list-index');
        Route::get('/form/{item_id}', Livewire\SalesList\Form::class)->name('sales-list-form');
        Route::get('/detail/{order_id}', Livewire\SalesList\Detail::class)->name('sales-list-detail');
    });

    // Route::prefix('sales-list')->group(function () {
    //     Route::get('/index', function () {
    //         return view('salesList.index');
    //     })->name('sales-list-index');
    // });

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

    Route::prefix('return-list')->group(function () {
        Route::get('/index', function () {
            return view('returnList.index');
        })->name('return-list-index');
    });

    Route::prefix('transfer-job')->group(function () {
        Route::get('/index', function () {
            return view('transferJob.index');
        })->name('transfer-job-index');

        Route::get('/detail', function () {
            return view('transferJob.detail');
        })->name('transfer-job-detail');
    });

    Route::prefix('inventory')->group(function () {
        Route::get('/index', function () {
            return view('inventory.index');
        })->name('inventory-index');

        Route::get('/detail', function () {
            return view('inventory.detail');
        })->name('inventory-detail');
    });

    Route::prefix('historical-transactions')->group(function () {
        Route::get('/index', function () {
            return view('historicalTransactions.index');
        })->name('historical-transactions-index');

        Route::get('/detail', function () {
            return view('historicalTransactions.detail');
        })->name('historical-transactions-detail');
    });
});

Route::view('/{any}', 'application')
    ->where('any', '.*');
