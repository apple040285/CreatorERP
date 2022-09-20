<?php

namespace App\Imports;

use App\Models\Storehouse;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithUpserts;
use Maatwebsite\Excel\Concerns\WithValidation;

class StorehousesImport implements ToModel, WithUpserts, WithStartRow, SkipsEmptyRows, WithValidation
{
    public function model(array $row)
    {
        return new Storehouse([
            'code' => $row[0],
            'name' => $row[1],
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
            1 => '倉庫名稱',
        ];
    }
}
