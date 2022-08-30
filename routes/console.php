<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

// 安初始一鍵安裝
Artisan::command('erp:install', function () {
    $this->call('migrate:ref');

    $this->call('passport:install');

    $this->call('db:seed');
});

// 刪除 migrations 存在的資料和資料表
Artisan::command('migrate:delete', function () {
    $migrations = $this->ask('migrations');

    Illuminate\Support\Facades\DB::table('migrations')->where('migration', 'like', "%create_{$migrations}_table%")->delete();
    Illuminate\Support\Facades\Schema::dropIfExists($migrations);

    $this->comment('刪除成功');
});

// 安裝權限表
Artisan::command('erp:install:permission', function () {
    $permissions = [
        // 部門管理
        [
            'name'      => 'departments',
            'children'  => [
                ['name' => 'departments.read'],
                ['name' => 'departments.add'],
                ['name' => 'departments.update'],
                ['name' => 'departments.delete'],
                // ['name' => 'departments.print', 'children'  => [
                //     ['name' => 'departments.print.name'],
                //     ['name' => 'departments.print.order'],
                // ]],
            ]
        ],

        // 職位管理
        [
            'name'      => 'jobs',
            'children'  => [
                ['name' => 'jobs.read'],
                ['name' => 'jobs.add'],
                ['name' => 'jobs.update'],
                ['name' => 'jobs.delete'],
            ]
        ],

        // 幣值管理
        [
            'name'      => 'currencies',
            'children'  => [
                ['name' => 'currencies.read'],
                ['name' => 'currencies.add'],
                ['name' => 'currencies.update'],
                ['name' => 'currencies.delete'],
            ]
        ],

        // 專案管理
        [
            'name'      => 'projects',
            'children'  => [
                ['name' => 'projects.read'],
                ['name' => 'projects.add'],
                ['name' => 'projects.update'],
                ['name' => 'projects.delete'],
            ]
        ],

        // 銀行管理
        [
            'name'      => 'banks',
            'children'  => [
                ['name' => 'banks.read'],
                ['name' => 'banks.add'],
                ['name' => 'banks.update'],
                ['name' => 'banks.delete'],
            ]
        ],

        // 人員管理
        [
            'name'      => 'staffs',
            'children'  => [
                ['name' => 'staffs.read'],
                ['name' => 'staffs.add'],
                ['name' => 'staffs.update'],
                ['name' => 'staffs.delete'],
            ]
        ],

        // 帳戶管理
        [
            'name'      => 'bank_accounts',
            'children'  => [
                ['name' => 'bank_accounts.read'],
                ['name' => 'bank_accounts.add'],
                ['name' => 'bank_accounts.update'],
                ['name' => 'bank_accounts.delete'],
            ]
        ],

        // 產品分類
        [
            'name'      => 'categories',
            'children'  => [
                ['name' => 'categories.read'],
                ['name' => 'categories.add'],
                ['name' => 'categories.update'],
                ['name' => 'categories.delete'],
            ]
        ],

        // 產品管理
        [
            'name'      => 'products',
            'children'  => [
                ['name' => 'products.read'],
                ['name' => 'products.add'],
                ['name' => 'products.update'],
                ['name' => 'products.delete'],
            ]
        ],

        // 倉庫管理
        [
            'name'      => 'storehouses',
            'children'  => [
                ['name' => 'storehouses.read'],
                ['name' => 'storehouses.add'],
                ['name' => 'storehouses.update'],
                ['name' => 'storehouses.delete'],
            ]
        ],

        // 客戶廠商類型
        [
            'name'      => 'customer_manufacturer_categories',
            'children'  => [
                ['name' => 'customer_manufacturer_categories.read'],
                ['name' => 'customer_manufacturer_categories.add'],
                ['name' => 'customer_manufacturer_categories.update'],
                ['name' => 'customer_manufacturer_categories.delete'],
            ]
        ],

        // 客戶廠商
        [
            'name'      => 'customer_manufacturers',
            'children'  => [
                ['name' => 'customer_manufacturers.read'],
                ['name' => 'customer_manufacturers.add'],
                ['name' => 'customer_manufacturers.update'],
                ['name' => 'customer_manufacturers.delete'],
            ]
        ],
    ];

    // $permission = \Spatie\Permission\Models\Permission::where('id', '>', 0)->delete();

    foreach ($permissions as $item) {
        $permission = \Spatie\Permission\Models\Permission::create(['name' => $item['name']]);

        foreach ($item['children'] as $children) {
            \Spatie\Permission\Models\Permission::create(['parent_id' => $permission['id'], 'name' => $children['name']]);

            // if (isset($children['children'])) {
            //     foreach ($children['children'] as $children) {
            //         \Spatie\Permission\Models\Permission::create(['parent_id' => $permission['id'], 'name' => $children['name']]);
            //     }
            // }
        }
    }

    $this->comment('寫入成功');
});
