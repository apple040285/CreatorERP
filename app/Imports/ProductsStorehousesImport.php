<?php

namespace App\Imports;

use App\Models\Product;
use App\Models\Storehouse;
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

            $multiplied = Storehouse::all()->mapWithKeys(function ($item, $key) use ($products) {
                return [$item->id => ['stock' => $products->firstWhere(0, $item->code)[4] ?? 0]];
            });

            $product->storehouses()->syncWithoutDetaching($multiplied->toArray());
        }

        // foreach ($collection as $row) {
        //     $storehouse = Storehouse::where('code', $row[0])->firstOrFail();
        //     $product    = Product::where('code', $row[2])->firstOrFail();
        //     $quantity   = $row[4];

        //     // foreach (Storehouse::all() as $key => $storehouse) {
        //     // }
        //     //
        //     $multiplied = Storehouse::all()->mapWithKeys(function ($item, $key) use ($collection) {

        //         return [$item->id => ['stock' => $quantity ?? 0]];
        //     });

        //     // info($multiplied->toArray());
        //     // $storehouse->products()->syncWithoutDetaching([
        //     //     $product->id => ['stock' => $quantity],
        //     // ]);
        //     $product->storehouses()->syncWithoutDetaching([
        //         $storehouse->id => ['stock' => $quantity],
        //     ]);

        //     // $product->storehouses()->updateExistingPivot($storehouse->id, [
        //     //     'stock' => $quantity,
        //     // ]);
        // }
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
