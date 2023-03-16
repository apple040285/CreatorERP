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

// 測試 qr code
Route::get('/test', function (Request $request) {
    return view('test');
});

Route::group(['prefix' => 'auth'], function () {
    Route::post('login', [Controllers\AuthController::class, 'login']);
    Route::post('register', [Controllers\AuthController::class, 'register']);
    Route::post('refresh-token', [Controllers\AuthController::class, 'refreshToken']);

    Route::group(['middleware' => 'auth:api'], function () {
        Route::get('logout', [Controllers\AuthController::class, 'logout']);
        Route::get('user', [Controllers\AuthController::class, 'user']);
        Route::post('reset/password', [Controllers\AuthController::class, 'updatePassword']);
    });
});

Route::middleware(['auth:api', LanguageMiddleware::class])->group(function () {
    // 帳號管理
    Route::apiResource('/users', Controllers\UserController::class);

    // 角色管理
    Route::apiResource('/roles', Controllers\RoleController::class);

    // 權限群組
    Route::get('permissions/group', Controllers\PermissionController::class);
    Route::post('permissions/tree', [Controllers\PermissionController::class, 'tree']);

    /**
     PDA 大豐專用前台登入
     */
    Route::apiResource('/p-members', Controllers\PMemberController::class);

    /** @var 基本資料操作 */

    // 部門管理
    Route::apiResource('/departments', Controllers\DepartmentController::class);

    // 職位管理
    Route::apiResource('/jobs', Controllers\JobController::class);

    // 幣值管理
    Route::apiResource('/currencies', Controllers\CurrencyController::class);

    // 專案管理
    Route::apiResource('/projects', Controllers\ProjectController::class);
    Route::post('projects/relationships', [Controllers\ProjectController::class, 'relationships']);

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
    Route::post('/products/storehouses/import', [Controllers\ProductController::class, 'storehousesImport']);

    // 倉庫管理
    Route::apiResource('/storehouses', Controllers\StorehouseController::class);

    /** @var 客戶廠商操作 */

    // 客戶廠商類型
    Route::apiResource('/customer-manufacturers-categories', Controllers\CustomerManufacturerCategoryController::class);

    // 客戶廠商
    Route::apiResource('/customer-manufacturers', Controllers\CustomerManufacturerController::class);

    // https://www.managertoday.com.tw/english/view/62099?
    // 英文翻譯
    /** @var 採購作業 */

    // 採購憑單
    Route::apiResource('/procurement-orders', Controllers\ProcurementOrderController::class);
    Route::post('/procurement-orders/transfers', [Controllers\ProcurementOrderController::class, 'transfers']); // 轉單列表


    /** @var 進貨作業 */

    // 進貨憑單
    Route::apiResource('/purchase-orders', Controllers\PurchaseOrderController::class);
    Route::post('/purchase-orders/transfers', [Controllers\PurchaseOrderController::class, 'transfers']); // 轉單列表


    /** @var 訂購作業 */

    // 報價頻單
    Route::apiResource('/quotation-orders', Controllers\QuotationOrderController::class);
    Route::post('/quotation-orders/transfers', [Controllers\QuotationOrderController::class, 'transfers']); // 轉單列表

    // 訂購頻單
    Route::apiResource('/subscriber-orders', Controllers\SubscriberOrderController::class);
    Route::post('/subscriber-orders/transfers', [Controllers\SubscriberOrderController::class, 'transfers']); // 轉單列表


    /** @var 銷貨作業 */

    // 銷貨憑單
    Route::apiResource('/sales-orders', Controllers\SalesOrderController::class);
    Route::post('/sales-orders/transfers', [Controllers\SalesOrderController::class, 'transfers']); // 轉單列表

    // 銷貨退回憑單
    Route::apiResource('/sales-return-orders', Controllers\SalesReturnOrderController::class);


    /** @var 調整作業 */

    // 調整憑單
    Route::apiResource('/adjust-orders', Controllers\AdjustOrderController::class);

    // 調撥憑單
    Route::apiResource('/adjust-transfer-orders', Controllers\AdjustTransferOrderController::class);
});

// 測試用
// Route::prefix('tests')->middleware(LanguageMiddleware::class)->group(function () {
//     // 部門管理
//     // Route::apiResource('/departments', Controllers\DepartmentController::class);
//     // Route::apiResource('/jobs', Controllers\JobController::class);
//     // Route::apiResource('/currencies', Controllers\CurrencyController::class);
//     // 調整憑單
//     Route::apiResource('/adjust-orders', Controllers\AdjustOrderController::class);

//     // 調撥憑單
//     Route::apiResource('/adjust-transfer-orders', Controllers\AdjustTransferOrderController::class);
// });
