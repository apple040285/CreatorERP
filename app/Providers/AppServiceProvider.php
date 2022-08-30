<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        // \Illuminate\Support\Facades\Event::listen(\Illuminate\Database\Events\QueryExecuted::class, function ($event) {
        //     if (str($event->sql)->is('*telescope_entries*')) {
        //         return;
        //     }
        //     if (str($event->sql)->is('*telescope_monitoring*')) {
        //         return;
        //     }
        //     $sql = str_replace("?", "'%s'", $event->sql);
        //     $bindings = collect($event->bindings)->map(fn ($value) => $value instanceof \DateTime ? $value->format('Y-m-d H:i:s') : $value)->all();
        //     $log = count($bindings) ? vsprintf($sql, $bindings) : $sql;
        //     info($log);
        // });

        // 載入全局共用函數
        foreach (glob(app_path() . '/helpers/*.php') as $filename) {
            require_once $filename;
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }
}
