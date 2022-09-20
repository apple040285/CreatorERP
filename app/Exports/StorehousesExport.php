<?php

namespace App\Exports;

use App\Models\Storehouse;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class StorehousesExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize
{
    public function collection(): Collection
    {
        if (request()->has('type') && request()->input('type') === 'example') {
            return collect([]);
        }
        return Storehouse::query()->get();
    }

    public function headings(): array
    {
        // return DB::getSchemaBuilder()->getColumnListing((new Storehouse)->getTable());
        return [
            '倉庫編號 (必填)', '倉庫名稱 (必填)'
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
