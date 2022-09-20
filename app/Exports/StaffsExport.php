<?php

namespace App\Exports;

use App\Models\Staff;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class StaffsExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize
{
    public function collection(): Collection
    {
        if (request()->has('type') && request()->input('type') === 'example') {
            return collect([]);
        }
        return Staff::query()->get();
    }

    public function headings(): array
    {
        return [
            '人員編號 (必填)',
            '人員姓名 (必填)',
        ];
    }

    public function map($data): array
    {
        return [
            $data->code,
            $data->name,
        ];
    }
}
