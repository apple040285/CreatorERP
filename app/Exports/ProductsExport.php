<?php

namespace App\Exports;

use App\Models\Product;
use App\Models\Staff;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ProductsExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize, WithColumnFormatting
{
    public function collection(): Collection
    {
        if (request()->has('type') && request()->input('type') === 'example') {
            return collect([]);
        }
        return Product::query()->get();
    }

    public function headings(): array
    {
        return [
            '產品編號 (必填)',
            '產品名稱 (必填)',
            '發票品名 (必填)',
            '單位 (選填)',
            '單價 (選填)',
            '國際條碼 (選填)',
        ];
    }

    public function map($data): array
    {
        return [
            $data->code,
            $data->name,
            $data->invoice_name,
            $data->unit,
            $data->price,
            $data->barcode,
        ];
    }

    public function columnFormats(): array
    {
        return [
            'A' => \PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_TEXT,
            'F' => \PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_TEXT,
        ];
    }
}
