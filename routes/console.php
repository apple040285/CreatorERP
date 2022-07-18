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
