<?php

namespace App;

use Illuminate\Routing\Router as BaseRouter;

class Router extends BaseRouter
{
    /**
     * Route an API resource to a controller.
     *
     * @param  string  $name
     * @param  string  $controller
     * @param  array  $options
     * @return \Illuminate\Routing\PendingResourceRegistration
     */
    public function apiResource($name, $controller, array $options = [])
    {
        $model = str_replace('-', '_', str($name)->singular()->trim('/')); // this is optional, i need it for Route Model Binding

        // 列表 post 未來要做進階搜尋用的 (因 get 有長度限制)
        $this->post("$name/list", "$controller@index")->name($name . '.list');

        // 批量刪除
        if (method_exists($controller, 'destroyMany')) {
            $this->post("$name/destroy", "$controller@destroyMany")->name($name . '.destroyMany');
        }

        // 更新狀態
        if (method_exists($controller, 'updateStatus')) {
            $this->post("$name/{{$model}}/status", "$controller@updateStatus")->name($name . '.updateStatus');
        }

        // 獲得選項
        if (method_exists($controller, 'options')) {
            $this->post("$name/options", "$controller@options")->name($name . '.options');
        }
        return parent::apiResource($name, $controller, $options);
    }
}
