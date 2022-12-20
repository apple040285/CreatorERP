<?php

namespace App\Imports;

use App\Models\Product;
use App\Models\Storehouse;
use App\Models\StorehouseHasProduct;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class ProductsStorehousesImport implements ToCollection, WithStartRow, SkipsEmptyRows, WithValidation
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        // 依照商品 code 分類
        $grouped = $collection->mapToGroups(function ($item, $key) {
            return [$item[2] => $item];
        });

        //
        foreach ($grouped as $productCode => $products) {
            $product = Product::where('code', $productCode)->firstOrFail();

            $multiplied = Storehouse::get()->mapWithKeys(function ($storehouse, $key) use ($productCode, $products) {
                $currentStock = StorehouseHasProduct::query()
                    ->whereHas('product', fn ($query) => $query->where('code', $productCode))
                    ->whereHas('storehouse', fn ($query) => $query->where('code', $storehouse->code))
                    ->first();

                return [$storehouse->id => ['stock' => $products->firstWhere(0, $storehouse->code)[4] ?? $currentStock['stock'] ?? 0]];
            });

            $product->storehouses()->syncWithoutDetaching($multiplied->toArray());
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
}
