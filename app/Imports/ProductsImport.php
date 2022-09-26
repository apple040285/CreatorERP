<?php

namespace App\Imports;

use App\Models\Department;
use App\Models\Job;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Staff;
use App\Models\Storehouse;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\RegistersEventListeners;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithUpserts;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Events\BeforeImport;

class ProductsImport implements ToModel, WithUpserts, WithStartRow, SkipsEmptyRows, WithValidation, WithEvents
{
    use RegistersEventListeners;

    protected Model $category;

    public function registerEvents(): array
    {
        return [
            BeforeImport::class => function (BeforeImport $event) {
                $this->category = ProductCategory::firstOrCreate(
                    [
                        'code' => 'default'
                    ],
                    [
                        'name' => '未分類',
                        'remark' => '系統預設類別',
                    ]
                );
            },
        ];
    }

    public function model(array $row)
    {
        return new Product([
            'product_category_id'   => $this->category->id,
            'code'                  => $row[0],
            'name'                  => $row[1],
            'invoice_name'          => $row[2],
            'unit'                  => $row[3],
            'price'                 => $row[4],
            'barcode'               => $row[5],
        ]);
    }

    /**
     * 更新模型唯一 key (可多欄位)
     *
     * @return string|array
     */
    public function uniqueBy()
    {
        return 'code';
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
            0 => ['required'],

            1 => ['required'],

            2 => ['required'],
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
            0 => '產品編號',
            1 => '產品名稱',
            1 => '發票品茗',
        ];
    }
}
