<?php

namespace App\Exports;

use App\Enum\SalesOrderType;
use App\Models\SalesOrderItem;
use App\Models\Staff;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class SalesOrdersExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize, WithColumnFormatting
{
    public $attributes;

    public function __construct($attributes)
    {
        $this->attributes = $attributes;
    }

    public function collection(): Collection
    {
        return SalesOrderItem::query()
            ->whereHas(
                'order',
                fn ($query) => $query
                    ->where('type', SalesOrderType::銷貨->value)
                    ->tap(function ($query) {
                        if (isset($this->attributes['columnFilters']) && isset($this->attributes['columnFilters']['sales_date'])) {
                            $value = $this->attributes['columnFilters']['sales_date'];
                            if (str($value)->contains(' to ') && $split = str($value)->split('/ to /')) {
                                $query
                                    ->whereDate('sales_date', '>=', $split[0])
                                    ->whereDate('sales_date', '<=', $split[1]);
                            } else {
                                $query->whereDate('sales_date', $value);
                            }
                        }
                    })
            )
            ->get();
    }

    public function headings(): array
    {
        return [
            '查補日期',
            '查補單號',
            '客戶ID',
            '客戶名稱',
            '商品ID',
            '商品名稱',
            '查補數量',
            '單價',
            '國際條碼',
            '倉庫代號',
            '倉庫名稱',
            '查補人員代號',
        ];
    }

    public function map($data): array
    {
        return [
            $data->order->sales_date,
            $data->order->sales_order_no,
            $data->order->staff?->code,
            $data->order->staff?->name,
            $data->product->name,
            $data->product->code,
            $data->quantity,
            $data->price,
            $data->product->barcode,
            $data->storehouse?->code,
            $data->storehouse?->name,
            $data->order->staff?->code,
        ];
    }

    public function columnFormats(): array
    {
        return [
            'F' => \PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_TEXT,
            'I' => \PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_TEXT,
        ];
    }
}
