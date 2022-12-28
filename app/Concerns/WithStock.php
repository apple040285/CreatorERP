<?php

namespace App\Concerns;

use App\Models\Product;
use App\Models\Storehouse;
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
        if (env('SKIP_STOCK_CHECK')) {
            return true;
        }

        $storehouseProduct = StorehouseHasProduct::query()
            ->where('product_id', $product_id)
            ->where('storehouse_id', $storehouse_id)
            ->first();

        if (
            // 庫存不存在
            !$storehouseProduct
            // 庫存不足
            || $storehouseProduct->stock < $quantity
        ) {
            return false;
        }

        $storehouseProduct->decrement('stock', $quantity);
        return true;
    }

    /**
     * 檢查庫存並且加回
     *
     * @param  mixed $product_id
     * @param  mixed $storehouse_id
     * @param  mixed $quantity
     * @return bool
     */
    public function checkStockAndAdd($product_id, $storehouse_id, $quantity): bool
    {
        if (env('SKIP_STOCK_CHECK')) {
            return true;
        }

        $storehouseProduct = StorehouseHasProduct::query()
            ->where('product_id', $product_id)
            ->where('storehouse_id', $storehouse_id)
            ->first();

        /** 庫存不存在自動創建 */
        if (!$storehouseProduct) {
            Product::findOrFail($product_id)->storehouses()->attach([
                $storehouse_id => [
                    'stock' => $quantity,
                ],
            ]);

            return true;
        }

        $storehouseProduct->increment('stock', $quantity);
        return true;
    }

    public function syncStorehouse($product_id, $storehouse_id, $quantity)
    {
        StorehouseHasProduct::updateOrCreate(
            [
                'product_id'    => $product_id,
                'storehouse_id' => $storehouse_id,
            ],
            [
                'stock'         => $quantity,
            ]
        );
    }

    public function transferStorehouse($product_id, $storehouse_id, $quantity)
    {
        // 總倉庫資料
        $masterData = [
            'product_id'    => $product_id,
            'storehouse_id' => Storehouse::firstWhere('code', '01')->id,
        ];

        if (!$masterStorehouse = StorehouseHasProduct::firstWhere($masterData))
            StorehouseHasProduct::create($masterData + ['stock' => -$quantity]);
        else
            $masterStorehouse->decrement('stock', $quantity);

        // 轉移倉庫資料
        $transferData = [
            'product_id'    => $product_id,
            'storehouse_id' => $storehouse_id,
        ];

        if (!$transferStorehouse = StorehouseHasProduct::firstWhere($transferData))
            StorehouseHasProduct::create($transferData + ['stock' => $quantity]);
        else
            $transferStorehouse->increment('stock', $quantity);
    }
}
