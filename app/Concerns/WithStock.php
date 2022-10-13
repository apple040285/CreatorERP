<?php

namespace App\Concerns;

use App\Models\StorehouseHasProduct;

trait WithStock
{
    /**
     * 檢查庫存並且扣除
     *
     * @param  mixed $product_id
     * @param  mixed $storehouse_id
     * @param  mixed $quantity
     * @return bool
     */
    public function checkStockAndDeduct($product_id, $storehouse_id, $quantity): bool
    {
        $storehouseProduct = StorehouseHasProduct::query()
            ->where('product_id', $product_id)
            ->where('storehouse_id', $storehouse_id)
            ->first();

        // 庫存不足
        if (!$storehouseProduct || $storehouseProduct->stock < $quantity) {
            return false;
        }

        $storehouseProduct->decrement('stock', $quantity);
        return true;
    }
}
