<?php

namespace App\Exports;

use App\Enum\AdjustOrderType;
use App\Models\AdjustOrder;
use App\Models\AdjustOrderItem;
use App\Models\Storehouse;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithCustomValueBinder;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\DefaultValueBinder;
use PhpOffice\PhpSpreadsheet\Cell\Cell;
use PhpOffice\PhpSpreadsheet\Cell\DataType;

class AdjustTransferOrdersExport extends DefaultValueBinder implements FromArray, WithHeadings, WithMapping, ShouldAutoSize, WithColumnFormatting, WithCustomValueBinder
{
    public $attributes;

    public $masterStorehouse;

    public function __construct($attributes)
    {
        $this->attributes = $attributes;

        $this->masterStorehouse = Storehouse::firstWhere('code', '01');
    }

    public function array(): array
    {
        $data = AdjustOrder::search(
            $this->attributes['searchTerm'],
            fn ($query) => $query
                ->where('type', AdjustOrderType::調撥)
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
            '調撥日期',
            '調撥單號',
            '商品ID',
            '產品名稱',
            '調撥數量',
            '國際條碼',
            '調出倉庫ID',
            '倉庫名稱',
            '調入倉庫ID',
            '倉庫名稱',
            '調撥人員ID',
        ];
    }

    public function map($data): array
    {
        return [
            $data['order']['adjust_date'],
            $data['order']['adjust_order_no'],
            $data['product']['code'],
            $data['product']['name'],
            $data['quantity'],
            strval($data['product']['barcode']),
            $this->masterStorehouse?->code,
            $this->masterStorehouse?->name,
            $data['storehouse']['code'] ?? null,
            $data['storehouse']['name'] ?? null,
            $data['order']['staff']['code'] ?? null,
        ];
    }

    public function columnFormats(): array
    {
        return [
            'C' => \PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_TEXT,
            'F' => \PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_TEXT,
            'G' => \PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_TEXT,
            'I' => \PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_TEXT,
        ];
    }

    public function bindValue(Cell $cell, $value)
    {
        $column = $cell->getColumn();
        // 長度超過 15 會自動轉為科學符號
        if (in_array($column, ['F'])) {
            $cell->setValueExplicit($value, DataType::TYPE_STRING);
            return true;
        }
        return parent::bindValue($cell, $value);
    }
}
