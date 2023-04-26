<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class CustomerManufacturerAddressImport implements ToCollection, WithStartRow, SkipsEmptyRows, WithValidation
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        $codeByAddressGrouped = $collection->groupBy(0);

        foreach ($codeByAddressGrouped as $code => $address) {
            $multiplied = $address->map(function ($item) {
                return [
                    'address_name'      => $item[1],
                    'postal_code'       => $item[2],
                    'address'           => $item[3],
                    'contact_person'    => $item[4],
                    'department_name'   => $item[5],
                    'telephone'         => $item[6],
                    'cellphone'         => $item[7],
                    'email'             => $item[8],
                    'remark'            => $item[9],
                ];
            });
            if ($customer = \App\Models\CustomerManufacturer::where('code', $code)->first()) {
                $customer->update(['address' => $multiplied]);
            }
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
            0 => ['required'],

            1 => ['required'],
        ];
    }
}
