<?php

use App\Http\Livewire;
use App\Models\Product;
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
    // 共用 API
    Route::get('/products', function (Illuminate\Http\Request $request) {
        $data = Product::search(
            $request->input('term'),
            fn ($query) => $query->select(['id', 'name'])->latest()
        )->get();

        return $data;
    })->name('apps.products.index');

    // 首頁
    Route::get('/', fn () => redirect()->route('index'));

    // 登入
    Route::get('/login', Livewire\Login::class)->name('login');

    // 登出
    Route::get('/logout', function () {
        auth('staff')->logout();

        return redirect()->route('login');
    })->middleware('auth:staff')->name('logout');

    // 首頁
    Route::get('/index', Livewire\Index::class)->middleware('auth:staff')->name('index');

    // 銷售查補
    Route::prefix('sales-check')->middleware('auth:staff')->group(function () {
        Route::get('/index', Livewire\SalesCheck\Index::class)->name('sales-check-index');
        Route::get('/form/{customer}/{order?}', Livewire\SalesCheck\Form::class)->name('sales-check-form');
        Route::get('/detail/{customer}/{order?}', Livewire\SalesCheck\Detail::class)->name('sales-check-detail');
        Route::get('/view/{customer}/{order}', Livewire\SalesCheck\View::class)->name('sales-check-view');
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

    Route::prefix('sales-list')->middleware('auth:staff')->group(function () {
        Route::get('/index', Livewire\SalesList\Index::class)->name('sales-list-index');
    });

    // Route::prefix('sales-list')->group(function () {
    //     Route::get('/index', function () {
    //         return view('salesList.index');
    //     })->name('sales-list-index');
    // });

    // 商品退貨
    Route::prefix('products-return')->middleware('auth:staff')->group(function () {
        Route::get('/index', Livewire\ProductsReturn\Index::class)->name('products-return-index');
        Route::get('/form/{customer}/{order?}', Livewire\ProductsReturn\Form::class)->name('products-return-form');
        Route::get('/detail/{customer}/{order?}', Livewire\ProductsReturn\Detail::class)->name('products-return-detail');
        Route::get('/view/{customer}/{order}', Livewire\ProductsReturn\View::class)->name('products-return-view');
    });

    // Route::prefix('products-return')->group(function () {
    //     Route::get('/index', function () {
    //         return view('productsReturn.index');
    //     })->name('products-return-index');

    //     Route::get('/form', function () {
    //         return view('productsReturn.form');
    //     })->name('products-return-form');

    //     Route::get('/detail', function () {
    //         return view('productsReturn.detail');
    //     })->name('products-return-detail');
    // });

    Route::prefix('return-list')->middleware('auth:staff')->group(function () {
        Route::get('/index', Livewire\ReturnList\Index::class)->name('return-list-index');
    });

    // Route::prefix('return-list')->group(function () {
    //     Route::get('/index', function () {
    //         return view('returnList.index');
    //     })->name('return-list-index');
    // });

    Route::prefix('transfer-job')->middleware('auth:staff')->group(function () {
        Route::get('/index', Livewire\TransferJob\Index::class)->name('transfer-job-index');
        Route::get('/detail', Livewire\TransferJob\Detail::class)->name('transfer-job-detail');
    });

    // Route::prefix('transfer-job')->group(function () {
    //     Route::get('/index', function () {
    //         return view('transferJob.index');
    //     })->name('transfer-job-index');

    //     Route::get('/detail', function () {
    //         return view('transferJob.detail');
    //     })->name('transfer-job-detail');
    // });

    Route::prefix('inventory')->middleware('auth:staff')->group(function () {
        Route::get('/index', Livewire\Inventory\Index::class)->name('inventory-index');
        Route::get('/detail', Livewire\Inventory\Detail::class)->name('inventory-detail');
    });

    // Route::prefix('inventory')->group(function () {
    //     Route::get('/index', function () {
    //         return view('inventory.index');
    //     })->name('inventory-index');

    //     Route::get('/detail', function () {
    //         return view('inventory.detail');
    //     })->name('inventory-detail');
    // });

    Route::prefix('historical-transactions')->middleware('auth:staff')->group(function () {
        Route::get('/index', Livewire\Historical\Index::class)->name('historical-transactions-index');
        Route::get('/detail', Livewire\Historical\Detail::class)->name('historical-transactions-detail');
    });

    // Route::prefix('historical-transactions')->group(function () {
    //     Route::get('/index', function () {
    //         return view('historicalTransactions.index');
    //     })->name('historical-transactions-index');

    //     Route::get('/detail', function () {
    //         return view('historicalTransactions.detail');
    //     })->name('historical-transactions-detail');
    // });
});

Route::view('/{any}', 'application')
    ->where('any', '.*');
