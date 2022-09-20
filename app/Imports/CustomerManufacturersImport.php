<?php

namespace App\Imports;

use App\Models\CustomerManufacturer;
use App\Models\CustomerManufacturerCategory;
use App\Models\Department;
use App\Models\Job;
use App\Models\Staff;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\RegistersEventListeners;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithUpserts;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Events\BeforeImport;

class CustomerManufacturersImport implements ToModel, WithUpserts, WithStartRow, SkipsEmptyRows, WithValidation, WithEvents
{
    use RegistersEventListeners;

    protected Model $categoryCustomer;

    protected Model $categoryManufacturer;

    public function registerEvents(): array
    {
        return [
            BeforeImport::class => function (BeforeImport $event) {
                $this->categoryCustomer = CustomerManufacturerCategory::firstOrCreate(
                    [
                        'code' => 'default-customer',
                        'type' => 'customer',
                    ],
                    [
                        'name' => '預設客戶',
                        'remark' => '系統預設客戶類型',
                    ]
                );

                $this->categoryManufacturer = CustomerManufacturerCategory::firstOrCreate(
                    [
                        'code' => 'default-manufacturer',
                        'type' => 'manufacturer',
                    ],
                    [
                        'name' => '預設廠商',
                        'remark' => '系統預設廠商類型',
                    ]
                );
            },
        ];
    }

    public function model(array $row)
    {
        $customer_manufacturer_category = null;
        if ($row[1] === 'customer')
            $customer_manufacturer_category = $this->categoryCustomer;
        if ($row[1] === 'manufacturer')
            $customer_manufacturer_category = $this->categoryManufacturer;

        return new CustomerManufacturer([
            'customer_manufacturer_category_id' => $customer_manufacturer_category->id,
            'code'              => $row[0],
            'type'              => $row[1],
            'full_name'         => $row[2],
            // data
            'data->address' => [
                [
                    'cellphone' => $row[3],
                    'address' => $row[4],
                    'contact_person' => $row[5],
                ]
            ],
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

            1 => ['required|in:customer,manufacturer'],

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
            0 => '客戶廠商編號',
            1 => '客戶廠商歸屬',
            2 => '客戶廠商全稱',
        ];
    }
}
