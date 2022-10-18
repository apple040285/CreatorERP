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
use Maatwebsite\Excel\Concerns\WithCustomValueBinder;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\DefaultValueBinder;
use PhpOffice\PhpSpreadsheet\Cell\Cell;
use PhpOffice\PhpSpreadsheet\Cell\DataType;

class SalesReturnOrdersExport extends DefaultValueBinder implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize, WithColumnFormatting, WithCustomValueBinder
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
                    ->where('type', SalesOrderType::退貨->value)
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
            )->get();
    }

    public function headings(): array
    {
        return [
            '查退日期',
            '查退單號',
            '客戶ID',
            '客戶名稱',
            '商品ID',
            '商品名稱',
            '查退數量',
            '單價',
            '國際條碼',
            '倉庫ID',
            '倉庫名稱',
            '查補人員ID',
        ];
    }

    public function map($data): array
    {
        return [
            $data->order->sales_date,
            $data->order->sales_order_no,
            $data->order->customer_manufacturer?->code,
            $data->order->customer_manufacturer?->full_name,
            $data->product->code,
            $data->product->name,
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
            'E' => \PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_TEXT,
            'F' => \PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_TEXT,
            'I' => \PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_TEXT,
            'J' => \PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_TEXT,
        ];
    }

    public function bindValue(Cell $cell, $value)
    {
        $column = $cell->getColumn();
        // 長度超過 15 會自動轉為科學符號
        if (in_array($column, ['I'])) {
            $cell->setValueExplicit($value, DataType::TYPE_STRING);
            return true;
        }
        return parent::bindValue($cell, $value);
    }
}
