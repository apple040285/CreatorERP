<?php

use App\Http\Controllers;
use App\Http\Middleware\LanguageMiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'auth'], function () {
    Route::post('login', [Controllers\AuthController::class, 'login']);
    Route::post('register', [Controllers\AuthController::class, 'register']);
    Route::post('refresh-token', [Controllers\AuthController::class, 'refreshToken']);

    Route::group(['middleware' => 'auth:api'], function () {
        Route::get('logout', [Controllers\AuthController::class, 'logout']);
        Route::get('user', [Controllers\AuthController::class, 'user']);
    });
});

Route::middleware(['auth:api', LanguageMiddleware::class])->group(function () {
    /** @var 基本資料操作 */

    // 部門管理
    Route::apiResource('/departments', Controllers\DepartmentController::class);

    // 職位管理
    Route::apiResource('/jobs', Controllers\JobController::class);

    // 幣值管理
    Route::apiResource('/currencies', Controllers\CurrencyController::class);

    // 專案管理
    Route::apiResource('/projects', Controllers\ProjectController::class);

    // 銀行管理
    Route::apiResource('/banks', Controllers\BankController::class);

    // 人員管理
    Route::apiResource('/staffs', Controllers\StaffController::class);

    // 帳戶管理
    Route::apiResource('/bank_accounts', Controllers\BankAccountController::class);

    /** @var 產品操作 */

    // 產品分類
    Route::apiResource('/categories', Controllers\CategoryController::class);

    // 產品管理
    Route::apiResource('/products', Controllers\ProductController::class);

    // 倉庫管理
    Route::apiResource('/storehouses', Controllers\StorehouseController::class);
});

// 測試用
Route::middleware(LanguageMiddleware::class)->group(function () {
    // 部門管理
    // Route::apiResource('/departments', Controllers\DepartmentController::class);
    // Route::apiResource('/jobs', Controllers\JobController::class);
    // Route::apiResource('/currencies', Controllers\CurrencyController::class);
});
