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
        //
        foreach ($collection as $row) {
            $storehouse = Storehouse::where('code', $row[0])->firstOrFail();
            $product    = Product::where('code', $row[2])->firstOrFail();
            $quantity   = $row[4];

            $product->storehouses()->syncWithoutDetaching([
                $storehouse->id => ['stock' => $quantity],
            ]);

            // $product->storehouses()->updateExistingPivot($storehouse->id, [
            //     'stock' => $quantity,
            // ]);
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
