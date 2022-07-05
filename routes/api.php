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
    // 部門管理
    Route::apiResource('/departments', Controllers\DepartmentController::class);
    Route::apiResource('/jobs', Controllers\JobController::class);
});

// 測試用
Route::middleware(LanguageMiddleware::class)->group(function () {
    // 部門管理
    Route::apiResource('/departments', Controllers\DepartmentController::class);
    Route::apiResource('/jobs', Controllers\JobController::class);
});
