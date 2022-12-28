<?php

namespace App\Imports;

use App\Models\Product;
use App\Models\Storehouse;
use App\Models\StorehouseHasProduct;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class ProductsStorehousesImport implements ToCollection, WithStartRow, SkipsEmptyRows, WithValidation, WithBatchInserts, WithChunkReading
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        // foreach ($collection as $key => $item) {
        //     if (!Product::where('code', $item[2])->first()) {
        //         throw new \Exception('編號: ' . $item[2]);
        //     }
        // }

        /**
         第二版
         */
        foreach ($collection as $key => $row) {
            $product = Product::where('code', $row[2])->first();

            $storehouse = Storehouse::where('code', $row[0])->first();

            $product->storehouses()->syncWithoutDetaching([
                $storehouse->id => [
                    'stock' => $row[4]
                ]
            ]);
        }

        return;

        /**
         第一版
         */

        // 依照商品 code 分類
        $grouped = $collection->mapToGroups(function ($item, $key) {
            return [$item[2] => $item];
        });

        // 讀取商品
        $baseProduct = Product::query()->whereIn('code', $grouped->keys()->toArray())->get();

        // 讀取商品庫存
        $baseProductStocks = StorehouseHasProduct::query()
            ->with('storehouse:id,code', 'product:id,code')
            // ->with('storehouse', 'product')
            ->whereHas('product', fn ($query) => $query->whereIn('code', $grouped->keys()->toArray()))
            ->get();

        // 讀取倉庫
        $baseStorehouse = Storehouse::query()->get();

        // 迴圈處理
        foreach ($grouped as $productCode => $products) {
            // 當前商品
            $currentProduct = $baseProduct->where('code', $productCode)->firstOrFail();

            // 當前商品庫存
            $currentProductStocks = $baseProductStocks->where('product.code', $productCode);

            // 整理庫存陣列
            $multiplied = $baseStorehouse->mapWithKeys(function ($storehouse, $key) use ($products, $currentProductStocks) {
                $currentProductStock = $currentProductStocks->firstWhere('storehouse.code', $storehouse->code);

                return [$storehouse->id => ['stock' => $products->firstWhere(0, $storehouse->code)[4] ?? $currentProductStock['stock'] ?? 0]];
            });

            // 同步庫存
            $currentProduct->storehouses()->syncWithoutDetaching($multiplied->toArray());
        }
    }

    /**
     * 從第二排開始
     *
     * @return int
     */
    public function startRow(): int
    {
        return 2;
    }

    /**
     * 驗證欄位
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            0 => ['required', 'exists:storehouses,code'],

            2 => ['required', 'exists:products,code'],

            4 => ['required', 'integer'],
        ];
    }

    /**
     * 欄位中文化
     *
     * @return array
     */
    public function customValidationAttributes(): array
    {
        return [
            0 => '倉庫編號',
            2 => '產品編號',
            4 => '數量',
        ];
    }

    public function batchSize(): int
    {
        return 500 ?? 99999;
    }

    public function chunkSize(): int
    {
        return 500 ?? 99999;
    }
}
