<?php

namespace App\Exports;

use App\Models\CustomerManufacturer;
use App\Models\Staff;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class CustomerManufacturersExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize
{
    public function collection(): Collection
    {
        if (request()->has('type') && request()->input('type') === 'example') {
            return collect([]);
        }
        return CustomerManufacturer::query()->get();
    }

    public function headings(): array
    {
        return [
            '客戶編號 (必填)',
            '類型歸屬 customer / manufacturer (必填)',
            '客戶全稱 (必填)',
            '聯絡電話 (選填)',
            '地址 (選填)',
            '聯絡人 (選填)',
        ];
    }

    public function map($data): array
    {
        return [
            $data->code,
            $data->type,
            $data->full_name,
            $data['address'][0]['cellphone'] ?? '',
            $data['address'][0]['address'] ?? '',
            $data['address'][0]['contact_person'] ?? '',
        ];
    }
}
