<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CustomerManufacturerAddressExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return collect([]);
    }

    public function headings(): array
    {
        return [
            '客戶編號 (必填)',
            '地址名稱 (必填)',
            '郵遞區號 (選填)',
            '地址 (選填)',
            '聯絡人 (選填)',
            '部門 (選填)',
            '電話 (選填)',
            '手機 (選填)',
            '信箱 (選填)',
            '備註 (選填)',
        ];
    }
}
