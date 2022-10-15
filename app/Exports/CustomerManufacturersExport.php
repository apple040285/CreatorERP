<?php

namespace App\Exports;

use App\Models\CustomerManufacturer;
use App\Models\Staff;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class CustomerManufacturersExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize, WithColumnFormatting
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
            $data->phone_one,
            $data->company_address,
            $data->contact_person_one,
        ];
    }

    public function columnFormats(): array
    {
        return [
            'A' => \PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_TEXT,
            'D' => \PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_TEXT,
        ];
    }
}
