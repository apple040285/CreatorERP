<?php

namespace App\Exports;

use App\Enum\AdjustOrderType;
use App\Models\AdjustOrder;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithCustomValueBinder;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\DefaultValueBinder;
use PhpOffice\PhpSpreadsheet\Cell\Cell;
use PhpOffice\PhpSpreadsheet\Cell\DataType;

class AdjustOrdersExport extends DefaultValueBinder implements FromArray, WithHeadings, WithMapping, ShouldAutoSize, WithColumnFormatting, WithCustomValueBinder
{
    public $attributes;

    public function __construct($attributes)
    {
        $this->attributes = $attributes;
    }

    public function array(): array
    {
        $data = AdjustOrder::search(
            $this->attributes['searchTerm'],
            fn ($query) => $query
                ->where('type', AdjustOrderType::調整)
                ->when(isset($this->attributes['columnFilters']), function ($query) {
                    if (isset($this->attributes['columnFilters']) && isset($this->attributes['columnFilters']['adjust_date'])) {
                        $value = $this->attributes['columnFilters']['adjust_date'];
                        if (str($value)->contains(' to ') && $split = str($value)->split('/ to /')) {
                            $query
                                ->whereDate('adjust_date', '>=', $split[0])
                                ->whereDate('adjust_date', '<=', $split[1]);
                        } else {
                            $query->whereDate('adjust_date', $value);
                        }
                    }
                })
                ->latest()
        )->get();

        $data->load([
            'items' => function ($query) {
                $query->with('order.staff', 'product', 'storehouse')->where('quantity', '>', 0);
            },
        ]);

        $collections = [];
        foreach ($data as $key => $order) {
            $collections = array_merge($collections, $order->items->toArray());
        }

        return collect($collections)->sortBy('storehouse_id')->all();
    }

    public function headings(): array
    {
        return [
            '盤點日期',
            '盤點單號',
            '商品ID',
            '商品名稱',
            '盤點數量',
            '國際條碼',
            '倉庫ID',
            '倉庫名稱',
            '盤點人員ID',
        ];
    }

    public function map($data): array
    {
        return [
            $data['order']['adjust_date'],
            $data['order']['adjust_order_no'],
            $data['product']['code'],
            $data['product']['name'],
            strval($data['quantity']),
            strval($data['product']['barcode']),
            $data['storehouse']['code'] ?? null,
            $data['storehouse']['name'] ?? null,
            $data['order']['staff']['code'] ?? null,
        ];
    }

    public function columnFormats(): array
    {
        return [
            'C' => \PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_TEXT,
            'E' => \PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_TEXT,
            'F' => \PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_TEXT,
            'G' => \PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_TEXT,
        ];
    }

    public function bindValue(Cell $cell, $value)
    {
        $column = $cell->getColumn();
        // 長度超過 15 會自動轉為科學符號
        if (in_array($column, ['E', 'F'])) {
            $cell->setValueExplicit($value, DataType::TYPE_STRING);
            return true;
        }
        return parent::bindValue($cell, $value);
    }
}
